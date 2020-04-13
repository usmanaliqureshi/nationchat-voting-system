<?php

session_start();

$page = basename(__FILE__);

include "conf/configuration.inc.php";

/* Variables posted by user */
$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$password = md5($_POST["password"]);
$user = $_POST["username"];
$level = $_POST["level"];

/* Saving the variables into database */
$query = $mysql->query("INSERT INTO users
					(username, password, level, name, email, phone, status)
					VALUES
					('$user', '$password', '$level', '$name', '$email', '$phone', 'active')");

$reset = $mysql->query("ALTER TABLE `users` DROP `id`;");
$reset1 = $mysql->query("ALTER TABLE `users` AUTO_INCREMENT = 1;");
$reset2 = $mysql->query("ALTER TABLE `users` ADD `id` int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST;");

if (!$query) {

    die(mysqli_error());

} else {

    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Dashboard - Voting System v1.0</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dash.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
		<?php include "nav.php";?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Add New User / Member</h1>
			<div class="alert alert-success" role="alert">New User <b><?php echo $user; ?></b> (<b><?php echo $email; ?></b>) Added Successfully</div>
			<button type="button" class="btn btn-primary" onclick="location.href='adduser.php'">Back</button>
			<button type="button" class="btn btn-primary" onclick="location.href='members.php'">Members</button>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
  </body>
</html>
<?php

    $mysql->close();

}

?>