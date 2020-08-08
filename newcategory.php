<?php require_once 'includes/redirect.php';?>
<?php require_once 'includes/header.php';?>

<?php if($_SESSION['user']['id'] != 30):?>
    <section>
        <h1>No tienes permisos para acceder a esta página</h1>
    </section>
<?php else:?>
    <section class="section-wrapper">
        <h1>Crear categoría</h1>

        <form class="text-center entry-form" action="actions/addcategory.php" method="POST">
            <label for="name">Nombre de categoría</label>
            <input type="text" class="form-control mb-4 size" name="name"/>

            <input type="submit" class="btn btn-info btn-block my-4 size" value="Crear categoría"/>
        </form>
    </section>
<?php endif; ?>

<?php require_once 'includes/aside.php';?>
<?php require_once 'includes/footer.php';?>