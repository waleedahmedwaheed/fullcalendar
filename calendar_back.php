<?php 
session_start();
error_reporting(0);
include("bdd.php");
include("functions.php");
					
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
    <title> Calendar </title>
    
	<?php include("css.php"); ?>
	
	<style>
	       
    #wrap {
        width: 1100px;
        margin: 0 auto;
    }
        
    #external-events {
        
        
    }
        
    #external-events h4 {
        font-size: 16px;
        margin-top: 0;
        padding-top: 1em;
    }
        
    #external-events .fc-event {
        margin: 10px 0;
        cursor: pointer;
    }
        
    #external-events p {
        margin: 1.5em 0;
        font-size: 11px;
        color: #666;
    }
        
    #external-events p input {
        margin: 0;
        vertical-align: middle;
    }
	
	.orange {
	    background-color: orange;
	}
	.red {
	    background-color: red;
	}
	.purple {
	    background-color: purple;
	}
	
	</style>
	
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
                        <h4 class="page-title"><img src="plugins/images/s5_logo.png" alt="FWO" /></h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Calendar</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="white-box">
                            <h3 class="box-title">Drag and drop your COMTS</h3>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
								<div id="calendar-events" class="m-t-20">

									<div id='external-events'>
									  <div id='external-events-listing'>
										 
										 <?php 
									$sqls = "SELECT * FROM drag_events where user_id = '".$_SESSION['u_id']."'";
									mysqli_select_db($database_dbconfig, $dbconfig);
									$reqs = mysqli_query($dbconfig,$sqls);
									while($devent = mysqli_fetch_assoc($reqs))
									{
										$devent_name = $devent["devent_name"];
										$devent_color = $devent["devent_color"];
										?>
				<div class="fc-event" data-color="<?php echo $devent_color; ?>" style="background-color: <?php echo $devent_color; ?>;"><?php echo $devent_name; ?></div>
									<?php } ?>
									</div>
									 
									 <!-- checkbox -->
                                    <div class="checkbox">
                                        <input id="drop-remove" type="checkbox">
                                        <label for="drop-remove">
                                            Remove after drop
                                        </label>
                                    </div>
									
									</div>

									

									<div style='clear:both'></div>

								</div>
	
                                   
                                    
                                    <a href="#" data-toggle="modal" data-target="#add-my-event" class="btn btn-lg m-t-40 btn-danger btn-block waves-effect waves-light">
                                        <i class="ti-plus"></i> Add New COMT
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="white-box">
                             <div id="calendar" class="col-centered">
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                
				<!-- Modal Add Category -->
                <div class="modal fade none-border" id="add-my-event" tabindex="-1" role="dialog" >
                    <div class="modal-dialog">
                        <div class="modal-content">
						<form method="POST" action="add_drag_event.php">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title"><strong>Add Draggable COMT</strong></h4>
                            </div>
						
                            <div class="modal-body">
						    
                  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Subj</label>
					<div class="col-sm-10">
					  <input type="text" name="title" class="form-control" id="title" placeholder="Subj">
					</div>
				  </div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Color</label>
					<div class="col-sm-10">
					  <select name="color" class="form-control" id="color">
						  <option value="">Choose</option>
						  <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
						  <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
						  <option style="color:#008000;" value="#008000">&#9724; Green</option>						  
						  <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
						  <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
						  <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
						  <option style="color:#000;" value="#000">&#9724; Black</option>
						  
						</select>
					</div>
				  </div>
				  
							</div>
							
                        
						
                            <div class="modal-footer">
                                <button type="button" class="btn btn-white waves-effect" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success save-event waves-effect waves-light">Create COMT</button>
                            </div>
							 </form>
                        </div>
                    </div>
				</div>
				
				
				<div class="modal fade none-border" id="add-drag-event" tabindex="-1" role="dialog" style="padding-top: 10%;">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
						<form method="POST" action="addEvent.php">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title"><strong>Add</strong> COMT</h4>
                            </div>
                            <div class="modal-body">
                                
                  <div class="row" style="margin-top: 7.5px;">
					<label for="title" class="col-sm-3 control-label">Subj</label>
					<div class="col-sm-9">
					  <input type="text" name="title" class="form-control" id="titled" placeholder="Subj">
					</div>
				  </div>
				  <div class="row" style="margin-top: 7.5px;">
					<label for="color" class="col-sm-3 control-label">Color</label>
					<div class="col-sm-9">
					  <select name="color" class="form-control" id="colord">
						  <option value="">Choose</option>
						  <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
						  <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
						  <option style="color:#008000;" value="#008000">&#9724; Green</option>						  
						  <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
						  <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
						  <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
						  <option style="color:#000;" value="#000">&#9724; Black</option>
					  </select>
					</div>
				  </div>
				  <div class="row" style="margin-top: 7.5px;">
					<label for="start" class="col-sm-3 control-label">Start date</label>
					<div class="col-sm-5">
					  <input type="date" name="start_date" class="form-control" id="startd" readonly>
					</div>
					<div class="col-sm-4">
					  <input id="onselectExampled" name="start_time" type="text" class="form-control ui-timepicker-input" placeholder="00:00" autocomplete="off" required>
					</div>
				  </div>
				  <div class="row" style="margin-top: 7.5px;">
					<label for="endd" class="col-sm-3 control-label">End date</label>
					<div class="col-sm-5">
					  <input type="date" name="end_date" id="end" class="form-control" required>
					</div>  
					<div class="col-sm-4">  
					  <input id="onselectExample2d" name="end_time" type="text" class="form-control ui-timepicker-input" placeholder="00:00" autocomplete="off" required>
					</div>
				  </div>
				  
                            </div>
                            <div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-success">Save changes</button>
							  </div>
							 </form>
                        </div>
                    </div>
                </div>
				
				
                <!-- Modal Add Category -->
                <div class="modal fade none-border" id="add-new-event" tabindex="-1" role="dialog" style="padding-top: 10%;">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
						<form method="POST" action="addEvent.php">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title"><strong>Add</strong> COMT</h4>
                            </div>
                            <div class="modal-body">
                                
                  <div class="row" style="margin-top: 7.5px;">
					<label for="title" class="col-sm-3 control-label">Subj</label>
					<div class="col-sm-9">
					  <input type="text" name="title" class="form-control" id="title" placeholder="Subj">
					</div>
				  </div>
				  <div class="row" style="margin-top: 7.5px;">
					<label for="color" class="col-sm-3 control-label">Color</label>
					<div class="col-sm-9">
					  <select name="color" class="form-control" id="color">
						  <option value="">Choose</option>
						  <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
						  <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
						  <option style="color:#008000;" value="#008000">&#9724; Green</option>						  
						  <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
						  <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
						  <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
						  <option style="color:#000;" value="#000">&#9724; Black</option>
					  </select>
					</div>
				  </div>
				  <div class="row" style="margin-top: 7.5px;">
					<label for="start" class="col-sm-3 control-label">Start date</label>
					<div class="col-sm-5">
					  <input type="date" name="start_date" class="form-control" id="start" readonly>
					</div>
					<div class="col-sm-4">
					  <input id="onselectExample" name="start_time" type="text" class="form-control ui-timepicker-input" placeholder="00:00" autocomplete="off" required>
					</div>
				  </div>
				  <div class="row" style="margin-top: 7.5px;">
					<label for="end" class="col-sm-3 control-label">End date</label>
					<div class="col-sm-5">
					  <input type="date" name="end_date" id="end" class="form-control" required>
					</div>  
					<div class="col-sm-4">  
					  <input id="onselectExample2" name="end_time" type="text" class="form-control ui-timepicker-input" placeholder="00:00" autocomplete="off" required>
					</div>
				  </div>
				  <div class="row" style="margin-top: 7.5px;">
					<label for="end" class="col-sm-3 control-label">Attendees</label>
					<div class="col-sm-9">
 				<input type='text' id='example_emailBS' name='attendees' class='form-control' value=''>
					</div>  
				  </div>
				  
                            </div>
                            <div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-success">Save changes</button>
							  </div>
							 </form>
                        </div>
                    </div>
                </div>
				
				
			
		
		<!-- Modal -->
		<div class="modal fade none-border" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="padding-top: 10%;">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form method="POST" action="editEventTitle.php">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Edit COMT</h4>
			  </div>
			  <div class="modal-body">
				
				  <div class="row" style="margin-top: 7.5px;">
					<label for="title" class="col-sm-3 control-label">Subj</label>
					<div class="col-sm-9">
					  <input type="text" name="title" class="form-control" id="title" placeholder="Subj">
					</div>
				  </div>
				  
				  <div class="row" style="margin-top: 7.5px;">
					<label for="color" class="col-sm-3 control-label">Color</label>
					<div class="col-sm-9">
					  <select name="color" class="form-control" id="color">
						  <option value="">Choose</option>
						  <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
						  <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
						  <option style="color:#008000;" value="#008000">&#9724; Green</option>						  
						  <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
						  <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
						  <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
						  <option style="color:#000;" value="#000">&#9724; Black</option>
					   </select>
					</div>
				  </div>
				  
				   <div class="row" style="margin-top: 7.5px;">
					<label for="start" class="col-sm-3 control-label">Start date</label>
					<div class="col-sm-5">
					  <input type="date" name="start_date" class="form-control" id="start" required>
					</div>
					<div class="col-sm-4">
					  <input id="onselectExample3" name="start_time" type="text" class="form-control ui-timepicker-input" placeholder="00:00" autocomplete="off" required>
					</div>
				  </div>
				  <div class="row" style="margin-top: 7.5px;">
					<label for="end" class="col-sm-3 control-label">End date</label>
					<div class="col-sm-5">
					  <input type="date" name="end_date" id="end" class="form-control" required>
					</div>  
					<div class="col-sm-4">  
					  <input id="onselectExample4" name="end_time" type="text" class="form-control ui-timepicker-input" placeholder="00:00" autocomplete="off" required>
					</div>
				  </div>
				  
				   <div class="row" style="margin-top: 7.5px;">
					<label for="end" class="col-sm-3 control-label">Attendees</label>
					<div class="col-sm-9">
 				<input type='text' id='example_emailBS2' name='attendees' class='form-control' value=''>
 				<input type='text' id='mattendees' name='mattendees' class='form-control' value=''>
					</div>  
				  </div>
				  
				    <div class="row"> 
						<div class="col-sm-offset-2 col-sm-10">
						  <div class="checkbox">
							<label class="text-danger"><input type="checkbox"  name="delete" /> Delete COMT</label>
						  </div>
						</div>
					</div>
				  
				  <input type="hidden" name="id" class="form-control" id="id">
				
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-success">Save changes</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>
		
                <!-- END MODAL -->
                
				<?php include("right_sidebar.php"); ?>
				
            </div>
            <!-- /.container-fluid -->
            
        </div>
        <!-- /#page-wrapper -->
		<footer class="footer text-center"> 2017 &copy; </footer>
    
	</div>
    <!-- /#wrapper -->
