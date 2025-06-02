<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\PenaleApplicata;

class PenaleController extends Controller
{
    public function addebita(Request $request, Booking $prenotazione)
    {
        $percentuale = intval($request->input('penale_percentuale', 0));

        // Blocca se già gestita
        if ($prenotazione->penale_addebitata) {
            return back()->with('error', 'La penale è già stata gestita per questa prenotazione.');
        }

        if (!in_array($percentuale, [0, 20, 100])) {
            return back()->with('error', 'Percentuale penale non valida.');
        }

        // Caso: nessuna penale (ma blocca future modifiche)
        if ($percentuale === 0) {
            $prenotazione->update(['penale_addebitata' => true]);
            return back()->with('success', 'Nessuna penale è stata applicata e non sarà più possibile addebitarla.');
        }

        // Verifica presenza dati Stripe
        if (!$prenotazione->stripe_payment_method || !$prenotazione->stripe_customer_id) {
            return back()->with('error', 'Dati della carta non disponibili per questa prenotazione.');
        }

        try {
            Stripe::setApiKey(config('services.stripe.secret'));

            $importo = intval(($prenotazione->price * $percentuale / 100) * 100); // centesimi

            $intent = PaymentIntent::create([
                'amount' => $importo,
                'currency' => 'eur',
                'customer' => $prenotazione->stripe_customer_id,
                'payment_method' => $prenotazione->stripe_payment_method,
                'off_session' => true,
                'confirm' => true,
                'description' => 'Penale del '.$percentuale.'% per prenotazione #'.$prenotazione->id,
            ]);

            $prenotazione->update([
                'penale_addebitata' => true,
                'penale_ricevuta_url' => $intent->charges->data[0]->receipt_url ?? null,
            ]);

            Mail::to($prenotazione->guest_email)->send(
                new PenaleApplicata($prenotazione, $percentuale, $importo / 100)
            );

            Log::info('Penale addebitata correttamente', [
                'prenotazione_id' => $prenotazione->id,
                'percentuale' => $percentuale,
                'importo' => $importo,
            ]);

            return back()->with('success', 'Penale del '.$percentuale.'% addebitata con successo.');
        } catch (\Exception $e) {
            Log::error('Errore Stripe durante addebito penale: ' . $e->getMessage());
            return back()->with('error', 'Errore durante l’addebito della penale: ' . $e->getMessage());
        }
    }
}
