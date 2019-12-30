<?php
 
// get database connection
include_once '../config/database.php';
 
// instantiate user object
include_once '../objects/Payment.php';
 
$database = new Database();
$db = $database->getConnection();
$payment = new Payment($db);
 
 
// set user property values
$payment->invoiceId = $_POST['event_title'];
$payment->memberId = $_POST['ssociety_name'];
$payment->paymentDate = $_POST['start_date'];
$payment->paymentMode = $_POST['start_time'];
$payment->totalAmount = $_POST['end_date'];
$payment->discountAmount = $_POST['end_time'];
$payment->paymentDescription = $_POST['description'];
$payment->createdDate = date('Y-m-d H:i:s');
$payment->createdBy = 'cssniraj';
 
// create the user

if($payment->eventRegister()){
    $payment_arr=array(
        "status" => true,
        "message" => "Successfully Signup!",
        "id" => $payment->id,
        "invoice_id" => $payment->invoiceId,		
		"member_id" => $payment->memberId,
        "payment_date" => $payment->paymentDate,
		"payment_mode" => $payment->paymentMode,
        "total_amount" => $payment->totalAmount,
		"payment_description" => $payment->discountAmount,
        "description" => $payment->paymentDescription,
        "created_date"=> $payment->created_date,
        "created_by" => $payment->created_by,
		 );
}
else{
    $payment_arr=array(
        "status" => false,
        "message" => "Username already exists!"
    );
}

print_r(json_encode($payment_arr));
?>