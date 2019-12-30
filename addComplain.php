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
	$username=$_SESSION['username'];
	
	include('include/sidebar.php');
	
	include('include/config.php');
	
?>
	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
		<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix">
						<h4 class="text-blue">Complain wizard</h4>
						<p class="mb-30 font-14">Complain </p>
					</div>
					<div class="wizard-content">
						<form class="tab-wizard wizard-circle wizard"  method="post" action="function.php">
							<h5></h5>
							<section>
								
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label > Society Name:</label>
											<select name="title" class="form-control">
											<option>Alap</option>
											<option>Geen</option>
											<option>Golden</option>
											<option>Member</option>
											<option>Secretary</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label > Wing No.:</label>
											<select name="wing_no" class="form-control">
											<option>A</option>
											<option>B</option>
											<option>C</option>
											<option>D</option>
											<option>E</option>
											<option>E</option>
											</select>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label > Flat No.:</label>
											<select name="flat_no" class="form-control">
											<option>A001</option>
											<option>B003</option>
											<option>C068</option>
											<option>A123</option>											
											</select>
										</div>
									</div>
								</div>
								
								
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label >  Complain Nature :</label>
											<select name="secretary_name" class="form-control">
											<option>Complain</option>
											<option>Suggestion</option>
											<option>Request</option>
											</select>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label >  Complain Type :</label>
											<select name="secretary_name" class="form-control">
											<option>Individual</option>
											<option>Society</option>
											<option>Group</option>
											</select>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label >  Member  :</label>
											<select name="member_name" class="form-control">
											<option>Complain</option>
											<option>Suggestion</option>
											<option>Request</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label >  Complain Title:</label>
											<input type="text" class="form-control" name="complian_name" id="o_number">
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label >  Category  :</label>
											<select name="category_name" class="form-control">
											<option>Cleaning</option>
											<option>Plumbing</option>
											<option>House Keeping</option>
											<option>Parking</option>
											<option>Security</option>
											<option>General Maintenance</option>
											<option>Internet Service</option>
											<option>Lift Maintenance</option>
											<option>Club House</option>
											<option>Gym</option>
											<option>Swimming Pool</option>
											<option>Pigeon Net</option>
											<option>Pest Control</option>
											<option>Other</option>
											
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Complain Date :</label>
											<input type="date" class="form-control" name="f_name">
										</div>
									</div>
								</div>
								
								
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label >  Created By  :</label>
											<select name="member_name" class="form-control">
											<option>Complain</option>
											<option>Suggestion</option>
											<option>Request</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Staus :</label>
											<input type="radio"  name="email_id">Open
											<input type="radio" name="email_id">Close
											
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Escalation Lavel :</label>
											<input type="text" class="form-control" name="esc_level">
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Is Urgent :</label>
											<input type="checkbox" class="form-control" name="is_urgent">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Description :</label>
											<textarea class="form-control" cols="10" rows="15"></textarea>
										</div>
									</div>
								</div>
								
							<section>
								
									
										<div class="form-group">
											<label>Add Attachment about Complain :</label>
											<input type="file" name="complaint" id="profile-img" required/>
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
							
								
							<!--	<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Password :</label>
											<input type="password" class="form-control" name="password">
										</div>
									</div>
									</div>
										<div class="row">
										<div class="col-md-6">
										<div class="form-group">
											<label>Phone Number :</label>
											<input type="text" class="form-control" name="contact">
										</div>
									</div>
								</div>
								<div class="row">-->
									<!--<div class="col-md-6">
										<div class="form-group">
											<label >Date of Birth :</label>
											<input type="text" class="form-control date-picker" placeholder="Select Date">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Address :</label>
											<input type="text" class="form-control" name="address">
										</div>
									</div>
								</div>-->
									
							</section>
							<!-- Step 2 -->
							<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input  type="hidden" name="reg" value="complain" />
											<input  type="submit" name="" value="Add Complain" class="btn btn-primary"/>
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