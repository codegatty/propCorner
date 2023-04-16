<?php
include('inc/session.php');
include('connection.php');


if (isset($_GET['edit'])) {
    $property_id = $_GET['prop_id'];
    $update = $_GET['edit'];

    $query = mysqli_query($con, "SELECT * FROM `properties` WHERE `prop_id`='$property_id'") or die(mysqli_error($con));
    $row = mysqli_fetch_array($query);
    $prop_title = $row['prop_title'];
    $prop_description = $row['prop_desc'];
    $prop_price = $row['prop_price'];
    $upload_date = $row['prop_date'];
    $prop_type = $row['prop_type'];
    $prop_image_names = $row['prop_image'];
    $prop_address = $row['prop_address'];
    $prop_area=$row['prop_area'];
    $prop_sqrtft=$row['prop_sqrft'];
    $prop_bhk=$row['prop_bhk'];
}
?>
<!DOCTYPE HTML>
<html>

<head>
    <?php include('inc/head.php'); ?>
    <link rel="stylesheet" href="css/custommainpage.css">
    <!--scroll bar css-->
    <link rel="stylesheet" href="css/mod-scroll.css">
    <!--scroll bar css-->



</head>

<body class="cbp-spmenu-push" onload="validate()">
    <div class="main-content">
        <!--left-fixed -navigation-->
        <?php include('inc/sidebar.php'); ?>
        <!--left-fixed -navigation-->
        <!-- header-starts -->
        <?php include('inc/header.php'); ?>
        <!-- //header-ends -->
        <!-- main content start-->
        <!--footer-->
        <?php include('inc/footer.php'); ?>
        <!--//footer-->

        <!--Add Agent-->
        <div id="page-wrapper">
            <div class="main-page mod-main-page">
                <h1><?php echo isset($_GET['edit']) ? "Edit" : "Add" ?> Property</h1>
                <div class="conatiner">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="<?php echo (isset($update) ? 'val_prop.php?update&&prop_id=' . $property_id : 'val_prop.php?add') ?>" method="post" enctype="multipart/form-data">

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
                                    <textarea class="form-control" placeholder="Address of Property" name="prop_add" data-validation="required"><?php echo (isset($update) ? $prop_address : ''); ?></textarea>
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
                                    <input type="file" class="form-control" name="prop_img[]" accept="image/*" style="visibility:<?php echo(isset($update)?'hidden':'');?>" multiple required>
                                    <a class="btn btn-info btn-sm" href="agentPropGallary.php?prop_id=<?php echo $property_id?>&&gallary" style="visibility:<?php echo(isset($update)?'':'hidden');?>">visit Gallary to edit</a> 
                                </div>

                                <div class="form-group">
                                    <label>Property Square feet</label>
                                    <input type="number" class="form-control" placeholder="Price of Property" name="prop_sqrft" value="<?php echo (isset($update) ? $prop_sqrtft : ''); ?>" data-validation="required number" onkeypress="return isNumber(event)">
                                </div>

                                <div class="form-group">
                                    <label >Property Price</label>
                                    <input type="text" class="form-control" placeholder="Price of Property" name="prop_price" value="<?php echo (isset($update) ? $prop_price : ''); ?>" onkeypress="return isNumber(event)" data-validation="required number">
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

                                <input type="submit" class="btn btn-danger" style="width:100%!important;" value="<?php echo (isset($update) ? 'update' : 'Add'); ?>">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Classie -->
     <?php include("inc/bottom.php"); ?>
</body>

</html>