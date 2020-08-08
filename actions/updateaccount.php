<?php 

if(isset($_POST)){
    require_once '../includes/connection.php';

    $name =     isset($_POST['name']) ? mysqli_real_escape_string($db, $_POST['name']) : false;
    $surname =  isset($_POST['surname']) ? mysqli_real_escape_string($db, $_POST['surname']) : false;
    $email =    isset($_POST['email']) ? mysqli_real_escape_string($db, $_POST['email']) : false;
    $user = $_SESSION['user'];
   
    $sql = "UPDATE users SET ".
				   "name = '$name', ".
				   "surname = '$surname', ".
				   "email = '$email' ".
				   "WHERE id = ".$user['id'];
    $update = mysqli_query($db, $sql);

    if($update){
        $_SESSION['user']['name'] = $name;
        $_SESSION['user']['surname'] = $surname;
        $_SESSION['user']['email'] = $email;
    }
}

header("Location: ../account.php");

