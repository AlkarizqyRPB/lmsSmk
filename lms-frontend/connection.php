<?php

use function Laravel\Prompts\password;

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "mapel";

$const = new mysqli($servername, $username, $password, $db_name);
?>