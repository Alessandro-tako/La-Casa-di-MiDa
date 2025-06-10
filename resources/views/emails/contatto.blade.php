<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>Nuovo messaggio dal form contatti</title>
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

        <h2 style="color: #bfa046; margin-bottom: 30px;">Hai ricevuto un nuovo messaggio dal form contatti</h2>

        <p style="font-size: 16px;"><strong>Nome:</strong> {{ $nome }}</p>
        <p style="font-size: 16px;"><strong>Email:</strong> {{ $email }}</p>

        <p style="font-size: 16px; margin-top: 20px;"><strong>Messaggio:</strong></p>
        <p style="white-space: pre-line; font-size: 16px; border-left: 4px solid #bfa046; padding-left: 10px;">
            {{ $messaggio }}
        </p>

        <hr style="margin: 30px 0; border: none; border-top: 1px solid #ccc;">

        <p style="font-size: 14px; color: #666;">
            Questo messaggio è stato generato automaticamente dal sito
            <a href="{{ url('/') }}" style="color: #bfa046;">La Casa di MiDa</a>.
        </p>

        <p style="font-size: 16px; margin-top: 20px;">
            📬 Ti consigliamo di rispondere direttamente all’indirizzo <strong>{{ $email }}</strong> per dare
            seguito alla richiesta del cliente.
        </p>

        <p style="margin-top: 30px; font-size: 16px;">
            Buon lavoro,<br>
            <strong>Il sistema di La Casa di MiDa</strong>
        </p>
    </div>
</body>

</html>
