<?php
foreach ($donnees as $donnee):
    if ($donnee->getPseudo()==='admin'){
        $retour = '<a href="index.php?page=admin&action=tb&p=1">Retour</a>';
    }else{
        $retour = '<a href="index.php?page=users">Retour</a>';
    }
?>

<section class="p-4">
    <div class="col-lg-12"><?php echo \Controlleur\ControlleurError::messageErreur();?></div>
    <span class="btn btn-info">
        <?php echo $retour;?>
    </span>
    <h2 class="text-center">Modifier votre profil</h2>
    <form method="post">
        <div class="form-group">
            <label for="pseudo">Pseudo</label>
            <input class="w-100" id="pseudo" name="pseudo" type="text" value="<?php echo $donnee->getPseudo(); ?>">
        </div>
        <div class="form-group">
            <label for="email">Modifier votre adresse email</label>
            <input class="w-100" id="email" type="email" name="email" value="<?php echo $donnee->getEmail();?>">
        </div>
        <div class="form-group">
            <label for="password">Entrer votre nouveau mot de passe</label>
            <input class="w-100" id="password" type="password" name="password" >
        </div>
        <div class="form-group">
            <label for="passwordConf">Confirmer votre nouveau mot de passe</label>
            <input class="w-100" id="passwordConf" type="password" name="passwordConf" >
        </div>
        <input class="btn btn-primary" type="submit" value="Modifier">
    </form>
</section>
<?php endforeach;?>