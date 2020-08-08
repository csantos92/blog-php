<?php require_once 'includes/redirect.php';?>
<?php require_once 'includes/header.php';?>

<section class="section-wrapper">
    <h1>Actualizar datos</h1>

    <form class="text-center entry-form" action="actions/updateaccount.php" method="POST">
        <label for="name">Nombre</label>
        <input type="text" class="form-control mb-4 size" name="name" placeholder="<?=$_SESSION['user']['name'];?>" required>
        <label for="surname">Apellido</label>
        <input type="text" class="form-control mb-4 size" name="surname" placeholder="<?=$_SESSION['user']['surname'];?>" required>
        <label for="email">Email</label>
        <input type="email" class="form-control mb-4 size" name="email" placeholder="<?=$_SESSION['user']['email'];?>" required>
        <input type="submit" class="btn btn-info btn-block my-4 size" name="submit" value="Actualizar">
    </form>

</section>

<?php require_once 'includes/aside.php';?>
<?php require_once 'includes/footer.php';?>