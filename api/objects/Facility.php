<?php
class Facility{


private $conn;
private $table = "facility";
public $f_id;
public $f_name;
public $f_type;
public $f_description;
public $hourly_charge;
public $daily_charge;
public $monthly_charge;
public $yearly_charge;
public $created_date;
public $created_by;



    public function __construct($db)
    {

        $this->conn = $db;
    }
    function addfacility()
    {
        $query = "INSERT INTO ".$this->table." SET f_name=:f_name,f_type=:f_type,f_description=:f_description,hourly_charge=:hourly_charge,daily_charge=:daily_charge,monthly_charge=:monthly_charge,yearly_charge=:yearly_charge,created_date=:created_date,created_by=:created_by"; 

    
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":f_name", $this->f_name);
        $stmt->bindParam(":f_type", $this->f_type);
        $stmt->bindParam(":f_description", $this->f_description);
        $stmt->bindParam(":hourly_charge", $this->hourly_charge);
        $stmt->bindParam(":daily_charge", $this->daily_charge);
        $stmt->bindParam(":monthly_charge", $this->monthly_charge);
        $stmt->bindParam(":yearly_charge", $this->yearly_charge);
        $stmt->bindParam(":created_date", $this->created_date);
        $stmt->bindParam(":created_by", $this->created_by);

        if($stmt->execute())
        {
            $this->f_id = $this->conn->lastInsertId();
            return true;
        }

        return false;
    }
}

