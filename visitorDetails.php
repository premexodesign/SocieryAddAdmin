<!DOCTYPE html>
<html>
<head>
	<?php include('include/head.php'); ?>
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/dataTables.bootstrap4.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/responsive.dataTables.css">
	
		

<!-- Latest minified bootstrap css -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<!-- Latest minified bootstrap js -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
function submitContactForm(){
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    var name = $('#inputName').val();
    var email = $('#inputEmail').val();
    var message = $('#inputMessage').val();
    if(name.trim() == '' ){
        alert('Please enter your name.');
        $('#inputName').focus();
        return false;
    }else if(email.trim() == '' ){
        alert('Please enter your email.');
        $('#inputEmail').focus();
        return false;
    }else if(email.trim() != '' && !reg.test(email)){
        alert('Please enter valid email.');
        $('#inputEmail').focus();
        return false;
    }else if(message.trim() == '' ){
        alert('Please enter your message.');
        $('#inputMessage').focus();
        return false;
    }else{
        $.ajax({
            type:'POST',
            url:'submit_form.php',
            data:'contactFrmSubmit=1&name='+name+'&email='+email+'&message='+message,
            beforeSend: function () {
                $('.submitBtn').attr("disabled","disabled");
                $('.modal-body').css('opacity', '.5');
            },
            success:function(msg){
                if(msg == 'ok'){
                    $('#inputName').val('');
                    $('#inputEmail').val('');
                    $('#inputMessage').val('');
                    $('.statusMsg').html('<span style="color:green;">Thanks for contacting us, we\'ll get back to you soon.</p>');
                }else{
                    $('.statusMsg').html('<span style="color:red;">Some problem occurred, please try again.</span>');
                }
                $('.submitBtn').removeAttr("disabled");
                $('.modal-body').css('opacity', '');
            }
        });
    }
}
</script>

</head>
<body>
	<?php include('include/header.php'); ?>
	<?php include('include/sidebar.php'); ?>
	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalForm">
    Add Visitor
</button>
<button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalForm">
    Pre Booking Visitor
</button>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Visitor</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
									<?php
