<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

include "admin/conf/configuration.inc.php";

$page = basename(__FILE__);

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
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="status.php">Application Status</a></li>
		  <li><a href="http://<?php echo $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']); ?>/admin/index.php">Login</a></li>
        </ul>
        <h3 class="text-muted">Apply</h3>
      </div>

      <!--div class="jumbotron">
        <h1>Apply</h1>
        <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
        <p><a class="btn btn-lg btn-success" href="#" role="button">Sign up today</a></p>
      </div-->

      <div class="row marketing">
			<form role="form" method="POST" action="thankyou.php" enctype="multipart/form-data">
			  <div class="form-group">
				<label for="name">Name:</label>
				<input type="text" required class="form-control" name="realname" id="realname" placeholder="Type your Real name">
			  </div>
			  <div class="form-group">
				<label for="name">X Username</label>
				<input type="text" required class="form-control" name="name" id="name" placeholder="Type your CService Username">
			  </div>
			  <div class="form-group">
				<label for="nick">Nickname</label>
				<input type="text" required class="form-control" name="nick" id="nick" placeholder="Type your NationCHAT Nickname">
			  </div>
			  <div class="form-group">
				<label for="email">Email address</label>
				<input type="email" required class="form-control" name="email" id="email" placeholder="Type your email">
			  </div>
			  <div class="form-group">
				<label for="email">Age</label>
				<input type="number" required class="form-control" name="age" id="age" placeholder="Type your Age">
			  </div>
			  <div class="form-group">
				<label for="location">Location</label>
				<input type="text" required class="form-control" name="location" id="location" placeholder="Type your geographic location here">
			  </div>
			  <div class="form-group">
				<label for="location">Picture</label>
				<input type="file" class="form-control" name="fileToUpload" id="fileToUpload" placeholder="Upload Photo">
			  </div>
			   <div class="checkbox">
			   <b style="margin-bottom: 4px; display: block;">In which section(s) do you think you can contribute?</b>
				  <label>
				  <input type="checkbox" name="contribution[]" value="Services Development / Customization"> Services Development / Customization
				  </label><br>
				  <label>
				  <input type="checkbox" name="contribution[]" value="Website Maintenance / Modifications"> Website Maintenance / Modifications
				  </label><br>
				  <label>
				  <input type="checkbox" name="contribution[]" value="News, Forum & Events Calendar Editor"> News, Forum & Events Calendar Editor
				  </label><br>
				  <label>
				  <input type="checkbox" name="contribution[]" value="User Help (#Help)"> User Help (#Help)
				  </label><br>
				  <label>
				  <input type="checkbox" name="contribution[]" value="BNC / ZNC Support (#NationBNC)"> BNC / ZNC Support (#NationBNC)
				  </label>
			   </div>
			  <div class="form-group" name="position">
				<label for="ircxp">Tell us about your overall IRC experience</label>
				<textarea type="textarea" required class="form-control" name="ircxp" id="ircxp" placeholder="Type in details about your IRC experience e.g how old have you been on IRC etc."></textarea>
			  </div>
			  <div class="form-group">
				<label for="ircuxp">Do you have any experience with Nefarious2 IRCD?</label>
				<textarea type="textarea" required class="form-control" name="ircuxp" id="ircuxp" placeholder="Type here about your nefarious2 experience"></textarea>
			  </div>
			  <div class="form-group">
				<label for="gnuxp">Do you have any experience with GNUWorld Services OR Do you know what it is?</label>
				<textarea type="textarea" required class="form-control" name="gnuxp" id="gnuxp" placeholder="Type here about your gnuworld experience"></textarea>
			  </div>
			  <div class="form-group">
				<label for="eggxp">Do you have any experience with eggdrop bots?</label>
				<textarea type="textarea" required class="form-control" name="eggxp" id="eggxp" placeholder="Type here about your eggdrop experience"></textarea>
			  </div>
			  <div class="form-group">
				<label for="otherxp">Any other experience?</label>
				<textarea type="textarea" required class="form-control" name="otherxp" id="otherxp" placeholder="Tell us about any other IT related experience you have"></textarea>
			  </div>
			  <div class="form-group">
				<label for="message">Message</label>
				<textarea type="textarea" required class="form-control" name="message" id="message" placeholder="You can write any message to our crew in this box"></textarea>
			  </div>
			  <!--div class="form-group">
				<label for="exampleInputPassword1">Password</label>
				<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
			  </div>
			  <div class="form-group">
				<label for="exampleInputFile">File input</label>
				<input type="file" id="exampleInputFile">
				<p class="help-block">Example block-level help text here.</p>
			  </div-->
			  <button type="submit" class="btn btn-primary">Submit</button>
			</form>
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
