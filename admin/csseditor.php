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

    while ($epd = mysql_fetch_array($result)) {

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
			<?php
// set file to read
        $filename = "css/dash.css";

        $newdata = $_POST['newd'];

        if ($newdata != '') {

            // open file
            $fw = fopen($filename, 'w') or die('Could not open file!');

            // write to file
            // added stripslashes to $newdata
            $fb = fwrite($fw, stripslashes($newdata)) or die('Could not write to file');

            // close file
            fclose($fw);
        }

        // open file
        $fh = fopen($filename, "r") or die("Could not open file!");

        // read file contents
        $data = fread($fh, filesize($filename)) or die("Could not read file!");

        // close file
        fclose($fh);

        // print file contents
        echo "
			 <h3>Contents of File</h3>
			<form role='form' action='$_SERVER[php_self]?page=updated' method= 'post' >
			<div class='form-group'>
			<textarea name='newd' cols='100' class='form-control' rows='20'> $data </textarea>
			</div>
			<button type='submit' class='btn btn-primary'>Save</button>
			</form>";

        $page = $_POST["page"];
        if ($page == "updated") {
            echo "Page Updated Successfully.";
        }
        ?>
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