<?php

session_start();
if (isset($_SESSION["nome_usuario"])) {
    header('Location: upload.php');
    die;
}
$erro = isset($_GET['erro']) ? $_GET['erro'] : 0;

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">

    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>

<body>
    <!--Navigation bar-->
    <div id="nav-placeholder"></div>
    <!--end of Navigation bar-->
    <div class="container my-5">
        <form action="validar_acesso.php" method="POST" id="formLogin">
            <div class="row">
                <div class="col-md-4 d-block mx-auto" id="login-col">
                    <img src="assets/images/logo.png" alt="Logo do site" width="38" height="40" class="d-inline-block align-text-top">
                    <h1 class="text-center display-5">Log in</h1>
                    <div>
                        <input name="email" type="email" class="form-control input-login" id="inputEmail3" placeholder="Email">
                        <input name="password" type="password" class="form-control input-login" id="inputPassword3" placeholder="Password">
                        <button type="submit" class="btn btn-primary mt-2">Entrar</button>
                    </div>
                    <p class="txt-center ls-login-signup mt-3">Não possui um usuário?
                        <a href="/play-style/register.html">Cadastre-se agora!</a>
                    </p>
                    <?php
                    if ($erro == 1) {
                        echo '<div class="row">
                        <div class="alert alert-danger" id="error-alert">
                            <label class="badge bg-danger">Erro! </label> Usuário e/ou senha inválido(s).
                        </div>
                    </div>';
                    }
                    ?>
                </div>

            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>
        $(function() {
            $("#nav-placeholder").load("components/navbar.php");
        });
        setTimeout(sumir, 3000)

        function sumir() {
            $("#error-alert").fadeTo(2000, 500).slideUp(500, function() {
                $("#error-alert").slideUp(500);
            });
        }
    </script>
</body>

</html>