<?php

function navbarlist($param)
{

    foreach ($param as $flux) {
        if ($flux === 'actualites') { ?>
            <li class="nav-item ">
                <a class="nav-link <?php if (isset($_COOKIE['user']['mode']) && $_COOKIE['user']['mode'] === 'dark') echo 'text-white' ?>" aria-current="page" href="../actualites">Actualités</a>
            </li>
        <?php
        } elseif ($flux === 'culture') { ?>
            <li class="nav-item">
                <a class="nav-link <?php if (isset($_COOKIE['user']['mode']) && $_COOKIE['user']['mode'] === 'dark') echo 'text-white' ?>" href="../culture">Culture</a>
            </li>
        <?php
        } elseif ($flux === 'pixels') { ?>
            <li class="nav-item">
                <a class="nav-link <?php if (isset($_COOKIE['user']['mode']) && $_COOKIE['user']['mode'] === 'dark') echo 'text-white' ?>" href="../pixels">Pixels</a>
            </li>
        <?php
        } elseif ($flux === 'economie') { ?>
            <li class="nav-item">
                <a class="nav-link <?php if (isset($_COOKIE['user']['mode']) && $_COOKIE['user']['mode'] === 'dark') echo 'text-white' ?>" href="../economie">Economie</a>
            </li>
        <?php
        } elseif ($flux === 'sport') { ?>
            <li class="nav-item">
                <a class="nav-link <?php if (isset($_COOKIE['user']['mode']) && $_COOKIE['user']['mode'] === 'dark') echo 'text-white' ?>" href="../sport">Sport</a>
            </li>
    <?php
        }
    } ?>
    <li class="nav-item">
        <a class="nav-link" href="../parametres"><img src=<?php if (isset($_COOKIE['user']['mode']) && $_COOKIE['user']['mode'] === 'dark') echo '../assets/img/adjustWhite.png';
                                                            else echo '../assets/img/adjust.png' ?> alt=""></a>
    </li>
    <?php
}

