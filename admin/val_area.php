<?php
    include('connection.php');

    if(isset($_GET['add'])){
        $area_name=mysqli_real_escape_string($con,$_POST['area_name']);
        
                mysqli_query($con,"INSERT INTO `area`(`area_name`)
                VALUES ('$area_name')") or die(mysqli_error($con));
                header('location:manage_area.php?success&&name=area');
    }
    else if(isset($_GET['delete'])){

        $area_id=$_GET['area_id'];
        $query = mysqli_query($con, "SELECT * FROM `area` WHERE `area_id`='$area_id'") or die(mysqli_error($con));
        $row = mysqli_fetch_array($query);
        $query=mysqli_query($con,"DELETE FROM `area` WHERE `area_id`='$area_id'");

        if($query){
            header('location:manage_area.php?success&&name=area');
        }
    }
    else if(isset($_GET['update'])){
        $area_id=$_GET['area_id'];
        $area_name=mysqli_real_escape_string($con,$_POST['area_name']);
        
        $query=mysqli_query($con,"UPDATE `area` SET `area_name`='$area_name' WHERE `area_id`='$area_id'");
        
        if($query){
        header('location:manage_area.php?success&&name=area');
        }
    }

?>