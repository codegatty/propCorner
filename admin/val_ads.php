<?php
    include('connection.php');

    if(isset($_GET['add'])){
        $adv_title=mysqli_real_escape_string($con,$_POST['ads_title']);
        $adv_description=mysqli_real_escape_string($con,$_POST['ads_desc']);
        
        //agent profile pic
        $image_file=rand(10,100).'-'.$_FILES['ads_img']['name'];
        $image_file_loc=$_FILES['ads_img']['tmp_name'];
        $image_file_size=$_FILES['ads_img']['size'];
        $image_file_type=$_FILES['ads_img']['type'];
        $image_folder="images/ads/";
        $image_new_size=$image_file_size/2024;
        $image_new_file_name=strtolower($image_file);
        $image_final_file_name=str_replace(' ', '-', $image_new_file_name);
        //agent profile pic

        if(move_uploaded_file($image_file_loc,$image_folder.$image_new_file_name)){
            
                mysqli_query($con,"INSERT INTO `ads`(`ads_title`, `ads_desc`, `ads_img`) 
                VALUES ('$adv_title','$adv_description','$image_final_file_name')") or die(mysqli_error($con));
                header('location:manage_ads.php?success&&name=ads');
            
        }
    }
    else if(isset($_GET['delete'])){

        $adv_id=$_GET['ads_id'];
        $query = mysqli_query($con, "SELECT * FROM `ads` WHERE `ads_id`='$adv_id'") or die(mysqli_error($con));
        $row = mysqli_fetch_array($query);
        unlink("images/ads".$row['ads_img']);
       
        $query=mysqli_query($con,"DELETE FROM `ads` WHERE `ads_id`='$adv_id'");

        if($query){
            header('location:manage_ads.php?success&&name=ads');
        }
    }
    else if(isset($_GET['update'])){
        $adv_id=$_GET['ads_id'];

        $adv_title=mysqli_real_escape_string($con,$_POST['ads_title']);
        $adv_description=mysqli_real_escape_string($con,$_POST['ads_desc']);
        
        $query=mysqli_query($con,"UPDATE `ads` SET `ads_title`='$adv_title',`ads_desc`='$adv_description' WHERE `ads_id`='$adv_id'");

        if($query){
        header('location:manage_ads.php?success&&name=ads');
        }
    }
?>