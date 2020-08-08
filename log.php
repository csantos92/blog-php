<?php require_once 'includes/connection.php'; ?>
<?php require_once 'includes/helpers.php'; ?>
<?php require_once 'includes/header.php'; ?>

<section class="section-wrapper">

    <?php if(isset($_SESSION['registered'])): ?>
        <p class="alert-success"><?=$_SESSION['registered']?></p>
        <?=$_SESSION['registered'] = ""?>
    <?php endif;?>

    <?php if (!isset($_SESSION['user'])) : ?>
        <div id="login" class="login-box log-form-margin">
            <!-- Default form login -->
            <form class="text-center" action="actions/login.php" method="POST">
                <p class="h4 mb-4">Inicia sesión</p>
                <!-- Email -->
                <input type="email" id="defaultLoginFormEmail" name="email" class="form-control mb-4 size" placeholder="Email">
                <!-- Password -->
                <input type="password" id="defaultLoginFormPassword" name="pass" class="form-control mb-4 size" placeholder="Contraseña">
                <!-- Sign in button -->
                <button class="btn btn-info btn-block my-4 size" type="submit">Iniciar sesión</button>
            </form>

            <?php if(isset($_SESSION['error_login'])): ?>
                <p class="alert-error"><?=$_SESSION['error_login']?></p>
                <?=$_SESSION['error_login'] = null ?>
            <?php endif; ?>

        </div>

        <p class="h4 mb-4" style="text-align: center;">O</p>

        <div id="register" class="login-box">

            <form class="text-center log-form-margin" action="actions/register.php" method="POST">
                <p class="h4 mb-4">Regístrate</p>
                <!-- First name -->
                <input type="text" id="defaultRegisterFormFirstName" name="name" class="form-control mb-4 size" placeholder="Nombre">
                <!-- Last name -->
                <input type="text" id="defaultRegisterFormLastName" name="surname" class="form-control mb-4 size" placeholder="Apellido">
                <!-- E-mail -->
                <input type="email" id="defaultRegisterFormEmail" name="email" class="form-control mb-4 size" placeholder="Email">
                <!-- Password -->
                <input type="password" id="defaultRegisterFormPassword" name="pass" class="form-control size" placeholder="Contraseña" aria-describedby="defaultRegisterFormPasswordHelpBlock">
                <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4 size">
                    Al menos 8 caracteres y un número
                </small>
                <!-- Sign up button -->
                <button class="btn btn-info my-4 btn-block size" type="submit">Registrarse</button>
            </form>
        </div>
    <?php else: 
        header('Location: index.php');
    endif;?>

</section>

<?php require_once 'includes/aside.php'; ?>
<?php require_once 'includes/footer.php'; ?>