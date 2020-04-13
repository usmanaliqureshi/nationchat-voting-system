<?php

session_start();

include "conf/configuration.inc.php";

$page = basename(__FILE__);

/* Variables posted by user */
$voter = $mysql->real_escape_string($_POST["voter"]);
$candidate = $mysql->real_escape_string($_POST["candidate"]);
$decision = $mysql->real_escape_string($_POST["decision"]);
$level = $mysql->real_escape_string($_POST["level"]);
$about = $mysql->real_escape_string($_POST["about"]);

/* Saving the variables into database */
$query = $mysql->query("INSERT INTO votes
					(voter, candidate, decision, level, reason)
					VALUES
					('$voter', '$candidate', '$decision', '$level', '$about')");

if (!$query) {

    die(mysql_error());

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
          <h1 class="page-header">Voting</h1>
			<div class="alert alert-success" role="alert">Your vote for <b><?php echo $candidate; ?></b> has been recorded successfully</div>
			<button type="button" class="btn btn-primary" onclick="location.href='allapps.php'">Applications</button>
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