<?php
include('inc/session.php')
?>
<!DOCTYPE HTML>
<html>

<head>
	<?php include('inc/head.php'); ?>
	<link rel="stylesheet" href="css/custommainpage.css">
</head>

<body class="cbp-spmenu-push">

	<!-- Modal -->
	<div class="modal fade" id="changePic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Change Profile</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form name="" method="post" action="change_pic.php" enctype="multipart/form-data" >
						<div class="form-group">
							<label>Choose File</label>
							 <input type="file" class="btn btn-dark" name="profile_pic" accept="image/*" required> 
						</div>
						<div class="form-group">
							 <input type="submit" class="btn btn-primary" name="btn_change_profile" value="Change Profile">
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

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

		<!--My profile-->
		<div id="page-wrapper">
			<div class="main-page mod-main-page">
				<h1>My Profile</h1>
				<div class="row">
					<div class="col-md-3">
						<a 	>
							<img src="<?php echo $profile_pic; ?>" class="img-responsive" alt="" style="width:100%; height:270px; background-size:cover;">
						</a>
					</div>
					<div class="col-md-9">
						<form action="" method="post">
							<div class="form-group">
								<label>Name</label>
								<input type="text" class="form-control" required placeholder="Name" name="name" value="<?php echo $userName; ?>">
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="text" class="form-control" required placeholder="Email" name="email" value="<?php echo $userEmail; ?>" readonly>
							</div>
							<div class="form-group">
								<label>Phone No</label>
								<input type="text" class="form-control" required placeholder="Phone No" name="phone" value="<?php echo $userPhone; ?>">
							</div>
							<div class="form-group">
								<label>User Role</label>
								<input type="text" class="form-control" required placeholder="User Role" value="<?php echo $userRole; ?> " readonly>
							</div>
							<div class="form-group">
								<input type="submit" class="btn btn-success btn-block" name="btn_upd_profile">
							</div>
						</form>
						<?php
						include('connection.php');
						if (isset($_POST['btn_upd_profile'])) {
							$name = mysqli_real_escape_string($con, $_POST['name']);
							$email = mysqli_real_escape_string($con, $_POST['email']);
							$phone = mysqli_real_escape_string($con, $_POST['phone']);

							$query = mysqli_query($con, "UPDATE `login` SET`name`='$name',`email`='$email',`phone`=$phone WHERE `id`='$userId'") or die(mysqli_error($con));
							
							if ($query) {
								header('location:myprofile.php?profile updated');
							}
						}
						?>
					</div>
				</div>
			</div>
		</div>

	</div>

	 <?php include("inc/bottom.php"); ?>
</body>

</html>