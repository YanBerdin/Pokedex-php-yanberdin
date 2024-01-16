<?php
// dump($viewData);
$pokemonsByType = $viewData['pokemonsByType'];
?>

<ul class='type_group type_group-ul'>
  <?php foreach ($pokemonsByType as $pokemonElement) :
  ?>
    <li style="background: #<?= $pokemonElement->color ?>">
      <a href="<?= $router->generate("pokemon-catalog", ["number" => $pokemonElement->getNumber()]) ?>" rel="noopener noreferrer">
        <img src="../img/<?= $pokemonElement->getNumber() ?>.png" alt="image d'un pokemon">
        <?= $pokemonElement->getName() . " # " . $pokemonElement->getNumber() ?>
      </a>
    </li>

  <?php endforeach ?>
</ul>