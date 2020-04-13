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
          <h1 class="page-header">Pending Applications</h1>
          <div class="table-responsive">
            <table class="table table-striped table-apps">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Nick</th>
                  <th>Email</th>
                  <th>Location</th>
				  <th>Applied For</th>
				  <th>Status</th>
				  <th>Action</th>
                </tr>
              </thead>
              <tbody>
			  <?php
$apps = $mysql->query("SELECT * FROM apps WHERE status = 'Pending'");
    while ($appdata = $apps->fetch_array(MYSQLI_ASSOC)) {?>
                <tr>
				  <td><?php echo $appdata['id']; ?></td>
                  <td><?php echo $appdata['name']; ?></td>
                  <td><?php echo $appdata['nick']; ?></td>
                  <td><?php echo $appdata['email']; ?></td>
                  <td><?php echo $appdata['location']; ?></td>
                  <td><?php echo $appdata['positionfor']; ?></td>
				  <td><?php echo $appdata['status']; ?></td>
				  <td><button type="button" class="btn btn-primary" onclick="location.href='viewapp.php?nick=<?php echo $appdata['nick']; ?>'">View</button></td>
                </tr>
				<?php }?>
              </tbody>
            </table>
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