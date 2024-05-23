<?php 
    require 'session.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="#"><?php echo $name ?></a>
    <!-- Links -->
    <ul class="navbar-nav ml-auto" style="margin-right: 60px;">
        <li class="nav-item">
        <a class="nav-link" href="#">Servicios</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">Blog</a>
        </li>

        <!-- Dropdown -->
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
            <?php echo $username; ?>
        </a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Opciones</a>
            <a class="dropdown-item" href="logout.php">Cerrar sesión</a>
        </div>
        </li>
    </ul>
    </nav>
    <div class="container-fluid">
        <div class="jumbotron jumbotron-fluid">
            <div class="container ">
                <h1 class="text-center display-4">Bienvenido</h1>
                <h1 class="text-center display-2"><?php echo $name; ?></h1>
                <h2 class="text-center">Email: <?php echo $email; ?></h2>
                <h2 class="text-center">Registrado en: <?php echo $created; ?></h2>
                <p class="text-center">Sitio creado a modo de prueba</p>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
        </script>
</body>
</html>