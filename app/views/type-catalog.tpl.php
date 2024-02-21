<?php
// dump($viewData);
// dump( get_defined_vars() );  
$pokemonsByType = $viewData['pokemonsByType'];
$selectedType = $viewData['selectedType'];
$typeName = $selectedType->getName();

?>
<h1 class="type-gallery"><?php echo "Pokemons du type : " . $typeName ?></h1>

<ul class='type_group type_group-ul'>

  <?php foreach ($pokemonsByType as $pokemonElement) { ?>

    <li style="background: #<?= $pokemonElement->color ?>">
      <a href="<?= $router->generate("pokemon-card", ["number" => $pokemonElement->getNumber()]) ?>" rel="noopener noreferrer">
        <img src="../img/<?= $pokemonElement->getNumber() ?>.png" alt="image d'un pokemon">
        <?= $pokemonElement->pokemon_name . " #" . $pokemonElement->getNumber() ?>
      </a>
    </li>

  <?php } ?>

</ul>