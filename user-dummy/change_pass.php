<?php
include('inc/session.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--External CSS-->
    <link rel="stylesheet" href="css/btn.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="css/common-btn.css">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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

    <title>property corner</title>
  </head>
  <body background="img/background.jpg">

    <?php
    include('inc/navbar.php');
    ?>

    <div class="container" style="margin-top:80px;">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php 
                    include('connection.php');

                    if(count($_POST)>0)
                    {
                        $newPass=$_POST['new_pass'];    
                        $query=mysqli_query($con,"SELECT * FROM `users` WHERE  `user_email`='$userEmail'") or
                        die(mysqli_error($con));
                        $row=mysqli_fetch_array($query);

                        if($_POST['current_pass']==$row['user_password'])
                        {
                            $update=mysqli_query($con,"UPDATE `users` SET `user_password`='$newPass' WHERE  `user_email`='$userEmail'") or die(mysqli_error($con));
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
                <form action="" method="post" name="formChange" onsubmit="return validatePassword()" class="border p-5" style="box-shadow:rgba(0,0,0,0.15) 2.95px 2.95px 3.6px!important;">
                    <center><h1>Change Password</h1></center>
                    <div class="form-group">
                        <label>Current Password</label>
                        <input class="form-control" type="password" name="current_pass" placeholder="Current Password">
                        <span id="currentPass"></span>
                    </div>
                    <div class="form-group">
                        <label>New Password</label>
                        <input class="form-control" type="password" name="new_pass" placeholder="New Password">
                        <span id="newPass"></span>
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input class="form-control" type="password" name="confirm_pass" placeholder="Confirm Password">
                        <span id="confirmPass"></span>
                    </div>
                    <div class="form-group">
                                    <input type="submit" name="btn_chng_pass" value="change Password" class="btn style-btn btn-block">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    include('inc/footer.php');
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>