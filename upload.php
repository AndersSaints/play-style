<?php
session_start();
if (!isset($_SESSION["nome_usuario"])) {
  header('Location: login.php');
  die;
}
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
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>

<body>
  <!--Navigation bar-->
  <div id="nav-placeholder"></div>
  <!--end of Navigation bar-->
  <div class="container">
    <h1 class="text-center display-2" id="centered-title">
      <?php
      echo $_SESSION["nome_usuario"];
      ?>
    </h1>
    <form action="video_proc.php" method="POST">
      <div class="input-group my-5">
        <input type="file" class="form-control" aria-label="Upload" name="video">
        <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04">Enviar</button>
      </div>
    </form>

  </div>
























  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script>
    $(function() {
      $("#nav-placeholder").load("components/navbar.php");
    });
  </script>
</body>

</html>