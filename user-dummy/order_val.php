<?php
    include('connection.php');
    include('inc/session.php');
    echo $userId;
    if(isset($_GET['cancel_order'])){
        $order_id=$_GET['order_id'];

        $query=mysqli_query($con,"DELETE FROM `orders` WHERE `order_id`='$order_id'") or die($con);
        if($query){
            header('location:my_orders.php?my_order&&user_id='.$userId);
        }
    }
?>