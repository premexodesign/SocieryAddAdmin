<?php

class Registration{
 
    // database connection and table name
    private $conn;
    private $table_name = "registration";
    // object properties
    public $id;
    public $username;
    public $email;
    public $password;
	public $contactno;
	public $address;
	public $userType;
    public $profilePics;
	public $doj;
   
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    // signup user
    function userRegister(){
    
        if($this->isAlreadyExist()){
            return false;
        }
        // query to insert record
        $query = "INSERT INTO " . $this->table_name . "SET username=:username, email=:email,
        password=:password,contactno=:contactno,address=:address,user_type=:userType,profile_pics=:profilePics,
        doj=:doj,contact_no=:contactNo,member_created_by=:memberCreatedBy,created_date=:created_date";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
              // sanitize
        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->password=htmlspecialchars(strip_tags($this->password));
		
		 $this->contactno=htmlspecialchars(strip_tags($this->contactno));
        $this->address=htmlspecialchars(strip_tags($this->address));
        $this->userType=htmlspecialchars(strip_tags($this->userType));
		 $this->profilePics=htmlspecialchars(strip_tags($this->profilePics));
        $this->doj=htmlspecialchars(strip_tags($this->doj));
       
        // bind values
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $this->password);
    
	     $stmt->bindParam(":contactno", $this->contactno);
        $stmt->bindParam(":emailId", $this->address);
        $stmt->bindParam(":userType", $this->userType);
    
	     $stmt->bindParam(":profilePics", $this->profilePics);
        $stmt->bindParam(":doj", $this->doj);
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