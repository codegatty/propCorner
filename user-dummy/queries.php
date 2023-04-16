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

    <title>property corner</title>
</head>

<body background="img/background.jpg">
    <?php
    include('inc/login-navbar.php');
    ?>

    <!--Heading-->
    <div class="p-1" style="margin-top:60px;background-color:#f38e3f;color:white">
        <h2 class="mx-5">ASK QUERIES</h2>
    </div>
    <?php
    if (isset($_GET['sended'])) {
        echo '<div class="alert alert-success" role="alert">
                Successfully query sended!
              </div>';
    }
    ?>
    <!--Heading-->
    <div class="container">
        <div class="row">
            <div class="col-md-6" style="background-color:#f3f3f3;box-shadow:rgba(0,0,0,0.15) 2.95px 2.95px 3.6px!important;margin-top:80px;overflow:auto">
            <h4 class="text-center">Recent Queries</h4>
                <?php
                    include('connection.php');
                    if($userId==""){
                        echo'<center><p>Login first...!</p></center>';
                    }else{
                        $query=mysqli_query($con,"SELECT * FROM `queries` WHERE `user_id`='$userId' AND `user_id`='$userId'") or die(mysqli_error($con));
                        while($row=mysqli_fetch_array($query)){
                            echo'<small><p style="background-color:white;" class="text-left rounded P-5"><b>YOU</b>: '.$row['query_question'].'</p></small>';
                            echo'<small><p style="background-color:white;" class="text-right rounded P-2">'.$row['admin_reply'].' :<b>ADMIN</b></p></small>';
                        }
                    }
                ?>
            </div>
            <div class="col-md-6">
                <form class="border p-3" style="background-color:#f3f3f3;box-shadow:rgba(0,0,0,0.15) 2.95px 2.95px 3.6px!important;margin-top:80px" action="queries_val.php?user_id=<?php echo $userId ?>" method="post">
                    <div class="form-group">
                        <label for="">Queries</label>
                        <textarea class="form-control" placeholder="Ask Quries...." rows="6" name="query" required></textarea>
                    </div>
                    <center><button type="submit" class="style-btn" class="btn btn-primary">Submit</button></center>
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