<?php

namespace App\Controllers;

use Framework\Manager\Manager;

use App\Entity\Formation;

class FormationController
{

    protected $manager;
    

    public function __construct(){
         $this->manager = new Manager(Formation::class);
    }

    public function add(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ajouter'])) {

            // récupération des données du formulaire
            $competence = new Formation($_POST);
            $competence = $this->manager->insert($competence);
            // redirection
            header("location:" . generateUri('cv.index'));
            exit();
        }

        require '../app/views/formation/create-formation.php';
    }

    public function delete(){
        $id = (int)$_GET['id'];

        $comp = $this->manager->find(compact('id'));
        if ($comp->id) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['supprimer'])) {
                $this->manager->delete($comp);
                // redirection
                header("location:" . generateUri('cv.index'));
                exit();
            }else {
                require '../app/views/formation/delete-formation.php';
            }
        }else {
            header("location:" . generateUri('cv.index'));
            exit();
        }
    }

    public function update(){
        $id = (int)$_GET['id'];

        $comp = $this->manager->find(compact('id'));

        if ($comp->id) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['modifier'])) {
                $compe = new Formation($_POST);
                $compe->setId($comp->id);
                $this->manager->update($compe);
                // redirection
                header("location:" . generateUri('cv.index'));
                exit();
            }else {
                require '../app/views/formation/update-formation.php';
            }
        }else {
            header("location:" . generateUri('cv.index'));
            exit();
        }
    }

}