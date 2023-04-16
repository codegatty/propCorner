<?php
include('connection.php');
include('inc/session.php');

    //ads
    $query3=mysqli_query($con,"SELECT * FROM `ads`");
    $max_row=mysqli_num_rows($query3);
    $ads_num=rand(1,$max_row);
    $ads_path="../admin/images/ads/";
    $query3=mysqli_query($con,"SELECT * FROM `ads` WHERE `ads_id`='$ads_num'") or die(mysqli_error($con));
    $row3=mysqli_fetch_array($query3);
    $ads_img=$row3['ads_img'];
    //ads
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
    <!--advertisment-->
        <div class="w-100" style="height: 70px;">
        <img src="<?php echo $ads_path.$ads_img;?>" class="w-100 h-100">
    </div>
    <!--advertisment-->
    <div class="container" style="margin-top:10px;">
        <div class="row">
            <?php
            $search_type = $_GET['search_type'];
            $sqrft = $_POST['sqrft'];
            $location = $_POST['location'];
            $budget = $_POST['budget'];

            //Square feet
            if ($sqrft == "") {
                $sqrft_min = 0;
                $sqrft_max = 99999;
            } else {
                switch ($sqrft) {
                    case '100-':
                        $sqrft_min = 0;
                        $sqrft_max = 100;
                        break;
                    case '100-1000':
                        $sqrft_min = 100;
                        $sqrft_max = 1000;
                        break;

                    case '1000-3000':
                        $sqrft_min = 1000;
                        $sqrft_max = 3000;
                        break;
                    case '3000-5000':
                        $sqrft_min = 3000;
                        $sqrft_max = 5000;
                        break;
                    case '5000+':
                        $sqrft_min = 5000;
                        $sqrft_max = 99999;
                        break;
                }
            }

            //bhk
            if ($_POST['bhk'] == "") {
                $bhk_query="";
            } else {
                $bhk = $_POST['bhk'];
                $bhk_query = '(`prop_bhk`=' . "'" . $bhk . "') AND";
            }

            //location
            if ($location == "") {
                $loc_query = "";
            } else {
                $loc_query = '(`prop_area`=' . "'" . $location . "') AND";
            }
            //budget
            if ($budget == "") {
                $bud_query = "";
            } else {
                $bud_query = '(`prop_price`=' . "'" . $budget . "') AND";
            }

            //query
            if ($search_type == 'site') {
                $query = mysqli_query($con, "SELECT * FROM `properties` WHERE (`prop_sqrft` > '$sqrft_min' AND `prop_sqrft` < '$sqrft_max') AND 
                $loc_query $bud_query `prop_type`='site'") or die(mysqli_error($con));
            } else if ($search_type == 'home' or $search_type == "rent") {
                $query = mysqli_query($con, "SELECT * FROM `properties` WHERE (`prop_sqrft` > '$sqrft_min' AND `prop_sqrft` < '$sqrft_max') AND
                $bhk_query $loc_query $bud_query `prop_type`='$search_type'") or die(mysqli_error($con));
            }
            while ($row = mysqli_fetch_array($query)) {

                if($row['user_type']=="agent"){
                    $image_path="../admin/images/agent/property_images/";
                    $id_type="agent_id";
                }else if($row['user_type']=="user"){
                    $image_path="img/user/property_images/";
                    $id_type="user_id";
                }

                $prop_images = $row['prop_image'];
                $prop_image_array = array();
                $prop_image_array = explode(",", $prop_images);
                $user_id = $row['user_id'];
                $user_type=$row['user_type'];
                if ($userId != $user_id) {
                    echo '
                    <div class="col-md-3">
                    <a href="agent_props.php?'.$id_type.'=' . $row['user_id'] . '&&user_type='.$user_type.'" style="text-decoration:none;color:black">
                        <div class="card h-100" style="width: 15rem;box-shadow:rgba(0,0,0,0.15) 2.95px 2.95px 3.6px!important;">
                            <img class="card-img-top" src="'.$image_path.$prop_image_array[0].'" alt="Card image cap" height="180" width="240">
                                <div class="card-body p-3">    
                                    <h5 class="card-title" style="margin-bottom:0px">' . $row['prop_title'] . '</h5>

                                    <div class="row">
                                        <div class="col-md-6">
                                        <p class="card-text my-0" style="font-size:12px;text-transform: capitalize;">Address:' . $row['prop_address'] . '</p>
                                        </div>
                                        <div class="col-md-6">
                                        <p class="card-text my-0" style="font-size:12px;text-transform: capitalize;">Area:' . $row['prop_area'] . '</p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                        <p class="card-text my-0" style="font-size:12px;text-transform: capitalize;">Type:' . $row['prop_type'] . '</p>
                                        </div>
                                        <div class="col-md-6">
                                        <p class="card-text my-0" style="font-size:12px;text-transform: capitalize;">BHK:' . $row['prop_bhk'] . '</p>
                                        </div>
                                     </div>

                                    <div class="row">
                                     <div class="col-md-6">
                                     <p class="card-text my-0" style="font-size:12px;text-transform: capitalize;">Price:' . $row['prop_price'] . '</p>
                                     </div>
                                     <div class="col-md-6">
                                     <p class="card-text my-0" style="font-size:12px;text-transform: capitalize;">Sqrft:' . $row['prop_sqrft'] . '</p>
                                     </div>
                                  </div>
                                </div>
                        </div></a></div>';
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