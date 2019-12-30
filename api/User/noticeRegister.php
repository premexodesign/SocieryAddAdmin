<?php
 
// get database connection
include_once '../config/database.php';
 
// instantiate user object
include_once '../objects/Notice.php';
 
$database = new Database();
$db = $database->getConnection();
$notice = new Notice($db);
 
 
// set user property values
$notice->societyCode = $_POST['society_name'];
$notice->noticeTitle = $_POST['notice_title'];
$notice->issueDate = $_POST['issue_date'];
$notice->validDate = $_POST['valid_date'];
$notice->noticeType = $_POST['notice_type'];
$notice->noticeStatus = $_POST['status'];
$notice->description = $_POST['description'];
$notice->document = $_POST['document_type'];
$notice->createdDate = date('Y-m-d H:i:s');
$notice->createdBy = 'cssniraj';
 
// create the user

if($notice->eventRegister()){
    $notice_arr=array(
        "status" => true,
        "message" => "Successfully Signup!",
        "id" => $notice->id,
        "society_code" => $notice->societyCode,		
		"notice_title" => $notice->noticeTitle,
        "issue_date" => $notice->issueDate,
		"valid_date" => $notice->validDate,
        "notice_type" => $notice->noticeType,
		"notice_status" => $notice->noticeStatus,
        "description" => $notice->description,
        "document" => $notice->document,
        "created_code" => $notice->createdCode,
        "created_date"=> $notice->created_date,
        "created_by" => $notice->created_by,
		 );
}
else{
    $notice_arr=array(
        "status" => false,
        "message" => "Username already exists!"
    );
}

print_r(json_encode($notice_arr));
?>