<link href='css/fullcalendar.css' rel='stylesheet' />
<script src='jquery/lib/moment.min.js'></script>
<script src='jquery/lib/jquery.min.js'></script>
<script src='jquery/fullcalendar.min.js'></script>
	<?php include("scripts.php"); ?>
	 <!-- jQuery Version 1.11.1 -->
<script type="text/javascript" src="js/jquery.timepicker.js"></script>
	<link rel="stylesheet" type="text/css" href="css/jquery.timepicker.css" />
 	
	<script type="text/javascript" src="jquery/multiple-emails.js"></script>
	<link type="text/css" rel="stylesheet" href="jquery/multiple-emails.css" />
	
	
<button onclick="myFunction()">Try it</button>

<p id="demo"></p>

	<script type="text/javascript">
	
		//Plug-in function for the bootstrap version of the multiple email
		$(function() {
			//To render the input device to multiple email input using BootStrap icon
			$('#example_emailBS').multiple_emails({position: "bottom"});
			//OR $('#example_emailBS').multiple_emails("Bootstrap");
			
			//Shows the value of the input device, which is in JSON format
			$('#current_emailsBS').text($('#example_emailBS').val());
			$('#example_emailBS').change( function(){
				$('#current_emailsBS').text($(this).val());
			});
		});
		
		$(function() {
			//To render the input device to multiple email input using BootStrap icon
			$('#example_emailBS2').multiple_emails({position: "bottom"});
			//OR $('#example_emailBS').multiple_emails("Bootstrap");
			
			//Shows the value of the input device, which is in JSON format
			$('#current_emailsBS2').text($('#example_emailBS2').val());
			$('#example_emailBS2').change( function(){
				$('#current_emailsBS2').text($(this).val());
			});
		});
		
	</script>
	
	<script>
			$(function() {
				$('#onselectExample').timepicker();
				$('#onselectExampled').timepicker();
				$('#onselectExample2').timepicker();
				$('#onselectExample2d').timepicker();
				$('#onselectExample3').timepicker();
				$('#onselectExample4').timepicker();
				/* $('#onselectExample').on('changeTime', function() {
					$('#onselectTarget').text($(this).val());
				}); */
			});
	</script>
	
	<script>

	 
	
	$(document).ready(function() {

        /* initialize the external events
        -----------------------------------------------------------------*/

        $('#external-events .fc-event').each(function() {
			// store data so the calendar knows to render an event upon drop
			$(this).data('event', {
				title: $.trim($(this).text()), // use the element's text as the event title
				stick: true, // maintain when user navigates (see docs on the renderEvent method)
				color: $(this).data('color')
			});
			// make the event draggable using jQuery UI
			$(this).draggable({
				zIndex: 999,
				revert: true,      // will cause the event to go back to its
				revertDuration: 0  //  original position after the drag
			});
		});

        });

	$(document).ready(function() {
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next listMonth',
				center: 'title',
				right: 'year,month,basicWeek,basicDay,today'
			},
			//defaultView: 'today',
			//defaultDate: '2016-01-12',
			// defaultView: 'month',
			navLinks: true,
			editable: true,
			droppable: true, 
			eventLimit: true, // allow "more" link when too many events
			selectable: true,
			selectHelper: true,
			timeFormat: 'H:mm',
			select: function(start, end) {
				
				$('#add-new-event #start').val(moment(start).format('YYYY-MM-DD'));
				//$('#add-new-event #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
				$('#add-new-event #end').val(moment(end).format('YYYY-MM-DD'));
				$(".multiple_emails-ul").empty();
				$('#add-new-event').modal('show');
			},
			eventRender: function(event, element) {
				element.bind('dblclick', function() {
					//alert(event.attendees);
					//var obj = JSON.parse(event.attendees);
					$(".multiple_emails-ul").empty();
					 if(event.attendees != "")
					 {	
						
						//$('#ModalEdit #mattendees').val(event.attendees);
						
						var data = JSON.parse(event.attendees);
						//alert(data[0]);
						//deleteEmpty(data[0])
						var arr = [];
						var str = [];
						var len = data.length;
						var txt = "";
						if(len > 0){
						for(var i=0;i<len;i++)
						{
								//txt += "<tr><td>"+data[i]+"</td></tr>";
 txt += '<li class="multiple_emails-email" id="li'+i+'"><a href="#" class="multiple_emails-close" title="Remove" onclick="myFunc('+i+')"><i class="ti-close right-side-toggle"></i></a><span class="email_name" data-email='+data[i]+'>'+data[i]+'</span></li>';
						 arr.push(i.toString());
						 str.push(data[i].toString());
						 
						 myFunc = function(theObject) {
							//alert(theObject);
							//delete(test.theObject);
							//$("#li"+theObject).hide();
							 //$('li.multiple_emails-email').next("#li"+theObject).hide();
							 $("#li"+theObject+" li").hide();
							 //var removed = test.splice(2, 1);
							 //var index = test.indexOf(1);
							 //var rooms = ['hello', 'something'];
							
							/* var myArr = ['apple', 'orange', 'pineapple', 'banana'];
							alert(myArr.splice(1, 1)); */
							
							//alert(str);
							
							  arr.splice(theObject, 1);
							  str.splice(theObject, 1);
							 //alert(arr);
							 //alert(str);
							 
							 var bstart = "[";
							 var bend = "]";
							 var str2 = str.length ? '"' + str.join('","') + '"' : '';
								 
								 str2 = bstart.concat(str2);
								 str2 = str2.concat(bend);
								 
							 $('#ModalEdit #mattendees').val(str2);
							 $(".multiple_emails-ul").empty();
							 
							var len2 = str.length;
							var txt2 = "";
							if(len2 > 0){
							for(var j=0;j<len2;j++){
txt2 += '<li class="multiple_emails-email" id="li'+j+'"><a href="#" class="multiple_emails-close" title="Remove" onclick="myFunc('+j+')"><i class="ti-close right-side-toggle"></i></a><span class="email_name" data-email='+str[j]+'>'+str[j]+'</span></li>';							
							
							}
							//alert(txt2);
							}
							if(txt2 != "")
							{
								$(".multiple_emails-ul").empty();
								$(".multiple_emails-ul").append(txt2).removeClass("hidden");
							}

						}
						  
						}
						
						//var myFunc;
						//if (num === 0) {
						   
						  
								 
						   
						//}
						
							if(txt != "")
							{
								$(".multiple_emails-ul").append(txt).removeClass("hidden");
							}
						}
							
					 }
					 
					/*  var abc = function showdata(g){	  
							 alert(data[g]);
							}; */
					
					$('#ModalEdit #id').val(event.id);
					$('#ModalEdit #title').val(event.title);
					$('#ModalEdit #color').val(event.color);
					$('#ModalEdit #start').val(event.start.format('YYYY-MM-DD'));
					$('#ModalEdit #end').val(event.end.format('YYYY-MM-DD'));
					$('#ModalEdit #onselectExample3').val(event.start.format('HH:mm:ss'));
					$('#ModalEdit #onselectExample4').val(event.end.format('HH:mm:ss')); 
					$('#ModalEdit').modal('show');
				});
			},
			drop: function(date, event) {
				// is the "remove after drop" checkbox checked?
				
				
				var start_ = date.format();
				var color_ = $(this).data('color');
				var title_ = $.trim($(this).text());
				//alert(this.id);
	            var defaultDuration = moment.duration($('#calendar').fullCalendar('option', 'defaultTimedEventDuration'));
	            var end = date.clone().add(defaultDuration); // on drop we only have date given to us
	            //alert('end is ' + end.format());
	            var end_ = end.format();
				//alert(start);
				//alert(end);
				
				$('#add-drag-event #titled').val(title_);
				$('#add-drag-event #colord').val(color_);
				$('#add-drag-event #startd').val(start_);
				$('#add-drag-event').modal('show');
				//$('#add-drag-event #start').val(event.start.format('YYYY-MM-DD'));
/* 
					 $.ajax({
					  url: 'add_event_drop.php',
					  data: 'title=' + title_ + '&start=' + start_ + '&end=' + end_ + '&color=' + color_,
					  type: "POST",
					  success: function (json) {
						alert('Added Successfully');
					  }
					});  */
			},
			eventDrop: function(event, delta, revertFunc) { // si changement de position

				edit(event);
				

			},
			eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

				edit(event);

			},
			events: [
			<?php 
			$sql = "SELECT id, title, start, end, color, attendees FROM events where status = 0 and user_id = '".$_SESSION['u_id']."'";
			mysqli_select_db($database_dbconfig, $dbconfig);
			$req = mysqli_query($dbconfig,$sql);
			while($event = mysqli_fetch_assoc($req)){
			//foreach($events as $event): 
			
				$start = explode(" ", $event['start']);
				$end = explode(" ", $event['end']);
				if($start[1] == '00:00:00'){
					$start = $start[0];
				}else{
					$start = $event['start'];
				}
				if($end[1] == '00:00:00'){
					$end = $end[0];
				}else{
					$end = $event['end'];
				}
			?>
				{
					id: '<?php echo $event['id']; ?>',
					title: '<?php echo $event['title']; ?>',
					start: '<?php echo $start; ?>',
					end: '<?php echo $end; ?>',
					color: '<?php echo $event['color']; ?>',
				attendees: '<?php echo $event['attendees']; ?>',
				},
			<?php } ?>
			]		
		});
		
		function edit(event){
			start = event.start.format('YYYY-MM-DD HH:mm:ss');
			if(event.end){
				end = event.end.format('YYYY-MM-DD HH:mm:ss');
			}else{
				end = start;
			}
			
			id =  event.id;
			
			Event = [];
			Event[0] = id;
			Event[1] = start;
			Event[2] = end;
			
			$.ajax({
			 url: 'editEventDate.php',
			 type: "POST",
			 data: {Event:Event},
			 success: function(rep) {
					if(rep == 'OK'){
						alert('Updated Successfully');
					}else{
						alert('Could not be saved. try again.'); 
					}
				}
			}); 
		}
		
	});

</script>

</body>
</html>
