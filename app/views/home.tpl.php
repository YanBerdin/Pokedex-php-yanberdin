<?php
//  var_dump($viewData);
//     $pokemons = $viewData['pokemons'];
//    var_dump($pokemons);
//   var_dump($absoluteUri);

$pokemons = $viewData['pokemons'];
// var_dump($pokemons);
?>

<ul class='main_list'>
    <?php foreach ($pokemons as $pokemon) : ?>

        <li>
            <a href="<?= $router->generate("pokemon-catalog", ["id" => $pokemon->getNumber()]) ?>">
                <img src="../img/<?= $pokemon->getNumber() ?>.png" alt="">
                <!--     ========== =======        lien    =========       ===========         -->
                <?= $pokemon->getName() . " # " . $pokemon->getNumber() ?>
            </a>
        </li>

    <?php endforeach ?>
</ul>