<!DOCTYPE html>
<html lang="fr">

<?php require '../app/views/head.php'; ?>

<body>
    <?php require '../app/views/header.php'; ?>
    <h1>Ajouter</h1>
    <form action="" method="post" enctype="multipart/form-data">

        <div>
            <span>Nom</span>
            <input type="text" name="nom">
        </div>

        <div>
            <span>Prénom</span>
            <input type="text" name="prenom">
        </div>

        <div>
            <span>Age</span>
            <input type="text" name="age">
        </div>

        <div>
            <span>Photo</span>
            <input type="file" name="photo">
        </div>

        <div>
            <button type="submit" name="ajouter">Ajouter</button>
            <button><a href="<?= generateUri('personne') ?>">Annuler</a></button>
        </div>

    </form>
    <?php require '../app/views/footer.php'; ?>
</body>

</html>