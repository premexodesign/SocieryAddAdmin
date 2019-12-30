<?php
 
// get database connection
include_once '../config/database.php';
 
// instantiate user object
include_once '../objects/House.php';
 
$database = new Database();
$db = $database->getConnection();
$home = new House($db);
 
$home->society_name = $_POST['society_name'];
$home->wing_name = $_POST['wing_name'];
$home->floor_no = $_POST['floor_no'];
$home->house_type = $_POST['house_type'];
$home->house_no = $_POST['house_no'];
$home->owner_name = $_POST['owner_name'];
$home->owner_code = 123;
$home->house_address = $_POST['house_address'];
$home->parking_four = $_POST['parking_four'];
$home->parking_two = $_POST['parking_two'];
$home->description = $_POST['description'];
$home->created_date = date("Y-m-d H-i-s");
$home->created_by = "Nirajkumar";



if($home->eventRegister()){
    $house_arr=array(
        "status" => true,
        "message" => "Successfully Signup!",
        "house_id" => $home->house_id,
        "owner_id" => $home->owner_id,
        "society_name" => $home->society_name,		    
        "wing_name" => $home->wing_name,
		"floor_no" => $home->floor_no,
		"house_type" => $home->house_type,
        "house_no" => $home->house_no,
        "owner_name" => $home->owner_name,
        "owner_code" => $home->owner_code,
        "house_address" => $home->house_address,
		"parking_four" => $home->parking_four,
        "parking_two" => $home->parking_two,
        "description" => $home->description,
        "created_date"=> $home->created_date,
        "created_by" => $home->created_by
		 );
}
else{
    $house_arr=array(
        "status" => false,
        "message" => "something wrong!"
    );
}

print_r(json_encode($house_arr));
?>