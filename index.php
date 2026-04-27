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


<?php
require_once 'db.php';

// Récupérer tous les étudiants avec leur filière
$stmt = $pdo->query("
    SELECT e.nom, e.prenom, f.nom_filiere, e.id_etudiant
    FROM etudiants e
    JOIN filieres f ON e.id_filiere = f.id_filiere
");
$etudiants = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include 'header.php'; ?>

<h2>Liste des étudiants</h2>
<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Filière</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($etudiants as $etudiant): ?>
            <tr>
                <td><?= htmlspecialchars($etudiant['nom']) ?></td>
                <td><?= htmlspecialchars($etudiant['prenom']) ?></td>
                <td><?= htmlspecialchars($etudiant['nom_filiere']) ?></td>
                <td>
                    <a href="update.php?id=<?= $etudiant['id_etudiant'] ?>">Modifier</a> |
                    <a href="delete.php?id=<?= $etudiant['id_etudiant'] ?>">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include 'footer.php'; ?>
