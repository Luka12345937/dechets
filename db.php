<?php
$servername = "localhost/phpmyadmin/index.php?route=/table/sql&db=dechets&table=gestion_dechets";
$username = "root";
$password = "";
$dbname = "dechets";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>