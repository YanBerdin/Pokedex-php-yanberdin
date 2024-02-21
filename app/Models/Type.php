<?php

namespace Pokedex\Models;

use PDO;
use Pokedex\Utils\Database;

class Type extends CoreModel
{
    // private $id;
    // private $name;
    private $color;

    /**
     * Method to retrieve all pokemon's type
     *
     * @param string $sort
     * @return Type[]
     */
    public static function findAll($sort = "")
    {

        $pdo = Database::getPDO();

        $queryString = "SELECT * FROM `type`";
        if ($sort !== "") {
            $queryString .= " ORDER BY $sort";
        }

        $pdoStatement = $pdo->query($queryString);

        // les résultats récupérés seront de classe 'Type'
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

        return $results;
    }

    /**
     * Find a type by its ID.
     *
     * @param int $id The ID of the type.
     * @return Type|null The found type or null if not found.
     */
    public static function findOne($id)
    {
        $pdo = Database::getPDO();

        $queryString = "SELECT * FROM `type` WHERE `id` = :id";

        $pdoStatement = $pdo->prepare($queryString);

        $pdoStatement->execute([':id' => $id]);

        // Récupèrer les détails d'un Type
        // récupérer qu'1 objet => fetchObject( de la classe Type)
        $result = $pdoStatement->fetchObject(Type::class);

        return $result;
    }

    /**
     * Get the value of color
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set the value of color
     *
     * @return  self
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }
}
