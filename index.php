<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Referrer-Policy: no-referrer");

$female = ["Åsa", "Lotta", "Greta", "Amanda", "Marta", "Maja", "Nina", "Erika", "Deepthi", "Inna"];
$male = ["Robin", "Mahmud", "Kevin", "Sebastian", "Gustaf", "Björn", "Erik", "Dragan", "Özgur", "Dino"];
$lastNames = ["Johnsson", "Hedlund", "Al Hakim", "Gedda", "Basele", "Carlson", "Bernadotte", "Wonder", "Richie", "Olsson"];
$limit = isset($_GET['limit']) ? htmlspecialchars($_GET['limit']) : 10;

if (!is_numeric($limit)) {
  http_response_code(400);
  die('What are you trying to accomplish?');
}

function fi_las($name, $stop)
{
  $search = ['å', 'ä', 'ö', 'Å', 'Ä', 'Ö', ' '];
  $replace = ['a', 'a', 'o', 'A', 'A', 'O', ''];
  return strtolower(substr(str_replace($search, $replace, $name), 0, $stop));
}

for ($i = 0; $i < $limit; $i++) {
  $gender = rand(0, 1);
  $firstName = $gender ? $female[rand(0, 9)] : $male[rand(0, 9)];
  $lastName = $lastNames[rand(0, 9)];
  $fi = fi_las($firstName, 2);
  $las = fi_las($lastName, 3);

  $names[] = array(
    "firstname" => $firstName,
    "lastname" => $lastName,
    "gender" => $gender ? "female" : "male",
    "age" => rand(1, 100),
    "email" => $fi . $las . '@example.com'
  );
}

echo json_encode($names, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
