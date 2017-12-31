<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 03/11/2017
 * Time: 17:22
 */

namespace Controlleur;

use Modele\Manager\ManagerArticles;
use Modele\Manager\ManagerCommentaires;
use Vue\Core\Vue;

class ControlleurSingle
{
    private $managerArt;
    private $managerCom;
    private $vue;

    public function __construct()
    {
        $this->managerArt = new ManagerArticles();
        $this->managerCom = new ManagerCommentaires();
        $this->vue = new Vue('articles');
        $this->traitement = new Vue('traitement');
    }

    /**
     * Appeler par :  Routeur
     * Méthode qui génère les articles et les commentaires ensembles
     */
    public function publicationArticles()
    {
    if (isset($_GET['id'])){
        $donnees = $this->managerArt->read($_GET['id']);
        $donneesCom = $this->managerCom->readAll($_GET['id']);
        if ($donnees){
            $this->vue->genererPages([$donnees, $donneesCom]);
        }else{
            echo '<p class="introuvable">Article introuvable</p>';
        }
    }
    }

}