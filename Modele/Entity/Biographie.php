<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 23/10/2017
 * Time: 20:42
 */

namespace Modele\Entity;

/**
 * Class Article utilisé pour la création des articles
 */
class Biographie
{
    private $id;
    private $titre;
    private $contenu;
    private $date_creation;


    /**
     * Insertion du titre, il ne doit pas être vide et doit être un string
     * @param mixed $titre
     * @return Biographie
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
     * @return Biographie
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
     * Récupère l'id de la biograhie
     * @return mixed
     */
    public function getId()
    {
        return (int) $this->id;
    }

    /**
     * Récupère le titre de la biograhie
     * @return mixed
     */
    public function getTitre()
    {
        if(!is_string($this->titre)){
            echo 'Probleme avec titre -GetTitre Biographie';
        }
        return (string) htmlspecialchars($this->titre);
    }

    /**
     * Récupère le contenu de la biograhie
     * @return mixed
     */
    public function getContenu()
    {
        if (!is_string($this->contenu)){
            echo 'Probleme avec contenu -GetContenu Biographie';
        }
        return $this->contenu;
    }

    /**
     * Récupère la date de création de la biograhie
     * @return mixed
     */
    public function getDateCreation()
    {
        return $this->date_creation;
    }

}