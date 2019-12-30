<?php

class Visitor{
 
    // database connection and table name
    private $conn;
    private $table_name = "visitor";
    // object properties
    public $visitorId;
    public $visitorName;
    public $vehicleNo;
    public $resonForVisit;
	public $unitId;
	public $checkIndate;
	public $checkInTime;
    public $visitorCode;
    public $referenceCode;
    public $mobileNo;
    public $address;
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
        $query = "INSERT INTO " . $this->table_name . "SET visitor_name=:visitorName, vehicle_no=:vehicleNo,
        reson_for_visit=:resonForVisit,unit_id=:unitId,check_in_date=:checkIndate,check_in-time=:checkInTime,visitor_code=:visitorCode,
        reference_code=:referenceCode,mobile_no=:mobileNo,address=:address,created_date=:createdDate,created_by=:createdBy";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
              // sanitize
        $this->visitorName=htmlspecialchars(strip_tags($this->visitorName));
        $this->vehicleNo=htmlspecialchars(strip_tags($this->vehicleNo));
        $this->resonForVisit=htmlspecialchars(strip_tags($this->resonForVisit));
		$this->unitId=htmlspecialchars(strip_tags($this->unitId));
        $this->checkIndate=htmlspecialchars(strip_tags($this->checkIndate));
        $this->checkInTime=htmlspecialchars(strip_tags($this->checkInTime));
        $this->visitorCode=htmlspecialchars(strip_tags($this->visitorCode));
        $this->referenceCode=htmlspecialchars(strip_tags($this->referenceCode));
        $this->mobileNo=htmlspecialchars(strip_tags($this->mobileNo));
        $this->address=htmlspecialchars(strip_tags($this->address));
        $this->createdDate=htmlspecialchars(strip_tags($this->createdDate));
        $this->createdBy=htmlspecialchars(strip_tags($this->createdBy));


        // bind values
        $stmt->bindParam(":visitorName", $this->visitorName);
        $stmt->bindParam(":vehicleNo", $this->vehicleNo);
        $stmt->bindParam(":resonForVisit", $this->resonForVisit);
        $stmt->bindParam(":unitId", $this->unitId);
        $stmt->bindParam(":checkIndate", $this->checkIndate);
        $stmt->bindParam(":checkInTime", $this->checkInTime);
        $stmt->bindParam(":visitorCode", $this->visitorCode);
        $stmt->bindParam(":referenceCode",$this->referenceCode);
        $stmt->bindParam(":mobileNo", $this->mobileNo);
        $stmt->bindParam(":address", $this->address);
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
        $query = "SELECT *  FROM " . $this->table_name . "  WHERE  visitor_id='".$this->visitorId."'";
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