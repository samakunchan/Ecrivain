<?php
/**
 * Created by PhpStorm.
 * User: Samakunchan
 * Date: 16/10/2017
 * Time: 17:07
 */

namespace Modele\App;

use PDO;
use Exception;
/**
 * Class App utilisé pour généré la connection de la base de donnée
 */
class App
{
    private $pdo;

    /**
     * Méthode qui génère la connection de la base de donnée
    */
    public function connection()
    {
        if($this->pdo === null){
            try{
                $bdd = new PDO('mysql:host=localhost;dbname=booyaka', 'root', '');
                $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
                $this->pdo = $bdd;
            }catch (Exception $e){
                die('Erreur : ' .$e->getMessage());
            }
        }
        return $this->pdo;
    }

}