<?php

/* configuration for mysql connection */

$MYSQL_Username = "";
$MYSQL_Password = "root";
$MYSQL_Database = "local";

/* establishing mysql connection */
$mysql = new mysqli(
    "localhost",
    $MYSQL_Username,
    $MYSQL_Password,
    $MYSQL_Database
);

/* checking successful connection */
if ($mysql->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}
