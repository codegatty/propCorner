<?php
    include('connection.php');
    $user_id=$_GET['user_id'];
    if($user_id==""){
        header('location:login.php');
    }
    else{
        $question=$_POST['query'];
        $date=date('Y-m-d H:i:s');
        $query=mysqli_query($con,"INSERT INTO `queries`(`query_question`, `query_date`, `user_id`) VALUES ('$question','$date','$user_id')");
        if($query){
            header('location:queries.php?sended');
        }
    }
?>