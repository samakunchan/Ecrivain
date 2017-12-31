<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 18/10/2017
 * Time: 12:03
 */

namespace Controlleur;

use Controlleur\Routeur\Routeur;
use Modele\Manager\ManagerBiographie;
use Modele\Entity\Biographie;
use Vue\Core\Vue;
/**
 * Class ControlleurBiographie utilisé pour la création de la page biographie
 */
class ControlleurBiographie
{
    private $biographie;
    private $manager;
    private $vue;
    private $traitement;

    /**
     * Constructeur pour instancier les outils CRUD
     */
    public function __construct()
    {
        $this->biographie = new Biographie();
        $this->manager = new ManagerBiographie();
        $this->vue = new Vue('biographie');
        $this->traitement = new Vue('traitement');
    }

    /**
     * Appeler par :  Routeur
     * Méthode qui génère la page biographie en publiant les données
     */
    public function publicationBiographie()
    {
        $donnees = $this->manager->read();
        $this->vue->genererPages($donnees);
    }

    /**
     * Méthode qui reçoit les données pour créé un article
     * Control l'action utilisé
     * @param $action
     */
    public function edit($action)
    {
        if (isset($action)){
            if ($action==='edit'){
                $donnees = $this->manager->read();
                $this->majBio($donnees);
            }
        }
    }

    /**
     * Méthode qui reçoit les données pour mettre à jour la biographie
     * Control l'action utilisé
     * @param $donnees
     */
    public function majBio($donnees)
    {
        $this->traitement->genererPages($donnees);
        if ($_POST){
            if (isset($_POST['titre']) && $_POST['titre'] !=='' && isset($_POST['contenu']) && $_POST['contenu'] !==''){
                $this->biographie->setTitre($_POST['titre']);
                $this->biographie->setContenu($_POST['contenu']);
                $this->manager->update($this->biographie);
            }
        }
    }

    /**
     * Méthode qui reçoit les données pour créé une biographie
     * Control l'action utilisé
     */
    public function creerBio()
    {
        $this->traitement->genererPages();
        if ($_POST){
            $this->biographie->setTitre($_POST['titre']);
            $this->biographie->setContenu($_POST['contenu']);
            $this->manager->create($this->biographie);
            Routeur::redirection('admin');
        }
    }
}