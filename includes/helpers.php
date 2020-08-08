<?php

function showError($errors, $field){
    $alert = '';
    if(isset($errors[$field]) && !empty($field)){
        $alert = "<div class='alert alert-error'>".$errors[$field]."</div>";
    }
    
    return $alert;
}

function deleteErrors(){
    $deleted = false;
    
    if(isset($_SESSION['success'])){
        $_SESSION['errors'] = null;
        $delete = session_unset($_SESSION['errors']);
    }
    
    if(isset($_SESSION['success'])){
        $_SESSION['success'] = null;
        session_unset($_SESSION['success']);
    }
    
    return $deleted;
}

function getCategories($db){
    $sql = "SELECT * FROM categories ORDER BY id ASC;";
    $categories = mysqli_query($db, $sql);

    $result = array();
    if($categories && mysqli_num_rows($categories) >= 1){
        $result = $categories;
    }

    return $result;
}

function getCategory($db, $id){
    $sql = "SELECT * FROM categories WHERE id = $id;";
    $categories = mysqli_query($db, $sql);

    $result = array();
    if($categories && mysqli_num_rows($categories) >= 1){
        $result = mysqli_fetch_assoc($categories);
    }

    return $result;
}

function getEntries($db, $limit = null, $category = null, $search = null, $user = null){
    $sql = "SELECT e.*, c.name AS 'category'FROM entries e".
    " INNER JOIN categories c ON e.categorie_id = c.id ";

    if(!empty($category)){
        $sql .= "WHERE e.categorie_id = $category";
    }

    if(!empty($search)){
        $sql .= "WHERE e.title LIKE '%$search%'";
    }

    if(!empty($user)){
        $sql .= "WHERE e.user_id = ".$_SESSION['user']['id'];
    }

    $sql .= " ORDER BY e.id DESC ";

    if($limit != null){
        $sql .= "LIMIT 3";
    }

    $lastEntries = mysqli_query($db, $sql);

    $result = array();
    if($lastEntries && mysqli_num_rows($lastEntries) >= 1){
        $result = $lastEntries;
    }

    return $result;
}

function getEntry($db, $id){
    $sql = "SELECT e.*, c.name AS 'category', u.name AS user FROM entries e INNER JOIN categories c ON e.categorie_id = c.id INNER JOIN users u ON e.user_id = u.id WHERE e.id = $id";
    $entry = mysqli_query($db, $sql);

    $result = array();
    if($entry){
        $result = mysqli_fetch_assoc($entry);
    }

    return $result;
}
