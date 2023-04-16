<?php
    include('connection.php');

    if(isset($_GET['add'])){
        $agent_name=mysqli_real_escape_string($con,$_POST['ag_name']);
        $agent_address=mysqli_real_escape_string($con,$_POST['ag_address']);
        $agent_phoneNo=mysqli_real_escape_string($con,$_POST['ag_phoneno']);
        $agent_email=mysqli_real_escape_string($con,$_POST['ag_email']);
        $agent_exp=mysqli_real_escape_string($con,$_POST['ag_exp']);
        $agent_rating=mysqli_real_escape_string($con,$_POST['ag_rating']);
        $agent_gender=mysqli_real_escape_string($con,$_POST['ag_gender']);
        $agent_password=mysqli_escape_string($con,$_POST['ag_password']);
        
        //agent profile pic
        $image_file=rand(10,100).'-'.$_FILES['ag_pic']['name'];
        $image_file_loc=$_FILES['ag_pic']['tmp_name'];
        $image_file_size=$_FILES['ag_pic']['size'];
        $image_file_type=$_FILES['ag_pic']['type'];
        $image_folder="images/profiles/";
        $image_new_size=$image_file_size/2024;
        $image_new_file_name=strtolower($image_file);
        $image_final_file_name=str_replace(' ', '-', $image_new_file_name);
        //agent profile pic

        //agent license
        $pdf_file=rand(10,100).'-'.$_FILES['ag_license']['name'];
        $pdf_file_loc=$_FILES['ag_license']['tmp_name'];
        $pdf_file_size=$_FILES['ag_license']['size'];
        $pdf_file_type=$_FILES['ag_license']['type'];
        $pdf_folder="images/agent/license/";
        $pdf_new_size=$image_file_size/2024;
        $pdf_new_file_name=strtolower($pdf_file);
        $pdf_final_file_name=str_replace(' ', '-', $pdf_new_file_name);
        //agent license

        if(move_uploaded_file($image_file_loc,$image_folder.$image_new_file_name)){
            if(move_uploaded_file($pdf_file_loc,$pdf_folder.$pdf_final_file_name)){
                mysqli_query($con,"INSERT INTO `agent`(`ag_name`, `ag_address`, `ag_phone`, `ag_email`, `ag_exp`, `ag_rating`,`ag_pic`,`ag_license`,`ag_gender`,`password`) 
                VALUES ('$agent_name','$agent_address','$agent_phoneNo','$agent_email','$agent_exp','$agent_rating','$image_final_file_name','$pdf_final_file_name','$agent_gender','$agent_password')") or die(mysqli_error($con));

                $loginId=mysqli_insert_id($con);

                mysqli_query($con,"INSERT INTO  `login`(`name`,`email`,`phone`,`user_role`,`password`,`profile_pic`,`login_id`)
                VALUES('$agent_name','$agent_email','$agent_phoneNo','agent','$agent_password','$image_final_file_name','$loginId')") or die(mysqli_error($con));

                header('location:manage_agent.php?success&&name=agent');
            }
            else{
                echo"something went wrong-1";
            }
        }
        else{
            echo"something went wrong-2";
        }
    }
    else if(isset($_GET['delete'])){

        $agent_id=$_GET['ag_id'];
        $query1 = mysqli_query($con, "SELECT * FROM `agent` WHERE `ag_id`='$agent_id'") or die(mysqli_error($con));
        $row = mysqli_fetch_array($query1);
        $agent_name=$row['ag_name'];
        
        unlink("images/profiles/".$row['ag_pic']);
       
        $query1=mysqli_query($con,"DELETE FROM `agent` WHERE `ag_id`='$agent_id'") or die(mysqli_error($con));
        $query2=mysqli_query($con,"DELETE FROM `login` WHERE `name`='$agent_name'") or die(mysqli_error($con));
        if($query1 && $query2){
            header('location:manage_agent.php?success&&name=agent');
        }
    }
    else if(isset($_GET['update'])){
        $agent_id=$_GET['ag_id'];

        $agent_name=mysqli_real_escape_string($con,$_POST['ag_name']);
        $agent_address=mysqli_real_escape_string($con,$_POST['ag_address']);
        $agent_phoneNo=mysqli_real_escape_string($con,$_POST['ag_phoneno']);
        $agent_email=mysqli_real_escape_string($con,$_POST['ag_email']);
        $agent_exp=mysqli_real_escape_string($con,$_POST['ag_exp']);
        $agent_rating=mysqli_real_escape_string($con,$_POST['ag_rating']);
        $agent_gender=mysqli_real_escape_string($con,$_POST['ag_gender']);

        if(!file_exists($_FILES['ag_license']['tmp_name']) || !is_uploaded_file($_FILES['ag_license']['tmp_name'])) {
            $ag_license = $_POST['agent_license_name'];
        }
        else
        {
            $query = mysqli_query($con, "SELECT * FROM `agent` WHERE `ag_id`='$agent_id'") or die(mysqli_error($con));
            $row = mysqli_fetch_array($query);
            unlink("images/agent/license/".$row['ag_pic']);

            //agent license
            $pdf_file=rand(10,100).'-'.$_FILES['ag_license']['name'];
            $pdf_file_loc=$_FILES['ag_license']['tmp_name'];
            $pdf_file_size=$_FILES['ag_license']['size'];
            $pdf_file_type=$_FILES['ag_license']['type'];
            $pdf_folder="images/agent/license/";
            $pdf_new_size=$image_file_size/2024;
            $pdf_new_file_name=strtolower($pdf_file);
            $pdf_final_file_name=str_replace(' ', '-', $pdf_new_file_name);
            //agent license

            if(move_uploaded_file($pdf_file_loc,$pdf_folder.$pdf_new_file_name)){
                $ag_license = $pdf_final_file_name;
            }
        }
                
        $query=mysqli_query($con,"UPDATE `agent` SET `ag_name`='$agent_name',`ag_address`='$agent_address',
        `ag_phone`='$agent_phoneNo',`ag_email`='$agent_email',`ag_exp`='$agent_exp',
        `ag_rating`='$agent_rating',`ag_gender`='$agent_gender', `ag_license`='$ag_license' WHERE `ag_id`='$agent_id'");

        if($query){
            header('location:manage_agent.php?success&&name=agent');
        }
    }

?>