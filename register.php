<?php include("bdd.php"); ?>
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
	
	<script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
	
	<script>

$(document).ready(function (e) {
	
$("#loginform").on('submit',(function(e) {
//	alert("asdasd");
e.preventDefault();
$('#response').show();
$("#loader").show();
$.ajax({
url: "add_user.php", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function(data)   // A function to be called if request succeeds
{
$("#loader").hide();
//$('#userForm')[0].reset();
$("#response").html(data);
}
});

}));
});


</script>

<script type="text/javascript">
window.onload = function () {
	document.getElementById("password1").onchange = validatePassword;
	document.getElementById("password2").onchange = validatePassword;
}
function validatePassword(){
var pass2=document.getElementById("password2").value;
var pass1=document.getElementById("password1").value;
if(pass1!=pass2)
	document.getElementById("password2").setCustomValidity("Passwords Don't Match");
else
	document.getElementById("password2").setCustomValidity('');	 
//empty string means no validation error
}

$(document).ready(function (e) {
$("#username").keyup(function() {
    $(this).val($(this).val().replace(/\s/g, ""));
});
});

</script>

	
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <section id="wrapper" class="login-register">
        <div class="login-box">
            <div class="white-box">
                <form class="form-horizontal form-material" method="post" id="loginform">
				
					<input type="hidden" name="opt" value="add" />
					
                    <a href="javascript:void(0)" class="text-center db"><img src="plugins/images/s5_logo.png" alt="FWO" /> </a>
                    <h3 class="box-title m-t-40 m-b-0">Register Now</h3>
                    <div class="form-group m-t-20">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="Username" name="username" id="username" value="<?php echo $username; ?>" style="text-transform: lowercase;" maxlength="50">
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="Full Name" name="name" value="<?php echo $name; ?>" maxlength="50">
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" id="password1" required="" placeholder="Password" name="password" maxlength="50">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" id="password2" required="" placeholder="Confirm Password" maxlength="50">
                        </div>
                    </div>
                    
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-googleplus btn-lg btn-block text-uppercase waves-effect waves-light" type="submit"> Sign Up </button>
                        </div>
                    </div>
				</form>	
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <p>Already have an account? <a href="login.php" class="text-primary m-l-5"><b>Sign In</b></a></p>
                        </div>
                    </div>
                
							<span id="response">  </span>
            </div>
        </div>
    </section>
    <!-- jQuery -->
    

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
