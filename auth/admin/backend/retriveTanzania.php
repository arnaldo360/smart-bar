<?php
require_once "../database/dbConnect.php";
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


<script>
    $(document).ready(function() {
        $('#region-dropdown').on('change', function() {
            var region_id = this.value;

            $.ajax({
                url: "../../backend/retriveTanzania.php",
                type: "POST",
                data: {
                    region_id: region_id
                },
                cache: false,
                success: function(result) {
                    $("#district-dropdown").html(result);
                }
            });
        });
    });

    $(document).ready(function() {
        $('#district-dropdown').on('change', function() {
            var district_id = this.value;

            $.ajax({
                url: "../../backend/retriveTanzania.php",
                type: "POST",
                data: {
                    district_id: district_id
                },
                cache: false,
                success: function(result) {
                    $("#ward-dropdown").html(result);
                }
            });
        });
    });
</script>

<option value="">Select region</option>
<?php
require_once "../../database/dbConnect.php";
$result = mysqli_query($mysqli, "call displayRegion()");
while ($row = mysqli_fetch_array($result)) {
?>
    <option value="<?php echo $row['regionId']; ?>"><?php echo $row["regionName"]; ?></option>
<?php
}
?>