<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 17/10/2017
 * Time: 15:46
 */

namespace Vue\Core;

    /**
     * Class Vue utilisé pour la construction des pages du site
     */
class Vue
{
    private $fichier;
    private $gabarit;

    /**
     * Constructeur qui instancie le chemin de chaque page
     * Constructeur qui instancie le chemin du gabarit
     * @param $page
    */
    public function __construct($page)
    {
        $this->fichier = '../Vue/Pages/'. $page .'.php';
        $this->gabarit = '../Vue/Gabarit/gabarit.php';
    }

    /**
     * Méthode qui génère la page
     * @param $donnees
     * Données est false par défaut si on ne reçoit pas de tableau de données
    */
    public function genererPages($donnees = false)
    {
        if ($donnees){
            if (file_exists($this->fichier)){
                ob_start();
                extract($donnees);
                require $this->fichier;
                $contenu = ob_get_clean();
                require $this->gabarit;
            }else{
                echo 'Fichier ' . $this->fichier . ' introuvable';
            }
        }else{
            ob_start();
            require $this->fichier;
            $donnees= '';
            $contenu = ob_get_clean();
            require $this->gabarit;
        }
    }

}