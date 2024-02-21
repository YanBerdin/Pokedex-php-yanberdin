<?php

namespace Pokedex\Controllers;

// require_once __DIR__ . '/../Models/Pokemon.php';

use Pokedex\Models\Pokemon;

class MainController extends CoreController
{
    /**
     * Displays the catalog Home page.
     *
     * @return void
     */
    public function catalog()
    {
        $pokemonModel = new Pokemon;

        $pokemonList = $pokemonModel->findAll();
        $this->show("home", [
            'title' => 'Accueil',
            "pokemons" => $pokemonList
        ]);
    }
}
