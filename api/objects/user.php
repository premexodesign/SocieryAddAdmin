<?php
class User{
 
    // database connection and table name
    private $conn;
    private $table_name = "users";
 
    // object properties
    public $uid;
    public $username;
    public $password;
    public $email;
    public $doj;
    public $address;
    public $contactno;
	public $profile_pic;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    // signup user
 function signup(){
    
        if($this->isAlreadyExist()){
            return false;
        }
        // query to insert record
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    username=:username, password=:password,email=:email,doj=:doj,address=:address,contactno=:contactno,profile_pic=:profile_pic";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->password=htmlspecialchars(strip_tags($this->password));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->doj=htmlspecialchars(strip_tags($this->doj));
        $this->address=htmlspecialchars(strip_tags($this->address));
        $this->contactno=htmlspecialchars(strip_tags($this->contactno));
		$this->profile_pic=htmlspecialchars(strip_tags($this->profile_pic));
        // bind values
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":doj", $this->doj);
        $stmt->bindParam(":address", $this->address);
        $stmt->bindParam(":contactno", $this->contactno);
		$stmt->bindParam(":profile_pic", $this->profile_pic);
    
        // execute query
        if($stmt->execute()){
            $this->id = $this->conn->lastInsertId();
            return true;
        }
    
        return false;
        
    }
	
	
	
	
    // login user
    function login(){
        // select all query
        $query = "SELECT username,password  FROM " . $this->table_name . "  WHERE email='".$this->username."' AND password='".$this->password."'";
     
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        return $stmt;
    }
    function isAlreadyExist(){
        $query = "SELECT *  FROM " . $this->table_name . "  WHERE  username='".$this->username."'";
        echo $query;
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