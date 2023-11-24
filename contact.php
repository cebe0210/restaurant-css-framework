<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="customstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">    
    <title>La Follia della Pasta : Contact</title>
    <link rel="icon" href="img/farfalle.png" type="image/x-icon" sizes="32x32">

</head>
<body> 
     <div class="container-fluid bg-dark text-white vh-100">

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
                                    <li class="list-group-item"><a href="index.html" class="link-light fs-4">Acceuille</a></li>
                                    <li class="list-group-item"><a href="menu.html" class="link-light fs-4">Menu</a></li>
                                    <li class="list-group-item"><a href="suggestions.html" class="link-light fs-4">Galerie</a></li>
                                    <li class="list-group-item"><a href="about.html" class="link-light fs-4">A propos</a> </li>
                                    <li class="list-group-item"><a href="contact.html" class="link-secondary fs-4">Contact</a></li>
                                  </ul>
                            </div>
                        </div>
                        <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
                            <div class="navbar-nav border-bottom border-secondary">
                                <a class="nav-link mx-3 fs-4" href="index.html">Accueil</a>
                                <a class="nav-link mx-3 fs-4" href="menu.html">Menu</a>
                                <a class="nav-link mx-3 fs-4" href="suggestions.html">Galerie</a>
                                <a class="nav-link mx-3 fs-4" href="about.html">À propos</a>
                                <a class="nav-link active font-size-larger mx-3 fs-4" aria-current="page" href="contact.html">Nous contacter</a>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
        </div> 

        <h1 class="text-center mt-3">Nous contacter</h1>
    
       
        <div class="row">
            <form class="mt-5" id="soumettre" method="post" action="back-office-contact.php">
                <div class="row ">
                    <div class="col-12 col-md-10 col-xl-8 mb-3 mx-auto d-flex align-items-center">    
                        <input type="text" id="prenom" class="form-control" name="prenom" placeholder="Prénom" aria-label="prénom" required>
                    </div>
                </div>
                <div class="row">          
                    <div class="col-12 col-md-10 col-xl-8 mb-3 mx-auto d-flex align-items-center">
                        <input type="text" id="nom" class="form-control" name="nom" placeholder="Nom" aria-label="nom" required>
                    </div>
                </div>
                <div class="row">          
                    <div class="col-12 col-md-10 col-xl-8 mb-3 mx-auto d-flex align-items-center">                    
                        <input type="email" id="email" class="form-control" name="email" placeholder="Email" aria-label="email" required>
                    </div>
                </div>    
                <div class="row">          
                    <div class="col-12 col-md-10 col-xl-8 mb-3 mx-auto d-flex align-items-center">
                        <input type="text" id="telephone" class="form-control" name="telephone" placeholder="Numéro de Téléphone" aria-label="phone" required>
                    </div>
                </div>   
                <div class="row mb-3 justify-content-center">
                    <div class="col-6 col-md-5 col-xl-4">
                        <label for="objet">Objet :</label>
                        <select id="objet" class="form-select" name="objet" aria-label="objet">
                            <option value="Information">Information</option>
                            <option value="Reservation">Reservation</option>
                            <option value="Suggestion">Suggestion</option>
                            <option value="autre">Autre</option>
                        </select>
                    </div>
                    <div class="col-6 col-md-5 col-xl-4">
                        <label for="objet">Etablissement :</label>
                        <select id="etablissement" class="form-select" name="etablissement" aria-label="etablissement">
                            <option value="bruxelles">Bruxelles</option>
                            <option value="namur">Namur</option>
                            <option value="liège">Liège</option>
                            <option value="arlon">Arlon</option>
                            <option value="charleroi">Charleroi</option>
                            <option value="antwerpen">Antwerpen</option>
                            <option value="gent">Gent</option>
                        </select>
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
</div>
             
                      
      

            <!--reseaux socieaux-->
            <div class="row">
                <div class="col-10 col-md-8 col-xl-6 mb-5 justify-content-between d-flex  mx-auto social">
                    <a class="icon-link icon-link-hover" href="https://www.instagram.com" target="_blank" title="Instagram">
                        <img src="icon/Instagram.png" alt="Instagram" class="img-fluid" style="max-width: 50px;">
                    </a>
                    <a href="https://www.facebook.com" target="_blank" title="Facebook">
                        <img src="icon/Facebook.png" alt="Facebook" class="img-fluid" style="max-width: 50px;">
                    </a>
                    <a href="https://www.twitter.com" target="_blank" title="Twitter">
                        <img src="icon/twitter.png" alt="Twitter" class="img-fluid" style="max-width: 50px;">
                    </a>        
                    <a href="https://www.linkedin.com" target="_blank" title="Linkedin">
                        <img src="icon/linkedin.png" alt="linkedin" class="img-fluid" style="max-width: 50px;">
                    </a>    
                    <a href="https://www.tiktok.com" target="_blank" title="TikTok">
                        <img src="icon/tiktok.png" alt="Tiktok" class="img-fluid" style="max-width: 50px;">
                    </a>               
                </div>
            </div>


        <div class="row">
        <footer class="col-12 text-center">
            <h4>Contactez-nous</h4>
            <p>Adresse : 123 Rue de la Pasta, 1000 Bruxelles<br>
            Téléphone : +32 123 456 789<br>
            Email : info@follia.pasta</p>
            <hr>
            <p class=>© 2023 La Follia della Pasta - Tous droits réservés.</p>
        
        <!-- Cookie Banner -->
            <div id="cb-cookie-banner" class="alert alert-dark text-center mb-0" role="alert">
                🍪 Ce site utilise des cookies afin de vous fournir la meilleure expérience possible. 
                <a href="https://www.cookiesandyou.com/" target="blank">En apprendre plus</a>
                <button type="button" class="btn btn-primary btn-sm ms-3" onclick="window.cb_hideCookieBanner()">
                J'ai compris
                </button>
            </div>
        
        </footer>   
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="script.js"></script>   

</body>
</html>