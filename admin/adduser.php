<?php

session_start();

$page = basename(__FILE__);

include("conf/configuration.inc.php");
include("lib/functions.php");

if (!isset($_SESSION['username'])) {
 header("Location: index.php");
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

		<?php include("nav.php"); ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Add New User / Member</h1>
			<form class="form-horizontal" role="form" method="POST" action="saveuser.php">
			<div class="form-group">
			<label for="name">Name
			<input type="text" class="form-control" required name="name" placeholder="Real Name"/></label>
			</div>
			<div class="form-group">
			<label for="name">Email
			<input type="text" class="form-control" required name="email" placeholder="Email"/></label>
			</div>
			<div class="form-group">
			<label for="name">Phone
			<input type="text" class="form-control" name="phone" placeholder="Phone"/></label>
			</div>
			<div class="form-group">
			<label for="name">Level
				<select class="form-control" required name="level">
					<option value="850">750</option>
					<option value="850">850</option>
					<option value="900">900</option>
					<option value="950">950</option>
					<option value="999">999</option>
					<option value="1000">1000</option>
					<option value="1250">1250</option>
					<option value="1300">1300</option>
					<option value="1400">1400</option>
					<option value="1500">1500</option>
				</select>
				</label>
			</div>
			<div class="form-group">
				<label>Username<br>
				<input class="form-control" required type="text" name="username" placeholder="Username"></label>
			</div>
			<div class="form-group">
			<label for="name">Password
			<input type="password" class="form-control" required name="password" placeholder="Password"/></label>
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

}

?>