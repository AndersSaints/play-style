<?php

class db {

    //host
    private $host = 'localhost';

    //usuario
    private $user = 'root';

    //senha
    private $password = '';

    //banco de dados
    private $database = 'play_style';

    public function conecta_mysql(){

        //criar a conexao
        $con = mysqli_connect($this->host, $this->user, $this->password, $this->database);

        //ajustar o charset de comunicação entre a aplicação e o banco de dados
        mysqli_set_charset($con, 'utf8');

        //verificar se houve erro de conexão
        if(mysqli_connect_errno()){
            echo 'Erro ao tentar se conectar com o BD MySQL: '.mysqli_connect_error();
        }

        return $con;
    }

}

?>