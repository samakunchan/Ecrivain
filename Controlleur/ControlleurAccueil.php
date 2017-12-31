<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 17/10/2017
 * Time: 19:27
 */

namespace Controlleur;

use Modele\Manager\ManagerArticles;
use Modele\Manager\ManagerMembres;
use Vue\Core\Vue;
/**
 * Class ControlleurAccueil utilisé pour la création de la page d'accueil
 */
class ControlleurAccueil
{
    private $articles;
    private $vue;

    /**
     * Constructeur pour instancier les outils CRUD
    */
    public function __construct()
    {
        $this->articles = new ManagerArticles();
        $this->vue = new Vue('accueil');
    }

    /**
     * Méthode qui génère la vue de la page d'accueil avec l'extrait du dernier article
    */
    public function accueil()
    {
        $donnees = $this->articles->readLastOne();
        $this->vue->genererPages($donnees);
    }
}