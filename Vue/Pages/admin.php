<?php
use Controlleur\ControlleurChapitres;
use Controlleur\ControlleurCommentaires;
?>
<section class="admin bg-comment-even">
    <h2 class="text-center">Bonjour <?php echo $_SESSION['pseudo']?></h2>
    <div>
        <p class="col-md-3 col-lg-3 tb"> <a class="btn btn-info" href="index.php?page=admin&action=tb&p=1">Tableau de bord</a></p>
    </div>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active show" data-toggle="tab" href="#home">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#tous-les-chapitres">Tous les chapitres</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#signalement">Commentaires signalés <span class="badge badge-danger badge-pill"><?php echo ControlleurCommentaires::totalSignalement()?></span></a>
        </li>
    </ul>
    <div id="myTabContent" class="tab-content bg-light">
        <div class="tab-pane fade active show" id="home">
            <nav id="bord" class="row p-4">
                <div class="col-md-12 col-lg-12">
                    <h2 class="col-md-12 col-lg-12">Résumé</h2>
                    <p>Nombres de chapitres créés : <?php echo ControlleurChapitres::total();?></p>
                    <p>Signalement reçut : <?php echo ControlleurCommentaires::totalSignalement();?> </p>
                </div>
                <div class="col-md-12 col-lg-12">
                    <h2 class="col-md-12 col-lg-12">Profil</h2>
                        <p>Vous êtes connectés en tant que <span class="badge badge-success"><?php echo $_SESSION['pseudo'];?></span> </p>
                        <p>Email :  <?php echo $_SESSION['email'];?></p>
                        <span class="btn btn-info"><a href="index.php?page=profil&action=edit">Voir/Editer le profil</a></span>
                </div>
            </nav>
        </div>
        <div class="tab-pane fade" id="tous-les-chapitres">
            <nav>
                <h2 class="text-center text-info"><a href="index.php?page=articles&action=create&control=art" class="col-lg-offset-2">Créer un chapitre</a></h2>
                <div class="col-md-12 col-lg-12">
                    <table id="liste" class="table table-hover col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <thead>
                        <tr>
                            <th scope="col">Titre</th>
                            <th scope="col">Date de création</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <?php foreach ($donnees[0] as $key=>$donnee) :;?>
                            <?php if ($key %2 == 0): ?>
                                <tr class="table-primary">
                                    <th scope="row">
                                        <a href="index.php?page=articles&control=art&id=<?php echo $donnee->getId();?>">
                                            <?php echo substr($donnee->getTitre(), 0, 150);?>
                                        </a>
                                    </th>
                                    <td><?= $donnee->getDateCreation()?></td>
                                    <td>
                                        <span class="btn btn-primary">
                            <a href="index.php?page=articles&control=art&action=modif&id=<?php echo $donnee->getId()?>">Modifier</a>
                                        </span>
                                        <span class="btn btn-danger">
                            <a href="index.php?page=articles&control=art&action=delete&id=<?php echo $donnee->getId()?>">Supprimer</a>
                                        </span></td>
                                </tr>
                            <?php else: ?>
                                <tr class="table-secondary">
                                    <th scope="row">
                                        <a href="index.php?page=articles&control=art&id=<?php echo $donnee->getId();?>">
                                            <?php echo substr($donnee->getTitre(), 0, 150);?>
                                        </a>
                                    </th>
                                    <td><?= $donnee->getDateCreation()?></td>
                                    <td>
                                        <span class="btn btn-primary">
                            <a href="index.php?page=articles&control=art&action=modif&id=<?php echo $donnee->getId()?>">Modifier</a>
                                        </span>
                                        <span class="btn btn-danger">
                            <a href="index.php?page=articles&control=art&action=delete&id=<?php echo $donnee->getId()?>">Supprimer</a>
                                        </span>
                                    </td>

                                </tr>
                            <?php endif ?>
                        <?php endforeach; ?>
                    </table>
                    <div class="row pagination col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <p><?php echo ControlleurChapitres::precedente(); echo ControlleurChapitres::pageActuel() ;echo ControlleurChapitres::suivante();?></p>
                    </div>
                </div>
                <hr class="col-lg-12">
            </nav>
        </div>
        <div class="tab-pane fade" id="signalement">
            <?php if ($donnees[1]) :?>
                <nav class="row">
                    <div class="col-md-12 col-lg-12" id="signal">
                        <h2 class="text-center">Article signalé</h2>
                        <?php foreach ($donnees[1] as $key=>$commentaire):;?>
                            <?php if ($key %2 == 0): ?>
                                <div class="comment row bg-comment-even p-3">
                                    <p class="col-md-12 col-lg-12">
                                        <strong>
                                            Auteur : <?php echo $commentaire->getAuteur()?>
                                        </strong>
                                    </p>

                                    <p class="col-md-12 col-lg-12"> <?php echo $commentaire->getContenu()?>  <em class="badge badge-warning">Date de publication : <?php echo $commentaire->getDateCreation()?></em>
                                    </p>
                                    <span class="badge badge-info">
                                        <a href="index.php?page=articles&action=deletecom&control=com&id=admin&idcom=<?php echo $commentaire->getId();?>">Supprimer
                                        </a>
                                    </span>
                                    <span class="badge badge-danger">
                                        <a href="index.php?page=articles&action=sigcom&control=com&id=<?php echo $commentaire->getArtId()?>&idcom=<?php echo $commentaire->getId();?>&recup">Conserver
                                        </a>
                                    </span>

                                    <hr>
                                </div>
                            <?php else: ?>
                                <div class="comment row bg-comment-odd p-3">
                                    <p class="col-md-12 col-lg-12">
                                        <strong>
                                            Auteur : <?php echo $commentaire->getAuteur()?>
                                        </strong>
                                    </p>
                                    <p class="col-md-12 col-lg-12"> <?php echo $commentaire->getContenu()?> <em class="badge badge-warning">Date de publication : <?php echo $commentaire->getDateCreation()?></em>
                                    </p>
                                    <span class="badge badge-info">
                                        <a href="index.php?page=articles&action=deletecom&control=com&id=admin&idcom=<?php echo $commentaire->getId();?>">Supprimer
                                        </a>
                                    </span>
                                    <span class="badge badge-danger">
                                        <a href="index.php?page=articles&action=sigcom&control=com&id=<?php echo $commentaire->getArtId()?>&idcom=<?php echo $commentaire->getId();?>&recup">Conserver
                                        </a>
                                    </span>


                                    <hr>
                                </div>
                            <?php endif ?>
                        <?php endforeach; ?>
                        <?php else: ?>
                            <p>Il n'y a pas de commentaire pour cet article...</p>
                        <?php endif; ?>
                    </div>
                </nav>
        </div>
    </div>
</section>


