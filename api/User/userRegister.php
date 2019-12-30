<?php
 
// get database connection
include_once '../config/database.php';
 
// instantiate user object
include_once '../objects/Registration.php';
 
$database = new Database();
$db = $database->getConnection();
$registration = new Registration($db);
 
 
// set user property values
$registration->username = $_POST['username'];
$registration->email = $_POST['email'];
$registration->password = $_POST['password'];
$registration->contactno = $_POST['contact'];
$registration->address = $_POST['address'];
$registration->userType = $_POST['usertype'];
//$registration->profilePics = $_POST['description'];
$registration->doj = date('Y-m-d H:i:s');
$registration->createdDate = date('Y-m-d H:i:s');
$registration->createdBy = 'cssniraj';
$society->profilePics = $_FILES['file']['name'];
$target_dir = "..\..\upload/societydata";
  
$target_file = $target_dir . basename($_FILES["file"]["name"]);

// Select file type
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Valid file extensions
$extensions_arr = array("jpg","jpeg","png","gif");

 
// create the user

if($registration->eventRegister()){
    $registration_arr=array(
        "status" => true,
        "message" => "Successfully Signup!",
        "id" => $registration->id,
        "username" => $registration->username,		
		"email" => $registration->email,
        "password" => $registration->password,
		"contactno" => $registration->contactno,
        "address" => $registration->address,
		"user_type" => $registration->userType,
        "profile_pics" => $registration->profilePics,
        "doj" => $registration->doj,
        "created_date"=> $registration->created_date,
        "created_by" => $registration->created_by,
         );
         move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$society->profilePics);
}
else{
    $registration_arr=array(
        "status" => false,
        "message" => "Username already exists!"
    );
}

print_r(json_encode($registration_arr));
?>