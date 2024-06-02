<?php

use Framework\Manager\Manager;
use App\Entity\Personne;

$page_title = 'Afficher';

$id = $_GET['id'] ?? 1;

// Recherche de la personne
$manager = new Manager(Personne::class);
$personne = $manager->find(compact('id'));

if (!$personne) {
    header("location:" . generateUri('personne'));
    exit();
}

require '../app/views/personne/show.php';
