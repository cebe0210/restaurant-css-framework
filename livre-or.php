<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">    
    <title>Livre d'or</title>
    <link rel="icon" href="img/farfalle.png" type="image/x-icon" sizes="32x32">
</head>
<body>
    <div class="container-fluid bg-dark text-white ">

<div class="row">
    <header class="col-md-12">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse" id="navbarToggleExternalContent" data-bs-theme="dark">
                    <div class="bg-dark p-4">
                        <h5 class="text-body-emphasis fs-3">Menu</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href="index.html" class="link-secondary fs-4">Acceuille</a></li>
                            <li class="list-group-item"><a href="menu.html" class="link-light fs-4">Menu</a></li>
                            <li class="list-group-item"><a href="suggestions.html" class="link-light fs-4">Galerie</a></li>
                            <li class="list-group-item"><a href="about.html" class="link-light fs-4">A propos</a> </li>
                            <li class="list-group-item"><a href="livre-or.php" class="link-light fs-4">Livre d'or</a></li>
                            <li class="list-group-item"><a href="contact.html" class="link-light fs-4">Contact</a></li>
                          </ul>
                    </div>
                </div>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
                    <div class="navbar-nav border-bottom border-secondary">
                        <a class="nav-link mx-3 fs-4" href="index.html">Accueil</a>
                        <a class="nav-link mx-3 fs-4" href="menu.html">Menu</a>
                        <a class="nav-link mx-3 fs-4" href="suggestions.html">Galerie</a>
                        <a class="nav-link mx-3 fs-4" href="about.html">À propos</a>
                        <a class="nav-link active font-size-larger mx-3 fs-4" aria-current="page" href="livre-or.php">Livre d'or</a>
                        <a class="nav-link mx-3 fs-4" href="contact.html">Nous contacter</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
</div>

<div class="row">
            <form class="mt-5" id="commentaire" method="post" action="back-office-livre-or.php">
                <div class="row ">
                    <div class="col-12 col-md-10 col-xl-8 mb-3 mx-auto d-flex align-items-center">    
                        <input type="text" id="pseudo" class="form-control" name="pseudo" placeholder="Pseudo" aria-label="pseudo" required>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-12 col-md-10 col-xl-8 mb-3 mx-auto" id="etoiles">
                        <input type="radio" class="star" name="etoile" id="star1" value="1"><label for="star1"></label>
                        <input type="radio" class="star" name="etoile" id="star2" value="2"><label for="star2"></label>
                        <input type="radio" class="star" name="etoile" id="star3" value="3"><label for="star3"></label>
                        <input type="radio" class="star" name="etoile" id="star4" value="4"><label for="star4"></label>
                        <input type="radio" class="star" name="etoile" id="star5" value="5"><label for="star5"></label>
                    </div>
                </div>
                <div class="row">          
                    <div class="col-12 col-md-10 col-xl-8 mb-3 mx-auto d-flex align-items-center">
                        <input type="text" id="titre" class="form-control" name="titre" placeholder="Titre" aria-label="tire" required>
                    </div>
                </div>
       
                </div>    
                <div class="row">
                    <div class="col-12 col-md-10 col-xl-8 mb-3 mx-auto d-flex align-items-center">
                    <textarea id="message" class="form-control" name="message" placeholder="Votre message" id="floatingTextarea4" required></textarea>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 col-xl-8 mb-3 text-center">
                        <button type="submit" class="btn btn-success" id="AlertBtn">Soumettre</button>
                    </div>   
                </div>         
            </form>
        
          <div class="alert alert-success mx-auto" id="successAlert" role="alert" style="display: none;">
            <h4 class="alert-heading">Message envoyé avec succès!</h4>
            <p>Merci d'avoir soumis votre message. Nous avons bien reçu votre demande et nous vous répondrons dans les plus brefs délais.</p>
          </div>
    <!-- Affichage des commentaires : -->
    <div class="commentaire">
        <?php
        include 'config.php';
        echo '<div class="card-body">';

        try {
            $stmt = $conn->prepare("SELECT id, date, pseudo, etoile, titre, message, publier FROM livreor WHERE publier = 1");
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
                echo '<div class="card col-12 col-md-10 col-xl-8 mb-3 mx-auto">';
                echo '<div class="card-header">';
                echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
            </svg>' . htmlspecialchars($row['pseudo']) . ' : '; 
                $etoile = intval($row['etoile']); // Convertir la valeur de 'etoile' en un entier
                for ($i = 0; $i < $etoile; $i++) {
                echo '★';
                }   
                echo '</div>';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . htmlspecialchars($row['titre']) . '</h5>';
                echo '<p class="card-text">' . htmlspecialchars($row['message']) . '</p>';
                echo '<small>' . date("F, Y", strtotime($row['date'])) . '</small>';
                echo '</div>';
                echo '</div>';
            }
            
        } catch (Exception $e) {
            echo "Erreur : " . $e->getMessage();
        } finally {
            if ($stmt !== null) {
                $stmt->close();
            }
            $conn->close();
        }
        
        echo '</div>';
        
        ?>
    </div>



 
        


        <!--Footer-->
        <footer class="text-center">
            <?php include 'footer.php' ?>
        </footer> 
    </div>
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    
</body>
</html>
