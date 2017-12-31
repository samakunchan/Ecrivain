<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 16/10/2017
 * Time: 18:48
 */

namespace Modele\Manager;

    /**
     * Class ManagerArticles utilisé pour créer le CRUD pour les articles
    */
class ManagerArticles extends ManagerDonnees
{
    /**
     * Méthode utilisé pour créer des articles
     * @param $valeurs
    */
    public function create($valeurs)
    {
        $this->prepare('INSERT INTO articles(titre, contenu, date_creation) 
        VALUES (:titre,:contenu, now() )',
            [
                'titre' => $valeurs->getTitre(),
                'contenu' => $valeurs->getContenu()
            ],
            'Modele\Entity\Articles', true);
    }

    /**
     * Méthode utilisé pour lire un seul article
     * @param $id
     * @return array
     */
    public function read($id)
    {
        $lecture = $this->prepare('SELECT * FROM articles WHERE id=?',[$id],
            'Modele\Entity\Articles', true, true);
        return $lecture;
    }

    /**
     * Méthode utilisé pour lire le dernier article (pour l'extrait de la page d'acceuil)
     * @return array
     */
    public function readLastOne()
    {
        $lecture =$this->query('SELECT * FROM articles ORDER BY id DESC LIMIT 1',
            'Modele\Entity\Articles');
        return $lecture;
    }

    /**
     * Méthode utilisé pour lire tout articles 8 par 8 avec un système de pagination
     * Paramètre ci-dessous pour la pagination
     * @param $pageActuel
     * @param $articlesParPages
     * @return array
     */
    public function readAll($pageActuel = false ,$articlesParPages= false)
    {
        if ($pageActuel && $articlesParPages){
            $lecture = $this->query('SELECT * FROM articles ORDER BY id DESC LIMIT '.
                (($pageActuel-1)*$articlesParPages).','.$articlesParPages.' ', 'Modele\Entity\Articles');
            return $lecture;
        }else{
            $lecture = $this->query('SELECT * FROM articles ORDER BY id DESC ', 'Modele\Entity\Articles');
            return $lecture;
        }
    }

    /**
     * Méthode utilisé pour mettre à jour un article
     * @param $valeurs
     */
    public function update($valeurs)
    {
        $this->prepare('UPDATE articles SET titre = :titre, contenu = :contenu, 
        date_creation = now() WHERE id= :id',
            [
                'id' => $_GET['id'],
                'titre' => $valeurs->getTitre(),
                'contenu' => $valeurs->getContenu()
            ],
            'Modele\Entity\Articles', true);
    }

    /**
     * Méthode utilisé pour supprimer un article
     * @param $id
     */
    public function delete($id)
    {
        $this->prepare('DELETE FROM articles WHERE id = :id',
            [
                'id' => $id
            ],
            'Modele\Entity\Articles', true);
    }

    /**
     * Méthode utilisé pour avoir le nombre total des articles
     */
    public function getTotal()
    {
        $donnees = $this->query('SELECT COUNT(*) as nbArt FROM articles','Modele\Entity\Articles');
        return $donnees;
    }
}