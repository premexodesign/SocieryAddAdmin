<?php
 
// get database connection
include_once '../config/database.php';
 
// instantiate user object
include_once '../objects/Agency.php';
 
$database = new Database();
$db = $database->getConnection();
$agency = new Agency($db);
 
 
// set user property values
$agency->agencyName = $_POST['agency_name'];
$agency->cotegoryOfServices = $_POST['cat_of_services'];
$agency->officeContactNo = $_POST['office_number'];
$agency->pancardNo = $_POST['pan_number'];
$agency->tanNo = $_POST['tan_number'];
$agency->concernPersonName = $_POST['con_percon_name'];
$agency->otherDetails = $_POST['other_details'];
$agency->createdDate = date('Y-m-d H:i:s');
$agency->createdBy = 'cssniraj';
 
// create the user

if($agency->eventRegister()){
    $agency_arr=array(
        "status" => true,
        "message" => "Successfully Signup!",
        "id" => $agency->id,
        "agency_name" => $agency->agencyName,		
		"cotegory_of_services" => $agency->cotegoryOfServices,
        "office_no" => $agency->officeContactNo,
		"pancard_no" => $agency->pancardNo,
        "tan_no" => $agency->tanNo,
		"concern_person_name" => $agency->concernPersonName,
        "other_details" => $agency->otherDetails,
        "created_date"=> $agency->created_date,
        "created_by" => $agency->created_by,
		 );
}
else{
    $agency_arr=array(
        "status" => false,
        "message" => "Username already exists!"
    );
}

print_r(json_encode($agency_arr));
?>