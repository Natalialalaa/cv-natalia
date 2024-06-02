<!DOCTYPE html>
<html lang="fr">

<?php require '../app/views/head.php'; ?>

<body>
    <?php require '../app/views/header.php'; ?>
    <h1>Afficher</h1>

    <div>
        <a href="<?= generateUri('user.create') ?>"><button>Ajouter</button></a>
    </div>
    <ul>
        <?php
        foreach ($listePersonnes as $personne) {
        ?>
            <li>
                <a class='text-decoration-none' href="<?= generateUri('user.show') ?>?id=<?= $personne->id ?>">
                    <h3> <?= $personne->nom ?> </h3>
                </a>
                <a class='text-decoration-none' href="<?= generateUri('user.delete') ?>?id=<?= $personne->id ?>">
                    <img style="width:30px" src="images/poubelle.png" alt="photo <?= $personne->nom ?>" />
                </a>
                <a class='text-decoration-none' href="<?= generateUri('user.update') ?>?id=<?= $personne->id ?>">
                    <img style="width:30px" src="images/crayon.png" alt="photo <?= $personne->nom ?>" />
                </a>
            </li>
        <?php
        }
        ?>
    </ul>
    <?php require '../app/views/footer.php'; ?>
</body>

</html>