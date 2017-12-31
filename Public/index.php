<?php

require '../Autoloading/Autoloader.php';
\Autoloading\Autoloader::register();

use Controlleur\Routeur\Routeur;

$siteWeb = new Routeur();
$siteWeb->start();



/*
require '../Vue/Core/Vue.php';
require '../Modele/App/App.php';

require '../Modele/Entity/Articles.php';
require '../Modele/Entity/Contact.php';
require '../Modele/Entity/Commentaires.php';
require '../Modele/Entity/Membres.php';
require '../Modele/Entity/Biographie.php';

require '../Modele/Manager/ManagerDonnees.php';
require '../Modele/Manager/ManagerArticles.php';
require '../Modele/Manager/ManagerContact.php';
require '../Modele/Manager/ManagerMembres.php';
require '../Modele/Manager/ManagerCommentaires.php';
require '../Modele/Manager/ManagerBiographie.php';

require '../Controlleur/ControlleurAccueil.php';
require '../Controlleur/ControlleurArticles.php';
require '../Controlleur/ControlleurBiographie.php';
require '../Controlleur/ControlleurChapitres.php';
require '../Controlleur/ControlleurCommentaires.php';
require '../Controlleur/ControlleurContact.php';
require '../Controlleur/ControlleurForm.php';
require '../Controlleur/ControlleurSingle.php';
require '../Controlleur/BackEnd/ControlleurAdmin.php';
require '../Controlleur/BackEnd/ControlleurUsers.php';
require '../Controlleur/BackEnd/ControlleurAuthentification.php';
require '../Controlleur/BackEnd/ControlleurProfil.php';
require '../Controlleur/ControlleurError.php';
require '../Controlleur/Routeur/Routeur.php';
*/
/*
function mon_autoloader($class){
    require '../'.$class.'.php';
}
spl_autoload_register('mon_autoloader');*/



