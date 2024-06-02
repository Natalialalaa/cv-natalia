<!DOCTYPE html>
<html lang="fr">

<?php require '../app/views/head.php'; ?>

<body>
    <?php require '../app/views/header.php'; ?>
    <h1>Modifier</h1>
    <form action="" method="post" enctype="multipart/form-data">

        <div>
            <span>Nom</span>
            <input type="text" name="nom" value="<?= $personne->nom ?>">
        </div>

        <div>
            <span>Prénom</span>
            <input type="text" name="prenom" value="<?= $personne->prenom ?>">
        </div>

        <div>
            <span>Age</span>
            <input type="text" name="age" value="<?= $personne->age ?>">
        </div>

        <div>
            <span>Photo</span>
            <img style="width:50px" src="photos/<?= $personne->photo ?>" alt="photo <?= $personne->nom ?>" />
            <input type="file" name="photo">
        </div>

        <div>
            <button type="submit" name="modifier">Modifier</button>
            <button><a href="<?= generateUri('personne') ?>">Annuler</a></button>
        </div>

    </form>
    <?php require '../app/views/footer.php'; ?>
</body>

</html>