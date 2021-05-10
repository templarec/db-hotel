<?php
require 'db.php';
header('Content-Type: application/json');

if(!empty($_GET) && empty($_GET['stanza'])) {
    $query = "select * from stanze";
    $result = $conn->query($query);
    $array = [];
    if ($result && $result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
        array_push($array, $row);

        }
    }
        echo json_encode([
            "response" => $array,
            "status" => "ok"
        ]);


    $conn->close();

} elseif (!empty($_GET['stanza'])){
    $stanza = $_GET['stanza'];
    $query = "select * from stanze where id='$stanza'";
    $result = $conn->query($query);
    $array = [];
    if ($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            array_push($array, $row);
        }
    }
    echo json_encode([
        "response" => $array,
        "status" => "ok"
    ]);
    $conn->close();
} else echo json_encode(["status" =>"no params"]);