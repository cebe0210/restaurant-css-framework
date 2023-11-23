<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Form is submitted, handle the data

    $pseudo = $_POST['pseudo'];
    $etoiles = $_POST['etoile'];
    $titre = $_POST['titre'];
    $message = $_POST['message'];

    // Ajout de débogage
    error_log("Form submitted. pseudo: $pseudo, etoile: $etoiles, titre: $titre, message: $message");

    try {
        $stmt = $conn->prepare("INSERT INTO livreor (pseudo, etoile, titre, message) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $pseudo, $etoiles, $titre, $message);
    
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


// The rest of your code to display the comments table

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

try {
    $stmt = $conn->prepare("SELECT id, date, pseudo, etoile, titre, message, validation FROM livreor");
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>" . htmlspecialchars($row['id']) . "</td>
            <td>" . htmlspecialchars($row['date']) . "</td>
            <td>" . htmlspecialchars($row['pseudo']) . "</td>
            <td>" . htmlspecialchars($row['etoile']) . "</td>
            <td>" . htmlspecialchars($row['titre']) . "</td>
            <td>" . htmlspecialchars($row['message']) . "</td>
            <td>   
                " . htmlspecialchars($row['validation']) . "
                <button type='button' class='btn btn-danger btn-sm' title='Supprimer' onclick='deleteRow(" . $row['id'] . ")'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3' viewBox='0 0 16 16'>
                        <path d='M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z'/>
                    </svg>
                </button>
            </td>
        </tr>";
    }
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
    echo "<br>Requête SQL : SELECT id, date, pseudo, etoile, titre, email, message, validation FROM livreor";
    echo "<br>Trace de pile : " . $e->getTraceAsString();
} finally {
    echo "</table>";
    if ($stmt !== null) {
        $stmt->close();
    }
    $conn->close();
}


?>

