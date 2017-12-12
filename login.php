<?php
session_start();
error_reporting(0);
include("bdd.php");

unset($_SESSION['u_id']);
 

if(isset($_POST['login']))
{

$username   	=	$_POST['username'];
$pass_unsafe	=	$_POST['password'];

//$user = mysql_real_escape_string($user_unsafe);
//$pass1 = mysqli_real_escape_string($pass_unsafe);
$pass=md5($pass_unsafe);
$salt="a1Bz20ydqelm8m1wql";
$pass=$salt.$pass;

	  $query="select * from user where username='$username' and password='$pass' and status = '0'";
	//exit;
	mysqli_select_db($database_dbconfig, $dbconfig);
	$Result1 = mysqli_query($dbconfig, $query) or die(mysqli_error());
	$row=mysqli_fetch_assoc($Result1);
           $u_id		=	$row['user_id'];
           
		   $counter=mysqli_num_rows($Result1);
			//exit;
		  	if ($counter == 0) 
			  {	
				echo "<script type='text/javascript'>alert('Invalid Username or Password!');
				document.location='login.php'</script>";
			  } 
			  else
			  {
				   $_SESSION['u_id']	=	$u_id;	
				echo "<script type='text/javascript'>document.location='index.php'</script>";   
				
			  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <title>Calendar Events</title>
    
	<?php include("css.php"); ?>
	
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <section id="wrapper" class="login-register">
        <div class="login-box">
            <div class="white-box">
                <form class="form-horizontal form-material" id="loginform" method="post" action="">
                    <a href="javascript:void(0)" class="text-center db"><img src="plugins/images/s5_logo.png" alt="FWO" /> </a>
                    <div class="form-group m-t-40">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="Username" name="username" id="username" style="text-transform: lowercase;" maxlength="50">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" required="" placeholder="Password" name="password" maxlength="50">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="checkbox checkbox-primary pull-left p-t-0">
                                <input id="checkbox-signup" type="checkbox">
                                <label for="checkbox-signup"> Remember me </label>
                            </div>
                            <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a> </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-googleplus btn-lg btn-block text-uppercase waves-effect waves-light" name="login" type="submit">Log In</button>
                        </div>
                    </div>
                   
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <p>Don't have an account? <a href="register.php" class="text-primary m-l-5"><b>Sign Up</b></a></p>
                        </div>
                    </div>
                </form>
                <form class="form-horizontal" id="recoverform" action="#">
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <h3>Recover Password</h3>
                            <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- jQuery -->
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript">
$(document).ready(function (e) {
$("#username").keyup(function() {
    $(this).val($(this).val().replace(/\s/g, ""));
});
});

</script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/tether.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <!--Style Switcher -->
    <script src="plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>
