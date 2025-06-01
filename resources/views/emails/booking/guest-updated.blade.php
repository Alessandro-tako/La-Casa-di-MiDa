<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Modifica Prenotazione</title>
</head>
<body style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f9f9f9; color: #333; padding: 40px 20px;">

    <div style="max-width: 600px; margin: 0 auto; background-color: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.05);">
        <h2 style="color: #bfa046; text-align: center;">Prenotazione aggiornata</h2>

        <p>Caro <strong>{{ $booking->guest_first_name }} {{ $booking->guest_last_name }}</strong>,</p>

        <p>Ti informiamo che i dettagli della tua prenotazione presso <strong>La Casa di MiDa</strong> sono stati modificati come richiesto. Di seguito trovi il riepilogo aggiornato:</p>

        <table cellpadding="6" cellspacing="0" border="0" style="margin: 20px 0; width: 100%;">
            <tr>
                <td style="width: 40%;"><strong>Camera:</strong></td>
                <td>{{ $booking->room_name }}</td>
            </tr>
            <tr>
                <td><strong>Nuovo Check-in:</strong></td>
                <td>{{ \Carbon\Carbon::parse($booking->check_in)->format('d/m/Y') }}</td>
            </tr>
            <tr>
                <td><strong>Nuovo Check-out:</strong></td>
                <td>{{ \Carbon\Carbon::parse($booking->check_out)->format('d/m/Y') }}</td>
            </tr>
            <tr>
                <td><strong>Ospiti:</strong></td>
                <td>{{ $booking->guests }}</td>
            </tr>
            <tr>
                <td><strong>Prezzo aggiornato:</strong></td>
                <td style="color: #bfa046; font-weight: bold;">€ {{ number_format($booking->price, 2, ',', '.') }}</td>
            </tr>
        </table>

        <p>Ti aspettiamo in <strong>Via Carlo Cattaneo 10, Roma</strong>.</p>

        <p>Per maggiori dettagli, puoi consultare i 
            <a href="{{ url('/termini-e-condizioni') }}" target="_blank" style="color: #bfa046; text-decoration: underline;">
                termini e condizioni della prenotazione
            </a>.
        </p>

        <hr style="margin: 30px 0; border: none; border-top: 1px solid #ddd;">

        <h4 style="color: #bfa046;">Ulteriori modifiche o cancellazione</h4>
        <p>Se desideri apportare ulteriori modifiche o cancellare la prenotazione:</p>
        <ul style="line-height: 1.8; padding-left: 20px;">
            <li>Scrivici a <a href="mailto:info@lacasadimida.it" style="color: #bfa046;">info@lacasadimida.it</a></li>
            <li>Oppure compila il <a href="{{ url('/contatti') }}" style="color: #bfa046; text-decoration: underline;">modulo contatti</a> sul nostro sito</li>
        </ul>

        <p style="margin-top: 30px;">Cordiali saluti,<br><strong>Lo staff di La Casa di MiDa</strong></p>
    </div>

</body>
</html>
