<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 19/10/2017
 * Time: 11:23
 */

namespace Controlleur\BackEnd;

use Controlleur\ControlleurError;
use Controlleur\Routeur\Routeur;
use Modele\Entity\Membres;
use Modele\Manager\ManagerMembres;
/**
 * Class ControlleurAuthentification utilisé pour authentifier l'utilisateur
 * Permet l'inscription et la connection
 * Donne accès au tableau de bord
 */
class ControlleurAuthentification
{
    private $membres;
    private $manager;

    /**
     * Contructeur qui instancie les outils de contruction CRUD
     */
    public function __construct()
    {
        $this->manager = new ManagerMembres();
        $this->membres = new Membres();
    }

    /**
     * Méthode qui gère la connection de l'utilisateur
     * Routage automatique si l'utilisateur est "admin"
     */
    public function login($pseudo, $password)
    {
        if (isset($pseudo) && isset($password)){
            $users = $this->manager->read($pseudo);
            if($users){
                if ($users->getPassword()=== sha1($password)){
                    session_start();
                    $_SESSION['pseudo']= $users->getPseudo();
                    $_SESSION['email']= $users->getEmail();
                    if($users->getPseudo()=== 'admin'){
                        Routeur::redirection('admin&action=tb&id='.$users->getId().'&p=1');
                    }elseif ($users->getPseudo()!== 'admin'){
                        Routeur::redirection('users');
                    }
                    return true;
                }else{
                    ControlleurError::identifiantIncorrect();
                    return false;
                }
            }
        }
    }

    /**
     * Méthode qui gère l'inscription de l'utilisateur
     */
    public function inscription($pseudo, $email, $password, $passwordConf)
    {
        if (isset($pseudo) && isset($email) && isset($password) && isset($passwordConf)){
            $newbie = $this->manager->read($pseudo);
            if ($newbie){
                return false;
            }else{
                $this->membres->setPseudo($pseudo);
                $this->membres->setEmail($email);
                if ($password === $passwordConf){
                    $this->membres->setPassword($password);
                }else{
                    return false;
                }
                $this->manager->create($this->membres);
                Routeur::redirection('form');
            }
        }
    }

    /**
     * Méthode static qui affiche control si l'utilisateur est connecter ou non
     * Afiiche le tableau de bord si c'est le cas
     */
    public static function controlSession()
    {
        if (isset($_GET['page'])){
            if ($_GET['page']!=='admin' && $_GET['page']!=='profil'){
                session_start();
                if ($_SESSION){
                    if(isset($_SESSION['pseudo']) && $_SESSION['pseudo']==='admin'){
                        echo '<p class="col-lg-3 tb"> <a href="index.php?page=admin&action=tb&p=1">Tableau de bord</a></p>';
                    }elseif (isset($_SESSION['pseudo']) && $_SESSION['pseudo']!=='admin'){
                        echo '<p class="col-lg-3 tb"> <a href="index.php?page=users&action=tb">Tableau de bord</a></p>';
                    }
                }
            }
        }
    }
}
