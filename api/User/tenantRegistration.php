<?php
 
// get database connection
include_once '../config/database.php';
 
// instantiate user object
include_once '../objects/Tenant.php';
 
$database = new Database();
$db = $database->getConnection();
 
$usertnt = new Tenant($db);

 
  
  $usertnt->first_name = $_POST['first_name'];
  $usertnt->middle_name = $_POST['middle_name'];
  $usertnt->last_name = $_POST['last_name'];
  $usertnt->email_id = $_POST['email_id'];
  $usertnt->permanent_address = $_POST['permanent_address'];
  $usertnt->city = $_POST['city'];
  $usertnt->state = $_POST['state'];
  $usertnt->pincode = $_POST['pincode'];
  $usertnt->pancard_no = $_POST['pancard_no'];
  $usertnt->aadharcard_no = $_POST['aadharcard_no'];
  $usertnt->contact_no = $_POST['contact_no'];
  $usertnt->ref_contact1 = $_POST['ref_contact1'];
  $usertnt->ref_contact2 = $_POST['ref_contact2'];
  $usertnt->rent_start = $_POST['rent_start'];
  $usertnt->rent_end = $_POST['rent_end'];
  $usertnt->rent_agreement = $_FILES['rent_agreement']['name'];
  $usertnt->aadharcard_img = $_FILES['aadharcard_img']['name'];
  $usertnt->pancard_img = $_FILES['pancard_img']['name'];
  $usertnt->total_person = $_POST['total_person'];
  $usertnt->profile_pic = $_FILES['profile_pic']['name'];
  $usertnt->tenant_type = $_POST['tenant_type'];
  $usertnt->created_date = date("Y-m-d H:i:s");


  $upload = "../../upload/societydata/";


 /* $aadhar_dir = "../../aadhar/";
  $pancard_dir = "../../pancard/";
  $agreement_dir = "../../agreement/";
  $profile_dir = "../../profile/";
  */
  
  $aadhar_file = $upload . basename($_FILES["aadharcard_img"]["name"]);
  $pancard_file = $upload . basename($_FILES["pancard_img"]["name"]);
  $agreement_file = $upload . basename($_FILES["rent_agreement"]["name"]);
  $profile_file = $upload . basename($_FILES["profile_pic"]["name"]);
  
  $imageFileType = strtolower(pathinfo($profile_file,PATHINFO_EXTENSION));
  $extensions_arr = array("jpg","jpeg","png","gif");
 
// create the user

    if($usertnt->tenantsignup())
    {
        move_uploaded_file($_FILES['aadharcard_img']['tmp_name'],$aadhar_file);
        move_uploaded_file($_FILES['pancard_img']['tmp_name'],$pancard_file);
        move_uploaded_file($_FILES['rent_agreement']['tmp_name'],$agreement_file);
        move_uploaded_file($_FILES['profile_pic']['tmp_name'],$profile_file);

        echo "<script>alert('Record Inserted Successfully');</script>";
        
        if($usertnt->tenant_type == "bachelor")
        {
            if($usertnt->total_person > 1)
            { 
//              $this->i = 1;
              header("Location:../../addBachelor.php");
            }
        }
        else{
        
        $user_arr=array(
            "status" => true,
            "message" => "Successfully Signup!",
            "tenant_id" => $usertnt->tenant_id,
              "house_id" => $usertnt->house_id,
              "first_name" => $usertnt->first_name,
              "middle_name"=>$usertnt->middle_name,
              "last_name" => $usertnt->last_name,
              "email_id" => $usertnt->email_id,
              "permanent_address" => $usertnt->permanent_address,
              "city" => $usertnt->city,
              "state" => $usertnt->state,
              "pincode" => $usertnt->pincode,
              "pancard_no" => $usertnt->pancard_no,
              "aadharcard_no" => $usertnt->aadharcard_no,
              "contact_no" => $usertnt->contact_no,
              "ref_contact1" => $usertnt->ref_contact1,
              "ref_contact2" => $usertnt->ref_contact2,
              "rent_start" => $usertnt->rent_start,
              "rent_end" => $usertnt->rent_end,
              "rent_agreement" => $usertnt->rent_agreement,
              "aadharcard_img" => $usertnt->aadharcard_img,
              "pancard_img" => $usertnt->pancard_img,
              "total_person" => $usertnt->total_person,
              "profile_pic" => $usertnt->profile_pic,
              "tenant_type" => $usertnt->tenant_type,
              "created_date" => $usertnt->created_date,
              "created_by" => $usertnt->created_by );
      }
    
    
    }
    else
    {
        $user_arr=array(
            "status" => false,
            "message" => "House already Booked!"
        );
    }

print_r(json_encode($user_arr));
?>