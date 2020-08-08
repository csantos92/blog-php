<?php require_once 'includes/connection.php';?>
<?php require_once 'includes/helpers.php';?>

<?php
    $current_entry = getEntry($db, $_GET['id']);
    if(!isset($current_entry['id'])){
        header('Location: index.php');
    }
?>

<?php require_once 'includes/header.php';?>
    
<section class="section-wrapper">
    <h1><?=$current_entry['title'];?></h1>

        <article class="entry">
            <span><?=$current_entry['category'].' | '.$current_entry['date_post'].' | '?></span>
            <span>Escrito por <strong><?=$current_entry['user']?></strong></span>
            <?php if(isset($_SESSION['user']) && $_SESSION['user']['id'] == $current_entry['user_id']):?>
                <a href="edit.php?id=<?=$current_entry['id']?>" class="btn btn-outline-warning btn-sm">Editar</a>
                <a href="actions/delete.php?id=<?=$current_entry['id']?>" class="btn btn-outline-danger btn-sm">Borrar</a>
            <?php endif ;?>
            <p><?=$current_entry['description']?></p>
        </article>
</section>

<?php require_once 'includes/aside.php';?>
<?php require_once 'includes/footer.php';?>