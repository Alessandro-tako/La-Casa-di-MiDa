<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <title>{{ __('ui.mail_subject_penalty') }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            color: #333;
            font-size: 14px;
            padding: 30px;
            line-height: 1.6;
        }

        h1 {
            color: #bfa046;
            text-align: center;
            margin-bottom: 20px;
            font-size: 20px;
        }

        .section {
            margin-bottom: 10px;
        }

        .label {
            font-weight: bold;
            display: inline-block;
            width: 150px;
        }

        .footer {
            margin-top: 40px;
            font-size: 13px;
            text-align: center;
            color: #888;
        }

        .box {
            border: 1px solid #ccc;
            padding: 15px;
            border-radius: 5px;
            background-color: #fafafa;
            margin-top: 15px;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            max-height: 80px;
        }

        .meta {
            font-size: 13px;
            text-align: right;
            margin-bottom: 20px;
            color: #666;
        }
    </style>
</head>

<body>

    <div class="logo">
        <img src="{{ public_path('storage/images/loghi/logo-bianco-oro.jpg') }}" alt="Logo La Casa di MiDa">
    </div>

    <div class="meta">
        {{ __('ui.pdf_issued_on') }} {{ \Carbon\Carbon::now()->format('d/m/Y') }}<br>
        {{ __('ui.pdf_address') }}
    </div>

    <h1>{{ __('ui.pdf_penalty_receipt_title') }}</h1>

    <p>{{ __('ui.pdf_penalty_intro') }}</p>

    <div class="box">
        <div class="section"><span class="label">{{ __('ui.cliente') }}:</span> {{ $booking->guest_first_name }}
            {{ $booking->guest_last_name }}</div>
        <div class="section"><span class="label">{{ __('ui.email') }}:</span> {{ $booking->guest_email }}</div>
        <div class="section"><span class="label">{{ __('ui.camera') }}:</span> {{ $booking->room_name }}</div>
        <div class="section"><span class="label">{{ __('ui.periodo') }}:</span>
            {{ \Carbon\Carbon::parse($booking->check_in)->format('d/m/Y') }} →
            {{ \Carbon\Carbon::parse($booking->check_out)->format('d/m/Y') }}</div>
        <div class="section"><span class="label">{{ __('ui.penale_applicata') }}:</span> {{ $percentuale }}%</div>
        <div class="section"><span class="label">{{ __('ui.importo_addebitato') }}:</span> €
            {{ number_format($importo, 2, ',', '.') }}
        </div>
    </div>

    <div class="footer">
        {{ __('ui.pdf_footer') }}
    </div>

</body>

</html>
