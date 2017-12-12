<?php  include_once('bdd.php');

session_start();

unset($_SESSION['u_id']);
 
session_write_close();
 
echo '<script> document.location = "login.php"; </script>'; 

?>

