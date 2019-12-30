<?php
 
// get database connection
include_once '../config/database.php';
 
// instantiate user object
include_once '../objects/Classified.php';
 
$database = new Database();
$db = $database->getConnection();
 
$classified = new Classified($db);
 
 
// set user property values
$classified->details = $_POST['details'];
$classified->classifiedType = $_POST['classified_type'];
$classified->briefDescription = $_POST['brief_description'];
$classified->description = $_POST['description'];
$classified->validTillDate = $_POST['notice_valid'];
$classified->pincode = $_POST['pin_code'];
$classified->mobileNo = $_POST['mobile_no'];
$classified->emailId = $_POST['email_id'];
$classified->createdBy = 'cssniraj';
$classified->createdDate = date('Y-m-d H:i:s');
$classified->postImage = $_FILES['file']['post_image'];
  
  $target_dir = "..\..\upload/societydata";
  
  $target_file = $target_dir . basename($_FILES["file"]["name"]);
  
  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");
 
// create the user

if($classified->societyRegister()){
    $classified_arr=array(
        "status" => true,
        "message" => "Successfully Signup!",
        "id" => $classified->id,
        "society_code" => $classified->details,		
		"society_name" => $classified->classifiedType,
        "society_address" => $classified->briefDescription,
		"city" => $classified->description,
        "state" => $classified->validTillDate,
		"pincode" => $classified->pincode,
        "contact_no" => $classified->mobileNo,
		"society_pic" => $classified->postImage,
		"created_by" => $classified->createdByy,
        "created_date" => $classified->createdDate
    );
   // print_r(json_encode($society_arr));	
		
	move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$classified->society_pic);
	
}
else{
    $classified_arr=array(
        "status" => false,
        "message" => "Username already exists!"
    );
}

print_r(json_encode($classified_arr));
?>