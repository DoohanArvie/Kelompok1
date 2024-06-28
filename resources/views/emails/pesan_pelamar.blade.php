<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subject }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background-color: #0056b3;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }

        .content {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.8em;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>{{ $subject }}</h1>
    </div>
    <div class="content">
        <p>Yth. Pelamar,</p>
        <p>{!! nl2br(e($pesanEmail)) !!}</p>
        <p>Terima kasih atas perhatian Anda.</p>
    </div>
    <div class="footer">
        <p>&copy; {{ date('Y') }} Job Vacancy App. All rights reserved </p>
        <p>Kabupaten Tangerang, Cisauk,, 15434</p>
    </div>
</body>

</html>
