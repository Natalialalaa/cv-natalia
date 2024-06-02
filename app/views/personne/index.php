<!DOCTYPE html>
<html lang="fr">

<?php require '../app/views/head.php'; ?>

<body>
    <?php require '../app/views/header.php'; ?>
    <h1>Afficher</h1>

    <div>
        <a href="<?= generateUri('personne.create') ?>"><button>Ajouter</button></a>
    </div>
    <ul>
        <?php
        foreach ($listePersonnes as $personne) {
        ?>
            <li>
                <a class='text-decoration-none' href="<?= generateUri('personne.show') ?>?id=<?= $personne->id ?>">
                    <img style="width:50px" src="photos/<?= $personne->photo ?>" alt="photo <?= $personne->nom ?>" />
                </a>
                <a class='text-decoration-none' href="<?= generateUri('personne.delete') ?>?id=<?= $personne->id ?>">
                    <img style="width:30px" src="images/poubelle.png" alt="photo <?= $personne->nom ?>" />
                </a>
                <a class='text-decoration-none' href="<?= generateUri('personne.update') ?>?id=<?= $personne->id ?>">
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