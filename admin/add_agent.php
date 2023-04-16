<?php
include('inc/session.php');
include('connection.php');


if (isset($_GET['edit'])) {
    $agent_id = $_GET['ag_id'];
    $update = $_GET['edit'];

    $query = mysqli_query($con, "SELECT * FROM `agent` WHERE `ag_id`='$agent_id'") or die(mysqli_error($con));
    $row = mysqli_fetch_array($query);

    $agent_name = $row['ag_name'];
    $agent_address = $row['ag_address'];
    $agent_email = $row['ag_email'];
    $agent_gender = $row['ag_gender'];
    $agent_phone = $row['ag_phone'];
    $agent_rating = $row['ag_rating'];
    $agent_exp = $row['ag_exp'];
    $agent_license = $row['ag_license'];
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
                <h1><?php echo isset($_GET['edit']) ? "Edit" : "Add" ?> Agent</h1>
                <div class="conatiner">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="<?php echo(isset($update)?'val_agent.php?update&&ag_id='.$agent_id:'val_agent.php?add') ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control txtOnly" placeholder="Name of agent" name="ag_name" value="<?php echo (isset($update) ? $agent_name : ''); ?>" data-validation="required">
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control" placeholder="Address of agent" name="ag_address" data-validation="required"><?php echo (isset($update) ? $agent_address : ''); ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Phone no</label>
                                    <input type="nuber" class="form-control" placeholder="Phone no of agent" name="ag_phoneno" value="<?php echo (isset($update) ? $agent_phone : ''); ?>" onkeypress="return isNumber(event)" data-validation="required">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" placeholder="E-mail of agent" name="ag_email" value="<?php echo (isset($update) ? $agent_email : ''); ?>" data-validation="required email">
                                </div>
                                <div class="form-group">
                                    <label>Gender</label><br />
                                    <?php
                                    $male = $female = '';
                                    if ($agent_gender == 'Male') {
                                        $male = "checked";
                                    } else {
                                        $female = "checked";
                                    }
                                    ?>
                                    <label style="margin-right:5px!important;">Male</label><input type="radio" value="Male" name="ag_gender" class="form-check-input" <?php echo $male ?>>
                                    <label style="margin-left:30px!important;margin-right:5px!important;">Female</label><input type="radio" value="Female" name="ag_gender" class="form-check-input" <?php echo $female ?>>
                                </div>
                                <?php
                                if (isset($update)) {
                                } else {
                                ?>
                                    <div class="form-group">
                                        <label>Profile photo</label>
                                        <input type="file" class="form-control" require name="ag_pic" <?php echo(isset($update)?'':'data-validation-allowing="jpg, png" data-validation-max-size="300kb" data-validation-error-msg-required="No image selected" data-validation="mime size required" '); ?> accept="image/*">
                                    </div>
                                <?php } ?>

                                <div class="form-group">
                                    <label>License</label>
                                    <input type="file" class="form-control" require name="ag_license" accept="application/pdf" value="nse : ''); ?>" required>
                                    <a href="<?php echo (isset($update) ? "images/agent/license/".$agent_license : ''); ?>" download><?php echo (isset($update) ? $agent_license : ''); ?></a>
                                    <input type="hidden" name="agent_license_name" value="<?php echo (isset($update) ? $agent_license : ''); ?>">
                                </div>

                                <div class="form-group">
                                    <label>Exp as Agent</label>
                                    <input type="number" class="form-control" name="ag_exp" value="<?php echo (isset($update) ? $agent_exp : ''); ?>" onkeypress="return isNumber(event)" data-validation="required" >
                                </div>
                                <div class="form-group">
                                    <label>Ratings</label>
                                    <input type="number" class="form-control" name="ag_rating" value="<?php echo (isset($update) ? $agent_rating : ''); ?>" onkeypress="return isNumber(event)" data-validation="required" required>
                                </div>
                                <?php
                                if (isset($update)) {
                                } else {
                                ?>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" id="password" data-validation="strength" data-validation-strength="2">
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" class="form-control" id="confirmPassword" name="ag_password" data-validation="confirmation" data-validation-confirm="password" onchange="passwordValidator()" required>
                                    </div>
                                <?php
                                }
                                ?>
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