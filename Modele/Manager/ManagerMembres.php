<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 18/10/2017
 * Time: 12:04
 */

namespace Modele\Manager;

    /**
     * Class ManagerCommentaires utilisé pour créer le CRUD pour les commentaires
     */
class ManagerMembres extends ManagerDonnees
{
    /**
     * Méthode utilisé pour créer des articles
     * @param $valeurs
     */
    public function create($valeurs)
    {
        $this->prepare('INSERT INTO membres(pseudo, password, email, date_inscription) 
        VALUES ( :pseudo, :password, :email, now() )',
            [
                'pseudo' => $valeurs->getPseudo(),
                'password' => $valeurs->getPassword(),
                'email' => $valeurs->getEmail()
            ],
            'Modele\Entity\Membres', true);
    }

    /**
     * Méthode utilisé pour lire la référence de l'article du commentaire
     * @param $pseudo
     * @return array
     */
    public function read($pseudo)
    {
        $lecture = $this->prepare('SELECT * FROM membres WHERE pseudo=?',[$pseudo],
            'Modele\Entity\Membres', true, true);
        return $lecture;
    }

    /**
     * Méthode utilisé pour lire tout les commentaires
     * @return array
     */
    public function readAll()
    {
        $lecture = $this->query('SELECT * FROM membres ORDER BY id DESC', 'Modele\Entity\Membres');
        return $lecture;
    }

    /**
     * Méthode utilisé pour mettre à jour un commentaire
     * @param $valeurs
     */
    public function update($valeurs)
    {
        $this->prepare('UPDATE membres SET pseudo = :pseudo, password = :password, email = :email, 
        date_inscription = now() WHERE pseudo= :pseudo',
            [
                'pseudo' => $valeurs->getPseudo(),
                'password' => $valeurs->getPassword(),
                'email' => $valeurs->getEmail(),
            ],
            'Modele\Entity\Membres', true);
    }

    /**
     * Méthode utilisé pour supprimer un commentaire
     */
    public function delete()
    {
        $this->prepare('DELETE FROM membres WHERE id = :id',
            [
                'id' => $_GET['id']
            ],
            'Modele\Entity\Membres', true);
    }
}