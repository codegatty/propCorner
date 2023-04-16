<?php
    include('inc/session.php');
    include('connection.php');
    $prop_type="";
    $prop_id="";
    
    if(isset($_GET['edit'])){
        include('connection.php');
        $prop_id=$_GET['prop_id'];
        $update=$_GET['edit'];

        $query=mysqli_query($con,"SELECT * FROM `properties` WHERE `prop_id`='$prop_id'");
        $row=mysqli_fetch_array($query);
        $prop_title = $row['prop_title'];
        $prop_description = $row['prop_desc'];
        $prop_price=$row['prop_price'];
        $prop_area=$row['prop_area'];
        $prop_bhk=$row['prop_bhk'];
        $prop_sqrft=$row['prop_sqrft'];
        $upload_date=$row['prop_date'];
        $prop_type=$row['prop_type'];
        $prop_image_names=$row['prop_image'];
        $prop_address=$row['prop_address'];
    }
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
  <body background="img/login.jpg">
    <?php
    include('inc/navbar.php')
    ?>
      <div class="container" style="margin-top:80px;">
          <div class="row justify-content-center">
              <div class="col-md-6">
              <form class="border p-5" style="background-color:#f3f3f3;box-shadow:rgba(0,0,0,0.15) 2.95px 2.95px 3.6px!important;" action="<?php echo (isset($update) ? 'prop_val.php?update&&prop_id=' . $prop_id : 'prop_val.php?add') ?>" method="post" enctype="multipart/form-data"> 
              <center><h1>Post Property</h1></center>
                  <div class="form-group">
                      <label>Property Title</label>
                      <input type="text" class="form-control" placeholder="Title of property" name="prop_title" value="<?php echo (isset($update) ? $prop_title : ''); ?>" data-validation="required">
                  </div>

                  <div class="form-group">
                      <label>Property Description</label>
                      <input type="text" class="form-control" placeholder="Description About Property" name="prop_desc" value="<?php echo (isset($update) ? $prop_description : ''); ?>" data-validation="required">
                  </div>

                  <div class="form-group">
                      <label>Property Address</label>
                      <input type="text" class="form-control" placeholder="Address of Property" name="prop_add" value="<?php echo (isset($update) ? $prop_address : ''); ?>" data-validation="required">
                  </div>

                  <div class="form-group">
                      <label>Area</label>
                      <select class="form-control" name="prop_area" data-validation="required">
                          <option>Select Area</option>
                          <?php
                          $query=mysqli_query($con,"SELECT * FROM `area`");

                          while($row2=mysqli_fetch_array($query)){
                              if($prop_area==$row2['area_name']){
                            $select="selected";
                              }
                              else{
                                 $select="";
                              }
                              echo'<option '.$select.'>'.$row2['area_name'].'</option>';
                          }
                          ?>
                      </select>

                  </div>

                  <div class="form-group">
                      <label>Property Image</label>
                      <input type="file" class="form-control" name="prop_img[]" accept="image/*" multiple style="<?php echo isset($update)?'display:none':''?>" required>
                      <br><a href="gallary.php?prop_id=<?php echo $prop_id?>" class="btn style-btn" style="<?php echo isset($update)?'':'display:none'?>">Visit gallary to edit</a>
                  </div>

                  <div class="form-group">
                      <label>Property Square feet</label>
                      <input type="number" class="form-control" placeholder="Squarefeet of Property" name="prop_sqrft" value="<?php echo (isset($update) ? $prop_sqrft : ''); ?>" data-validation="required number" onkeypress="return isNumber(event)">
                  </div>

                  <div class="form-group">
                      <label >Property Price</label>
                      <input type="text" class="form-control" placeholder="Price of Property" name="prop_price" value="<?php echo (isset($update) ? $prop_price : ''); ?>" data-validation="required number" onkeypress="return isNumber(event)">
                  </div>

                  <div class="form-group">
                      <label>Property type</label>
                      <!--<input type="text" class="form-control" placeholder="Price of Property" name="prop_type" value="<?php //echo (isset($update) ? $prop_type : ''); 
                                                                                                        ?>">-->
                      <select class="form-control" name="prop_type" id="type" onchange="validate()" value="<?php echo (isset($update) ? $prop_type : ''); ?>" data-validation="required">
                          <option>Select Type</option>
                          <option value="site" <?php if($prop_type=='site')echo 'selected';?> >Site</option>
                          <option value="home" <?php if($prop_type=='home')echo 'selected';?> >Home</option>
                          <option value="rent" <?php if($prop_type=='rent')echo 'selected';?> >Rent</option>
                      </select>
                      <script>
                          function validate() {
                              let propType = document.getElementById("type");
                              let bhkdiv=document.getElementById('bhk');
                              if(propType.selectedIndex==0){
                                  bhkdiv.innerHTML="";
                              }else if (propType.selectedIndex == 1) {
                                  bhkdiv.innerHTML="";
                              } else {
                                  bhkdiv.innerHTML=`<label>BHK</label>
                                  <input type="number" class="form-control" name="prop_bhk" value="<?php echo (isset($update) ? $prop_bhk: ''); ?>">`;
                              }
                          }
                      </script>
                  </div>

                  <div class="form-group" id="bhk">
                  </div>

                  <div class="form-group">
                      <label>Upload Date</label>
                      <input type="text" class="form-control" name="upload_date" value="<?php echo date('Y-m-d H:i:s'); ?>" readonly>
                  </div>

                  <input type="submit" class="btn style-btn" style="width:100%!important;" value="<?php echo (isset($update) ? 'update' : 'Add'); ?>">
            </form>
              </div>
        </div>
    </div>

    <?php
    include('inc/footer.php')
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>