<nav>
	<div class="sticky-header header-section">
		<div class="header-left" style="background-color:white!important;">
			<!--logo -->
			<div class="logo">
				<a href="home.php" style="background-color:white!important;">
					<ul>	
						<li>
							<h1 style="color: #f48b3f!important;">PropCorner</h1>
						</li>
						<div class="clearfix"> </div>
					</ul>
				</a>
			</div>
			<!--//logo-->
			<div class="clearfix"> </div>
		</div>
		<div class="header-right">

			<!--notification menu end -->
			<div class="profile_details"  style="margin-right: 35px!important;">
				
				<ul>
					<li class="dropdown profile_details_drop">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
							<div class="profile_img">
								<span class="prfil-img"><img src="<?php echo $profile_pic; ?>" alt=""
								style="width:50px; height:50px; background-size:cover;" class="img-circle">
								<span><?php echo $userName?> As <?php echo $userRole?></span><br/>
							</span>
								<div class="clearfix"></div>
							</div>
						</a>
						<ul class="dropdown-menu drp-mnu">
							<li> <a href="changepass.php"><i class="fa fa-cog"></i>Change Password</a> </li>
							<li> <a href="myprofile.php"><i class="fa fa-user"></i> Profile</a> </li>
							<li> <a href="logout.php"><i class="fa fa-sign-out"></i>Logout</a> </li>
						</ul>
					</li>
				</ul>
			</div>
			<!--toggle button start-->
			<button id="showLeftPush" style="margin-top: 5px!important;"><i class="fa fa-bars"></i></button>
			<!--toggle button end-->
			<div class="clearfix"> </div>
		</div>
		<div class="clearfix"> </div>
	</div>
</nav>