<!DOCTYPE html>
<html lang="fr">

<?php require '../app/views/head.php'; ?>

<body>
    <?php require '../app/views/header.php'; ?>
    <h1>Connexion</h1>
    <form action="" method="post" enctype="multipart/form-data">

        <div>
            <span>Email</span>
            <input type="email" name="email">
        </div>

        <div>
            <span>Mot de passe</span>
            <input type="password" name="password">
        </div>



        <div>
            <button type="submit" name="Ajouter">connexion</button>
            <button><a href="<?= generateUri('personne') ?>">Annuler</a></button>
        </div>

    </form>
    <?php require '../app/views/footer.php'; ?>
</body>

</html>