<?php
use Controlleur\ControlleurCommentaires;
use Controlleur\BackEnd\ControlleurAuthentification;
ControlleurAuthentification::controlSession();

?>
<div class="articles">
    <div class="col-md-12 col-lg-12">
        <h2 class="text-center">
            <?php echo $donnees[0]->getTitre(); ?><br>
            <em class="mini-date text-center">Publié le : <?php echo $donnees[0]->getDateCreation()?></em>
        </h2>
        <?php echo $donnees[0]->getContenu();?>
    </div>
</div>
<hr>
<div class="commentaires">
    <div class="col-md-12 col-lg-12">
    <?php if ($donnees[1]): ?>
        <?php foreach ($donnees[1] as $key=>$commentaire):;?>
            <?php if ($key %2 == 0): ?>
            <div class="comment row bg-comment-even p-3">
                <p class="col-md-12 col-lg-12">
                    <strong>
                        Auteur : <?php echo $commentaire->getAuteur()?>
                    </strong>
                </p>

                <p class="col-md-12 col-lg-12"> <?php echo $commentaire->getContenu()?> <em>Date de publication : <?php echo $commentaire->getDateCreation()?></em></p>

                <p>
                    <?php
                    ControlleurCommentaires::gestionCommentaire($commentaire->getId());
                    ControlleurCommentaires::boutonSignale($commentaire->getId(),$commentaire->getSignaler());
                    ?>
                </p>
                <hr>
            </div>
                <?php else: ?>
                <div class="comment row bg-comment-odd p-3">
                    <p class="col-md-12 col-lg-12">
                        <strong>
                            Auteur : <?php echo $commentaire->getAuteur()?>
                        </strong>
                    </p>

                    <p class="col-md-12 col-lg-12"> <?php echo $commentaire->getContenu()?> <em>Date de publication : <?php echo $commentaire->getDateCreation()?></em></p>

                    <p>
                        <?php
                        ControlleurCommentaires::gestionCommentaire($commentaire->getId());
                        ControlleurCommentaires::boutonSignale($commentaire->getId(),$commentaire->getSignaler());
                        ?>
                    </p>
                    <hr>
                </div>
            <?php endif ?>
        <?php endforeach; ?>
        <?php else: ?>
        <p class="nope">Il n'y a pas de commentaire pour cet article...</p>
    <?php endif; ?>
        <hr>
    </div>

<?php if ($_SESSION): ?>
    <form action="index.php?page=articles&action=createcom&control=com&id=<?php echo $donnees[0]->getId() ?>" method="post">
        <p>
            <span id="auteur"> Auteur : <?php echo $_SESSION['pseudo'] ?></span>
        </p>
        <textarea type="text" name="contenu" id="contenu"></textarea>
        <input type="hidden" name="auteur" value="<?php echo $_SESSION['pseudo'] ?>">
        <input type="hidden" name="art_id" value="<?php echo $_GET['id'] ?>">
        <input type="submit" value="Publier">
    </form>
<?php endif; ?>
</div>
