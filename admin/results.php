<?php

session_start();

$page = basename(__FILE__);

include "conf/configuration.inc.php";
include "lib/functions.php";

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

    <title>Results - Voting System v1.0</title>

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
          <h1 class="page-header">Application Results</h1>
          <div class="table-responsive">
			  <?php
$applicants = "SELECT * FROM apps WHERE status='Pending'";
    $cquery = $mysql->query($applicants) or die("Error in query: $applicants " . mysql_error());
    //$allcans = mysql_fetch_array($cquery);
    while ($allcans = $cquery->fetch_array(MYSQLI_ASSOC)) {?>
            <table class="table table-striped table-apps">
              <thead>
			    <tr>
                  <th><?php echo $allcans['nick']; ?></th>
				  <th></th>
				  <th></th>
				  <th><button type="button" class="btn btn-primary" onclick="location.href='changestatus.php?status=pending&nick=<?php echo $allcans['nick']; ?>'">Pending</button>
				  <button type="button" class="btn btn-success" onclick="location.href='changestatus.php?status=accept&nick=<?php echo $allcans['nick']; ?>'">Accept</button>
				  <button type="button" class="btn btn-warning" onclick="location.href='changestatus.php?status=reject&nick=<?php echo $allcans['nick']; ?>'">Reject</button></th>
                </tr>
                <tr>
                  <th>Voter</th>
                  <th>Decision</th>
                  <th>Level</th>
                  <th>Reason</th>
                </tr>
              </thead>
              <tbody>
				<?php
$cand = $allcans['nick'];
        $votes = $mysql->query("SELECT * FROM votes WHERE candidate = '$cand' ORDER BY candidate");
        while ($votesdata = $votes->fetch_array(MYSQLI_ASSOC)) {?>
				<tr>
                  <td><?php echo $votesdata['voter']; ?></td>
                  <td><?php echo $votesdata['decision']; ?></td>
                  <td><?php echo $votesdata['level']; ?></td>
                  <td><?php echo $votesdata['reason']; ?></td>
                </tr>
				<?php }?>
              </tbody>
            </table>
				<?php }?>
          </div>
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

$mysql->close();

?>