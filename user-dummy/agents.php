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

    <!--External CSS-->
    <link rel="stylesheet" href="css/btn.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="css/common-btn.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Property Corner</title>
</head>

<body background="img/background.jpg">
  <?php
    include('inc/navbar.php');
  ?>
    <!--Heading-->
    <div class="p-1"style="margin-top:10px;background-color:#f38e3f;color:white">
      <h2 class="mx-5">AGENTS</h2>
    </div>
    <!--Heading-->
    <!--advertisment-->
    <div class="w-100" style="height: 70px;">
        <img src="<?php echo $ads_path.$ads_img;?>" class="w-100 h-100">
    </div>
    <!--advertisment-->
    <div class="container ">
        <div class="row">
            <?php
            $query1 = mysqli_query($con, "SELECT * FROM `agent`");
            $query2=mysqli_query($con,"SELECT * FROM `properties`");
            $row2=mysqli_fetch_array($query2);
            $ag_id=$row2['user_id'];

            while ($row = mysqli_fetch_array($query1)) {
                $rating=$row['ag_rating'];
                $ag_id=$row['ag_id'];

                switch($rating){
                    case 1:$code='
                    <div>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                  </div>
                    ';
                    break;
                    case 2:$code='
                    <div>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                  </div>
                    ';
                    break;
                    case 3:$code='
                    <div>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                  </div>
                    ';
                    break;
                    case 4:$code='
                    <div>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                  </div>
                    ';
                    break;
                    case 5:$code='
                    <div>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                  </div>
                    ';
                    break;
                }
                echo '
                
                    <div class="col-md-3" style="">
                    <a href="agent_props.php?agent_id='.$ag_id.'&&user_type=agent" style="text-decoration:none;color:black">
                        <div class="card mt-5" style="width:15rem;background-color:#f3f3f3;box-shadow:rgba(0,0,0,0.15) 2.95px 2.95px 3.6px!important;">
                            <img class="card-img-top" src="../admin/images/profiles/' . $row['ag_pic'] . '" alt="Card image cap" height="180" width="240">
                            <div class="card-body" style="text-transform: capitalize;"><h5>'. $row['ag_name'] . '</h5>
                                <p class="card-text my-0" style="font-size:12px;text-transform: capitalize;">Operation Location:' . $row['ag_address'] . '</p>
                                <p class="card-text my-0" style="font-size:12px;text-transform: capitalize;">Experience:' . $row['ag_exp'] .' y</p>
                                '.$code.'
                                <a href="agent_props.php?agent_id='.$ag_id.'&&user_type=agent" class="btn btn-sm style-btn "><span style="font-size:12px;">View Details</span></a>
                                
                                
                            </div>
                        </div>
                        </a>
                    </div>
                    ';
            }
            ?>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!--footer-->
    <?php
    include('inc/footer.php');
    ?>
</body>

</html>