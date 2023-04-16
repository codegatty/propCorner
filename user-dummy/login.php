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

<body background="img/login.jpg">
    <?php
        include('inc/login-navbar.php');
    ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!--Login Form-->

    <div class="container" style="margin-top:80px;">
        <div class="row justify-content-center">

            <div class="col-md-5">
                <form class="border border-1 p-5" method="post" style="background-color:#f3f3f3;box-shadow:rgba(0,0,0,0.15) 2.95px 2.95px 3.6px!important;">
                    <h1 align="center">Log In</h1>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" name="email" data-validation="required email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="password" data-validation="required">
                    </div>
                    <div class="form-group">
                        <small class="form-text"><a href="signup.php">Create a new account?</a></small>
                    </div>
                    <center>
                        <button type="submit" class="btn style-btn" name="login">Log In</button>
                    </center>
                </form>

            </div>
        </div>
        <?php
                include('connection.php');
                if (isset($_POST['login'])) {
                    $email = mysqli_real_escape_string($con, $_POST['email']);
                    $password = mysqli_real_escape_string($con, $_POST['password']);
                    $query = mysqli_query($con, "SELECT * FROM `users` WHERE `user_email`='$email' AND `user_password`='$password'");
                    $row = mysqli_fetch_array($query);

                    if ($row) {
                        header('location:index.php');
                        session_start();
                        $_SESSION['email']=$email;
                    }
                    else{
                        //echo '<p class="text-danger text-center">Invalid email or password</p>';
                        echo '<center><div class="alert alert-danger w-25 text-center justify-content-center mt-1" role="alert">
                        Invalid email or password
                      </div></center>';
                    }
                }
                ?>
    </div>

    <!--Footer-->
    <?php
    include('inc/footer.php');
    ?>
</body>

</html>