<?php
include 'config.php';

// Données fictives pour le test
$prenom = 'John';
$nom = 'Doe';
$email = 'john.doe@example.com';
$telephone = '123456789';
$objet = 'Information';
$etablissement = 'Bruxelles';
$message = 'Ceci est un testeeeeeeeeeeee.';

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
    // Fermer la déclaration et la connexion
    $stmt->close();
    $conn->close();
}
?>
