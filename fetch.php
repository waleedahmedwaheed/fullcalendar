<?php
session_start();
require_once('bdd.php');

$sql = "SELECT id, title, start, end, color FROM events where status = 0 and user_id = '".$_SESSION['u_id']."'";
mysqli_select_db($database_dbconfig, $dbconfig);
$req = mysqli_query($dbconfig,$sql);
while($row = mysqli_fetch_assoc($req))
{
 $output .= '
 <div class="alert alert_default">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <p><strong>'.$row["title"].'</strong>
   <small><em>'.$row["start"].'</em></small>
  </p>
 </div>
 ';
}

echo $output;

?>
