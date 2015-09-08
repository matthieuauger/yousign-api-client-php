<?php

/**
 * Cet exemple permet de :
 *     - vérifier que la configuration du client soit correct
 *     - vérifier que l'utilisateur puisse utiliser l'API.
 *
 *
 * Remarque :
 * ----------
 *
 * La méthode "connect()" permet de vérifier si l'utilisateur a bien accès à l'API.
 *
 * L'utilisation des autres méthodes ne nécessite pas de passer obligatoirement
 * par la méthode "connect()".
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

// Connection à l'API
$client->connect();

// Vérification que la connexion ait fonctionnée
if (!$client->isAuthenticated()) {
    echo 'Vous n\'avez pas d\'accès à l\'API Yousign ou une erreur est survenue : ';
    var_dump($client->getErrors());
} else {
    echo 'Félicitation, vous êtes authentifié';
}
