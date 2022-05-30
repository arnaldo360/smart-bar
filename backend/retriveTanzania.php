<?php
include_once("../database/dbConnect.php");
if (isset($_POST['region_id'])) {
    $region_id = $_POST["region_id"];

    $resultRegion = mysqli_query($mysqli, "CALL districtRegion($region_id)");
?>
    <option value="">Select District</option>
    <?php
    while ($row = mysqli_fetch_array($resultRegion)) {
    ?>
        <option value="<?php echo $row["districtId"]; ?>"><?php echo $row["districtName"]; ?></option>
    <?php
    }
} else {
    //calling wards of a given district Id
    $district_id = $_POST["district_id"];

    $resultDistrict = mysqli_query($mysqli, "CALL wardDistrict($district_id)");
    ?>
    <option value="">Select Ward</option>
    <?php
    while ($row = mysqli_fetch_array($resultDistrict)) {
    ?>
        <option value="<?php echo $row["wardId"]; ?>"><?php echo $row["wardName"]; ?></option>
<?php
    }
}


?>


