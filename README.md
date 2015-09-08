[![Gitter](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/Yousign/yousign-api-client-php?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=body_badge)

# Client PHP de l'API SOAP Yousign (v1.3.0)

## Description

Ce client permet d'utiliser l'[API Soap de Yousign](http://developer.yousign.fr) via le langage PHP.

## Eléments requis

 - PHP 5.3.3+
 - Composer

## Installation

Ajoutez dans votre fichier composer.json :

```json
    {
        "repositories":  [
            {
                "type": "package",
                "package": {
                    "name": "nusphere/nusoap",
                    "version": "0.9.5",
                    "dist": {
                        "url": "http://downloads.sourceforge.net/project/nusoap/nusoap/0.9.5/nusoap-0.9.5.zip",
                        "type": "zip"
                    },
                    "autoload": {
                        "classmap": ["lib/"]
                    }
                }
            }
        ],
        
        "require": 
        {
            "yousign/yousign-api-client": "~1.3"
        }
    }
```

Ensuite lancez Composer via `php composer.phar update yousign/yousign-api-client`

## Installation sans Composer

Le client utilise par défaut Composer. Néanmoins, si vous ne souhaitez pas l'utiliser, vous pouvez également utiliser ce client.
L'installation et les mises à jours se feront juste manuellement.

Commencez par télécharger et décompressez l'archive du projet, ou faites un `git clone https://github.com/Yousign/yousign-api-client-php.git`,
dans le répertoire où vous souhaitez installer le client.

Téléchargez également la dernière version de la librairie [NuSoap](http://sourceforge.net/projects/nusoap/) et installez là au sein de votre projet.

Dans le fichier où vous souhaitez intégrer le client, incluez le fichier `src/YsApi.php` ainsi que le fichier `nusoap.php`.
Ensuite, créer une instance du client pour l'utiliser.

Exemple :

```php
// Inclusion des libraires 
require_once __DIR__.'/yousign-api-client-php/src/YsApi.php';
require_once __DIR__.'/lib/nusoap.php';

// Instance du client
$client = new \YousignAPI\YsApi(array(
    'environment' => 'demo',
    'login' => 'YOUR_LOGIN',
    'password' => 'YOUR_PASSWORD',
    'api_key' => 'YOUR_API_KEY',
);

// ...
```

## Installation sous Symfony 2.x

Il n'y a pas de bundle actuellement pour le client. 
Cependant, rien ne vous empêche d'utiliser ce dernier sous forme de service.

Exemple :

Commencez par définir dans votre fichier de paramètres, l'emplacement de votre fichier de configuration.

```yaml
; app/config/parameters.yml

; Copiez/collez `ysApiParameters.ini.dist` dans `app/config/ysApiParameters.ini`

[parameters]
    yousign_client_options:
        environment: 'demo'
        login: 'YOUR_LOGIN'
        password: 'YOUR_PASSWORD'
        api_key: 'YOUR_API_KEY'
```

Créez ensuite le service en passant en argument le chemin du fichier de configuration.

```yaml
; app/config/services.yml

services:
    yousign.client:
        class: YousignAPI\YsApi
        arguments:
            - %yousign_client_options%
```

Il ne vous reste plus qu'à utiliser le client comme un service.

```php
// src/AppBundle/Controller/HelloController.php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HelloController extends Controller
{
    public function indexAction()
    {
        $client = $this->get('yousign.client');
    }
}
```

## Configuration

Le contructeur du client requiert un tableau de paramètres. Les options de configuration suivantes sont disponibles:

 - environment
 - login
 - password
 - is_encrypted_password
 - api_key
 - ssl_enabled
 - cert_client_location
 - ca_chain_client_location
 - private_key_client_location
 - private_key_client_password

## Exemples

Des exemples d'utilisation du client peuvent être trouvés au sein du répertoire `~/YousignAPI/examples`.
Lancez le fichier `connection.php` pour vérifier que vous pouvez correctement accéder à l'API Yousign.
Si tel est le cas, lancez le script `cosignature_init.php` pour créer une cosignature avec deux utilisateurs et deux fichiers.
Vous pouvez ensuite lancer les scripts suivants:

 - `cosignature_list.php` : Pour lister les cosignatures créées
 - `cosignature_details.php` : Pour afficher les détails de la dernière cosignature créée
 - `cosignature_downloadFile.php` : Pour télécharger les fichiers de la dernière cosignature créée
