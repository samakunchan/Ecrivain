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
class ManagerCommentaires extends ManagerDonnees
{
    /**
     * Méthode utilisé pour créer des articles
     * @param $valeurs
     */
    public function create($valeurs)
    {
        $this->prepare('INSERT INTO commentaires(auteur ,contenu,art_id ,signaler ,date_creation ) 
        VALUES (:auteur, :contenu, :art_id, :signaler, now())',
            [
                'auteur' => $valeurs->getAuteur(),
                'contenu' => $valeurs->getContenu(),
                'art_id'=> $valeurs->getArtId(),
                'signaler' => $valeurs->getSignaler()
            ],
            'Modele\Entity\Commentaires', true);
    }

    /**
     * Méthode utilisé pour lire la référence de l'article du commentaire
     * @param $id
     * @return array
     */
    public function readRefArticle($id)
    {
        $lecture = $this->prepare('SELECT * FROM commentaires WHERE art_id=?',[$id],
            'Modele\Entity\Commentaires', true, true);
        return $lecture;
    }

    /**
     * Méthode utilisé pour lire l'article du commentaire
     * @param $id
     * @return array
     */
    public function read($id)
    {
        $lecture = $this->prepare('SELECT * FROM commentaires WHERE id=?',[$id],
            'Modele\Entity\Commentaires', true, true);
        return $lecture;
    }

    /**
     * Méthode utilisé pour lire tout les commentaires
     * @param $id
     * @return array
     */
    public function readAll($id=false)
    {
        $lecture = $this->prepare('SELECT * FROM commentaires WHERE art_id=?',[$id],
            'Modele\Entity\Commentaires', false, true);
        return $lecture;
    }

    /**
     * Méthode utilisé pour lire tout les signalements de commentaire
     * @return array
     */
    public function readAllSignalement()
    {
        $lecture = $this->query('SELECT * FROM commentaires WHERE signaler=1 ORDER BY id DESC ', 'Modele\Entity\Commentaires');
        return $lecture;
    }

    /**
     * Méthode utilisé pour mettre à jour un commentaire
     * @param $valeurs
     */
    public function update($valeurs)
    {
        $this->prepare('UPDATE commentaires SET auteur = :auteur,contenu = :contenu, 
        date_creation = now(), signaler= :signaler WHERE id= :id',
            [
                'id' => $_GET['idcom'],
                'auteur' => $valeurs->getAuteur(),
                'contenu' => $valeurs->getContenu(),
                'signaler' => $valeurs->getSignaler()
            ],
            'Modele\Entity\Commentaires', true);
    }

    /**
     * Méthode utilisé pour supprimer un commentaire
     * @param $id
     */
    public function delete($id)
    {
        $this->prepare('DELETE FROM commentaires WHERE id = :id',
            [
                'id' => $id
            ],
            'Modele\Entity\Commentaires', true);
    }

    /**
     * Méthode utilisé pour mettre à jour le marqueur du signalement (0 ou 1)
     * @param $valeurs
     */
    public function updateSignaler($valeurs)
    {
        $this->prepare('UPDATE commentaires SET signaler = :signaler WHERE id= :id',
            [
                'id' => $_GET['idcom'],
                'signaler' => $valeurs->getSignaler()
            ],
            'Modele\Entity\Commentaires', true);
    }

    /**
     * Méthode utilisé pour mettre à jour un article
     */
    public function getTotalSigalement()
    {
        $donnees = $this->query('SELECT COUNT(signaler) as nbCom FROM commentaires WHERE signaler=1','Modele\Entity\Commentaires');
        return $donnees;
    }
}