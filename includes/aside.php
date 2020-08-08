<aside>

    <?php if(isset($_SESSION['user'])): ?>
        <div class="user-box">
            <p><?= "Bienvenido, <strong>".$_SESSION['user']['name']."</strong>"; ?></p>
            
            <a href="newentry.php" class="btn btn-outline-info btn-sm button">Crear entradas</a>

            <?php if($_SESSION['user']['id'] == 30): ?>
                <a href="newcategory.php" class="btn btn-outline-secondary btn-sm button">Crear categorías</a>
            <?php endif; ?>

            <a href="userentries.php" class="btn btn-outline-warning btn-sm button">Mis entradas</a>
            <a href="account.php" class="btn btn-outline-primary btn-sm button">Mis datos</a>
            <a href="actions/logout.php" class="btn btn-outline-danger btn-sm button">Cerrar sesión</a>
        </div>

    <?php else: ?>
        <div class="user-box">
            <p>Bienvenido, <strong>invitado</strong></p>

            <a href="log.php" class="btn btn-outline-primary btn-sm button">Abrir sesión</a>
        </div>
    <?php endif; ?>

</aside>

</div>   