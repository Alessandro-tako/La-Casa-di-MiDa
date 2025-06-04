<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>Nuovo messaggio dal sito</title>
</head>

<body
    style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f9f9f9; padding: 20px; color: #333;">

    <div
        style="max-width: 600px; margin: auto; background: #ffffff; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.05);">

        {{-- Logo --}}
        <div style="text-align: center; margin-bottom: 20px;">
            <img src="{{ asset('storage/images/loghi/logo-bianco-oro.jpg') }}" alt="Logo La Casa di MiDa"
                style="max-height: 80px;">
        </div>

        <h2 style="color: #bfa046; margin-bottom: 30px;">Messaggio ricevuto dal sito La Casa di MiDa</h2>

        <p style="font-size: 16px;"><strong>Nome:</strong> {{ $nome }}</p>
        <p style="font-size: 16px;"><strong>Email:</strong> {{ $email }}</p>

        <p style="font-size: 16px; margin-top: 20px;"><strong>Messaggio:</strong></p>
        <p style="white-space: pre-line; font-size: 16px;">{{ $messaggio }}</p>

        <hr style="margin: 30px 0; border: none; border-top: 1px solid #ccc;">

        <p style="font-size: 16px;">Ti aspettiamo in <strong>Via Carlo Cattaneo 10, Roma</strong>.</p>

        <p style="font-size: 16px;">
            Per maggiori dettagli ti invitiamo a consultare i
            <a href="{{ url('/termini-e-condizioni') }}" target="_blank" rel="noopener noreferrer"
                style="color: #bfa046; text-decoration: underline;">
                termini e condizioni della prenotazione
            </a>.
        </p>

        <hr style="margin: 30px 0; border: none; border-top: 1px solid #ccc;">

        <h4 style="color: #bfa046;">Modifica o annullamento</h4>
        <p style="font-size: 16px;">
            Se desideri annullare o modificare la tua prenotazione, puoi contattarci tramite il form presente sul sito
            oppure utilizzare il pulsante seguente:
        </p>

        <p style="margin: 20px 0;">
            <a href="mailto:info@lacasadimida.it?subject=Richiesta%20annullamento%20prenotazione%20ID%20{{ $booking->id }}&body=Salve,%0D%0Avorrei annullare la mia prenotazione per la {{ $booking->room_name }} dal {{ \Carbon\Carbon::parse($booking->check_in)->format('d/m/Y') }} al {{ \Carbon\Carbon::parse($booking->check_out)->format('d/m/Y') }}.%0D%0AGrazie."
                style="background-color:#bfa046; color:#ffffff; padding: 12px 20px; text-decoration: none; border-radius: 6px; font-size: 16px;"
                target="_blank" rel="noopener noreferrer">
                Richiedi modifica o annullamento
            </a>
        </p>

        <p style="font-size: 14px; color: #666;">
            Questa è una mail generata automaticamente. Per assistenza, puoi scriverci a
            <a href="mailto:info@lacasadimida.it" style="color: #bfa046;">info@lacasadimida.it</a>
            oppure utilizzare il
            <a href="{{ url('/contatti') }}" target="_blank" rel="noopener noreferrer"
                style="color: #bfa046; text-decoration: underline;">
                modulo contatti
            </a>
            presente sul nostro sito.
        </p>

        <p style="margin-top: 30px; font-size: 16px;">
            Cordiali saluti,<br>
            <strong>Lo staff di La Casa di MiDa</strong>
        </p>
    </div>
</body>

</html>
