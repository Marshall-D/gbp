<?php 
$active = "user";

//include auth_session.php file on all user panel pages
include("includes/auth_session.php");
require('includes/db.php');
include "includes/header.php";
include "includes/sidebar.php";

$user_num_query    = "SELECT * FROM `shipper`";
$user_num_result = mysqli_query($con, $user_num_query) or die(mysql_error());
$user_num_rows = mysqli_num_rows($user_num_result);


?>
	<!-- main content -->
	<main class="main">
		<div class="container-fluid">
			<div class="row">
				<!-- main title -->
				<div class="col-12">
					<div class="main__title">
						<h2>Shipments</h2>

						<span class="main__title-stat"><?= $user_num_rows; ?> Total</span>

						<div class="main__title-wrap">
							<!-- filter sort -->
							<div class="filter" id="filter__sort">
								<span class="filter__item-label">Sort by:</span>

								<div class="filter__item-btn dropdown-toggle" role="navigation" id="filter-sort" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<input type="button" value="Date created">
									<span></span>
								</div>

								<ul class="filter__item-menu dropdown-menu scrollbar-dropdown" aria-labelledby="filter-sort">
									<li>Date created</li>
									<li>Pricing plan</li>
									<li>Status</li>
								</ul>
							</div>
							<!-- end filter sort -->

							<!-- search -->
							<form action="#" class="main__title-form">
								<input type="text" placeholder="Find user..">
								<button type="button">
									<i class="icon ion-ios-search"></i>
								</button>
							</form>
							<!-- end search -->
						</div>
					</div>
				</div>
				<!-- end main title -->

				<!-- users -->
				<div class="col-12">
					<div class="main__table-wrap">
						<table class="main__table">
							<thead>
								<tr>
									<th>SN</th>
									<th>Edit</th>
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
								</tr>
							</thead>

							<tbody>
								<?php
									$user_query = "SELECT * FROM `shipment` ORDER BY id";
		        					$user_result = mysqli_query($con, $user_query) or die(mysql_error());
		        					$x = 1;
		        					while ($row = mysqli_fetch_array($user_result)) {
		        				?>
								<tr>
									<td>
										<div class="main__table-text"><?= $x; ?></div>
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
											} elseif ($row["comments"] == NULL) {
												echo 'No Comment';
											} else {
												echo 'No Comment';
											}

											?>
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
				<!-- end users -->

				<!-- paginator -->
				<div class="col-12">
					<div class="paginator-wrap">
						<span><?= $user_num_rows; ?> out of <?= $user_num_rows; ?></span>

						<ul class="paginator">
							<li class="paginator__item paginator__item--prev">
								<a href="#"><i class="icon ion-ios-arrow-back"></i></a>
							</li>
							<li class="paginator__item paginator__item--active"><a href="#">1</a></li>
							<!-- <li class="paginator__item"><a href="#">2</a></li>
							<li class="paginator__item"><a href="#">3</a></li>
							<li class="paginator__item"><a href="#">4</a></li> -->
							<li class="paginator__item paginator__item--next">
								<a href="#"><i class="icon ion-ios-arrow-forward"></i></a>
							</li>
						</ul>
					</div>
				</div>
				<!-- end paginator -->
			</div>
		</div>
	</main>
	<!-- end main content -->

	<!-- modal status -->
	<div id="modal-status" class="zoom-anim-dialog mfp-hide modal">
		<h6 class="modal__title">Status change</h6>

		<p class="modal__text">Are you sure about immediately change status?</p>

		<div class="modal__btns">
			<button class="modal__btn modal__btn--apply" type="button">Apply</button>
			<button class="modal__btn modal__btn--dismiss" type="button">Dismiss</button>
		</div>
	</div>
	<!-- end modal status -->

	<!-- modal delete -->
	<div id="modal-delete" class="zoom-anim-dialog mfp-hide modal">
		<h6 class="modal__title">Shipment delete</h6>

		<p class="modal__text">Are you sure to permanently delete this shipment?</p>

		<div class="modal__btns">
			<button class="modal__btn modal__btn--apply" type="button">Delete</button>
			<button class="modal__btn modal__btn--dismiss" type="button">Dismiss</button>
		</div>
	</div>
	<!-- end modal delete -->

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