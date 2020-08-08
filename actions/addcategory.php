<?php 

if(isset($_POST)){
    require_once '../includes/connection.php';

    $name = isset($_POST['name']) ? mysqli_real_escape_string($db, $_POST['name']) : false;

    $sql = "INSERT INTO categories VALUES(null, '$name');";
    $category = mysqli_query($db, $sql);
}

header("Location: ../index.php");