<?php require_once 'includes/connection.php';?>
<?php require_once 'includes/helpers.php';?>

<?php
    $current_category = getCategory($db, $_GET['id']);
    if(!isset($current_category['id'])){
        header('Location: index.php');
    }
?>

<?php require_once 'includes/header.php';?>
    
<section class="section-wrapper">
    <h1>Entradas de <?=$current_category['name'];?></h1>

    <?php 
        $entries = getEntries($db, null, $_GET['id']);
        if(!empty($entries) && mysqli_num_rows($entries) >= 1): 
            while($entry = mysqli_fetch_assoc($entries)):
    ?>
            <a class="entries" href="entry.php?id=<?=$entry['id']?>">
                <article>                  
                    <h2><?=$entry['title']?></h2>
                    <span><?=$entry['category'].' | '.$entry['date_post']?></span>
                    <p><?=substr($entry['description'], 0, 200).'... <strong>Leer más</strong>'?></p>
                </article>
            </a>
    <?php   
            endwhile;
        else:
    ?>
        <p>Todavía no hay ninguna entrada para esta categoría</p>
    <?php endif;?>

</section>

<?php require_once 'includes/aside.php';?>
<?php require_once 'includes/footer.php';?>
