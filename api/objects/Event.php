<?php

class Event{
 
    // database connection and table name
    private $conn;
    private $table_name = "event";
    // object properties
    public $eventId;
    public $eventTitle;
    public $societyCode;
    public $startDate;
	public $startTime;
	public $endDate;
	public $endTime;
    public $description;
    public $createdDate;
    public $createdBy;
   
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    // signup user
    function eventRegister(){
    
        if($this->isAlreadyExist()){
            return false;
        }
        // query to insert record
        $query = "INSERT INTO " . $this->table_name . "SET event_title=:eventTitle, society_code=:societyCode,
        start_date=:startDate,start_time=:startTime,end_date=:endDate,end_time=:endTime,
        description=:description,created_date=:createdDate,created_by=:createdBy";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
              // sanitize
        $this->eventTitle=htmlspecialchars(strip_tags($this->eventTitle));
        $this->societyCode=htmlspecialchars(strip_tags($this->societyCode));
        $this->startDate=htmlspecialchars(strip_tags($this->startDate));
        $this->startTime=htmlspecialchars(strip_tags($this->startTime));
        $this->endDate=htmlspecialchars(strip_tags($this->endDate));
        $this->endTime=htmlspecialchars(strip_tags($this->endTime));
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->createdDate=htmlspecialchars(strip_tags($this->createdDate));
        $this->createdBy=htmlspecialchars(strip_tags($this->createdBy));
       
        // bind values
        $stmt->bindParam(":eventTitle", $this->eventTitle);
        $stmt->bindParam(":societyCode", $this->societyCode);
        $stmt->bindParam(":startDate", $this->startDate);
        $stmt->bindParam(":startTime", $this->startTime);
        $stmt->bindParam(":endDate", $this->endDate);
        $stmt->bindParam(":endTime", $this->endTime);
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
        $query = "SELECT *  FROM " . $this->table_name . "  WHERE  event_id='".$this->eventId."'";
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