function rss_reader($rss_feed) // Fonction qui prend en paramètre l'URL du flux RSS et qui affiche les articles
{

    if (isset($_COOKIE['user']['article'])) {
        $numbers = [6, 9, 12];
        $numberstring = ['six', 'nine', 'twelve'];
        $_COOKIE['user']['article'] = str_replace($numberstring, $numbers, $_COOKIE['user']['article']);
        $maxarticle = $_COOKIE['user']['article'];
    } else {
        $maxarticle = 6;
    }

    $rss = simplexml_load_file($rss_feed);
    $i = 1;

    foreach ($rss->channel->item as $item) {
        if ($i <= $maxarticle) {
            $i++;

            if ($rss->channel->link == 'https://www.lemonde.fr/rss/une.xml') {
                preg_match('/media:content url="(.*)" width/', $item->asXML(), $matches);
                $photo_url = $matches[1];
                $originalDate = $item->pubDate;
                $newDate = date('d/m/Y H:i', strtotime($originalDate));

                echo '
            <div class="container mx-auto">
            <div class="row actus my-2 mx-0">

                <div class="actus-img col-12 col-lg-4"><img src="' . $photo_url . '" alt=""></div>
                <div class="actus-article col-12 col-lg-8 mt-3">
                <p class="text-center"> <a class="title" href="' . $item->link . '" target="_blank">' . $item->title . '</a></p>
                    <p class="date text-center">' . $newDate . '</p>
                    <button type="button" class="btn-actualites btn btn-primary mb-2 " data-bs-toggle="modal" data-bs-target="#modal'.$i.'">
                    Voir plus
                    </button>
            </div>
        </div>
        </div>
        <hr>


        <!-- Modal -->
<div class="modal fade" id="modal'.$i.'" tabindex="-1" aria-labelledby="modal'.$i.'Label" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">

<div class="modal-title fs-5" id="modal'.$i.'Label"><img class="w-100 cover" src="' . $photo_url . '" alt=""></div>

</div>
<div class="modal-body text-black">
' . $item->description . '
</div>
<div class="modal-footer">
<button type="button" class="btn btn-actualites" data-bs-dismiss="modal"><a class="modalink-actualites" href="' . $item->link . '" target="_blank">Voir article</a></button>

</div>
</div>
</div>
</div>
        ';
            } elseif ($rss->channel->link == 'https://www.lemonde.fr/culture/rss_full.xml') {
                preg_match('/media:content url="(.*)" width/', $item->asXML(), $matches);
                $photo_url = $matches[1];
                $originalDate = $item->pubDate;
                $newDate = date('d/m/Y H:i', strtotime($originalDate));
                echo '
                <div class="container mx-auto">
                <div class="row culture my-2 mx-0">

                    <div class="actus-img col-12 col-lg-4"><img src="' . $photo_url . '" alt=""></div>
                    <div class="actus-article col-12 col-lg-8 mt-3">
                    <p class="text-center"> <a class="title" href="' . $item->link . '" target="_blank">' . $item->title . '</a></p>
                        <p class="date text-center">' . $newDate . '</p>
                        <button type="button" class="btn-culture btn btn-primary mb-2 " data-bs-toggle="modal" data-bs-target="#modal'.$i.'">
                            Voir plus
                            </button>
                    </div>
                </div>
                </div>
                <hr>


                <!-- Modal -->
<div class="modal fade" id="modal'.$i.'" tabindex="-1" aria-labelledby="modal'.$i.'Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
    
        <div class="modal-title fs-5" id="modal'.$i.'Label"><img class="w-100 cover" src="' . $photo_url . '" alt=""></div>
       
      </div>
      <div class="modal-body text-black">
        ' . $item->description . '
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-culture" data-bs-dismiss="modal"><a class="modalink-culture" href="' . $item->link . '" target="_blank">Voir article</a></button>

      </div>
    </div>
  </div>
</div>
                ';
            } elseif ($rss->channel->link == 'https://www.lemonde.fr/pixels/rss_full.xml') {
                preg_match('/media:content url="(.*)" width/', $item->asXML(), $matches);
                $photo_url = $matches[1];
                $originalDate = $item->pubDate;
                $newDate = date('d/m/Y H:i', strtotime($originalDate));
                echo '
                <div class="container mx-auto">
                <div class="row pixels my-2 mx-0">

                    <div class="actus-img col-12 col-lg-4"><img src="' . $photo_url . '" alt=""></div>
                    <div class="actus-article col-12 col-lg-8 mt-3">
                    <p class="text-center"> <a class="title" href="' . $item->link . '" target="_blank">' . $item->title . '</a></p>
                        <p class="date text-center">' . $newDate . '</p>
                        <button type="button" class=" btn-pixels btn btn-primary mb-2 " data-bs-toggle="modal" data-bs-target="#modal'.$i.'">
                        Voir plus
                        </button>
                </div>
            </div>
            </div>
            <hr>


            <!-- Modal -->
<div class="modal fade" id="modal'.$i.'" tabindex="-1" aria-labelledby="modal'.$i.'Label" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header">

    <div class="modal-title fs-5" id="modal'.$i.'Label"><img class="w-100 cover" src="' . $photo_url . '" alt=""></div>
   
  </div>
  <div class="modal-body text-black">
    ' . $item->description . '
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-pixels" data-bs-dismiss="modal"><a class="modalink-pixels" href="' . $item->link . '" target="_blank">Voir article</a></button>

  </div>
</div>
</div>
</div>
            ';
            } elseif ($rss->channel->link == 'https://www.lemonde.fr/economie/rss_full.xml') {
                preg_match('/media:content url="(.*)" width/', $item->asXML(), $matches);
                $photo_url = $matches[1];
                $originalDate = $item->pubDate;
                $newDate = date('d/m/Y H:i', strtotime($originalDate));
                echo '
                <div class="container mx-auto">
                <div class="row economie my-2 mx-0">

                    <div class="actus-img col-12 col-lg-4"><img src="' . $photo_url . '" alt=""></div>
                    <div class="actus-article col-12 col-lg-8 mt-3">
                    <p class="text-center"> <a class="title" href="' . $item->link . '" target="_blank">' . $item->title . '</a></p>
                        <p class="date text-center">' . $newDate . '</p>
                        <button type="button" class="btn-economie btn btn-primary mb-2 " data-bs-toggle="modal" data-bs-target="#modal'.$i.'">
                        Voir plus
                        </button>
                </div>
            </div>
            </div>
            <hr>


            <!-- Modal -->
<div class="modal fade" id="modal'.$i.'" tabindex="-1" aria-labelledby="modal'.$i.'Label" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header">

    <div class="modal-title fs-5" id="modal'.$i.'Label"><img class="w-100 cover" src="' . $photo_url . '" alt=""></div>
   
  </div>
  <div class="modal-body text-black">
    ' . $item->description . '
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-economie" data-bs-dismiss="modal"><a class="modalink-economie" href="' . $item->link . '" target="_blank">Voir article</a></button>

  </div>
</div>
</div>
</div>
            ';
            } elseif ($rss->channel->link == 'https://www.lemonde.fr/sport/rss_full.xml') {
                preg_match('/media:content url="(.*)" width/', $item->asXML(), $matches);
                $photo_url = $matches[1];
                $originalDate = $item->pubDate;
                $newDate = date('d/m/Y H:i', strtotime($originalDate));

                echo '
                <div class="container mx-auto">
                <div class="row sport my-2 mx-0">

                    <div class="actus-img col-12 col-lg-4"><img src="' . $photo_url . '" alt=""></div>
                    <div class="actus-article col-12 col-lg-8 mt-3">
                    <p class="text-center"> <a class="title" href="' . $item->link . '" target="_blank">' . $item->title . '</a></p>
                        <p class="date text-center">' . $newDate . '</p>
                        <button type="button" class="btn-sport btn btn-primary mb-2 " data-bs-toggle="modal" data-bs-target="#modal'.$i.'">
                        Voir plus
                        </button>
                </div>
            </div>
            </div>
            <hr>


            <!-- Modal -->
<div class="modal fade" id="modal'.$i.'" tabindex="-1" aria-labelledby="modal'.$i.'Label" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header">

    <div class="modal-title fs-5" id="modal'.$i.'Label"><img class="w-100 cover" src="' . $photo_url . '" alt=""></div>
   
  </div>
  <div class="modal-body text-black">
    ' . $item->description . '
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-sport" data-bs-dismiss="modal"><a class="modalink-sport" href="' . $item->link . '" target="_blank">Voir article</a></button>

  </div>
</div>
</div>
</div>
            ';
            } else {
                break;
            }
        }
    }
}

