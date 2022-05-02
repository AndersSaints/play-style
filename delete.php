<?php

include_once 'db.class.php';

$objDb = new db();
$link = $objDb->conecta_mysql();

$id = $_POST['id'];

$sql = "DELETE FROM videos WHERE id = $id";

mysqli_query($link, $sql);

echo json_encode('Ok');