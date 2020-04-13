<?php

session_start();

$page = basename(__FILE__);

$nick = $_GET["nick"];

include "conf/configuration.inc.php";
include "lib/functions.php";

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
} else {
    $apps = $mysql->query("SELECT * FROM apps WHERE nick='$nick'");
    while ($appdata = $apps->fetch_array(MYSQLI_ASSOC)) {

        ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1">
    <meta name="description" content="">
    <meta name="autdor" content="">
    <link rel="icon" href="favicon.ico">

    <title>Dashboard - Voting System v1.5</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for tdis template -->
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
          <center><h1 class="page-header">Application of <?php echo $appdata['nick']; ?> (<?php echo $appdata['name']; ?>)</h1></center>
			<table class="table table-striped table-view-apps">
              <tbody>
                <tr><td class="tabhead">App ID:</td>
				<td><?php echo $appdata['id']; ?></td></tr>
                <tr><td class="tabhead">Name:</td>
                <td><?php echo $appdata['name']; ?></td></tr>
				<tr><td class="tabhead">X Username:</td>
                <td><?php echo $appdata['xuser']; ?></td></tr>
                <tr><td class="tabhead">Nick:</td>
				<td><?php echo $appdata['nick']; ?></td></tr>
                <tr><td class="tabhead">Age:</td>
				<td><?php echo $appdata['age']; ?></td></tr>
                <tr><td class="tabhead">Email:</td>
				<td><?php echo $appdata['email']; ?></td></tr>
                <tr><td class="tabhead">Location:</td>
				<td><?php echo $appdata['location']; ?></td></tr>
                <tr><td class="tabhead"><?php echo $appdata['name']; ?>'s Picture:</td>
				<td><a href="<?php echo $appdata['photo']; ?>" target="_blank">Click here to see</a></td></tr>
                <tr><td colspan="2" class="tabhead">In which section(s) do you think you can contribute?:</td></tr>
				<tr><td colspan="2"><?php echo $appdata['contribution']; ?></td></tr>
				<tr><td colspan="2" class="tabhead">Overall IRC Experience?</td></tr>
				<tr><td colspan="2"><?php if (empty($appdata['ircxp'])) {echo "No answer submitted";} else {echo $appdata['ircxp'];}?></td></tr>
				<tr><td colspan="2" class="tabhead">Do you have any experience with Nefarious?</td></tr>
				<tr><td colspan="2"><?php if (empty($appdata['ircu'])) {echo "No answer submitted";} else {echo $appdata['ircu'];}?></td></tr>
				<tr><td colspan="2" class="tabhead">Do you have any experience with GNUWorld Channel Services?</td></tr>
				<tr><td colspan="2"><?php if (empty($appdata['gnuworld'])) {echo "No answer submitted";} else {echo $appdata['gnuworld'];}?></td></tr>
				<tr><td colspan="2" class="tabhead">Did you ever create any eggdrop bots?</td></tr>
				<tr><td colspan="2"><?php if (empty($appdata['eggdrop'])) {echo "No answer submitted";} else {echo $appdata['eggdrop'];}?></td></tr>
				<tr><td class="tabhead">Status</td>
				<td><?php echo $appdata['status']; ?></td></tr>
              </tbody>
            </table>
			<?php
$voter = $_SESSION['username'];
        $check = "SELECT * FROM votes WHERE voter = '$voter' AND candidate = '$nick'";
        $result = $mysql->query($check) or die("Error in query: $check " . mysql_error());
        $row = $result->fetch_array(MYSQLI_ASSOC);
        if ((empty($row['voter'])) && (empty($row['candidate']))) {
            ?>
			<center><h2>SUBMIT YOUR VOTE</h2></center>
			<table class="table table-striped table-view-apps table-view-apps-margin20">
              <tbody>
				<form role="form" action="savevote.php" method="POST">
				<input type="hidden" name="voter" id="voter" value="<?php echo $_SESSION['username']; ?>">
				<input type="hidden" name="candidate" id="candidate" value="<?php echo $appdata['nick']; ?>">
                <tr><td class="tabhead">Do you want <?php echo $appdata['nick']; ?> to be added in the team?</td></tr>
				<tr><td><label class="radio-inline">
				  <input type="radio" name="decision" id="decision" value="Yes"> Yes
				</label>
				<label class="radio-inline">
				  <input type="radio" name="decision" id="decision" value="No"> No
				</label></td></tr>
                <tr><td class="tabhead">If yes, Please select which level is reasonable for <?php echo $appdata['nick']; ?>?</td></tr>
				<tr><td><select class="form-control" required name="level">
				<option selected>Select Level</option>
				<option value="75">75 (*)</option>
				<option value="100">100 (*)</option>
				<option value="150">150 (*)</option>
				<option value="250">250 (*)</option>
				</select>
				</tr>
                <tr><td class="tabhead">Anything you like to say about <?php echo $appdata['nick']; ?>?</td></tr>
				<tr><td><textarea required name="about" rows="13" cols="53"></textarea></td></tr>
              </tbody>
            </table>
				<button type="submit" class="btn-lg btn-info btn-vote">Submit Vote</button>
				</form>
				<?php
} else {
            ?>
			<center><h2>YOUR VOTE DETAILS</h2></center>
			<table class="table table-striped table-view-apps table-view-apps-margin20">
              <tbody>
                <tr><td class="tabhead">Do you want <?php echo $appdata['nick']; ?> to be added in the team?</td></tr>
				<tr><td><?php echo $row['decision']; ?></td></tr>
                <tr><td class="tabhead">If yes, Please select which level is reasonable for <?php echo $appdata['nick']; ?>?</td></tr>
				<tr><td><?php echo $row['level']; ?></td>
				</tr>
                <tr><td class="tabhead">Anything you like to say about <?php echo $appdata['nick']; ?>?</td></tr>
				<tr><td><?php echo $row['reason']; ?></td></tr>
              </tbody>
            </table>
					<?php
echo '<div class="col-sm-12 alert alert-success"><center><h4 class="no-margin"><b>You have already submitted your vote for this applicant.</b></h4></center></div>';
        }
        ?>
		        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at tde end of tde document so tde pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
	<script src="js/ckeditor.js"></script>
  </body>
</html>

<?php
}
}
$mysql->close();

?>