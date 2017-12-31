<?php
\Controlleur\BackEnd\ControlleurAuthentification::controlSession();
if (!$_POST){
    if ($donnees){
        foreach ($donnees as $donnee){
            $titre = $donnee->getTitre();
            $contenu = $donnee->getContenu();
        }
    }else{
        $titre = '';
        $contenu = '';
    }
}else{
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];
}
?>
<div class="col-lg-12"><?php echo \Controlleur\ControlleurError::messageErreur();?></div>
<div class="col-lg-4 traitement">
    <span>
        <a href="index.php?page=admin&action=tb&p=1">Retour</a>
    </span>
</div>
<div class="row articles">
    <div class="col-lg-12">
        <form method="post">
            <label for="titre">Titre</label>
            <input type="text" name="titre" id="titre" value="<?php echo $titre;?>">
            <label for="contenu">Contenu</label>
            <textarea name="contenu" id="contenu" cols="30" rows="10"><?php echo $contenu;?></textarea>
            <input type="submit" value="Publier">
        </form>
    </div>
</div>
