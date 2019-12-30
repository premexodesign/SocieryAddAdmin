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
$user->email = $_POST['email'];
$user->contactno = $_POST['contact'];
$user->address = $_POST['address'];
$user->doj = date('Y-m-d H:i:s');
$user->profile_pic = $_FILES['file']['name'];
//echo $user->profile_pic;
   $profile = "..\..\designed\profile";
  $pro_file = $profile . basename($_FILES["file"]["name"]);

  // Select file type
  $imageFileType = strtolower(pathinfo($pro_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");
 
// create the user

if($user->signup()){
    $user_arr=array(
        "status" => true,
        "message" => "Success",
        "id" => $user->uid,
        "username" => $user->username,
        "password" => $user->password,
        "email" => $user->email,
        "doj" => $user->doj,
        "address"=>$user->address,
        "contactno"=>$user->contactno,
		"profile_pic"=>$user->profile_pic
    );
	
	
    move_uploaded_file($_FILES['file']['name'],$pro_file.$user->profile_pic);
   
}
else{
    $user_arr=array(
        "status" => false,
        "message" => "Fail"
    );
}
//$jdata=json_encode($user_arr);
//echo $jdata->message;
//echo $user_arr['message'];
if($user_arr['message']=='Success')
{?>

    <?php header("Location: ..\..\index.php"); ?>
<?php
}
//echo implode(" ",$user_arr);
//$characters = json_decode($jdata); // decode the JSON feed


//foreach ($characters as $character) {
	//echo $character . " ";
//}

//echo json_decode($user_arr,true);
//$character = json_decode($user_arr);
//echo $character[0]->message;
?>