<?php

class Staff{
 
    // database connection and table name
    private $conn;
    private $table_name = "staff";
    // object properties
       
    public $staffId;
    public $societyCode;
    public $wingId;
    public $flatId;
    public $title;
    public $prefix;
    public $firstName;
	public $lastName;
	public $middleName;
	public $emailId;
    public $city;
    public $state;
    public $pincode;
    public $pancardNo;

    public $adharcardNo;
    public $contactNo;
    public $registeredAs;
    public $profilePics;
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
        $query = "INSERT INTO " . $this->table_name . "SET society_code=:societyCode,wing_id=:wingId,flat_id=:flatId,title=:title,prefix=:prefix,
        first_name=:firstName,last_name=:lastName,middle_name=:middleName,email_id=:emailId,city=:city,state=:state,
        pincode=:pincode,pancard_no=:pancardNo,adharcard_no=:adharcardNo,contact_no=:contactNo,registered_as=:registeredAs,staff_profile_Pic=:profilePics,created_date=:createdDate,created_by=:createdBy";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
              // sanitize
        $this->societyCode=htmlspecialchars(strip_tags($this->societyCode));
        $this->wingId=htmlspecialchars(strip_tags($this->wingId));
        $this->flatId=htmlspecialchars(strip_tags($this->flatId));
        $this->title=htmlspecialchars(strip_tags($this->title));
        
        $this->prefix=htmlspecialchars(strip_tags($this->prefix));
        $this->firstName=htmlspecialchars(strip_tags($this->firstName));
		 $this->lastName=htmlspecialchars(strip_tags($this->lastName));
        $this->middleName=htmlspecialchars(strip_tags($this->middleName));
        $this->emailId=htmlspecialchars(strip_tags($this->emailId));
         $this->city=htmlspecialchars(strip_tags($this->city));
         $this->state=htmlspecialchars(strip_tags($this->state));
         $this->pincode=htmlspecialchars(strip_tags($this->pincode));
         $this->pancardNo=htmlspecialchars(strip_tags($this->pancardNo));

         $this->adharcardNo=htmlspecialchars(strip_tags($this->adharcardNo));
         $this->contactNo=htmlspecialchars(strip_tags($this->contactNo));
         $this->registeredAs=htmlspecialchars(strip_tags($this->registeredAs));
         $this->profilePics=htmlspecialchars(strip_tags($this->profilePics));
        $this->createdDate=htmlspecialchars(strip_tags($this->createdDate));
        $this->createdBy=htmlspecialchars(strip_tags($this->createdBy));
       
        // bind values
        $stmt->bindParam(":societyCode", $this->societyCode);
        $stmt->bindParam(":wingId", $this->wingId);

        $stmt->bindParam(":flatId", $this->flatId);
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":prefix", $this->prefix);
        $stmt->bindParam(":firstName", $this->firstName);    
	     $stmt->bindParam(":lastName", $this->lastName);
        $stmt->bindParam(":middleName", $this->middleName);
        $stmt->bindParam(":emailId", $this->emailId);    
        $stmt->bindParam(":city", $this->city);
        $stmt->bindParam(":state", $this->state);
        $stmt->bindParam(":pincode", $this->pincode);
        $stmt->bindParam(":pancardNo", $this->pancardNo);
        $stmt->bindParam(":adharcardNo", $this->adharcardNo);
        $stmt->bindParam(":contactNo", $this->contactNo);
        $stmt->bindParam(":registeredAs", $this->registeredAs);
        $stmt->bindParam(":profilePics", $this->profilePics);
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
        $query = "SELECT *  FROM " . $this->table_name . "  WHERE  staff_id='".$this->staffId."'";
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