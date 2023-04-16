<?php
include('connection.php');
include('inc/session.php');

if($_GET['user_type']=='agent'){
    $user_id = $_GET['agent_id'];
    $image_path="../admin/images/agent/property_images/";
    $query2=mysqli_query($con,"SELECT * FROM `agent` WHERE `ag_id`='$user_id'") or die(mysqli_error($con));
    $row2=mysqli_fetch_array($query2);
    
    $user="Agent";
    $user_gender=$row2['ag_gender'];
    $user_name=$row2['ag_name'];
    $operation_location=$row2['ag_address'];
    $phone_no=$row2['ag_phone'];
    $email=$row2['ag_email'];
    $image_path2="../admin/images/profiles/";
    $user_pic=$row2['ag_pic'];
}
else if($_GET['user_type']=='user'){
    $user_id = $_GET['user_id'];
    $image_path="img/user/property_images/";
    $query2=mysqli_query($con,"SELECT * FROM `users` WHERE `user_id`='$user_id'") or die(mysqli_error($con));
    $row2=mysqli_fetch_array($query2);

    $user="Owner";
    $user_gender=$row2['user_gender'];
    $user_name=$row2['user_name'];
    $operation_location=$row2['user_address'];
    $phone_no=$row2['user_phone'];
    $email=$row2['user_email'];
    $image_path2="img/user/profile/";
    $user_pic=$row2['user_photo'];
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">bmn


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

<body background="img/background.jpg">
    <!--Heading-->
    <div class="p-1"style="margin-top:35px;background-color:#f38e3f;color:white">
      <h2 class="mx-5">PROPERTIES</h2>
    </div>
    <!--Heading-->
    <!--profile show-->
    <div class="card">
  <div class="card-body">
    <div class="row">
        <div class="col-md-2">
            <img src="<?php echo $image_path2.$user_pic?>" height="150" width="150" class="border w-100">
        </div>
        <div class="col-md-10">
            <p class="m-0">User Name: <?php echo $user_name ?></p>
            <p class="m-0">User Type: <?php echo $user ?></p>
            <p>Gender: <?php echo $user_gender?></p>
        </div>
    </div>
  </div>
</div>
    <!--profile show-->
    <?php
        if($userId!=""){
            echo'
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Detail about Agent</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <p>Operation Location:'.$operation_location.'</p>
                                <p>Phone number:'.$phone_no.'</p>
                                <p>Email:'. $email.'</p>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            ';
        }
        else{
            echo '
            <div class="alert alert-info alert-dismissible" style="margin-top:0px;margin-bottom:0px">
          <button type="button" class="close" data-dismiss="alert" id="close">&times;</button>
          Login First
          </div>
            ';
        }
    ?>
    <div class="container">
        <div class="row">
                <?php
                $query = mysqli_query($con, "SELECT * FROM `properties` WHERE `user_id`='$user_id'") or mysqli_error($con);
                while ($row = mysqli_fetch_array($query)) {
                    $prop_id=$row['prop_id'];
                    $query3=mysqli_query($con,"SELECT * FROM `orders` WHERE `user_id`='$userId' AND `prop_id`='$prop_id'") or die(mysqli_error($con));
                    $row3=mysqli_fetch_array($query3);

                    if($row['prop_type']=='rent'){
                        $extra="/month";
                    }
                    else{
                        $extra="";
                    }
                    
                    if(!empty($row3)){
                        $code2="hidden";
                        $code3="";
                        $message="Already Ordered";
                    }
                    else{
                        $code2="";
                        $code3="hidden";
                        $message="";
                    }
                    
                    $prop_images = $row['prop_image'];
                    $prop_image_array = array();
                    $prop_image_array = explode(",", $prop_images);
                    if($row['prop_type']=="site"){
                        $code1="hidden";
                    }
                    else{
                        $code1='';
                    }
                    echo '
                            <div class="col-md-12">
                            <div class="card w-100" style="margin-top:10px;box-shadow:rgba(0,0,0,0.15) 2.95px 2.95px 3.6px!important;padding-bottom:10px;background-color:#f3f3f3;" >
                            <div class="card-body">
                            <h5 class="card-title">' . $row['prop_title'] . '</h5>
                            <div class="row">
                                <div class="col-md-6">
                                <p class="card-text">Description:' . $row['prop_desc'] . '</p>
                                </div>
                                <div class="col-md-6">
                                <p class="card-text">Price:' . $row['prop_price'].$extra. '</p>
                                </div>
                            </div>
                        <div class="row">
                            <div class="col-md-6">
                            <p class="card-text">Upload date:' . $row['prop_date'] . '</p>
                            </div>
                            <div class="col-md-6">
                            <p class="card-text">Adress:' . $row['prop_address'] . '</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p class="card-text">Square feet:' . $row['prop_sqrft'] . '</p>
                            </div>
                            <div class="col-md-6">
                                <p class="card-text">Area:' . $row['prop_area'] . '</p>
                            </div>
                        </div>  
                        </div>
                        <div>
                            <div class="col-md-6">
                                <p class="card-text"'.$code1.'>BHK:' . $row['prop_bhk'] . '</p>
                            </div>
                            <div class="col-md-6">
                                <p class="card-text">Type:' . $row['prop_type'] . '</p>
                            </div>
                        </div>



                            <div style="padding-left:20px;">
            ';


                    for ($i = 0; $i < count($prop_image_array); $i++) {
                        echo '<img class="mr-1"
                src="'.$image_path. $prop_image_array[$i] . '" width="80" height="80" style="margin-bottom:20px;border:1px solid black" 
                >';
                    }

                    echo '
                <a class="btn btn-sm style-btn" href="gallary.php?prop_id='.$prop_id.'&&type='.$_GET['user_type'].'">show</a>
                </div>
                <div class="row">
                    <div class="col-md-4">
                    <center><a class="btn btn-sm style-btn w-50" data-toggle="modal" data-target="#exampleModalCenter">Show agent Details</a></center>
                    </div>
                    <div class="col-md-4">
                    <center><a class="btn btn-sm style-btn w-50" href="prop_val.php?order&&prop_id='.$prop_id.'&&user_id='.$userId.'"'.$code2.'>Order It</a></center>
                    <center><a class="btn btn-sm btn-danger w-50" '.$code3.'>'.$message.'</a></center>
                    </div>
                    <div class="col-md-4">
                    <center><a class="btn btn-sm style-btn w-50">Send Mail</a></center>
                    </div>
                </div>
                </div>
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

    <?php
    include('inc/footer.php');
    ?>
</body>

</html>