<?php
namespace Pokedex\Controllers;

// require_once __DIR__ . '/../Models/Pokemon.php';
// require_once __DIR__ . '/../Models/Type.php';

use Pokedex\Models\Pokemon;
use Pokedex\Models\Type;

class CatalogController extends CoreController
{

    public function type()
    {
        $pokemonsModel = new Type;

        $typeList = $pokemonsModel->findAll();
        $this->show("type-list", [
            "types" => $typeList
        ]);
    }
    /**
     * Method to display one pokemon by number
     *
     * @param int $number
     * @return Pokemon
     */
    public function detail($number)
    {
        $pokemonModel = new Pokemon;
        $pokemon = $pokemonModel->findOne($number);
        $this->show("pokemon-catalog", [
            "pokemon" => $pokemon
        ]);
    }

    /**
     * Affiche la page
     *
     * @param string $viewName
     * @param array $viewData (Facultatif)
     */

    //? public function show($viewName, $viewData = [])
    //? {
        // Si on veut transmettre aux templates une donnée, on peut le faire ici
        // $url = 'google.com';

        // Objectif : récupérer proprement tous nos assets (style, images, ...)
        // On doit utiliser une URL absolue (plutôt que relative) pour cela
        // On a vu que $_SERVER['BASE_URI'] contenait l'URL dont on a besoin
        //? global $router;
        //? $absoluteUri = $_SERVER['BASE_URI'];

        // $modelPokemon = new Pokemon();
        // $fullPokemon = $modelPokemon->findAll();


    //?     include (__DIR__ . '/../partials/header.part.php');
    //?    include (__DIR__ . '/../views/' . $viewName . '.tpl.php');
    //?     include (__DIR__ . '/../partials/footer.part.php');
    //? }
}