function displaycategory($param)
{

    foreach ($param as $flux) {
        if ($flux === 'actualites') { ?>
            <h2 class="actus-title text-center text-white bg-dark rounded my-5 w-50 mx-auto" id="actualites">Actualités</h2>
        <?php
            rss_reader('https://www.lemonde.fr/rss/une.xml');
        } elseif ($flux === 'culture') { ?>
            <h2 class="culture-title text-center text-white bg-dark rounded my-5 w-50 mx-auto" id="actualites">Culture</h2>
        <?php
            rss_reader('https://www.lemonde.fr/culture/rss_full.xml');
        } elseif ($flux === 'pixels') { ?>
            <h2 class="pixels-title text-center text-white bg-dark rounded my-5 w-50 mx-auto" id="actualites">Pixels</h2>
        <?php
            rss_reader('https://www.lemonde.fr/pixels/rss_full.xml');
        } elseif ($flux === 'economie') { ?>
            <h2 class="economie-title text-center text-white bg-dark rounded my-5 w-50 mx-auto" id="actualites">Economie</h2>
        <?php
            rss_reader('https://www.lemonde.fr/economie/rss_full.xml');
        } elseif ($flux === 'sport') { ?>
            <h2 class="sport-title text-center text-white bg-dark rounded my-5 w-50 mx-auto" id="actualites">Sport</h2>
<?php
            rss_reader('https://www.lemonde.fr/sport/rss_full.xml');
        } elseif (empty($param)) {
            echo 'Aucun flux RSS sélectionné';
        } else {
            header('Location: ../404.php');
        }
    }
}

