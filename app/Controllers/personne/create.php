<?php

use Framework\Manager\Manager;
use App\Entity\Personne;

$manager = new Manager(Personne::class);

$page_title = 'Ajouter';


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ajouter'])) {

  // récupération des données du formulaire

  $personne = new Personne($_POST);


  $personne = $manager->insert($personne);

  //$id = $db->lastInsertId();

  // récupération photo ou photo par defaut
  if (isset($_FILES['photo']) && is_uploaded_file($_FILES['photo']['tmp_name'])) {
    $personne->photo = $personne->id . "_" . str_replace(' ', '', $personne->nom) . "." . strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));
    $origine = $_FILES['photo']['tmp_name'];
    $destination = "photos/$personne->photo";
    move_uploaded_file($origine, $destination);
  } else {
    $personne->photo = $personne->id . "_" . str_replace(' ', '', $personne->nom) . ".png";
    $origine = "photos/photo.png";
    $destination = "photos/$personne->photo";
    copy($origine, $destination);
  }

  $manager->update($personne);

  // redirection
  header("location:" . generateUri('personne'));
  exit();
}

require '../app/views/personne/create.php';
