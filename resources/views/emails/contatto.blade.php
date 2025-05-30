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
        <p style="font-size: 0.9em; color: #777;">Questa email è stata generata automaticamente dal form contatti del sito.</p>
    </div>
</body>
</html>
