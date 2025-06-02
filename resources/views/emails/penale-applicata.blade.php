<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Penale Applicata</title>
</head>
<body style="background-color:#f9f9f9; padding:40px 20px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color:#333;">

    <div style="max-width:600px; margin:0 auto; background:#ffffff; padding:30px; border-radius:10px; box-shadow:0 0 10px rgba(0,0,0,0.05);">
        <h2 style="color:#bfa046; text-align:center; margin-bottom:30px;">Penale Applicata</h2>

        <p>Ciao <strong>{{ $booking->guest_first_name }} {{ $booking->guest_last_name }}</strong>,</p>

        <p>Ti informiamo che, in base ai termini e condizioni accettati al momento della prenotazione, è stata applicata una penale per la prenotazione della <strong>{{ $booking->room_name }}</strong> dal
            <strong>{{ \Carbon\Carbon::parse($booking->check_in)->format('d/m/Y') }}</strong> al
            <strong>{{ \Carbon\Carbon::parse($booking->check_out)->format('d/m/Y') }}</strong>.
        </p>

        <p>L’importo addebitato è di <strong>{{ number_format($amount, 2, ',', '.') }} €</strong>.</p>

        @if($booking->penale_ricevuta_url)
            <p>Puoi visualizzare la ricevuta del pagamento cliccando qui:<br>
                <a href="{{ $booking->penale_ricevuta_url }}" style="color:#bfa046;">Visualizza ricevuta</a>
            </p>
        @endif

        <p>Per ulteriori informazioni o chiarimenti, non esitare a contattarci:</p>

        <ul style="padding-left: 20px; line-height: 1.8;">
            <li>Email: <a href="mailto:info@lacasadimida.it" style="color:#bfa046;">info@lacasadimida.it</a></li>
            <li>Modulo contatti: <a href="{{ route('contatti') }}" style="color:#bfa046;">clicca qui</a></li>
        </ul>

        <p style="margin-top:40px;">Cordiali saluti,<br>
            <strong>Lo staff di La Casa di MiDa</strong>
        </p>
    </div>

</body>
</html>
