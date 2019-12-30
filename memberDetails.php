
<!DOCTYPE html>
<html>
<head>
	<?php include "api/config/database.php"; ?>
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
<h1>hello</h1>




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
    Add Member
</button>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">DataTable</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
									October 2019
								</a>
								<div class="dropdown-menu dropdown-menu-right">
									<a href="#myModal" class="dropdown-item" data-toggle="modal">Export List</a>
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
							<h5 class="text-blue">Data Table Simple</h5>
							<p class="font-14">you can find more options <a class="text-primary" href="https://datatables.net/" target="_blank">Click Here</a></p>
						</div>
					</div>
					<div class="row">
						<table class="data-table stripe hover nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">Owner Code</th>
									<th>Owner Name</th>
									<th>Contact No</th>
									<th>Registered  Date</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
							<?php
								$database = new Database();
								$db = $database->getConnection();

								$query = "SELECT * FROM owner ORDER BY owner_id";
								$d = $db->query($query); 
								foreach ($d as $data) 
								{			
									echo "<tr>";
									echo "<td class='table-plus'>".$data['owner_code']."</td>";
									echo "<td>".$data['first_name']." ".$data['middle_name']." ".$data['last_name']. "</td>";
									echo "<td>".$data['contact_no']."</td>";
									echo "<td>".$data['created_date']."</td>";
									?>
									<td>
										<div class="dropdown">
											<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="fa fa-ellipsis-h"></i></a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" data-toggle="modal" data-target="#modalFormView"><i class="fa fa-eye"></i> View</a>
												<a class="dropdown-item" data-toggle="modal" data-target="#modalFormEdit"><i class="fa fa-pencil"></i> Edit</a>
												<a href="#myModal" class="dropdown-item" data-toggle="modal"><i class="fa fa-trash"></i> Delete</a>
											</div>
										</div>
									</td>
								</tr>

								<?php
								}											
								?>
								

							</tbody>
						</table>
					</div>
				</div>
				<!-- Simple Datatable End -->
				<!-- multiple select row Datatable start -->
				<!-- multiple select row Datatable End -->
				<!-- Export Datatable start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h5 class="text-blue">Data Table with Export Buttons</h5>
						</div>
					</div>
					<div class="row">
						<table class="stripe hover multiple-select-row data-table-export nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">Name</th>
									<th>Age</th>
									<th>Office</th>
									<th>Address</th>
									<th>Start Date</th>
									<th>Salart</th>
								</tr>
							</thead>
							
						</table>
					</div>
				</div>
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
                <h4 class="modal-title" id="myModalLabel">Add Memeber</h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form role="form">
                   
                    <div class="form-group">
                        <label for="inputEmail">Society Name</label>
                        <select class="form-control" id="inputEmail">
						<option>Alap</option>
						<option>Geen</option>
						<option>Golden</option>
						<option>Member</option>
						<option>Secretary</option>
						</select>
                    </div>
					
					 <div class="form-group">
                        <label for="inputEmail">Wing Name</label>
                        <select name="wing_no" class="form-control">
									<option>A</option>
									<option>B</option>
									<option>C</option>
									<option>D</option>
									<option>E</option>
									<option>E</option>
									</select>
									
					 </div>
					<div class="form-group">
                        <label for="inputEmail">Flat No.</label>
                        label > Flat No.:</label>
											<select name="flat_no" class="form-control">
											<option>A001</option>
											<option>B003</option>
											<option>C068</option>
											<option>A123</option>											
											</select>
                    </div>
					
					<div class="form-group">
                        <label for="inputEmail">Title</label>
                        <select name="title" class="form-control">
											<option>Associate Member</option>
											<option>Chairman</option>
											<option>Joint Member</option>
											<option>Member</option>
											<option>Secretary</option>
											<option>Treasures</option>
											</select>
                    </div>
					
					<div class="form-group">
                        <label for="inputEmail">Prefix</label>
                       <select name="prefix" class="form-control">
											<option>Mr.</option>
											<option>Mrs</option>
											<option>Master</option>
											<option>Miss</option>
											<option>Dr</option>
											<option>Capt</option>
						</select>
                    </div>
                    
                    
					<div class="form-group">
                        <label for="inputName">First Name:</label>
                        <input type="text" class="form-control" id="inputName" placeholder="Enter First Name"/>
                    </div>
					<div class="form-group">
                        <label for="inputName">Middle Name :</label>
                        <input type="text" class="form-control" id="inputName" placeholder="Enter Middle Name"/>
                    </div>
					<div class="form-group">
                        <label for="inputName">Last  Name :</label>
                        <input type="text" class="form-control" id="inputName" placeholder="Enter Last Name"/>
                    </div>
					<div class="form-group">
                        <label for="inputName">Email Id :</label>
                        <input type="email" class="form-control" id="inputName" placeholder="Enter Email Id"/>
                    </div>
					<div class="form-group">
                        <label for="inputName">Address :</label>
                        <input type="text" class="form-control" id="inputName" placeholder="Enter Address"/>
                    </div>
					<div class="form-group">
                        <label for="inputName">State:</label>
                        <input type="text" class="form-control" id="inputName" placeholder="Enter State"/>
                    </div>
					<div class="form-group">
                        <label for="inputName">City :</label>
                        <input type="text" class="form-control" id="inputName" placeholder="Enter City"/>
                    </div>
					<div class="form-group">
                        <label for="inputName">Pancard No. :</label>
                        <input type="text" class="form-control" id="inputName" placeholder="Enter Pancard No."/>
                    </div>
					<div class="form-group">
                        <label for="inputName">Adhar Card No. :</label>
                        <input type="text" class="form-control" id="inputName" placeholder="Enter Adhar Card No."/>
                    </div>
					<div class="form-group">
                        <label for="inputName">Contact No. :</label>
                        <input type="text" class="form-control" id="inputName" placeholder="Enter Contact No."/>
                    </div>
					<div class="form-group">
                        <label for="inputName">Alternate Contact No. :</label>
                        <input type="text" class="form-control" id="inputName" placeholder="Enter Contact No."/>
                    </div>
					
					 <div class="form-group">
                       <label > Registered As:</label>
											<select name="register_as" class="form-control">
											<option>Main Member</option>
											<option>Joint Member</option>
											<option>Default Member</option>																				
											</select>
                    </div>
					<div class="form-group">
                        <label for="inputName">Upload Profile Pics :</label>
                        <input type="file" class="form-control" id="inputName" />
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
                <h4 class="modal-title" id="myModalLabel">View Member</h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
           <form role="form">
                   
                    <div class="form-group">
                        <label for="inputEmail">Society Name</label>
                         </div>
					
					 <div class="form-group">
                        <label for="inputEmail">Wing Name</label>
                        			
					 </div>
					<div class="form-group">
                        <label for="inputEmail">Flat No.</label>
                        label > Flat No.:</label>
						 </div>
					
					<div class="form-group">
                        <label for="inputEmail">Title</label>
                        </div>
					
					<div class="form-group">
                        <label for="inputEmail">Prefix</label>
                       
                    </div>
                    
                    
					<div class="form-group">
                        <label for="inputName">First Name:</label>
                         </div>
					<div class="form-group">
                        <label for="inputName">Middle Name :</label>
                        </div>
					<div class="form-group">
                        <label for="inputName">Last  Name :</label>
                         </div>
					<div class="form-group">
                        <label for="inputName">Email Id :</label>
                         </div>
					<div class="form-group">
                        <label for="inputName">Address :</label>
                        </div>
					<div class="form-group">
                        <label for="inputName">State:</label>
                         </div>
					<div class="form-group">
                        <label for="inputName">City :</label>
                         </div>
					<div class="form-group">
                        <label for="inputName">Pancard No. :</label>
                        </div>
					<div class="form-group">
                        <label for="inputName">Adhar Card No. :</label>
                         </div>
					<div class="form-group">
                        <label for="inputName">Contact No. :</label>
                        </div>
					<div class="form-group">
                        <label for="inputName">Alternate Contact No. :</label>
                         </div>
					
					 <div class="form-group">
                       <label > Registered As:</label>
						 </div>
					<div class="form-group">
                        <label for="inputName">Upload Profile Pics :</label>
                        
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
                <h4 class="modal-title" id="myModalLabel">Edit Member</h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
            <form role="form">
                   
                    <div class="form-group">
                        <label for="inputEmail">Society Name</label>
                        <select class="form-control" id="inputEmail">
						<option>Alap</option>
						<option>Geen</option>
						<option>Golden</option>
						<option>Member</option>
						<option>Secretary</option>
						</select>
                    </div>
					
					 <div class="form-group">
                        <label for="inputEmail">Wing Name</label>
                        <select name="wing_no" class="form-control">
									<option>A</option>
									<option>B</option>
									<option>C</option>
									<option>D</option>
									<option>E</option>
									<option>E</option>
									</select>
									
					 </div>
					<div class="form-group">
                        <label for="inputEmail">Flat No.</label>
                        label > Flat No.:</label>
											<select name="flat_no" class="form-control">
											<option>A001</option>
											<option>B003</option>
											<option>C068</option>
											<option>A123</option>											
											</select>
                    </div>
					
					<div class="form-group">
                        <label for="inputEmail">Title</label>
                        <select name="title" class="form-control">
											<option>Associate Member</option>
											<option>Chairman</option>
											<option>Joint Member</option>
											<option>Member</option>
											<option>Secretary</option>
											<option>Treasures</option>
											</select>
                    </div>
					
					<div class="form-group">
                        <label for="inputEmail">Prefix</label>
                       <select name="prefix" class="form-control">
											<option>Mr.</option>
											<option>Mrs</option>
											<option>Master</option>
											<option>Miss</option>
											<option>Dr</option>
											<option>Capt</option>
						</select>
                    </div>
                    
                    
					<div class="form-group">
                        <label for="inputName">First Name:</label>
                        <input type="text" class="form-control" id="inputName" placeholder="Enter First Name"/>
                    </div>
					<div class="form-group">
                        <label for="inputName">Middle Name :</label>
                        <input type="text" class="form-control" id="inputName" placeholder="Enter Middle Name"/>
                    </div>
					<div class="form-group">
                        <label for="inputName">Last  Name :</label>
                        <input type="text" class="form-control" id="inputName" placeholder="Enter Last Name"/>
                    </div>
					<div class="form-group">
                        <label for="inputName">Email Id :</label>
                        <input type="email" class="form-control" id="inputName" placeholder="Enter Email Id"/>
                    </div>
					<div class="form-group">
                        <label for="inputName">Address :</label>
                        <input type="text" class="form-control" id="inputName" placeholder="Enter Address"/>
                    </div>
					<div class="form-group">
                        <label for="inputName">State:</label>
                        <input type="text" class="form-control" id="inputName" placeholder="Enter State"/>
                    </div>
					<div class="form-group">
                        <label for="inputName">City :</label>
                        <input type="text" class="form-control" id="inputName" placeholder="Enter City"/>
                    </div>
					<div class="form-group">
                        <label for="inputName">Pancard No. :</label>
                        <input type="text" class="form-control" id="inputName" placeholder="Enter Pancard No."/>
                    </div>
					<div class="form-group">
                        <label for="inputName">Adhar Card No. :</label>
                        <input type="text" class="form-control" id="inputName" placeholder="Enter Adhar Card No."/>
                    </div>
					<div class="form-group">
                        <label for="inputName">Contact No. :</label>
                        <input type="text" class="form-control" id="inputName" placeholder="Enter Contact No."/>
                    </div>
					<div class="form-group">
                        <label for="inputName">Alternate Contact No. :</label>
                        <input type="text" class="form-control" id="inputName" placeholder="Enter Contact No."/>
                    </div>
					
					 <div class="form-group">
                       <label > Registered As:</label>
											<select name="register_as" class="form-control">
											<option>Main Member</option>
											<option>Joint Member</option>
											<option>Default Member</option>																				
											</select>
                    </div>
					<div class="form-group">
                        <label for="inputName">Upload Profile Pics :</label>
                        <input type="file" class="form-control" id="inputName" />
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