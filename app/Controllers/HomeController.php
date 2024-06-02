<?php

namespace App\Controllers;

use Framework\Manager\Manager;
use App\Entity\Personne;

class HomeController
{
    public function index()
    {
        $page_title = 'Accueil';
        require '../app/views/home/index.php';
    }
}
