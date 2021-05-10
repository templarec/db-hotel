<?php
require 'db.php';
header('Content-Type: application/json');
// se l'array non + vuoto e non c'è la variabile stanza fai la lista di tutte le stanze
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
//se la stanza è specificata , prendi la singola stanza
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