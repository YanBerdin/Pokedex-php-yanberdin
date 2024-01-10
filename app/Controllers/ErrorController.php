<?php

namespace Pokedex\Controllers;

class ErrorController extends CoreController

{
    public function error404()
    {
        header('HTTP/1.0 404 Not Found');
        $this->show("404");
    }

    /**
     * Affiche la page
     *
     * @param string $viewName
     * @param array $viewData (Facultatif)
     */
    // public function show($viewName, $viewData = [])
    // {
    // global $router; // Ca c'est hyper degueulasse mais pour l'instant ça fait le café

    // $baseUri = $_SERVER['BASE_URI'] . '/';
    //? global $router;
    //? $absoluteUri = $_SERVER['BASE_URI'];
    //TODO $absoluteUri = $_SERVER['BASE_URI']? $_SERVER['BASE_URI'] : '/';


    //     require_once __DIR__ . '/../partials/header.part.php';        
    //     require_once __DIR__ . '/../views/' . $viewName . '.tpl.php';
    //     require_once __DIR__ . '/../partials/footer.part.php';        
    // }
}
