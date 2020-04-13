<?php

include "admin/conf/configuration.inc.php";

/* Variables posted by user */
$name = $mysql->real_escape_string($_POST["realname"]);
$xuser = $mysql->real_escape_string($_POST["name"]);
$nick = $mysql->real_escape_string($_POST["nick"]);
$email = $mysql->real_escape_string($_POST["email"]);
$age = $mysql->real_escape_string($_POST["age"]);
$location = $mysql->real_escape_string($_POST["location"]);
$contribution = implode(",", $_POST["contribution"]);
$position = "Helper";
$ircxp = $mysql->real_escape_string($_POST["ircxp"]);
$ircuxp = $mysql->real_escape_string($_POST["ircuxp"]);
$gnuxp = $mysql->real_escape_string($_POST["gnuxp"]);
$eggxp = $mysql->real_escape_string($_POST["eggxp"]);
$otherxp = $mysql->real_escape_string($_POST["otherxp"]);
$message = $mysql->real_escape_string($_POST["message"]);
$status = "Pending";

/* Picture Upload */

$target_dir = "/home3/usmanali/public_html/nationchat.org/apply/content/uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $GLOBALS['photo'] = "http://www.nationchat.org/apply/content/uploads/" . basename($_FILES["fileToUpload"]["name"]);
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

/* Saving the application into database */
$query = $mysql->query("INSERT INTO apps (
name,
xuser,
nick,
email,
age,
location,
contribution,
positionfor,
ircxp,
ircu,
gnuworld,
eggdrop,
otherxp,
message,
photo,
status)
 VALUES (
 '$name',
 '$xuser',
 '$nick',
 '$email',
 '$age',
 '$location',
 '$contribution',
 '$position',
 '$ircxp',
 '$ircuxp',
 '$gnuxp',
 '$eggxp',
 '$otherxp',
 '$message',
 '$photo',
 '$status'
)");

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
        <div class="col-sm-12 col-md-12 main">
          <center><h1 class="page-header">Application Submitted</h1></center>
			<div class="alert alert-success" role="alert">Dear <b><?php echo $nick; ?></b> Thank you for your interest for being a part of NationCHAT IRC Network.</div>
			<center><button type="button" class="btn btn-primary" onclick="location.href='status.php'">Check Application Status</button></center>
        </div>
      </div>

      <div class="footer">
        <center<p>NationCHAT IRC Network: 2014 - 2015</p></center>
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

}

?>