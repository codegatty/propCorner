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
							<th>Title</th>
							<th>Description</th>
							<th>Gallary</th>
							<th>Price</th>
							<th>Uplaod Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						include('connection.php');
						$i = 0;

						$query = mysqli_query($con, "SELECT * FROM `properties` ORDER BY `prop_id` DESC") or die(mysqli_error($con));

						while ($row = mysqli_fetch_array($query)) {
							$property_id=$row['prop_id'];
							$i = $i + 1;
							$code="";
							$approved="";
							if($row['approval']=='approved'){
								$code="hidden";
								$approved="Approved";
							}
							else{
								$code="";
							}
							echo '<tr> 
											<td style="width: 5%">' . $i. '</td>
											<td>' . $row['prop_title'] . '</td>
											<td>' . $row['prop_desc'] . '</td>
											<td><a href="agentPropGallary.php?prop_id='.$property_id.'" class="btn btn-danger">Visit</a></td>
											<td>' . $row['prop_price'] . '</td>
											<td>' . $row['prop_date'] . '</td>
											<td style="width:13%">'.$approved.'<div '.$code.'><a class="btn btn-success btn-sm" href="val_prop.php?prop_id='.$row['prop_id'] .'&&approved">Accept</a>
											<a class="btn btn-danger btn-sm" href="val_prop.php?prop_id='.$row['prop_id'] .'&&decline">Decline</a>
											</div></td>
										</tr>';
						}
						?>
					</tbody>
				</table>

			</div>
		</div>

	</div>

	<!-- Classie -->
	 <?php include("inc/bottom.php"); ?>
	<script type="text/javascript">
		$('#confirm-delete').on('show.bs.modal', function(e) {
			$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
		});
	</script>
</body>

</html>