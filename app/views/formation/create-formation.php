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
            <span>Etablissement</span>
            <input type="text" name="etablissement">
        </div>

        <div>
            <span>Lieu</span>
            <input type="text" name="lieu">
        </div>
        <div>
            <span>debut</span>
            <input type="date" name="debut">
        </div>
        <div>
            <span>fin</span>
            <input type="date" name="fin">
        </div>
        

        <div>
            <span>description</span>
            <textarea name="description" id="description" cols="30" rows="10"></textarea>
        </div>

        

        <div>
            <button type="submit" name="ajouter">Ajouter</button>
            <button><a href="<?= generateUri('cv.index') ?>">Annuler</a></button>
        </div>

    </form>
    <?php require '../app/views/footer.php'; ?>
</body>

</html>