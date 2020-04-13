<?php

session_start();

$page = basename(__FILE__);

$account = $_GET["acc"];
$action = $_GET["action"];

include "conf/configuration.inc.php";

if ($action == "inactive") {

    $suspend = $mysql->query("UPDATE users SET status='In-Active' WHERE username='$account'");

    header("Location: members.php");

} elseif ($action == "deleteuser") {

    $delete = $mysql->query("DELETE FROM users WHERE username='$account'");

    $reset = $mysql->query("ALTER TABLE `users` DROP `id`;");
    $reset1 = $mysql->query("ALTER TABLE `users` AUTO_INCREMENT = 1;");
    $reset2 = $mysql->query("ALTER TABLE `users` ADD `id` int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST;");

    header("Location: members.php");

} elseif ($action == "active") {

    $creditkr = $mysql->query("UPDATE users SET status='Active' WHERE username='$account'");

    header("Location: members.php");

}

$mysql->close();
