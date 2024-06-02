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
            <span>Etablissement</span>
            <input type="text" name="etablissement" value="<?= $comp->etablissement ?>">
        </div>

        <div>
            <span>Lieu</span>
            <input type="text" name="lieu" value="<?= $comp->lieu ?>">
        </div>
        <div>
            <span>debut</span>
            <input type="date" name="debut" value="<?= $comp->debut ?>">
        </div>
        <div>
            <span>fin</span>
            <input type="date" name="fin" value="<?= $comp->fin ?>">
        </div>
        <div>
            <span>Description</span>
            <textarea name="description" id="description" cols="30" rows="10"><?= $comp->description ?></textarea>
        </div>

        <div>
            <button type="submit" name="modifier">Modifier</button>
            <button><a href="<?= generateUri('cv.index') ?>">Annuler</a></button>
        </div>

        
    </form>
    <?php require '../app/views/footer.php'; ?>
</body>

</html>