<?php
include('inc/session.php')
?>
<!DOCTYPE HTML>
<html>

<head>
    <?php include('inc/head.php'); ?>
    <link rel="stylesheet" href="css/custommainpage.css">

    <script type="text/javascript">
        function validatePassword() {

            var currentPass, newPass, confirmPass, output = true;

            currentPass = document.formChange.current_pass;
            newPass = document.formChange.new_pass;
            confirmPass = document.formChange.confirm_pass;

            if (!currentPass.value) {
                currentPass.focus();
                document.getElementById('currentPass').innerHTML = "Current password cannot be emepty";
                output = false;
            } else if (!newPass.value) {
                newPass.focus();
                document.getElementById('newPass').innerHTML = "new  password cannot be emepty";
                output = false;
            } else if (!confirmPass.value) {
                confirmPass.focus();
                document.getElementById('confirmPass').innerHTML = "confirm  password cannot be emepty";
                output = false;
            }

            if (newPass.value != confirmPass.value) {
                confirmPass.value = "";
                newPass.value = "";
                newPass.focus();
                document.getElementById('confirmPass').innerHTML = "password doesnot match";
                output = false;
            }
            return output;
        }
    </script>
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


        <!--change password Form-->
        <div id="page-wrapper">
            <div class="main-page mod-main-page">
                    <div class="row">
                        <div class="col-md-6">
                            <?php 
                                include('connection.php');

                                if(count($_POST)>0)
                                {
                                    $newPass=$_POST['new_pass'];    
                                    $query=mysqli_query($con,"SELECT * FROM `login` WHERE  `email`='$userEmail'") or
                                    die(mysqli_error($con));
                                    $row=mysqli_fetch_array($query);

                                    if($_POST['current_pass']==$row['password'])
                                    {
                                        $update=mysqli_query($con,"UPDATE `login` SET `password`='$newPass' WHERE  `email`='$userEmail'") or die(mysqli_error($con));
                                        echo '<div class="alert alert-success">
                                        <p>Password Changed Successfully</p>
                                        </div>';
                                    }
                                    else{
                                        echo '<div class="alert alert-danger">
                                        <p>Current password is not correct</p>
                                        </div>';
                                    }
                                }
                            ?>
                            <form action="" method="post" name="formChange" onsubmit="return validatePassword()">
                                <h1>Change Password</h1>
                                <div class="form-group">
                                    <label>Current Password</label>
                                    <input class="form-control" type="password" name="current_pass" placeholder="Current Password" data-validation="required">
                                    <span id="currentPass"></span>
                                </div>
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input class="form-control" type="password" name="new_pass" placeholder="Current Password" data-validation="required">
                                    <span id="newPass"></span>
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input class="form-control" type="password" name="confirm_pass" placeholder="Current Password" data-validation="required">
                                    <span id="confirmPass"></span>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="btn_chng_pass" value="change Password" class="btn btn-danger btn-block">
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <?php include("inc/bottom.php"); ?>
</body>

</html>