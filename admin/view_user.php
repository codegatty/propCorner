<?php
include('inc/session.php')
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

<body class="cbp-spmenu-push">
	<!--modal-->
	<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					Delete
				</div>
				<div class="modal-body">
					You want to delete.
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<a class="btn btn-danger btn-ok">Delete</a>
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

				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Sno</th>
							<th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Photo</th>
                            <th>gender</th>
						</tr>
					</thead>
					<tbody>
						<?php
						include('connection.php');
						$i = 0;

						$query = mysqli_query($con, "SELECT * FROM `users` ORDER BY `user_id` DESC") or die(mysqli_error($con));

						while ($row = mysqli_fetch_array($query)) {
							$i = $i + 1;
							echo '<tr> 
											<td style="width: 5%">' . $i. '</td>
											<td>' . $row['user_name'] . '</td>
											<td>'.$row['user_email'].'</td>
                                            <td>'.$row['user_phone'].'</td>
                                            <td>'.$row['user_address'].'</td>
                                            <td><img src="../user-dummy/img/user/profile/'.$row['user_photo'].'" height="70" width="70"></td>
                                            <td>'.$row['user_gender'].'</td>
										</tr>';
						}
						?>
					</tbody>
					
				</table>

			</div>
		</div>

	</div>

	 <?php include("inc/bottom.php"); ?>
	<script type="text/javascript">
		$('#confirm-delete').on('show.bs.modal', function(e) {
			$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
		});
	</script>
</body>

</html>