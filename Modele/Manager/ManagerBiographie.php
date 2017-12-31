<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 18/10/2017
 * Time: 13:55
 */

namespace Modele\Manager;

    /**
     * Class ManagerBiographie utilisé pour créer le CRUD pour la biographie
     */
class ManagerBiographie extends ManagerDonnees
{
    /**
     * Méthode utilisé pour créer des biographie
     * @param $valeurs
     */
    public function create($valeurs)
    {
        $this->prepare('INSERT INTO biographie(titre, contenu, date_creation) 
        VALUES (:titre,:contenu, now() )',
            [
                'titre' => $valeurs->getTitre(),
                'contenu' => $valeurs->getContenu()
            ],
            'Modele\Entity\Articles', true);
    }

    /**
     * Méthode utilisé pour lire un seul biographie
     * @return array
     */
    public function read()
    {
        $lecture = $this->query('SELECT * FROM biographie', 'Modele\Entity\Biographie');
        return $lecture;
    }

    /**
     * Méthode utilisé pour mettre à jour un biographie
     * @param $valeurs
     */
    public function update($valeurs)
    {
        $this->prepare('UPDATE biographie SET titre = :titre, contenu = :contenu, 
        date_creation = now() ',
            [
                'titre' => $valeurs->getTitre(),
                'contenu' => $valeurs->getContenu()
            ],
            'Modele\Entity\Biographie', true);
    }

}