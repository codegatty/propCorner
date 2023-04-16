<?php
include('inc/session.php');
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
							<th>Order Title</th>
                            <th>Client</th>
                            <th>Phone no</th>
                            <th>Email</th>
                            <th>address</th>
						</tr>
					</thead>
					<tbody>
						<?php
                            $query1=mysqli_query($con,"SELECT * FROM `orders`") or die(mysqli_error($con));
                            while($row1=mysqli_fetch_array($query1)){
                                $prop_id=$row1['prop_id'];
                                
                                $query2=mysqli_query($con,"SELECT * FROM `properties` WHERE 
                                `user_id`='$loginId' AND `prop_id`='$prop_id' AND `user_type`='agent'") or die(mysqli_error($con));
                                while($row2=mysqli_fetch_array($query2)){
                                    $user_id=$row1['user_id'];
                                    $query3=mysqli_query($con,"SELECT * FROM `users` WHERE `user_id`='$user_id'");
                                    $row3=mysqli_fetch_array($query3);
                                    $i=$i+1;
                                    echo'
                                    <tr>
                                        <td>'.$i.'</td>
                                        <td>'.$row2['prop_title'].'</td>
                                        <td>'.$row3['user_name'].'</td>
                                        <td>'.$row3['user_phone'].'</td>
                                        <td>'.$row3['user_email'].'</td>
                                        <td>'.$row3['user_address'].'</td>
                                    </tr>	
                                    ';
                                }
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