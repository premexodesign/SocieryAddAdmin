<?php
class Member{
 
    // database connection and table name
    private $conn;
    private $table_name = "owner";
    public $owner_id;
    public $owner_code = 22;

    public $prefix;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $pancard_no;
    public $email_id;
    public $aadharcard_no;
    public $contact_no;
    public $alt_contact;
    public $profile_pic;
    public $created_date;
    public $created_by = "niraj kumar";

 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    
    
    
     function memberRegister(){
    
        /*if($this->isAlreadyExist()){
            return false;
        }*/
        // query to insert record
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    owner_code=:owner_code,prefix=:prefix,first_name=:first_name,middle_name=:middle_name,last_name=:last_name,pancard_no=:pancard_no,email_id=:email_id,aadharcard_no=:aadharcard_no,contact_no=:contact_no,alt_contact=:alt_contact,profile_pic=:profile_pic,created_date=:created_date,created_by=:created_by";
                    
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    

        $this->first_name=htmlspecialchars(strip_tags($this->first_name));
        $this->middle_name=htmlspecialchars(strip_tags($this->middle_name));
        $this->last_name=htmlspecialchars(strip_tags($this->last_name));
        $this->email_id=htmlspecialchars(strip_tags($this->email_id));
        $this->pancard_no=htmlspecialchars(strip_tags($this->pancard_no));
        $this->aadharcard_no=htmlspecialchars(strip_tags($this->aadharcard_no));
        $this->contact_no=htmlspecialchars(strip_tags($this->contact_no));
        $this->alt_contact=htmlspecialchars(strip_tags($this->alt_contact));
        $this->profile_pic=htmlspecialchars(strip_tags($this->profile_pic));
        // bind values
        $stmt->bindParam(":owner_code", $this->owner_code);
        $stmt->bindParam(":prefix", $this->prefix);
        $stmt->bindParam(":first_name", $this->first_name);
        $stmt->bindParam(":middle_name", $this->middle_name);
        $stmt->bindParam(":last_name", $this->last_name);
        $stmt->bindParam(":email_id", $this->email_id);
        $stmt->bindParam(":pancard_no", $this->pancard_no);
        $stmt->bindParam(":aadharcard_no", $this->aadharcard_no);
        $stmt->bindParam(":contact_no", $this->contact_no);
        $stmt->bindParam(":alt_contact", $this->alt_contact);
        $stmt->bindParam(":profile_pic", $this->profile_pic);
        $stmt->bindParam(":created_date", $this->created_date);
        $stmt->bindParam(":created_by", $this->created_by);

    
        // execute query
        if($stmt->execute()){
            $this->owner_id = $this->conn->lastInsertId();
            
            $q = "SELECT owner_code FROM ".$this->table_name." WHERE owner_id='".$this->owner_id."'";
            $stm = $this->conn->prepare($q);
            $stm->execute(); 
            return true;
        }
    
        return false;
            
    }
    /* login user
    function login(){
        // select all query
        $query = "SELECT id,username,password,created  FROM " . $this->table_name . "  WHERE username='".$this->username."' AND password='".$this->password."'";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        return $stmt;
    }
    function isAlreadyExist(){
        $query = "SELECT *  FROM " . $this->table_name . "  WHERE  secretary_id='".$this->secretary_id."'";
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
    }*/
}