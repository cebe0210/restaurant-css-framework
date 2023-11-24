//controle des onglets :
function contenu(page) {
    fetch(page)
        .then(reponse => reponse.text())
        .then(data => {
            document.getElementById('content-container').innerHTML = data;
        })
        .catch(error => console.error('erreur lors du chargement de la page.', error));
};
//contenu('back-office-contact.php')


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
                        location.reload();
                    } else {
                        alert("Erreur lors de la suppression du message. Réponse du serveur : " + response);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert("Erreur lors de la communication avec le serveur. Statut : " + textStatus + ", Erreur : " + errorThrown);
                }
            });
            
        }
        location.reload();
    });
    
});

//Delete message :

function deleteRow(commentId) {
    // Faire une requête AJAX pour supprimer la ligne
    $.ajax({
        type: 'POST',
        url: 'delete-livreor.php', // Assurez-vous que le chemin du fichier est correct
        data: { commentId: commentId },
        dataType: 'json',
        success: function (response) {
            if (response.success) {
                // Suppression réussie, mettez en œuvre les actions nécessaires
                alert('Commentaire supprimé avec succès');
                // Vous pouvez également mettre à jour la page ou masquer le commentaire supprimé
            } else {
                // Échec de la suppression, gestion des erreurs
                alert('Échec de la suppression du commentaire. Erreur : ' + response.error);
            }
        },
        error: function () {
            // Gestion des erreurs lors de la requête AJAX
            alert('Erreur lors de la requête AJAX pour supprimer le commentaire');
        }
    });
    console.log('Delete row with commentId:', commentId);
}

// publier commentaires :

// Ajoutez ceci à votre fichier JS

function publierCommentaire(commentId) {
    // Faites une requête AJAX pour mettre à jour la colonne 'publier' dans la base de données
    $.ajax({
        type: 'POST',
        url: 'publier-commentaire.php', // Assurez-vous que le chemin du fichier est correct
        data: { commentId: commentId },
        dataType: 'json',
        success: function (response) {
            if (response.success) {
                // Mise à jour réussie, mettez en œuvre les actions nécessaires
                alert('Commentaire publié avec succès');
                // Vous pouvez également mettre à jour la page ou effectuer d'autres actions
            } else {
                // Échec de la mise à jour, gestion des erreurs
                alert('Échec de la publication du commentaire. Erreur : ' + response.error);
            }
        },
        error: function () {
            // Gestion des erreurs lors de la requête AJAX
            alert('Erreur lors de la requête AJAX pour publier le commentaire');
        }
    });
}

