<?php 
require 'config.php';
if(isset($_POST['action']) && $_POST['action'] == 'register'){
    $name = check_input($_POST['name']);
    $uname = check_input($_POST['uname']);
    $email = check_input($_POST['email']);
    $pass = check_input($_POST['pass']);
    $cpass = check_input($_POST['cpass']);
    $pass = sha1($pass);
    $cpass = sha1($cpass);
    $created = date("Y-m-d");

    if($pass != $cpass){
        echo "La contraseña no coincide";
        exit();
    } else {
        $sql = $conn->prepare("SELECT username, email FROM users WHERE username=? OR email=?");
        $sql->bind_param("ss", $uname, $email);
        $sql->execute();
        $result = $sql->get_result();
        $row = $result->fetch_array(MYSQLI_ASSOC);

        if ($row) {
            if($row['username'] == $uname){
                echo "Nombre de usuario no disponible, prueba con otro diferente";
            } elseif($row['email'] == $email) {
                echo "Este correo electrónico ya está registrado, prueba con otro diferente";
            }
        } else {
            $stmt = $conn->prepare("INSERT INTO users (name, username, email, pass, created) 
                                    VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $name, $uname, $email, $pass, $created);
            if($stmt->execute()){
                echo 'Registro exitoso, ¡inicia sesión ahora ya!';
            } else {
                echo 'Algo salió mal, por favor vuelva a intentarlo';
            }
        }
    }
}

if(isset($_POST['action']) && $_POST['action'] == 'login'){
    session_start();

    $username = $_POST['username'];
    $password = sha1($_POST['password']);

    $stmt_l = $conn -> prepare("SELECT * FROM users WHERE username=? AND pass=?");
    $stmt_l -> bind_param("ss", $username, $password);
    $stmt_l -> execute();
    $user = $stmt_l->fetch();

    if($user != null){
        $_SESSION['username'] = $username;
        echo "ok";

        if(!empty($_POST['rem'])){
            setcookie("username", $_POST['username'], time() + (10 * 365 * 24 * 60 * 60));
            setcookie("password", $_POST['password'], time() + (10 * 365 * 24 * 60 * 60));
        } else {
            if(isset($_COOKIE['username'])){
                setcookie("username", "");
            }
            if(isset($_COOKIE['password'])){
                setcookie("password", "");
            }
        }
    } else {
        echo "Fallo al iniciar sesión, verifique si su nombre de usuario o contraseña estén correctos";
    }
}

function check_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

