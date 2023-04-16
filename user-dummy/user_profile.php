<?php
include('connection.php');
include('inc/session.php');

if (isset($_POST['update_btn'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phoneno']);
    $address = mysqli_real_escape_string($con, $_POST['address']);


    $query = mysqli_query($con, "UPDATE `users` SET`user_name`='$name',`user_email`='$email',`user_phone`=$phone WHERE `user_id`='$userId'") or die(mysqli_error($con));

    if ($query) {
        header('location:user_profile.php?profile updated');
    }
}
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

    <title>property corner</title>
</head>

<body background="img/background.jpg">
    <?php
    include('inc/navbar.php');
    ?>
    
    <div class="p-1"style="margin-top:60px;background-color:#f38e3f;color:white">
      <h2 class="mx-5">PROFILE</h2>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



    <!-- Modal -->
    <div class="modal fade" id="changePic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form name="" method="post" action="change_pic.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Choose File</label>
                            <input type="file" class="btn btn-dark" name="profile_pic" accept="image/*" data-validation-allowing="jpg, png" data-validation-max-size="300kb" data-validation-error-msg-required="No image selected" data-validation="mime size required">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="btn_change_profile" value="Change Profile">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!--profile-->
    <div class="container " style="margin-top:10px;">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <!--profile-->
                <form class="border p-5" style="background-color:#f3f3f3;padding-top:10px!important;box-shadow:rgba(0,0,0,0.15) 2.95px 2.95px 3.6px!important;" method="post" action="" enctype="multipart/form-data">
                    <center>
                        <a data-toggle="modal" data-target="#changePic" href="">
                            <img  src="img/user/profile/<?php echo $userProfilePic?>" class="rounded-circle border image-responsive" style="width:40%; height:270px; background-size:cover;" alt="Could not Load">
                        </a>
                    </center>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>User Name</label>
                            <input type="text" class="form-control" placeholder="Name" name="name" value="<?php echo $userName ?>" data-validation="required">

                        </div>
                        <div class="form-group col-md-6">
                            <label>Email</label>
                            <input type="email" class="form-control" id="" placeholder="Email" name="email" value="<?php echo $userEmail ?>" data-validation="email required">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Phone No</label>
                            <input type="number" class="form-control" id="" placeholder="Phone No" name="phoneno" value="<?php echo $userPhone ?>" onkeypress="return isNumber(event)" data-validation="required">
                        </div>
                        <div class="form-group col-md-4">
                            <!--<label>Profile Pic</label>
                            <input type="file" class="form-control" accept="image/*" name="profile_pic">-->
                            
                        </div>
                        <div class="col-md-4 form-group">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputAddress">Address</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="Address" name="address" value="<?php echo $userAddress ?>">
                    </div> 
                        <div class="form-row">
                            <div class="col-md-4 form-group">
                                <center><a class="btn style-btn btn-sm" href="change_pass.php" style="margin-top:35px;">Change Password</a></center>
                            </div>
                            <div class="col-md-4 form-group">
                                <center><button type="submit" class="btn btn-sm style-btn mt-4" name="update_btn">Update</button></center>                                
                            </div>
                            <div class="col-md-4 form-group">
                                <center><a class="btn style-btn btn-sm" href="view_orders.php" style="margin-top:35px;" <?php echo isset($_GET['profile'])?'':'hidden';?>>Orders</a></center>                               
                            </div>
                        </div>
                </form>
            </div>

        </div>
    </div>

    <?php
    include('inc/footer.php');
    ?>
</body>

</html>