<div class="sidebar d-block" role="navigation">
	<div class="navbar-collapse">
		<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right dev-page-sidebar mCustomScrollbar _mCS_1 mCS-autoHide mCS_no_scrollbar" id="cbp-spmenu-s1">
			<div class="scrollbar scrollbar1">
				<ul class="nav" id="side-menu">
					<?php	
						if($userRole=='admin')
						{
							echo '
							<li>
							<a href="home.php" class="active"><i class="fa fa-home nav_icon"></i>Dashboard</a>
						</li>
						<li>
							<a href="view_user.php" class="not-active"><i class="fa fa-eye nav_icon"></i>View User</a>
						</li>
						<li>
							<a href="view_prop.php" class="not-active"><i class="fa fa-eye nav_icon"></i>View Properties</a>
						</li>
						<li>
							<a href="reply_queries.php" class="not-active"><i class="fa fa-eye nav_icon"></i>Reply Queries</a>
						</li>
						<li>
							<a href="#" class="not-active"><i class="fa fa-cogs nav_icon"></i>Manage Agent <span class="fa arrow"></span></a>
							<ul class="nav nav-second-level collapse">
								<li>
									<a href="add_agent.php">Add Agent</a>
								</li>
								<li>
									<a href="manage_agent.php">Manage Agent</a>
								</li>
							</ul>
							<!-- /nav-second-level -->
						</li>

						<li>
						<a href="#" class="not-active"><i class="fa fa-cogs nav_icon"></i>Manage Area <span class="fa arrow"></span></a>
						<ul class="nav nav-second-level collapse">
							<li>
								<a href="add_area.php">Add Area</a>
							</li>
							<li>
								<a href="manage_area.php">Manage Area</a>
							</li>
						</ul>
						<!-- /nav-second-level -->
					</li>
						<li>
							<a href="#" class="not-active"><i class="fa fa-cogs nav_icon"></i>Manage Ads <span class="fa arrow"></span></a>
							<ul class="nav nav-second-level collapse">
								<li>
									<a href="add_ads.php">Add Ads</a>
								</li>
								<li>
									<a href="manage_ads.php">Manage Ads</a>
								</li>
							</ul>
							<!-- /nav-second-level -->
						</li>
						<li>
							<a href="myprofile.php" class="not-active"><i class="fa fa-user nav_icon" aria-hidden="true"></i>View Profile</a>
						</li>
						<li>
							<a href="changepass.php" class="not-active"><i class="fa fa-key nav_icon" aria-hidden="true"></i>Change password</a>
						</li>
						<li>
							<a href="logout.php" class="not-active"><i class="fa fa-sign-out nav_icon" aria-hidden="true"></i>Log Out</a>
						</li>
							';
						}
						else if($userRole=="agent")
						{
						echo'
							<li>
							<a href="home.php" class="active"><i class="fa fa-home nav_icon"></i>Dashboard</a>
						</li>	
						<li>
						<a href="view_orders.php" class="not-active"><i class="fa fa-eye nav_icon"></i>View Orders</a>
						</li>
						<li>
							<a href="#" class="not-active"><i class="fa fa-cogs nav_icon"></i>Manage Properties<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level collapse">
								<li>
									<a href="add_prop.php">Add Properties</a>
								</li>
								<li>
									<a href="manage_prop.php">Manage Properties</a>
								</li>
							</ul>
							<!-- /nav-second-level -->
						</li>
						<li>
							<a href="myprofile.php" class="not-active"><i class="fa fa-user nav_icon" aria-hidden="true"></i>View Profile</a>
						</li>
						<li>
							<a href="changepass.php" class="not-active"><i class="fa fa-key nav_icon" aria-hidden="true"></i>Change password</a>
						</li>
						<li>
							<a href="logout.php" class="not-active"><i class="fa fa-sign-out nav_icon" aria-hidden="true"></i>Log Out</a>
						</li>
							';
						}
					?>
				</ul>
			</div>
			<!-- //sidebar-collapse -->
		</nav>
	</div>
</div>