<?php

class Classified{
 
    // database connection and table name
    private $conn;
    private $table_name = "classified";
    // object properties
              
    public $id;
    public $details;
    public $classifiedType;
    public $briefDescription;
	public $description;
	public $postImage;
	public $validTillDate;
    public $state;
    public $pincode;
    public $mobileNo;
    public $emailId;
    public $createdDate;
    public $createdBy;
   
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    // signup user
    function classifiedRegister(){
    
        if($this->isAlreadyExist()){
            return false;
        }
        // query to insert record
        $query = "INSERT INTO " . $this->table_name . "SET details=:details, classified_type=:classifiedType,
        brief_description=:briefDescription,description=:description,post_image=:postImage,valid_till_date=:validTillDate,state=:state,
        pincode=:pincode,mobile_no=:mobileNo,created_date=:createdDate,created_by=:createdBy";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
              // sanitize
        $this->details=htmlspecialchars(strip_tags($this->details));
        $this->classifiedType=htmlspecialchars(strip_tags($this->classifiedType));
        $this->briefDescription=htmlspecialchars(strip_tags($this->briefDescription));		
		 $this->description=htmlspecialchars(strip_tags($this->description));
        $this->postImage=htmlspecialchars(strip_tags($this->postImage));
        $this->validTillDate=htmlspecialchars(strip_tags($this->validTillDate));
         $this->state=htmlspecialchars(strip_tags($this->state));

         $this->pincode=htmlspecialchars(strip_tags($this->pincode));
         $this->mobileNo=htmlspecialchars(strip_tags($this->mobileNo));
          $this->createdDate=htmlspecialchars(strip_tags($this->createdDate));
        $this->createdBy=htmlspecialchars(strip_tags($this->createdBy));
       
        // bind values
        $stmt->bindParam(":details", $this->details);
        $stmt->bindParam(":classifiedType", $this->classifiedType);
        $stmt->bindParam(":briefDescription", $this->briefDescription);    
	     $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":postImage", $this->postImage);
        $stmt->bindParam(":validTillDate", $this->validTillDate);    
        $stmt->bindParam(":state", $this->state);

        
        $stmt->bindParam(":pincode",$this->pincode);
        
        $stmt->bindParam(":mobileNo",$this->mobileNo);
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