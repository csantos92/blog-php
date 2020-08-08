<?php require_once 'includes/redirect.php';?>
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
    <h1>Editar entrada</h1>

    <form class="text-center entry-form" action="actions/addentry.php?edit=<?=$current_entry['id']?>" method="POST">
        <label for="title">Título de la entrada</label>
        <input type="text" class="form-control mb-4 size" name="title" placeholder="<?=$current_entry['title']?>"/>

        <label for="description">Descripción de la entrada:</label>
        <textarea type="text" class="form-control mb-4 size" name="description"><?=$current_entry['description']?></textarea>

        <label for="category">Categoría de la entrada:</label>
        <select name="category">
            <?php 
                $categories = getCategories($db);
                if(!empty($categories)):
                    while($category = mysqli_fetch_assoc($categories)):
            ?>

                <option value="<?=$category['id']?>" <?=($category['id'] == $current_entry['categorie_id']) ? 'selected="selected"' : '' ?>>
                        <?=$category['name']?>
                </option>

            <?php
                    endwhile;
                endif;
            ?>
        </select>

        <input type="submit" class="btn btn-info btn-block my-4 size" value="Editar entrada"/>
    </form>
</section>

<?php require_once 'includes/aside.php';?>
<?php require_once 'includes/footer.php';?>