<?php \Controlleur\BackEnd\ControlleurAuthentification::controlSession(); ?>
<div><?php echo \Controlleur\ControlleurError::messageErreur();?></div>

<section class="formulaire">
    <aside >
        <nav class="col-md-offset-4 col-lg-offset-4 col-md-8 col-lg-8">
            <button id="connection" class="btn btn-info">Connection</button>

            <button id="inscription" class="btn btn-info">Inscription</button>
        </nav>
    </aside>

    <article class="row form">
        <h1 class="offset-lg-3 col-lg-9">Connection à l'espace membre</h1>
        <p class="offset-lg-3 col-lg-9">Déja membre? Connectez-vous pour avoir accès à votre espace.</p>
        <p class="offset-lg-3 col-lg-9">Vous êtes nouveau sur le site? Cliquez sur "Inscription" pour créer votre espace membre.</p>

        <form id="formConnection" action="index.php?page=form&action=connection"  method="post" class="offset-lg-3 col-lg-5">
            <label for="pseudo"> Pseudo</label>
            <input class="form-control" type="text" name="pseudo" id="pseudo">
            <label for="password"> Mot de passe</label>
            <input class="form-control" type="password" name="password" id="password">
            <label for="rememberme"></label>
            <input type="hidden" name="connection"><br>
            <input class="btn btn-primary" type="submit" value="Etablir la connection" >
        </form>

        <form id="formInscription" action="index.php?page=form&action=inscription" method="post" class="offset-lg-3 col-lg-5 offset-lg-3">
            <label for="pseudo"> Pseudo</label>
            <input class="form-control" type="text" name="pseudo" id="pseudo">
            <label for="email"> Mail</label>
            <input class="form-control" type="email" name="email" id="email">
            <label for="password"> Mot de passe</label>
            <input class="form-control" type="password" name="password" id="password">
            <label for="passwordConf">Confirmer le mot de passe</label>
            <input class="form-control" type="password" id="passwordConf" name="passwordConf">
            <input type="hidden" name="inscription"><br>
            <input class="btn btn-primary" type="submit" value="S'inscrire" >
        </form>
    </article>
    <article class="ours1 col-lg-12">
        <img src="src/images/ours1.png" alt="ours1">
    </article>
</section>

<script src="src/js/formulaire/outils.js"></script>
<script src="src/js/formulaire/generate_form.js"></script>
