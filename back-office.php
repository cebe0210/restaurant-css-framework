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
    <div class="container-fluid bg-dark text-white vh-100">
        <h1 class="text-center">Back-office</h1>

        <ul class="nav nav-tabs">
            <li class="nav-item">
            <a class="nav-link" href="#" onclick="contenu('back-office-contact.php')">Contact</a> 
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="contenu('back-office-livre-or.php')">Livre d'or</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="contenu('back-office-galerie.php')">Galerie</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" aria-disabled="true">Disabled</a>
            </li>
        </ul>
        
        <div id="content-container">
         <?php include 'back-office-livre-or.php' ?>
        </div> 
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="script-BO.js"></script>
</body>
</html>