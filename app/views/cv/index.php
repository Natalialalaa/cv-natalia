<!DOCTYPE html>
<html lang="fr">

<?php require '../app/views/head.php'; ?>

<body>
    <?php require '../app/views/header.php'; ?>
    <main>
        <section>
            <article class="about">
                <h2>About <br>NataliaDEV</h2>
                <div>
                    <p>Étudiante en Développement Web et Design @l'Université du Littoral,<br> je recherche des
                        opportunités
                        en alternance 2024-2025 <br>pour dépasser mes limites et gagner en expérience🎯🚀</p>
                    <div class="about-info">
                        <button>Download CV</button>
                        <a href="priscillanatalia.id@gmail.com">priscillanatalia.id@gmail.com</a>
                    </div>
                </div>
            </article>
            <article class="cv">
                <section class="profile-formation">
                    <h2>FORMATION</h2>

                    <div>
                        <?php if(authRole('admin')) { ?>
                        <a href="<?= generateUri('formation.add') ?>"><button>Ajouter</button></a>
                        <?php }?>
                    </div>
                    <?php
                    foreach ($formations as $formation) {
                    ?>
                        <div class="profile-list">
                            <div class="list-name-date">
                                <h2><?= $formation->lieu ?> - <?= $formation->nom ?></h2>
                                <h5><?= $formation->debut ?> <?= $formation->fin ?></h5>
                            </div>
                            <h3><?= $formation->description ?></h3>
                            <?php if(authRole('admin')) { ?>
                            <a class='text-decoration-none' href="<?= generateUri('formation.delete') ?>?id=<?= $formation->id ?>">
                                <img style="width:30px" src="images/poubelle.png" alt="photo <?= $formation->nom ?>" />
                            </a>
                            <a class='text-decoration-none' href="<?= generateUri('formation.update') ?>?id=<?= $formation->id ?>">
                                <img style="width:30px" src="images/crayon.png" alt="photo <?= $formation->nom ?>" />
                            </a>
                            <?php }?>
                        <?php
                    }
                        ?>
                </section>
                <section class="profile-experiences">
                    <h2 class="profile-title-experiences">EXPERIENCES PROFESSIONELLES</h2>


                    <div>
                        <?php if(authRole('admin')) { ?>
                        <a href="<?= generateUri('experience.add') ?>"><button>Ajouter</button></a>
                        <?php }?>
                    </div>
                    <?php
                    foreach ($experiences as $experience) {
                    ?>
                        <div class="profile-list">
                            <div class="list-name-date">
                                <h2><?= $experience->etablissement ?></h2>
                                <h5><?= $experience->debut ?> <?= $experience->fin ?></h5>
                            </div>
                            <h3><?= $experience->nom ?></h3>
                            <p> <?= $experience->description ?></p>
                            <?php if(authRole('admin')) { ?>
                            <a class='text-decoration-none' href="<?= generateUri('experience.delete') ?>?id=<?= $experience->id ?>">
                                <img style="width:30px" src="images/poubelle.png" alt="photo <?= $experience->nom ?>" />
                            </a>
                            <a class='text-decoration-none' href="<?= generateUri('experience.update') ?>?id=<?= $experience->id ?>">
                                <img style="width:30px" src="images/crayon.png" alt="photo <?= $experience->nom ?>" />
                            </a>
                            <?php }?>
                        </div>
                    <?php
                    }
                    ?>
                </section>

                <section class="profile-competences">
                    <h2>COMPETENCES</h2>
                    <div>
                        <?php if(authRole('admin')) { ?>
                        <a href="<?= generateUri('competence.add') ?>"><button>Ajouter</button></a>
                        <?php }?>
                    </div>
                    <?php
                    foreach ($competences as $competence) {
                    ?>
                        <div class="compt-logiciels">
                            <h2><?= $competence->nom ?></h2>
                            <li><?= $competence->description ?></li>
                            <?php if(authRole('admin')) { ?>
                            <a class='text-decoration-none' href="<?= generateUri('competence.delete') ?>?id=<?= $competence->id ?>">
                                <img style="width:30px" src="images/poubelle.png" alt="photo <?= $competence->nom ?>" />
                            </a>
                            <a class='text-decoration-none' href="<?= generateUri('competence.update') ?>?id=<?= $competence->id ?>">
                                <img style="width:30px" src="images/crayon.png" alt="photo <?= $competence->nom ?>" />
                            
                            </a>
                            <?php }?>
                        </div>
                    <?php
                    }
                    ?>

                </section>
            </article>
        </section>
    </main>
    <?php require '../app/views/footer.php'; ?>
</body>

</html>