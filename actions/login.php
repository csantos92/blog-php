<?php

require_once '../includes/connection.php';

if(isset($_POST)){
    
    //Borrar error antiguo
    if(isset($_SESSION['error_login'])){
        session_unset();
    }
    
    //Recoger los datos del formulario
    $email = trim($_POST['email']);
    $password = $_POST['pass'];
    
    //Consulta para comprobrar las credenciales del usuario
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $login = mysqli_query($db, $sql);
    
    if($login && mysqli_num_rows($login)){
        $usuario = mysqli_fetch_assoc($login);
        
        //Comprobar contraseña
        $verify = password_verify($password, $usuario['pass']);
        
        if($verify){
            //Utilizar una sesión para guardar los datos del usuario logueado
            $_SESSION['user'] = $usuario;
            header('Location: ../index.php');
        }else{
            $_SESSION['error_login'] = "Datos de usuario incorrectos";
            header('Location: ../log.php');
        }
    }else{
        $_SESSION['error_login'] = "Datos de usuario incorrectos";
        header('Location: ../log.php');
    }
}

