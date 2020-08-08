<?php require_once 'includes/header.php';?>
    
<section class="section-wrapper">

    <h1>Todas las entradas</h1>

    <?php 
        $entries = getEntries($db, null);
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
        endif;
    ?>

</section>

<?php require_once 'includes/aside.php';?>
<?php require_once 'includes/footer.php';?>

