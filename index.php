<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Referrer-Policy: no-referrer");

require_once 'products.php';

//skapa en array utan dubletter med ett max antal av 5

$limit = isset($_GET['show']) ? $_GET['show'] : 19;
$category = isset($_GET['category']) ? $_GET['category'] : false;

$pokemons = array();


if ($limit) {
    for ($i = 0; $i < $limit; $i++) {

        $numberOfPokemons = $pokemonData[rand(0, 19)];
        array_push($pokemons, $numberOfPokemons);
    }
}


if ($category) {
    $pokemonsCategory = array();
    $pokemonsLimitedCategory = array();

    if ($limit > 5) {
        $limit = 5;
    } else {
        $limit = $limit;
    }

    foreach ($pokemonData as $key => $value) {
        if ($value['category'] == $category) {
            array_push($pokemonsCategory, $value);
        }
    }
    for ($i = 0; $i < $limit; $i++) {
        array_push($pokemonsLimitedCategory, $pokemonsCategory[rand(0, $limit)]);
    }
    $pokemons = $pokemonsLimitedCategory;
}

$json = json_encode($pokemons, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

echo $json;
