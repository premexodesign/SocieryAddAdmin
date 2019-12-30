<?php
    
    include_once '../config/database.php';
    include_once '../objects/Service.php';

    $database = new Database();
    $db = $database->getConnection();

    $service = new Service($db);

    $service->s_name = $_POST['service_name'];
    $service->s_type = $_POST['service_type'];
    $service->s_description = $_POST['description'];
    $service->hourly_charge = $_POST['hourly_charge'];
    $service->daily_charge  = $_POST['daily_charge'];
    $service->monthly_charge = $_POST['monthly_charge'];
    $service->yearly_charge = $_POST['yearly_charge'];
    $service->created_date = date("Y-m-d H:i:s");
    $service->created_by = "Nirajkumar";

  
    
    if($service->addservice())
    {   
        echo "<script>alert('Record Inserted Successfully');</script>";
        $service_arr=array(
            "status" => true,
            "message" => "Service Successfully Added!",
            "s_id" => $service->s_id,
            "s_name" => $service->s_name,
            "s_type" => $service->s_type,
            "s_description" => $service->s_description,
            "hourly_charge" => $service->hourly_charge,
            "daily_charge" => $service->daily_charge,
            "monthly_charge" => $service->monthly_charge,
            "yearly_charge" => $service->yearly_charge,
            "created_date" => $service->created_date,
            "created_by" => $service->created_by);
    }
    else
    {
        $service_arr = array(
            "status" => false,
            "message" => "Not inserted");
    }



print_r(json_encode($service_arr));


?>