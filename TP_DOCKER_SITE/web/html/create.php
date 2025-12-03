<?php
include 'db_connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "INSERT INTO users (nom, prenom, email) VALUES (?, ?, ?)";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$_POST['nom'], $_POST['prenom'], $_POST['email']]);
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Ajouter</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Ajouter un utilisateur</h2>
        <form method="POST" class="mt-3">
            <div class="mb-3">
                <label class="form-label">Nom</label>
                <input type="text" name="nom" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Prénom</label>
                <input type="text" name="prenom" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Enregistrer</button>
            <a href="index.php" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</body>
</html>
