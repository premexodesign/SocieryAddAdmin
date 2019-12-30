<?php

class Bill{
 
    // database connection and table name
    private $conn;
    private $table_name = "bill";
    // object properties
              
    public $billId;
    public $agencyName;
    public $societCode;
    public $billNo;
    public $societyAddress;
	public $billDate;
	public $billType;
	public $billAmount;
    public $description;
    public $createdDate;
    public $createdBy;
   
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    // signup user
    function billRegister(){
    
        if($this->isAlreadyExist()){
            return false;
        }
        // query to insert record
        $query = "INSERT INTO " . $this->table_name . "SET society_code=:societyCode, member_id=:memberId,
        bill_no=:billNo,society_address=:societyAddress,bill_date=:billDate,bill_type=:billType,bill_amount=:billAmount,
        description=:description,created_date=:createdDate,created_by=:createdBy";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
              // sanitize
        $this->societyCode=htmlspecialchars(strip_tags($this->societyCode));
        $this->memberId=htmlspecialchars(strip_tags($this->memberId));
        $this->billNo=htmlspecialchars(strip_tags($this->billNo));
		
		 $this->societyAddress=htmlspecialchars(strip_tags($this->societyAddress));
        $this->billDate=htmlspecialchars(strip_tags($this->billDate));
        $this->billType=htmlspecialchars(strip_tags($this->billType));
         $this->billAmount=htmlspecialchars(strip_tags($this->billAmount));
         $this->description=htmlspecialchars(strip_tags($this->description));
        $this->createdDate=htmlspecialchars(strip_tags($this->createdDate));
        $this->createdBy=htmlspecialchars(strip_tags($this->createdBy));
       
        // bind values
        $stmt->bindParam(":societyCode", $this->societyCode);
        $stmt->bindParam(":memberId", $this->memberId);
        $stmt->bindParam(":billNo", $this->billNo);
    
	     $stmt->bindParam(":societyAddress", $this->societyAddress);
        $stmt->bindParam(":billDate", $this->billDate);
        $stmt->bindParam(":billType", $this->billType);
    
        $stmt->bindParam(":billAmount", $this->billAmount);
        $stmt->bindParam(":description",$this->description);
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
        $query = "SELECT *  FROM " . $this->table_name . "  WHERE  bill_id='".$this->billId."'";
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