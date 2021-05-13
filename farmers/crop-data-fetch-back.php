<?php
 $con = mysqli_connect("remotemysql.com", "m1t7Rrl6v7", "gIP1i7Re2y", "m1t7Rrl6v7");
$CropType = $_POST['croptype'];

if($_POST['action']=="crop-name"){
    ?>
<h5 style="color:#fff;">Crop Name</h5>
<div class="row">
    <div class="col-9">
        <select class="form-control" id="crop_vegitable" name="crop_name" onchange="mspCheck(this);">
            <option disabled selected value="">-- Select <?php echo $CropType; ?> Name --</option>
            <?php
                    $records = mysqli_query($con, "SELECT  cro_name From cropdetails where cro_type='$CropType'");  // Use select query here 

                    while ($data = mysqli_fetch_array($records)) {
                        echo "<option value='" . $data['cro_name'] . "'>" . $data['cro_name'] . "</option>";  // displaying data in option menu
                    }
                    ?>
        </select>
    </div>
    <div class="col-3">
        <a href="#" class="btn w-100 btn-info" style="border-radius: 0;"
            onclick="fetchCropDataModal('<?php echo $CropType; ?>')">View MSP</a>

    </div>


    <?php
}
if($_POST['action']=="crop-name-modal"){
?>


    <div class="modal fade" id="myModal" data-backdrop="static"
        style="position: fixed;width: 100%;height: 100%;overflow: auto;background-color: rgb(0,0,0);background-color: rgba(0,0,0,0.4);">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content"
                style="position: relative;margin: auto;padding: 0;border: 1px solid #888;width: 100%;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);">
                <!-- Modal Header -->
                <div class="modal-header" style="background-color: #0c3823;color: white;">
                    <h5 class="modal-title">View Minimum Selling Price (MSP)</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <form id="modalCropMsp">
                    <div class="modal-body">
                        <input type="hidden" name="croptype" value="<?php echo $CropType; ?>">
                        <select class="form-control selectpicker" id="cropnameModal" name="cropnameModal">
                            <option readonly selected value="">-- Select <?php echo $CropType; ?> Name --</option>
                            <?php
                                    $records = mysqli_query($con, "SELECT  cro_name From cropdetails where cro_type='$CropType'");  // Use select query here 

                                    while ($data = mysqli_fetch_array($records)) {
                                        echo "<option value='" . $data['cro_name'] . "'>" . $data['cro_name'] . "</option>";  // displaying data in option menu
                                    }
                                    ?>
                        </select>
                        <br>
                </form>
                <button type="button" onclick="fetchCropMspModal('<?php echo $CropType; ?>')" id="modalsubmit"
                    class="btn btn-danger"><i class="fa fa-user"></i>
                    Submit</button>
                <br>


                <div class="alert w-100  mt-4" id="mspResult">
                </div>

                <!-- Modal footer -->

            </div>
            <div class="modal-footer" style="padding:2px 16px;background-color: #0c3823;color: white;">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>

    <?php
}

if($_POST['action']=="crop-msp-modal"){
    if($_POST['cropname']==""){
        echo "Please Select Crop ";
    }
    else{
    $FetchMSP=$con->query("SELECT * FROM cropdetails WHERE cro_type='".$CropType."' AND cro_name='".$_POST['cropname']."'")->fetch_assoc();
echo "MSP of ".$_POST['cropname']." is ".$FetchMSP['cro_msp'];
    }
}
?>