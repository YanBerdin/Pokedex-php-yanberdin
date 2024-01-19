<?php
namespace Pokedex\Models;

use PDO;
use Pokedex\Utils\Database;

class Pokemon extends CoreModel
{
    // private $id;
    // private $name;
    private $hp;
    private $attack;
    private $defense;
    private $spe_attack;
    private $spe_defense;
    private $speed;
    private $number;

 public function findAll()
 {
     // 1. Connexion à la BDD
     $pdo = Database::getPDO();

     // 2. Préparer requête sous forme de string
     $queryString = 'SELECT * FROM `pokemon`';

     // 3. Exécuter la requête
     $pdoStatement = $pdo->query($queryString);

     // 4. Récupère tous les résultats qui seront de type 'Pokemon'
     $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
 
     return $results;

 }

 public function findOne($number)
 {
     // 1. Connexion à la BDD
     $pdo = Database::getPDO();
     // 2. Query string
     $queryString = "SELECT * FROM `pokemon` WHERE `number` =". $number;

     // 3. Exécuter la requête
     $pdoStatement = $pdo->query($queryString); // ( voir S04 pour Syntaxe $pdo-> )

     // 4. Récupérer le pokemon
     $result = $pdoStatement->fetchObject(Pokemon::class);
     // On ne veut récupérer qu'1 objet => fetchObject( de la classe Pokemon)

     return $result;
 }

    /**
     * Method to retrieve all data from Pokemon according to his type 
     *
     * @param string $sort
     * @return Pokemon[]
     */
    public static function findAllByType($typeId, $group = "", $sort = "")
    {
        $pdo = Database::getPDO();

        $sql = "SELECT DISTINCT *, pokemon.name AS `pokemon_name`, pokemon.id AS `pokemon_id`, type.id AS `type_id`, type.name AS `type_name`, type.color AS `type_color`
        FROM `pokemon`
        INNER JOIN `pokemon_type` ON pokemon.number = pokemon_type.pokemon_number
        INNER JOIN `type` ON type.id = pokemon_type.type_id
        WHERE type.id = " . $typeId
        ;
        if ($group !== "") {
            $sql .= " GROUP BY $group";
        }
        if ($sort !== "") {
            $sql .= " ORDER BY $sort";
        }

        $pdoStatement = $pdo->query($sql);
      
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
    }    
    
    /**
     * Method to retrieve all types for a given Pokemon number
     *
     * @param int $number
     * @return Type[]
     */
    public function findTypesByPokemonNumber($number)
    {
        $pdo = Database::getPDO();
        
        $sql = "SELECT DISTINCT *
                FROM `pokemon_type`
                INNER JOIN `type` ON type.id = pokemon_type.type_id
                WHERE `pokemon_number` = :number
                ORDER BY `name`";

        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindValue(':number', $number, PDO::PARAM_INT);
        $pdoStatement->execute();

        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, Type::class);
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of hp
     */ 
    public function getHp()
    {
        return $this->hp;
    }

    /**
     * Set the value of hp
     *
     * @return  self
     */ 
    public function setHp($hp)
    {
        $this->hp = $hp;

        return $this;
    }

    /**
     * Get the value of attack
     */ 
    public function getAttack()
    {
        return $this->attack;
    }

    /**
     * Set the value of attack
     *
     * @return  self
     */ 
    public function setAttack($attack)
    {
        $this->attack = $attack;

        return $this;
    }

    /**
     * Get the value of defense
     */ 
    public function getDefense()
    {
        return $this->defense;
    }

    /**
     * Set the value of defense
     *
     * @return  self
     */ 
    public function setDefense($defense)
    {
        $this->defense = $defense;

        return $this;
    }

    /**
     * Get the value of spe_attack
     */ 
    public function getSpeAttack()
    {
        return $this->spe_attack;
    }

    /**
     * Set the value of spe_attack
     *
     * @return  self
     */ 
    public function setSpeAttack($spe_attack)
    {
        $this->spe_attack = $spe_attack;

        return $this;
    }

    /**
     * Get the value of spe_defense
     */ 
    public function getSpe_defense()
    {
        return $this->spe_defense;
    }

    /**
     * Set the value of spe_defense
     *
     * @return  self
     */ 
    public function setSpe_defense($spe_defense)
    {
        $this->spe_defense = $spe_defense;

        return $this;
    }

    /**
     * Get the value of speed
     */ 
    public function getSpeed()
    {
        return $this->speed;
    }

    /**
     * Set the value of speed
     *
     * @return  self
     */ 
    public function setSpeed($speed)
    {
        $this->speed = $speed;

        return $this;
    }

    /**
     * Get the value of number
     */ 
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set the value of number
     *
     * @return  self
     */ 
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }
}



