<?php
 
// get database connection
include_once '../config/database.php';
 
// instantiate user object
include_once '../objects/user.php';
 
$database = new Database();
$db = $database->getConnection();
 
$user = new User($db);
 
 
// set user property values
$user->username = $_POST['username'];
$user->password = base64_encode($_POST['password']);
$user->created = date('Y-m-d H:i:s');
$user->fname = $_FILES['file']['name'];
$user->profile_pic = $_FILES['file1']['name'];
   $profile = "..\..\profile";
  $target_dir = "..\..\upload";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);
  
   $pro_file = $profile . basename($_FILES["file1"]["name"]);

  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");
 
// create the user

if($user->signupnew()){
    $user_arr=array(
        "status" => true,
        "message" => "Successfully Signup!",
        "id" => $user->id,
        "username" => $user->username,
		"fname"=>$user->fname,
		"profile_pic"=>$user->profile_pic
    );
	
	move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$user->fname);
	move_uploaded_file($_FILES['file1']['tmp_name'],$pro_file.$user->profile_pic);
}
else{
    $user_arr=array(
        "status" => false,
        "message" => "Username already exists!"
    );
}


print_r(json_encode($user_arr));
?>