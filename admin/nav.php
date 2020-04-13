    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
			<?php $result = $mysql->query("SELECT * FROM settings");
while ($epdd = $result->fetch_array(MYSQLI_ASSOC)) {?>
			<a class="navbar-brand" href="#"><?php echo $epdd['sitename']; ?></a>
			<?php }?>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span>&nbsp;&nbsp;Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
		  <?php
$username = $_SESSION['username'];
$level = $mysql->query("SELECT * FROM users WHERE username = '$username'");
while ($lvls = $level->fetch_array(MYSQLI_ASSOC)) {
    $lvl = $lvls["level"];
    ?>
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
		  <li class="heading"><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;General</li>
            <li <?php if ($page == "dashboard.php") {echo 'class="active"';}?>><a title="<?php echo $page; ?>" href="dashboard.php"><span class="glyphicon glyphicon-th-large"></span>&nbsp;&nbsp;Dashboard</a></li>
		  <?php
if ($lvl > "749") {
        ?>
			<li <?php if ($page == "settings.php") {echo 'class="active"';}?>><a href="settings.php"><span class="glyphicon glyphicon-wrench"></span>&nbsp;&nbsp;Settings</a></li>
		  <?php }?>
            <li <?php if ($page == "profile.php") {echo 'class="active"';}?>><a href="profile.php"><span class="glyphicon glyphicon-cog"></span>&nbsp;&nbsp;Profile</a></li>
          </ul>
		  <?php
if ($lvl > "998") {
        ?>
          <ul class="nav nav-sidebar">
		  <li class="heading"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;User Management</li>
          <li <?php if ($page == "members.php") {echo 'class="active"';}?>><a href="members.php"><span class="glyphicon glyphicon-th-list"></span>&nbsp;&nbsp;Members</a></li>
          <li <?php if ($page == "adduser.php") {echo 'class="active"';}?>><a href="adduser.php"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Add Member</a></li>
          </ul>
		  <?php }
    ?>
          <ul class="nav nav-sidebar">
		  <li class="heading"><span class="glyphicon glyphicon-arrow-right"></span>&nbsp;&nbsp;Applications</li>
		  <?php
if ($lvl > "998") {
        ?>
		  <li <?php if ($page == "results.php") {echo 'class="active"';}?>><a href="results.php"><span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;Results</a></li>
		  <?php
}
    ?>
		  <li <?php if ($page == "allapps.php") {echo 'class="active"';}?>><a href="allapps.php"><span class="glyphicon glyphicon-th-large"></span>&nbsp;&nbsp;All Applications</a></li>
          <li <?php if ($page == "pendingapps.php") {echo 'class="active"';}?>><a href="pendingapps.php"><span class="glyphicon glyphicon-zoom-in"></span>&nbsp;&nbsp;Pending Applications</a></li>
          <li <?php if ($page == "acceptedapps.php") {echo 'class="active"';}?>><a href="acceptedapps.php"><span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;Accepted Applications</a></li>
          <li <?php if ($page == "rejectedapps.php") {echo 'class="active"';}?>><a href="rejectedapps.php"><span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Rejected Applications</a></li>
          </ul>
        </div>
		<?php }?>