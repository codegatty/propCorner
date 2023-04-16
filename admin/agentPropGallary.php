<?php
include('inc/session.php');
include('connection.php');

$property_id = $_GET['prop_id'];

$query = mysqli_query($con, "SELECT * FROM `properties` WHERE `prop_id`='$property_id'") or die(mysqli_error($con));
$row = mysqli_fetch_array($query);
$user_type=$row['user_type'];

if($user_type=="agent"){
    $source="images/agent/property_images/";
}
else if($user_type=="user"){
    $source="../user-dummy/img/user/property_images/";
}
$prop_images = $row['prop_image'];
$prop_image_array = array();
$prop_image_array = explode(",", $prop_images);

?>
<!DOCTYPE HTML>
<html>

<head>
    <?php include('inc/head.php'); ?>
    <link rel="stylesheet" href="css/custommainpage.css">
    <!--scroll bar css-->
    <link rel="stylesheet" href="css/mod-scroll.css">
    <!--scroll bar css-->

    <link rel="stylesheet" href="css/image.css">
</head>

<body class="cbp-spmenu-push">
    <div class="main-content">
        <!--left-fixed -navigation-->
        <?php include('inc/sidebar.php'); ?>
        <!--left-fixed -navigation-->
        <!-- header-starts -->
        <?php include('inc/header.php'); ?>
        <!-- //header-ends -->
        <!-- main content start-->
        <!--footer-->
        <?php include('inc/footer.php'); ?>
        <!--//footer-->

        <!-- Modal -->
        <div class="modal fade" id="addPic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Pictures</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form name="" method="post" action="val_prop.php?prop_id=<?php echo $property_id?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Choose File</label>
                                <input type="file" class="btn btn-dark" name="prop_img[]" accept="image/*" multiple  <?php echo(isset($update)?'':'data-validation-allowing="jpg, png" data-validation-max-size="300kb" data-validation-error-msg-required="No image selected" data-validation="mime size required" '); ?> accept="image/*">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" name="btn_add_img" value="Add Pictures">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!--Add Agent-->
        <div id="page-wrapper">
            <div class="main-page mod-main-page">
                <h1>Gallary</h1>
                <div class="conatiner">
                    <div class="row">
                        <?php
                        //making grid view i=row j=coloumn

                        if ($userRole == "admin") {
                            $code = "display:none";
                        } else {
                            $code = "";
                        }

                        for ($i = 0; $i < count($prop_image_array); $i++) {
                            echo '<div class="col-md-4 image">';
                            echo '<div class="col-sm"><img class="img-responsive"
                                    src="'.$source. $prop_image_array[$i] .'" width="300" height="300" style="margin-bottom:20px;border:1px solid black" 
                                    ></div>';
                            echo '<a  class="btn btn-lg" href="val_prop.php?photodel&&prop_id=' . $property_id . '&&img_index=' . $i . '" style="' . $code . '">Delete</a>';
                            echo '</div>';
                        }
                        ?>
                    </div>
                    <a class="btn btn-success btn-block" data-toggle="modal" data-target="#addPic" href="" style="<?php echo $code; ?>">Add</a>
                </div>
            </div>
        </div>
    </div>
    <?php include("inc/bottom.php"); ?>
</body>

</html>