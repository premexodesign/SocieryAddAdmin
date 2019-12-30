<?php
class Secretary
{
 
    // database connection and table name
    private $conn;
    private $table_name = "secretary";
    public $secretary_id;

    public $society_name;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $email_id;
    public $present_address;
    public $permanent_address;
    public $city;
    public $state;
    public $pincode;
    public $pancard_no;
    public $aadharcard_no;
    public $contact_no;
    public $profile_pic;
    public $created_date;
    public $created_by;

 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    

     function secretaryRegister(){
    
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    society_name=:society_name,first_name=:first_name,middle_name=:middle_name,last_name=:last_name,email_id=:email_id,present_address=:present_address,permanent_address=:permanent_address,city=:city,state=:state,pincode=:pincode,pancard_no=:pancard_no,aadharcard_no=:aadharcard_no,contact_no=:contact_no, profile_pic=:profile_pic,created_date=:created_date,created_by=:created_by";
                
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        $this->society_name=htmlspecialchars(strip_tags($this->society_name));
        $this->first_name=htmlspecialchars(strip_tags($this->first_name));
        $this->middle_name=htmlspecialchars(strip_tags($this->middle_name));
        $this->last_name=htmlspecialchars(strip_tags($this->last_name));
        $this->email_id=htmlspecialchars(strip_tags($this->email_id));
        $this->present_address=htmlspecialchars(strip_tags($this->present_address));
        $this->permanent_address=htmlspecialchars(strip_tags($this->permanent_address));
        $this->city=htmlspecialchars(strip_tags($this->city));
        $this->state=htmlspecialchars(strip_tags($this->state));
        $this->pincode=htmlspecialchars(strip_tags($this->pincode));
        $this->pancard_no=htmlspecialchars(strip_tags($this->pancard_no));
        $this->aadharcard_no=htmlspecialchars(strip_tags($this->aadharcard_no));
        $this->contact_no=htmlspecialchars(strip_tags($this->contact_no));
        $this->profile_pic=htmlspecialchars(strip_tags($this->profile_pic));
        // bind values
        $stmt->bindParam(":society_name", $this->society_name);
        $stmt->bindParam(":first_name", $this->first_name);
        $stmt->bindParam(":middle_name", $this->middle_name);
        $stmt->bindParam(":last_name", $this->last_name);
        $stmt->bindParam(":email_id", $this->email_id);
        $stmt->bindParam(":present_address", $this->present_address);
        $stmt->bindParam(":permanent_address", $this->permanent_address);
        $stmt->bindParam(":city", $this->city);
        $stmt->bindParam(":state", $this->state);
        $stmt->bindParam(":pincode", $this->pincode);
        $stmt->bindParam(":pancard_no", $this->pancard_no);
        $stmt->bindParam(":aadharcard_no", $this->aadharcard_no);
        $stmt->bindParam(":contact_no", $this->contact_no);
        $stmt->bindParam(":profile_pic", $this->profile_pic);
        $stmt->bindParam(":created_date", $this->created_date);
        $stmt->bindParam(":created_by", $this->created_by);
        


        // execute query
        if($stmt->execute()){

            $this->secretary_id = $this->conn->lastInsertId();
            
            return true;
        }
    
        return false;
            
    }
    
}


?>