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
       // Marquer l'onglet comme actif
       var tabs = document.querySelectorAll('.nav-link');
       tabs.forEach(function(tab) {
           tab.classList.remove('active');
       });

       var currentTab = document.querySelector('.nav-link[data-page="' + page + '"]');
        currentTab.classList.add('active');

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

//delete message :
$(document).ready(function () {
    // Au clic sur un bouton de suppression
    $(".delete-btn").click(function () {
        // Récupérer l'ID du message à supprimer depuis l'attribut data-id
        var messageId = $(this).data("id");

        // Demander confirmation à l'utilisateur
        if (confirm("Êtes-vous sûr de vouloir supprimer ce message?")) {
            // Envoyer une requête AJAX pour supprimer le message
            $.ajax({
                type: "POST",
                url: "delete-message.php", // Assurez-vous d'ajuster le nom du fichier PHP de suppression
                data: { id: messageId },
                success: function (response) {
                    // Réponse du serveur après la suppression
                    if (response === "success") {
                        // Rafraîchir la liste des messages après la suppression réussie
                        loadContent('back-office-contact.php');
                    } else {
                        alert("Erreur lors de la suppression du message.");
                    }
                },
                error: function () {
                    alert("Erreur lors de la communication avec le serveur.");
                }
            });
        }
    });
});
