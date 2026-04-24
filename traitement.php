<?php
require_once 'db.php';

// Exemple : insérer un étudiant
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $id_filiere = $_POST['id_filiere'];

    $stmt = $pdo->prepare("INSERT INTO etudiants (nom, prenom, email, id_filiere) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nom, $prenom, $email, $id_filiere]);

    echo "Étudiant ajouté avec succès !";
}
?>
