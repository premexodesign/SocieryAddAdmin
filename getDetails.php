<?php
require_once ("dbcontroller.php");
$db_handle = new DBController();
if (! empty($_POST["order_id"])) {
    $query = "SELECT * FROM orderdetails WHERE id = '" . $_POST["order_id"] . "'";
    $results = $db_handle->runQuery($query);
    ?>
<option value disabled selected>Select City</option>
<?php
    foreach ($results as $city) {
        ?>
<option value="<?php echo $city["id"]; ?>"><?php echo $city["name"]; ?></option>
<?php
    }
}
?>