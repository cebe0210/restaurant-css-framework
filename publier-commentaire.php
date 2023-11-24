<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifier si l'ID du commentaire est défini dans la requête POST
    if (isset($_POST['commentId'])) {
        $commentId = $_POST['commentId'];

        // Mettre à jour la valeur de la colonne publier dans la base de données
        try {
            $stmt = $conn->prepare("UPDATE livreor SET publier = 1 WHERE id = ?");
            $stmt->bind_param("i", $commentId);

            if (!$stmt) {
                die('Error during preparation of the statement: ' . $conn->error);
            }

            if ($stmt->execute()) {
                $stmt->close();
                echo json_encode(['success' => true]);
                exit();
            } else {
                die('Error during execution of the statement: ' . $stmt->error);
            }
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'error' => $e->getMessage()]);
        } catch (mysqli_sql_exception $e) {
            echo json_encode(['success' => false, 'error' => $e->getMessage()]);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'Comment ID not provided']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request method']);
}
?>
