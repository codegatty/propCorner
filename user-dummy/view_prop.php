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
    <div class="p-1" style="margin-top:60px;background-color:#f38e3f;color:white">
        <h2 class="mx-5">PROPERTIES</h2>
    </div>
    <div class="container" style="margin-top:10px;">
        <div class="row">
            <?php
            if (isset($_POST['btn-search'])) {
                $sqft = (isset($_POST['sqft']) ? $_POST['sqft'] : '');
                $bhk = (isset($_POST['bhk']) ? $_POST['bhk'] : '');
                $location = (isset($_POST['location']) ? $_POST['location'] : '');
                $budget = (isset($_POST['budget']) ? $_POST['budget'] : '');

                $condition = "WHERE `user_type`='user' AND `approval`='approved' AND `prop_bhk`='$bhk' OR `prop_area` LIKE '%$location%' OR `prop_sqrft`='$sqft' OR `prop_price`='$budget'";
            } else {
                $condition = "WHERE `user_type`='user' AND `approval`='approved'";
            }
            $query = mysqli_query($con, "SELECT * FROM `properties` $condition");
            while ($row = mysqli_fetch_array($query)) {
                $prop_images = $row['prop_image'];
                $prop_image_array = array();
                $prop_image_array = explode(",", $prop_images);
                $user_id = $row['user_id'];
                if ($userId != $user_id) {
                    echo '
                    <div class="col-md-3">
    <a href="agent_props.php?user_id=' . $row['user_id'] . '&&user_type=user" style="text-decoration:none;color:black">
        <div class="card h-100" style="width:15rem;box-shadow:rgba(0,0,0,0.15) 2.95px 2.95px 3.6px!important;">
            <img class="card-img-top" src="img/user/property_images/' . $prop_image_array[0] . '" alt="Card image cap"
                height="180" width="240">
            <div class="card-body p-3">
                <h5 class="card-title" style="margin-bottom:0px">' . $row['prop_title'] . '</h5>

                <div class="row">
                    <div class="col-md-6">
                        <p class="card-text my-0" style="font-size:12px;text-transform: capitalize;">Address:' .
                        $row['prop_address'] . '</p>
                    </div>
                    <div class="col-md-6">
                        <p class="card-text my-0" style="font-size:12px;text-transform: capitalize;">Area:' .
                        $row['prop_area'] . '</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <p class="card-text my-0" style="font-size:12px;text-transform: capitalize;">Type:' .
                        $row['prop_type'] . '</p>
                    </div>
                    <div class="col-md-6">
                        <p class="card-text my-0" style="font-size:12px;text-transform: capitalize;">BHK:' .
                        $row['prop_bhk'] . '</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <p class="card-text my-0" style="font-size:12px;text-transform: capitalize;">Price:' .
                        $row['prop_price'] . '</p>
                    </div>
                    <div class="col-md-6">
                        <p class="card-text my-0" style="font-size:12px;text-transform: capitalize;">Sqrft:' .
                        $row['prop_sqrft'] . '</p>
                    </div>
                </div>
                <a href="#" class="btn btn-sm style-btn "><span style="font-size:12px;">Send mail</span></a>
                <a href="#" class="btn btn-sm style-btn"><span style="font-size:12px;">Contact No</span></a>
            </div>
        </div>
    </a>
</div>';
                }
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

    <?php
    include('inc/navbar.php');
    ?>
</body>

</html>