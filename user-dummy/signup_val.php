<?php
    include('connection.php');
    if(isset($_POST['signup'])){
        
        $name=mysqli_real_escape_string($con,$_POST['name']);
        $address=mysqli_real_escape_string($con,$_POST['address']);
        $phoneNo=mysqli_real_escape_string($con,$_POST['phoneno']);
        $email=mysqli_real_escape_string($con,$_POST['email']);
        $gender=mysqli_real_escape_string($con,$_POST['gender']);
        $password=mysqli_escape_string($con,$_POST['password']);
        //agent profile pic
        $image_file=rand(10,100).'-'.$_FILES['profile_pic']['name'];
        $image_file_loc=$_FILES['profile_pic']['tmp_name'];
        $image_file_size=$_FILES['profile_pic']['size'];
        $image_file_type=$_FILES['profile_pic']['type'];
        $image_folder="img/user/profile/";
        $image_new_size=$image_file_size/2024;
        $image_new_file_name=strtolower($image_file);
        $image_final_file_name=str_replace(' ', '-', $image_new_file_name);

        if(move_uploaded_file($image_file_loc,$image_folder.$image_new_file_name)){
            mysqli_query($con,"INSERT INTO `users`(`user_name`, `user_email`, `user_phone`, `user_address`, `user_photo`, `user_gender`, `user_password`) 
            VALUES('$name','$email','$phoneNo','$address','$image_final_file_name','$gender','$password')") or mysqli_error($con);

            mysqli_query($con,"INSERT INTO `categories`( `cat_name`) VALUES ('$name')");
            header('location:login.php');
        }
    }
?>