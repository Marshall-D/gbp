<?php 
$active = "dashboard";
//include auth_session.php file on all user panel pages
include("includes/auth_session.php");
// var_dump($_SESSION);
// die();
require('includes/db.php');
include "includes/header.php";
include "includes/sidebar.php";

?>

	<!-- main content -->
	<main class="main">
		<div class="container-fluid">
			<div class="row row--grid">
				<!-- main title -->
				<div class="col-12">
					<div class="main__title">
						<h2>Dashboard</h2>

					</div>
				</div>
				<!-- end main title -->
				<!-- stats -->
				<div class="col-12 col-sm-6 col-lg-6">
					<div class="stats">
						<span>Shippers</span>
						<?php
						$show_num_query    = "SELECT * FROM `shipper`";
						$show_num_result = mysqli_query($con, $show_num_query) or die(mysql_error());
						$show_num = mysqli_num_rows($show_num_result);
						?>
						<p><?= $show_num; ?></p>
						<i class="icon ion-ios-paper-plane"></i>
					</div>
				</div>
				<!-- end stats -->

				<!-- stats -->
				<div class="col-12 col-sm-6 col-lg-6">
					<div class="stats">
						<span>Shipments</span>
						<?php
						$syn_num_query    = "SELECT * FROM `shipment`";
						$syn_num_result = mysqli_query($con, $syn_num_query) or die(mysql_error());
						$syn_num = mysqli_num_rows($syn_num_result);
						?>
						<p><?= $syn_num; ?></p>
						<i class="icon ion-ios-airplane"></i>
					</div>
				</div>
				<!-- end stats -->


				<!-- dashbox -->
				<div class="col-12">
					<div class="dashbox">
						<div class="dashbox__title">
							<h3><i class="icon ion-ios-airplane"></i> Shipments</h3>

							<div class="dashbox__wrap">
								<a class="dashbox__refresh" href="#"><i class="icon ion-ios-refresh"></i></a>
								<a class="dashbox__more" href="all-shipments.php">View All</a>
							</div>
						</div>

						<div class="dashbox__table-wrap">
							<table class="main__table main__table--dash">
							<thead>
								<tr>
									<th>SN</th>
									<th>Shipper</th>
									<th>Receiver's Name</th>
									<th>Reciever Address</th>
									<th>Reciever Phone</th>
									<th>Tracking No</th>
									<th>Origin</th>
									<th>Package</th>
									<th>Status</th>
									<th>Destination</th>
									<th>Carrier</th>
									<th>Type of Shipment</th>
									<th>Weight</th>
									<th>Shipment Mode</th>
									<th>Carrier Reference No</th>
									<th>Product</th>
									<th>Qty</th>
									<th>Payment Mode</th>
									<th>Total Freight</th>
									<th>Expected Delivery Date</th>
									<th>Departure Time</th>
									<th>Pick Up Date</th>
									<th>Pick Up Time</th>
									<th>Comments</th>
									<th>Edit</th>
								</tr>
							</thead>

							<tbody>
								<?php
									$user_query = "SELECT * FROM `shipment` ORDER BY id LIMIT 5";
		        					$user_result = mysqli_query($con, $user_query) or die(mysql_error());
		        					$x = 1;
		        					while ($row = mysqli_fetch_array($user_result)) {
		        				?>
								<tr>
									<td>
										<div class="main__table-text"><?= $x; ?></div>
									</td>
									<td>
										<div class="main__user">
											<div class="main__meta">
												<h3>
													<?php 
														$shipper_query = "SELECT * FROM `shipper` WHERE id='".$row['shipper_id']."'";
							        					$shipper_result = mysqli_query($con, $shipper_query) or die(mysql_error());
														$shipper_num = mysqli_num_rows($shipper_result);
							        					if ($shipper_num > 0) {
								        					while ($shipper = mysqli_fetch_array($shipper_result)) {
								        						echo $shipper["shipper_name"];
								        					}
							        					} else {
							        						echo 'Error';
							        					}
							        				?>
												</h3>
											</div>
										</div>
									</td>

									<td>
										<div class="main__table-text">
											<?= $row["reciever_name"]; ?>
					        			</div>
									</td>

									<td>
										<div class="main__table-text">
											<?= $row["reciever_address"]; ?>
					        			</div>
									</td>


									<td>
										<div class="main__table-text">
											<?= $row["reciever_phone"]; ?>
					        			</div>
									</td>


									<td>
										<div class="main__table-text">
											<?= $row["tracking_no"]; ?>
					        			</div>
									</td>


									<td>
										<div class="main__table-text">
											<?= $row["origin"]; ?>
					        			</div>
									</td>


									<td>
										<div class="main__table-text">
											<?= $row["package"]; ?>
					        			</div>
									</td>


									<td>
										<div class="main__table-text">
											<?= $row["status"]; ?>
					        			</div>
									</td>


									<td>
										<div class="main__table-text">
											<?= $row["destination"]; ?>
					        			</div>
									</td>


									<td>
										<div class="main__table-text">
											<?= $row["carrier"]; ?>
					        			</div>
									</td>


									<td>
										<div class="main__table-text">
											<?= $row["type_of_shipment"]; ?>
					        			</div>
									</td>


									<td>
										<div class="main__table-text">
											<?= $row["weight"]; ?>
					        			</div>
									</td>


									<td>
										<div class="main__table-text">
											<?= $row["shipment_mode"]; ?>
					        			</div>
									</td>


									<td>
										<div class="main__table-text">
											<?= $row["carrier_reference_no"]; ?>
					        			</div>
									</td>


									<td>
										<div class="main__table-text">
											<?= $row["product"]; ?>
					        			</div>
									</td>


									<td>
										<div class="main__table-text">
											<?= $row["qty"]; ?>
					        			</div>
									</td>


									<td>
										<div class="main__table-text">
											<?= $row["payment_mode"]; ?>
					        			</div>
									</td>


									<td>
										<div class="main__table-text">
											<?= $row["total_freight"]; ?>
					        			</div>
									</td>


									<td>
										<div class="main__table-text">
											<?= $row["expected_delivery_date"]; ?>
					        			</div>
									</td>


									<td>
										<div class="main__table-text">
											<?= $row["departure_time"]; ?>
					        			</div>
									</td>


									<td>
										<div class="main__table-text">
											<?= $row["pick_up_date"]; ?>
					        			</div>
									</td>


									<td>
										<div class="main__table-text">
											<?= $row["pick_up_time"]; ?>
					        			</div>
									</td>


									<td>
										<div class="main__table-text">
											<?php

											if ($row["comments"] !== "") {
												echo $row["comments"];
											} else {
												echo 'No Comment';
											}

											?>
					        			</div>
									</td>

									<td>
										<div class="main__table-btns">
											<a href="edit-shipment.php?shipment_id=<?= $row["id"]; ?>" class="main__table-btn main__table-btn--edit">
												<i class="icon ion-ios-create"></i>
											</a>
											<a href="#modal-delete" class="main__table-btn main__table-btn--delete open-modal">
												<i class="icon ion-ios-trash"></i>
											</a>
										</div>
									</td>
								</tr>
								<?php
		        					$x++;	}
								?>
							</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- end dashbox -->
				<!-- dashbox -->
				<div class="col-12 col-xl-6">
					<div class="dashbox">
						<div class="dashbox__title">
							<h3><i class="icon ion-ios-trophy"></i> Shippers</h3>

							<div class="dashbox__wrap">
								<a class="dashbox__refresh" href="#"><i class="icon ion-ios-refresh"></i></a>
								<a class="dashbox__more" href="all-shippers.php">View All</a>
							</div>
						</div>

						<div class="dashbox__table-wrap">
							<table class="main__table main__table--dash">
							<thead>
								<tr>
									<th>ID</th>
									<th>NAME</th>
								</tr>
							</thead>

							<tbody>
								<?php
									$user_query = "SELECT * FROM `shipper` ORDER BY id";
		        					$user_result = mysqli_query($con, $user_query) or die(mysql_error());
		        					$x = 1;
		        					while ($row = mysqli_fetch_array($user_result)) {
		        				?>
								<tr>
									<td>
										<div class="main__table-text"><?= $x; ?></div>
									</td>
									<td>
										<div class="main__user">
											<div class="main__avatar">
												<img src="img/user.svg" alt="">
											</div>
											<div class="main__meta">
												<h3><?= $row["shipper_name"]; ?></h3>
											</div>
										</div>
									</td>
									<td>
										<div class="main__table-btns">
											<a href="edit-shipper.php?user_id=<?= $row["id"]; ?>" class="main__table-btn main__table-btn--edit">
												<i class="icon ion-ios-create"></i>
											</a>
											<a href="#modal-delete" class="main__table-btn main__table-btn--delete open-modal">
												<i class="icon ion-ios-trash"></i>
											</a>
										</div>
									</td>
								</tr>
								<?php
		        					$x++;	}
								?>
							</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- end dashbox -->

			</div>
		</div>
	</main>
	<!-- end main content -->

	<!-- JS -->
	<script src="js/jquery-3.5.1.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/jquery.mousewheel.min.js"></script>
	<script src="js/jquery.mCustomScrollbar.min.js"></script>
	<script src="js/select2.min.js"></script>
	<script src="js/admin.js"></script>
</body>
</html>