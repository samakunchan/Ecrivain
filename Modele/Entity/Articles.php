<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 16/10/2017
 * Time: 18:54
 */

namespace Modele\Entity;

/**
 * Class Article utilisé pour la création des articles
*/
class Articles
{
    private $id;
    private $titre;
    private $contenu;
    private $date_creation;
    private $extrait;
    private $nbArt;


    /**
     * Insertion du titre, il ne doit pas être vide et doit être un string
     * @param mixed $titre
     * @return Articles
     */
    public function setTitre($titre)
    {
        if(!isset($titre) && !is_string($titre)){
            echo 'Le titre n\'est pas définie';
        }else{
            $this->titre = htmlspecialchars($titre);
        }
        return $this;
    }

    /**
     * Insertion du contenu, il ne doit pas être vide et doit être un string
     * @param mixed $contenu
     * @return Articles
     */
    public function setContenu($contenu)
    {
        if (!isset($contenu)&& !is_string($contenu)){
            echo 'Le contenu n\'est pas définie';
        }
        $this->contenu = $contenu;
        return $this;
    }

    /**
     * Récupère l'id de l'article
     * @return mixed
     */
    public function getId()
    {
        return (int) $this->id;
    }

    /**
     * Récupère le titre de l'article
     * @return mixed
     */
    public function getTitre()
    {
        if(!is_string($this->titre)){
            echo 'Probleme avec titre -GetTitre Articles';
        }
        return (string) htmlspecialchars($this->titre);
    }

    /**
     * Récupère le contenu de l'article
     * @return mixed
     */
    public function getContenu()
    {
        if (!is_string($this->contenu)){
            echo 'Probleme avec contenu -GetContenu Articles';
        }
        return $this->contenu;
    }

    /**
     * Récupère la date de création de l'article
     * @return mixed
     */
    public function getDateCreation()
    {
        $date = date_create($this->date_creation);
        return date_format($date, 'd/m/Y à H:i:s');
    }

    /**
     * Récupère l'extrait de l'article
     * @return mixed
     */
    public function getExtrait()
    {
        $this->extrait = substr($this->contenu, 0,1050);
        return $this->extrait;
    }

    /**
     * Récupère le nombre d'article
     * @return mixed
     */
    public function getNbArt()
    {
        return (int) $this->nbArt;
    }



}