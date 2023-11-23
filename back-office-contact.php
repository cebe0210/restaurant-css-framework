<?php
include 'config.php';

// Insérer les données dans la base de données
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $prenom = $_POST["prenom"];
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $telephone = $_POST["telephone"];
    $objet = $_POST["objet"];
    $etablissement = $_POST["etablissement"];
    $message = $_POST["message"];

    try {
        // Préparer la déclaration d'insertion
        $stmt = $conn->prepare("INSERT INTO formulaire (prenom, nom, email, telephone, objet, etablissement, message) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $prenom, $nom, $email, $telephone, $objet, $etablissement, $message);

        // Exécuter la déclaration d'insertion
        $stmt->execute();

        echo "Le message a été enregistré avec succès dans la base de données.";
    } catch (Exception $e) {
        echo "Erreur lors de l'enregistrement du message : " . $e->getMessage();
    } finally {
        // Fermer la déclaration
        $stmt->close();
    }
} else {
    echo "La requête n'est pas une requête POST.";
}

// Récupérer les messages depuis la base de données (placez ceci à la fin pour éviter les erreurs après la fermeture de la connexion)
$result = $conn->query("SELECT * FROM formulaire");


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
            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3' viewBox='0 0 16 16'>
                <path d='M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z'/>
            </svg>
        </button>
        
        </td>
    </tr>";
}
echo "</table>";
$conn->close();

?>
