<?php
session_start();
if (!isset($_SESSION["nome_usuario"])) {
  header('Location: login.php');
  die;
}

$success = 0;
$erro = 0;

include("db.class.php");

$objDb = new db();
$link = $objDb->conecta_mysql();

$idusers = $_SESSION["id_usuario"];

if (isset($_FILES['video'])) {
  $arquivo = $_FILES['video'];

  if ($arquivo['error'])
    die("Falha ao enviar arquivo");


  if ($arquivo['size'] > 20971520)
    die('Arquivo muito grande!! Max: 20MB');


  $videos_dir = "videos/";
  $nomeDoArquivo = $arquivo['name'];
  $novoNomeDoArquivo = uniqid();
  $extension = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));
  $extensions_arr = array("mp4", "avi", "3gp", "mov", "mpeg");



  if (in_array($extension, $extensions_arr)) {

    $path = $videos_dir . $novoNomeDoArquivo . "." . $extension;

    $deu_certo = move_uploaded_file($arquivo["tmp_name"], $path);

    $sql = "INSERT INTO videos (idusers, name, location) VALUES($idusers,'$nomeDoArquivo','$path')";

    if ($deu_certo) {
      mysqli_query($link, $sql);
      $success = 1;
    } else {
      echo 'Falha no envio!.' . mysqli_connect_error();
    }
  } else {
    $erro = 1;
  }
}

$sql = " SELECT * FROM videos WHERE idusers = $idusers";

$results_id = mysqli_query($link, $sql);

$user_data = mysqli_fetch_all($results_id);



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
    <form action="" method="POST" enctype='multipart/form-data'>
      <div class="input-group my-5">
        <input type="file" class="form-control" aria-label="Upload" name="video" accept="video/*" required />
        <button class="btn btn-outline-secondary" type="submit">Enviar</button>
      </div>
      <?php
      if ($success == 1) {
        echo '<div class="row">
                        <div class="alert alert-success" id="success-alert">
                            <label class="badge bg-success">Success! </label> Vídeo enviado com sucesso!
                        </div>
                    </div>';
      }
      if ($erro == 1) {
        echo '<div class="row">
        <div class="alert alert-danger" id="error-alert">
            <label class="badge bg-danger">Erro! </label> Arquivo inválido!
        </div>
    </div>';
      }
      ?>
    </form>
  </div>
  <div class="container">
    <div class="row">
      <!-- <div class="card-group"> -->

        <?php
        foreach ($user_data as $dados) {

        ?>
          <div class="card col-md-4 col-sm-12 mx-auto">
            <video height="240" src="<?php echo $dados[3]; ?>" type="video/mp4" controls controlsList="nodownload" class="videoplayer"></video>
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <div class="row">
                <a onclick="<?php  ?>" href="#" style="width: 6rem;" class="btn btn-danger col-sm-5 mx-auto">Delete</a>
                <a onclick="share()" href="#" style="width: 6rem;" class="btn btn-primary col-sm-5 mx-auto">Share</a>
              </div>
            </div>
          </div>

        <?php
        }
        ?>
      <!-- </div> -->
    </div>
  </div>
























  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script>
    $(function() {
      $("#nav-placeholder").load("components/navbar.php");
    });
    setTimeout(sumir, 3000)

    function sumir() {
      $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
        $("#success-alert").slideUp(500);
      });
      $("#error-alert").fadeTo(2000, 500).slideUp(500, function() {
        $("#error-alert").slideUp(500);
      });
    }
    document.getElementsByClassName("videoplayer").addEventListener("playing", event => {
      const player = document.getElementsByClassName("videoplayer");
      if (player.requestFullscreen)
        player.requestFullscreen();
      else if (player.webkitRequestFullscreen)
        player.webkitRequestFullscreen();
      else if (player.msRequestFullScreen)
        player.msRequestFullScreen();
      dd
    })
  </script>

</body>

</html>