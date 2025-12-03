<?php
include 'db_connect.php';
$id = $_GET['id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "UPDATE users SET nom=?, prenom=?, email=? WHERE id=?";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$_POST['nom'], $_POST['prenom'], $_POST['email'], $id]);
    header("Location: index.php");
}
$stmt = $pdo->prepare("SELECT * FROM users WHERE id=?");
$stmt->execute([$id]);
$user = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Modifier</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Modifier l'utilisateur</h2>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Nom</label>
                <input type="text" name="nom" class="form-control" value="<?= $user['nom'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Prénom</label>
                <input type="text" name="prenom" class="form-control" value="<?= $user['prenom'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="<?= $user['email'] ?>" required>
            </div>
            <button type="submit" class="btn btn-warning">Mettre à jour</button>
            <a href="index.php" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</body>
</html>
