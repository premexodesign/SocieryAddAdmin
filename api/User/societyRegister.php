<?php
 
// get database connection
include_once '../config/database.php';
 
// instantiate user object
include_once '../objects/society.php';
 
$database = new Database();
$db = $database->getConnection();
 
$society = new Society($db);
 
 
// set user property values
$society->societycode = $_POST['society_code'];
$society->societyname = $_POST['society_name'];
$society->society_type = $_POST['society_type'];
$society->societyaddress = $_POST['society_address'];
$society->city = $_POST['city'];
$society->state = $_POST['state'];
$society->pincode = $_POST['pincode'];
$society->contact_no = $_POST['contact_no'];
$society->email_id = $_POST['email_id'];
$society->society_web = $_POST['society_web'];
$society->society_other = $_POST['society_other'];
echo $society->society_other;
$society->society_created_by = 'cssniraj';
$society->created_date = date('Y-m-d H:i:s');
$society->society_pic = $_FILES['file']['name'];
  
  $target_dir = "..\..\upload/societydata";
  
  $target_file = $target_dir . basename($_FILES["file"]["name"]);
  
  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");
 
// create the user

if($society->societyRegister()){
    $society_arr=array(
        "status" => true,
        "message" => "Successfully Signup!",
        "id" => $society->id,
        "society_code" => $society->societycode,		
        "society_name" => $society->societyname,
        "society_type" => $society->society_type,
        "society_address" => $society->societyaddress,
		"city" => $society->city,
        "state" => $society->state,
		"pincode" => $society->pincode,
        "contact_no" => $society->contact_no,
        "email_id" => $society->email_id,
        "society_web" => $society->society_web,
        "society_other" => $society->society_other,
        "society_pic" => $society->society_pic,
		"society_created_by" => $society->society_created_by,
        "created_date" => $society->created_date
    );
    print_r(json_encode($society_arr));	
		
	move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$society->society_pic);
	
}
else{
    $society_arr=array(
        "status" => false,
        "message" => "Username already exists!"
    );
}

print_r(json_encode($society_arr));
?>