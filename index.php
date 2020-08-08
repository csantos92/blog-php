<?php require_once 'includes/header.php';?>
    
    <section class="section-wrapper">

        <h1>Últimas entradas</h1>

        <?php 
            $entries = getEntries($db, true);
            if(!empty($entries)): 
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

        <div id="show-entries">
            <a class="btn btn-outline-primary btn-sm" href="entries.php">Ver todas las entradas</a>
        </div>

    </section>

<?php require_once 'includes/aside.php';?>
<?php require_once 'includes/footer.php';?>

