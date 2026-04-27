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
<?php
require_once 'db.php';

$stmt = $pdo->query("SELECT * FROM filieres");
$filieres = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajout étudiant</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1>Ajouter un étudiant</h1>
    <form action="traitement.php" method="POST">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" required><br>

        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" id="prenom" required><br>

        <label for="id_filiere">Filière :</label>
        <select name="id_filiere" id="id_filiere" required>
            <?php foreach ($filieres as $filiere): ?>
                <option value="<?= $filiere['id_filiere'] ?>">
                    <?= htmlspecialchars($filiere['nom_filiere']) ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <button type="submit">Ajouter</button>
    </form>
</body>
</html>
