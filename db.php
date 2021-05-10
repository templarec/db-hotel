<?php
$hostname = 'localhost';
$user = 'root';
$password = 'root';
$dbname = 'hotel';

$conn = new mysqli($hostname,$user,$password, $dbname);
if ($conn && $conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
}