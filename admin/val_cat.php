<?php
    include('connection.php');

    if(isset($_GET['add'])){
        $category_name=mysqli_real_escape_string($con,$_POST['cat_name']);
        
                mysqli_query($con,"INSERT INTO `categories`(`cat_name`)
                VALUES ('$category_name')") or die(mysqli_error($con));
                header('location:manage_cat.php?success&&name=category');
    }
    else if(isset($_GET['delete'])){

        $category_id=$_GET['cat_id'];
        $query = mysqli_query($con, "SELECT * FROM `categories` WHERE `cat_id`='$category_id'") or die(mysqli_error($con));
        $row = mysqli_fetch_array($query);
        $query=mysqli_query($con,"DELETE FROM `categories` WHERE `cat_id`='$category_id'");

        if($query){
            header('location:manage_cat.php?success&&name=category');
        }
    }
    else if(isset($_GET['update'])){
        $category_id=$_GET['cat_id'];
        $category_name=mysqli_real_escape_string($con,$_POST['cat_name']);
        
        $query=mysqli_query($con,"UPDATE `categories` SET `cat_name`='$category_name' WHERE `cat_id`='$category_id'");
        
        if($query){
        header('location:manage_cat.php?success&&name=category');
        }
    }

?>