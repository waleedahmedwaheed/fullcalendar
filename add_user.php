<?php 
include 'bdd.php';
error_reporting(0);

	$name 		= $_POST['name'];
	$username 	= $_POST['username'];
	$password 	= $_POST['password'];
		
	$user_id		 	= $_POST['user_id'];
	$opt 				= $_POST['opt'];

/* if($opt=="update")
{	
	if($password=="")
	 {
		 $insertSQL = "Update user set name = '$name',shop_id='$shop_id',status='$status'
	where user_id = '$user_id'";
	mysql_select_db($database_dbconfig, $dbconfig);
	$Result1 = mysql_query($insertSQL, $dbconfig) or die(mysql_error());
	 }
	 else
	 {
		  $pass=md5($password);
		$salt="a1Bz20ydqelm8m1wql";
		$pass=$salt.$pass;
		
		$insertSQL = "Update user set name = '$name',password = '$pass',shop_id='$shop_id',status='$status'
	where user_id = '$user_id'";
	mysql_select_db($database_dbconfig, $dbconfig);
	$Result1 = mysql_query($insertSQL, $dbconfig) or die(mysql_error());
	
	 }
	
	
	echo "<script type='text/javascript'>alert('Data Successfully Updated!');</script>";
	echo "<script>window.location='user.php'</script>";
		
	//echo "<script type='text/javascript'> window.location='view_hall.php' </script>";
}
else
{ */	
	
		$pass=md5($password);
		$salt="a1Bz20ydqelm8m1wql";
		$pass=$salt.$pass;
		
		  $getSQL = "select * from user where username = '".$username."'";
		mysqli_select_db($database_dbconfig, $dbconfig);
		$Resultg = mysqli_query($dbconfig, $getSQL) or die(mysqli_error());	 
		$rowg = mysqli_fetch_assoc($Resultg);
		 
		
		if($rowg>0)
		{
			echo "<script type='text/javascript'>alert('Username alredy exist!');</script>";
			echo "<script>window.location='register.php'</script>"; 
		}
		else
		{
	   $insertSQL = "INSERT INTO user(name,username,password)
			VALUES('$name','$username','$pass')";
	mysqli_select_db($database_dbconfig, $dbconfig);
	$Result1 = mysqli_query($dbconfig, $insertSQL) or die(mysqli_error());	 
	
		echo "<script type='text/javascript'>alert('Successfully registered new user!');</script>";
		echo "<script>window.location='login.php'</script>";   
		}
//}		
?>