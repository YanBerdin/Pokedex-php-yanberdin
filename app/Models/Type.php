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
    public static function findAll($sort = "")
    {
        // 1. Connexion à la BDD
        $pdo = Database::getPDO();
        // 2. Préparer la requête sous forme de string
        // $queryString = 'SELECT * FROM `type` ORDER BY `name`';
        $queryString = "SELECT * FROM `type`";
        if ($sort !== "") {
            $queryString .= " ORDER BY $sort";
        }
        // 3. Exécuter la requête
        $pdoStatement = $pdo->query($queryString);
        // 4. Récupèrer tous les résultats
        //    Expliciter que les résultats récupérés seront de classe 'Type'
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        // 5. retourner les résultats
        return $results;
    }

    public function findOne($id)
    {
        // 1. Connexion à la BDD
        $pdo = Database::getPDO();
        // 2. Ecrire la query string
        $queryString = 'SELECT * FROM `type` WHERE id = ' . $id;
        // 3. Exécuter la requête
        $pdoStatement = $pdo->query($queryString); // ( voir S04 pour Syntaxe $pdo-> )
        // 4. Récupèrer la marque
        $result = $pdoStatement->fetchObject($queryString);
        // On ne veut récupérer qu'1 objet => fetchObject( de la classe Type)
        // 5. On retourne le résultat
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
