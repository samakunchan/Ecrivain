<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 18/10/2017
 * Time: 12:04
 */

namespace Modele\Entity;


use Controlleur\ControlleurError;

/**
 * Class Membre utilisé pour la création des nouveaux membres
 */
class Membres
{
    private $id;
    private $pseudo;
    private $password;
    private $email;
    private $date_inscription;

    /**
     * Entré du pseudo, il ne doit pas être vide et doit être un string
     * @param mixed $pseudo
     * @return Membres
     */
    public function setPseudo($pseudo)
    {
        if (!is_string($pseudo) || empty($pseudo)){
            ControlleurError::identifiantIncorrect();
        }else{
            $this->pseudo = htmlspecialchars($pseudo);
        }
        return $this;
    }

    /**
     * Entré du password, il ne doit pas être vide et doit être un string
     * @param mixed $password
     * @return Membres
     */
    public function setPassword($password)
    {
        if (!is_string($password) || empty($password)){
            ControlleurError::identifiantIncorrect();
        }else{
            $this->password = $password;
        }
        return $this;
    }

    /**
     * Entré du email, il ne doit pas être vide et doit être un string
     * @param mixed $email
     * @return Membres
     */
    public function setEmail($email)
    {
        if (!is_string($email) || empty($email)){
            ControlleurError::identifiantIncorrect();
        }else{
            $this->email = $email;
        }
        return $this;
    }

    /**
     * Récupère l'id du membre
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Récupère l'id du membre
     * @return mixed
     */
    public function getPseudo()
    {
        return htmlspecialchars($this->pseudo);
    }

    /**
     * Récupère le password du membre
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Récupère l'email du membre
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Récupère la date d'inscription du membre
     * @return mixed
     */
    public function getDateInscription()
    {
        return $this->date_inscription;
    }


}