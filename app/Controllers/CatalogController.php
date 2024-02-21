<?php

namespace Pokedex\Controllers;
//TODO: remove comment
// require_once __DIR__ . '/../Models/Pokemon.php';
// require_once __DIR__ . '/../Models/Type.php';

use Pokedex\Models\Pokemon;
use Pokedex\Models\Type;

class CatalogController extends CoreController
{
    /**
     * Method to display one pokemon by number
     *
     * @param int $number = Pokemon's number
     * @return Pokemon
     */
    public function detail($number)
    {
        $pokemonModel = new Pokemon;
        $pokemon = $pokemonModel->findOne($number);
        $types = $pokemonModel->findTypesByPokemonNumber($number);

        $this->show("pokemon-card", [
            'title' => 'pokemon-card',
            "pokemon" => $pokemon,
            'types' => $types
        ]);
    }

    /**
     * Retrieves the type of the Pokemon.
     *
     * @return void
     */
    public function type()
    {
        $pokemonsModel = new Type;
        $typeList = $pokemonsModel->findAll();

        $this->show("type-list", [
            'title' => 'Liste des types',
            "types" => $typeList
        ]);
    }

    /**
     * Method to display all pokemons related to one type
     *
     * @param int $id
     * @return Pokemon[]
     */
    public function showType($id)
    {
        $pokemonsByType = Pokemon::findAllByType($id);
        $selectedType = Type::findOne($id);
        $this->show('type-catalog', [
            'title' => 'Pokemons filtrés par type',
            'pokemonsByType' => $pokemonsByType,
            'selectedType' => $selectedType
        ]);
    }
}
