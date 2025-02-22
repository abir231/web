<?php




// Inclure la classe TravelOffer
require_once('C:\xampp\htdocs\TravelBookingMVC\model\traveloffer.php');  // Assurez-vous que le chemin vers TravelOffer.php est correct

// Création d'une instance de TravelOffer
$offre1 = new TravelOffer(
    1,
    "Séjour à Paris",
    "Une semaine de vacances à Paris avec visites guidées et hébergement 4 étoiles.",
    new DateTime('2023-06-01'),
    new DateTime('2023-06-07'),
    1200.50,
    true,
    "Voyages en Europe"6
);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'Offre de Voyage</title>
</head>
<body>

    <h1>Détails de l'offre de voyage</h1>

    <!-- Affichage des informations avec var_dump -->
    <h2>Informations avec var_dump() :</h2>
    <pre>
        <?php var_dump($offre1); ?>
    </pre>

    <!-- Affichage des informations avec la méthode show() -->
    <h2>Informations avec la méthode show() :</h2>
    <?php $offre1->show(); ?>

</body>
</html>
