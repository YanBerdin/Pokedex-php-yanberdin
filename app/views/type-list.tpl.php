<?php
dump($viewData);
// $pokemonByType = $viewData['pokemonByType'];
 $types = $viewData['types'];

// var_dump($pokemons);
// var_dump($absoluteURL);
dump( get_defined_vars() );  
?>
<div class="types_list">
    <h2>Cliquez sur un type pour voir tous les Pokémon de ce type</h2>

    <?php 
    if (!$types) {
        echo "Oups, aucun type trouvé ! Ce type de pokémon n'est pas encore répertorié";
    }
    
    else {
        echo "<ul>";
         foreach ($types as $type) : ?>
            <li class="type" style="background: #<?php echo $type->getColor() ?>;"><a href="<?= $router->generate("type-catalog", ["id" => $type->getID()]) ?>"><?= $type->getName() ?></a></li>
        <?php endforeach;
        echo "</ul>";
    } ?>
</div>
