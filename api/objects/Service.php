<?php
class Service{


private $conn;
private $table = "services";
public $s_id;
public $s_name;
public $s_type;
public $s_description;
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
    function addservice()
    {
        $query = "INSERT INTO ".$this->table." SET s_name=:s_name,s_type=:s_type,s_description=:s_description,hourly_charge=:hourly_charge,daily_charge=:daily_charge,monthly_charge=:monthly_charge,yearly_charge=:yearly_charge,created_date=:created_date,created_by=:created_by"; 

    
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":s_name", $this->s_name);
        $stmt->bindParam(":s_type", $this->s_type);
        $stmt->bindParam(":s_description", $this->s_description);
        $stmt->bindParam(":hourly_charge", $this->hourly_charge);
        $stmt->bindParam(":daily_charge", $this->daily_charge);
        $stmt->bindParam(":monthly_charge", $this->monthly_charge);
        $stmt->bindParam(":yearly_charge", $this->yearly_charge);
        $stmt->bindParam(":created_date", $this->created_date);
        $stmt->bindParam(":created_by", $this->created_by);

        if($stmt->execute())
        {
            $this->s_id = $this->conn->lastInsertId();
            return true;
        }

        return false;
    }
}

