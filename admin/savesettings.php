<?php

session_start();

include "conf/configuration.inc.php";

/* Variables posted by user */
$sitename = $_POST["sitename"];

/* Updating the variables into database */
$query = $mysql->query("UPDATE settings SET sitename = '$sitename' WHERE id = 1");

if ($query) {

    $mysql->close();

    header("Location: settings.php");

} else {

    die(mysql_error());

}
