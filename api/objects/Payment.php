<?php

class Payment{
 
    // database connection and table name
    private $conn;
    private $table_name = "payment";
    // object properties
        
      
              
    public $paymentId;
    public $invoiceId;
    public $memberId;
    public $paymentDate;
	public $paymentMode;
	public $totalAmount;
	public $discountAmount;
    public $paymentDescription;
    public $createdDate;
    public $createdBy;
   
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    // signup user
    function getPayment(){
    
        if($this->isAlreadyExist()){
            return false;
        }
        // query to insert record
        $query = "INSERT INTO " . $this->table_name . "SET invoice_id=:invoiceId, member_id=:memberId,
        payment_date=:paymentDate,payment_mode=:paymentMode,total_amount=:totalAmount,payment_description=:paymentDescription,
        created_date=:createdDate,created_by=:createdBy";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
              // sanitize
        $this->invoiceId=htmlspecialchars(strip_tags($this->invoiceId));
        $this->memberId=htmlspecialchars(strip_tags($this->memberId));
        $this->paymentDate=htmlspecialchars(strip_tags($this->paymentDate));
		
		 $this->paymentMode=htmlspecialchars(strip_tags($this->paymentMode));
        $this->totalAmount=htmlspecialchars(strip_tags($this->totalAmount));
        $this->discountAmount=htmlspecialchars(strip_tags($this->discountAmount));
		 $this->paymentDescription=htmlspecialchars(strip_tags($this->paymentDescription));
        $this->createdDate=htmlspecialchars(strip_tags($this->createdDate));
        $this->createdBy=htmlspecialchars(strip_tags($this->createdBy));
       
        // bind values
        $stmt->bindParam(":invoiceId", $this->invoiceId);
        $stmt->bindParam(":memberId", $this->memberId);
        $stmt->bindParam(":paymentDate", $this->paymentDate);
    
	     $stmt->bindParam(":paymentMode", $this->paymentMode);
        $stmt->bindParam(":totalAmount", $this->totalAmount);
        $stmt->bindParam(":discountAmount", $this->discountAmount);
    
	    $stmt->bindParam(":paymentDescription", $this->paymentDescription);
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
        $query = "SELECT *  FROM " . $this->table_name . "  WHERE  payment_id='".$this->paymentId."'";
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