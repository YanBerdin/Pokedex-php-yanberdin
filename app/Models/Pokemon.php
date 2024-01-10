<?php
namespace Pokedex\Models;

// require_once __DIR__ . "/../Utils/Database.php";

use PDO;
use Pokedex\Utils\Database;

class Pokemon extends CoreModel
{
    // Propriétés (ce sont les champs de la table côté BDD)
    // private $id;
    // private $name;
    private $hp;
    private $attack;
    private $defense;
    private $spe_attack;
    private $spe_defense;
    private $speed;
    private $number;





 // Méthodes

 public function findAll()
 {
    // Souvent on identifie cet objet par la variable $conn ou $db
    
    // try
    // {
    // $db = new PDO('mysql:host=localhost;dbname=pokemonBDD;charset=utf8', 'root', 'root');
    // }
    // catch (Exception $e)
    // {
    //         die('Erreur : ' . $e->getMessage());
    // }

     // 1. On se connecte à la BDD
     $pdo = Database::getPDO();

     // 2. On fait (prépare) notre requête (SQL) sous forme de string
     $queryString = 'SELECT * FROM `pokemon`';

     // 3. On exécute la requête
     $pdoStatement = $pdo->query($queryString);

     // 4. On récupère tous les résultats
     // On dit explicitement que les résultats récupérés seront de type 'Pokemon'
     $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
 
     // 5. On retourne les résultats
     return $results;

 }

 public function findOne($number)
 {
     // 1. Connexion à la BDD
     $pdo = Database::getPDO();
     // 2. On écrit la query string
     $queryString = "SELECT * FROM `pokemon` WHERE number = $number";

     // 3. On exécute la requête
     $pdoStatement = $pdo->query($queryString); // ( voir S04 pour Syntaxe $pdo-> )
     // 4. On récupère le pokemon
     $result = $pdoStatement->fetchObject(Pokemon::class);
     // On ne veut récupérer qu'1 objet => fetchObject( de la classe Pokemon)
     // 5. On retourne le résultat

     return $result;
 }


    /**
     */ 
    // public function getId()
    // {
    //     return $this->id;
    // }

    // /**
    //  * Set the value of id
    //  *
    //  * @return  self
    //  */ 
    // public function setId($id)
    // {
    //     $this->id = $id;

    //     return $this;
    // }

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
    public function getSpe_attack()
    {
        return $this->spe_attack;
    }

    /**
     * Set the value of spe_attack
     *
     * @return  self
     */ 
    public function setSpe_attack($spe_attack)
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


