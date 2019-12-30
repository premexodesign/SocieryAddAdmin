<?php

class Society{
 
    // database connection and table name
    private $conn;
    private $table_name = "society";
 
    // object properties
    public $id;
    public $societycode;
    public $societyname;
    public $society_type;
    public $societyaddress;
	public $city;
	public $state;
	public $pincode;
    public $contact_no;
    public $email_id;
    public $society_web;
    public $society_pic;
    public $society_other;
	public $society_created_by;
	public $created_date;
	
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    // signup user
    function societyRegister(){
    
        if($this->isAlreadyExist()){
           echo 'hello';
            return false;
        }
        // query to insert record
        $query = "INSERT INTO " . $this->table_name . "SET societycode=:societycode, societyname=:societyname,society_type=:society_type,
		 societyaddress=:societyaddress,city=:city,state=:state,pincode=:pincode,contact_no=:contact_no,
		 email_id=:email_id,society_web=:society_web,society_other=:society_other,society_pic=:society_pic,created_date=:created_date,society_created_by=:society_created_by";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
              // sanitize
        $this->societycode=htmlspecialchars(strip_tags($this->societycode));
        $this->societyname=htmlspecialchars(strip_tags($this->societyname));
        $this->society_type=htmlspecialchars(strip_tags($this->society_type));
        $this->societyaddress=htmlspecialchars(strip_tags($this->societyaddress));
		//echo 'addresss===='.$this->society_address;
		 $this->city=htmlspecialchars(strip_tags($this->city));
        $this->state=htmlspecialchars(strip_tags($this->state));
        $this->pincode=htmlspecialchars(strip_tags($this->pincode));
		 $this->contact_no=htmlspecialchars(strip_tags($this->contact_no));
        $this->email_id=htmlspecialchars(strip_tags($this->email_id));
        $this->society_web=htmlspecialchars(strip_tags($this->society_web));
        $this->society_other=htmlspecialchars(strip_tags($this->society_other));
        $this->society_pic=htmlspecialchars(strip_tags($this->society_pic));
		$this->created_date=htmlspecialchars(strip_tags($this->created_date));
		 $this->society_created_by=htmlspecialchars(strip_tags($this->society_created_by));
         
        // bind values
        $stmt->bindParam(":societycode", $this->societycode);
        $stmt->bindParam(":societyname", $this->societyname);
        $stmt->bindParam(":society_type", $this->society_type);
        $stmt->bindParam(":societyaddress", $this->societyaddress);
         $stmt->bindParam(":city", $this->city);
        $stmt->bindParam(":state", $this->state);
        $stmt->bindParam(":pincode", $this->pincode);
        $stmt->bindParam(":contact_no", $this->contact_no);
        $stmt->bindParam(":email_id", $this->email_id);
        $stmt->bindParam(":society_web", $this->society_web);
        $stmt->bindParam(":society_other", $this->society_other);
        $stmt->bindParam(":society_pic", $this->society_pic);
        $stmt->bindParam(":created_date", $this->created_date);
		 $stmt->bindParam(":society_created_by", $this->society_created_by);
       $stmt->execute();
       $result = $stmt->fetch(\PDO::FETCH_ASSOC);
       echo 'result'. $result;
        // execute query
        if($stmt->execute()){
            echo 'form11';
            $this->id = $this->conn->lastInsertId();
			echo 'form1';
            return true;
        }
        echo 'form0';
        return false;
        
    }
	
	
	function isAlreadyExist(){
        $query = "SELECT *  FROM " . $this->table_name . "  WHERE  id='".$this->id."'";
        // prepare query statement
        echo $query;
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        if($stmt->rowCount() > 0){
            echo "success";
            return true;
        }
        else{
            echo "fail";
            return false;
        }
    }
}