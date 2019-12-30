<?php
// include database and object files
include_once '../config/database.php';
include_once '../objects/user.php';
session_start();
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare user object
$user = new User($db);
// set ID property of user to be edited

$user->username = isset($_POST['username']) ? $_POST['username'] : die();
$_SESSION['username']=$user->username;
$user->password = base64_encode(isset($_POST['password']) ? $_POST['password'] : die());
// read the details of user to be edited
$stmt = $user->login();
if($stmt->rowCount() > 0){
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    // create array
    $user_arr=array(
        "status" => true,
        "message" => "Success",
        "username" => $row['username']
    );
}
else{
    $user_arr=array(
        "status" => false,
        "message" => "Fail",
    );
}
// make it json format
//print_r(json_encode($user_arr));

if($user_arr['message']=='Success')
{?>

    <?php header("Location: ..\..\dashboard.php"); ?>
<?php
}
?>