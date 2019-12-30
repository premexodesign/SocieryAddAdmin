<?php

class Notice{
 
    // database connection and table name
    private $conn;
    private $table_name = "Notice";
    // object properties
              
    public $noticeId;
    public $societyCode;
    public $noticeTitle;
    public $issueDate;
	public $validDate;
	public $noticeType;
	public $noticeStatus;
    public $description;
    public $document;
    public $createdCode;
    public $createdDate;
    public $createdBy;
   
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    // signup user
    function noticeRegister(){
    
        if($this->isAlreadyExist()){
            return false;
        }
        // query to insert record
        $query = "INSERT INTO " . $this->table_name . "SET society_code=:societyCode, notice_title=:noticeTitle,
        issue_date=:issueDate,valid_date=:validDate,notice_type=:noticeType,notice_status=:noticeStatus,description=:description,
        document=:document,created_code=:createdCode,created_date=:createdDate,created_by=:createdBy";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
              // sanitize
        $this->societyCode=htmlspecialchars(strip_tags($this->societyCode));
        $this->noticeTitle=htmlspecialchars(strip_tags($this->noticeTitle));
        $this->issueDate=htmlspecialchars(strip_tags($this->issueDate));
		$this->validDate=htmlspecialchars(strip_tags($this->validDate));
        $this->noticeType=htmlspecialchars(strip_tags($this->noticeType));
        $this->noticeStatus=htmlspecialchars(strip_tags($this->noticeStatus));
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->document=htmlspecialchars(strip_tags($this->document));
         $this->createdCode=htmlspecialchars(strip_tags($this->createdCode));
        $this->createdDate=htmlspecialchars(strip_tags($this->createdDate));
        $this->createdBy=htmlspecialchars(strip_tags($this->createdBy));
       
        // bind values
        $stmt->bindParam(":societyCode", $this->societyCode);
        $stmt->bindParam(":noticeTitle", $this->noticeTitle);
        $stmt->bindParam(":issueDate", $this->issueDate);
    
	     $stmt->bindParam(":validDate", $this->validDate);
        $stmt->bindParam(":noticeType", $this->noticeType);
        $stmt->bindParam(":noticeStatus", $this->noticeStatus);
    
        $stmt->bindParam(":description", $this->description);

        $stmt->bindParam(":document", $this->document);
        $stmt->bindParam(":createdCode", $this->createdCode);
        

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
        $query = "SELECT *  FROM " . $this->table_name . "  WHERE  notice_id='".$this->noticeId."'";
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