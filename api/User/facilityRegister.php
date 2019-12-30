<?php
    
    include_once '../config/database.php';
    include_once '../objects/Facility.php';

    $database = new Database();
    $db = $database->getConnection();

    $facility = new Facility($db);

    $facility->f_name = $_POST['facility_name'];
    $facility->f_type = $_POST['facility_type'];
    $facility->f_description = $_POST['description'];
    $facility->hourly_charge = $_POST['hourly_charge'];
    $facility->daily_charge  = $_POST['daily_charge'];
    $facility->monthly_charge = $_POST['monthly_charge'];
    $facility->yearly_charge = $_POST['yearly_charge'];
    $facility->created_date = date("Y-m-d H:i:s");
    $facility->created_by = "Nirajkumar";
  
    
    if($facility->addfacility())
    {   
        echo "<script>alert('Record Inserted Successfully');</script>";
        $facility_arr=array(
            "status" => true,
            "message" => "Facility Successfully Added!",
            "f_id" => $facility->f_id,
            "f_name" => $facility->f_name,
            "f_type" => $facility->f_type,
            "f_description" => $facility->f_description,
            "hourly_charge" => $facility->hourly_charge,
            "daily_charge" => $facility->daily_charge,
            "monthly_charge" => $facility->monthly_charge,
            "yearly_charge" => $facility->yearly_charge,        
            "created_date" => $facility->created_date,
            "created_by" => $facility->created_by);
    }
    else
    {
        $facility_arr = array(
            "status" => false,
            "message" => "Not inserted");
    }



print_r(json_encode($facility_arr));


?>