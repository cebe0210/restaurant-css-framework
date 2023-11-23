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
    });
});