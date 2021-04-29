function mspCheck(that) {
        var crop = that.value;
        <?php
            $crop_name = "<script>document.writeln(crop);</script>";
            $sql = "Select * from cropdetails where cro_name='$crop_name'";
            $query = mysqli_query($con, $sql);
            while ($res = mysqli_fetch_array($query)) {
                $crop_msp = $res['cro_msp'];
            }
            ?>
            document.getElementById("mspshow").innerHTML = "<p>MSP value of <?php echo $crop_name; ?> is: Rs. <?php echo $crop_msp; ?></p>";
    }