<?php
    require_once('db.class.php');

    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $user = $_POST['user'];
    $elo = $_POST['elo'];

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $sql = " INSERT INTO users(email, password, user, elo) VALUES ('$email', '$password', '$user', '$elo') ";

    //executar a query
    if(mysqli_query($link, $sql)){
        header('Location: login.php');
        echo 'Usuário registrado com sucesso!';
    } else {
        echo 'Erro ao registrar o usuário!.'.mysqli_connect_error();
    }

?>