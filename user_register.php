<?php
    require_once('db.class.php');

    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = $_POST['user'];
    $elo = $_POST['elo'];

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $sql = " insert into users(email, password, user, elo) values ('$email', '$password', '$user', '$elo') ";

    //executar a query
    if(mysqli_query($link, $sql)){
        echo 'Usuário registrado com sucesso!';
    } else {
        echo 'Erro ao registrar o usuário!.'.mysqli_connect_error();
    }

?>