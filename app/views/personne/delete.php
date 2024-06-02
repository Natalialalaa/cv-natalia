<!DOCTYPE html>
<html lang="fr">

<?php require '../app/views/head.php'; ?>

<body>
    <?php require '../app/views/header.php'; ?>
    <h1>Supprimer</h1>
    <form action="" method="post">
        <ul>
            <li>
                <?= $personne->id ?> : <?= $personne->nom ?> <?= $personne->prenom ?> <?= $personne->age ?>
            </li>
        </ul>
        <div>
            <button type="submit" name="supprimer">Supprimer</button>
            <button><a href="<?= generateUri('personne') ?>">Annuler</a></button>
        </div>
    </form>
    <?php require '../app/views/footer.php'; ?>
</body>

</html>