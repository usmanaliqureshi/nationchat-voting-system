<?php

include "admin/conf/configuration.inc.php";

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

    <title>Apply for Official Position - NationCHAT IRC Network</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/jumbo.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <div class="container">
      <div class="header">
        <ul class="nav nav-pills pull-right">
          <li><a href="index.php">Home</a></li>
          <li class="active"><a href="status.php">Application Status</a></li>
          <li><a href="http://<?php echo $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']); ?>/admin/index.php">Login</a></li>
        </ul>
        <h3 class="text-muted">Applications</h3>
      </div>

      <!--div class="jumbotron">
        <h1>Apply</h1>
        <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
        <p><a class="btn btn-lg btn-success" href="#" role="button">Sign up today</a></p>
      </div-->

      <div class="row marketing">
        <div class="col-sm-12 col-md-12 main">
          <center><h1 class="page-header">Application Status</h1></center>
          <div class="table-responsive">
            <table class="table table-striped table-apps">
              <thead>
                <tr>
                  <th>Name</th>
				  <th>Username</th>
                  <th>Nick</th>
                  <th>Location</th>
				  <th>Applied For</th>
				  <th>Status</th>
                </tr>
              </thead>
              <tbody>
			  <?php
$apps = $mysql->query("SELECT * FROM apps");
while ($appdata = $apps->fetch_array(MYSQLI_ASSOC)) {?>
                <tr>
                  <td><?php echo $appdata['name']; ?></td>
				  <td><?php echo $appdata['xuser']; ?></td>
                  <td><?php echo $appdata['nick']; ?></td>
                  <td><?php echo $appdata['location']; ?></td>
                  <td><?php echo $appdata['positionfor']; ?></td>
				  <td><?php echo $appdata['status']; ?></td>
                </tr>
				<?php }?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="footer">
        <center><p>NationCHAT IRC Network: 2014 - 2015</p></center>
      </div>

    </div> <!-- /container -->


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

?>