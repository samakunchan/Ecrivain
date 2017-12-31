<?php if ($_SESSION){
    $log = '
<li><a class="log"><span class="glyphicon glyphicon-user"></span> '.ucfirst($_SESSION['pseudo']).'</a></li>
<li><a href="index.php?page=deco" title="Déconnection"><span class="glyphicon glyphicon-log-out"></span></a></li>
';
}else{
    $log = '<li>
<a href="index.php?page=form" title="S\'inscrire/Se connecter">
<span class="glyphicon glyphicon-log-in"></span>
<span class="glyphicon glyphicon-plus"></span>
</a>
</li>';
} ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Blog de Jean Forte-Roche</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="src/js/formulaire/outils.js"></script>
    <link rel="stylesheet" href="src/style.css">
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span >Menu</span>
            </button>
            <a class="navbar-brand" href="index.php?page=accueil">Blog de Jean Forte-Roche</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="index.php?page=accueil">Accueil</a></li>
                <li><a href="index.php?page=biographie">Biographie</a></li>
                <li><a href="index.php?page=chapitres&p=1">Chapitres</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php echo $log;?>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="starter-template">
        <?php echo $contenu;?>
    </div>
</div>
<script type="text/javascript" src='src/js/tinymce/tinymce.min.js'></script>
<script type="text/javascript" src="src/js/global.js"></script>
</body>
</html>