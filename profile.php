<?php

  session_start();

  if(isset($_SESSION['usuario'])){
    include 'config.php';
  }
  else{
    header("Location: index.php");
  }
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
  <div class="row">
    <!-- Titulo y descripción abajo -->
    <div class="col-12 col-xl-9">
      <div class="Pspacetop">

      </div>

      <div class="P_Titletext text-center">
        <h1><?= $_SESSION['usuario']?></h1>
      </div>
      <div class="row justify-content-center">
        <div class="Secondtext text-justify col-12 col-xl-10 mb-3 mb-xl-0">
          <h4>Nombre: <?= $_SESSION['fullname']?></h4>
          <h4>Description: <?= $_SESSION['description']?></h4>
        </div>
      </div>
      <!-- redes sociales primarias -->
      <div class="Socialmedia1 row justify-content-center">
        <div class="social1 m-3 d-inline justify-self-center">
            <img class="icon d-inline" src="build/images/icons/facebook.svg">
              <h5 class="ml-2"><?= $_SESSION['facebook']?></h5>
        </div>
        <div class="social2 m-3 d-inline">
            <img class="d-inline" src="build/images/icons/twitter.svg">
              <h5 class="ml-2">Twitter: <?= $_SESSION['twitter']?></h5>
        </div>
        <div class="social3 m-3 d-inline">
            <img class="d-inline" src="build/images/icons/instagram.svg">
              <h5 class="ml-2">Instagram: <?= $_SESSION['instagram']?></h5>
        </div>
      </div>
    </div>
    <!-- Imagen de perfil abajo -->
      <div class="col-12 col-xl-3">
        <?php

          include 'config.php';
          $usuario = $_SESSION['usuario'];
          $sql = "SELECT * FROM users WHERE (username = '$usuario') ";
          $resultado = mysqli_query($conexion, $sql) or die("Error en consulta");

          while ($columna = mysqli_fetch_array($resultado))
          {
          echo "<img id='profilepic' class='mx-auto mt-5 d-block'  src='web-master/".$columna['foto']." '>";
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
          <h1 class="text-center" >Galería de "<?= $_SESSION['usuario']?>"</h1>
          <h4 class="text-center">Esta es otra parte de la descripción</h4>
      </div>
      <div class="bgdescripcion3 text-white py-3">
        <div class="Socialmedia2 row justify-content-center">
          <div class="social4 m-3 d-inline justify-self-center">
              <img class="d-inline" src="build/images/icons/deviantart.svg">
                <h5 class="ml-2">Deviantart: <?= $_SESSION['deviantart']?></h5>
          </div>
          <div class="social5 m-3 d-inline">
              <img class="d-inline" src="build/images/icons/tumblr.svg">
                <h5 class="ml-2">Tumblr: <?= $_SESSION['tumblr']?></h5>
          </div>
          <div class="social6 m-3 d-inline">
              <img class="d-inline" src="build/images/icons/patreon.svg">
                <h5 class="ml-2">Patreon: <?= $_SESSION['patreon']?></h5>
          </div>
        </div>
      </div>
    </div>

    <div class="container mt-3">
      <div class="textogaleria text-center">
        <h1>Mi Galería</h1>
      </div>
        <div class="row justify-content-center">
          <div class="imagen-galeria col-12 col-xl m-4">
            <img id="profilepic" class="mx-auto mt-5 d-block" src="build/images/Users/galeria/bruja.jpg" alt="">
          </div>
          <div class="imagen-galeria col-12 col-xl m-4">
            <img id="profilepic" class="mx-auto mt-5 d-block" src="build/images/Users/galeria/waffle.png" alt="">
          </div>
          <div class="imagen-galeria col-12 col-xl m-4">
            <img id="profilepic" class="mx-auto mt-5 d-block" src="build/images/Users/galeria/Ojo.jpg" alt="">
          </div>
        </div>

      </div>
    </div>
  </main>

  <!-- FOOTER ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
  <footer>
    <div class="container-fluid">
      <div class="row my-4">
        <div class="col-12 p-2 fixed-bottom display-inline">
          <div class="icons m-y-3" align="right">
            <!-- Just an image -->
            <a  href="feed.php">
              <img src="build/images/feed/feed.png" width="45" height="45" alt="">
            </a>
            <!-- Just an image -->
            <a  href="account/profile.php">
              <img  src="build/images/feed/editar.png" width="65" height="45" alt="">
            </a>
            <!-- Just an image -->
            <a  href="account/logout.php">
              <img  src="build/images/feed/out.png" width="45" height="45" alt="">
            </a>
          </div>
        </div>
      </div>
    </div>
  </footer>

   <!-- TERMINA EL CONTENIDO *************************************************************************************  -->
   <!-- Scripts /////////////////////// -->

<!-- -->
 <script type="text/javascript" src="build/js/jquery-3.3.1.slim.min.js"></script>
 <script type="text/javascript" src="build/js/popper.min.js"></script>
 <script type="text/javascript" src="build/js/bootstrap.min.js"></script>
 <script type="text/javascript" src="build/js/scripts.js"></script>
 </body>
 </html>
