<?php
    if(!isset($_POST['search'])){
        header('Location: index.php');
    }
?>

<?php require_once 'includes/header.php';?>
    
<section class="section-wrapper"> 
    <h1>Búsqueda: <?=$_POST['search'];?></h1>

    <?php 
        $entries = getEntries($db, null, null, $_POST['search']);
        if(!empty($entries) && mysqli_num_rows($entries) >= 1): 
            while($entry = mysqli_fetch_assoc($entries)):
    ?>
            <article class="entries">
                <a href="entry.php?id=<?=$entry['id']?>">
                <h2><?=$entry['title']?></h2>
                <span><?=$entry['category'].' | '.$entry['date_post']?></span>
                <p><?=substr($entry['description'], 0, 300).'...'?></p>
                </a>
            </article>
    <?php   
            endwhile;
        else:
    ?>
        <p>Todavía no hay ninguna entrada para esta categoría</p>
    <?php endif;?>

</section>

<?php require_once 'includes/aside.php';?>
<?php require_once 'includes/footer.php';?>