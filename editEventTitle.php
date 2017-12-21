<?php
session_start();
require_once('bdd.php');
if (isset($_POST['delete']) && isset($_POST['id'])){
	
	
	$id = $_POST['id'];
	
	$sql = "update events set status = 1 WHERE id = $id and user_id = '".$_SESSION['u_id']."'";
	mysqli_select_db($database_dbconfig, $dbconfig);
	$Result1 = mysqli_query($dbconfig, $sql) or die(mysqli_error());
	/* $query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$res = $query->execute();
	if ($res == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	} */
	
}
else if (isset($_POST['title']) && isset($_POST['color']) && isset($_POST['id'])){
	
	$id = $_POST['id'];
	$title 		= $_POST['title'];
	$start_date = $_POST['start_date'];
	$start_time = $_POST['start_time'];
	$end_date   = $_POST['end_date'];
	$end_time   = $_POST['end_time'];
	$color 		= $_POST['color'];
	$attendees	= $_POST['attendees'];
	$mattendees	= $_POST['mattendees'];
	$location	= $_POST['location'];
	$foc_person	= $_POST['foc_person'];
	$teap		= $_POST['tea'];
	
//exit;	
	$time_from			= $start_date.$start_time;
	$time_to			= $end_date.$end_time;
	
	$starts			= date("Y-m-d H:i:s",strtotime($time_from));	
	$ends			= date("Y-m-d H:i:s",strtotime($time_to));	
	
	if(($attendees=="") && ($mattendees<>""))
	{
	$sql = "UPDATE events SET  title = '$title', color = '$color' , start = '$starts' , end = '$ends' , attendees = '$mattendees' ,
	location = '$location' , foc_person = '$foc_person'	WHERE id = $id and user_id = '".$_SESSION['u_id']."'";
	mysqli_select_db($database_dbconfig, $dbconfig);
	$Result1 = mysqli_query($dbconfig, $sql) or die(mysqli_error());
	}
	else if($attendees<>"")
	{
	$sql = "UPDATE events SET  title = '$title', color = '$color' , start = '$starts' , end = '$ends' , attendees = '$attendees',
	location = '$location' , foc_person = '$foc_person'	WHERE id = $id and user_id = '".$_SESSION['u_id']."'";
	mysqli_select_db($database_dbconfig, $dbconfig);
	$Result1 = mysqli_query($dbconfig, $sql) or die(mysqli_error());	
	}
	else
	{
	$sql = "UPDATE events SET  title = '$title', color = '$color' , start = '$starts' , end = '$ends' ,
	location = '$location' , foc_person = '$foc_person'	WHERE id = $id and user_id = '".$_SESSION['u_id']."'";
	mysqli_select_db($database_dbconfig, $dbconfig);
	$Result1 = mysqli_query($dbconfig, $sql) or die(mysqli_error());	
	}
	/* $query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	} */

}
header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>
