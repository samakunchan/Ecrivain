<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 26/10/2017
 * Time: 18:40
 */

namespace Controlleur\BackEnd;


use Vue\Core\Vue;
use Controlleur\ControlleurCommentaires;
    /**
     * Class ControlleurUsers utilisé pour la construction de la page d'utilisateur
     */
class ControlleurUsers
{
    private $vue;

    /**
     * Contructeur qui instancie les outils de contruction CRUD
     */
    public function __construct()
    {
        $this->vue = new Vue('users');
    }

    /**
     * Appeler par :  Routeur
     * Page non autorisé sans une session active
     */
    public function administration()
    {
        $this->vue->genererPages();
    }
}