date_default_timezone_set("America/New_York");
       echo date("Y-M-D");
									?>
								</a>
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="#">Export List</a>
									<a class="dropdown-item" href="#">Policies</a>
									<a class="dropdown-item" href="#">View Assets</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Simple Datatable start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h5 class="text-blue">Visitor Data Table </h5>
							
						</div>
					</div>
					<div class="row">
						
						<table class="stripe hover multiple-select-row data-table-export nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">Visitor Code</th>
									<th>Visitor Name</th>
									<th>Resion For Visit</th>
									<th>Address </th>
									<th>Contact No.</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="table-plus">Gloria F. Mead</td>
									<td>25</td>
									<td>Sagittarius</td>
									<td>Abhisekh </td>
									<td>9099740074</td>
									<td>
										<div class="dropdown">
											<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="fa fa-ellipsis-h"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" data-toggle="modal" data-target="#modalFormView"><i class="fa fa-eye"></i> View</a>
												<a class="dropdown-item" data-toggle="modal" data-target="#modalFormEdit"><i class="fa fa-pencil"></i> Edit</a>
												<a href="#myModal" class="dropdown-item" data-toggle="modal"><i class="fa fa-trash"></i> Delete</a>
											</div>
										</div>
									</td>
								</tr>
								<tr>
									<td class="table-plus">Andrea J. Cagle</td>
									<td>30</td>
									<td>Gemini</td>
									<td>Abhisekh </td>
									<td>9099740074</td>
									<td>
										<div class="dropdown">
											<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="fa fa-ellipsis-h"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" data-toggle="modal" data-target="#modalFormView"><i class="fa fa-eye"></i> View</a>
												<a class="dropdown-item" data-toggle="modal" data-target="#modalFormEdit"><i class="fa fa-pencil"></i> Edit</a>
												<a href="#myModal" class="dropdown-item" data-toggle="modal"><i class="fa fa-trash"></i> Delete</a>
											</div>
										</div>
									</td>
								</tr>
								<tr>
									<td class="table-plus">Andrea J. Cagle</td>
									<td>20</td>
									<td>Gemini</td>
									<td>Abhisekh </td>
									<td>9099740074</td>
									<td>
										<div class="dropdown">
											<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="fa fa-ellipsis-h"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" data-toggle="modal" data-target="#modalFormView"><i class="fa fa-eye"></i> View</a>
												<a class="dropdown-item" data-toggle="modal" data-target="#modalFormEdit"><i class="fa fa-pencil"></i> Edit</a>
												<a href="#myModal" class="dropdown-item" data-toggle="modal"><i class="fa fa-trash"></i> Delete</a>
											</div>
										</div>
									</td>
								</tr>
								<tr>
									<td class="table-plus">Andrea J. Cagle</td>
									<td>30</td>
									<td>Sagittarius</td>
									<td>Abhisekh </td>
									<td>9099740074</td>
									<td>
										<div class="dropdown">
											<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="fa fa-ellipsis-h"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" data-toggle="modal" data-target="#modalFormView"><i class="fa fa-eye"></i> View</a>
												<a class="dropdown-item" data-toggle="modal" data-target="#modalFormEdit"><i class="fa fa-pencil"></i> Edit</a>
												<a href="#myModal" class="dropdown-item" data-toggle="modal"><i class="fa fa-trash"></i> Delete</a>

											</div>
										</div>
									</td>
								</tr>
								<tr>
									<td class="table-plus">Andrea J. Cagle</td>
									<td>25</td>
									<td>Gemini</td>
									<td>Abhisekh </td>
									<td>9099740074</td>
									<td>
										<div class="dropdown">
											<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="fa fa-ellipsis-h"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" data-toggle="modal" data-target="#modalFormView"><i class="fa fa-eye"></i> View</a>
												<a class="dropdown-item" data-toggle="modal" data-target="#modalFormEdit"><i class="fa fa-pencil"></i> Edit</a>
												<a href="#myModal" class="dropdown-item" data-toggle="modal"><i class="fa fa-trash"></i> Delete</a>
											</div>
										</div>
									</td>
								</tr>
								<tr>
									<td class="table-plus">Andrea J. Cagle</td>
									<td>20</td>
									<td>Sagittarius</td>
									<td>Abhisekh </td>
									<td>9099740074</td>
									<td>
										<div class="dropdown">
											<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="fa fa-ellipsis-h"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" data-toggle="modal" data-target="#modalFormView"><i class="fa fa-eye"></i> View</a>
												<a class="dropdown-item" data-toggle="modal" data-target="#modalFormEdit"><i class="fa fa-pencil"></i> Edit</a>
												<a href="#myModal" class="dropdown-item" data-toggle="modal"><i class="fa fa-trash"></i> Delete</a>
											</div>
										</div>
									</td>
								</tr>
								<tr>
									<td class="table-plus">Andrea J. Cagle</td>
									<td>18</td>
									<td>Gemini</td>
									<td>Abhisekh </td>
									<td>9099740074</td>
									<td>
										<div class="dropdown">
											<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="fa fa-ellipsis-h"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" data-toggle="modal" data-target="#modalFormView"><i class="fa fa-eye"></i> View</a>
												<a class="dropdown-item" data-toggle="modal" data-target="#modalFormEdit"><i class="fa fa-pencil"></i> Edit</a>
												<a href="#myModal" class="dropdown-item" data-toggle="modal"><i class="fa fa-trash"></i> Delete</a>
											</div>
										</div>
									</td>
								</tr>
								<tr>
									<td class="table-plus">Andrea J. Cagle</td>
									<td>30</td>
									<td>Sagittarius</td>
									<td>Abhisekh </td>
									<td>9099740074</td>
									<td>
										<div class="dropdown">
											<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="fa fa-ellipsis-h"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" data-toggle="modal" data-target="#modalFormView"><i class="fa fa-eye"></i> View</a>
												<a class="dropdown-item" data-toggle="modal" data-target="#modalFormEdit"><i class="fa fa-pencil"></i> Edit</a>
												<a href="#myModal" class="dropdown-item" data-toggle="modal"><i class="fa fa-trash"></i> Delete</a>
											</div>
										</div>
									</td>
								</tr>
								<tr>
									<td class="table-plus">Andrea J. Cagle</td>
									<td>30</td>
									<td>Sagittarius</td>
									<td>Abhisekh </td>
									<td>9099740074</td>
									<td>
										<div class="dropdown">
											<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="fa fa-ellipsis-h"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" data-toggle="modal" data-target="#modalFormView"><i class="fa fa-eye"></i> View</a>
												<a class="dropdown-item" data-toggle="modal" data-target="#modalFormEdit"><i class="fa fa-pencil"></i> Edit</a>
												<a href="#myModal" class="dropdown-item" data-toggle="modal"><i class="fa fa-trash"></i> Delete</a>
											</div>
										</div>
									</td>
								</tr>
								<tr>
									<td class="table-plus">Andrea J. Cagle</td>
									<td>30</td>
									<td>Gemini</td>
									<td>Abhisekh </td>
									<td>9099740074</td>
									<td>
										<div class="dropdown">
											<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="fa fa-ellipsis-h"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" data-toggle="modal" data-target="#modalFormView"><i class="fa fa-eye"></i> View</a>
												<a class="dropdown-item" data-toggle="modal" data-target="#modalFormEdit"><i class="fa fa-pencil"></i> Edit</a>
												<a href="#myModal" class="dropdown-item" data-toggle="modal"><i class="fa fa-trash"></i> Delete</a>
											</div>
										</div>
									</td>
								</tr>
								<tr>
									<td class="table-plus">Andrea J. Cagle</td>
									<td>30</td>
									<td>Gemini</td>
									<td>Abhisekh </td>
									<td>9099740074</td>
									<td>
										<div class="dropdown">
											<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="fa fa-ellipsis-h"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" data-toggle="modal" data-target="#modalFormView"><i class="fa fa-eye"></i> View</a>
												<a class="dropdown-item" data-toggle="modal" data-target="#modalFormEdit"><i class="fa fa-pencil"></i> Edit</a>
												<a href="#myModal" class="dropdown-item" data-toggle="modal"><i class="fa fa-trash"></i> Delete</a>
											</div>
										</div>
									</td>
								</tr>
								<tr>
									<td class="table-plus">Andrea J. Cagle</td>
									<td>30</td>
									<td>Gemini</td>
									<td>Abhisekh </td>
									<td>9099740074</td>
									<td>
										<div class="dropdown">
											<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="fa fa-ellipsis-h"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" data-toggle="modal" data-target="#modalFormView"><i class="fa fa-eye"></i> View</a>
												<a class="dropdown-item" data-toggle="modal" data-target="#modalFormEdit"><i class="fa fa-pencil"></i> Edit</a>
												<a href="#myModal" class="dropdown-item" data-toggle="modal"><i class="fa fa-trash"></i> Delete</a>
											</div>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<!-- Simple Datatable End -->
				<!-- multiple select row Datatable start -->
				<!-- multiple select row Datatable End -->
				<!-- Export Datatable start -->
				
				<!-- Export Datatable End -->
			</div>
			
			<!-- Modal -->
