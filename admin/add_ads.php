<?php
include('inc/session.php');
include('connection.php');


if (isset($_GET['edit'])) {
    $adv_id = $_GET['ads_id'];
    $update = $_GET['edit'];

    $query = mysqli_query($con, "SELECT * FROM `ads` WHERE `ads_id`='$adv_id'") or die(mysqli_error($con));
    $row = mysqli_fetch_array($query);
    $adv_title = $row['ads_title'];
    $adv_description = $row['ads_desc'];
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
                <h1><?php echo isset($_GET['edit']) ? "Edit" : "Add" ?>Advertisment</h1>
                <div class="conatiner">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="<?php echo(isset($update)?'val_ads.php?update&&ads_id='.$adv_id:'val_ads.php?add') ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Ads Title</label>
                                    <input type="text" class="form-control" placeholder="Title of Advertisment" name="ads_title" value="<?php echo (isset($update) ? $adv_title : ''); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Ads Description</label>
                                    <input type="text" class="form-control" placeholder="Description About Advertisment" name="ads_desc" value="<?php echo (isset($update) ? $adv_description : ''); ?>" data-validation="required">
                                </div>
                                <div class="form-group">
                                    <label <?php echo isset($update)?'style=display:none':'';?>>Ads Image</label>
                                    <input type="file" class="form-control" name="ads_img" accept="image/*"  <?php echo(isset($update)?'style=display:none':'data-validation-allowing="jpg, png" data-validation-max-size="300kb" data-validation-error-msg-required="No image selected" data-validation="mime size required" '); ?> accept="image/*">
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