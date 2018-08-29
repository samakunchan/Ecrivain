<?php
use Controlleur\BackEnd\ControlleurAuthentification;
use Controlleur\ControlleurChapitres;
ControlleurAuthentification::controlSession();
?>
<div class="row chapitres">
    <h1 class="col-lg-12">Liste de tout les chapitres</h1>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

        <table id="liste" class="table table-hover col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <thead>
            <tr>
                <th scope="col">Titre</th>
                <th scope="col">Date de création</th>
            </tr>
            </thead>
            <?php foreach ($donnees as $key=>$donnee) :;?>
                    <?php if ($key %2 == 0): ?>
                <tr class="table-primary">
                    <th scope="row">
                        <a href="index.php?page=articles&id=<?= $donnee->getId();?>">
                            <?= $donnee->getTitre();?>
                        </a>
                    </th>
                    <td><?= $donnee->getDateCreation()?></td>

                </tr>
                    <?php else: ?>
                    <tr class="table-secondary">
                        <th scope="row">
                            <a href="index.php?page=articles&id=<?= $donnee->getId();?>">
                                <?= $donnee->getTitre();?>
                            </a>
                        </th>
                        <td><?= $donnee->getDateCreation()?></td>

                    </tr>
                    <?php endif ?>
            <?php endforeach; ?>
        </table>
        <div class="row pagination col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <p class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <?php
                echo ControlleurChapitres::precedente();
                echo ControlleurChapitres::pageActuel() ;
                echo ControlleurChapitres::suivante();
                ?>
            </p>
        </div>
    </div>
</div>