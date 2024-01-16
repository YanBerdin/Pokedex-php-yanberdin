<section class="row row-cols-1 row-cols-md-3 g-4 container-card">

<?php
dump($viewData); 
$pokemonsByType = $viewData['pokemonsByType'];

// dump($pokemonsByType);

foreach ($pokemonsByType as $pokemonElement) {
        ?>
        <div class="col text-center">
          <a href="<?= $router->generate('type-catalog', ["id" => $pokemonElement->getNumber()]) ?>" rel="noopener noreferrer">
            <div class="card h-100 pokemon" style ="background-color: #<?= $pokemonElement->color ?>">
              <img src="../img/<?= $pokemonElement->getNumber() ?>.png" class="card-img-top" alt="image d'un pokemon">
              <div class="card-body">
                <h5 class="card-title d-flex flex-column flex-md-row justify-content-center gap-2">
                  <div> #<?= $pokemonElement->getNumber() ?> </div>
                  <div> <?= $pokemonElement->pokemon_name ?></div>
                </h5>
              </div>
            </div>
          </a>
        </div>  
      <?php
      }
      ?>