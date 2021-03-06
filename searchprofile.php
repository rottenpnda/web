<?php
    session_start();

  if(isset($_SESSION['usuario'])){
    echo "";
  }
  else{
    header("Location: index.php");
  }
  include 'build/php/connectionsearch.php';
  include 'build/php/consultasearch.php';
 ?>

 <!doctype html>
 <html>
 <head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <link rel="shortcut icon" type="image/png" href="favicon1.png"/>
<!--===============================================================================================-->
 <link rel="stylesheet" href="build/css/bootstrap.min.css">
 <link rel="stylesheet" href="build/css/profile.css">
 <title>Perfil</title>
 </head>
<body>
   <!--  INICIA EL CONTENIDO ****************************************************************************** -->
   <!-- HERE THE HEADER BEGINS, just for the fixed top icon -->
<header class="container">
<div class="fixed-top">
  <div class="iconforexit m-3">
    <a href="index.php"><img src="build/images/profile/utilities/exit.png" width="50px"></a>
  </div>
</div>
</header>
<!-- HEADER ENDS/////////////////////////////////////////////////////////////////////////////////// -->
<!-- COMIENZO DE MAIN   - This his for the entire website because i think in this one we won't need the footer -->
  <main>
    <!--Area de la imagen de perfil y Descripción -->
<div class="container">

      <?php
      $title = mysqli_real_escape_string($conn, $_GET['title']);
      $name = mysqli_real_escape_string($conn, $_GET['name']);
      $sql = "SELECT * FROM users WHERE nickname='$title' AND fullname='$name'";
      $result = mysqli_query($conn, $sql);
      $queryResults = mysqli_num_rows($result);

      if ($queryResults > 0)
      {
        while ($row = mysqli_fetch_assoc($result))
        {
          $nickname = $row['nickname'];
          $fullname = $row['fullname'];
          $foto = $row['foto'];
          $description = $row['description'];
          $facebook = $row['facebook'];
          $twitter = $row['twitter'];
          $instagram = $row['instagram'];
          $deviantart = $row['deviantart'];
          $tumblr = $row['tumblr'];
          $twitch = $row['twitch'];
          $patreon = $row['patreon'];
          $kofi = $row['kofi'];
          $paypal = $row['paypal'];
        }
      }
      else
      {
        # code...
      }
    ?>
  <div class="row">
    <!-- Titulo y descripción abajo -->
    <div class="col-12 col-xl-9">
      <div class="Pspacetop">

      </div>

      <div class="P_Titletext text-center">
        <h1><?php echo $nickname; ?></h1>
      </div>
      <div class="row justify-content-center">
        <div class="Secondtext text-justify col-12 col-xl-10 mb-3 mb-xl-0">
          <h4>Nombre: <?php echo $fullname; ?></h4>
          <h4>Description: <?php echo $description; ?></h4>
        </div>
      </div>
      <!-- redes sociales primarias -->
      <div class="Socialmedia1 row justify-content-center">
        <div class="social1 m-3 d-inline justify-self-center">
            <img class="d-inline" src="build/images/icons/facebook.svg">
              <h5 class="ml-2">Facebook: <?php echo $facebook; ?></h5>
        </div>
        <div class="social2 m-3 d-inline">
            <img class="d-inline" src="build/images/icons/twitter.svg">
              <h5 class="ml-2">Twitter: <?php echo $twitter; ?></h5>
        </div>
        <div class="social3 m-3 d-inline">
            <img class="d-inline" src="build/images/icons/instagram.svg">
              <h5 class="ml-2">Instagram: <?php echo $instagram; ?></h5>
        </div>
      </div>
    </div>
    <!-- Imagen de perfil abajo -->
    <div class="col-12 col-xl-3">
      <?php

        include 'config.php';
        $sql = "SELECT * FROM users WHERE (nickname = '$nickname') ";
        $resultado = mysqli_query($conexion, $sql) or die("Error en consulta");

        while ($columna = mysqli_fetch_array($resultado))
        {
          echo "<img id='profilepic' class='mx-auto mt-5 d-block' src='web-master/".$columna['foto']." '></div>";

        }
        /*<img id="profilepic" class="mx-auto mt-5 d-block" src="<?php echo $foto; ?>" alt="">*/
      ?>

    </div>

  </div>
  <!-- Termina descricion e imagen de perfil -->
</div>
<!-- DEscripcion de galeria////////////////////////////////////////////////////////////////////////////////////////////// -->
    <div class="container-fluid">
      <div class="bgdescripcion2 mt-4 text-white py-3">
          <h1 class="text-center" >Galería de "<?php echo $nickname; ?>"</h1>
          <h4 class="text-center">Esta es otra parte de la descripción</h4>
      </div>
      <div class="bgdescripcion3 text-white py-3">
        <div class="Socialmedia2 row justify-content-center">
          <div class="social4 m-3 d-inline justify-self-center">
              <img class="d-inline" src="build/images/icons/deviantart.svg">
                <h5 class="ml-2">Deviantart: <?php echo $deviantart; ?></h5>
          </div>
          <div class="social5 m-3 d-inline">
              <img class="d-inline" src="build/images/icons/tumblr.svg">
                <h5 class="ml-2">Tumblr: <?php echo $tumblr; ?></h5>
          </div>
          <div class="social6 m-3 d-inline">
              <img class="d-inline" src="build/images/icons/patreon.svg">
                <h5 class="ml-2">Patreon: <?php echo $patreon; ?></h5>
          </div>
        </div>
      </div>
    </div>

    <div class="container mt-3">
      <div class="textogaleria text-center">
        <h1>Mi Galeria</h1>
      </div>
        <div class="row justify-content-center">
          <div class="imagen-galeria col-12 col-xl m-4">
            <img id="profilepic" class="mx-auto mt-5 d-block" src="sfw/bears.png" alt="">
          </div>
          <div class="imagen-galeria col-12 col-xl m-4">
            <img id="profilepic" class="mx-auto mt-5 d-block" src="sfw/smash.jpg" alt="">
          </div>
          <div class="imagen-galeria col-12 col-xl m-4">
            <img id="profilepic" class="mx-auto mt-5 d-block" src="sfw/colors.jpg" alt="">
          </div>
        </div>

      </div>
    </div>
  </main>


   <!-- TERMINA EL CONTENIDO *************************************************************************************  -->
   <!-- Scripts /////////////////////// -->

<!-- -->
 <script type="text/javascript" src="build/js/jquery-3.3.1.slim.min.js"></script>
 <script type="text/javascript" src="build/js/popper.min.js"></script>
 <script type="text/javascript" src="build/js/bootstrap.min.js"></script>
 <script type="text/javascript" src="build/js/scripts.js"></script>
 </body>
 </html>
