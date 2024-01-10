<!-- d'ici -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">
    <!-- href="../public/assets/css/style.css"> -->

    <link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">

    <?php
    // var_dump($viewData);
    // dump($absoluteUri);
    // var_dump($routeur);  
    ?>
    <title>Pokedex for MVC lovers </title>
</head>

<!-- <body>
    <header>
        <nav>
            <ul> -->
                <?php
                // var_dump($viewData); // => Array 'pokemon' => Objet Pokemon
                // $pokemons = $viewData['pokemons'];
                // $pokemon = $viewData['pokemon'];
                // var_dump($pokemons);
                // var_dump($absoluteUri);
                // var_dump($router->generate("home"));
                // var_dump($router->generate("home"));
                ?>
                <!-- <li><a href="<?php // echo $router->generate("home") ?>">Home</a></li> -->
                <!-- <li><a href="<?php // echo $router->generate("type-list") ?>">Rubrique Type de Pokemons</a></li> -->
            <!-- </ul>
        </nav>
    </header> -->

    <body>
        <header>
            <div class="container">
                <a class="logo" href="<?= $router->generate("home") ?>">Pokédex</a>
                <nav>
                    <ul>
                        <!-- <li><a href="<?php // echo $_SERVER['BASE_URI'] ?>">Liste</a></li>
                        <li><a href="<?php // echo $_SERVER['BASE_URI'] . '/types' ?>">Types</a></li> -->

                        <li><a href="<?= $router->generate("type-list") ?>">Types</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <main class="container">