<!DOCTYPE html>
<html lang="fr">

<?php require '../app/views/head.php'; ?>

<body>
    <?php require '../app/views/header.php'; ?>
    <h1>Afficher</h1>
    <h3><?= $personne->nom ?> </h3>
    <?= $personne->id ?> : <?= $personne->nom ?> <?= $personne->prenom ?> <?= $personne->age ?>
    <div><button><a href="<?= generateUri('user.index') ?>">Retour</a></button></div>
    <?php require '../app/views/footer.php'; ?>
</body>

</html>