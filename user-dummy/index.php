<?php
    include('inc/session.php');
    if(!isset($_GET['search_type'])){
        $_GET['search_type']='site';
    }
    $search_type=$_GET['search_type'];

    if(!isset($_SESSION['email'])){
        $_SESSION['email']="";
    }
?>
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

    <?php
        include('inc/navbar.php');
    ?>


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Property Corner</title>
</head>

<body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!--Navigation Bar-->
    

    <!--Search Section-->
    <section class="pt-5" style="height:300px!important;background-image: url(./img/search-back6.jpg);background-blend-mode:darken!important;background-position:center;background-size: cover;background-repeat:no-repeat;">
        <div class="container mod-margin">
            <div class="container">
                <?php
                $site = 'cat-btn-active';
                $rent = '';
                $home = '';

                if ($_GET['search_type']=='site') {
                    $site = 'cat-btn-active';
                    $rent = '';
                    $home = '';
                } else if ($_GET['search_type']=='home') {
                    $site = '';
                    $rent = '';
                    $home = 'cat-btn-active';
                } else if ($_GET['search_type']=='rent') {
                    $site = '';
                    $rent = 'cat-btn-active';
                    $home = '';
                }
                ?>
                <div class="row">
                    <div class="col ml-0">
                        <a href="index.php?search_type=site"><button class="w-100 btn cat-btn <?php echo $site; ?>">BUY SITE</button></a>
                    </div>
                    <div class="col">
                        <a href="index.php?search_type=home"><button class="w-100 btn cat-btn <?php echo $home; ?>">BUY HOME</button></a>
                    </div>
                    <div class="col mr-0">
                        <a href="index.php?search_type=rent"><button class="w-100 btn cat-btn <?php echo $rent; ?>">RENT</button></a>
                    </div>
                </div>
            </div>
            
            <form name="" method="post" action="search_result.php?search_type=<?php echo $search_type?>">
            <?php
                
            ?>

            <!--Search Bar-->
            <div class="container mt-4 mod-conatiner">

                <div class="row">
                    
                        <div <?php
                                if ($_GET['search_type']=='home' || $_GET['search_type']=='rent') {
                                    echo 'class="col-md-1 order-1 p-0"';
                                } else {
                                    echo 'class="col-md-2 order-1 p-0"';
                                }
                                ?>>
                            <select name="sqrft" id="" class="w-100 dropdown-h search-item">
                                <option value="" selected">Sq Ft</option>
                                <option value="100-">>100</option>
                                <option value="100-1000">100-1000</option>
                                <option value="1000-3000">1000-3000</option>
                                <option value="3000-5000">3000-5000</option>
                                <option value="5000+"><5000</option>
                            </select>
                        </div>

                        <div <?php
                                if ($_GET['search_type']=='home' || $_GET['search_type']=='rent') {
                                    echo 'class="col-md-1 order-1 p-0 search-item-border"';
                                } else {
                                    echo 'style="display:none;"';
                                }
                                ?>>
                            <select name="bhk" id="" class="w-100 dropdown-h search-item">
                                <option value="" selected>BHK</option>
                                <option value="2">2BHK</option>
                                <option value="3">3BHK</option>
                                <option value="4">4BHK</option>
                                <option value="5">5BHK</option>
                            </select>
                        </div>
                        <div class="col-md-7 order-2 p-0 search-item-border"><input type="text" class="w-100 search-item " placeholder="Area within mangloore(eg:Kambla,Kodialbail,Bejai,Kavoor)" name="location"></div>
                        <div class="col-md-2 order-3 p-0 search-item-border"><input type="text" class="w-100 search-item" placeholder="Budget eg:100000" name="budget"></div>
                        <div class="col-md-1 order-4 p-0"><button type="submit" class="btn btn-sm w-100 btn-success search-btn" name="btn-search">SEARCH</button></div>
                  
                </div>
            </div>
             </form>
        </div>
    </section>
    <hr class="my-0" style="background-color:f48b3f;">

    
    <!--Intro section-->

    <section class="sec-2 mt-5">
        <div class="container">

            <div class="row  p-4 border" style="background-color:#f3f3f3;box-shadow:rgba(0,0,0,0.15) 2.95px 2.95px 3.6px!important;">
                <div class="col-md-4 p-0 order-1">
                    <img src="img/intro-section1.jpg" alt="photo" height="250" width="300" class="w-100">
                </div>
                <div class="col-md-8 order-2">
                    <h1 class="display-4">Explore Property Within Mangalore</h1>
                    <p class="pl-3 pr-5 pt-3 text-muted lead">
                        Search your desire property using advance search method that belongs only for Mangalore.
                        
                    </p>
                    <a class="btn btn-lg my-5 float-right style-btn" style="margin-top: 0px!important;margin-bottom: 5px!important;" href="view_prop.php">Explore</a>
                </div>
            </div>

            <div class="row p-4 mt-5 border" style="background-color:#f3f3f3;box-shadow:rgba(0,0,0,0.15) 2.95px 2.95px 3.6px!important;">
                <div class="col-md-4 p-0 order-2">
                    <img src="img/intro-section2.jpg" alt="photo" height="250" width="300" class="w-100">
                </div>
                <div class="col-md-8 order-1">
                    <h1 class="display-4">Property has it's duties as well as it's rights</h1>
                    <p class="pl-3 pr-5 pt-3 text-muted lead">
                        Be part of rising smart city with all basic needs of a common man.
                    </p>
                    <a class="btn btn-lg my-5 float-left style-btn"  style="margin-top: 0px!important;margin-bottom: 5px!important;" href="view_prop.php">Explore</a>
                </div>
            </div>

            <div class="row border p-4 mt-5" style="background-color:#f3f3f3;box-shadow:rgba(0,0,0,0.15) 2.95px 2.95px 3.6px!important;">
                <div class="col-md-4 p-0 order-1">
                    <img src="img/intro-section3.jpg" alt="photo" height="250" width="300" class="w-100">
                </div>
                <div class="col-md-8 order-2">
                    <h1 class="display-4">Know what you own, and know why you own it </h1>
                    <p class="pl-3 pr-5 pt-3 text-muted lead">
                        Gorw with urbunization of Mangalore and feel the coastal beauty.
                    </p>
                    <a class="btn btn-lg my-5 float-right style-btn" style="margin-top: 0px!important;margin-bottom: 5px!important;" href="view_prop.php">Explore</a>
                </div>
            </div>
        </div>
    </section>
    <?php
    include('inc/footer.php');
    ?>
</body>

</html>