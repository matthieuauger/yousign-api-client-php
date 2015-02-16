# Client PHP de l'API SOAP Yousign (v1.3.0)

## Description

Ce client permet d'utiliser l'API Soap de Yousign via le langage PHP.

## Eléments requis

 - PHP 5.3.3+
 - Composer

## Installation

Placez le répertoire `YousignAPI` au sein de votre projet PHP.
En ligne de commande, allez dans le répertoire YousignAPI `cd /var/www/YousignAPI`.
Lancer l'installation via Composer `Composer install`.

## Configuration

Renommez le fichier `ysApiParameters.ini.dist` en `ysApiParameters.ini` présent dans le répertoire `YousignAPI`.
Modifiez ensuite la configuration avec les paramètres ci-dessous:

 - `login` : Votre identifiant Yousign (adresse email)
 - `password` : Votre mot de passe
 - `api_key` : Votre clé d'API

## Exemples

Des exemples d'utilisation du client peuvent être trouvés au sein du répertoire `~/YousignAPI/examples`.
Lancez le fichier `connection.php` pour vérifier que vous pouvez correctement accéder à l'API Yousign.
Si tel est le cas, lancez le script `cosignature_init.php` pour créer une cosignature avec deux utilisateurs et deux fichiers.
Vous pouvez ensuite lancer les scripts suivants:

 - `cosignature_list.php` : Pour lister les cosignatures créées
 - `cosignature_details.php` : Pour afficher les détails de la dernière cosignature créée
 - `cosignature_downloadFile.php` : Pour télécharger les fichiers de la dernière cosignature créée
