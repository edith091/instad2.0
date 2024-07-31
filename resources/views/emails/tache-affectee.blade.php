<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tâche Affectée | INStaD Bénin</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            padding: 20px;
            background-color: #3c8dbc;
            color: #ffffff;
            border-radius: 8px 8px 0 0;
            text-align: center;
        }

        .header img {
            max-width: 150px;
            height: auto;
        }

        .header h1 {
            margin: 10px 0;
            font-size: 24px;
        }

        .content {
            padding: 20px;
            font-size: 16px;
        }

        .content p {
            margin: 0 0 10px;
        }

        .content ul {
            list-style: none;
            padding: 0;
        }

        .content li {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #e0e0e0;
            border-radius: 4px;
            background-color: #f9f9f9;
        }

        .content li strong {
            color: #3c8dbc;
        }

        .footer {
            font-size: 14px;
            color: #666;
            text-align: center;
            padding: 10px 0;
            border-top: 1px solid #e0e0e0;
        }

        .footer p {
            margin: 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset('build/img/instad1.PNG') }}"  alt="INStaD Logo" class="brand-image img-circle elevation-3">
            <h1>Tâche Affectée</h1>
        </div>
        <div class="content">
            <p>Bonjour {{ $technicien->nom }},</p>
            <p>Vous avez été affecté à une nouvelle tâche. Voici les détails :</p>
            <ul>
                <li><strong>Description :</strong> {{ $demande->description }}</li>
                <li><strong>Date d'affectation :</strong> {{ $dateAffectation }}</li>
            </ul>
        </div>
        <div class="footer">
            <p>Merci pour votre attention.</p>
            <p>INStaD Bénin</p>
        </div>
    </div>
</body>

</html>
