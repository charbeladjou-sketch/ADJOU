<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int) $_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $id_filiere = $_POST['id_filiere'];

    $stmt = $pdo->prepare("UPDATE etudiants 
                           SET nom = ?, prenom = ?, email = ?, id_filiere = ? 
                           WHERE id_etudiant = ?");
    $stmt->execute([$nom, $prenom, $email, $id_filiere, $id]);

    echo "Étudiant mis à jour avec succès.";
}
?>
