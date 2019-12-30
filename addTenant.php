<!DOCTYPE html>
<html>
<head>
	<?php include('include/head.php'); ?>
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/dataTables.bootstrap4.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/responsive.dataTables.css">
	<style type="text/css">
	

		.bac
		{
			display: none;

		}


	</style>
	<script type="text/javascript">
	/*	function family(){
			$(".fam").css("display","inline");			
			$(".bac").css("display","none");			
		}
		function bachelor(){	
			$(".bac").css("display","inline");	
			$(".fam").css("display","none");		
		}
		function bclr()
		{
			$(".bac").css("display","none");
			$(".fam").css("display","none");
		}*/
	</script>
</head>
<body>
	<?php 
	include('include/header.php');
	$username=$_SESSION['username'];
	
	include('include/sidebar.php');
	
	include('include/config.php');
	
?>
	<div class="fam">
	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
		<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix">
						<h4 class="text-blue">Tenant wizard</h4>
						<p class="mb-30 font-14">Tenant </p>
					</div>
					<div class="wizard-content">
					<form action="api/User/tenantRegistration.php" role="form" id="form1" method="post" enctype="multipart/form-data"  class="tab-wizard wizard-circle wizard">
						
							<h5></h5>
							<section>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label > House ID:</label>
											<select name="house_id" class="form-control">
											<option name=""></option>
											</select>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>First Name :</label>
											<input type="text" class="form-control" name="first_name" id="first_name">
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Middle Name :</label>
											<input type="text" class="form-control" name="middle_name" id="middle_name">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Last Name :</label>
											<input type="text" class="form-control" name="last_name" id="last_name">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Email ID :</label>
											<input type="email" class="form-control" name="email_id" id="email_id">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Permanent Addresss :</label>
											<textarea class="form-control" cols="10" rows="10" name="permanent_address" id="address"></textarea>
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
											<label>Pincode :</label>
											<input type="text" class="form-control" name="pincode" id="pincode">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Pancard No. :</label>
											<input type="text" class="form-control" name="pancard_no" id="pancard_no">
										</div>
									</div>
								</div>
								<section>
										<div class="form-group">
											<label>Upload Pancard Image :</label>
											<input type="file" name="pancard_img" id="profile-img" required/>
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
											<label>Adharcard No. :</label>
											<input type="text" class="form-control" name="aadharcard_no" id="adharcard_no">
										</div>
									</div>
								</div>

								<section>
										<div class="form-group">
											<label>Upload Aadharcard Image :</label>
											<input type="file" name="aadharcard_img" id="profile-img" required/>
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
											<label>Contact No. :</label>
											<input type="number" class="form-control" name="contact_no" id="contact_no">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Reference Contact No 1 :</label>
											<input type="text" class="form-control" name="ref_contact1" id="contact_no">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Reference Contact No 2 :</label>
											<input type="text" class="form-control" name="ref_contact2" id="contact_no">
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Rent Deed Start Date :</label>
											<input type="date" class="form-control" name="rent_start" id="rent_deed_start_date">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Rent Deed End Date :</label>
											<input type="date" class="form-control" name="rent_end" id="rent_deed_end_date">
										</div>
									</div>
								</div>

								<section>
										<div class="form-group">
											<label>Rent Aggrement  Upload :</label>
											<input type="file" name="rent_agreement" id="profile-img" required/>
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
											<label>Tenant Type :</label>
											<select name="tenant_type" class="form-control">
											<option name="family">Family</option>
											<option name="bachelor">Bachelor</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Total Person :</label>
											<input type="text" class="form-control" name="total_person" id="total_person">
										</div>
									</div>
								</div>
								
							</section>
							<!-- Step 2 -->
							
							

								

							
							<section>
								
									
										<div class="form-group">
											<label>Select Profile Pics :</label>
											<input type="file" name="profile_pic" id="profile-img" required/>
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
											<input  type="hidden" name="reg" value="tenant" />
											<input  type="submit" name="" value="Add Tenant" class="btn btn-primary"/>
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


	<!-- Bachelor  Registration -->
	<div class="bac">
	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="pd-20 bg-white border-radius-4 box-shadow mb-30 ">
					<div class="clearfix">
						<h4 class="text-blue">Tenant wizard</h4>
						<p class="mb-30 font-14">Tenant </p>
					</div>
					<div class="select">
						<button class= "btn btn-primary" id="btn1" onclick="family()">Family</button>
						<button class= "btn btn-primary" id="btn2" onclick="bachelor()">Bachelor</button>
					</div>

					<div class="wizard-content2">
							<form action="#" role="form" id="form2" method="post" enctype="multipart/form-data"  class="tab-wizard wizard-circle wizard">
								<section >
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label > Total Bachelor:</label>
												<input type="text" name="tb" placeholder="No. of Bachelors" class="form-control">
												<button onclick="bclr()" class="btn btn-primary">Go</button>
											</div>
										</div>
									</div>
								</section>
							</form>
						</div>	
					</div>
			</div>
		</div>
	</div>

</body>
</html>