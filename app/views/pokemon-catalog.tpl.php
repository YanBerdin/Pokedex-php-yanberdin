<h3> Recherche par Numéro</h3>

<?php
// var_dump($viewData);

// var_dump($viewData['pokemons']);

// $pokemons = $viewData['pokemons'];

// var_dump($pokemons);


$pokemon = $viewData['pokemon'];

// var_dump($pokemon);

// var_dump($pokemon->getName());

// var_dump($absoluteUri); // grace à => global $router; dans show()
?>
<div class="titre">

      <h1><?php echo $pokemon->getName() ?> </h1>

</div>


<div>
      <ul>
            <li><?= $pokemon->getNumber() . " # " . $pokemon->getName() ?></a></li>

            <!--     ========== =======        lien    =========       ===========         -->
            <li>PV : <?= $pokemon->getHp() ?></li>
            <li>Attaque : <?= $pokemon->getAttack() ?></li>
            <li>Défense : <?= $pokemon->getDefense() ?></li>
            <li>Attaque Spé. : <?= $pokemon->getSpe_attack() ?></li>
            <li>Défense Spé. : <?= $pokemon->getSpe_defense() ?></li>
            <li>Vitesse :<?= $pokemon->getSpeed() ?></li>


            <img src="../img/<?= $pokemon->getNumber() ?>.png" alt="">

      </ul>
</div>