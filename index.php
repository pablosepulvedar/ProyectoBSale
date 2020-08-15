<?php 
  include_once 'global/conexion.php';
  include_once 'global/safe.php';
  include 'carrito.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
      <style>
      .slider{
        background: url("img/Fondo.jpg");
        height: 100vh;
        background-size: cover;
        background-position: center;
      }
    </style>

  <title>BSale</title>
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

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
          <a class="nav-item nav-link" href="#">Carrito(0)</a>
          <a class="nav-item nav-link" href="#">Contacto</a>
      </div>
      <div class="d-flex flex-row justify-content-center">
        <a href="" class="btn btn-outline-primary mr-2">F</a>
        <a href="" class="btn btn-outline-danger">I</a>
      </div>
    </nav>

  <div class="container">
    <br>
      <div class="alert alert-success">
        <?php echo $mensaje; ?>
        <a href="#" class="badge badge-success">Ver Carrito</a>
      </div>

      <div class="row">
        <?php
          $sentencia=$pdo->prepare("SELECT * FROM product");
          $sentencia->execute();
          $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <?php foreach($listaProductos as $producto){ ?>
          <div class="col-3">
            <div class="card">
              <img 
              title="<?php echo $producto['name'];?>"
              alt="<?php echo $producto['name'];?>"
              class="card-img-top" 
              src="<?php echo $producto['url_image'];?>"
              data-toggle="popover"
              data-trigger="hover"
              data-content="Categoria: <?php echo $producto['category'];?>. Marca: <?php echo $producto['brand'];?>."
              >

              <div class="card-body">
                <span><?php echo $producto['name']; ?></span>
                <h5 class="card-title">$<?php echo $producto['price'];?></h5>
                
                <form action="" method="post">
                  <input type="text" name="id" id="id" value="<?php echo openssl_encrypt($producto['id'], $COD, $KEY);?>">
                  <input type="text" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['name'], $COD, $KEY);?>">
                  <input type="text" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['price'], $COD, $KEY);?>">
                  <input type="text" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1, $COD, $KEY);?>">

                  <button class="btn btn-primary"
                      name="btnAction"
                      value="Agregar" 
                      type="submit">
                      agregar al carrito
                  </button>
                </form>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
  </div>

  <script>
    $(function () {
      $('[data-toggle="popover"]').popover()
    })
  </script>
</body>
</html>