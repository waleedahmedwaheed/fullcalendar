<?php 
  if(isset($_SESSION['u_id']) && !empty($_SESSION['u_id'])) 
 {
	//echo  $_SESSION['s_id'];
	 //echo "<script>window.location='login.php'</script>"; 
 }
 else
 {
	 
	 echo "<script>window.location='login.php'</script>"; 
 }
 
 
?>
 
 <!-- Left navbar-header -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                        <!-- input-group -->
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
            <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
            </span> </div>
                        <!-- /input-group -->
                    </li>
                   
	<li class="nav-small-cap m-t-10">--- Main Menu</li>
	<li> <a href="index.php" class="waves-effect"><i class="linea-icon linea-basic fa-fw" data-icon="v"></i> <span class="hide-menu"> Dashboard <span class="fa arrow"></span> <span class="label label-rouded label-custom pull-right"></span></span></a>
	</li>
   
				  
				 

<li> <a href="calendar.php" class="waves-effect"><i data-icon="A" class="linea-icon linea-elaborate fa-fw"></i> <span class="hide-menu">Calendar</span></a></li>

 <li> <a href="#" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Reports<span class="fa arrow"></span><span class="label label-rouded label-purple pull-right">30</span></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="daily_rpt.php">Daily Report</a></li>
                        </ul>
                    </li>
                   
                   <li><a href="logout.php" class="waves-effect"><i class="icon-logout fa-fw"></i> <span class="hide-menu">Log out</span></a></li>
                    <li class="nav-small-cap">--- Support</li>
                    
					</ul>
            </div>
        </div>
        <!-- Left navbar-header end -->