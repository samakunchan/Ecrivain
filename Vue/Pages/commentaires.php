<?php
\Controlleur\BackEnd\ControlleurAuthentification::controlSession();
if (!$_POST){
    if ($donnees){
        foreach ($donnees as $donnee){
            $contenu = $donnee->getContenu();
        }
    }else{
        $contenu = '';
    }
}else{
    $contenu = $_POST['contenu'];
}
foreach ($donnees as $donnee): ?>
<div class="col-lg-12"><?php echo \Controlleur\ControlleurError::messageErreur();?></div>
<div class="row traitement">
    <div class="col-lg-12 ">
        <p>
            <span class="col-lg-1 ">
                <a href="index.php?page=articles&control=art&id=<?php echo $_GET['id'];?>">Retour</a>
            </span>
            <span class="col-lg-offset-9 col-lg-2 ">
                <a href="index.php?page=articles&action=deletecom&control=com&id=<?php echo $_GET['id'];?>&idcom=<?php echo $donnee->getId();?>">Supprimer</a>
            </span>
        </p>
    </div>
</div>
<div>
    <form method="post" class="col-lg-12 comodif">
        <p class="bienvenu">Auteur du commentaire : <span><?php echo $donnee->getAuteur();?></span></p>
        <label for="contenu">Contenu</label>
        <textarea name="contenu" id="contenu" cols="30" rows="10"><?php echo $contenu;?></textarea>
        <input type="hidden" name="auteur" value="<?php echo $donnee->getAuteur(); ?>">
        <input type="submit" value="Modifier">
    </form>
</div>
<?php endforeach; ?>