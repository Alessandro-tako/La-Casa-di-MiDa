<!DOCTYPE html>
<html lang="{{ $booking->locale }}">

<head>
    <meta charset="UTF-8">
    <title>{{ __('ui.mail_subject_pending') }}</title>
</head>

<body style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f9f9f9; color: #333; padding: 40px 20px;">

    <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.05);">

        {{-- Logo --}}
        <div style="text-align: center; margin-bottom: 30px;">
            <img src="{{ asset('storage/images/loghi/logo-bianco-oro.jpg') }}" alt="Logo La Casa di MiDa" style="max-height: 80px;">
        </div>

        <h2 style="color: #bfa046; text-align: center;">{{ __('ui.mail_heading_received') }}</h2>

        <p>{{ __('ui.mail_greeting') }} <strong>{{ $booking->guest_first_name }} {{ $booking->guest_last_name }}</strong>,</p>

        <p>{{ __('ui.mail_received_intro') }}</p>
        <p>{{ __('ui.mail_status_pending') }}</p>

        <p>{{ __('ui.mail_summary_intro') }}</p>

        <table cellpadding="6" cellspacing="0" border="0" style="margin: 20px 0; width: 100%; font-size: 16px;">
            <tr>
                <td style="width: 40%;"><strong>{{ __('ui.mail_room') }}:</strong></td>
                <td>{{ $booking->room_name }}</td>
            </tr>
            <tr>
                <td><strong>{{ __('ui.mail_checkin') }}:</strong></td>
                <td>{{ \Carbon\Carbon::parse($booking->check_in)->format('d/m/Y') }}</td>
            </tr>
            <tr>
                <td><strong>{{ __('ui.mail_checkout') }}:</strong></td>
                <td>{{ \Carbon\Carbon::parse($booking->check_out)->format('d/m/Y') }}</td>
            </tr>
            <tr>
                <td><strong>{{ __('ui.mail_guests') }}:</strong></td>
                <td>{{ $booking->guests }}</td>
            </tr>
            <tr>
                <td><strong>{{ __('ui.mail_total_price') }}:</strong></td>
                <td style="color: #bfa046; font-weight: bold;">€ {{ number_format($booking->price, 2, ',', '.') }}</td>
            </tr>
        </table>

        <p>{{ __('ui.mail_second_email_notice') }}</p>

        <p>
            {!! __('ui.mail_terms_link', [
                'url' => url('/termini-e-condizioni'),
                'label' => __('ui.mail_terms_text')
            ]) !!}
        </p>

        <hr style="margin: 30px 0; border: none; border-top: 1px solid #ddd;">

        <h4 style="color: #bfa046;">{{ __('ui.mail_mod_cancel_title') }}</h4>
        <p>{{ __('ui.mail_automated_notice') }}</p>
        <p>{{ __('ui.mail_provide_info') }}</p>
        <ul style="line-height: 1.8; padding-left: 20px; font-size: 16px;">
            <li>{{ __('ui.mail_info_name') }}</li>
            <li>{{ __('ui.mail_info_email') }}</li>
            <li>{{ __('ui.mail_info_booking_number') }}</li>
            <li>{{ __('ui.mail_info_reason') }}</li>
        </ul>
        <p>{{ __('ui.mail_contact_options') }}</p>
        <ul style="line-height: 1.8; padding-left: 20px; font-size: 16px;">
            <li>{!! __('ui.mail_contact_email', ['email' => 'info@lacasadimida.it']) !!}</li>
            <li>{!! __('ui.mail_contact_form', ['url' => url('/contatti')]) !!}</li>
        </ul>

        <p style="margin-top: 30px; font-size: 16px;">{{ __('ui.mail_saluti') }}<br><strong>La Casa di MiDa</strong></p>
    </div>

</body>

</html>
