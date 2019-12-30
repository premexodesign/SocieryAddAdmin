<?php

class Vendor{
 
    // database connection and table name
    private $conn;
    private $table_name = "vendor";
    // object properties
    public $vendorId;
    public $vendorName;
    public $contactPersonName;
    public $contactNo;
    public $otherDetails;
    public $typeOfService;
    public $stGstRegNo;
	public $sgst;
	public $sacCode;
    public $cgst;
    public $igst;
    public $assetName;
    public $amcExists;
    public $amcType;
    public $serviceScheduleDate;
    public $amcEndDate;
    public $amcFeeDetails;
    public $amcOtherDetails;
    public $totalBill;
    public $createdDate;
    public $createdBy;
   
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    // signup user
    function invoiceRegister(){
    
        if($this->isAlreadyExist()){
            return false;
        }
        // query to insert record
        $query = "INSERT INTO " . $this->table_name . "SET vendor_name=:vendorName,contact_person_name=:contactPersonName,contact_no=:contactNo,
        other_details=:otherDetails,type_of_service=:typeOfService,
        st_gst_reg_no=:stGstRegNo,sgst=:sgst,sac_code=:sacCode,cgst=:cgst,igst=:igst,asset_name=:assetName,amc_exists=:amcExists,
        amc_type=:amcType,service_schedule_date=:serviceScheduleDate,amc_end_date=:amcEndDate,amc_fee_details=:amcFeeDetails,amc_other_details=:amcOtherDetails,total_bill=:total_bill,
       created_date=:createdDate,created_by=:createdBy";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
              // sanitize
        $this->vendorName=htmlspecialchars(strip_tags($this->vendorName));
        $this->contactPersonName=htmlspecialchars(strip_tags($this->contactPersonName));
        $this->contactNo=htmlspecialchars(strip_tags($this->contactNo));
        $this->otherDetails=htmlspecialchars(strip_tags($this->otherDetails));      
        $this->typeOfService=htmlspecialchars(strip_tags($this->typeOfService));
        $this->stGstRegNo=htmlspecialchars(strip_tags($this->stGstRegNo));
		$this->sgst=htmlspecialchars(strip_tags($this->sgst));
        $this->sacCode=htmlspecialchars(strip_tags($this->sacCode));
        $this->cgst=htmlspecialchars(strip_tags($this->cgst));
        $this->igst=htmlspecialchars(strip_tags($this->igst));
        $this->assetName=htmlspecialchars(strip_tags($this->assetName));
        $this->amcExists=htmlspecialchars(strip_tags($this->amcExists));
        $this->amcType=htmlspecialchars(strip_tags($this->amcType));
        $this->serviceScheduleDate=htmlspecialchars(strip_tags($this->serviceScheduleDate));
        $this->amcEndDate=htmlspecialchars(strip_tags($this->amcEndDate));
        $this->amcFeeDetails=htmlspecialchars(strip_tags($this->amcFeeDetails));       
        $this->amcOtherDetails=htmlspecialchars(strip_tags($this->amcOtherDetails));
        $this->totalBill=htmlspecialchars(strip_tags($this->totalBill));
        $this->createdDate=htmlspecialchars(strip_tags($this->createdDate));
        $this->createdBy=htmlspecialchars(strip_tags($this->createdBy));
        // bind values
        $stmt->bindParam(":vendorName", $this->vendorName);
        $stmt->bindParam(":contactPersonName", $this->contactPersonName);
        $stmt->bindParam(":contactNo", $this->contactNo);
        $stmt->bindParam(":otherDetails", $this->otherDetails);
        $stmt->bindParam(":typeOfService", $this->typeOfService);
        $stmt->bindParam(":stGstRegNo", $this->stGstRegNo);    
        $stmt->bindParam(":sgst", $this->sgst);
        $stmt->bindParam(":sacCode", $this->sacCode);
        $stmt->bindParam(":cgst", $this->cgst);  
        $stmt->bindParam(":igst", $this->igst);  
        $stmt->bindParam(":assetName", $this->assetName);
        $stmt->bindParam(":amcExists", $this->amcExists);
        $stmt->bindParam(":amcType", $this->amcType);
        $stmt->bindParam(":serviceScheduleDate", $this->serviceScheduleDate);
        $stmt->bindParam(":amcEndDate", $this->amcEndDate);
        $stmt->bindParam(":amcFeeDetails", $this->amcFeeDetails);
        $stmt->bindParam(":amcOtherDetails", $this->amcOtherDetails);
        $stmt->bindParam(":totalBill", $this->totalBill);
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
        $query = "SELECT *  FROM " . $this->table_name . "  WHERE  tenant_id='".$this->tenantId."'";
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