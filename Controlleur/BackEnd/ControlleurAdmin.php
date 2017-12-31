<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 18/10/2017
 * Time: 12:06
 */

namespace Controlleur\BackEnd;


use Controlleur\ControlleurChapitres;
use Controlleur\ControlleurError;
use Controlleur\Routeur\Routeur;
use Modele\Entity\Articles;
use Modele\Manager\ManagerArticles;
use Modele\Manager\ManagerBiographie;
use Modele\Manager\ManagerCommentaires;
use Vue\Core\Vue;
    /**
     * Class ControlleurAdmin utilisé pour la construction de la page d'administration
     */
class ControlleurAdmin
{
    private $vue;
    private $managerArt;
    private $articles;
    private $managerBio;
    private $managerCom;

    /**
     * Contructeur qui instancie les outils de contruction CRUD
    */
    public function __construct()
    {
        $this->vue = new Vue('admin');
        $this->articles =new Articles();
        $this->managerArt = new ManagerArticles();
        $this->managerBio = new ManagerBiographie();
        $this->managerCom = new ManagerCommentaires();
    }

    /**
     * Appeler par :  Routeur
     * Page non autorisé sans une session active et être admin
     * La vue reçoit un tableau d'article et de commentaire
     */
    public function administration()
    {
        session_start();
        if ($_SESSION){
            if (isset($_SESSION['pseudo']) && $_SESSION['pseudo'] !=='admin'){
                ControlleurError::accesInterdit();
            }else{
                if (isset($_GET['p']) && $_GET['p']>0 && $_GET['p']<= ControlleurChapitres::nombreArticlesParPages()){
                    $pageActuel = $_GET['p'];
                }else{
                    $pageActuel= 1;
                }
                $donnees = $this->managerArt->readAll($pageActuel, ControlleurChapitres::articlesParPages());
            }
            $donneesCom = $this->managerCom->readAllSignalement();
            $this->vue->genererPages([$donnees, $donneesCom]);
        }else{
            ControlleurError::accesInterdit();
        }
    }

}