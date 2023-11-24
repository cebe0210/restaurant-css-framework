<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $commentIdToDelete = $_GET['id'];

    // Ajoutez le code pour supprimer le commentaire avec l'ID $commentIdToDelete
    $stmt = $conn->prepare("DELETE FROM livreor WHERE id = ?");
    $stmt->bind_param("i", $commentIdToDelete);

    if ($stmt->execute()) {
        $stmt->close();
        header('Location: back-office.php');
        exit();
    } else {
        die('Error during execution of the statement: ' . $stmt->error);
    }
}
?>
