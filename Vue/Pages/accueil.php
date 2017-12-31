<?php
\Controlleur\BackEnd\ControlleurAuthentification::controlSession();
?>
<div class="col-md-12 col-lg-12 last">
    <h1>Billet simple pour l'Alaska</h1>
    <p>Dernier chapitre sortie : </p>
</div>
<div class="row accueil">
    <div class="col-md-8 col-lg-8 extrait">
        <ul>
            <?php foreach ($donnees as $donnee) :; ?>
                <h1>
                    <?php echo $donnee->getTitre(); ?>
                </h1>
                <p class="col-md-12 col-lg-12 ">
                    <?php echo $donnee->getExtrait();?>
                    <a href="index.php?page=articles&id= <?php echo $donnee->getId(); ?>">Voir la suite</a>
                </p>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
