<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Nuova Prenotazione</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #ffffff; color: #000; padding: 20px;">
    <h2 style="color: #bfa046;">📬 Nuova prenotazione ricevuta!</h2>

    <p>Hai ricevuto una nuova richiesta di prenotazione da parte di:</p>

    <table cellpadding="6" cellspacing="0" border="0" style="margin-top: 10px;">
        <tr>
            <td><strong>Nome e Cognome:</strong></td>
            <td>{{ $booking->guest_first_name }} {{ $booking->guest_last_name }}</td>
        </tr>
        <tr>
            <td><strong>Email:</strong></td>
            <td>{{ $booking->guest_email }}</td>
        </tr>
        <tr>
            <td><strong>Via:</strong></td>
            <td>{{ $booking->guest_address_street }}</td>
        </tr>
        <tr>
            <td><strong>Città:</strong></td>
            <td>{{ $booking->guest_address_city }}</td>
        </tr>
        <tr>
            <td><strong>CAP:</strong></td>
            <td>{{ $booking->guest_address_zip }}</td>
        </tr>
        <tr>
            <td><strong>Paese:</strong></td>
            <td>{{ $booking->guest_address_country }}</td>
        </tr>
        <tr>
            <td><strong>Camera:</strong></td>
            <td>{{ $booking->room_name }}</td>
        </tr>
        <tr>
            <td><strong>Check-in:</strong></td>
            <td>{{ \Carbon\Carbon::parse($booking->check_in)->format('d/m/Y') }}</td>
        </tr>
        <tr>
            <td><strong>Check-out:</strong></td>
            <td>{{ \Carbon\Carbon::parse($booking->check_out)->format('d/m/Y') }}</td>
        </tr>
        <tr>
            <td><strong>Numero ospiti:</strong></td>
            <td>{{ $booking->guests }}</td>
        </tr>
        <tr>
            <td><strong>Prezzo totale:</strong></td>
            <td style="color: #bfa046;"><strong>€ {{ number_format($booking->price, 2, ',', '.') }}</strong></td>
        </tr>
    </table>

    <hr style="margin: 30px 0; border: none; border-top: 1px solid #ccc;">

    <p>📌 Accedi al <strong>pannello di amministrazione</strong> per confermare o rifiutare la prenotazione.</p>

    <p style="font-size: 0.9em; color: #666;">
        Questa è una notifica automatica generata dal sito. Non rispondere direttamente a questa email.
    </p>

    <p style="margin-top: 30px;">Cordiali saluti,<br><strong>Sistema Prenotazioni – La Casa di MiDa</strong></p>
</body>
</html>
