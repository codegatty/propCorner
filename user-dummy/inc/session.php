<?php
ob_start();
ob_end_clean();
session_start();

$sessionEmail=$_SESSION['email'];

if($sessionEmail!=""){
    include('connection.php');

    $query=mysqli_query($con,"SELECT * FROM `users` WHERE `user_email`='$sessionEmail'");
    $row=mysqli_fetch_array($query);

    
    $userId=$row['user_id'];
    $userName=$row['user_name'];
    $userEmail=$row['user_email'];
    $userPhone=$row['user_phone'];
    $userAddress=$row['user_address'];
    $userProfilePic=$row['user_photo'];

}
else{
    $userId="";
    $userName="";
    $userEmail="";
    $userPhone="";
    $userAddress="";
    $userProfilePic="";
}
?>