<?php
session_start();
require_once('bdd.php');

  $attendees = $_POST['attendees'];

/* foreach($attendees as $attend)
{
	echo $attend."<br>";
} */


if (isset($_POST['title']) && isset($_POST['start_date']) && isset($_POST['end_date']) && isset($_POST['color']))
{
	
	$title 		= $_POST['title'];
	$start_date = $_POST['start_date'];
	$start_time = $_POST['start_time'];
	$end_date   = $_POST['end_date'];
	$end_time   = $_POST['end_time'];
	$color 		= $_POST['color'];
		
	$time_from			= $start_date.$start_time;
	$time_to			= $end_date.$end_time;
	
	$starts			= date("Y-m-d H:i:s",strtotime($time_from));	
	$ends			= date("Y-m-d H:i:s",strtotime($time_to));	
	
	$sqls = "select * from events where (start between '$starts' and '$ends' or end between '$starts' and '$ends')";
	mysqli_select_db($database_dbconfig, $dbconfig);
	$Results = mysqli_query($dbconfig, $sqls) or die(mysqli_error());
	$row	= mysqli_num_rows($Results);
	if($row>0)
	{
		echo "<script type='text/javascript'>alert('ERROR : Event already added in same time');</script>";
		echo "<script>window.location='calendar.php'</script>";
		//header('Location: '.$_SERVER['HTTP_REFERER']);
	}
	else
	{
		$sql = "INSERT INTO events(title, start, end, color, user_id, attendees) 
		values ('$title', '$starts', '$ends', '$color' , '".$_SESSION['u_id']."' , '$attendees')";
		mysqli_select_db($database_dbconfig, $dbconfig);
		$Result1 = mysqli_query($dbconfig, $sql) or die(mysqli_error());
		header('Location: '.$_SERVER['HTTP_REFERER']);	
	}
	 //echo $sql;
	
	/*$query = $bdd->prepare( $sql );
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


	
?>
