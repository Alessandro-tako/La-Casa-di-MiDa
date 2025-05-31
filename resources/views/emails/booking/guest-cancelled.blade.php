<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Prenotazione Annullata</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6;">
    <h2 style="color:#bfa046;">Prenotazione Annullata</h2>

    <p>Ciao {{ $booking->guest_first_name }} {{ $booking->guest_last_name }},</p>

    <p>La tua prenotazione per la <strong>{{ $booking->room_name }}</strong> dal
        <strong>{{ \Carbon\Carbon::parse($booking->check_in)->format('d/m/Y') }}</strong> al
        <strong>{{ \Carbon\Carbon::parse($booking->check_out)->format('d/m/Y') }}</strong> è stata <strong>annullata</strong>.
    </p>

    <p>Se pensi che si tratti di un errore o desideri prenotare nuove date, non esitare a contattarci.</p>

    <p>Per assistenza puoi:</p>
    <ul>
        <li>Scriverci a <a href="mailto:info@lacasadimida.it">info@lacasadimida.it</a></li>
        <li>Usare il <a href="{{ route('contatti') }}">modulo contatti del sito</a></li>
    </ul>

    <p>Grazie per aver considerato <strong>La Casa di MiDa</strong>.</p>

    <p style="margin-top:30px;">Cordiali saluti,<br>La Casa di MiDa</p>
</body>
</html>
