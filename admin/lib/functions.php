<?php
ob_start();
/*  Class Processing the user login information */
class process
{
    //public $username = $_POST['username'];
    /* if session doesn't exist show the form */
    public function decide()
    {
        $this->showform();
    }

    /* show the form */
    public function showform()
    {
        echo '
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" href="favicon.ico">
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,300,500" rel="stylesheet" type="text/css" />
      <title>NationCHAT Voting System v1.0</title>

      <!-- Bootstrap core CSS -->
      <link href="css/bootstrap.min.css" rel="stylesheet">

      <!-- Custom styles for this template -->
      <link href="css/layout.css" rel="stylesheet">

      <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>

    <body>

      <div class="container">

    <center><h2 class="form-signin-heading">NationCHAT Voting System v1.0</h2></center>
      <form class="form-signin" role="form" action="' . $this->logincheck() . '" method="POST">
          <input type="text" class="form-control" placeholder="Username" required autofocus name="username">
          <input type="password" class="form-control" placeholder="Password" required name="password">
          <!--div class="checkbox">
            <label>
              <input type="checkbox" value="remember-me"> Remember me
            </label>
          </div-->
          <button class="btn btn-lg btn-info btn-block" type="submit">Login</button>
        </form>

      </div> <!-- /container -->
    </body>
  </html>
    ';
    }

    /* checking if the user exists into MySQL Database and redirecting the user according to it*/
    public function logincheck()
    {

        $user = "root";
        $pass = "root";
        $db = "local";

        /* establishing mysql connection */
        $mysql = new mysqli("localhost", $user, $pass, $db);

        if (isset($_POST['username']) && isset($_POST['password'])) {

            $login = $mysql->query("SELECT * FROM users WHERE (username = '" . $mysql->real_escape_string($_POST['username']) . "') and (password = '" . $mysql->real_escape_string(md5($_POST['password'])) . "')");

            if (mysqli_num_rows($login) == 1) {

                $_SESSION['username'] = $_POST['username'];

                header('Location: dashboard.php');

            } else {

                header('Location: index.php');

            }

        }

    }

    public function vs_title()
    {

        $user = "root";
        $pass = "root";
        $db = "local";

        /* establishing mysql connection */
        $mysql = new mysqli("localhost", $user, $pass, $db);
        $result = $mysql->query("SELECT * FROM settings");
        while ($epdd = $result->fetch_array(MYSQLI_ASSOC)) {?>
        <title><?php echo $epdd['sitename']; ?></title>
    <?php }
    }
    /*
function mysql($select,$from) {

$mysql->query("SELECT " . $select . " FROM" . $from . " WHERE username = " . $_SESSION['username'] . "")

}
 */
}

?>