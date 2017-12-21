<?php 
session_start();
error_reporting(0);
include("bdd.php");
include("functions.php");

if(isset($_POST["submit"]))
{
	$startdate = $_POST["startdate"];
}

					
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <title>COMTS - Daily Report</title>
    <!-- Bootstrap Core CSS -->
    <?php include("css.php"); ?>
	
</head>

<body class="fix-sidebar fix-header">
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
       
	   <?php include("topbar.php"); ?>
	   
       <?php include("left_sidebar.php"); ?>
		
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Daily Report</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="index.php">Dashboard</a></li>
                            <li><a href="#">Report</a></li>
                            <li class="active">Daily Report</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
				
				<!--.row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-info">
                              <div class="panel-wrapper collapse in" >
							    
                                <div class="panel-body">
								<h3 class="box-title">Enter Detail</h3>
                                <hr>
                                    <form action="daily_rpt2.php" method="post">
                                        <div class="form-body">
                                            
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Date</label>
                                                        <input type="date" name="startdate" class="form-control" placeholder="dd/mm/yyyy" required>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            
										</div>
                                        <div class="form-actions">
                                            <input type="submit" name="submit" class="btn btn-success" value="submit" />
                                            <button type="button" class="btn btn-default">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--./row-->
				
                <!-- /row -->
                <div class="row">
                   <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Data Table</h3>
                            <p class="text-muted m-b-30">Data table example</p>
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped">
                                   <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Subj</th>
                                            <th>Attendance</th>
                                            <th>Location</th>
                                            <th>Focal Person</th>
                                            <th>Refreshment</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Subj</th>
                                            <th>Attendance</th>
                                            <th>Location</th>
                                            <th>Focal Person</th>
                                            <th>Refreshment</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
									<?php
						 
					echo $sqls = "select * from events where start = '2017-12-14 01:00:00' and status = 0 limit 1";
					mysqli_select_db($database_dbconfig, $dbconfig);
					$Results = mysqli_query($dbconfig, $sqls) or die(mysqli_error());
					while($row	= mysqli_fetch_assoc($Results))
					{
						$id 		= $row['id'];
						$title 		= $row['title'];
						$start_date = $row['start_date'];
						$attendees  = $row['attendees'];
						 
						$end_date   = $row['end_date'];
						 
						$color 		= $row['color'];
						$location	= $row['location'];
						$foc_person	= $row['foc_person'];
						$teap		= $row['tea'];
						
						 
									?>
                                        <tr>
                                            <td><?php echo $start_date; ?></td>
                                            <td><?php echo $start_date."-".$end_date; ?></td>
                                            <td><?php echo $subj; ?></td>
                                            <td><?php echo $attendees; ?></td>
                                            <td><?php echo $location; ?></td>
                                            <td><?php echo $foc_person; ?></td>
                                            <td><?php echo $tea; ?></td>
                                        </tr>
					<?php } 
						 
						?>			
                                        <tr>
                                            <td>Garrett Winters</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td>63</td>
                                            <td>2011/07/25</td>
                                            <td>$170,750</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
			   </div>
                <!-- /.row -->
                <?php include("right_sidebar.php"); ?>
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2017 &copy;  </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
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
    <script src="js/jasny-bootstrap.js"></script>
    <!--Style Switcher -->
    <script src="plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
   
    <!-- end - This is for export functionality only -->
    <script>/*
    $(document).ready(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;

                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before(
                                '<tr class="group"><td colspan="5">' + group + '</td></tr>'
                            );

                            last = group;
                        }
                    });
                }
            });

            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });*/
    </script>
    
</body>
</html>
