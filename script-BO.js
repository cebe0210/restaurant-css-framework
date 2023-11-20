function loadContent(page) {
    // Utilisez AJAX pour charger le contenu du fichier PHP
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("content-container").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", page, true);
    xhttp.send();
}

function showReplyForm(email) {
// Sélectionnez le formulaire de réponse par son ID (ajoutez un ID unique au formulaire)
var replyForm = document.getElementById('replyForm');

// Sélectionnez l'élément d'entrée d'adresse e-mail dans le formulaire
var emailInput = replyForm.querySelector('#replyFormControlInput');

// Préremplissez l'adresse e-mail
emailInput.value = email;

// Affichez le formulaire
replyForm.style.display = 'block';
}
