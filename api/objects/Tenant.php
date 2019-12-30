<?php
class Tenant{
 
    // database connection and table name
    private $conn;
    private $table_name = "tenant";
    public $house_id = 1;
    public $tenant_id;

    public $first_name;
    public $middle_name;
    public $last_name;
    public $email_id;
    public $permanent_address;
    public $city;
    public $state;
    public $pincode;
    public $pancard_no;
    public $aadharcard_no;
    public $contact_no;
    public $ref_contact1;
    public $ref_contact2;
    public $rent_start;
    public $rent_end;
    public $rent_agreement;
    public $aadharcard_img;
    public $pancard_img;
    public $total_person;
    public $profile_pic;
    public $tenant_type;
    public $created_date;
    public $created_by = "Niraj kumar";

 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    
    
     function tenantsignup(){
    
       /* if($this->isAlreadyExist())
        {
            return false;
        }*/
        // query to insert record
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    house_id=:house_id,first_name=:first_name,middle_name=:middle_name,last_name=:last_name,email_id=:email_id,permanent_address=:permanent_address,city=:city,state=:state,pincode=:pincode,pancard_no=:pancard_no,aadharcard_no=:aadharcard_no,contact_no=:contact_no,ref_contact1=:ref_contact1,ref_contact2=:ref_contact2,rent_start=:rent_start,rent_end=:rent_end,rent_agreement=:rent_agreement,aadharcard_img=:aadharcard_img,pancard_img=:pancard_img,total_person=:total_person,profile_pic=:profile_pic,tenant_type=:tenant_type,created_date=:created_date,created_by=:created_by";
                    
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    

        
        $this->first_name=htmlspecialchars(strip_tags($this->first_name));
        $this->middle_name=htmlspecialchars(strip_tags($this->middle_name));
        $this->last_name=htmlspecialchars(strip_tags($this->last_name));
        $this->email_id=htmlspecialchars(strip_tags($this->email_id));
        $this->permanent_address=htmlspecialchars(strip_tags($this->permanent_address));
        $this->city=htmlspecialchars(strip_tags($this->city));
        $this->state=htmlspecialchars(strip_tags($this->state));
        $this->pincode=htmlspecialchars(strip_tags($this->pincode));
        $this->pancard_no=htmlspecialchars(strip_tags($this->pancard_no));
        $this->aadharcard_no=htmlspecialchars(strip_tags($this->aadharcard_no));
        $this->contact_no=htmlspecialchars(strip_tags($this->contact_no));
        $this->ref_contact1=htmlspecialchars(strip_tags($this->ref_contact1));
        $this->ref_contact2=htmlspecialchars(strip_tags($this->ref_contact2));
        $this->rent_start=htmlspecialchars(strip_tags($this->rent_start));
        $this->rent_end=htmlspecialchars(strip_tags($this->rent_end));
        
        // bind values
        $stmt->bindParam(":house_id", $this->house_id);
        $stmt->bindParam(":first_name", $this->first_name);
        $stmt->bindParam(":middle_name", $this->middle_name);
        $stmt->bindParam(":last_name", $this->last_name);
        $stmt->bindParam(":email_id", $this->email_id);
        $stmt->bindParam(":permanent_address", $this->permanent_address);
        $stmt->bindParam(":city", $this->city);
        $stmt->bindParam(":state", $this->state);
        $stmt->bindParam(":pincode", $this->pincode);
        $stmt->bindParam(":pancard_no", $this->pancard_no);
        $stmt->bindParam(":aadharcard_no", $this->aadharcard_no);
        $stmt->bindParam(":contact_no", $this->contact_no);
        $stmt->bindParam(":ref_contact1", $this->ref_contact1);
        $stmt->bindParam(":ref_contact2", $this->ref_contact2);
        $stmt->bindParam(":rent_start", $this->rent_start);
        $stmt->bindParam(":rent_end", $this->rent_end);
        $stmt->bindParam(":rent_agreement", $this->rent_agreement);
        $stmt->bindParam(":aadharcard_img", $this->aadharcard_img);
        $stmt->bindParam(":pancard_img", $this->pancard_img);
        $stmt->bindParam(":total_person", $this->total_person);
        $stmt->bindParam(":profile_pic", $this->profile_pic);
        $stmt->bindParam(":tenant_type", $this->tenant_type);
        $stmt->bindParam(":profile_pic", $this->profile_pic);
        $stmt->bindParam(":tenant_type", $this->tenant_type);
        $stmt->bindParam(":created_date", $this->created_date);
        $stmt->bindParam(":created_by", $this->created_by);
   

        // execute query
        if($stmt->execute()){
            $this->tenant_id = $this->conn->lastInsertId();
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
    }*/
 /*   function isAlreadyExist(){
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
    }*/
}