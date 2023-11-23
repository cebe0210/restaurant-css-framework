<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $messageId = $_POST["id"];

    // Préparer la déclaration de suppression
    $stmt = $conn->prepare("DELETE FROM livreor WHERE id = ?");
    $stmt->bind_param("i", $messageId);

    // Exécuter la déclaration de suppression
    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "Erreur lors de la suppression du message : " . $stmt->error;
    }

    // Fermer la déclaration et la connexion
    $stmt->close();
    $conn->close();
}
?>