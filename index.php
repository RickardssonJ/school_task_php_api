<?php
$pokemons = file_get_contents("./products.json");
$json = json_decode($pokemons);


//echo $pokemons;

if ($_GET['show']) {
    $show = $_GET['show'];
    $renderPokemonsArray = [];

    for ($i = 0; $i < $show; $i++) {

        $renderPokemons = $json[rand(0, 19)];
        array_push($renderPokemonsArray, $renderPokemons);
    }
    echo "<pre>";
    print_r($renderPokemonsArray);
    echo "</pre>";
}
