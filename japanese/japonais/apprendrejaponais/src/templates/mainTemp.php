<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./public/css/homepage.style.css" />
    <script src="./public/scripts/index.js" defer></script>

    <title>Document</title>
    </header>

<body>
    <header>
        <h1>kotoba</h1>
        <?= isset($_SESSION['user']) ? "Bienvenue </strong>{$_SESSION['user']['pseudo']}</strong>" : '' ?>

        <nav>
            <ul>

                <li><a href="#">N5</a></li>
                <li><a href="#">N4</a></li>
                <li><a href="#">N3</a></li>
                <li><a href="#">N2</a></li>
                <li><a href="#">N1</a></li>
                <li><a href="#">game</a></li>
                <a href="?action=accueil">accueil</a>
                <li><i class="dede fas fa-bars">
                        <div class="caca">
                            
                            <?php if (!isset($_SESSION['user'])) { ?>
                                <a href="?action=register">s'inscrire</a>
                                <a href="?action=login">se connecter</a>
                            <?php } else { ?>
                                <a href="?action=modifmail">modifier mail</a>
                                <a href="?action=modifpassword">modifier password</a>
                                <a href="?action=modif">modifier pseudo</a>
                                <a href="?action=disconnect">déconnexion </a>
                                <p ><?= $_SESSION['user']['pseudo'] ?></p>
                                <img src="./public/image/import/<?= $_SESSION['user']['avatar'] ?>" alt="avatar de <?= $_SESSION['user']['pseudo'] ?>" style="max-width: 50px; "/>
                            <?php } ?>
                        </div>
                    </i>
                </li>





            </ul>
        </nav>

    </header>




    <section>
        <?= $content ?>




    </section>



    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <footer>
        &copy; bouwsan
    </footer>
</body>

</html>