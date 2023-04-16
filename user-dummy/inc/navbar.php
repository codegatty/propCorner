    <!--Navigation Bar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top sticky p-0">
        <a class="navbar-brand" href="#"><img src="img/logo1.png" class="img-fluid " height="40" width="50"><span class="brand-name">PropertyCorner</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse mr-auto" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item "><!--active class used to show the page active-->
                    <a class="nav-link" href="index.php">HOME <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        SERVICES
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item item-hover" href="index.php?search_type=site">Buy Site</a>
                        <a class="dropdown-item item-hover" href="index.php?search_type=home">Buy Home</a>
                        <a class="dropdown-item item-hover" href="index.php?search_type=rent">Rent</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item item-hover" href="post_prop.php">Post Proprty</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="agents.php">AGENTS</a>
                </li>
            </ul>
            <!--Sign in-->
            <a href="<?php echo isset($sessionEmail)?'post_prop.php':'login.php?Login_first'?>"><button class="btn btn-warning mar-btn btn-sm border border-danger">Post Property</button></a>
            <form class=" my-lg-0 justify-content-end" style="margin-right:100px">
                <div class="row">
                    <!--<div class="col-md-5">
                        <button class="btn btn-sm edit-btn border-3 border-warning">SignIn</button>
                    </div>-->
                    <div class="col-md-7">
                        <div class="dropdown">
                            <button class="btn btn-sm btn-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <a href=""><img src="img/logo2.png" height="30" width="30" class="profile"></a>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="btn btn-sm edit-btn border-3 border-warning ml-5" href="signup.php" style="color:black!important" <?php echo $sessionEmail!=""?'hidden':''?>>SignUp</a>
                                <div class="dropdown-divider" <?php echo $sessionEmail!=""?'hidden':''?>></div>
                                <a class="dropdown-item item-hover" href="<?php echo $sessionEmail!=""?'manage_prop.php':'login.php?Login_first'?>" style="font-size: 12px!important;">Manage Properties</a>
                                <a class="dropdown-item item-hover" href="<?php echo $sessionEmail!=""?'user_profile.php?profile':'login.php?Login_first'?>" style="font-size: 12px!important;">My Profile</a>
                                <a class="dropdown-item item-hover" href="<?php echo $sessionEmail!=""?'post_prop.php':'login.php?Login_first'?>" style="font-size: 12px!important;">Post property</a>  
                                
                                <?php
                                    if($sessionEmail!=""){
                                        echo '<a class="dropdown-item item-hover" href="change_pass.php" style="font-size: 12px!important;">Change Password</a>';
                                        echo '<a class="dropdown-item item-hover" href="my_orders.php?my_orders&&user_id='.$userId.'" style="font-size: 12px!important;">My orders</a>';
                                        echo'<a class="dropdown-item item-hover" href="logout.php" style="font-size: 12px!important;">Logout</a>';
                                    }
                                    else{
                                        echo'<a class="dropdown-item item-hover" href="login.php" style="font-size: 12px!important;">Login</a>';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </nav>