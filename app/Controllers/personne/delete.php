<?php

use Framework\Manager\Manager;
use App\Entity\Personne;
$manager = new Manager(Personne::class);

$page_title = 'Supprimer';

$id = $_GET['id'] ?? 0;

// Recherche de la personne
$personne = $manager->find(compact('id'));

if (!$personne) {
    header("location:" . generateUri('personne'));
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['supprimer'])) {
    // suppression photo
    $url = "photos/" . $personne->photo;
    if (file_exists($url) && $url != "photos/photo.png") {
        unlink($url);
    }

    // suppression de la personne
    $manager->delete($personne);

    header("location:" . generateUri('personne'));
    exit();
}

require '../app/views/personne/delete.php';
