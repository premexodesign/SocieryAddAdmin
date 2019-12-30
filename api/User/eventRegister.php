<?php
 
// get database connection
include_once '../config/database.php';
 
// instantiate user object
include_once '../objects/Event.php';
 
$database = new Database();
$db = $database->getConnection();
$event = new Event($db);
 
 
// set user property values
$event->eventTitle = $_POST['event_title'];
$event->societyCode = $_POST['ssociety_name'];
$event->startDate = $_POST['start_date'];
$event->startTime = $_POST['start_time'];
$event->endDate = $_POST['end_date'];
$event->endTime = $_POST['end_time'];
$event->description = $_POST['description'];
$event->createdDate = date('Y-m-d H:i:s');
$event->createdBy = 'cssniraj';
 
// create the user

if($event->eventRegister()){
    $event_arr=array(
        "status" => true,
        "message" => "Successfully Signup!",
        "id" => $event->id,
        "event_title" => $event->eventTitle,		
		"society_code" => $event->societyCode,
        "start_date" => $event->startDate,
		"start_time" => $event->startTime,
        "end_date" => $event->endDate,
		"end_time" => $event->endTime,
        "description" => $event->description,
        "created_date"=> $event->created_date,
        "created_by" => $event->created_by,
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