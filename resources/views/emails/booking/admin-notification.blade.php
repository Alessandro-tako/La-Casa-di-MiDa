<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>Nuova Prenotazione</title>
</head>

<body
    style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f9f9f9; color: #333; padding: 40px 20px;">

    <div
        style="max-width: 600px; margin: 0 auto; background-color: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.05);">

        {{-- Logo --}}
        <div style="text-align: center; margin-bottom: 30px;">
            <img src="{{ asset('storage/images/loghi/logo-bianco-oro.jpg') }}" alt="Logo La Casa di MiDa" style="max-height: 80px;">
        </div>

        <h2 style="color: #bfa046; text-align: center;">📬 Nuova prenotazione ricevuta!</h2>

        <p style="margin-top: 20px;">Hai ricevuto una nuova richiesta di prenotazione da parte di:</p>

        <table cellpadding="6" cellspacing="0" border="0" style="margin-top: 10px; width: 100%;">
            <tr>
                <td style="width: 40%;"><strong>Nome e Cognome:</strong></td>
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
                <td style="color: #bfa046; font-weight: bold;">€ {{ number_format($booking->price, 2, ',', '.') }}</td>
            </tr>
        </table>

        <hr style="margin: 30px 0; border: none; border-top: 1px solid #ddd;">

        <p>📌 Accedi al <strong>pannello di amministrazione</strong> per confermare o annullare la prenotazione.</p>

        <p style="margin: 20px 0; text-align: center;">
            <a href="{{ route('admin.prenotazioni') }}"
                style="background-color: #bfa046; color: #fff; padding: 10px 20px; text-decoration: none; border-radius: 6px; font-weight: bold;">
                Vai al pannello di controllo
            </a>
        </p>


        <p style="font-size: 0.9em; color: #888;">
            Questa è una notifica automatica generata dal sito. Non rispondere direttamente a questa email.
        </p>

        <p style="margin-top: 30px;">Cordiali saluti,<br><strong>Sistema Prenotazioni – La Casa di MiDa</strong></p>
    </div>

</body>

</html>
