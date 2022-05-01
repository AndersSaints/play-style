<?php

require_once('db.class.php');

session_start();

$email = $_POST['email'];
$password = md5($_POST['password']);

$sql = " SELECT * FROM users WHERE email = '$email' AND password = '$password' ";

$objDb = new db();
$link = $objDb->conecta_mysql();

$results_id = mysqli_query($link, $sql);

if($results_id){
    $user_data = mysqli_fetch_array($results_id);
    if(isset($user_data['email'])){
        $_SESSION["id_usuario"]= $user_data["idusers"];
        $_SESSION["nome_usuario"]= $user_data["user"];
        header('Location: upload.php');
    } else {
        header('Location: login.php?erro=1');
    }
} else {
    echo 'Erro na execução da consulta. Favor entrar em contato com o admin do site.';
}





?>