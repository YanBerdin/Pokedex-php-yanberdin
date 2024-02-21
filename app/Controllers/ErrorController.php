<?php

namespace Pokedex\Controllers;

/**
 * Class ErrorController
 * 
 * This class represents the controller for handling errors in the application.
 * It extends the CoreController class.
 */
class ErrorController extends CoreController

{
    public function error404()
    {
        header('HTTP/1.0 404 Not Found');
        $this->show("404");
    }
}
