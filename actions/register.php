<?php 

if(isset($_POST)){
    
    require_once '../includes/connection.php';
    
    //Recoger valores del formulario
    $name =     isset($_POST['name']) ? mysqli_real_escape_string($db, $_POST['name']) : false;
    $surname =  isset($_POST['surname']) ? mysqli_real_escape_string($db, $_POST['surname']) : false;
    $email =    isset($_POST['email']) ? mysqli_real_escape_string($db, $_POST['email']) : false;
    $pass =     isset($_POST['pass']) ? mysqli_real_escape_string($db, $_POST['pass']) : false;
    
    //Cifrar contraseñas
    $safe_pass = password_hash($pass, PASSWORD_BCRYPT);
    
    //Insertar usuario
    $sql = "INSERT INTO users VALUES(null, '$name', '$surname', '$email', '$safe_pass');";
    $insert_user = mysqli_query($db, $sql);
    
    if($insert_user){
        $_SESSION['registered'] = "Registrad@ con éxito";
    }
}

header('Location: ../log.php');