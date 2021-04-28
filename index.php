<?php
$pokemons = file_get_contents("./products.json");
$json = json_decode($pokemons);

echo $pokemons;
