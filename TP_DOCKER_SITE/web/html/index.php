<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD Utilisateurs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Liste des Utilisateurs</h1>
            <a href="create.php" class="btn btn-primary">Ajouter un utilisateur</a>
        </div>
        
        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-hover table-responsive">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $stmt = $pdo->query("SELECT * FROM users");
                        while ($row = $stmt->fetch()) {
                            echo "<tr>
                                <td>{$row['id']}</td>
                                <td>" . htmlspecialchars($row['nom']) . "</td>
                                <td>" . htmlspecialchars($row['prenom']) . "</td>
                                <td>" . htmlspecialchars($row['email']) . "</td>
                                <td>
                                    <a href='update.php?id={$row['id']}' class='btn btn-sm btn-warning'>Modifier</a>
                                    <a href='delete.php?id={$row['id']}' class='btn btn-sm btn-danger' onclick='return confirm(\"Confirmer la suppression ?\")'>Supprimer</a>
                                </td>
                            </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
