<?php if ($_SESSION){
    $log = '
<a class="nav-link" href="index.php?page=deco" title="Déconnection">Déconnection</a>
';
}else{
    $log = '<a class="nav-link" href="index.php?page=form" title="S\'inscrire/Se connecter">Connection</a>';
} ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Blog suivant les aventures de Jean Forteroche en Alaska">
    <meta name="author" content="Jean Forteroche">

    <title>Blog de Jean Forteroche</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Custom styles for this template -->

    <link href="css/styles.css" rel="stylesheet">
    <link href="css/responsive/tablet.css" rel="stylesheet">
    <link href="css/responsive/mobile.css" rel="stylesheet">
</head>

<body>
<?php if (isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] ==="accueil"): ?>
    <header class="header-home masthead mb-auto">
            <nav class="headerParent">
            <div class="nav-menu p-3">
                <nav class="nav nav-masthead justify-content-center">
                    <a class="nav-link active" href="index.php?page=accueil">Accueil</a>
                    <a class="nav-link" href="index.php?page=chapitres&p=1">Chapitres</a>
                    <?= $log; ?>
                </nav>
            </div>
            <img class="paysage" src="src/images/alaska.jpg" alt="alaska-background">
            <h1>Billet simple pour l'alaska</h1>
        </nav>
    </header>
    <?php elseif (isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] ==="admin"): ?>
    <header class="header-other masthead mb-auto">
        <nav class="headerParent">
            <div class="nav-menu p-3">
                <nav class="nav nav-masthead justify-content-center">
                    <a class="nav-link active" href="index.php?page=accueil">Accueil</a>
                    <a class="nav-link" href="index.php?page=chapitres&p=1">Chapitres</a>
                    <?= $log; ?>
                </nav>
            </div>
            <div class="filtre-admin"></div>
            <img class="paysage" src="src/images/ordi.jpg" alt="ordi">
        </nav>
    </header>

    <?php else: ?>
    <header class="header-other masthead mb-auto">
        <nav class="headerParent">
            <div class="nav-menu p-3">
                <nav class="nav nav-masthead justify-content-center">
                    <a class="nav-link active" href="index.php?page=accueil">Accueil</a>
                    <a class="nav-link" href="index.php?page=chapitres&p=1">Chapitres</a>
                    <?= $log; ?>
                </nav>
            </div>
            <div class="filtre"></div>
            <img class="paysage" src="src/images/paysage.jpg" alt="paysage">
        </nav>
    </header>
<?php endif ?>
    <?php if (isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] ==="accueil") :?>
        <div class="rail">
            <img class="homme" src="src/images/homme.png" alt="Homme">
        </div>
    <?php endif; ?>
    <main role="main" class="inner cover">
        <?= $contenu; ?>
    </main>
    <footer class="mastfoot mt-auto">
        <div class="inner">
            <p>Blog de Jean Forteroche - Projet Openclassroom - &copy;samakunchan.</p>
        </div>
    </footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript" src='src/js/tinymce/tinymce.min.js'></script>
    <script type="text/javascript" src="src/js/global.js"></script>
</body>
</html>
