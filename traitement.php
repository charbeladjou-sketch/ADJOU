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
<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $id_filiere = $_POST['id_filiere'];

    $stmt = $pdo->prepare("INSERT INTO etudiants (nom, prenom, id_filiere) VALUES (?, ?, ?)");
    $stmt->execute([$nom, $prenom, $id_filiere]);

    echo "Étudiant ajouté avec succès !";
}
?>
<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom']);
    $prenom = trim($_POST['prenom']);
    $id_filiere = (int) $_POST['id_filiere'];

    // Requête préparée sécurisée
    $stmt = $pdo->prepare("INSERT INTO etudiants (nom, prenom, id_filiere) VALUES (?, ?, ?)");
    $stmt->execute([$nom, $prenom, $id_filiere]);

    // Redirection vers la page principale
    header("Location: index.php");
    exit();
}
?>
