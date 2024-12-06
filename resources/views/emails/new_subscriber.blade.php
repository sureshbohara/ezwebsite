<?php 
  use App\Models\Setting;
  $setting = Setting::find(1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .email-wrapper {
            width: 100%;
            background-color: #ffffff;
            margin: 0 auto;
            max-width: 600px;
            border: 1px solid #dddddd;
        }
        .email-header {
            background-color: #007bff;
            padding: 20px;
            color: #ffffff;
            text-align: center;
        }
        .email-content {
            padding: 20px;
        }
        .email-footer {
            background-color: #f4f4f4;
            padding: 10px;
            text-align: center;
            font-size: 12px;
        }
        .social-icons a {
            margin: 0 5px;
        }
         .cta-button {
            background-color: #333;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <div class="email-header">
            <h1>{{ $title }}</h1>
        </div>
        <div class="email-content">
            <p>Hello Customer</p>
            {!! $description !!}

            <p>We are excited to keep you updated with our latest news and offers!</p>
            <p>Best regards,</p>
            <p><strong>{{ $setting->system_name }}</strong></p>

             <a href="#" class="cta-button" style="color: #fff;">Get Started</a>

        </div>
        <div class="email-footer">
            <p>Contact us: <a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a> | Phone: {{ $setting->phone }}</p>
            <p>Visit our website: <a href="https://www.same-daycourier.com/">www.same-daycourier.com</a></p>
            <div class="social-icons">
                @if($setting->facebook)
                    <a href="{{ $setting->facebook }}" target="_blank">
                        <img src="https://img.icons8.com/ios-filled/50/000000/facebook.png" alt="Facebook">
                    </a>
                @endif
                @if($setting->twitter)
                    <a href="{{ $setting->twitter }}" target="_blank">
                        <img src="https://img.icons8.com/ios-filled/50/000000/twitter.png" alt="Twitter">
                    </a>
                @endif
                @if($setting->linkedin)
                    <a href="{{ $setting->linkedin }}" target="_blank">
                        <img src="https://img.icons8.com/ios-filled/50/000000/linkedin.png" alt="LinkedIn">
                    </a>
                @endif
                @if($setting->instagram)
                    <a href="{{ $setting->instagram }}" target="_blank">
                        <img src="https://img.icons8.com/ios-filled/50/000000/instagram.png" alt="Instagram">
                    </a>
                @endif
            </div>
        </div>
    </div>
</body>
</html>
