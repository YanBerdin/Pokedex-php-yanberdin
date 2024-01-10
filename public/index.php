<?php

use Pokedex\Controllers\ErrorController;
use Pokedex\Controllers\MainController;
use Pokedex\Controllers\CatalogController;

// 0. On doit récupérer les dépendances pour les rendre accessibles dans le projet (chargement automatique des dépendances)
// On doit require le fichier autoload.php pour cela                    <= Sinon fatal error , class AltoRouteur not found
require_once __DIR__ . '/../vendor/autoload.php';

// On inclut les dépendances, cad le(s) controllers
// require __DIR__ . '/../app/Controllers/MainController.php';
// require_once __DIR__ . "/../app/Controllers/ErrorController.php";
// require_once __DIR__ . "/../app/Controllers/CatalogController.php";
// require __DIR__ . "/../app/Models/Pokemon.php";
// require __DIR__ . "/../app/Utils/Database.php";

// V2 : On utilise AltoRouter
// 1. On créé une nouvelle instance de la classe AltoRouter

$router = new AltoRouter(); // <=  Si souligné pas grave vient d'un soucis d'IDE (VSCode)

// 2. On doit dire à AltoRouter la partie de l'URL à ne pas prendre en compte pour le mapping

// Pour cela, on va utiliser une variable fournie par le .htaccess
// dump($_SERVER);
//TODO dump( get_defined_vars() );  
// $_SERVER['BASE_URI'] contient la partie de l'URL à ne pas prendre en compte (
//  pour savoir à partir d'ou il doit faire correspondance)

//$router->setBasePath($_SERVER['BASE_URI']);  //  => =>  => avec REQUEST_URI il y a un '/' à la fin de l'URL 
// qu'on veut pouvoir utiliser comme nom de route
// = fais comparaison avec map match mais ne fait correspondance qu'avec ce qui est saisi apres ce segment d'URL
//   var_dump($router);

// Version bis
if (array_key_exists('BASE_URI', $_SERVER)) {
    $router->setBasePath($_SERVER['BASE_URI']);
} else {
    $_SERVER['BASE_URI'] = '/';
}
dump($_SERVER);
// Version Bing
// if (!isset($_SERVER['BASE_URI'])) {
//     $_SERVER['BASE_URI'] = '/';
// }

// 3. On fait le "mapping" cad la correspondance entre URL demandée et route associée
// map() prend 4 paramètres :
// - la méthode HTTP (GET/POST/PATCH/PUT/DELETE)
// - la route
// - la cible (target)
// - le nom de la route (facultatif) (Doit etre unique pour identifier cette route)
// http://altorouter.com/usage/mapping-routes.html

// Route pour la home
// Sur l'instance $router on appel la methode map() pour definir un nouveau mapping
$router->map(
    'GET',  // methode
    '/',    // Partie de l'URL qui correspond à la page demandée (route)
    [
        'controller' => MainController::class, // Target => on reconstruit notre ancien array $routes (en adaptant à altorouteur )
        'method' => 'catalog'
    ],
    'home'  // utile plus tard ; NB : ce nom de route doit être unique
);

$router->map(
    "GET",
    "/pokemon-catalog/[i:id]", //   "/pokemon-catalog"
    [
        'controller' => CatalogController::class,
        'method' => 'detail',
    ],
    'pokemon-catalog'
);


$router->map(
    "GET", // methode
    "/type-list", // Partie de l'URL qui correspond à la page demandée (route)
    [
        'controller' => CatalogController::class, // Target => on reconstruit notre ancien array $routes (en adaptant à altorouteur )
        'method' => 'type',
    ],
    'type-list' //  NB : ce nom de route doit être unique
);

// Dispatcher
// On utilise la méthode match() d'AltoRouter    (avant on utilsait $_GET et $requestedPage )
$match = $router->match();

// dump($match);

// Si $match contient une cible (target) ca signifie que l'URL demandée a bien une route correspondante
// Sinon, $match retourne "false"

// Si on a quelque chose dans $match, alors on peut faire la suite du traitement  (avant $match correspondait à $routes du dispatcheur)
//? if ($match) { // équivalent à if($match !== false) 

    // On doit récupérer le controller à utiliser
    // Avant on utilisait => $controllerToUse = $routes[$requestedPage]['controller'];
    //? $controllerToUse = $match['target']['controller'];
    // => on va chercher la valeur de $match à la clé 'target' à la clé 'controller' (voir var_dump $match)

    // On doit récupérer la méthode à appeler
    //? $methodToUse = $match['target']['method'];  // Avant on utilisait => $methodToUse = $routes[$requestedPage]['method'];
    // => on va chercher la valeur de $match à la clé 'target' à la clé 'method' (voir var_dump $match)


    // comme dans les versions precedentes
    // On instancie le controller
    //? $controller = new $controllerToUse(); // ( = Exactement la même méthode appelée que dans versions précédentes avant Altorouteur)

    // On appelle la méthode
    // $controller->$methodToUse(); // ( = Exactement la même méthode appelée que dans versions précédentes avant Altorouteur)
    //? $controller->$methodToUse($match['params']);
//? }
/*
    - Inclure nos controller
    - Faire un tableau qui contient les routes possibles
    - Récupérer la page demandée dans l'url avec $_GET
    - Faire un if else qui vérifie si la route demandée existe :
        - Soit on appel la bonne méthode du bon controller correspondant à notre route
        - Soit on affiche la page d'erreur 404
 */ //?else {
    //? $controller = new Pokedex\Controllers\ErrorController();
    //? $controller->error404();

    // version sans error controller
    // http_response_code(404);
//? }

// var_dump($dbh);

// var_dump( $controller);
// var_dump($absoluteURL);

// dispatcher makes association between controller and method
$dispatcher = new Dispatcher($match, '\Pokedex\Controllers\ErrorController::error404');

$dispatcher->setControllersArguments($router, $match);

$dispatcher->dispatch();

// dump($_SERVER);