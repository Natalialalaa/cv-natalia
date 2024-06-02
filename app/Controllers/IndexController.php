<?php

namespace App\Controllers;

use Framework\Manager\Manager;
use App\Entity\Competence;
use App\Entity\Experience;
use App\Entity\Formation;

class IndexController
{
    protected $manager;
    protected $competence;
    protected $experience;
    protected $formation;

    public function __construct()
    {
        
        $this->competence = new Manager(Competence::class);
        $this->experience = new Manager(Experience::class);
        $this->formation  = new Manager(Formation::class);
    }

    public function index()
    {
        $page_title = 'Accueil';
        $competences = $this->competence->findAll();
        $experiences = $this->experience->findAll();
        $formations = $this->formation->findAll();

        require '../app/views/cv/index.php';
    }
}
