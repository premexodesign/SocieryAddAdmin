<?php
 
// get database connection
include_once '../config/database.php';
 
// instantiate user object
include_once '../objects/Member.php';
 
$database = new Database();
$db = $database->getConnection();
 
$userown = new Member($db);
 
  $userown->prefix = $_POST['prefix'];
  $userown->first_name = $_POST['first_name'];
  $userown->middle_name = $_POST['middle_name'];
  $userown->last_name = $_POST['last_name'];
  $userown->pancard_no = $_POST['pancard_no'];
  $userown->email_id = $_POST['email_id'];
  $userown->aadharcard_no = $_POST['aadharcard_no'];
  $userown->contact_no = $_POST['contact_no'];
  $userown->alt_contact = $_POST['alt_contact'];
  $userown->profile_pic = $_FILES['profile_pic']['name'];
  $userown->created_date= date("Y-m-d H:i:s");


  $profile_dir = "../../upload/societydata/";
  
  $profile_file = $profile_dir . basename($_FILES["profile_pic"]["name"]);
  $imageFileType = strtolower(pathinfo($profile_file,PATHINFO_EXTENSION));
  $extensions_arr = array("jpg","jpeg","png","gif");
 
// create the user

    if($userown->memberRegister())
    {
        echo "<script>alert('Record Inserted Successfully');</script>";
        $user_arr=array(
            "status" => true,
            "message" => "Successfully Signup!",
            "owner_id" => $userown->owner_id,
            "owner_code" => $userown->owner_code,
            "prefix" => $userown->prefix,
            "first_name" => $userown->first_name,
            "middle_name"=>$userown->middle_name,
            "last_name"=>$userown->last_name,
            "pancard_no" => $userown->pancard_no,
            "email_id" => $userown->email_id,
            "aadharcard_no" => $userown->aadharcard_no,
            "contact_no" => $userown->contact_no,
            "alt_contact" => $userown->alt_contact,
            "profile_pic" => $userown->profile_pic,
            "created_date" => $userown->created_date,
            "created_by" => $userown->created_by);
    
        move_uploaded_file($_FILES['profile_pic']['tmp_name'],$profile_file);
    }
    else
    {
        $user_arr=array(
            "status" => false,
            "message" => "ID already exists!"
        );
    }

print_r(json_encode($user_arr));
?>