<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/img/news.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/style/<?= $mode ?>.css">
    <title>Lecteur de flux RSS</title>
</head>

<body>


    <!-- carousel -->
    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="imgCarousel1" src="" class="d-block w-100" alt="...">
                <div class="linkCarousel">
                    <a class="linkCarousel1" href=""></a> 
                </div>
            </div>
            <div class="carousel-item">
                <img class="imgCarousel2" src="../assets/img/businessman-g04317133a_640.jpg" class="d-block w-100" alt="...">
                <div class="linkCarousel">
                    <a class="linkCarousel2" href=""></a> 
                </div>
            </div>
            <div class="carousel-item">
                <img class="imgCarousel3" src="../assets/img/scroll-g51098b7fc_640.jpg" class="d-block w-100" alt="...">
                <div class="linkCarousel">
                    <a class="linkCarousel3" href=""></a> 
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <?php

    include('../views/includes/navbar.php');

    if (isset($_COOKIE['user']['flux'])) {
        displayhome(unserialize($_COOKIE['user']['flux']));
    } else {
        $fluxdefault = ['actualites', 'culture', 'pixels'];
        displayhome($fluxdefault);
    }

    ?>
    <footer>
        <p class="mb-0 text-center">© 2023 </p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="assets/script/script.js"></script>
</body>

</html>