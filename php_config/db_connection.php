<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "play_style";

$connection = new mysqli($servername, $username, $password);

if ($connection->connect_error) {
    die("Erro de conexão. ". $connection->connect_error);
}

echo "Conectado!";