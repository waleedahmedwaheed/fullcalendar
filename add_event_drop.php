<?php
session_start();
require_once('bdd.php');
//echo $_POST['title'];
if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['color'])){
	
	$title = $_POST['title'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$color = $_POST['color'];

	$sql = "INSERT INTO events(title, start, end, color, user_id) values ('$title', '$start', '$end', '$color', '".$_SESSION['u_id']."')";
	//$req = $bdd->prepare($sql);
	//$req->execute();
	mysqli_select_db($database_dbconfig, $dbconfig);
	$Result1 = mysqli_query($dbconfig, $sql) or die(mysqli_error());
	
	/* echo $sql;
	
	$query = $bdd->prepare( $sql );
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
