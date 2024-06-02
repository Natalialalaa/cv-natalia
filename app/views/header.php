<header>
    
    <nav>
        <h1>NataliaDEV</h1>
        <img src="https://img.icons8.com/external-febrian-hidayat-basic-outline-febrian-hidayat/48/000000/external-finger-print-ui-essential-febrian-hidayat-basic-outline-febrian-hidayat.png" style="height: 32px;" />
        <ul>
            <li>About</li>
            <li>Works</li>
            <li>Contact</li>
            <li><a href="<?= generateUri('cv.index') ?>">Accueil</a></li>
            <?php if (authRole('admin')) {
            ?>
                <li><a href="<?= generateUri('user.index') ?>">user</a></li>
            <?php
            } ?>
        </ul>
        <?php
    if (!auth()) { ?>
        <h1>bonjour</h1>
        <a href='<?= generateUri('user.login') ?>'><button style="color: black">connexion</button></a>
    <?php } else { ?>
        <h1>bonjour
            <?= auth('nom') ?>
            <form action='<?= generateUri('user.logout') ?>' method='post'>
                <button type='submit' name='deconnexion' style="color: black">deconnexion</button>
            </form>
        </h1>
    <?php } ?>
    </nav>
    <article>
        <h1><span style="font-size: 3em; color: yellow;">Hello!</span> <br>I'm <span style="font-size: 1.5em; color: rgb(255, 255, 255); text-shadow: 3px 3px 5px rgba(255, 159, 247, 0.76);">Priscilla
                Natalia,</span> <span style="text-decoration: rgb(36, 0, 34) underline;"> Web Developer and
                Designer.</span>
            <!--<span style="text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.623);">
                    <span style="background-color: #ff0000">Fr</span>
                    <span style="background-color: #ffffff">an</span>
                    <span style="background-color: #001aff">ce</span>.
                </span>
                -->
        </h1>
        <figure>
            <img id="header_img" src="img/Hand coding-rafiki.png">
            <figcaption></figcaption>
        </figure>
        <p>Together we will 🪄turn your <span style="font-weight: bolder; text-decoration: rgb(255, 211, 253) underline; font-size: 1em;">imagination🎩</span>
            into<span style="font-weight: bolder; text-decoration: rgb(255, 211, 253) underline;font-size: 1.5em;">
                reality🐇</span>.
        </p>
    </article>

    
</header>