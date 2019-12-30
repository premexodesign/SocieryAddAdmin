<?php

class MemberComplain{
 
    // database connection and table name
    private $conn;
    private $table_name = "membercomplain";
    // object properties
              
    public $complainId;
    public $societyCode;
    public $flatId;
    public $complainNature;
	public $complainType;
	public $memberName;
	public $complainTitle;
    public $categoryId;

    public $complainDate;
    public $createdBy;
	public $escalationLevel;
	public $isUrgent;
    public $description;
    public $createdDate;
    public $complainDocument;
   
   
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    // signup user
    function complainRegister(){
    
        if($this->isAlreadyExist()){
            return false;
        }
        // query to insert record
        $query = "INSERT INTO " . $this->table_name . "SET society_code=:societyCode, flat_id=:flatId,
        complain_nature=:complainNature,complain_type=:complainType,member=:memberName,complain_title=:complainTitle,category_id=:categoryId,
        complain_date=:complainDate,created_by=:createdBy,escalation_level=:escalationLevel,is_urgent=:isUrgent,description=:description,created_date=:createdDate,complain_document=:complainDocument";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
              // sanitize
        $this->societyCode=htmlspecialchars(strip_tags($this->societyCode));
        $this->flatId=htmlspecialchars(strip_tags($this->flatId));
        $this->complainNature=htmlspecialchars(strip_tags($this->complainNature));
		
		 $this->complainType=htmlspecialchars(strip_tags($this->complainType));
        $this->memberName=htmlspecialchars(strip_tags($this->memberName));
        $this->complainTitle=htmlspecialchars(strip_tags($this->complainTitle));
		 $this->categoryId=htmlspecialchars(strip_tags($this->categoryId));
        $this->complainDate=htmlspecialchars(strip_tags($this->complainDate));
        $this->createdBy=htmlspecialchars(strip_tags($this->createdBy));
       

        $this->escalationLevel=htmlspecialchars(strip_tags($this->escalationLevel));
        $this->isUrgent=htmlspecialchars(strip_tags($this->isUrgent));
       $this->description=htmlspecialchars(strip_tags($this->description));
       $this->createdDate=htmlspecialchars(strip_tags($this->createdDate));
       $this->complainDocument=htmlspecialchars(strip_tags($this->complainDocument));


        // bind values
        $stmt->bindParam(":societyCode", $this->societyCode);
        $stmt->bindParam(":flatId", $this->flatId);
        $stmt->bindParam(":complainNature", $this->complainNature);
    
	     $stmt->bindParam(":complainType", $this->complainType);
        $stmt->bindParam(":memberName", $this->memberName);
        $stmt->bindParam(":complainTitle", $this->complainTitle);
    
        $stmt->bindParam(":categoryId", $this->categoryId);
        
        $stmt->bindParam(":complainDate", $this->complainDate);
        $stmt->bindParam(":createdBy", $this->createdBy);
        $stmt->bindParam(":escalationLevel", $this->escalationLevel);
        $stmt->bindParam(":isUrgent", $this->isUrgent);
        $stmt->bindParam(":description", $this->description);


        $stmt->bindParam(":createdDate", $this->createdDate);
        $stmt->bindParam(":complainDocument", $this->complainDocument);
       
       //echo $stmt;
	   
	
        // execute query
        if($stmt->execute()){
            $this->id = $this->conn->lastInsertId();
			
            return true;
        }
    
        return false;
        
    }
	
	
	function isAlreadyExist(){
        $query = "SELECT *  FROM " . $this->table_name . "  WHERE  complain_id='".$this->complainId."'";
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