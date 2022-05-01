<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Play Style</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="style/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>

<body>
  <!--Navigation bar-->
  <div id="nav-placeholder"></div>
  <!--end of Navigation bar-->
  <div class="container-fluid" id="central-div">
    <div class="container" id="subcentral-div">
      <div class="row">
        <div class="col-6" id="margin-title-index">
          <h1 class="display-1 py-4" id="center-title-index">Compartilhe suas melhores plays!</h1>
          <p id="center-text-index">Compartilhe suas melhores plays e seja notado por todos da plataforma!</p>
          <a href="/play-style/register.html">
            <?php
            if (!isset($_SESSION["nome_usuario"])) {
              echo '<button class="btn btn-lg btn-primary mt-5">Cadastre-se — É de grátis cpç!</button>';
            }
            ?>
            
          </a>
        </div>
        <div class="col-6">
          <img src="assets/images/play.jpg" alt="landscape" class="img-fluid rounded-3 my-3">
        </div>
      </div>
    </div>
  </div>
























  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script>
    $(function() {
      $("#nav-placeholder").load("components/navbar.php");
    });
  </script>
</body>

</html>