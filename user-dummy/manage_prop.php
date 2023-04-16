<?php
    include('connection.php');
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
    <link rel="stylesheet" href="css/btn.css">
    <link rel="stylesheet" href="css/common-btn.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>property corner</title>
</head>

<body background="img/background.jpg">
    <?php
        include('inc/navbar.php');
    ?>

    <div class="container" style="margin-top:80px;">
        <div class="row">
            

                <?php
                $query = mysqli_query($con, "SELECT * FROM `properties` WHERE `user_id`='$userId' AND `user_type`='user'") or mysqli_error($con);

                while ($row = mysqli_fetch_array($query)) {
                    $prop_images = $row['prop_image'];
                    $prop_image_array = array();
                    $prop_image_array = explode(",", $prop_images);

                    echo '
                    <div class="col-md-12">
                            <div class="card" style="margin-top:10px;text-transform: capitalize;background-color:#f3f3f3;box-shadow:rgba(0,0,0,0.15) 2.95px 2.95px 3.6px!important;" >
                            <div class="card-body">
                            <h5 class="card-title">' . $row['prop_title'] . '</h5>

                            <div class="row">
                                <div class="col-sm-4">
                                    <p class="card-text" style="font-size:18px;"><span style="font-size:13px;">Description:</span>'.$row['prop_desc'].'</p>
                                </div>
                                <div class="col-sm-4">
                                    <p class="card-text" style="margin-bottom:0px;font-size:18px;"><span style="font-size:13px;">Price:</span>'.$row['prop_price'].'rup</p>
                                </div>
                            </div>

                            <div class="row">
                            <div class="col-md-4">
                                <p class="card-text" style="margin-bottom:0px;font-size:18px;"><span style="font-size:13px;">Type:</span>'.$row['prop_type'].'</p>
                            </div>
                            <div class="col-md-4">
                                <p class="card-text" style="margin-bottom:0px;font-size:18px;"><span style="font-size:13px;">Address:</span>'.$row['prop_address'].'</p>
                            </div>
                            </div>

                            <div class="row">
                            <div class="col-md-4">
                                <p class="card-text" style="margin-bottom:0px;font-size:18px;"><span style="font-size:13px;">Area:</span>'.$row['prop_area'].'</p>
                            </div>
                            <div class="col-md-4">
                                <p class="card-text" style="margin-bottom:0px;font-size:18px;"><span style="font-size:13px;">Square Feet:</span>'.$row['prop_sqrft'].'sqrft</p>
                            </div>
                            </div>

                            <div>
                                <p class="card-text" style="font-size:18px;"><span style="font-size:13px;">BHK:</span>'.$row['prop_bhk'].'</p>
                            </div>

                            <div>
            ';


                    for ($i = 0; $i < count($prop_image_array); $i++) {
                        echo '<img class="mr-1"
                src="img/user/property_images/' . $prop_image_array[$i] . '" width="60" height="60" style="margin-bottom:20px;border:1px solid black" 
                >';
                    }

                    echo '
                </div>
                <a href="post_prop.php?edit&&prop_id='.$row['prop_id'].'" class="btn style-btn btn-sm">Edit</a>
                <a href="prop_val.php?delete&&prop_id='.$row['prop_id'].'" class="btn style-btn btn-sm">Delete</a>
                </div>
                </div>
                </div>';
                }

                ?>
            
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