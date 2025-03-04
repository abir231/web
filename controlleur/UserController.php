<?php
require_once('../config.php');  // Connexion à la base de données

class UserController {

    // Fonction pour récupérer les utilisateurs
    public function getUsers() {
        $db = config::getConnexion(); // Connexion à la base de données
        $sql = "SELECT id, email, titre, date_départ, categorie, date_retour, prix, disponible FROM abir";  
        try {
            $query = $db->prepare($sql);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    // Fonction pour ajouter un utilisateur
    public function addUser($user) {
        $db = config::getConnexion(); 
        var_dump($user); // Connexion à la base de données
        $req =  "INSERT INTO abir (email, titre, prix, date_départ, categorie, date_retour, disponible) 
                 VALUES (:email, :titre, :prix, :date_départ, :categorie, :date_retour, :disponible)";
        
        try {
            // Exécution de la requête avec les données
            $query = $db->prepare($req);
            
            // Corrigez l'exécution en vous assurant que tous les paramètres sont bien définis
            $query->execute([
                'email' => $user['email'],
                'titre' => $user['titre'],
                'prix' => $user['prix'],
                'date_départ' => $user['date_départ'],
                'categorie' => $user['categorie'],
                'date_retour' => $user['date_retour'],
                'disponible' => $user['disponible']
            ]);
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    
    // Fonction pour supprimer un utilisateur
    public function deleteUser($id) {
        $db = config::getConnexion();
        $req = "DELETE FROM abir WHERE id = :id";  
        try {
            $query = $db->prepare($req);
            $query->execute(['id' => $id]);
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    // Fonction pour récupérer un utilisateur par son ID
    public function getUserById($id) {
        $db = config::getConnexion();
        $sql = "SELECT id, email, titre, date_départ, categorie, date_retour, prix, disponible FROM abir WHERE id = :id";
        try {
            $query = $db->prepare($sql);
            $query->execute(['id' => $id]);
            return $query->fetch();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    // Fonction pour mettre à jour un utilisateur
    public function updateUser($id, $email, $titre, $date_départ, $categorie, $date_retour, $prix, $disponible) {
        $db = config::getConnexion();
        $sql = "UPDATE abir SET email = :email, titre = :titre, date_départ = :date_départ, 
                categorie = :categorie, date_retour = :date_retour, prix = :prix, disponible = :disponible WHERE id = :id";
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id' => $id,
                'email' => $email,
                'titre' => $titre,
                'date_départ' => $date_départ,
                'categorie' => $categorie,
                'date_retour' => $date_retour,
                'prix' => $prix,
                'disponible' => $disponible
            ]);
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
}
?>
