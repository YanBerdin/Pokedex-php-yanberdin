<?php // dump($viewData);
// $pokemons = $viewData['pokemons'];
// var_dump($pokemons);
?>

<ul class='main_list main-list-ul'>
    <?php foreach ($pokemons as $pokemon) : ?>
        <li>
            <a href="<?= $router->generate("pokemon-card", ["number" => $pokemon->getNumber()]) ?>">
                <img src="../img/<?= $pokemon->getNumber() ?>.png" alt="">
                <?= "#" . $pokemon->getNumber() . " " . $pokemon->getName() ?>
            </a>
        </li>

    <?php endforeach ?>
</ul>