<div class="modal fade" id="modalForm" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Add Service</h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form role="form">
                   
                   <div class="form-group">
						<label >  Visitor Name:</label>
						<input type="text" class="form-control" name="visitor_name" id="o_number">
  				</div>
				
				<div class="form-group">
				<label >  Mobile No.:</label>
				<input type="text" class="form-control" name="mobile_no" id="o_number">
				</div>
				<div class="form-group">
				<label >  Vehicle Number:</label>
				<input type="text" class="form-control" name="vehicle_number" id="o_number">
				</div>
				<div class="form-group">
											<label >  Reason For Visit Name:</label>
											<input type="text" class="form-control" name="reason_for_visit" id="o_number">
										</div>
										
			    <div class="form-group">
											<label >  Select Wing Name:</label>
											<select name="secretary_name" class="form-control">
											<option>Nita</option>
											<option>Mita</option>
											</select>
							</div>
						
				<div class="form-group">
											<label >  Select House No.:</label>
											<select name="house_no" class="form-control">
											<option>1002</option>
											<option>1003</option>
											</select>
										</div>
										
										
										<div class="form-group">
											<label>Checkin Date Amount :</label>
											<input type="date" class="form-control" name="check_in_date">
										</div>
										
										<div class="form-group">
											<label>Check In Time Amount :</label>
											<input type="date" class="form-control" name="check_in_time">
										</div>
                     <div class="form-group">
                        <label for="inputName">Email Id:</label>
                        <input type="text" class="form-control" id="inputName" placeholder="Enter Email Id"/>
                    </div>
                </form>
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary submitBtn" onClick="submitContactForm()">SUBMIT</button>
            </div>
        </div>
    </div>
</div>



