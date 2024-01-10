<?php
namespace Pokedex\Controllers;

// require_once __DIR__ . '/../Models/Pokemon.php';
// require_once __DIR__ . '/../Models/Type.php';

use Pokedex\Models\Pokemon;
// use Pokedex\Models\Type;

class CatalogController extends CoreController
{
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
     * Method to display all pokemon related to one type
     *
     * @param int $id
     * @return Pokemon[]
     */
    public function showType($id)
    {
        $pokemonByType = Pokemon::findAllByType($id, "", 'number');
        $this->show('home', ['pokemonByType' => $pokemonByType]);
    }
}
