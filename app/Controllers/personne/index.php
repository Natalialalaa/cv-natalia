<?php

use Framework\Manager\Manager;
use App\Entity\Personne;

$page_title = 'Personnes';

// $listePersonnes = findAll($db, 'exercices');
$manager = new Manager(Personne::class);
$listePersonnes = $manager->findAll();
//dd($listePersonnes);





require '../app/views/personne/index.php';
