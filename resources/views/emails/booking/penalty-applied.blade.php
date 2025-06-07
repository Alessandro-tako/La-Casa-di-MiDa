<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <title>{{ __('ui.mail_subject_penalty') }}</title>
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

        <h2 style="color: #bfa046; text-align: center; margin-bottom: 30px;">
            {{ __('ui.mail_subject_penalty') }}
        </h2>

        <p style="font-size: 16px;">
            {{ __('ui.mail_greeting') }} <strong>{{ $booking->guest_first_name }}
                {{ $booking->guest_last_name }}</strong>,
        </p>

        <p style="font-size: 16px;">
            {!! __('ui.mail_penalty_intro', [
                'room' => $booking->room_name,
                'checkin' => \Carbon\Carbon::parse($booking->check_in)->format('d/m/Y'),
                'checkout' => \Carbon\Carbon::parse($booking->check_out)->format('d/m/Y'),
            ]) !!}
        </p>

        <p style="font-size: 16px;">
            {!! __('ui.mail_penalty_amount', ['amount' => number_format($amount, 2, ',', '.')]) !!}
        </p>

        @if ($booking->penale_ricevuta_url)
            <p style="font-size: 16px;">
                {!! __('ui.mail_penalty_receipt') !!}<br>
                <a href="{{ $booking->penale_ricevuta_url }}" target="_blank"
                    style="color: #bfa046; text-decoration: underline;">
                    {{ __('ui.mail_penalty_view_receipt') }}
                </a>
            </p>
        @endif

        <p style="font-size: 16px;">
            {{ __('ui.mail_more_info') }}
        </p>

        <ul style="padding-left: 20px; font-size: 16px; line-height: 1.8;">
            <li>{!! __('ui.mail_contact_email', ['email' => 'info@lacasadimida.it']) !!}</li>
            <li>{!! __('ui.mail_contact_form', ['url' => route('contatti')]) !!}</li>
        </ul>


        <p style="margin-top: 40px; font-size: 16px;">
            {{ __('ui.mail_saluti') }}<br>
            <strong>La Casa di MiDa</strong>
        </p>
    </div>

</body>

</html>
