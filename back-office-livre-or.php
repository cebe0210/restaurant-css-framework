<?php
include 'config.php';

//envoie les données du formulaire vers la DB :
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Form is submitted, handle the data

    $pseudo = $_POST['pseudo'];
    $etoiles = $_POST['etoile'];
    $titre = $_POST['titre'];
    $message = $_POST['message'];

    // Ajout de débogage
    error_log("Form submitted. pseudo: $pseudo, etoile: $etoile, titre: $titre, message: $message");

    try {
        $stmt = $conn->prepare("INSERT INTO livreor (pseudo, etoile, titre, message) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $pseudo, $etoile, $titre, $message);
    
        if (!$stmt) {
            die('Error during preparation of the statement: ' . $conn->error);
        }
    
        if ($stmt->execute()) {
            $stmt->close();
            header('Location: livre-or.php');
            exit();
        } else {
            die('Error during execution of the statement: ' . $stmt->error);
        }
    } catch (Exception $e) {
        $errorMessage = "Erreur : " . $e->getMessage();
        error_log($errorMessage);
        echo $errorMessage;
    } catch (mysqli_sql_exception $e) {
        $errorMessage = "Erreur SQL : " . $e->getMessage();
        error_log($errorMessage);
        echo $errorMessage;
    }
    
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



// Fonction pour afficher les commentaires
function displayComments() {
    global $conn;

    $stmt = $conn->prepare("SELECT id, date, pseudo, etoile, titre, message, publier FROM livreor");
    $stmt->execute();
    $result = $stmt->get_result();

    echo '<table class="table table-striped table-hover">
            <tr>
                <th>id</th>
                <th>date</th>
                <th>pseudo</th>
                <th>etoile</th>
                <th>titre</th>
                <th>message</th>
                <th>action</th>
            </tr>';

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>" . htmlspecialchars($row['id']) . "</td>
            <td>" . htmlspecialchars($row['date']) . "</td>
            <td>" . htmlspecialchars($row['pseudo']) . "</td>
            <td>" . htmlspecialchars($row['etoile']) . "</td>
            <td>" . htmlspecialchars($row['titre']) . "</td>
            <td>" . htmlspecialchars($row['message']) . "</td>
            <td>" . htmlspecialchars($row['publier']) . "</td>
            <td>
                <a href='delete-livreor.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm' title='Supprimer'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3' viewBox='0 0 16 16'>
                        <path d='...'></path>
                    </svg>
                </a>                
                <form method='post' action='back-office-livre-or.php'>
                    <input type='hidden' name='publishComment' value='1'>
                    <input type='hidden' name='commentIdToPublish' value='" . $row['id'] . "'>
                    <button type='submit' class='btn btn-success btn-sm' title='Publier'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-check2' viewBox='0 0 16 16'>
                            <path d='...'></path>
                        </svg>
                    </button>
                </form>
            </td>
        </tr>";
    }

    echo '</table>';
}

// Vérifier si le formulaire de publication a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['publishComment'])) {
    $commentIdToPublish = $_POST['commentIdToPublish'];
    
    // Ajoutez le code pour publier le commentaire avec l'ID $commentIdToPublish
    $stmt = $conn->prepare("UPDATE livreor SET publier = 1 WHERE id = ?");
    $stmt->bind_param("i", $commentIdToPublish);

    if ($stmt->execute()) {
        $stmt->close();
        header('Location: back-office-livre-or.php');
        exit();
    } else {
        die('Error during execution of the statement: ' . $stmt->error);
    }
}
// Appeler la fonction displayComments une seule fois après la boucle
displayComments();
?>


<!-- Votre code HTML pour l'affichage de la table -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Back Office</title>
    <!-- Ajoutez les liens vers vos fichiers CSS et JavaScript ici si nécessaire -->
</head>
<body>

    <h1>Back Office - Livre d'or</h1>

    <!-- Afficher les commentaires -->
    <?php displayComments(); ?>

</body>
</html>



