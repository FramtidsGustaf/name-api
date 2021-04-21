<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Referrer-Policy: no-referrer");

$female = ["Åsa", "Lotta", "Greta", "Amanda", "Marta", "Maja", "Nina", "Erika", "Deepthi", "Inna"];
$male = ["Robin", "Mahmud", "Kevin", "Sebastian", "Gustaf", "Björn", "Erik", "Dragan", "Özgur", "Dino"];
$lastNames = ["Johnsson", "Hedlund", "Al Hakim", "Gedda", "Basele", "Carlson", "Bernadotte", "Wonder", "Richie", "Olsson"];

function fi_las($name, $stop)
{
  $search = ['å', 'ä', 'ö', 'Å', 'Ä', 'Ö', ' '];
  $replace = ['a', 'a', 'o', 'A', 'A', 'O', ''];
  return substr(str_replace($search, $replace, $name), 0, $stop);
}

for ($i = 0; $i < 10; $i++) {
  $random = rand(0, 1);
  $firstName = $random ? $female[rand(0, 9)] : $male[rand(0, 9)];
  $lastName = $lastNames[rand(0, 9)];
  $fi = fi_las($firstName, 2);
  $las = fi_las($lastName, 3);
  $email = strtolower($fi . $las) . '@example.com';

  $names[] = array(
    "firstname" => $firstName,
    "lastname" => $lastName,
    "gender" => $random ? "female" : "male",
    "age" => rand(1, 101),
    "email" => $email
  );
}

echo json_encode($names, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
