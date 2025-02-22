<?php

// Simple test pour vérifier que PHP fonctionne
echo "Le fichier TravelOffer.php est bien chargé!<br><br>";

// Définition de la classe TravelOffer
class TravelOffer {

    // Attributs privés de la classe
    private int $id;
    private string $titre;
    private string $destination;
    private DateTime $date_depart;
    private DateTime $date_retour;
    private float $prix;
    private bool $disponible;
    private string $categorie;

    // Constructeur paramétré pour initialiser les attributs de la classe
    public function __construct(int $id, string $titre, string $destination, DateTime $date_depart, DateTime $date_retour, float $prix, bool $disponible, string $categorie) {
        $this->id = $id;
        $this->titre = $titre;
        $this->destination = $destination;
        $this->date_depart = $date_depart;
        $this->date_retour = $date_retour;
        $this->prix = $prix;
        $this->disponible = $disponible;
        $this->categorie = $categorie;
    }

    // Méthodes pour accéder aux propriétés privées (getters)
    public function getId(): int {
        return $this->id;
    }

    public function getTitre(): string {
        return $this->titre;
    }

    public function getDestination(): string {
        return $this->destination;
    }

    public function getDateDepart(): DateTime {
        return $this->date_depart;
    }

    public function getDateRetour(): DateTime {
        return $this->date_retour;
    }

    public function getPrix(): float {
        return $this->prix;
    }

    public function getDisponible(): bool {
        return $this->disponible;
    }

    public function getCategorie(): string {
        return $this->categorie;
    }

    // Méthode pour afficher les informations relatives à l'offre de voyage dans un tableau HTML avec 7 colonnes
    public function show() {
        echo "La méthode show() a été appelée!<br>";  // Message de débogage

        // Début du tableau HTML
        echo '<table border="1" cellpadding="10" cellspacing="0" style="border-collapse: collapse;">';
        
        // En-têtes des colonnes
        echo '<tr>';
        echo '<th>ID</th>';
        echo '<th>Titre</th>';
        echo '<th>Destination</th>';
        echo '<th>Date de départ</th>';
        echo '<th>Date de retour</th>';
        echo '<th>Prix</th>';
        echo '<th>Disponible</th>';
        echo '<th>Categorie</th>';
        echo '</tr>';
        
        // Une seule ligne avec les informations de l'offre
        echo '<tr>';
        echo '<td>' . $this->getId() . '</td>';
        echo '<td>' . $this->getTitre() . '</td>';
        echo '<td>' . $this->getDestination() . '</td>';
        echo '<td>' . $this->getDateDepart()->format('Y-m-d') . '</td>';
        echo '<td>' . $this->getDateRetour()->format('Y-m-d') . '</td>';
        echo '<td>' . $this->getPrix() . ' €</td>';
        echo '<td>' . ($this->getDisponible() ? 'Oui' : 'Non') . '</td>';
        echo '<td>' . $this->getCategorie() . '</td>';
        echo '</tr>';
        
        // Fin du tableau HTML
        echo '</table><br>';
    }
}

// Test: créer une instance de TravelOffer et afficher les informations
$offre = new TravelOffer(
    1, 
    "Séjour à Paris", 
    "Une semaine de vacances à Paris avec visites guidées et hébergement 4 étoiles.", 
    new DateTime("2023-06-01"), 
    new DateTime("2023-06-07"), 
    1200.5, 
    true, 
    "Voyages en Europe"
);

// Appel de la méthode show() pour afficher l'offre
$offre->show();

?>
