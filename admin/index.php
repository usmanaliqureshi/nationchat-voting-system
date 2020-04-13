<?php

// Session

session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);

include "conf/configuration.inc.php";
include "lib/functions.php";

if (isset($_SESSION['username'])) {
    header('Location: dashboard.php');
} else {

    $login = new process();
    $login->decide();

}
