<!-- navbar -->
<nav class="navbar navbar-expand-lg <?= (isset($_COOKIE['user']['mode']) && $_COOKIE['user']['mode'] === 'dark') ? 'bgdark' : 'bg-body-tertiary'?>">
        <div class="container-fluid">
            <a class="navbar-brand <?= (isset($_COOKIE['user']['mode']) && $_COOKIE['user']['mode'] === 'dark') ? 'text-white' : '' ?>" href="../accueil"><img src="../assets/img/news.png" class='me-4 ms-2' alt="">Accueil</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <?php
                    if (isset($_COOKIE['user']['flux'])) {
                        navbarlist(unserialize($_COOKIE['user']['flux']));
                    }
                    else {
                        $fluxdefault = ['actualites', 'culture', 'pixels'];
                        navbarlist($fluxdefault);
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>