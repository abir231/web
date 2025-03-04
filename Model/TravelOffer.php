<?php
class TravelOffer {
    // Attributs publics
    public int $id;
    public string $titre;
    public string $destination;
    public DateTime $date_depart;
    public DateTime $date_retour;
    public float $prix;
    public bool $disponible;
    public string $categorie;

    // Constructeur
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

    // Méthode show pour afficher les informations sous forme de tableau
    public function show() {
        echo '<table border="1" cellpadding="10" cellspacing="0" style="border-collapse: collapse;">';
        
        // En-têtes du tableau
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
        
        // Ligne avec les informations de l'offre
        echo '<tr>';
        echo '<td>' . $this->id . '</td>';              // Utilisation de la propriété directement
        echo '<td>' . $this->titre . '</td>';
        echo '<td>' . $this->destination . '</td>';
        echo '<td>' . $this->date_depart->format('Y-m-d') . '</td>';
        echo '<td>' . $this->date_retour->format('Y-m-d') . '</td>';
        echo '<td>' . $this->prix . ' €</td>';
        echo '<td>' . ($this->disponible ? 'Oui' : 'Non') . '</td>';
        echo '<td>' . $this->categorie . '</td>';
        echo '</tr>';
        
        echo '</table>';
    }

    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of titre
     */
    public function getTitre(): string
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     */
    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get the value of destination
     */
    public function getDestination(): string
    {
        return $this->destination;
    }

    /**
     * Set the value of destination
     */
    public function setDestination(string $destination): self
    {
        $this->destination = $destination;

        return $this;
    }

    /**
     * Get the value of date_depart
     */
    public function getDateDepart(): DateTime
    {
        return $this->date_depart;
    }

    /**
     * Set the value of date_depart
     */
    public function setDateDepart(DateTime $date_depart): self
    {
        $this->date_depart = $date_depart;

        return $this;
    }

    /**
     * Get the value of date_retour
     */
    public function getDateRetour(): DateTime
    {
        return $this->date_retour;
    }

    /**
     * Set the value of date_retour
     */
    public function setDateRetour(DateTime $date_retour): self
    {
        $this->date_retour = $date_retour;

        return $this;
    }

    /**
     * Get the value of prix
     */
    public function getPrix(): float
    {
        return $this->prix;
    }

    /**
     * Set the value of prix
     */
    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get the value of disponible
     */
    public function isDisponible(): bool
    {
        return $this->disponible;
    }

    /**
     * Set the value of disponible
     */
    public function setDisponible(bool $disponible): self
    {
        $this->disponible = $disponible;

        return $this;
    }

    /**
     * Get the value of categorie
     */
    public function getCategorie(): string
    {
        return $this->categorie;
    }

    /**
     * Set the value of categorie
     */
    public function setCategorie(string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }
}
?>