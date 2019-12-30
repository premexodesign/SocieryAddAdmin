<?php
 
// get database connection
include_once '../config/database.php';
 
// instantiate user object
include_once '../objects/Bill.php';
 
$database = new Database();
$db = $database->getConnection();
$bill = new Bill($db);
 
 
// set user property values
$bill->agencyName = $_POST['event_title'];
$bill->billNo = $_POST['ssociety_name'];
$bill->societyCode=$_POST['Society_Code'];
$bill->societyAddress = $_POST['start_date'];
$bill->billDate = $_POST['start_time'];
$bill->billType = $_POST['end_date'];
$bill->billAmount = $_POST['end_time'];
$bill->description = $_POST['description'];
$bill->createdDate = date('Y-m-d H:i:s');
$bill->createdBy = 'cssniraj';
 
// create the user

if($event->eventRegister()){
    $event_arr=array(
        "status" => true,
        "message" => "Successfully Signup!",
        "id" => $bill->id,
        "event_title" => $event->agencyName,		
		"society_code" => $bill->billNo,
        "start_date" => $bill->societyAddress,
		"start_time" => $bill->billDate,
        "end_date" => $bill->billType,
		"end_time" => $bill->billAmount,
        "description" => $bill->description,
        "created_date"=> $bill->created_date,
        "created_by" => $bill->created_by,
		 );
}
else{
    $event_arr=array(
        "status" => false,
        "message" => "Username already exists!"
    );
}

print_r(json_encode($event_arr));
?>