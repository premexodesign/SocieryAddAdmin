<?php

class House{
 
    // database connection and table name
   private $conn;
    private $table_name = "house";
    public $house_id;

    public $owner_id = 111;
    public $society_name;
    public $wing_name;
    public $floor_no;
    public $house_type;
    public $house_no;
    public $owner_name;
    public $owner_code = 'ABC000';
    public $house_address;
    public $parking_four;
    public $parking_two;
    public $description;
    public $created_by;
    public $created_date;


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
        $query = "INSERT INTO ".$this->table_name." SET owner_id=:owner_id,society_name=:society_name,wing_name=:wing_name,floor_no=:floor_no,house_type=:house_type,house_no=:house_no,owner_name=:owner_name,owner_code=:owner_code,house_address=:house_address,parking_four=:parking_four,parking_two=:parking_two, description=:description,created_date=:created_date,created_by=:created_by";
    
        // prepare queryssss
        $stmt = $this->conn->prepare($query);
              // sanitize
      /*  $this->owner_id=htmlspecialchars(strip_tags($this->owner_id));
        $this->society_name=htmlspecialchars(strip_tags($this->wingId));
        $this->wing_name=htmlspecialchars(strip_tags($this->houseType));
		$this->floor_no=htmlspecialchars(strip_tags($this->ownerName));
        $this->house_type=htmlspecialchars(strip_tags($this->noCarPark));
        $this->house_no=htmlspecialchars(strip_tags($this->noBykePark));
        $this->house_no=htmlspecialchars(strip_tags($this->noBykePark));
        $this->house_no=htmlspecialchars(strip_tags($this->noBykePark));
        $this->house_no=htmlspecialchars(strip_tags($this->noBykePark));
        $this->house_no=htmlspecialchars(strip_tags($this->noBykePark));
		$this->createdBy=htmlspecialchars(strip_tags($this->createdBy));
        $this->createdDate=htmlspecialchars(strip_tags($this->createdDate));*/
    
        $stmt->bindParam(":owner_id",$this->owner_id);
        $stmt->bindParam(":society_name",$this->society_name);
        $stmt->bindParam(":wing_name",$this->wing_name);
        $stmt->bindParam(":floor_no",$this->floor_no);
        $stmt->bindParam(":house_type",$this->house_type);
        $stmt->bindParam(":house_no",$this->house_no);
        $stmt->bindParam(":owner_name",$this->owner_name);
        $stmt->bindParam(":owner_code",$this->owner_code);
        $stmt->bindParam(":house_address",$this->house_address);
        $stmt->bindParam(":parking_four",$this->parking_four);
        $stmt->bindParam(":parking_two",$this->parking_two);
        $stmt->bindParam(":description",$this->description);
        $stmt->bindParam(":created_date",$this->created_date);
        $stmt->bindParam(":created_by",$this->created_by);
	   
	
        if($stmt->execute()){
            $this->house_id = $this->conn->lastInsertId();
			
            return true;
        }
    
        return false;
        
    }
	
	
	function isAlreadyExist(){
        $query = "SELECT *  FROM " . $this->table_name . "  WHERE  house_id='".$this->house_id."'";
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