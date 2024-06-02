<?php

namespace App\Controllers;

use Framework\Manager\Manager;
use App\Entity\Portofolio;

class PortofolioController
{
    protected $manager;
    public function __construct()
    {
        $this->manager = new Manager(Portofolio::class);
    }

    public function index()
    {

        $page_title = 'Portofolios';

        // $listePersonnes = findAll($db, 'exercices');
        $listePortofolio = $this->manager->findAll();
        //dd($listePersonnes);
        require '../app/views/portofolio/portofolio-index.php';
    }
    public function create()
    {
        $page_title = 'Ajouter';
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ajouter'])) {

            // récupération des données du formulaire

            $portofolio = new Portofolio($_POST);
            $portofolio = $this->manager->insert($portofolio);
            //$id = $db->lastInsertId();
            // récupération photo ou photo par defaut
            if (isset($_FILES['photo']) && is_uploaded_file($_FILES['photo']['tmp_name'])) {
                $portofolio->photo = $portofolio->id . "_" . str_replace(' ', '', $portofolio->nom) . "." . strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));
                $origine = $_FILES['photo']['tmp_name'];
                $destination = "photos/$portofolio->photo";
                move_uploaded_file($origine, $destination);
            } else {
                $portofolio->photo = $portofolio->id . "_" . str_replace(' ', '', $portofolio->nom) . ".png";
                $origine = "photos/photo.png";
                $destination = "photos/$portofolio->photo";
                copy($origine, $destination);
            }

            $this->manager->update($portofolio);

            // redirection
            header("location:" . generateUri('portofolio'));
            exit();
        }

        require '../app/views/portofolio/create.php';
    }
}
