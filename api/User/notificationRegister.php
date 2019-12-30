<?php
 
// get database connection
include_once '../config/database.php';
 
// instantiate user object
include_once '../objects/Notification.php';
 
$database = new Database();
$db = $database->getConnection();
$notification = new Notification($db);
 
 
// set user property values
$notification->notificationName = $_POST['notifiaction_name'];
$notification->notificationDescription = $_POST['notifiaction_description'];
$notification->createdDate = date('Y-m-d H:i:s');
$notification->createdBy = 'cssniraj';
 
// create the user

if($notification->eventRegister()){
    $notification_arr=array(
        "status" => true,
        "message" => "Successfully Signup!",
        "id" => $notification->id,
        "event_title" => $notification->notificationName,		
		"society_code" => $notification->notificationDescription,
        "created_date"=> $notification->created_date,
        "created_by" => $notification->created_by,
		 );
}
else{
    $notification_arr=array(
        "status" => false,
        "message" => "Username already exists!"
    );
}

print_r(json_encode($notification_arr));
?>