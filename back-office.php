<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="img/back-office.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Back-office</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Back-office</h1>

        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#" onclick="loadContent('back-office-contact.php')">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="loadContent('back-office-livre-or.php')">Livre d'or</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="loadContent('back-office-galerie.php')">Galerie</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" aria-disabled="true">Disabled</a>
            </li>
        </ul>
        
        <div id="content-container">
            <!-- Le contenu de l'onglet sera chargé ici -->
        </div>

    </div>
<script src="script-BO.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>