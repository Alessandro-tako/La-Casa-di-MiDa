<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>Prenotazione Annullata</title>
</head>

<body
    style="background-color: #f9f9f9; padding: 40px 20px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: #333;">

    <div
        style="max-width: 600px; margin: 0 auto; background: #ffffff; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.05);">

        {{-- Logo --}}
        <div style="text-align: center; margin-bottom: 30px;">
            <img src="{{ asset('storage/images/loghi/logo-bianco-oro.jpg') }}" alt="Logo La Casa di MiDa" style="max-height: 80px;">
        </div>

        <h2 style="color: #bfa046; text-align: center; margin-bottom: 30px;">Prenotazione Annullata</h2>

        <p>Ciao <strong>{{ $booking->guest_first_name }} {{ $booking->guest_last_name }}</strong>,</p>

        <p>Ti informiamo che la tua prenotazione per la <strong>{{ $booking->room_name }}</strong> dal
            <strong>{{ \Carbon\Carbon::parse($booking->check_in)->format('d/m/Y') }}</strong> al
            <strong>{{ \Carbon\Carbon::parse($booking->check_out)->format('d/m/Y') }}</strong> è stata
            <span style="color: #c0392b; font-weight: bold;">annullata</span>.
        </p>

        <p>Se si tratta di un errore o desideri effettuare una nuova prenotazione, puoi contattarci in qualsiasi
            momento:</p>

        <ul style="padding-left: 20px; line-height: 1.8;">
            <li>Email: <a href="mailto:info@lacasadimida.it" style="color: #bfa046;">info@lacasadimida.it</a></li>
            <li>Modulo contatti: <a href="{{ route('contatti') }}" style="color: #bfa046;">clicca qui</a></li>
        </ul>

        <p>Grazie per aver scelto <strong>La Casa di MiDa</strong>. Speriamo di poterti accogliere in futuro.</p>

        <p style="margin-top: 40px;">Cordiali saluti,<br>
            <strong>Lo staff di La Casa di MiDa</strong>
        </p>
    </div>

</body>

</html>
