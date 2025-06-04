<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>Penale Applicata</title>
</head>

<body
    style="background-color: #f9f9f9; padding: 40px 20px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: #333333;">

    <div
        style="max-width: 600px; margin: 0 auto; background: #ffffff; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.05);">

        {{-- Logo --}}
        <div style="text-align: center; margin-bottom: 30px;">
            <img src="{{ asset('storage/images/loghi/logo-bianco-oro.jpg') }}" alt="Logo La Casa di MiDa"
                style="max-height: 80px;">
        </div>

        <h2 style="color: #bfa046; text-align: center; margin-bottom: 30px;">Penale Applicata</h2>

        <p style="font-size: 16px;">Ciao <strong>{{ $booking->guest_first_name }}
                {{ $booking->guest_last_name }}</strong>,</p>

        <p style="font-size: 16px;">
            Ti informiamo che, in base ai termini e condizioni accettati al momento della prenotazione,
            è stata applicata una penale per la <strong>{{ $booking->room_name }}</strong>
            dal <strong>{{ \Carbon\Carbon::parse($booking->check_in)->format('d/m/Y') }}</strong>
            al <strong>{{ \Carbon\Carbon::parse($booking->check_out)->format('d/m/Y') }}</strong>.
        </p>

        <p style="font-size: 16px;">
            L’importo addebitato è di <strong>{{ number_format($amount, 2, ',', '.') }} €</strong>.
        </p>

        @if ($booking->penale_ricevuta_url)
            <p style="font-size: 16px;">
                Puoi visualizzare la ricevuta del pagamento cliccando qui:<br>
                <a href="{{ $booking->penale_ricevuta_url }}" target="_blank"
                    style="color: #bfa046; text-decoration: underline;">
                    Visualizza ricevuta
                </a>
            </p>
        @endif

        <p style="font-size: 16px;">Per ulteriori informazioni o chiarimenti, non esitare a contattarci:</p>

        <ul style="padding-left: 20px; font-size: 16px; line-height: 1.8;">
            <li>Email: <a href="mailto:info@lacasadimida.it" style="color: #bfa046;">info@lacasadimida.it</a></li>
            <li>Modulo contatti:
                <a href="{{ route('contatti') }}" target="_blank" style="color: #bfa046;">clicca qui</a>
            </li>
        </ul>

        <p style="margin-top: 40px; font-size: 16px;">
            Cordiali saluti,<br>
            <strong>Lo staff di La Casa di MiDa</strong>
        </p>
    </div>

</body>

</html>
