<?php
    include('connection.php');
    if(isset($_POST['reply_btn'])){
        $query_id=$_GET['query_id'];
        $reply=$_POST['reply'];
        $query=mysqli_query($con,"UPDATE `queries` SET `admin_reply`='$reply' WHERE `query_id`='$query_id'");
        if($query){
            header('location:reply_queries.php?replyed');
        }
        }
    else{
        echo"something went wrong";
    }
?>