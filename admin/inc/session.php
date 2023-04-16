<?php
    ob_start();
    ob_clean();
    session_start();
    error_reporting(0);
    
    $sessEmail=$_SESSION['sessEmail'];

    if(isset($sessEmail))
    {
        include('connection.php');
        $query=mysqli_query($con,"SELECT * FROM `login` WHERE `email`='$sessEmail'");
        $row=mysqli_fetch_array($query);

        $userId=$row['id'];
        $userName=$row['name'];
        $userEmail=$row['email'];
        $userPhone=$row['phone'];
        $userRole=$row['user_role'];
        $userPic=$row['profile_pic'];
         $loginId=$row['login_id'];
        //profile picture change
        if($userPic!=null)
        {
            $profile_pic="images/profiles/".$userPic;
        }
        else
        {
            $profile_pic="images/myprofile.jpg";
        }
       
    }
    else
    {
        header('location:index.php?Login_First'); 
    }
?>
