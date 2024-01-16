<?php

namespace Pokedex\Controllers;

// require_once __DIR__ . '/../Models/Pokemon.php';

use Pokedex\Models\Pokemon;

class MainController extends CoreController
{
    // public function home() //  home() sur l'objet courant this appele show() en lui passant le parametre $viewname (préfixe du nom du template ici 'home')
    // {
    //     $this->show('home');
    // }

    // Affichage de la liste (page d'accueil)
    public function catalog()
    {
        $pokemonModel = new Pokemon;

        $pokemonList = $pokemonModel->findAll();
        $this->show("home", [
            'title' => 'Accueil',
            "pokemons" => $pokemonList
        ]);
    }

    /**
     * Affiche la page
     *
     * @param string $viewName
     * @param array $viewData (Facultatif)
     */
    //? public function show($viewName, $viewData = []) // show() s'occupe d'afficher les templates => Donc require des templates à afficher
    //? {
    //?  global $router;
    //? $absoluteUri = $_SERVER['BASE_URI'];


    // $modelPokemon = new Pokemon();
    // $allPokemons = $modelPokemon->findAll();

    // $modelPokemon = new Pokemon();
    // $fullPokemon = $modelPokemon->findAll();

    //?         require __DIR__ . '/../partials/header.part.php';
    //?         require __DIR__ . '/../views/' . $viewName . '.tpl.php';
    //?         require __DIR__ . '/../partials/footer.part.php';
    //?     }
}
