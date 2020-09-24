<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objects/continent.php';

$database = new Database();
$db = $database->getConnection();

$continent = new Continent($db);

$stmt = $continent->read();
$num = $stmt->rowCount();

if($num>0){

    $continents_arr=array();
    $continents_arr["records"]=array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);

        $continent_item=array(
            "id" => $id,
            "name" => $name
        );

        array_push($continents_arr["records"], $continent_item);
    }

    http_response_code(200);

    echo json_encode($continents_arr);
}
