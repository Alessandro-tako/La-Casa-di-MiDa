<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Conferma Prenotazione</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #ffffff; color: #000000; padding: 20px;">

    <h2 style="color: #bfa046;">Grazie per la tua prenotazione!</h2>

    <p>Caro {{ $booking->guest_first_name }} {{ $booking->guest_last_name }},</p>

    <p>Abbiamo ricevuto la tua prenotazione presso <strong>La Casa di MiDa</strong>. Di seguito trovi il riepilogo:</p>

    <table cellpadding="6" cellspacing="0" border="0" style="margin-top: 10px; margin-bottom: 20px;">
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
            <td><strong>Ospiti:</strong></td>
            <td>{{ $booking->guests }}</td>
        </tr>
        <tr>
            <td><strong>Prezzo totale:</strong></td>
            <td style="color: #bfa046; font-weight: bold;">€ {{ number_format($booking->price, 2, ',', '.') }}</td>
        </tr>
    </table>

    <p>Ti aspettiamo in <strong>Via Carlo Cattaneo 10, Roma</strong>.</p>

    <p>Se hai bisogno di ulteriori informazioni non esitare a contattarci.</p>

    <p style="margin-top: 30px;">Cordiali saluti,<br><strong>La Casa di MiDa</strong></p>

</body>
</html>
