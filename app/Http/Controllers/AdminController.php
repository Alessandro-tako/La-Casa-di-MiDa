<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingConfirmed;
use App\Mail\BookingCancelled;


class AdminController extends Controller
{
    public function dashboard()
    {
        $totali = [
            'tutte' => Booking::count(),
            'in_attesa' => Booking::where('status', 'in_attesa')->count(),
            'confermate' => Booking::where('status', 'confermata')->count(),
            'annullate' => Booking::where('status', 'annullata')->count(),
        ];

        return view('admin.dashboard', compact('totali'));
    }

    public function prenotazioni()
    {
        $prenotazioni = Booking::orderBy('created_at', 'desc')->get();
        return view('admin.prenotazioni', compact('prenotazioni'));
    }

    public function updatePrenotazione(Request $request, Booking $prenotazione)
    {
        $azione = $request->input('action');

        if ($azione === 'conferma') {
            $prenotazione->status = 'confermata';
            $prenotazione->save();

            // Invia email conferma
            Mail::to($prenotazione->guest_email)->send(new BookingConfirmed($prenotazione));

            return redirect()->back()->with('success', 'Prenotazione confermata con successo.');
        }

        if ($azione === 'annulla') {
            $prenotazione->status = 'annullata';
            $prenotazione->save();

            // Invia email annullamento
            Mail::to($prenotazione->guest_email)->send(new BookingCancelled($prenotazione));

            return redirect()->back()->with('success', 'Prenotazione annullata.');
        }

        return redirect()->back()->with('error', 'Azione non valida.');
    }
}
