<?php
require_once '../controlleur/UserController.php';  

// Créer une instance de UserController
$userController = new UserController();

// Récupérer tous les utilisateurs
$users = $userController->getUsers();

// Vérifier si le formulaire d'ajout a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_user'])) {
    $email = $_POST['email'];
    $titre = $_POST['titre'];  
    $date_départ = $_POST['date_départ'];
    $date_retour = $_POST['date_retour'];
    $prix = $_POST['prix'];
    $categorie = $_POST['categorie'];
    $disponible = isset($_POST['disponible']) ? 1 : 0; // 'disponible' est un booléen

    // Ajouter l'utilisateur à la base de données
    $userController->addUser([
        'email' => $email,
        'titre' => $titre,
        'date_départ' => $date_départ,
        'date_retour' => $date_retour,
        'prix' => $prix,
        'categorie' => $categorie,
        'disponible' => $disponible
    ]);

    // Rediriger pour éviter une soumission multiple du formulaire
    header('Location: ListeUser.php');
    exit;
}

// Vérifier si une requête de suppression est reçue
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $userController->deleteUser($id);

    // Rediriger après la suppression
    header('Location: ListeUser.php');
    exit;
}

// Vérifier si une requête de modification est reçue
if (isset($_GET['edit_id'])) {
    $id = $_GET['edit_id'];
    $user = $userController->getUserById($id);
}

// Vérifier si le formulaire de mise à jour a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_user'])) {
    $id = $_POST['id'];
    $email = $_POST['email'];
    $titre = $_POST['titre'];  
   
    $date_départ = $_POST['date_départ'];
    $date_retour = $_POST['date_retour'];
    $prix = $_POST['prix'];
    $categorie = $_POST['categorie'];
    $disponible = isset($_POST['disponible']) ? 1 : 0;

    // Mettre à jour l'utilisateur
    $userController->updateUser($id, $email, $titre,  $date_départ, $date_retour, $prix, $categorie, $disponible);

    // Rediriger pour éviter une soumission multiple du formulaire
    header('Location: ListeUser.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des utilisateurs</title>
    <style>
        :root {
            --bg-color: #f0f0f5;
            --text-color: #333;
            --table-bg: #fff;
            --primary-color: #4CAF50;
            --danger-color: #f44336;
            --hover-color: #f1f1f1;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .container {
            width: 90%;
            max-width: 800px;
            background: var(--table-bg);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: var(--primary-color);
            color: white;
            font-size: 16px;
        }

        tr:hover {
            background-color: var(--hover-color);
        }
        .action-buttons {
    display: flex;
    flex-direction: column;
    gap: 10px; /* Espacement entre les boutons */
    justify-content: center;
    align-items: center;
}


        .btn {
            padding: 8px 15px;
            text-decoration: none;
            color: white;
            border-radius: 5px;
            transition: 0.3s;
            font-size: 14px;
            display: block;
    width: 100%;
        }

        .btn-update {
            background-color: var(--primary-color);
        }
        .btn-update:hover {
            background-color: #388E3C;
        }

        .btn-delete {
            background-color: var(--danger-color);
        }
        .btn-delete:hover {
            background-color: #D32F2F;
        }

        @media (max-width: 600px) {
            th, td {
                font-size: 14px;
                padding: 8px;
            }
        }

        form {
            background-color: var(--table-bg);
            padding: 20px;
            margin-bottom: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }

        input, button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        button {
            background-color: var(--primary-color);
            color: white;
            border: none;
        }
        button:hover {
            background-color: #388E3C;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Liste des utilisateurs</h1>
        
        <!-- Formulaire d'ajout -->
        <form method="POST" action="ListeUser.php">
            <h2>Ajouter un utilisateur</h2>
            <label for="email">Email:</label>
            <input type="email" name="email" required><br>

            <label for="titre">Titre:</label>
            <input type="text" name="titre" required><br>

            

            <label for="date_départ">Date de départ:</label>
            <input type="date" name="date_départ" required><br>

            <label for="date_retour">Date de retour:</label>
            <input type="date" name="date_retour" required><br>

            <label for="prix">Prix:</label>
            <input type="number" step="0.01" name="prix" required><br>

            <label for="categorie">Categorie:</label>
            <input type="text" name="categorie" required><br>

            <label for="disponible">Disponible:</label>
            <input type="checkbox" name="disponible"><br>

            <button type="submit" name="add_user" class="btn btn-add">Ajouter</button>
        </form>

        <!-- Tableau des utilisateurs -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Titre</th>
                   
                    <th>Date de départ</th>
                    <th>Date de retour</th>
                    <th>Prix</th>
                    <th>Categorie</th>
                    <th>Disponible</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo htmlspecialchars($user['email']); ?></td>
                    <td><?php echo htmlspecialchars($user['titre']); ?></td>
                    
                    <td><?php echo $user['date_départ']; ?></td>
                    <td><?php echo $user['date_retour']; ?></td>
                    <td><?php echo $user['prix']; ?></td>
                    <td><?php echo $user['categorie']; ?></td>
                    <td><?php echo $user['disponible'] ? 'Oui' : 'Non'; ?></td>
                    <td>
                        <a href="ListeUser.php?edit_id=<?php echo $user['id']; ?>" class="btn btn-update">Modifier</a>
                        <a href="ListeUser.php?delete_id=<?php echo $user['id']; ?>" class="btn btn-delete" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">Supprimer</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <?php if (isset($user)): ?>
            <!-- Formulaire de mise à jour -->
            <form method="POST" action="ListeUser.php">
                <h2>Modifier un utilisateur</h2>
                <input type="hidden" name="id" value="<?php echo $user['id']; ?>" required>

                <label for="email">Email:</label>
                <input type="email" name="email" value="<?php echo $user['email']; ?>" required><br>

                <label for="titre">Titre:</label>
                <input type="text" name="titre" value="<?php echo $user['titre']; ?>" required><br>

                
                <label for="date_départ">Date de départ:</label>
                <input type="date" name="date_départ" value="<?php echo $user['date_départ']; ?>" required><br>

                <label for="date_retour">Date de retour:</label>
                <input type="date" name="date_retour" value="<?php echo $user['date_retour']; ?>" required><br>

                <label for="prix">Prix:</label>
                <input type="number" step="0.01" name="prix" value="<?php echo $user['prix']; ?>" required><br>

                <label for="categorie">Categorie:</label>
                <input type="text" name="categorie" value="<?php echo $user['categorie']; ?>" required><br>

                <label for="disponible">Disponible:</label>
                <input type="checkbox" name="disponible" <?php echo $user['disponible'] ? 'checked' : ''; ?>><br>

                <button type="submit" name="update_user" class="btn btn-update">Mettre à jour</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
