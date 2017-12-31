<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 18/10/2017
 * Time: 12:02
 */

namespace Controlleur;

use Controlleur\Routeur\Routeur;
use Modele\Entity\Articles;
use Modele\Manager\ManagerArticles;
use Vue\Core\Vue;
/**
 * Class ControlleurArticles utilisé pour la création de la page d'article
 */
class ControlleurArticles
{
    private $articles;
    private $managerArt;
    private $traitement;

    /**
     * Constructeur pour instancier les outils CRUD
     */
    public function __construct()
    {
        $this->articles = new Articles();
        $this->managerArt = new ManagerArticles();
        $this->traitement = new Vue('traitement');
    }

    /**
     * Appeler par :  Routeur
     * Méthode qui détecte l'action utilisé et redirige vers la méthode approprié
     * @param $action
     */
    public function traitement($action)
    {
        if (isset($action)){
            if ($action==='create'){
                $this->creerArticles();
            }elseif ($action==='modif'){
                $donnees = $this->managerArt->read($_GET['id']);
                $this->majArticles($donnees);
            }elseif ($action==='delete'){
                $this->delete();
            }
        }
    }

    /**
     * Méthode qui reçoit les données pour créé un article
    */
    public function creerArticles()
    {
        $this->traitement->genererPages();
        if ($_POST){
            if (isset($_POST['titre']) && $_POST['titre']===''){
                return false;
            }elseif(isset($_POST['contenu']) && $_POST['contenu'] ===''){
                return false;
            }else{
                $this->articles->setTitre($_POST['titre']);
                $this->articles->setContenu($_POST['contenu']);
                $this->managerArt->create($this->articles);
            }
        }
        return true;
    }

    /**
     * Méthode qui reçoit les données pour modifier un article
     * @return boolean
     */
    public function majArticles($donnees)
    {
        $this->traitement->genererPages([$donnees]);
        if ($_POST){
            if (isset($_POST['titre']) && $_POST['titre']===''){
                return false;
            }elseif(isset($_POST['contenu']) && $_POST['contenu'] ===''){
                return false;
            }else{
                $this->articles->setTitre($_POST['titre']);
                $this->articles->setContenu($_POST['contenu']);
                $this->managerArt->update($this->articles);
            }
        }
        return true;
    }

    /**
     * Méthode qui reçoit les données pour supprimer un article
     * @return boolean
     */
    public function delete()
    {
        if (isset($_GET['id'])){
            $this->managerArt->delete($_GET['id']);
            Routeur::redirection('admin&action=tb&p=1');
            return true;
        }
    }
}