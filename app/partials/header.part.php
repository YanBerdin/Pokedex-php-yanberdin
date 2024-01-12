<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">

    <link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">


    <?php
    // var_dump($viewData);
    // dump($absoluteUri);
    // var_dump($routeur);  
    ?>
    <title>Pokedex for MVC lovers </title>
</head>

<?php
// var_dump($viewData); // => Array 'pokemon' => Objet Pokemon
// $pokemons = $viewData['pokemons'];
// $pokemon = $viewData['pokemon'];
// var_dump($pokemons);
// var_dump($absoluteUri);
// var_dump($router->generate("home"));
// var_dump($router->generate("home"));
?>

<body class="body-container">
    <header class="container">
        <div class="container">
            <nav class="menu">
                <a class="logo" href="<?= $router->generate("home") ?>">Pokédex</a>
                <a class="logo" href="<?= $router->generate("type-list") ?>">Types</a>
            </nav>
        </div>
    </header>
    <main class="container">