<?php

$mode = (isset($_COOKIE['user']['mode'])) ? $_COOKIE['user']['mode'] : 'light';

require_once('../helpers/helpers.php');

include('../views/pages.php');
?>