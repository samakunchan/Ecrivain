<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 18/10/2017
 * Time: 12:04
 */

namespace Controlleur;
use Modele\Entity\Commentaires;
use Controlleur\Routeur\Routeur;
use Modele\Manager\ManagerCommentaires;
use Modele\Manager\ManagerMembres;
use Vue\Core\Vue;

/**
 * Class ControlleurArticles utilisé pour la création de la page d'article
 */
class ControlleurCommentaires
{
    private $commentaires;
    private static $managerCom;
    private $vue;
    private $vueCom;
    private static $membres;

    /**
     * Constructeur pour instancier les outils CRUD
     */
    public function __construct()
    {
        $this->commentaires = new Commentaires();
        self::$managerCom = new ManagerCommentaires();
        $this->vue = new Vue('articles');
        $this->vueCom = new Vue('commentaires');
        self::$membres = new ManagerMembres();
    }

    /**
     * Appeler par :  Routeur
     * Méthode qui détecte l'action utilisé et redirige vers la méthode approprié
     * @param $action
     * @return boolean
     */
    public function traitement($action)
    {
        if (isset($action)){
            if ($action==='createcom'){
                $this->creerCommentaires($_POST['auteur'], $_POST['contenu'], $_GET['id']);
            }elseif ($action==='modifcom'){
                $donnees = self::$managerCom->read($_GET['idcom']);
                $this->vueCom->genererPages([$donnees]);
                if ($_POST) {
                    if (isset($_POST['contenu']) && $_POST['contenu'] !== '') {
                        $this->majCommentaires($_POST['auteur'], $_POST['contenu'], 0);
                    }
                    return true;
                }
            }elseif ($action==='deletecom'){
                $this->delete($_GET['idcom']);
            }elseif ($action==='sigcom'){
                $this->signalement();
            }
        }
        return true;
    }

    /**
     * Méthode qui reçoit les données pour créé un commentaire
     * @return boolean
     */
    public function creerCommentaires($auteur, $contenu, $id)
    {
        if ($_POST){
            if (isset($_POST['contenu']) && $_POST['contenu']!=='' && isset($_POST['auteur']) && isset($_GET['id'])){
                $this->commentaires->setAuteur($auteur);
                $this->commentaires->setContenu($contenu);
                $this->commentaires->setArtId($id);
                $this->commentaires->setSignaler(0);
                self::$managerCom->create($this->commentaires);
                Routeur::redirection('articles&control=art&id='.$_GET['id']);
            }else{
                echo '<div>Veuillez saisir un commentaire <span><a href="index.php?page=articles&control=art&id='.$_GET['id'].'">Retour</a></span></div>';
            }
        }
        return true;
    }

    /**
     * Méthode qui reçoit les données pour modifier un commentaire
     * @return boolean
     */
    public function majCommentaires($auteur, $contenu, $signal)
    {
        $this->commentaires->setAuteur($auteur);
        $this->commentaires->setContenu($contenu);
        $this->commentaires->setSignaler($signal);
        self::$managerCom->update($this->commentaires);
        return true;
    }

    /**
     * Méthode qui reçoit les données pour supprimer un article
     * @param $id
     * @return boolean
     */
    public function delete($id)
    {
        self::$managerCom->delete($id);
        if (isset($_GET['id'])){
            if ($_GET['id']==='admin'){
                Routeur::redirection('admin');
                exit();
            }else{
                Routeur::redirection('articles&control=art&id='.$_GET['id'].'&p=1');
                exit();
            }
        }
        return true;
    }

    /**
     * Méthode static qui affiche le bouton d'edition en fonction de l'auteur du commentaire
     * afin que l'auteur du commentaire puisse gérer son message
     * @param $idcom
     * @return boolean
    */
    public static function gestionCommentaire($idcom)
    {
        if (isset($idcom)){
            $rescom = self::$managerCom->read($idcom);
            if ($_SESSION){
                $res= self::$membres->read($_SESSION['pseudo']);
                if ($res->getPseudo()=== $rescom->getAuteur() ):
                    echo ''.self::boutonEdition($idcom);
                endif;
            }
        }
        return true;
    }

    /**
     * Méthode static qui met à jour le signalement d'un commentaire
     */
    public function signalement()
    {
        if (isset($_GET['recup'])){
            $this->commentaires->setSignaler(0);
            self::$managerCom->updateSignaler($this->commentaires);
            Routeur::redirection('admin&action=tb&p=1');
            exit();
        }else{
            $this->commentaires->setSignaler(1);
            self::$managerCom->updateSignaler($this->commentaires);
            Routeur::redirection('articles&control=art&id='.$_GET['id']);
            exit();
        }

    }

    /**
     * Méthode static qui affiche le bouton "signaler" dans le commentaire
     * Visible pour tout le monde
     * Reçoit l'id du commentaire et l'id du signal provenant dans la page articles
     * @param $id
     * @param $signal
    */
    public static function boutonSignale($id,$signal)
    {
        if ($signal=== 0){
            echo '<span class="col-lg-offset-9">
                        <a href="index.php?page=articles&action=sigcom&control=com&id='.$_GET['id'].'&idcom='.$id.'">Signaler ce commentaire</a>
                    </span>';
        }else{
            echo '<span class="col-lg-offset-9">
                        Ce commentaire a été signalé.
                    </span>';
        }
    }

    /**
     * Méthode static qui affiche le bouton "edition" dans le commentaire
    */
    public static function boutonEdition($idcom)
    {
        $rescom = self::$managerCom->read($idcom);
        echo '<span>
                    <a href="index.php?page=articles&action=modifcom&control=com&id='.$_GET['id'].'&idcom='.$rescom->getId().'">Editer</a>
                   </span>';
    }

    /**
     * Méthode static qui affiche le total de signalement dans la page admin
     */
    public static function totalSignalement()
    {
        $res = self::$managerCom->getTotalSigalement();
        if ($res[0]->getnbCom()!=='0'){
            echo $res[0]->getnbCom();
            echo '<span><a href="#signal">Voir</a></span>';
            return null;
        }else{
            return $res[0]->getnbCom();
        }
    }
}