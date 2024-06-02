<?php

use Framework\Manager\Manager;
use App\Entity\Personne;

$manager = new Manager(Personne::class);


$page_title = 'Modifier';

$id = $_GET['id'] ?? 0;

// Recherche de la personne
$personne = $manager->find(compact('id'));

if (!$personne) {
    header("location:" . generateUri('personne'));
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['modifier'])) {
    // récupération des données du formulaire
    $personne->nom = $_POST['nom'] ?? "";
    $personne->prenom = $_POST['prenom'] ?? "";
    $personne->age = (int) $_POST['age'] ?? 0;

    // renommage de la photo
    $url = "photos/" . $personne->photo;
    $personne->photo = $id . "_" . str_replace(' ', '', $personne->nom) . "." . strtolower(pathinfo($url, PATHINFO_EXTENSION));
    if (file_exists($url)) {
        rename($url, "photos/" . $personne->photo);
    }

    // modification de la personne
    $manager->update($personne);

    if (isset($_FILES['photo']) && is_uploaded_file($_FILES['photo']['tmp_name'])) {
        // suppression ancienne photo
        $url = "photos/" . $personne->photo;
        if (file_exists($url)  && $url != "photos/photo.png") {
            unlink($url);
        }
        // ajout de la nouvelle photo
        $origine = $_FILES['photo']['tmp_name'];
        $destination = "photos/$personne->photo";
        move_uploaded_file($origine, $destination);
    }

    header("location:" . generateUri('personne'));
    exit();
}

require '../app/views/personne/update.php';
