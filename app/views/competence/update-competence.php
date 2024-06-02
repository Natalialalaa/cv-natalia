<!DOCTYPE html>
<html lang="fr">

<?php require '../app/views/head.php'; ?>

<body>
    <?php require '../app/views/header.php'; ?>
    <h1>Modifier</h1>
    <form action="" method="post" enctype="multipart/form-data">

        <div>
            <span>Nom</span>
            <input type="text" name="nom" value="<?= $comp->nom ?>">
        </div>

        <div>
            <span>Description</span>
            <textarea name="description" id="dexription" cols="30" rows="10"><?= $comp->description ?></textarea>
        </div>

        
        <div>
            <button type="submit" name="modifier">Modifier</button>
            <button><a href="<?= generateUri('cv.index') ?>">Annuler</a></button>
        </div>

    </form>
    <?php require '../app/views/footer.php'; ?>
</body>

</html>