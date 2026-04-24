<?php
// Inclure la connexion
require_once 'db.php';

// Exemple : récupérer toutes les filières
$stmt = $pdo->query("SELECT * FROM filieres");
$filieres = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($filieres as $filiere) {
    echo $filiere['nom_filiere'] . "<br>";
}
?>
