<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <title>{{ __('ui.mail_subject_cancelled') }}</title>
</head>

<body
    style="background-color: #f9f9f9; padding: 40px 20px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: #333;">

    <div
        style="max-width: 600px; margin: 0 auto; background: #ffffff; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.05);">

        {{-- Logo --}}
        <div style="text-align: center; margin-bottom: 30px;">
            <img src="{{ asset('storage/images/loghi/logo-bianco-oro.jpg') }}" alt="Logo La Casa di MiDa"
                style="max-height: 80px;">
        </div>

        <h2 style="color: #bfa046; text-align: center; margin-bottom: 30px;">
            {{ __('ui.mail_heading_cancelled') }}
        </h2>

        <p>
            {{ __('ui.mail_greeting') }}
            <strong>{{ $booking->guest_first_name }} {{ $booking->guest_last_name }}</strong>,
        </p>

        <p>
            {!! __('ui.mail_cancelled_intro', [
                'room' => $booking->room_name,
                'checkin' => \Carbon\Carbon::parse($booking->check_in)->format('d/m/Y'),
                'checkout' => \Carbon\Carbon::parse($booking->check_out)->format('d/m/Y'),
            ]) !!}
        </p>

        <p>{{ __('ui.mail_cancelled_contact') }}</p>

        <ul style="padding-left: 20px; line-height: 1.8;">
            <li>{!! __('ui.mail_contact_email', ['email' => 'info@lacasadimida.it']) !!}</li>
            <li>{!! __('ui.mail_contact_form', ['url' => route('contatti')]) !!}</li>
        </ul>

        <p style="font-size: 16px;">
            {!! __('ui.mail_thanks_future') !!}
        </p>


        <p style="margin-top: 40px;">
            {{ __('ui.mail_saluti') }}<br>
            <strong>Lo staff di La Casa di MiDa</strong>
        </p>
    </div>

</body>

</html>
