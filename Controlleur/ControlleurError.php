<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 19/10/2017
 * Time: 14:48
 */

namespace Controlleur;
use Modele\Manager\ManagerMembres;

/**
 * Class ControlleurArticles utilisé pour la création de la page d'article
 */
class ControlleurError
{
    private static $membre;

    public function __construct()
    {
        self::$membre = new ManagerMembres();
    }

    /**
     * Méthode static qui interdit l'accès à la page
     */
    public static function accesInterdit()
    {
        header('HTTP/1.0 403 Forbidden');
        die('<p class="introuvable" style="font-size: 100px;text-align: center; margin-top: 80px;">Accès interdit</p>');
    }

    /**
     * Méthode static qui indique que la page est introuvable
     */
    public static function pageIntrouvable()
    {
        header('HTTP/1.0 404 Not Found');
        die('<p class="introuvable" style="font-size: 100px;text-align: center; margin-top: 80px;">Page introuvable</p>');
    }

    /**
     * Méthode static que l'identifiant est incorrect
     */
    public static function identifiantIncorrect()
    {
        echo '<div class="alert alert-danger">'. 'Identifiant incorrect' .'</div>';
    }

    /**
     * Méthode static qui affiche des messages d'alert
     * Concerne le formulaire d'inscription
     */
    public static function donneesMAJ()
    {
        if ($_POST){
            if(isset($_POST['pseudo']) && $_POST['pseudo']===''){
                return '<div class="alert alert-danger">Veuillez remplir tout les champs</div>';
            }elseif (isset($_POST['password']) && $_POST['password']===''){
                return '<div class="alert alert-danger">Veuillez remplir tout les champs</div>';
            }elseif (isset($_POST['email']) && $_POST['email']===''){
                return '<div class="alert alert-danger">Veuillez remplir tout les champs</div>';
            }
        }
        if (sha1($_POST['password'])!==sha1($_POST['passwordConf'])){
            return '<div class="alert alert-danger">Les mots de passes doivent etre identique</div>';
        }
    }

    /**
     * Méthode static qui affiche des messages d'erreur ou de succès générale
     */
    public static function messageErreur()
    {
        if ($_POST){
            if (isset($_GET['action']) && $_GET['action']==='connection'){
                if(isset($_POST['pseudo']) && $_POST['pseudo']===''){
                    return '<div class="alert alert-danger">Veuillez remplir tout les champs</div>';
                }elseif (isset($_POST['password']) && $_POST['password']===''){
                    return '<div class="alert alert-danger">Veuillez remplir tout les champs</div>';
                }
            }elseif (isset($_GET['action']) && $_GET['action']==='inscription'){
                if (isset($_POST['pseudo'])){
                    $newbie = self::$membre->read($_POST['pseudo']);
                    if ($newbie){
                        return '<div class="alert alert-danger">Utilisateur déja existant</div>';
                    }
                }
                if(isset($_POST['pseudo']) && $_POST['pseudo']===''){
                    return '<div class="alert alert-danger">Veuillez remplir tout les champs</div>';
                }elseif (isset($_POST['password']) && $_POST['password']===''){
                    return '<div class="alert alert-danger">Veuillez remplir tout les champs</div>';
                }elseif (isset($_POST['passwordConf']) && $_POST['passwordConf']===''){
                    return '<div class="alert alert-danger">Veuillez remplir tout les champs</div>';
                }elseif (isset($_POST['email']) && $_POST['email']===''){
                    return '<div class="alert alert-danger">Veuillez remplir tout les champs</div>';
                }elseif (sha1($_POST['password'])!==sha1($_POST['passwordConf'])){
                    return '<div class="alert alert-danger">Les mots de passes doivent etre identique</div>';
                }
            }elseif (isset($_GET['action']) && $_GET['action']==='edit'){
                if (isset($_GET['page']) && $_GET['page']==='profil'){
                    if(isset($_POST['pseudo']) && $_POST['pseudo']===''){
                        return '<div class="alert alert-danger">Veuillez remplir tout les champs</div>';
                    }elseif (isset($_POST['password']) && $_POST['password']===''){
                        return '<div class="alert alert-danger">Veuillez remplir tout les champs</div>';
                    }elseif (isset($_POST['passwordConf']) && $_POST['passwordConf']===''){
                        return '<div class="alert alert-danger">Veuillez remplir tout les champs</div>';
                    }elseif (isset($_POST['email']) && $_POST['email']===''){
                        return '<div class="alert alert-danger">Veuillez remplir tout les champs</div>';
                    }elseif (isset($_POST['pseudo']) && $_POST['pseudo']!=='' && isset($_POST['email']) && $_POST['email']!==''
                        && isset($_POST['password']) && $_POST['password']!=='' && isset($_POST['passwordConf'])&& $_POST['passwordConf']!==''){
                        return '<div class="alert alert-success">Les données ont bien été mis à jour</div>';
                    }
                }elseif (isset($_GET['page']) && $_GET['page']=== 'biographie') {
                    if (isset($_POST['titre']) && $_POST['titre'] === '') {
                        return '<div class="alert alert-danger">Veuillez remplir tout les champs</div>';
                    } elseif (isset($_POST['contenu']) && $_POST['contenu'] === '') {
                        return '<div class="alert alert-danger">Veuillez remplir tout les champs</div>';
                    }elseif (isset($_POST['titre']) && $_POST['titre']!=='' && isset($_POST['contenu']) && $_POST['contenu']!==''){
                        return '<div class="alert alert-success">Les données ont bien été mis à jour</div>';
                    }
                }
            }elseif (isset($_GET['action']) && $_GET['action']==='modif'){
                if (isset($_POST['titre']) && $_POST['titre']!=='' && isset($_POST['contenu']) && $_POST['contenu']!==''){
                    return '<div class="alert alert-success">Les données ont bien été mis à jour</div>';
                }else{
                    return '<div class="alert alert-danger">Veuillez remplir tout les champs</div>';
                }
            }elseif (isset($_GET['action']) && $_GET['action']==='modifcom'){
                if(isset($_POST['auteur']) &&$_POST['auteur']===''){
                    return '<div class="alert alert-danger">Veuillez remplir tout les champs</div>';
                }elseif (isset($_POST['contenu']) && $_POST['contenu']===''){
                    return '<div class="alert alert-danger">Veuillez remplir tout les champs</div>';
                }elseif (isset($_POST['auteur']) &&$_POST['auteur']!=='' && isset($_POST['contenu']) && $_POST['contenu']!==''){
                    return '<div class="alert alert-success">Les données ont bien été mis à jour</div>';
                }
            }elseif (isset($_GET['action']) && $_GET['action']==='create'){
                if ($_GET['page']==='articles'){
                    if(isset($_POST['pseudo']) && $_POST['pseudo']===''){
                        return '<div class="alert alert-danger">Veuillez remplir tout les champs</div>';
                    }elseif (isset($_POST['titre']) && $_POST['titre']===''){
                        return '<div class="alert alert-danger">Veuillez remplir tout les champs</div>';
                    }elseif (isset($_POST['contenu']) && $_POST['contenu']===''){
                        return '<div class="alert alert-danger">Veuillez remplir tout les champs</div>';
                    }elseif (isset($_POST['titre']) && $_POST['titre']!=='' && isset($_POST['contenu']) && $_POST['contenu']!==''){
                        return '<div class="alert alert-success">Votre chapitre à été créé</div>';
                    }
                }
            }
        }
    }
}