<?php require_once 'includes/connection.php';?>
<?php require_once 'includes/helpers.php';?>

<?php
    if(!isset($_SESSION['user'])){
        header('Location: index.php');
    }
?>

<?php require_once 'includes/header.php';?>
    
<section class="section-wrapper">
    <h1>Entradas de <?=$_SESSION['user']['name'];?></h1>

    <?php 
        $entries = getEntries($db, null, null, null, true);

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
        <p>Todavía no hay ninguna entrada escrita por <?=$_SESSION['user']['name'];?></p>
    <?php endif;?>

</section>

<?php require_once 'includes/aside.php';?>
<?php require_once 'includes/footer.php';?>
