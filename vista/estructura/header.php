<html>
<head>
  <meta charset="UTF-8">
  <title>Ejemplo Geolocalización</title>
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.10.1.min.js"></script>
  <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script>
  <link rel="stylesheet" href="<?php echo $dir?>../css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo $dir?>../css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $dir?>../css/estilos.css">
  <script src="<?php echo $dir?>../js/bootstrap.bundle.js"></script>
  <!--<script type="text/javascript" src="vista/js/mostrarMapa.js"></script>-->

</head>
<body>
  <header class="container-fluid" > 
    <div class="pt-5">
      <h3 class="text-secondary text-center">Libreria PHP Geo</h3>
    </div>
    <div class="pt-5">
      <ul class="nav nav-tabs navbar-light bg-light">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../home/index.php">Inicio</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">TP Librerias</a>
            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-item" href="<?php echo $dir?>ingCoord.php">Cambiar formato</a>
              </li>
              <li>
                <a class="dropdown-item" href="<?php echo $dir?>cuaCoord.php">Mostrar 4 coordenadas</a>
              </li>
              <li>
                <a class="dropdown-item" href="<?php echo $dir?>longitudLinea.php">Longitud de linea</a>
              </li>
              <li>
                <a class="dropdown-item" href="<?php echo $dir?>perimetro.php">Perimetro</a>
              </li>
              <li>
                <a class="dropdown-item" href="<?php echo $dir?>crearPolilinea.php">Crear polilinea</a>
              </li>
              <li>
                <a class="dropdown-item" href="../poligono/formPoligono.php">Crear poligono</a>
              </li>
            </ul>
          </li>
          <!--<li class="nav-item">
              <a class="nav-link" href="#">Enlace</a>
            </li>
            -->
      </ul>
    </div>
    </header>