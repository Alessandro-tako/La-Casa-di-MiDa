<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Mail\PenaleApplicata;
use Barryvdh\DomPDF\Facade\Pdf;

class PenaleController extends Controller
{
    public function addebita(Request $request, Booking $prenotazione)
    {
        $percentuale = intval($request->input('penale_percentuale', 0));

        if ($prenotazione->penale_addebitata) {
            return back()->with('error', 'La penale è già stata gestita per questa prenotazione.');
        }

        if (!in_array($percentuale, [0, 50, 100])) {
            return back()->with('error', 'Percentuale penale non valida.');
        }

        if ($percentuale === 0) {
            $prenotazione->update(['penale_addebitata' => true]);
            return back()->with('success', 'Nessuna penale è stata applicata e non sarà più possibile addebitarla.');
        }

        if (!$prenotazione->stripe_payment_method || !$prenotazione->stripe_customer_id) {
            return back()->with('error', 'Dati della carta non disponibili per questa prenotazione.');
        }

        try {
            Stripe::setApiKey(config('services.stripe.secret'));

            $importo = intval(($prenotazione->price * $percentuale / 100) * 100); // in centesimi

            $intent = PaymentIntent::create([
                'amount' => $importo,
                'currency' => 'eur',
                'customer' => $prenotazione->stripe_customer_id,
                'payment_method' => $prenotazione->stripe_payment_method,
                'off_session' => true,
                'confirm' => true,
                'description' => 'Penale del '.$percentuale.'% per prenotazione #'.$prenotazione->id,
            ]);

            // Genera PDF e salvalo
            // Genera PDF e salvalo
            $pdf = Pdf::loadView('pdf.penale', [
                'booking' => $prenotazione,
                'percentuale' => $percentuale,
                'importo' => $importo / 100,
            ]);

            $filename = 'penale_' . $prenotazione->id . '_' . now()->format('Ymd_His') . '.pdf';
            $relativePath = 'penali/' . $filename;

            Storage::put($relativePath, $pdf->output());



            $prenotazione->update([
                'penale_addebitata' => true,
                'penale_ricevuta_url' => $intent->charges->data[0]->receipt_url ?? null,
                'penale_pdf_path' => $relativePath,
            ]);

            try {
                app()->setLocale($prenotazione->locale);
                Mail::to($prenotazione->guest_email)->send(
                    new PenaleApplicata($prenotazione, $percentuale, $importo / 100)
                );
            } catch (\Throwable $mailError) {
                Log::warning('Mail penale non inviata: ' . $mailError->getMessage());
            }

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

    public function scaricaPDF(Booking $prenotazione)
    {
        if (!$prenotazione->penale_pdf_path || !Storage::exists($prenotazione->penale_pdf_path)) {
            abort(404, 'PDF non trovato.');
        }

        return Storage::download($prenotazione->penale_pdf_path, 'ricevuta_penale_' . $prenotazione->id . '.pdf');
    }
}
