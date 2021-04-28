<?php
$pokemons = file_get_contents("/Applications/MAMP/htdocs/myAPI/products.json");
$json = json_decode($pokemons);

echo "<pre>";
echo $pokemons;
//print_r($pokemons);
echo "</pre>";
