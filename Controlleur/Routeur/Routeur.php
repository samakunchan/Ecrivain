<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 17/10/2017
 * Time: 19:19
 */

namespace Controlleur\Routeur;


use Controlleur\ControlleurAccueil;
use Controlleur\ControlleurBiographie;
use Controlleur\ControlleurChapitres;
use Controlleur\ControlleurForm;
use Controlleur\ControlleurArticles;
use Controlleur\ControlleurCommentaires;
use Controlleur\ControlleurContact;
use Controlleur\BackEnd\ControlleurAuthentification;
use Controlleur\BackEnd\ControlleurAdmin;
use Controlleur\BackEnd\ControlleurUsers;
use Controlleur\BackEnd\ControlleurProfil;
use Controlleur\ControlleurError;
use Controlleur\ControlleurSingle;

/**
 * Class Routeur utilisé pour gerer le routage de toutes les pages
 */
class Routeur
{
    private $acceuil;
    private $form;
    private $biographie;
    private $chapitres;
    private $articles;
    private $admin;
    private $errors;
    private $users;
    private $profil;
    private $single;
    private $commentaires;

    /**
     * Contructeur qui instancie tout les controlleurs
     * Controlleur qui contient tout les outils de construction de pages
     */
    public function __construct()
    {
        $this->acceuil = new ControlleurAccueil();
        $this->form = new ControlleurForm();
        $this->biographie= new ControlleurBiographie();
        $this->chapitres = new ControlleurChapitres();
        $this->articles = new ControlleurArticles();
        $this->commentaires = new ControlleurCommentaires();
        $this->single = new ControlleurSingle();
        $this->admin = new ControlleurAdmin();
        $this->errors = new ControlleurError();
        $this->users = new ControlleurUsers();
        $this->profil = new ControlleurProfil();
    }

    /**
     * Appelé par : Index
     * Méthode qui control si la page existe. Dans le cas contraire, la page par défaut c'est "accueil"
     * Appel la méthode "gestionPages" pour gérer les autres pages
     */
    public function start()
    {
        if(isset($_GET['page'])){
            $pages = $_GET['page'];
        }else{
            $pages = 'accueil';
            self::redirection('accueil');
        }
        $this->gestionPages($pages);
    }

    /**
     * Méthode qui control le type de page appelé et redirige vers le controlleur adapté
     */
    public function gestionPages($pages)
    {
        if($pages === 'accueil'){
        $this->acceuil->accueil();
        }elseif ($pages=== 'form'){
        $this->form->formulaire();
        }elseif ($pages=== 'biographie'){
            if (isset($_GET['action'])){
                $this->biographie->edit($_GET['action']);
            }else{
                $this->biographie->publicationBiographie();
            }
        }elseif ($pages=== 'chapitres'){
        $this->chapitres->listeChaptitres();
        }elseif ($pages=== 'articles'){
            if (isset($_GET['action'])){
                if (isset($_GET['control'])){
                    if ($_GET['control']==='art'){
                        $this->articles->traitement($_GET['action']);
                    }elseif ($_GET['control']==='com'){
                        $this->commentaires->traitement($_GET['action']);
                    }
                }
            }else{
                $this->single->publicationArticles();
            }
        }elseif ($pages=== 'admin') {
            $this->admin->administration();
        }elseif ($pages=== 'users'){
            $this->users->administration();
        }elseif ($pages=== 'profil'){
            $this->profil->gestionDonnees();
        }elseif ($pages=== 'deco'){
            session_start();
            session_destroy();
            Routeur::redirection('accueil');
        }else{
            ControlleurError::pageIntrouvable();
        }
    }

    /**
     * Méthode static qui permet les redirections dynamiques
     */
    public static function redirection($pages)
    {
        return header('Location: index.php?page='. $pages .' ');
    }

}