<?php
// var_dump($viewData);
$types = $viewData['types'];
// var_dump($pokemons);
// var_dump($absoluteURL) 
?>
<div class="types_list">
    <h2>Cliquez sur un type pour voir tous les Pokémon de ce type</h2>

    <?php 
    if (!$types) {
        echo "Oups, aucun type trouvé !";
    } else {
        echo "<ul>";
         foreach ($types as $type) : ?>
            <li class="type" style="background: #<?php echo $type->getColor() ?>;"><a href="<?= $router->generate("type-list", ["id" => $type->getID()]) ?>"><?= $type->getName() ?></a></li>
        <?php endforeach;
        echo "</ul>";
    } ?>
</div>
