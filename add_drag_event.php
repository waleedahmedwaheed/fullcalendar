<?php
session_start();
require_once('bdd.php');

//echo $_POST['title'];
if (isset($_POST['title']) && isset($_POST['color']))
{
	
	$devent_name = $_POST['title'];
	$devent_color = $_POST['color'];

	$sql = "INSERT INTO drag_events(devent_name, devent_color, user_id) values ('$devent_name', '$devent_color' , '".$_SESSION["u_id"]."')";
	mysqli_select_db($database_dbconfig, $dbconfig);
	$Result1 = mysqli_query($dbconfig, $sql) or die(mysqli_error());
	
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
