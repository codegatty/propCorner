<?php
include('inc/session.php');
include('connection.php');

    //ads
    $query3=mysqli_query($con,"SELECT * FROM `ads`");
    $max_row=mysqli_num_rows($query3);
    $ads_num=rand(1,$max_row);
    $ads_path="../admin/images/ads/";
    $query3=mysqli_query($con,"SELECT * FROM `ads` WHERE `ads_id`='$ads_num'") or die(mysqli_error($con));
    $row3=mysqli_fetch_array($query3);
    $ads_img=$row3['ads_img'];
    //ads

$property_id = $_GET['prop_id'];
$type=$_GET['type'];
if(($type=="agent")){
    $source="../admin/images/agent/property_images/";
}
else if($type=="user"){
    $source="img/user/property_images/";
}
else{
    $type="";
    $source="img/user/property_images/";
}

$query = mysqli_query($con, "SELECT * FROM `properties` WHERE `prop_id`='$property_id'") or die(mysqli_error($con));
$row = mysqli_fetch_array($query);
$prop_images = $row['prop_image'];
$prop_image_array = array();
$prop_image_array = explode(",", $prop_images);

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/image.css">

      <!--External CSS-->
    <link rel="stylesheet" href="css/btn.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="css/common-btn.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>property corner</title>
</head>

<body background="img/background.jpg">
    <div class="modal fade" id="addPic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Pictures</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form name="" method="post" action="prop_val.php?prop_id=<?php echo $property_id ?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Choose File</label>
                            <input type="file" class="btn btn-dark" name="prop_img[]" accept="image/*" multiple required>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="btn_add_img" value="Add Pictures">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <?php
        include('inc/navbar.php')
    ?>
        <!--advertisment-->
        <div class="w-100" style="height: 70px;">
        <img src="<?php echo $ads_path.$ads_img;?>" class="w-100 h-100">
    </div>
    <!--advertisment-->
    <div class="container" style="margin-top:80px;">
        <div class="row">
            <?php
                if (isset($_GET['type'])) {
                    $code = "display:none";
                } else {
                    $code = "";
                }
            //making grid view i=row j=coloumn
            for ($i = 0; $i < count($prop_image_array); $i++) {
                echo '<div class="col-md-4 image">';
                echo '<div class="col-sm"><img class="img-fluid"
                                    src="'.$source . $prop_image_array[$i] . '" width="300" height="300" style="margin-bottom:20px;border:1px solid black" 
                                    ></div>';
                echo '<a  class="btn btn-lg" href="prop_val.php?photodel&&prop_id=' . $property_id . '&&img_index=' . $i . '" style="'.$code.'">Delete</a>';
                echo '</div>';
            }
            ?>
        </div>
        <!-- Button trigger modal -->
        <center><a class="btn style-btn" data-toggle="modal" data-target="#addPic" style="<?php echo $code; ?>" >Add</a></center>
    </div>

    <?php
        include('inc/footer.php')
    ?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>