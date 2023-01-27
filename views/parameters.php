<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/img/news-paper.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/style/<?= $mode ?>.css">
    <title>Parametres</title>
</head>

<body>
    <div class="container">
        <div class="row my-3">
            <a href="../accueil" class="col-12"><img class="arrow my-3" src="../assets/img/arrow.png" alt=""></a>
            <h1 class="text-center col-12 my-3">Paramètres</h1>
        </div>

        

        <form class="text-center mt-2" method='POST' action=''>

            <fieldset>
                <legend>Veuillez choisir 3 flux à suivre</legend>

                <input class="me-2" type="checkbox" name="flux1" value="actualites" id="actualites" <?php if (isset($_COOKIE['user']['flux']) && str_contains($_COOKIE['user']['flux'], 'actualites')) echo 'checked' ?>><label for='actualites'> Actualités </label><br>
                <input class="me-2" type="checkbox" name="flux2" value="economie" id="economie" <?php if (isset($_COOKIE['user']['flux']) && str_contains($_COOKIE['user']['flux'], 'economie')) echo 'checked' ?>><label for='economie'> Economie </label><br>
                <input class="me-2" type="checkbox" name="flux3" value="culture" id="culture" <?php if (isset($_COOKIE['user']['flux']) && str_contains($_COOKIE['user']['flux'], 'culture')) echo 'checked' ?>><label for='culture'> Culture </label><br>
                <input class="me-2" type="checkbox" name="flux4" value="sport" id="sport" <?php if (isset($_COOKIE['user']['flux']) && str_contains($_COOKIE['user']['flux'], 'sport')) echo 'checked' ?>><label for='sport'> Sport </label><br>
                <input class="me-2" type="checkbox" name="flux5" value="pixels" id="pixels" <?php if (isset($_COOKIE['user']['flux']) && str_contains($_COOKIE['user']['flux'], 'pixels')) echo 'checked' ?>><label for='pixels'> Pixels </label><br>

                <input class="mt-2 rounded-5 w-25" type="submit" name='input1' value="Choisir">
            </fieldset>
        </form>

        <form class="text-center mt-2" method='POST' action=''>

            <fieldset>
                <legend>Choisir votre mode d'affichage</legend>

                <input class="me-2" type="radio" name="mode" value="light" id="light" <?php if (isset($_COOKIE['user']['mode']) && ($_COOKIE['user']['mode'] === 'light'))  echo 'checked' ?>><label for="light"> Affichage clair </label><br>
                <input class="me-2" type="radio" name="mode" value="dark" id="dark" <?php if (isset($_COOKIE['user']['mode']) && ($_COOKIE['user']['mode'] === 'dark'))  echo 'checked' ?>><label for="dark"> Affichage sombre </label><br>

                <input class="mt-2 rounded-5 w-25" type="submit" name='input2' value="Choisir">
            </fieldset>
        </form>

        <form class="text-center mt-2" method='POST' action=''>

            <fieldset>
                <legend>Nombre d'articles affichés par page</legend>

                <input class="me-2" type="radio" name="article" value="six" id="six" <?php if (isset($_COOKIE['user']['article']) && ($_COOKIE['user']['article'] === 'six')) echo 'checked' ?>><label for="six"> 6 articles / pages </label><br>
                <input class="me-2" type="radio" name="article" value="nine" id="nine" <?php if (isset($_COOKIE['user']['article']) && ($_COOKIE['user']['article'] === 'nine')) echo 'checked' ?>><label for="nine"> 9 articles / pages </label><br>
                <input class="me-2" type="radio" name="article" value="twelve" id="twelve" <?php if (isset($_COOKIE['user']['article']) && ($_COOKIE['user']['article'] === 'twelve')) echo 'checked' ?>><label for="twelve"> 12 articles / pages </label><br>

                <input class="mt-2 rounded-5 w-25" type="submit" name='input3' value="Choisir">
            </fieldset>
        </form>
    </div>

</body>

</html>