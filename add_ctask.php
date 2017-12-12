<?php 
include_once("inc/dsn.php"); 
error_reporting(0);

	$t_date			= $_REQUEST["t_date"];
	$t_time_from	= $_REQUEST["t_time_from"];
	$t_time_to		= $_REQUEST["t_time_to"];
	$t_subject		= $_REQUEST["t_subject"];
	$t_fcontact		= $_REQUEST["t_fcontact"];
	$t_focalpers	= $_REQUEST["t_focalpers"];
	$t_misc			= $_REQUEST["t_misc"];
	$t_tea			= $_REQUEST["t_tea"];
	$rv_name		= $_REQUEST["rv_name"];
	$v_name			= $_REQUEST["v_name"];
	$fs_name		= $_REQUEST["fs_name"];
	
	$time_from			= $t_date.$t_time_from;
	$time_to			= $t_date.$t_time_to;
	
	$starts			= date("Y-m-d H:i:s",strtotime($time_from));	
	$ends			= date("Y-m-d H:i:s",strtotime($time_to));	
	
	if((strtotime($time_to))>(strtotime($time_from))){
		
		
		
		 echo $sqlmdate = " select * from tasks
 where (T_TIME_FROM between '$t_time_to' and '$t_time_from' or T_TIME_TO between '$t_time_to' and '$t_time_from')
   and T_DATETIME = TO_DATE('$t_date', 'yyyy/mm/dd') and t_status = 0";
	$rsmadate	= oci_parse($conn, $sqlmdate); 
	oci_execute($rsmadate); 
	$rowsmadate = oci_fetch_all($rsmadate, $promadate);
	
	
	
		if ($rowsmadate == 0){
			
			
			///////////////// date check ////////////
			 
	 $sqlma = "select nvl(max(t_id),0) + 1 as maxid from tasks";
	$rsma	= oci_parse($conn, $sqlma); 
	oci_execute($rsma); 
	$rowsma = oci_fetch_all($rsma, $proma);
	$maxid = $proma["MAXID"][0];
	
	 
	      $sql = "insert into TASKS(T_DATETIME,T_FOCALPERS,T_FCONTACT,T_TEA,T_MISC,T_TIME_FROM,T_TIME_TO,T_SUBJECT,TIME_FROM,TIME_TO,STARTS,ENDS) 
	 values (TO_DATE('$t_date', 'yyyy/mm/dd'),'$t_focalpers','$t_fcontact','$t_tea','$t_misc','$t_time_from','$t_time_to','$t_subject',TO_DATE('$time_from', 'yyyy/mm/dd hh24:mi:ss'),TO_DATE('$time_to', 'yyyy/mm/dd hh24:mi:ss'),'$starts','$ends')"; 
	 //echo $sql."<br>";
	 //exit;
	  $rs	= oci_parse($conn, $sql); 
	  oci_execute($rs); 
	  oci_commit();
	  
	  
	  for ($i=0; $i<count($rv_name); $i++)
	  {
		    $sql = "insert into RV(RV_NAME,T_ID) 
	 values ('".$rv_name[$i]."','$maxid')"; 
	  $rs	= oci_parse($conn, $sql); 
	  oci_execute($rs); 
	  oci_commit();
	  }
	  
	  for ($i=0; $i<count($v_name); $i++)
	  {
		    $sql = "insert into VISITORS(V_NAME,T_ID) 
	 values ('".$v_name[$i]."','$maxid')"; 
	  $rs	= oci_parse($conn, $sql); 
	  oci_execute($rs); 
	  oci_commit();
	  }
	  
	  for ($i=0; $i<count($fs_name); $i++)
	  {
		    $sql = "insert into FWOSTAFF(FS_NAME,T_ID) 
	 values ('".$fs_name[$i]."','$maxid')"; 
	  $rs	= oci_parse($conn, $sql); 
	  oci_execute($rs); 
	  oci_commit();
	  }
			
			
			
			
		}else{
			
			
			
			echo "<script type='text/javascript'>alert('ERROR : Event already added in same time');</script>";
			
		}
		
		
		
		
		
	
	  
	}
	else{
		
		echo "<script type='text/javascript'>alert('ERROR : end time should be greater than start time');</script>";
	}
	  
			echo "<script type='text/javascript'>alert('Comt has been added successfully!');</script>";
			echo "<script>window.location='index.php'</script>";
?>