<?php

namespace Pokedex\Controllers;

use Pokedex\Models\Pokemon;
use Pokedex\Models\Type;

class CoreController
{
    protected $router;
    protected $match;

    public function __construct($router, $match) 
    {
        $this->router = $router;
        $this->match = $match;
    }
    
    public function show($viewName, $viewData = []) 
    {
        $typeList = Type::findAll("", 'name');
        $typeListById = [];
        foreach ($typeList as $typeElement) {
            $typeListById[$typeElement->getId()] = $typeElement;
        };
        
        
        $viewData['router'] = $this->router;
        $viewData['baseUri'] = $_SERVER['BASE_URI'];
        
        extract($viewData);
        
        require __DIR__ . '/../partials/header.part.php';
        require __DIR__ . '/../views/' . $viewName . '.tpl.php';
        require __DIR__ . '/../partials/footer.part.php';
    }
}