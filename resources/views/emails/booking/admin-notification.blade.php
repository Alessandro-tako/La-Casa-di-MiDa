<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Nuova Prenotazione</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #ffffff; color: #000; padding: 20px;">
    <h2 style="color: #bfa046;">📬 Nuova prenotazione ricevuta!</h2>

    <p><strong>Ospite:</strong> {{ $booking->guest_first_name }} {{ $booking->guest_last_name }}</p>
    <p><strong>Email:</strong> {{ $booking->guest_email }}</p>
    <p><strong>Camera:</strong> {{ $booking->room_name }}</p>
    <p><strong>Check-in:</strong> {{ \Carbon\Carbon::parse($booking->check_in)->format('d/m/Y') }}</p>
    <p><strong>Check-out:</strong> {{ \Carbon\Carbon::parse($booking->check_out)->format('d/m/Y') }}</p>
    <p><strong>Ospiti:</strong> {{ $booking->guests }}</p>
    <p><strong>Prezzo totale:</strong> <span style="color: #bfa046;">€{{ number_format($booking->price, 2, ',', '.') }}</span></p>

    <hr style="margin: 20px 0; border: 1px solid #eee;">
    <p>📌 Accedi al pannello di amministrazione per visualizzare tutti i dettagli della prenotazione.</p>
</body>
</html>
