<?php

class Agency{
 
    // database connection and table name
    private $conn;
    private $table_name = "agency";
    // object properties

              
    public $agencyId;
    public $agencyName;
    public $cotegoryOfServices;
    public $officeContactNo;
	public $pancardNo;
	public $tanNo;
	public $concernPersonName;
    public $otherDetails;
    public $createdDate;
    public $createdBy;
   
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    // signup user
    function agencyRegister(){
    
        if($this->isAlreadyExist()){
            return false;
        }
        // query to insert record
        $query = "INSERT INTO " . $this->table_name . "SET agency_name=:agencyName, cotegory_of_services=:cotegoryOfServices,
        office_no=:officeContactNo,pancard_no=:pancardNo,tan_no=:tanNo,concern_person_name=:concernPersonName,other_details=:otherDetails,
        created_date=:createdDate,created_by=:createdBy";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
              // sanitize
        $this->agencyName=htmlspecialchars(strip_tags($this->agencyName));
        $this->cotegoryOfServices=htmlspecialchars(strip_tags($this->cotegoryOfServices));
        $this->officeContactNo=htmlspecialchars(strip_tags($this->officeContactNo));
		
		 $this->pancardNo=htmlspecialchars(strip_tags($this->pancardNo));
        $this->tanNo=htmlspecialchars(strip_tags($this->tanNo));
        $this->concernPersonName=htmlspecialchars(strip_tags($this->concernPersonName));
		 $this->otherDetails=htmlspecialchars(strip_tags($this->otherDetails));
        $this->createdDate=htmlspecialchars(strip_tags($this->createdDate));
        $this->createdBy=htmlspecialchars(strip_tags($this->createdBy));
       
        // bind values
        $stmt->bindParam(":agencyName", $this->agencyName);
        $stmt->bindParam(":cotegoryOfServices", $this->cotegoryOfServices);
        $stmt->bindParam(":officeContactNo", $this->officeContactNo);
    
	     $stmt->bindParam(":pancardNo", $this->pancardNo);
        $stmt->bindParam(":tanNo", $this->tanNo);
        $stmt->bindParam(":concernPersonName", $this->concernPersonName);
    
	    $stmt->bindParam(":otherDetails", $this->otherDetails);
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
        $query = "SELECT *  FROM " . $this->table_name . "  WHERE  agency_id='".$this->agencyId."'";
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