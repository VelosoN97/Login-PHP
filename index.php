<?php
    session_start();
    if(isset($_SESSION['username'])){
        header("location: profile.php");
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro y Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style type="text/css">
        #alert,
        #register-box,
        #forgot-box {
            display: none;
        }
    </style>
</head>

<body class="bg-dark">
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-4 offset-lg-4" id="alert">
                <div class="alert alert-success">
                    <strong id="result"></strong>
                </div>
            </div>
        </div>

        <!-- Formulario de inicio de sesión -->
        <div class="row">
            <div class="col-lg-4 offset-lg-4 bg-light rounded" id="login-box">
                <h2 class="text-center mt-2">Login</h2>
                <form action="" method="post" role="form" class="p-2" id="login-frm">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" 
                        placeholder="Nombre de usuario"
                        required minlength="2" value="<?php if(isset($_COOKIE['username']))
                        {echo $_COOKIE['username'];} ?>">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" 
                        placeholder="Contraseña" required minlength="6" value="<?php if(isset($_COOKIE
                        ['password'])){echo $_COOKIE['password'];} ?>">
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="rem" class="custom-control-input" id="customCheck"
                            <?php if(isset($_COOKIE['username'])) { ?> checked <?php } ?>>
                            <label for="customCheck" class="custom-control-label">Recuerdame</label>
                            <a href="#" id="forgot-btn" class="float-right">¿Olvidaste tu Contraseña?</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="login" id="login" value="Entrar" 
                        class="btn btn-primary btn-block">
                    </div>
                    <div class="form-group">
                        <p class="text-center">No tienes cuenta? <a href="#" id="register-btn">
                            Regístrate aquí</a></p>
                    </div>
                </form>
            </div>
        </div>

        <!-- Formulario de registro -->
        <div class="row">
            <div class="col-lg-4 offset-lg-4 bg-light rounded" id="register-box">
                <h2 class="text-center mt-2">Registro</h2>
                <form action="" method="post" role="form" class="p-2" id="register-frm">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Nombre Completo" 
                        required minlength="3">
                    </div>
                    <div class="form-group">
                        <input type="text" name="uname" class="form-control" placeholder="Nombre de usuario"
                    required minlength="4">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" 
                        placeholder="Correo electrónico" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="pass" id="pass" class="form-control" 
                        placeholder="Contraseña" 
                        required minlength="6">
                    </div>
                    <div class="form-group">
                        <input type="password" name="cpass" id="cpass" class="form-control" 
                        placeholder="Repetir Contraseña"
                        required minlength="6">
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="rem" class="custom-control-input" id="customCheck2">
                            <label for="customCheck2" class="custom-control-label">
                                Estás de acuerdo con los <a href="#">términos y condiciones.</a></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="register" id="register" value="Registrarse"
                            class="btn btn-primary btn-block">
                    </div>
                    <div class="form-group">
                        <p class="text-center">Ya estás registrado? 
                            <a href="#" id="login-btn">Inicia sesión</a></p>
                    </div>
                </form>
            </div>
        </div>

        <!-- olvidaste contraseña -->
        <div class="row">
            <div class="col-lg-4 offset-lg-4 bg-light rounded" id="forgot-box">
                <h2 class="text-center mt-2">Recuperar Contraseña</h2>
                <form action="" method="post" role="form" class="p-2" id="forgot-frm">
                    <div class="form-group">
                        <small class="text-muted">
                            Para restablecer su contraseña, ingrese su correo electrónico y le enviaremos
                            las instrucciones para que pueda cambiar su contraseña.
                        </small>
                    </div>
                    <div class="form-group">
                        <input type="email" name="femail" class="form-control" placeholder="Correo electrónico"
                            required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="forgot" id="forgot" value="Enviar" class="btn btn-primary btn-block">
                    </div>
                    <div class="form-group text-center">
                        <a href="#" id="back-btn">Regresar</a>
                    </div>
                </form>
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
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"></script>   
    <script>
        $(document).ready(function () {
            $("#register-btn").click(function () {
                $("#register-box").show();
                $("#login-box").hide();
            });
            $("#login-btn").click(function () {
                $("#register-box").hide();
                $("#login-box").show();
            });
            $("#forgot-btn").click(function () {
                $("#login-box").hide();
                $("#forgot-box").show();
            });
            $("#back-btn").click(function () {
                $("#forgot-box").hide();
                $("#login-box").show();
            });
            $("#login-frm").validate();
            $("#register-frm").validate({
                rules:{
                    cpass:{
                        equalTo:"#pass",
                    }
                }
            });
            $("#forgot-frm").validate();

            //enviar formulario sin actualizar la página

            $("#register").click(function(e){
                if(document.getElementById('register-frm').checkValidity()){
                    e.preventDefault();
                    $.ajax({
                        url: 'action.php',
                        method: 'post',
                        data: $("#register-frm").serialize()+'&action=register',
                        success: function(response){
                            $("#alert").show();
                            $("#result").html(response);
                        }
                    });
                }
                return true;
            });

            $("#login").click(function(e){
                if(document.getElementById('login-frm').checkValidity()){
                    e.preventDefault();
                    $.ajax({
                        url: 'action.php',
                        method: 'post',
                        data: $("#login-frm").serialize()+'&action=login',
                        success: function(response){
                            if(response === "ok"){
                                window.location = 'profile.php';
                            } else {
                                $("#alert").show();
                                $("#result").html(response);
                            }                           
                        }
                    });
                }
                return true;
            });

            $("#forgot").click(function(e){
                if(document.getElementById('forgot-frm').checkValidity()){
                    e.preventDefault();
                    $.ajax({
                        url: 'action.php',
                        method: 'post',
                        data: $("#forgot-frm").serialize()+'&action=forgot',
                        success: function(response){
                            $("#alert").show();
                            $("#result").html(response);
                        }
                    });
                }
                return true;
            });          
        });

    </script>
</body>

</html>