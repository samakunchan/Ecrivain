<?php
use Controlleur\ControlleurChapitres;
use Controlleur\ControlleurCommentaires;
use Controlleur\ControlleurContact;
use Controlleur\BackEnd\ControlleurAuthentification;
?>
<div>
    <p class="col-md-3 col-lg-3 tb"> <a href="index.php?page=admin&action=tb&p=1">Tableau de bord</a></p>
</div>
<section id="sectionAdmin">
    <nav id="bord" class="row bord">
        <div class="panneau col-md-12 col-lg-12">
            <h2 class="col-md-12 col-lg-12">Résumé</h2>
            <p class="col-md-3 col-lg-3">Nombres de chapitres créés : <?php echo ControlleurChapitres::total();?></p>
            <p class="col-md-3 col-lg-3">Signalement reçut : <?php echo ControlleurCommentaires::totalSignalement();?> </p>
        </div>
        <div class="col-md-5 col-lg-5 panneau">
            <h2>Biographie</h2>
            <span>
                <a href="index.php?page=biographie&action=edit">Voir/Editer la biographie</a>
            </span>
        </div>
        <div class="col-md-5 col-lg-5 panneau">
            <h2>Profil</h2>
            <div>
                <p>Vous êtes connectés en tant que <?php echo $_SESSION['pseudo'];?></p>
                <p>Email :  <?php echo $_SESSION['email'];?></p>
                <span><a href="index.php?page=profil&action=edit">Voir/Editer le profil</a></span>
            </div>
        </div>
    </nav>
    <nav id="voir" class="row">


        <hr class="col-md-12 col-lg-12">
        <div class="col-md-12 col-lg-12">

            <table id="liste" class=" panel-default col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <tr class="panel">
                    <td class="col-md-10 col-lg-10">
                        <h3 class="col-md-offset-5 col-lg-offset-5">Liste des chapitres</h3>
                    </td>
                    <td colspan="2" class="col-md-2 col-lg-2">
                        <a href="index.php?page=articles&action=create&control=art" class="col-lg-offset-2">Créer un chapitre</a>
                    </td>
                </tr>
            <?php if (!$donnees[0]): ?>
                <tr>
                    <td colspan="2">
                        Il n'y a pas d'articles
                    </td>
                </tr>
            <?php else :
            foreach ($donnees[0] as $donnee) :; ?>

                <tr >
                    <td class="col-md-10 col-lg-10">
                        <a href="index.php?page=articles&control=art&id=<?php echo $donnee->getId();?>">
                            <?php echo substr($donnee->getTitre(), 0, 150);?>
                        </a>
                    </td>
                    <td>
                        <span>
                            <a href="index.php?page=articles&control=art&action=modif&id=<?php echo $donnee->getId()?>">Modifier</a>
                        </span>
                    </td>
                    <td>
                        <span>
                            <a href="index.php?page=articles&control=art&action=delete&id=<?php echo $donnee->getId()?>">Supprimer</a>
                        </span>
                    </td>
                </tr>

            <?php endforeach; endif; ?>
            </table>
            <div class="row pagination col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <p><?php echo ControlleurChapitres::precedente(); echo ControlleurChapitres::pageActuel() ;echo ControlleurChapitres::suivante();?></p>
            </div>
        </div>
        <hr class="col-lg-12">
    </nav>
    <?php if ($donnees[1]) :?>
    <nav class="row">
        <div class="col-md-12 col-lg-12" id="signal">
            <h2>Article signalé</h2>
            <?php if ($donnees[1]): ?>
                <?php foreach ($donnees[1] as $commentaire):;?>
                    <div class="comment row">
                        <p class="col-md-3 col-lg-3">
                            <strong>
                                Auteur : <?php echo $commentaire->getAuteur()?>
                            </strong>
                        </p>
                        <br>
                        <p class="col-md-12 col-lg-12"> <?php echo $commentaire->getContenu()?>
                            <em>Date de publication : <?php echo $commentaire->getDateCreation()?></em>
                        </p>
                        <br>
                        <span>
                            <a href="index.php?page=articles&action=deletecom&control=com&id=admin&idcom=<?php echo $commentaire->getId();?>">Supprimer</a>
                        </span>
                        <span>
                            <a href="index.php?page=articles&action=sigcom&control=com&id=<?php echo $commentaire->getArtId()?>&idcom=<?php echo $commentaire->getId();?>&recup">Conserver</a>
                        </span>

                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Il n'y a pas de commentaire pour cet article...</p>
            <?php endif; ?>
        </div>
    </nav>
    <?php endif; ?>
</section>
