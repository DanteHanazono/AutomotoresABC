<!DOCTYPE html>
<html>
<head>

  <title></title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <link rel="stylesheet" type="text/css" href="public/css/themify-icons.css">

  <link href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.0/animate.min.css" rel="stylesheet">

  <script type="text/javascript" src="public/js/bootstrap-notify.min.js"></script>
  <script type="text/javascript" src="public/js/default.js"></script>

</head>
<body>

  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="#">Automotores ABC</a>

    <!-- Links -->
    <ul class="navbar-nav">
      <li class="nav-item">
       <a class="nav-link" href="/AutomotoresABC">Inicio<span class="sr-only">(current)</span></a>
     </li>
     <li class="nav-item">
      <?php if (isset($_SESSION["usu_id"])) { 
        if ($_SESSION["usu_rol"] == 1) { ?>
          <li class="nav-item">
            <a class="nav-link" href="?controlador=vehiculo&accion=index">Adm. Vehiculos</a>
          </li>
        <?php } } ?>
        <?php if (isset($_SESSION["usu_id"])) { 
          if ($_SESSION["usu_rol"] == 1) { ?>
            <li class="nav-item" >
              <a class="nav-link" href="?controlador=usuario&accion=index">Adm. Clientes</a>
            </li>
          <?php } } ?>
          <?php if (isset($_SESSION["usu_id"])) { 
            if ($_SESSION["usu_rol"] == 1) { ?>
              <li class="nav-item" >
                <a class="nav-link" href="?controlador=compra&accion=index">Comprar Vehiculo</a>
              </li>
            <?php } } ?>
            <?php if (!isset($_SESSION["usu_id"])) { ?>
              <li class="nav-item">
                <a class="nav-link" href="?controlador=usuario&accion=frmLogin">Iniciar Sesión</a>
              </li>
            <?php } ?>


            <!-- Dropdown -->
            <?php if (isset($_SESSION["usu_id"])) { ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                  <?php echo $_SESSION["usu_nick"];?> 
                </a>
                <div class="dropdown-menu">
                  <?php if (isset($_SESSION["usu_id"])) { ?>
                    <a class="dropdown-item" href="?controlador=usuario&accion=frmPerfil">Perfil</a>
                  <?php } ?>
                  <?php if (isset($_SESSION["usu_id"])) { ?>
                    <a class="dropdown-item" href="?controlador=usuario&accion=cerrar"> Cerrar Sesión </a>        
                  <?php } ?>

                </div>
              </li>
            <?php } ?>
          </ul>
        </nav>

        <br>
        <div class="container">
          <div class="jumbotron jumbotron-fluid border-dark">
            <div class="container">
              <h1 class="display-4">Automotores ABC</h1>
              <p class="lead"></p>
            </div>
          </div>
