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
            <span>Mail</span>
            <input type="email" name="email" value="<?= $personne->email ?>">
        </div>

        <div>
            <span>Role</span>
            <input type="text" name="role" value="<?= $personne->role ?>">
        </div>

        <div>
            <span>Mot de Passe</span>
            <input type="text" name="password" required="required">
        </div>

        <div>
            <button type="submit" name="modifier">Modifier</button>
            <button><a href="<?= generateUri('user.index') ?>">Annuler</a></button>
        </div>

    </form>
    <?php require '../app/views/footer.php'; ?>
</body>

</html>