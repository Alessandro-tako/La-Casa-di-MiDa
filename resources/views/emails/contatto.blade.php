<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>Nuovo messaggio dal sito</title>
</head>

<body style="font-family: sans-serif; background-color: #f9f9f9; padding: 20px; color: #333;">
    <div style="max-width: 600px; margin: auto; background: white; padding: 20px; border-radius: 8px;">
        <h2 style="color: #bfa046;">Messaggio dal sito La Casa di MiDa</h2>

        <p><strong>Nome:</strong> {{ $nome }}</p>
        <p><strong>Email:</strong> {{ $email }}</p>
        <p><strong>Messaggio:</strong></p>
        <p style="white-space: pre-line;">{{ $messaggio }}</p>

        <hr>
        <p>Ti aspettiamo in <strong>Via Carlo Cattaneo 10, Roma</strong>.</p>

        <p>Per maggiori dettagli ti invitiamo a consultare i
            <a href="{{ url('/termini-e-condizioni') }}" target="_blank"
                style="color: #bfa046; text-decoration: underline;">
                termini e condizioni della prenotazione
            </a>.
        </p>

        <hr style="margin: 30px 0; border: none; border-top: 1px solid #ccc;">

        <h4 style="color: #bfa046;">Modifica o annullamento</h4>
        <p>Se desideri annullare o modificare la tua prenotazione, ti invitiamo a scriverci tramite il form della
            sezione contatti del nostro sito indicando il motivo della richiesta, oppure cliccando sul pulsante qui
            sotto:</p>

        <p style="margin: 20px 0;">
            <a href="mailto:info@lacasadimida.it?subject=Richiesta%20annullamento%20prenotazione%20ID%20{{ $booking->id }}&body=Salve,%0D%0Avorrei annullare la mia prenotazione per la {{ $booking->room_name }} dal {{ \Carbon\Carbon::parse($booking->check_in)->format('d/m/Y') }} al {{ \Carbon\Carbon::parse($booking->check_out)->format('d/m/Y') }}.%0D%0AGrazie."
                style="background-color:#bfa046; color:#ffffff; padding: 10px 18px; text-decoration: none; border-radius: 6px;">
                Richiedi modifica o annullamento
            </a>
        </p>

        <p style="font-size: 0.9em; color: #666;">
            Questa è una mail generata automaticamente. Se hai domande o necessiti di assistenza, puoi scriverci a
            <a href="mailto:info@lacasadimida.it" style="color: #bfa046;">info@lacasadimida.it</a>
            oppure utilizzare il
            <a href="{{ url('/contatti') }}" style="color: #bfa046; text-decoration: underline;">modulo contatti</a>
            presente sul nostro sito.
        </p>

        <p style="margin-top: 30px;">Cordiali saluti,<br><strong>La Casa di MiDa</strong></p>
    </div>
</body>

</html>
