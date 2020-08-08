<?php 

if(isset($_POST)){
    require_once '../includes/connection.php';

    $title          = isset($_POST['title']) ? mysqli_real_escape_string($db, $_POST['title']) : false;
    $description    = isset($_POST['description']) ? mysqli_real_escape_string($db, $_POST['description']) : false;
    $category       = isset($_POST['category']) ? (int)$_POST['category'] : false;
    $user = $_SESSION['user']['id'];
    
    if(isset($_GET['edit'])){
        $entry_id = $_GET['edit'];
        $user_id = $_SESSION['user']['id'];
        $sql = "UPDATE entries SET title='$title', description='$description', categorie_id=$category WHERE id=$entry_id AND user_id=$user_id";
    }else{
        $sql = "INSERT INTO entries VALUES(null, $user, $category, '$title', '$description', CURDATE());";
    }
    $entry = mysqli_query($db, $sql);
}

header("Location: ../index.php");

