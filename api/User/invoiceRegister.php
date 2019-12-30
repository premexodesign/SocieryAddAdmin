<?php
 
// get database connection
include_once '../config/database.php';
 
// instantiate user object
include_once '../objects/Invoice.php';
 
$database = new Database();
$db = $database->getConnection();
$invoice = new Invoice($db);
 
 
// set user property values
$invoice->invoiceNo = $_POST['invoice_number'];
$invoice->societyCode = $_POST['society_name'];
$invoice->houseNo = $_POST['house_no'];
$invoice->memberName = $_POST['member_name'];
$invoice->chargeType = $_POST['charge_type'];
$invoice->chargeCalculatedBy = $_POST['charge_cal_by'];
$invoice->totalAmount = $_POST['total_amount'];
$invoice->dueAmount = $_POST['due_amount'];
$invoice->paidAmount = $_POST['paid_amount'];
$invoice->paymentStatus = $_POST['payment_status'];
$invoice->fromDate = $_POST['from_date'];
$invoice->toDate = $_POST['to_date'];
$invoice->createdDate = date('Y-m-d H:i:s');
$invoice->createdBy = 'cssniraj';
 
// create the user

if($invoice->eventRegister()){
    $invoice_arr=array(
        "status" => true,
        "message" => "Successfully Signup!",
        "id" => $invoice->id,
        "invoice_no" => $invoice->invoiceNo,		
		"society_code" => $invoice->societyCode,
        "house_no" => $invoice->houseNo,
		"member_name" => $invoice->memberName,
        "charge_type" => $invoice->chargeType,
		"charge_calculated_by" => $invoice->chargeCalculatedBy,
        "total_amount" => $invoice->totalAmount,
        "due_amount" => $invoice->dueAmount,
        "paid_amount" => $invoice->paidAmount,
        "payment_status" => $invoice->paymentStatus,
        "from_date" => $invoice->fromDate,
        "to_date" => $invoice->toDate,
        "created_date"=> $invoice->created_date,
        "created_by" => $invoice->created_by,
		 );
}
else{
    $invoice_arr=array(
        "status" => false,
        "message" => "Username already exists!"
    );
}

print_r(json_encode($invoice_arr));
?>