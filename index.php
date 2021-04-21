<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Referrer-Policy: no-referrer");

$firstNames = ["Robin", "Mahmud", "Kevin", "Sebastian", "Gustaf", "Emma", "Folke", "Marita", "Linnea", "Karin"];
$lastNames = ["Johnsson", "Hedlund", "Al Hakim", "Gedda", "Basele", "Carlson", "Bernadotte", "Wonder", "Richie", "Olsson"];

for ($i = 0; $i < 10; $i++) {
  $names[] = array("firstname" => $firstNames[rand(0, 9)], "lastname" => $lastNames[rand(0, 9)]);
}

echo json_encode($names, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
