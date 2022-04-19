<?php

require_once('db.class.php');

$email = $_POST['email'];
$password = $_POST['password'];

$sql = " SELECT * FROM users WHERE email = '$email' AND password = '$password' ";

$objDb = new db();
$link = $objDb->conecta_mysql();

$results_id = mysqli_query($link, $sql);

if($results_id){
    $user_data = mysqli_fetch_array($results_id);
    if(isset($user_data['email'])){
        echo 'Usuário existe';
    } else {
        header('Location: index.php?erro=1');
    }
} else {
    echo 'Erro na execução da consulta. Favor entrar em contato com o admin do site.';
}





?>