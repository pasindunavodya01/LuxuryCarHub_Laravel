<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
        }
        .header {
            background-color: #1a365d;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .content {
            background-color: #f8fafc;
            padding: 20px;
            border-radius: 5px;
            margin-top: 20px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #666;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>New Customer Inquiry</h1>
        </div>
        
        <div class="content">
            <p><strong>From:</strong> {{ $details['name'] }} ({{ $details['email'] }})</p>
            
            <div style="margin: 20px 0; padding: 15px; background-color: white; border-left: 4px solid #1a365d;">
                {{ $details['message'] }}
            </div>

            <p><small>This message was sent through LuxuryCarHub contact form.</small></p>
        </div>
        
        <div class="footer">
            <p>© {{ date('Y') }} LuxuryCarHub. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
