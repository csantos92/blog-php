<?php require_once 'connection.php'; ?>
<?php require_once 'includes/helpers.php'; ?>

<!DOCTYPE HTML>

<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Blog de música</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>

<body>

    <div id="wrapper">

        <header>

            <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #000000;">
                <a class="navbar-brand" href="index.php">Blog de música</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active navitem">
                            <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown navitem">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Categorías
                            </a>

                            <div class="dropdown-menu drop" aria-labelledby="navbarDropdown">
                                <?php
                                $categories = getCategories($db);
                                if (!empty($categories)) :
                                    while ($category = mysqli_fetch_assoc($categories)) :
                                ?>
                                    <a class="dropdown-item" href="category.php?id=<?= $category['id'] ?>"><?= $category['name']; ?></a>
                                <?php
                                    endwhile;
                                endif; ?>
                            </div>
                        </li>
                </ul>

                    <form class="form-inline my-2 my-lg-0" action="search.php" method="POST">
                        <input class="form-control mr-sm-2" id="search" type="text" name="search" placeholder="Quiero buscar..." aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                    </form>
                </div>
            </nav>
        </header>

        <div id="container">