<!-- Modal View -->
<div class="modal fade" id="modalFormView" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">View Visitor</h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
           <form role="form">
                   
                   <div class="form-group">
						<label >  Visitor Name:</label>
						<input type="text" class="form-control" name="visitor_name" id="o_number">
  				</div>
				
				<div class="form-group">
				<label >  Mobile No.:</label>
				<input type="text" class="form-control" name="mobile_no" id="o_number">
				</div>
				<div class="form-group">
				<label >  Vehicle Number:</label>
				<input type="text" class="form-control" name="vehicle_number" id="o_number">
				</div>
				<div class="form-group">
											<label >  Reason For Visit Name:</label>
											<input type="text" class="form-control" name="reason_for_visit" id="o_number">
										</div>
										
			    <div class="form-group">
											<label >  Select Wing Name:</label>
											<select name="secretary_name" class="form-control">
											<option>Nita</option>
											<option>Mita</option>
											</select>
							</div>
						
				<div class="form-group">
											<label >  Select House No.:</label>
											<select name="house_no" class="form-control">
											<option>1002</option>
											<option>1003</option>
											</select>
										</div>
										
										
										<div class="form-group">
											<label>Checkin Date Amount :</label>
											<input type="date" class="form-control" name="check_in_date">
										</div>
										
										<div class="form-group">
											<label>Check In Time Amount :</label>
											<input type="date" class="form-control" name="check_in_time">
										</div>
                     <div class="form-group">
                        <label for="inputName">Email Id:</label>
                        <input type="text" class="form-control" id="inputName" placeholder="Enter Email Id"/>
                    </div>
                </form>
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit-->
<div class="modal fade" id="modalFormEdit" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Edit Visitor</h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
           <form role="form">
                   
                   <div class="form-group">
						<label >  Visitor Name:</label>
						<input type="text" class="form-control" name="visitor_name" id="o_number">
  				</div>
				
				<div class="form-group">
				<label >  Mobile No.:</label>
				<input type="text" class="form-control" name="mobile_no" id="o_number">
				</div>
				<div class="form-group">
				<label >  Vehicle Number:</label>
				<input type="text" class="form-control" name="vehicle_number" id="o_number">
				</div>
				<div class="form-group">
											<label >  Reason For Visit Name:</label>
											<input type="text" class="form-control" name="reason_for_visit" id="o_number">
										</div>
										
			    <div class="form-group">
											<label >  Select Wing Name:</label>
											<select name="secretary_name" class="form-control">
											<option>Nita</option>
											<option>Mita</option>
											</select>
							</div>
						
				<div class="form-group">
											<label >  Select House No.:</label>
											<select name="house_no" class="form-control">
											<option>1002</option>
											<option>1003</option>
											</select>
										</div>
										
										
										<div class="form-group">
											<label>Checkin Date Amount :</label>
											<input type="date" class="form-control" name="check_in_date">
										</div>
										
										<div class="form-group">
											<label>Check In Time Amount :</label>
											<input type="date" class="form-control" name="check_in_time">
										</div>
                     <div class="form-group">
                        <label for="inputName">Email Id:</label>
                        <input type="text" class="form-control" id="inputName" placeholder="Enter Email Id"/>
                    </div>
                </form>
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary submitBtn" onClick="submitContactForm()">SUBMIT</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal Delete -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header">
				<div class="icon-box">
					<i class="material-icons">&#xE5CD;</i>
				</div>				
				<h4 class="modal-title">Are you sure?</h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<p>Do you really want to delete these records? This process cannot be undone.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-danger">Delete</button>
			</div>
		</div>
	</div>


			<?php include('include/footer.php'); ?>
		</div>
	</div>
	<?php include('include/script.php'); ?>
	<script src="src/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="src/plugins/datatables/media/js/dataTables.bootstrap4.js"></script>
	<script src="src/plugins/datatables/media/js/dataTables.responsive.js"></script>
	<script src="src/plugins/datatables/media/js/responsive.bootstrap4.js"></script>
	<!-- buttons for Export datatable -->
	<script src="src/plugins/datatables/media/js/button/dataTables.buttons.js"></script>
	<script src="src/plugins/datatables/media/js/button/buttons.bootstrap4.js"></script>
	<script src="src/plugins/datatables/media/js/button/buttons.print.js"></script>
	<script src="src/plugins/datatables/media/js/button/buttons.html5.js"></script>
	<script src="src/plugins/datatables/media/js/button/buttons.flash.js"></script>
	<script src="src/plugins/datatables/media/js/button/pdfmake.min.js"></script>
	<script src="src/plugins/datatables/media/js/button/vfs_fonts.js"></script>
	<script>
		$('document').ready(function(){
			$('.data-table').DataTable({
				scrollCollapse: true,
				autoWidth: false,
				responsive: true,
				columnDefs: [{
					targets: "datatable-nosort",
					orderable: false,
				}],
				"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
				"language": {
					"info": "_START_-_END_ of _TOTAL_ entries",
					searchPlaceholder: "Search"
				},
			});
			$('.data-table-export').DataTable({
				scrollCollapse: true,
				autoWidth: false,
				responsive: true,
				columnDefs: [{
					targets: "datatable-nosort",
					orderable: false,
				}],
				"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
				"language": {
					"info": "_START_-_END_ of _TOTAL_ entries",
					searchPlaceholder: "Search"
				},
				dom: 'Bfrtip',
				buttons: [
				'copy', 'csv', 'pdf', 'print'
				]
			});
			var table = $('.select-row').DataTable();
			$('.select-row tbody').on('click', 'tr', function () {
				if ($(this).hasClass('selected')) {
					$(this).removeClass('selected');
				}
				else {
					table.$('tr.selected').removeClass('selected');
					$(this).addClass('selected');
				}
			});
			var multipletable = $('.multiple-select-row').DataTable();
			$('.multiple-select-row tbody').on('click', 'tr', function () {
				$(this).toggleClass('selected');
			});
		});
	</script>
</body>
</html>