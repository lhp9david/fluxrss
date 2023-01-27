<?php

if (isset($_COOKIE['user']['mode'])) {
    $mode = $_COOKIE['user']['mode'];
}
else {
    $mode = 'light';
}

require_once('../helpers/helpers.php');

include('../views/pages.php');
?>