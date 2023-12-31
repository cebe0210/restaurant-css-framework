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


// //envoie du form et data dans la DB.
// $(document).ready(function () {
//     $("form").submit(function (event) {
//         // Empêcher la soumission automatique du formulaire
//         event.preventDefault();

//         // Vérifier si le formulaire est valide
//         if (this.checkValidity()) {
//             // Récupérer les données du formulaire
//             var formData = $(this).serialize();

//             // Envoyer les données du formulaire à la page back-office-contact.php
//             $.post("back-office-contact.php", formData, function (response) {
//                 // Afficher l'alerte de succès
//                 $("#successAlert").fadeIn();

//                 // Réinitialiser le formulaire après 5 secondes
//                 setTimeout(function () {
//                     $("#successAlert").fadeOut();
//                     $("form")[0].reset();
//                 }, 5000);
//             });
//         }
//     });
// });

//envoie du form et data dans la DB.
document.addEventListener('DOMContentLoaded', function () {
    var form = document.querySelector('form');

    form.addEventListener('submit', function (event) {
        // Empêcher la soumission automatique du formulaire
        event.preventDefault();

        // Vérifier si le formulaire est valide
        if (this.checkValidity()) {
            // Récupérer les données du formulaire
            var formData = new FormData(this);

            // Envoyer les données du formulaire à la page back-office-contact.php
            fetch("back-office-contact.php", {
                method: 'POST',
                body: formData
            })
            .then(function(response) {
                return response.text();
            })
            .then(function(data) {
                // Afficher l'alerte de succès
                document.getElementById("successAlert").style.display = "block";

                // Réinitialiser le formulaire après 5 secondes
                setTimeout(function () {
                    document.getElementById("successAlert").style.display = "none";
                    form.reset();
                }, 5000);
            })
            .catch(function(error) {
                console.error('Erreur lors de l\'envoi de la requête AJAX :', error);
            });
        }
    });
});





// gestion des étoiles du livre d'or :
$(document).ready(function () {
    // Vérifie si le formulaire sur la page du livre d'or existe
    const form = $('#commentaire');
    if (!form.length) {
        return; // Sortir du script si le formulaire n'est pas présent
    }

    const ratingInputs = $('#etoiles input[type="radio"]');
    const ratingLabels = $('#etoiles label');

    form.on('change', function (event) {
        const selectedRating = event.target.value;

        // Mettre à jour les étoiles à gauche
        ratingLabels.each(function (index) {
            if (index < selectedRating) {
                $(this).css('color', 'gold');
            } else {
                $(this).css('color', 'lightgrey');
            }
        });
    });
});



