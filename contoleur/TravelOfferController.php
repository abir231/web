<?php

// Inclure la classe TravelOffer
require_once('C:\xampp\htdocs\TravelBookingMVC\model\traveloffer.php');

class TravelOfferController {

    // Méthode pour afficher les informations d'une offre de voyage
    public function showTravelOffer($offer) {
        // Vérifier si l'objet est une instance de TravelOffer
        if ($offer instanceof TravelOffer) {
            // Appeler la méthode show() de TravelOffer pour afficher les détails
            $offer->show();
        } else {
            echo "L'offre de voyage n'est pas valide.";
        }
    }
}
?>
