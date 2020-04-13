<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

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
          <li class="active"><a href="/apply">Home</a></li>
          <li><a href="status.php">Application Status</a></li>
        </ul>
        <h3 class="text-muted">Apply</h3>
      </div>

      <!--div class="jumbotron">
        <h1>Apply</h1>
        <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
        <p><a class="btn btn-lg btn-success" href="#" role="button">Sign up today</a></p>
      </div-->

      <div class="row marketing">
			<form role="form" method="POST" action="thankyou.php">
			  <div class="form-group">
				<label for="name">Full Name</label>
				<input type="text" required class="form-control" name="name" id="name" placeholder="Type your CService Username in this box">
			  </div>
			  <div class="form-group">
				<label for="nick">Nickname</label>
				<input type="text" required class="form-control" name="nick" id="nick" placeholder="Type your NationCHAT Nickname in this box">
			  </div>
			  <div class="form-group">
				<label for="email">Email address</label>
				<input type="email" required class="form-control" name="email" id="email" placeholder="Type your email">
			  </div>
			  <div class="form-group">
				<label for="location">Location</label>
				<input type="text" required class="form-control" name="location" id="location" placeholder="Type your geographic location here">
			  </div>
			   <div class="checkbox">
			   <b style="margin-bottom: 4px; display: block;">According to your experience what do you think which position we should consider you for?</b>
				  <label>
				  <input type="radio" name="position" value="Trainee"> Trainee
				  </label>
				  <label>
				  <input type="radio" name="position" value="Representator"> Representator
				  </label>
				  <label>
				  <input type="radio" name="position" value="Administrator"> Administrator
				  </label>
				  <label>
				  <input type="radio" name="position" value="Senior Administrator"> Senior Administrator
				  </label>
			   </div>
			  <div class="form-group" name="position">
				<label for="ircxp">Tell us about your overall IRC experience</label>
				<textarea type="textarea" required class="form-control" name="ircxp" id="ircxp" placeholder="Type in details about your IRC experience e.g how old have you been on IRC etc."></textarea>
			  </div>
			  <div class="form-group">
				<label for="ircuxp">Do you have any experience with IRCU IRCD?</label>
				<textarea type="textarea" required class="form-control" name="ircuxp" id="ircuxp" placeholder="Type here about your ircu experience"></textarea>
			  </div>
			  <div class="form-group">
				<label for="gnuxp">Do you have any experience with GNUWorld Services OR Do you know what it is??</label>
				<textarea type="textarea" required class="form-control" name="gnuxp" id="gnuxp" placeholder="Type here about your gnuworld experience"></textarea>
			  </div>
			  <div class="form-group">
				<label for="eggxp">Do you have any experience with eggdrop bots?</label>
				<textarea type="textarea" required class="form-control" name="eggxp" id="eggxp" placeholder="Type here about your eggdrop experience"></textarea>
			  </div>
			  <div class="form-group">
				<label for="otherxp">Any other experience?</label>
				<textarea type="textarea" required class="form-control" name="otherxp" id="otherxp" placeholder="Tell us about any other computer related experience you have"></textarea>
			  </div>
			  <div class="form-group">
				<label for="message">Any Message:</label>
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
        <center<p>NationCHAT IRC Network - 2014</p></center>
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
