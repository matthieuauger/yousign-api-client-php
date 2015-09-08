<?php

/**
 * Cet exemple permet de récupérer les cosignatures créées.
 * Ici, les 30 dernières demandes de signature peu importe le statut.
 *
 * Remarque :
 * ----------
 *
 * L'utilisateur doit être authentifié (cf l'exemple: 'connection.php')
 */

// Inclusion du loader
$loader = require_once dirname(__FILE__).'/../vendor/autoload.php';

use YousignAPI\YsApi;

// Création du client en passant les identifiants en paramètres
$client = new YsApi(
    array(
        'environment' => 'demo',
        'login' => 'YOUR_LOGIN',
        'password' => 'YOUR_PASSWORD',
        'api_key' => 'YOUR_API_KEY',
    )
);

// Options de recherche
$options = array(
    'search' => '',  // On recherche tout
    'firstResult' => 0,   // A partir du premier résultat
    'count' => 30,  // Nombre de résultat retourné
    'status' => '',   // Peu importe le statut
);

// Appel du client
$result = $client->getListCosign($options);

// Affichage du/des résultats
if ($result === false) {
    echo 'Une erreur est survenue :';
    var_dump($client->getErrors());
} else {
    echo 'Listing des cosignatures récupérées : ';

    foreach ($result as $value) {
        var_dump($value);
        echo '<hr />';
    }
}
