<?php
session_start();
?>

<nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(to top, #000814, #003049)">
  <div class="container-fluid">
    <a class="navbar-brand" href="/play-style/index.php">
      <img src="assets/images/logo.png" alt="Logo do site" width="33" height="30" class="d-inline-block align-text-top">
      Play Style
    </a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/play-style/index.php">Início</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Top Vídeos</a>
        </li>
        <?php
      if (isset($_SESSION["nome_usuario"])) {
        echo '<li class="nav-item">
        <a class="nav-link" aria-current="page" href="/play-style/upload.php">Upload</a>
      </li>';
      }
      ?>
      </ul>
      <?php
      if (!isset($_SESSION["nome_usuario"])) {
        echo '<a class="nav-link text-white-50" href="/play-style/login.php" style="margin-left: auto" id="login-btn">Login</a>';
      }
      else{
        echo '<a class="nav-link text-white-50" href="/play-style/logout.php" style="margin-left: auto" id="login-btn">Logout</a>';
      }
      ?>
      
    </div>
  </div>
</nav>