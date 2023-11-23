<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="img/back-office.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Test Delete Message</title>
</head>
<body>
    <div class="container-fluid bg-dark text-white">
        <h1 class="text-center">Test Delete Message</h1>

        <?php
        // Inclure le fichier de configuration
        include 'config.php';

        // Récupérer les messages depuis la base de données
        $result = $conn->query("SELECT * FROM formulaire");

        echo '<table class="table table-striped table-hover">
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Téléphone</th>
                <th>Email</th>
                <th>Objet</th>
                <th>Etablissement</th>
                <th>Message</th>
                <th>Action</th>
            </tr>';

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['date'] . "</td>
                <td>" . $row['prenom'] . "</td>
                <td>" . $row['nom'] . "</td>
                <td>" . $row['telephone'] . "</td>
                <td>" . $row['email'] . "</td>
                <td>" . $row['objet'] . "</td>
                <td>" . $row['etablissement'] . "</td>
                <td>" . $row['message'] . "</td>
                <td>   
                    <button type='button' class='btn btn-danger btn-sm delete-btn' data-id='" . $row['id'] . "' title='Supprimer'>
                        Supprimer
                    </button>
                </td>
            </tr>";
        }
        echo "</table>";

        // Fermer la connexion à la base de données
        $conn->close();
        ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script>
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
</script>

    </div>
</body>
</html>



