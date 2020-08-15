
<!doctype html>
<html lang="es" xml:lang="es" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <!-- Required meta tags -->
    <meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    
    <!--Estilos en Css-->
    <style>
      .slider{
        background: url("img/Fondo.jpg");
        height: 100vh;
        background-size: cover;
        background-position: center;
      }
    </style>

    <title>BSale</title>
  </head>
  <body>

    <section class="container-fluid slider d-flex justify-content-center align-items-center">
        <img src="img/logoBsale.png" width="550" height="250" class="d-inline-block align-top" alt="Logo" loading="lazy">

    </section>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
      <a class="navbar-brand" href="#">
        BSale
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="navbar-nav mr-auto text-center">
          <a class="nav-item nav-link active" href="#">Inicio <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="#">Login</a>
          <a class="nav-item nav-link" href="#">Registro</a>
          <a class="nav-item nav-link" href="#">Contacto</a>
      </div>
      <div class="d-flex flex-row justify-content-center">
        <a href="" class="btn btn-outline-primary mr-2">F</a>
        <a href="" class="btn btn-outline-danger">I</a>
      </div>
    </nav>

    <section class="container fondo">

  <?php

    include_once 'conexion.php';
          
          
    $sql = "SELECT * from product ";
    $result= mysqli_query($conexion,$sql);

    while($mostrar=mysqli_fetch_array($result)){
      $imgUrl = $mostrar['url_image'];
  ?>
          <div class="panel panel-default" align='center'> 
            <div class="panel-heading">
              <?php echo $mostrar['name']?>
            </div>
              <div class="panel-body">
                <img src=<?php echo $imgUrl ?> alt="producto">
              </div>

              <table class="table">
                <?php echo "<br/>",'$', $mostrar['price'], ' BotonCarrito'?>
              </table>
          </div>
  <?php
    }
  ?>
  

    </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>