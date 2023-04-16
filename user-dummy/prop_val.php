<?php
    include('connection.php');
    include('inc/session.php');

    if(isset($_GET['add'])){
        $prop_title=mysqli_real_escape_string($con,$_POST['prop_title']);
        $prop_desc=mysqli_real_escape_string($con,$_POST['prop_desc']);
        $prop_price=mysqli_real_escape_string($con,$_POST['prop_price']);
        $prop_type=mysqli_real_escape_string($con,$_POST['prop_type']);
        $prop_address=mysqli_real_escape_string($con,$_POST['prop_add']);
        $prop_area=mysqli_real_escape_string($con,$_POST['prop_area']);
        $prop_sqrft=mysqli_real_escape_string($con,$_POST['prop_sqrft']);
        $prop_bhk=mysqli_real_escape_string($con,$_POST['prop_bhk']);
        $upload_date=mysqli_real_escape_string($con,$_POST['upload_date']);

        //Uploading images of properties
        $count_images=count($_FILES['prop_img']['name']);
        $image_name_array=array();

        for($i=0;$i<$count_images;$i++)
        {
            $image_file=rand(10,100)."-".$_FILES['prop_img']['name'][$i];
            $image_file_loc=$_FILES['prop_img']['tmp_name'][$i];
            
            $image_file_size=$_FILES['prop_img']['size'][$i];
            $image_file_type=$_FILES['prop_img']['type'][$i];
            $image_folder="img/user/property_images/";
            $image_new_size=$image_file_size/2024;
            $image_new_file_name=strtolower($image_file);
            $image_final_file_name=str_replace(' ', '-',$image_new_file_name);
            array_push($image_name_array,$image_final_file_name);
            if(move_uploaded_file($image_file_loc,$image_folder.$image_final_file_name)){
            }
            else{
                die("error in uploading images");
            }   
        }
        $image_name_imploded=implode(",",$image_name_array);
        
        mysqli_query($con,"INSERT INTO `properties`(`prop_title`,`prop_desc`,`prop_image`,`prop_address`,`prop_price`,`prop_type`,`prop_date`,`user_id`,`user_type`,`approval`,`prop_area`,`prop_bhk`,`prop_sqrft`)
        VALUES('$prop_title','$prop_desc','$image_name_imploded','$prop_address','$prop_price','$prop_type','$upload_date','$userId','user','requested','$prop_area','$prop_bhk','$prop_sqrft')") or die(mysqli_error($con));

        header('location:index.php?success&&name=properties');
    } 
    else if(isset($_GET['update'])){

        $property_id=$_GET['prop_id'];

        $prop_title=mysqli_real_escape_string($con,$_POST['prop_title']);
        $prop_description=mysqli_real_escape_string($con,$_POST['prop_desc']);
        $prop_price=mysqli_real_escape_string($con,$_POST['prop_price']);
        $prop_type=mysqli_real_escape_string($con,$_POST['prop_type']);
        $upload_date=mysqli_real_escape_string($con,$_POST['upload_date']);
        $prop_address=mysqli_real_escape_string($con,$_POST['prop_add']);


        if(!empty($_FILES['packFiles']['name'])){
            $query = mysqli_query($con, "SELECT * FROM `properties` WHERE `prop_id`='$property_id'") or die(mysqli_error($con));
            $row = mysqli_fetch_array($query);

            //unlinking images
            $prop_images = $row['prop_image'];
            $prop_image_array=array();
            $prop_image_array=explode(",",$prop_images);

            for($i=0;$i<count($prop_image_array);$i++){
                unlink("images/agent/property_images/".$prop_image_array[$i]);
            }

            $count_images=count($_FILES['prop_img']['name']);
            $image_name_array=array();




            for($i=0;$i<$count_images;$i++)
            {
                $image_file=rand(10,100)."-".$_FILES['prop_img']['name'][$i];
                $image_file_loc=$_FILES['prop_img']['tmp_name'][$i];
                
                $image_file_size=$_FILES['prop_img']['size'][$i];
                $image_file_type=$_FILES['prop_img']['type'][$i];
                $image_folder="img\user\property_images";
                $image_new_size=$image_file_size/2024;
                $image_new_file_name=strtolower($image_file);
                $image_final_file_name=str_replace(' ', '-',$image_new_file_name);
                array_push($image_name_array,$image_final_file_name);
                if(move_uploaded_file($image_file_loc,$image_folder.$image_final_file_name)){
                }
                else{
                    die("error in uploading images");
                }   
            }
            $image_name_imploded=implode(",",$image_name_array);
            mysqli_query($con,"UPDATE `properties` SET `prop_title`='$prop_title',`prop_desc`='$prop_description',`prop_image`='$image_name_imploded',
            `prop_price`='$prop_price',`prop_type`='$prop_type',`prop_address`='$prop_address',`prop_date`='$prop_date' WHERE `prop_id`='$prop_id'") or die(mysqli_error($con));
        }
        else
        {
             $image_names=$_POST['prop_image_names'];
             mysqli_query($con,"UPDATE `properties` SET `prop_title`='$prop_title',`prop_desc`='$prop_description',`prop_image`='$image_names',
            `prop_price`='$prop_price',`prop_type`='$prop_type',`prop_address`='$prop_address',`prop_date`='$upload_date' WHERE `prop_id`='$property_id'") or die(mysqli_error($con));
        }
        header('location:manage_prop.php?sucess');

    }
    else if(isset($_GET['delete'])){

        $property_id=$_GET['prop_id'];
        $query = mysqli_query($con, "SELECT * FROM `properties` WHERE `prop_id`='$property_id'") or die(mysqli_error($con));
        $row = mysqli_fetch_array($query);

        //unlinking images
        $prop_images = $row['prop_image'];
        $prop_image_array=array();
        $prop_image_array=explode(",",$prop_images);

        for($i=0;$i<count($prop_image_array);$i++){
            unlink("images/agent/property_images/".$prop_image_array[$i]);
        }

       
        $query=mysqli_query($con,"DELETE FROM `properties` WHERE `prop_id`='$property_id'")or die(mysqli_error($con));

        if($query){
            header('location:manage_prop.php?success&&name=property');
        }
    }
    else if(isset($_GET['photodel'])){
        $property_id = $_GET['prop_id'];
        $index=$_GET['img_index'];

        $query = mysqli_query($con, "SELECT * FROM `properties` WHERE `prop_id`='$property_id'") or die(mysqli_error($con));
        $row = mysqli_fetch_array($query);
        $prop_images = $row['prop_image'];
        $prop_image_array=array();

        $prop_image_array=explode(",",$prop_images);

        unset($prop_image_array[$index]);

        $prop_images=implode(",",$prop_image_array);

        $query=mysqli_query($con,"UPDATE `properties` SET `prop_image`='$prop_images' WHERE `prop_id`='$property_id'") or mysqli_error($con);
        if($query){
            header('location:Gallary.php?prop_id='.$property_id);
        }
    }
    else if(isset($_POST['btn_add_img'])){
        $property_id=$_GET['prop_id']; 
        //Uploading images of properties
        $count_images=count($_FILES['prop_img']['name']);
        $image_name_array=array();
        
        for($i=0;$i<$count_images;$i++)
        {
            $image_file=rand(10,100)."-".$_FILES['prop_img']['name'][$i];
            $image_file_loc=$_FILES['prop_img']['tmp_name'][$i];
                    
            $image_file_size=$_FILES['prop_img']['size'][$i];
            $image_file_type=$_FILES['prop_img']['type'][$i];
            $image_folder="img/user/property_images/";
            $image_new_size=$image_file_size/2024;
            $image_new_file_name=strtolower($image_file);
            $image_final_file_name=str_replace(' ', '-',$image_new_file_name);
            array_push($image_name_array,$image_final_file_name);
            if(move_uploaded_file($image_file_loc,$image_folder.$image_final_file_name)){
                }
            else{
                die("error in uploading images");
                }   
        } 
        $image_name_imploded=implode(",",$image_name_array);

        $query=mysqli_query($con,"SELECT * FROM `properties` WHERE `prop_id`='$property_id'") or die(mysqli_error($con));
        $row=mysqli_fetch_array($query);
        $old_image_names=$row['prop_image'];

        $image_name_imploded=$image_name_imploded.','.$old_image_names;
        
        $query=mysqli_query($con,"UPDATE `properties` SET `prop_image`='$image_name_imploded' WHERE `prop_id`='$property_id'") or die(mysqli_error($con));
        if($query){
            header('location:Gallary.php?prop_id='.$property_id);
        }
        else{
            echo"failed";
        }
    }else if(isset($_GET['order'])){
        if($userId==""){
                header('location:login.php');
            echo"pass";
        }
        else{
        $prop_id=$_GET['prop_id'];
        $user_id=$_GET['user_id'];
        $date=date('Y-m-d H:i:s');
        $query=mysqli_query($con,"INSERT INTO `orders`(`prop_id`, `user_id`, `order_date`) VALUES ('$prop_id','$user_id','$date')");
        if($query){
           header("location:my_orders.php?ordered&&user_id=".$user_id);
        }
        }
    }
?>