<?php

class Invoice{
 
    // database connection and table name
    private $conn;
    private $table_name = "invoice";
    // object properties
                   
    public $id;
    public $invoiceNo;
    public $societyCode;
    public $houseNo;
	public $memberName;
	public $chargeType;
	public $chargeCalculatedBy;
    public $totalAmount;
    public $dueAmount;
    public $paidAmount;
    public $paymentStatus;
    public $fromDate;
    public $toDate;
    public $createdDate;
    public $createdBy;
   
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    // signup user
    function invoiceRegister(){
    
        if($this->isAlreadyExist()){
            return false;
        }
        // query to insert record
        $query = "INSERT INTO " . $this->table_name . "SET invoice_no=:invoiceNo, society_code=:societyCode,
        house_no=:houseNo,member_name=:memberName,charge_type=:chargeType,charge_calculated_by=:chargeCalculatedBy,total_amount=:totalAmount,
        due_amount=:dueAmount,paid_amount=:paidAmount,payment_status=:paymentStatus,
        from_date=:fromDate,to_date=:toDate,created_date=:createdDate,created_by=:createdBy";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
              // sanitize
        $this->invoiceNo=htmlspecialchars(strip_tags($this->invoiceNo));
        $this->societyCode=htmlspecialchars(strip_tags($this->societyCode));
        $this->houseNo=htmlspecialchars(strip_tags($this->houseNo));		
		 $this->memberName=htmlspecialchars(strip_tags($this->memberName));
        $this->chargeType=htmlspecialchars(strip_tags($this->chargeType));
        $this->chargeCalculatedBy=htmlspecialchars(strip_tags($this->chargeCalculatedBy));
         $this->totalAmount=htmlspecialchars(strip_tags($this->totalAmount));
         $this->dueAmount=htmlspecialchars(strip_tags($this->dueAmount));
         $this->paidAmount=htmlspecialchars(strip_tags($this->paidAmount));
         $this->paymentStatus=htmlspecialchars(strip_tags($this->paymentStatus));
         $this->fromDate=htmlspecialchars(strip_tags($this->fromDate));
         $this->toDate=htmlspecialchars(strip_tags($this->toDate));
        $this->createdDate=htmlspecialchars(strip_tags($this->createdDate));
        $this->createdBy=htmlspecialchars(strip_tags($this->createdBy));
       
        // bind values
        $stmt->bindParam(":invoiceNo", $this->invoiceNo);
        $stmt->bindParam(":societyCode", $this->societyCode);
        $stmt->bindParam(":houseNo", $this->houseNo);    
	     $stmt->bindParam(":memberName", $this->memberName);
        $stmt->bindParam(":chargeType", $this->chargeType);
        $stmt->bindParam(":chargeCalculatedBy", $this->chargeCalculatedBy);    
        $stmt->bindParam(":totalAmount", $this->totalAmount);
        $stmt->bindParam(":dueAmount", $this->dueAmount);
        $stmt->bindParam(":paidAmount", $this->paidAmount);
        $stmt->bindParam(":paymentStatus", $this->paymentStatus);
        $stmt->bindParam(":fromDate", $this->fromDate);
        $stmt->bindParam(":toDate", $this->toDate);
        $stmt->bindParam(":createdDate", $this->createdDate);
        $stmt->bindParam(":createdBy", $this->createdBy);
       //echo $stmt;
	   
	 echo  $this->created_date;
        // execute query
        if($stmt->execute()){
            $this->id = $this->conn->lastInsertId();
			
            return true;
        }
    
        return false;
        
    }
	
	
	function isAlreadyExist(){
        $query = "SELECT *  FROM " . $this->table_name . "  WHERE  id='".$this->id."'";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        if($stmt->rowCount() > 0){
            return true;
        }
        else{
            return false;
        }
    }
}