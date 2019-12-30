<!DOCTYPE html>
<html>
<head>
	<?php include('include/head.php'); ?>
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/dataTables.bootstrap4.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/responsive.dataTables.css">
</head>
<body>
	<?php 
	include('include/header.php');
	//$username=$_SESSION['username'];
	
	include('include/sidebar.php');
	
	include('include/config.php');
	
?>
	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
		<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix">
						<h4 class="text-blue">Societ wizard</h4>
						<p class="mb-30 font-14">Society </p>
					</div>
					<div class="wizard-content">
						<form class="tab-wizard wizard-circle wizard"  method="post" action="api/User/societyRegister.php" enctype="multipart/form-data">
							<h5></h5>
							<section>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label >  Society Code:</label>
											<input type="text" class="form-control" name="society_code" id="society_code">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Society Name :</label>
											<input type="text" class="form-control" name="society_name" id="society_name">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label > Society Type:</label>
											<select name="society_type" class="form-control" id="society_type">
											<option>Residential</option>
											<option>Commercial</option>
																													
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Society Address :</label>
											<textarea class="form-control" cols="10" rows="15" name="society_address"></textarea>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>City :</label>
											<input type="text" class="form-control" name="city" id="city">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>State :</label>
											<input type="text" class="form-control" name="state" id="state">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Pincode:</label>
											<input type="text" class="form-control" name="pincode" id="pincode">
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Contact No. :</label>
											<input type="number" class="form-control" name="contact_no" id="contactno">
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Society Email Id :</label>
											<input type="email" class="form-control" name="email_id" id="email_id">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Society Website  :</label>
											<input type="text" class="form-control" name="society_web" id="society_web">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Society Other Details :</label>
											<input type="text" class="form-control" name="society_other" id="society_other">
										</div>
									</div>
								</div>


									
							</section>
							<!-- Step 2 -->
							
							
							<section>
								
									
										<div class="form-group">
											<label>Select Society Profile Pics :</label>
											<input type="file" name='file' id="profile-img" required/>
											 <img src="" id="profile-img-tag" width="100px" />

                                  			  <script type="text/javascript">
                                   				     function readURL(input) {
													if (input.files && input.files[0]) {
                                            		    var reader = new FileReader();
                                                
                                              		  reader.onload = function (e) {
                                               		     $('#profile-img-tag').attr('src', e.target.result);
                                              			  }
                                               			 reader.readAsDataURL(input.files[0]);
                                           				 }
                                       				 }
                                      		  $("#profile-img").change(function(){
                                          		  readURL(this);
                                       		 });
                                   			 </script>
										</div>
									
								
								
								
							</section>	
								
							<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											
											<input type="checkbox" class="form-control" name="termco" id="termco">I agree to the <font color="blue">Terms & Conditions</font> 
										</div>
									</div>
								</div>

							<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input  type="hidden" name="reg" value="society" />
											<input  type="submit" name="" value="Add Society" class="btn btn-primary" />
										</div>
									</div>
							</div>
							<!-- Step 3 -->
							<!--<h5>Interview</h5>
							<section>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Interview For :</label>
											<input type="text" class="form-control">
										</div>
										<div class="form-group">
											<label>Interview Type :</label>
											<select class="form-control">
												<option>Normal</option>
												<option>Difficult</option>
												<option>Hard</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Interview Date :</label>
											<input type="text" class="form-control date-picker" placeholder="Select Date">
										</div>
										<div class="form-group">
											<label>Interview Time :</label>
											<input class="form-control time-picker" placeholder="Select time" type="text">
										</div>
									</div>
								</div>
							</section>-->
							<!-- Step 4 -->
							<!--<h5>Remark</h5>
							<section>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Behaviour :</label>
											<input type="text" class="form-control">
										</div>
										<div class="form-group">
											<label>Confidance</label>
											<input type="text" class="form-control">
										</div>
										<div class="form-group">
											<label>Result</label>
											<select class="form-control">
												<option>Select Result</option>
												<option>Selected</option>
												<option>Rejected</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Comments</label>
											<textarea class="form-control"></textarea>
										</div>
									</div>
								</div>
							</section>-->
						</form>
					</div>
				</div>
								
								
								
								
							</tbody>
						</table>
					</div>
				</div>
				<!-- Export Datatable End -->
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