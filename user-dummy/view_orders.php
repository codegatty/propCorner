<?php
  include('connection.php');
  include('inc/session.php');
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!--External CSS-->
  <link rel="stylesheet" href="css/btn.css">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/font.css">
  <link rel="stylesheet" href="css/common-btn.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>property corner</title>
</head>

<body background="img/background.jpg">
  <?php
  include('inc/navbar.php');
  ?>

<div class="p-1"style="margin-top:60px;background-color:#f38e3f;color:white">
      <h2 class="mx-5">ORDERS</h2>
</div>

  <div class="container mt-5">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Order Name</th>
          <th scope="col">Client</th>
          <th scope="col">Phone no</th>
          <th scope="col">Email</th>
          <th scope="col">Address</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $query1 = mysqli_query($con, "SELECT * FROM `orders`") or die(mysqli_error($con));
        $i=0;
        while ($row1 = mysqli_fetch_array($query1)) {
          $prop_id = $row1['prop_id'];

          $query2 = mysqli_query($con, "SELECT * FROM `properties` WHERE 
                                `user_id`='$userId' AND `prop_id`='$prop_id' AND `user_type`='user'") or die(mysqli_error($con));
          while ($row2 = mysqli_fetch_array($query2)) {
            $user_id = $row1['user_id'];
            $query3 = mysqli_query($con, "SELECT * FROM `users` WHERE `user_id`='$user_id'");
            $row3 = mysqli_fetch_array($query3);
            $i = $i + 1;
            echo '
                                    <tr>
                                        <td>' . $i . '</td>
                                        <td>' . $row2['prop_title'] . '</td>
                                        <td>' . $row3['user_name'] . '</td>
                                        <td>' . $row3['user_phone'] . '</td>
                                        <td>' . $row3['user_email'] . '</td>
                                        <td>' . $row3['user_address'] . '</td>
                                    </tr>	
                                    ';
          }
        }
        ?>
      </tbody>
    </table>
  </div>



  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <?php
  include('inc/footer.php');
  ?>
</body>

</html>