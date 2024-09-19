{{-- <!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <h1>{{ $user }}</h1>
    <p>Nombre d'épisodes : {{ $user }}</p>
</body>
</html>


 --}}
 <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rapport de la demande</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .header {
            text-align: center;
            font-size: 14pt;
            margin-bottom: 20px;
        }
        .subheader {
            font-size: 12pt;
            margin-bottom: 10px;
            font-weight: bold;
        }
        .content {
            margin-top: 20px;
            line-height: 1.6;
        }
        .footer {
            margin-top: 50px;
            text-align: right;
        }
        .signature {
            margin-top: 50px;
            text-align: right;
            font-size: 12pt;
        }
        h1 {
            font-size: 16pt;
            text-align: center;
        }
        .date {
            text-align: right;
            margin-top: -20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .highlight {
            background-color: #d9f2d9;
        }
    </style>
</head>
<body>

    <div class="header">
        <strong>INStaD Bénin</strong><br>
        Rapport sur la durée de vie d'une demande
    </div>

    <div class="date">
        Le {{ now()->format('d F Y') }}
    </div>

    <div class="content">
        <h1>Parcours de la demande</h1>
        <p>Ce rapport retrace le parcours complet de la demande associée à ,l'équipement:<b>{{ $equipement->nomM }}</b> . La demande a été initiée par {{ $user }} le  {{ $dateAffectation }}. Le technicien désigné pour traiter cette demande est {{ $technicien }}.</p>

        <p>Le traitement de la demande a été effectué selon les étapes décrites ci-dessous :
            <ul>
                <li><strong>Initialisation :</strong> La demande a été créée le {{ $tache->created_at->format('d/m/Y') }} avec la description suivante : "{{ $demande->description }}".</li>
                <li><strong>Traitement :</strong> <b>{{ $technicien }}</b> a pris en charge la demande et a indiqué le processus suivi pour résoudre le problème : "{{ $feedback}}". Le traitement a été effectué jusqu'au {{ $tache->date_traitement ? $tache->date_traitement->format('d/m/Y') : 'Non précisé' }}.</li>
                <li><strong>Conclusion :</strong> Le traitement a été complété le {{ $dateFin }} avec la description de la résolution : "{{ $feedback }}".</li>
                <li><strong>Feedback :</strong> L'utilisateur a fourni un feedback sur le service reçu : "{{ $feedback }}".</li>
            </ul>
        </p>

        @if($indisponibiliteTechnicien)
        <p>Dans l'éventualité où le technicien affecté a signalé une indisponibilité, le rapport indique que l'indisponibilité a été déclarée par {{ $indisponibiliteTechnicien }} le {{ $tache->date_indisponibilite ? $tache->date_indisponibilite->format('d/m/Y') : 'Non précisé' }}.</p>
        @endif

    </div>

    <div class="footer">
        <p>Je vous prie de bien vouloir agréer, Monsieur/Madame, l'expression de mes salutations distinguées.</p>
    </div>

    <div class="signature"><br><br><br>
        Directeur INStaD Bénin</p>
    </div>

</body>
</html>
