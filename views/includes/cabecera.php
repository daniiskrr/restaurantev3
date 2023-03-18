<!DOCTYPE html PUBLIC>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Autor">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/navbars/">
    <link href="<?= base_url ?>assets/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url ?>assets/full_estil.css" rel="stylesheet" type="text/css" media="screen">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/notie/dist/notie.min.css">
    <script src="<?= base_url ?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/notie/4.3.1/notie.min.js"></script>
    <title><?= $titulo ?></title>
</head>
<?php
if(isset($_SESSION['compra'])){
  $numerito = count($_SESSION['compra']);
}else{
  $numerito = 0;
}
?>
<body>
<header>
  <nav class="navbar navbar-expand-lg bg-white">
    <div class="container-xxl">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand text-color1" href="<?= base_url ?>producto/index"><img class="logotipo" src="<?= base_url ?>views/imagenes/logotipo.svg" width="244" height="126" alt="Logotipo de la web que contiene el nombre de la tienda (delicias del patio) junto a su eslogan"></a>  
                
      <div id="botones_tienda_smartphone">
        <?php if(isset($_SESSION['usuario'])){ ?>
          <!-- Si el usuario inicia sesión -->
          <a href="<?= base_url ?>usuario/datosusuario" id="datosusuario" name="datosusuario" class="me-3 hoverable"><img src="<?= base_url ?>views/imagenes/iconologin.svg" alt="Icono para modificar los datos del usuario"></a>
          <a href="<?= base_url ?>usuario/adiosusuario" id="adiosusuario" name="adiosusuario" class="me-3 hoverable">
            <img src="<?= base_url ?>views/imagenes/exitlogin.svg" alt="Icono para cerrar sesión">
          </a>
        <?php } else { ?>
          <!-- Mostrar elementos del menú para usuario sin sesión iniciada -->
          <a href="<?= base_url ?>usuario/login" id="login" class="me-3 hoverable"><img src="<?= base_url ?>views/imagenes/iconologin.svg" alt="Icono para iniciar sesión en la página"></a>
        <?php } ?>
        <a href="<?= base_url ?>producto/carrito"><img src="<?= base_url ?>views/imagenes/iconocarrito.svg" alt="Icono para ver los productos de la cesta que hayamos añadido de la tienda"></a>
        <span class="mostrar"><?php $numerito ?></span>
      </div>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?= base_url ?>producto/index">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="<?= base_url ?>producto/sobrenosotros">Sobre Nosotros</a>
          </li>
          <li class="nav-item dropdown tiendaBoton">
            <a class="nav-link dropdown-toggle active" href="<?= base_url ?>producto/tienda">Tienda</a>
            <ul class="dropdown-menu mostrar">
              <li><a class="dropdown-item" href="<?= base_url ?>producto/tienda#seccionjamones">Jamones</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="<?= base_url ?>producto/tienda#seccionbocadillos">Bocadillos</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="<?= base_url ?>producto/tienda#seccionofertas">Ofertas</a></li>
            </ul>
          </li>
          <?php if(isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 'Admin') { ?>
          <li class="nav-item">
            <a class="nav-link active" href="<?= base_url ?>producto/paneladmin">Productos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="<?= base_url ?>usuario/paneladmin">Usuarios</a>
          </li>  
          <?php } ?>
        </ul>
        <div id="botones_tienda_escritorio" class="form-inline my-2 my-lg-0">
        <?php if(isset($_SESSION['usuario'])){ ?>
          <!-- Si el usuario inicia sesión -->
          <a href="<?= base_url ?>usuario/datosusuario" id="datosusuario" name="datosusuario" class="me-3 hoverable"><img src="<?= base_url ?>views/imagenes/iconologin.svg" alt="Icono para modificar los datos del usuario"></a>
          <a href="<?= base_url ?>usuario/adiosusuario" id="adiosusuario" name="adiosusuario" class="me-3 hoverable">
            <img src="<?= base_url ?>views/imagenes/exitlogin.svg" alt="Icono para cerrar sesión">
          </a>
        <?php } else { ?>
          <!-- Mostrar elementos del menú para usuario sin sesión iniciada -->
          <a href="<?= base_url ?>usuario/login" id="login" class="me-3 hoverable"><img src="<?= base_url ?>views/imagenes/iconologin.svg" alt="Icono para iniciar sesión en la página"></a>
        <?php } ?>
          <a href="<?= base_url ?>producto/carrito" class="hoverable"><img src="<?= base_url ?>views/imagenes/iconocarrito.svg" alt="Icono para ver los productos de la cesta que hayamos añadido de la tienda"></a><p class="hoverable"><?php echo $numerito ?></p>
        </div>
      </div>
    </div>
  </nav>
</header>
<div id="popup-1" style="display:none;">
    <div id="popup-contenedor">
        <p>¡Obtén un 10% de descuento en tu próxima compra! Utiliza el código "DESCUENTO10".</p>
        <button id="cerrar-popup">Cerrar</button>
    </div>
    </div>
    <div id="popup-2" style="display:none;">
    <div id="popup-contenedor">
        <p>¡Obtén un 20% de descuento en tu próxima compra! Utiliza el código "DESCUENTO20".</p>
        <button id="cerrar-popup-2">Cerrar</button>
    </div>
    </div>
    <script src="<?= base_url ?>assets/js/popup.js"></script>
</body>