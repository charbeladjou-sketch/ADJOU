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

<?php
require_once 'db.php';

// Vérifier si un ID est passé
if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    // Récupérer les infos de l'étudiant
    $stmt = $pdo->prepare("SELECT * FROM etudiants WHERE id_etudiant = ?");
    $stmt->execute([$id]);
    $etudiant = $stmt->fetch(PDO::FETCH_ASSOC);

    // Récupérer toutes les filières
    $filieres = $pdo->query("SELECT * FROM filieres")->fetchAll(PDO::FETCH_ASSOC);
}

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom']);
    $prenom = trim($_POST['prenom']);
    $id_filiere = (int) $_POST['id_filiere'];
    $id = (int) $_POST['id_etudiant'];

    $stmt = $pdo->prepare("UPDATE etudiants SET nom = ?, prenom = ?, id_filiere = ? WHERE id_etudiant = ?");
    $stmt->execute([$nom, $prenom, $id_filiere, $id]);

    header("Location: index.php");
    exit();
}
?>

<?php include 'header.php'; ?>

<h2>Modifier un étudiant</h2>
<form method="post" action="update.php">
    <input type="hidden" name="id_etudiant" value="<?= $etudiant['id_etudiant'] ?>">

    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($etudiant['nom']) ?>" required>

    <label for="prenom">Prénom :</label>
    <input type="text" id="prenom" name="prenom" value="<?= htmlspecialchars($etudiant['prenom']) ?>" required>

    <label for="id_filiere">Filière :</label>
    <select id="id_filiere" name="id_filiere">
        <?php foreach ($filieres as $filiere): ?>
            <option value="<?= $filiere['id_filiere'] ?>" 
                <?= $filiere['id_filiere'] == $etudiant['id_filiere'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($filiere['nom_filiere']) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Enregistrer</button>
</form>

<?php include 'footer.php'; ?>
