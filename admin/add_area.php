<?php
include('inc/session.php');
include('connection.php');


if (isset($_GET['edit'])) {
    $area_id = $_GET['area_id'];
    $update = $_GET['edit'];

    $query = mysqli_query($con, "SELECT * FROM `area` WHERE `area_id`='$area_id'") or die(mysqli_error($con));
    $row = mysqli_fetch_array($query);
    $area_name = $row['area_name'];
}
?>
<!DOCTYPE HTML>
<html>

<head>
    <?php include('inc/head.php'); ?>
    <link rel="stylesheet" href="css/custommainpage.css">
    <!--scroll bar css-->
    <link rel="stylesheet" href="css/mod-scroll.css">
    <!--scroll bar css-->

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

        <!--Add Agent-->
        <div id="page-wrapper">
            <div class="main-page mod-main-page">
                <h1><?php echo isset($_GET['edit']) ? "Edit" : "Add" ?> Area</h1>
                <div class="conatiner">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="<?php echo(isset($update)?'val_area.php?update&&area_id='.$area_id:'val_area.php?add') ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Area Name</label>
                                    <input type="text" class="form-control" placeholder="Area within Mangloore" name="area_name" value="<?php echo (isset($update) ? $area_name : ''); ?>" data-validation="required">
                                </div>
                                <input type="submit" class="btn btn-danger" style="width:100%!important;" value="<?php echo(isset($update)?'update':'Add');?>">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <?php include("inc/bottom.php"); ?>
</body>

</html>