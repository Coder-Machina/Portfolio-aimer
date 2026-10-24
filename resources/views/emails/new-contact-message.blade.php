<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau message depuis votre portfolio</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            background-color: #0E0E0E;
            color: #F5F5F0;
            margin: 0;
            padding: 24px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #1A1A1A;
            border: 1px solid #2E2E2E;
            border-radius: 16px;
            overflow: hidden;
        }
        .header {
            background-color: #252525;
            padding: 24px;
            border-bottom: 2px solid #D4A847;
        }
        .header h1 {
            margin: 0;
            font-size: 20px;
            color: #F5F5F0;
        }
        .header p {
            margin: 4px 0 0 0;
            font-size: 13px;
            color: #D4A847;
            text-transform: uppercase;
            letter-spacing: 0.1em;
        }
        .content {
            padding: 28px 24px;
        }
        .field {
            margin-bottom: 20px;
        }
        .field-label {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: #909090;
            margin-bottom: 4px;
        }
        .field-value {
            font-size: 16px;
            color: #F5F5F0;
            font-weight: 500;
        }
        .message-box {
            background-color: #0E0E0E;
            border: 1px solid #2E2E2E;
            border-radius: 12px;
            padding: 16px;
            color: #F5F5F0;
            line-height: 1.6;
            white-space: pre-line;
            font-size: 15px;
        }
        .footer {
            padding: 20px 24px;
            background-color: #141414;
            border-top: 1px solid #2E2E2E;
            text-align: center;
        }
        .btn {
            display: inline-block;
            background-color: #D4A847;
            color: #0E0E0E !important;
            text-decoration: none;
            padding: 12px 24px;
            border-radius: 9999px;
            font-weight: 600;
            font-size: 14px;
            margin-top: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <p>Portfolio · Nouveau message</p>
            <h1>{{ $contact->subject }}</h1>
        </div>

        <div class="content">
            <div class="field">
                <div class="field-label">Expéditeur</div>
                <div class="field-value">{{ $contact->name }}</div>
            </div>

            <div class="field">
                <div class="field-label">Email de contact</div>
                <div class="field-value">
                    <a href="mailto:{{ $contact->email }}" style="color: #D4A847; text-decoration: none;">
                        {{ $contact->email }}
                    </a>
                </div>
            </div>

            <div class="field">
                <div class="field-label">Message</div>
                <div class="message-box">{{ $contact->message }}</div>
            </div>

            <div style="text-align: center; margin-top: 28px;">
                <a href="mailto:{{ $contact->email }}?subject=Re:%20{{ urlencode($contact->subject) }}" class="btn">
                    Répondre à {{ $contact->name }}
                </a>
            </div>
        </div>

        <div class="footer">
            <p style="margin: 0; font-size: 12px; color: #909090;">
                Message reçu le {{ $contact->created_at->format('d/m/Y à H:i') }} via le portfolio de {{ setting('site_name', 'AKODO Aimé D. Yves') }}.
            </p>
        </div>
    </div>
</body>
</html>
