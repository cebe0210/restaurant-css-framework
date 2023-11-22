/*cookie*/
function showCookieBanner(){
    let cookieBanner = document.getElementById("cb-cookie-banner");
    cookieBanner.style.display = "block";
}

function hideCookieBanner(){
    localStorage.setItem("cb_isCookieAccepted", "yes");
    let cookieBanner = document.getElementById("cb-cookie-banner");
    cookieBanner.style.display = "none";
}

function initializeCookieBanner(){
    let isCookieAccepted = localStorage.getItem("cb_isCookieAccepted");
    if(isCookieAccepted === null)
    {
    localStorage.setItem("cb_isCookieAccepted", "no");
    showCookieBanner();
    }
    if(isCookieAccepted === "no"){
    showCookieBanner();
    }
    }


//envoie du form et data dans la DB.
$(document).ready(function () {
    $("form").submit(function (event) {
        // Empêcher la soumission automatique du formulaire
        event.preventDefault();

        // Vérifier si le formulaire est valide
        if (this.checkValidity()) {
            // Récupérer les données du formulaire
            var formData = $(this).serialize();

            // Envoyer les données du formulaire à la page back-office-contact.php
            $.post("back-office-contact.php", formData, function (response) {
                // Afficher l'alerte de succès
                $("#successAlert").fadeIn();

                // Réinitialiser le formulaire après 5 secondes
                setTimeout(function () {
                    $("#successAlert").fadeOut();
                    $("form")[0].reset();
                }, 5000);
            });
        }
    });
});
