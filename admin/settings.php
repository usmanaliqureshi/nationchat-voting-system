<?php

session_start();

$page = basename(__FILE__);

include "conf/configuration.inc.php";
include "lib/functions.php";

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
} else {

    $session = $_SESSION['username'];

    $result = $mysql->query("SELECT * FROM settings");

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
          <h1 class="page-header">Settings</h1>
			<form role="form" action="savesettings.php" method="POST" name="pbform">
			<div class="form-group">
			<label for="sitename">Site Name:
			<input type="text" size="50" class="form-control" value="<?php echo $epd['sitename']; ?>" name="sitename" /></label>
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

?>