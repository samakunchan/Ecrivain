<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 18/10/2017
 * Time: 12:04
 */

namespace Modele\Entity;

/**
 * Class Commentaire utilisé pour la création des commentaires
 */
class Commentaires
{
    private $id;
    private $auteur;
    private $contenu;
    private $date_creation;
    private $art_id;
    private $signaler;
    private $nbCom;

    /**
     * Insertion de l'id de l'article afin de répéré à quel article ce commentaire appartient
     * @param mixed $art_id
     * @return Commentaires
     */
    public function setArtId($art_id)
    {
        $this->art_id = $art_id;
        return $this;
    }

    /**
     * Insertion de l'auteur. L'auteur est prédéfinie et créé à partir de la class Membre
     * @param mixed $auteur
     * @return Commentaires
     */
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;
        return $this;
    }

    /**
     * Insertion du contenu. TinyMCE gère les failles XSS
     * @param mixed $contenu
     * @return Commentaires
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
        return $this;
    }

    /**
     * Insère un marqueur 1 (si le signalement est vrai) ou 0 (si le signalement est faux)
     * @param mixed $signaler
     * @return Commentaires
     */
    public function setSignaler($signaler)
    {
        $this->signaler = $signaler;
        return $this;
    }

    /**
     * Récupère l'id du commentaire
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Récupère l'id de l'article du commentaire
     * @return mixed
     */
    public function getArtId()
    {
        return $this->art_id;
    }

    /**
     * Récupère l'auteur du commentaire
     * @return mixed
     */
    public function getAuteur()
    {
        return (string) htmlspecialchars($this->auteur);
    }

    /**
     * Récupère le contenu du commentaire
     * @return mixed
     */
    public function getContenu()
    {
        return (string) $this->contenu;
    }

    /**
     * Récupère la date du commentaire
     * @return mixed
     */
    public function getDateCreation()
    {
        $date = date_create($this->date_creation);
        return date_format($date, 'd/m/Y à H:i:s');
    }

    /**
     * Récupère les valeurs 1 ou 0 du signalement
     * @return mixed
     */
    public function getSignaler()
    {
        return (int) $this->signaler;
    }

    /**
     * Récupère le nombre total commentaire
     * @return mixed
     */
    public function getNbCom()
    {
        return $this->nbCom;
    }

}