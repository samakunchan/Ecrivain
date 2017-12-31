<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 27/10/2017
 * Time: 03:32
 */

namespace Controlleur\BackEnd;


use Modele\Entity\Membres;
use Modele\Manager\ManagerMembres;
use Vue\Core\Vue;
/**
 * Class ControlleurProfil utilisé pour la construction de la page profil
 */
class ControlleurProfil
{
    private $vue;
    private $manager;
    private $membres;

    /**
     * Contructeur qui instancie les outils de contruction CRUD
     */
    public function __construct()
    {
        $this->vue = new Vue('profil');
        $this->manager = new ManagerMembres();
        $this->membres = new Membres();
    }

    /**
     * Appeler par :  Routeur
     * Page non autorisé sans une session active et être admin
     * Permet la modification des données de l'utilisateur
     */
    public function gestionDonnees()
    {
        session_start();
        if (isset($_SESSION['pseudo'])){
            $donnees = $this->manager->read($_SESSION['pseudo']);
            $this->vue->genererPages([$donnees]);
            if ($_POST){
                if (isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['passwordConf']) && isset($_POST['password'])){
                    $this->membres->setPseudo($_POST['pseudo']);
                    $this->membres->setEmail($_POST['email']);
                    if (sha1($_POST['password'])===sha1($_POST['passwordConf'])){
                        $this->membres->setPassword(sha1($_POST['password']));
                    }else{
                        return false;
                    }
                    if ($_POST['pseudo']!=='' && $_POST['email']!=='' && $_POST['password']!=='' && $_POST['passwordConf']!==''){
                        $this->manager->update($this->membres);
                    }else{
                        return false;
                    }
                }
            }
        }
    }
}