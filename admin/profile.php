<?php

session_start();

$page = basename(__FILE__);

include "conf/configuration.inc.php";
include "lib/functions.php";

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
} else {

    $session = $_SESSION['username'];
    $result = $mysql->query("SELECT * FROM users WHERE username = '$session'");

    while ($epd = $result->fetch_array(MYSQLI_ASSOC)) {

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
          <h1 class="page-header">Profile</h1>
			<form class="form-horizontal" role="form" onsubmit="return validateForm()" method="POST" name="pbform">
			<div class="form-group">
				<label>Username<br>
				<input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $epd['username']; ?>" disabled></label>
			</div>
			<div class="form-group">
			<label for="name">Name:
			<input type="text" class="form-control" value="<?php echo $epd['name']; ?>" name="name" /></label>
			</div>
			<div class="form-group">
			<label for="name">Email:
			<input type="text" class="form-control" value="<?php echo $epd['email']; ?>" name="email" /></label>
			</div>
			<div class="form-group">
			<label for="name">Phone:
			<input type="text" class="form-control" value="<?php echo $epd['phone']; ?>" name="phone" /></label>
			</div>
			<div class="form-group">
			<label for="name">Current Password:
			<input type="password" class="form-control" name="currpass" /></label>
			</div>
			<button type="submit" class="btn btn-primary">Save</button>
			</form>
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

}

include 'conf/configuration.inc.php';

$name = $mysql->real_escape_string($_POST["name"]);
$email = $mysql->real_escape_string($_POST["email"]);
$phone = $mysql->real_escape_string($_POST["phone"]);
$currpass = $mysql->real_escape_string($_POST["currpass"]);
$session = $mysql->real_escape_string($_SESSION["username"]);

$login = $mysql->query("SELECT * FROM users WHERE (username = '" . $mysql->real_escape_string($session) . "') and (password = '" . $mysql->real_escape_string(md5($currpass)) . "')");

if (mysqli_num_rows($login) == 1) {

    if (isset($currpass)) {

        echo "Done";

        $query = $mysql->query("UPDATE users SET name = '$name',
						 email = '$email',
						 phone = '$phone'  WHERE username = '$session'");

        if ($query) {

            $mysql->close();

            Header("Location: profile.php");

        } else {

            echo "Couldn't Save the details" . mysqli_error();

        }

    } else {

        echo "Please enter your current password to continue";

    }
}

?>