function displayhome($param)
{
    if (isset($_COOKIE['user']['article'])) {
        $numbers = [6, 9, 12];
        $numberstring = ['six', 'nine', 'twelve'];
        $_COOKIE['user']['article'] = str_replace($numberstring, $numbers, $_COOKIE['user']['article']);
        $maxarticle = $_COOKIE['user']['article'];
    } else {
        $maxarticle = 6;
    }

    $flux1 = [
        'actualites' => 'https://www.lemonde.fr/rss/une.xml'
    ];
    $flux2 = [
        'culture' => 'https://www.lemonde.fr/culture/rss_full.xml'
    ];
    $flux3 = [
        'pixels' => 'https://www.lemonde.fr/pixels/rss_full.xml'
    ];
    $flux4 = [
        'economie' => 'https://www.lemonde.fr/economie/rss_full.xml'
    ];
    $flux5 = [
        'sport' => 'https://www.lemonde.fr/sport/rss_full.xml'
    ];

    $allflux = $flux1 + $flux2 + $flux3 + $flux4 + $flux5;

    //Associe les adresses des flux RSS aux catégories de $param
    $flux = array_intersect_key($allflux, array_flip($param));

    $homeflux = [];

    foreach ($flux as $value) {
        $rss = simplexml_load_file($value);
        foreach ($rss->channel->item as $item) {
            $homeflux[] = $item;
        }
    }

    //Trie les articles par date
    usort($homeflux, function ($a, $b) {
        return strtotime($b->pubDate) - strtotime($a->pubDate);
    });

    $i = 1;
    $testdate = [];

    foreach ($homeflux as $item) {
        if ($i <= $maxarticle) {

            $originalDate = $item->pubDate;
            $newDate = date('d/m/Y H:i', strtotime($originalDate));
            preg_match('/media:content url="(.*)" width/', $item->asXML(), $matches);
            $photo_url = $matches[1];

            if (in_array($newDate, $testdate)) {
                continue;
            }

            array_push($testdate, $newDate);
            $i++;

            $searchcategory = explode('/', $item->link);
            $category = $searchcategory[3];
            $categorycolorarray = ['actualites' => '#FF0000', 'culture' => 'green', 'pixels' => 'blueviolet', 'economie' => '#0000FF', 'sport' => 'orange'];

            //Vérifie si la catégorie est dans le tableau
            if (array_key_exists($category, $categorycolorarray)) {
                $categorycolor = $categorycolorarray[$category];
            } else {
                $categorycolor = 'purple';
                $category = 'other';
            }
            if (isset($_COOKIE['user']['mode'])) {
                if ($_COOKIE['user']['mode'] === 'light') {
                    $background = '#f5f5f5';
                } else {
                    $background = '#444';
                }
            } else {
                $background = '#f5f5f5';
            }


            echo '
            <div class="container mx-auto">
            <div class="row my-2 mx-0" style="color: #f5f5f5; background-color: ' . $background . ' ; height: auto; border-left : solid 5px ' . $categorycolor . ';">

                <div class="actus-img col-12 col-lg-4"><img class="imgArticle" src="' . $photo_url . '" alt=""></div>
                <div class="actus-article col-12 col-lg-8">
                <p class="text-center"> <a class="title" href="' . $item->link . '" target="_blank">' . $item->title . '</a></p>
                    <p class="date text-center">' . $newDate . '</p>
                    <button type="button" class="btn-'.$category.' btn btn-primary mb-2 " data-bs-toggle="modal" data-bs-target="#modal'.$i.'">
                    Voir plus
                    </button>
            </div>
            </div>
            </div>
            <hr>


            <!-- Modal -->
            <div class="modal fade" id="modal'.$i.'" tabindex="-1" aria-labelledby="#modal'.$i.'Label" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">

            <div class="modal-title fs-5" id="#modal'.$i.'Label"><img class="w-100 cover" src="' . $photo_url . '" alt=""></div>

            </div>
            <div class="modal-body text-black">
            ' . $item->description . '
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-'.$category.' " data-bs-dismiss="modal"><a class="modalink-'.$category.'" href="' . $item->link . '" target="_blank">Voir article</a></button>

            </div>
            </div>
            </div>
            </div>
            ';
        }
    }
}

?>