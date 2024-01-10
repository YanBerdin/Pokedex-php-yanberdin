<?php
namespace Pokedex\Models;
// require_once __DIR__ . "/../utils/Database.php";

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
    public static function findAll()
    {
        // 1. On se connecte à la BDD
        $pdo = Database::getPDO();
        // 2. On fait (prépare) notre requête (SQL) sous forme de string
        $queryString = 'SELECT * FROM `type` ORDER BY `name`';
        // 3. On exécute la requête
        $pdoStatement = $pdo->query($queryString);
        // 4. On récupère tous les résultats
        // On dit explicitement que les résultats récupérés seront de classe 'Type'
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        // 5. On retourne les résultats
        return $results;
    }

    public function findOne($id)
    {
        // 1. Connexion à la BDD
        $pdo = Database::getPDO();
        // 2. On écrit la query string
        $queryString = 'SELECT * FROM `type` WHERE id = ' . $id;
        // 3. On exécute la requête
        $pdoStatement = $pdo->query($queryString); // ( voir S04 pour Syntaxe $pdo-> )
        // 4. On récupère la marque
        $result = $pdoStatement->fetchObject($queryString);
        // On ne veut récupérer qu'1 objet => fetchObject( de la classe Type)
        // 5. On retourne le résultat
        return $result;
    }


    /**
     * Get the value of id
     */
    // public function getId()
    // {
    //     return $this->id;
    // }

    /**
     * Set the value of id
     *
//  * @return  self
//  */
    // public function setId($id)
    // {
    // $this->id = $id;

    // return $this;
    // }

    /**
     * Get the value of name
     */
    // public function getName()
    // {
    //     return $this->name;
    // }

    /**
     * Set the value of name
     *
     * @return  self
     */
    // public function setName($name)
    // {
    //     $this->name = $name;

    //     return $this;
    // }

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
