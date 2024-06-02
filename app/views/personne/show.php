<!DOCTYPE html>
<html lang="fr">

<?php require '../app/views/head.php'; ?>

<body>
    <?php require '../app/views/header.php'; ?>
    <h1>Afficher</h1>
    <img style="width:50px" src="photos/<?= $personne->photo ?>" alt="photo <?= $personne->nom ?>" />
    <?= $personne->id ?> : <?= $personne->nom ?> <?= $personne->prenom ?> <?= $personne->age ?>
    <div><button><a href="<?= generateUri('personne') ?>">Retour</a></button></div>
    <?php require '../app/views/footer.php'; ?>
</body>

</html>