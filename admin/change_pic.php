<?php
include('inc/session.php');
include('connection.php');


if (isset($_POST['btn_change_profile'])) {

    if ($_FILES['profile_pic']['name'] == null) {
        header('location:myprofile.php');
    } else {
        $query = mysqli_query($con, "SELECT * FROM `login` WHERE `email`='$userEmail'") or die(mysqli_error($con));
        $row = mysqli_fetch_array($query);

        $profile = "images/profiles/" . $row['profile_pic'];

        unlink($profile); //This function is used to delete the file

        $file = rand(100, 1000) . "-" . $_FILES['profile_pic']['name']; //$_FILES  is global varibale for uploaded post method files 
        $file_loc = $_FILES['profile_pic']['tmp_name'];
        $file_size = $_FILES['profile_pic']['size'];
        $file_type = $_FILES['profile_pic']['type'];

        $folder = "images/profiles/";

        $new_size = $file_size / 2048;

        $new_file_name = strtolower($file);

        $final_file_name = str_replace(' ', '-', $new_file_name);

        if (move_uploaded_file($file_loc, $folder . $final_file_name)) {
            $query = mysqli_query($con, "UPDATE `login` SET `profile_pic`='$final_file_name' WHERE `email`='$userEmail'") or die(mysqli_error($con));

            echo '<script>
            alert("Profilw Picture Updated Successfully");
            window.location.href="myprofile.php";
            </script>';
        }
    }
}
?>