<?php
require_once 'db.php';

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    $stmt = $pdo->prepare("DELETE FROM etudiants WHERE id_etudiant = ?");
    $stmt->execute([$id]);

    echo "Étudiant supprimé avec succès.";
}
?>
