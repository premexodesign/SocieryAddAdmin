<?php
 
// get database connection
include_once '../config/database.php';
// instantiate user object
include_once '../objects/Secretary.php';
 
$database = new Database();
$db = $database->getConnection();
 
$usersec = new Secretary($db);
 
  $usersec->society_name = $_POST['society_name'];
  $usersec->first_name = $_POST['first_name'];
  $usersec->middle_name = $_POST['middle_name'];
  $usersec->last_name = $_POST['last_name'];
  $usersec->email_id = $_POST['email_id'];
  $usersec->present_address = $_POST['present_address'];
  $usersec->permanent_address = $_POST['permanent_address'];
  $usersec->city = $_POST['city'];
  $usersec->state = $_POST['state'];
  $usersec->pincode = $_POST['pincode'];
  $usersec->pancard_no = $_POST['pancard_no'];
  $usersec->aadharcard_no = $_POST['aadharcard_no'];
  $usersec->contact_no = $_POST['contact_no'];
  $usersec->profile_pic = $_FILES['file1']['name'];
  $usersec->created_by = 'Nirajkumar';
  $usersec->created_date = date('Y-m-d H:i:s');

  $profile_dir = "../../upload/societydata/";
  
  $pro_file = $profile_dir . basename($_FILES["file1"]["name"]);
  $imageFileType = strtolower(pathinfo($pro_file,PATHINFO_EXTENSION));
  $extensions_arr = array("jpg","jpeg","png","gif");
 
// create the user

    if($usersec->secretaryRegister())
    {
        echo "<script>alert('Record Inserted Successfully');</script>";
        $user_arr=array(
            "status" => true,
            "message" => "Successfully Signup!",
            "secretary_id" => $usersec->secretary_id,
            "society_name" => $usersec->society_name,
            "first_name" => $usersec->first_name,
            "middle_name"=>$usersec->middle_name,
            "last_name" => $usersec->last_name,
              "email_id" => $usersec->email_id,
              "present_address" => $usersec->present_address,
              "permanent_address" => $usersec->permanent_address,
              "city" => $usersec->city,
              "state" => $usersec->state,
              "pincode" => $usersec->pincode,
              "pancard_no" => $usersec->pancard_no,
              "aadharcard_no" => $usersec->aadharcard_no,
              "contact_no" => $usersec->contact_no,
              "profile_pic"=>$usersec->profile_pic,
              "created_date" => $usersec->created_date,
              "created_by" => $usersec->created_by );
    
        move_uploaded_file($_FILES['file1']['tmp_name'],$pro_file);
    }
    else
    {
        $user_arr=array(
            "status" => false,
            "message" => "something wrong!"
        );
    }

print_r(json_encode($user_arr));
?>