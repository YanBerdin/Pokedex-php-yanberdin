<!-- <h3> Recherche par Numéro</h3> -->

<?php
$pokemon = $viewData['pokemon'];
$types = $viewData['types'];
// dump($pokemon);
// dump($types);
?>

<?php

if (!empty($pokemon)) { ?>

            <div class="d-flex flex-wrap justify-content-center">
                  
                  <img src="<?= $baseUri ?>img/<?= $pokemon->getNumber() ?>.png" class="fluid rounded-start mx-3 mb-3" style="object-fit: contain;" alt="image du pokemon <?= $pokemon->getName() ?>">
                  
                  <div class="card mb-3 pokemon" >
                        <div class="col-md-12">
                              <div class="card-body">
                                    <h3 class="card-title fw-bold">#<?= $pokemon->getNumber() ?> <?= $pokemon->getName() ?></h3>
                                    <?php foreach ($types as $type) : ?>
                                          <a href="<?= $router->generate('type-list', ["id" => $type->getId()]) ?>">
                                                <span class="badge p-2 me-2 fw-light" style="background-color: #<?= $type->getColor() ?>">
                                                      <?= $type->getName() ?>
                                                </span></a>
                                    <?php endforeach; ?>
                                    <h4 class="card-title fw-bold">Statistiques</h5>
                                          <div class="statistic row">
                                                <div class="card-title progress-card col-sm-12">
                                                      <h6 class="">PV</h6>
                                                      <div class="number"><?= $pokemon->getHp() ?></div>
                                                      <div class="progress flex-fill" role="progressbar" aria-label="pv" aria-valuenow="<?= $pokemon->getHp() ?>" aria-valuemin="0" aria-valuemax="255">
                                                            <div class="progress-bar" style="width: calc((<?= $pokemon->getHp() ?> / 255) * 100%)"></div>
                                                      </div>
                                                </div>
                                                <div class="card-title progress-card col-sm-12">
                                                      <h6>Attaque</h6>
                                                      <div class="number"><?= $pokemon->getAttack() ?></div>
                                                      <div class="progress flex-fill" role="progressbar" aria-label="attack" aria-valuenow="<?= $pokemon->getAttack() ?>" aria-valuemin="0" aria-valuemax="255">
                                                            <div class="progress-bar" style="width: calc((<?= $pokemon->getAttack() ?> / 255) * 100%)"></div>
                                                      </div>
                                                </div>
                                                <div class="card-title progress-card col-sm-12">
                                                      <h6>Défense</h6>
                                                      <div class="number"><?= $pokemon->getDefense() ?></div>
                                                      <div class="progress flex-fill" role="progressbar" aria-label="defense" aria-valuenow="<?= $pokemon->getDefense() ?>" aria-valuemin="0" aria-valuemax="255">
                                                            <div class="progress-bar" style="width: calc((<?= $pokemon->getDefense() ?> / 255) * 100%)"></div>
                                                      </div>
                                                </div>
                                                <?php // dump( $pokemon->getSpeAttack()); ?>
                                                <div class="card-title progress-card col-sm-12">
                                                      <h6>Attaque Spé.</h6>
                                                      <div class="number"><?= $pokemon->getSpeAttack() ?></div>
                                                      <div class="progress flex-fill" role="progressbar" aria-label="attack-spe" aria-valuenow="<?= $pokemon->getSpeAttack() ?>" aria-valuemin="0" aria-valuemax="255">
                                                            <div class="progress-bar" style="width: calc((<?= $pokemon->getSpeAttack() ?> / 255) * 100%)"></div>
                                                      </div>
                                                </div>
                                                <div class="card-title progress-card col-sm-12">
                                                      <h6>Défense spé.</h6>
                                                      <div class="number"><?= $pokemon->getSpe_defense() ?></div>
                                                      <div class="progress flex-fill" role="progressbar" aria-label="defense-spe" aria-valuenow="<?= $pokemon->getSpe_defense() ?>" aria-valuemin="0" aria-valuemax="255">
                                                            <div class="progress-bar" style="width: calc((<?= $pokemon->getSpe_defense() ?> / 255) * 100%)"></div>
                                                      </div>
                                                </div>
                                                <div class="card-title progress-card col-sm-12">
                                                      <h6>Vitesse</h6>
                                                      <div class="number ms-10"><?= $pokemon->getSpeed() ?></div>
                                                      <div class="progress flex-fill" role="progressbar" aria-label="speed" aria-valuenow="<?= $pokemon->getSpeed() ?>" aria-valuemin="0" aria-valuemax="255">
                                                            <div class="progress-bar" style="width: calc((<?= $pokemon->getSpeed() ?> / 255) * 100%)"></div>
                                                      </div>
                                                </div>
                                          </div>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
<?php
} else { ?>

      <div class="row my-5" style="width: 100%;">
            <div class="col-lg-12 col-sm-12 text-center">
                  <h2>Ce pokémon n'est pas encore répertorié</h2>
            </div>
      </div>

<?php
}
