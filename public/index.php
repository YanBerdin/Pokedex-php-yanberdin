<?php
// En-têtes de sécurité
header("Content-Security-Policy: default-src 'self'; script-src 'self' 'unsafe-inline' https://cdnjs.cloudflare.com https://stackpath.bootstrapcdn.com; style-src 'self' 'unsafe-inline' https://cdnjs.cloudflare.com https://fonts.googleapis.com https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css; font-src 'self' https://fonts.gstatic.com; img-src 'self' data:;");
header("Strict-Transport-Security: max-age=31536000; includeSubDomains");
header("X-Content-Type-Options: nosniff");
header("X-Frame-Options: DENY");
header("X-XSS-Protection: 1; mode=block");

use Pokedex\Controllers\ErrorController;
use Pokedex\Controllers\MainController;
use Pokedex\Controllers\CatalogController;

// 0. Récupérer les dépendances pour les rendre accessibles dans le projet (chargement automatique des dépendances)
// require le fichier autoload.php <= Sinon fatal error , class AltoRouteur not found
require_once __DIR__ . '/../vendor/autoload.php';

// 1. Instancier la classe AltoRouter
$router = new AltoRouter(); // <=  Si souligné pas grave vient d'un soucis d'IDE (VSCode)

// 2. Donner à AltoRouter la partie de l'URL à ne pas prendre en compte pour le mapping

// Pour cela, on va utiliser une variable fournie par le .htaccess
// dump($_SERVER);
// dump( get_defined_vars() );  
// $_SERVER['BASE_URI'] contient la partie de l'URL à ne pas prendre en compte (
//  pour savoir à partir d'ou il doit faire correspondance)

//$router->setBasePath($_SERVER['BASE_URI']);  //  => =>  => avec REQUEST_URI il y a un '/' à la fin de l'URL 
// qu'on veut pouvoir utiliser comme nom de route
// = fait comparaison avec map match mais ne fait correspondance qu'avec ce qui est saisi apres ce segment d'URL
//   var_dump($router);

// Version bis
if (array_key_exists('BASE_URI', $_SERVER)) {
    $router->setBasePath($_SERVER['BASE_URI']);
} else {
    $_SERVER['BASE_URI'] = '/';
}

// 3. "mapping" = correspondance entre URL demandée et route associée
//   map() prend 4 paramètres :
// - la méthode HTTP (GET/POST/PATCH/PUT/DELETE)
// - la route
// - la cible (target)
// - le nom de la route (facultatif) (Doit etre unique pour identifier cette route)
// http://altorouter.com/usage/mapping-routes.html
// Sur l'instance $router on appel la methode map() pour definir un nouveau mapping

// Route pour la home
$router->map(
    'GET',  // methode
    '/',    // Partie de l'URL qui correspond à la page demandée (route)
    [
        'controller' => MainController::class,
        'method' => 'catalog'
    ],
    'home'
);

$router->map(
    "GET",
    "/pokemon-card/[i:number]",
    [
        'controller' => CatalogController::class,
        'method' => 'detail',
    ],
    'pokemon-card'
);


$router->map(
    "GET",
    "/type-catalog/[i:id]",
    [
        'controller' => CatalogController::class,
        'method' => 'showtype',
    ],
    'type-catalog'
);


$router->map(
    "GET",
    "/type-list",
    [
        'controller' => CatalogController::class,
        'method' => 'type',
    ],
    'type-list'
);

// Dispatcher
// méthode match() d'AltoRouter
$match = $router->match();

// dump($match);
// Si $match contient une cible (target) ca signifie que l'URL demandée a bien une route correspondante
// Sinon, $match retourne "false"

// dispatcher makes association between controller and method
$dispatcher = new Dispatcher($match, '\Pokedex\Controllers\ErrorController::error404');

$dispatcher->setControllersArguments($router, $match);

$dispatcher->dispatch();

// dump($_SERVER);