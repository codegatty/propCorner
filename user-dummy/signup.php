<?php
include('inc/session.php');
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php
  include('inc/navbar.php');
  
  ?>

  <!--External CSS-->
  <link rel="stylesheet" href="css/btn.css">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/font.css">
  <link rel="stylesheet" href="css/common-btn.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>property corner</title>
</head>

<body background="img/login.jpg">
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <div class="container p-5" style="margin-top:80px;">
    <!--Grid System-->
    <form class="p-5 border" style="background-color:#f3f3f3;box-shadow:rgba(0,0,0,0.15) 2.95px 2.95px 3.6px!important;" method="post" action="signup_val.php" enctype="multipart/form-data" onsubmit="return validatePassword()">
    <center><h1>Sign Up</h1></center>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label>User Name</label>
          <input type="text" class="form-control txtOnly" placeholder="Name" name="name" data-validation="required">
        </div>
        <div class="form-group col-md-6">
          <label>Email</label>
          <input type="email" class="form-control" id="" placeholder="Email" name="email" data-validation="required email">
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <label>Phone No</label>
          <input type="number" class="form-control" id="" placeholder="Phone No" name="phoneno" onkeypress="return isNumber(event)" data-validation="required">
        </div>
        <div class="form-group col-md-6">
          <label>Profile Pic</label>
          <input type="file" class="form-control" accept="image/*" name="profile_pic" data-validation-allowing="jpg, png" data-validation-max-size="300kb" data-validation-error-msg-required="No image selected" data-validation="mime size required" >
        </div>
      </div>

      <div class="form-group">
        <label for="inputAddress">Address</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="Address" name="address" data-validation="required">
      </div>

      <div class="form-group">
        <label class="mr-5">Gender</label>
        <input type="radio" name="gender" value="male" checked class=""> Male
        <input type="radio" name="gender" value="female" class="ml-5"> Female
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <label>Password</label>
          <input type="password" class="form-control" id="password" placeholder="Password" name="password" data-validation="required"> 
        </div>
        <div class="form-group col-md-6">
        </div>
      </div>
      <center>
      <button type="submit" class="btn style-btn" name="signup">SignUp</button>
      <center>
    </form>
  </div>
  <!--Footer-->
  <?php
    include('inc/footer.php')
  ?>
</body>

</html>