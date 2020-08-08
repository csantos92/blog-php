<?php require_once 'includes/redirect.php';?>
<?php require_once 'includes/header.php';?>

<section class="section-wrapper">
    <h1>Añadir entrada</h1>

    <form class="text-center entry-form" action="actions/addentry.php" method="POST">
        <label for="title">Título de la entrada</label>
        <input type="text" class="form-control mb-4 size" name="title"/>

        <label for="description">Descripción de la entrada:</label>
        <textarea type="text" class="form-control mb-4 size" name="description"></textarea>

        <label for="category">Categoría de la entrada:</label>
        <select name="category">
            <?php 
                $categories = getCategories($db);
                if(!empty($categories)):
                    while($category = mysqli_fetch_assoc($categories)):
            ?>

                <option value="<?=$category['id']?>">
                        <?=$category['name']?>
                </option>

            <?php
                    endwhile;
                endif;
            ?>
        </select>

        <input type="submit" class="btn btn-info btn-block my-4 size" value="Crear categoría"/>
    </form>
</section>

<?php require_once 'includes/aside.php';?>
<?php require_once 'includes/footer.php';?>