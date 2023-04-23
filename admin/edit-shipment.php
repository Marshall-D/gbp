<?php 
if (isset($_GET['shipment_id'])) { 
	$shipment_id = $_GET['shipment_id'];
	$active = "add_shipment";
	//include auth_session.php file on all user panel pages
	include("includes/auth_session.php");
	require('includes/db.php');

	    if (isset($_POST['add_shipment'])) { 
	    	// print_r($_POST); die(); 
	    	$shipper = $_POST['shipper'];

				$shipper_query = "SELECT id FROM `shipper` WHERE shipper_name = '".$shipper."'";
				$shipper_result = mysqli_query($con, $shipper_query) or die(mysql_error());
				while ($row = mysqli_fetch_array($shipper_result)) {
					$shipper_id = $row['id'];
				}
				$reciever_name = $_POST['reciever_name'];
				$reciever_address = $_POST['reciever_address'];
				$reciever_phone = $_POST['reciever_phone'];
				$origin = $_POST['origin'];
				$package = $_POST['package'];
				$status = $_POST['status'];
				$destination = $_POST['destination'];
				$type_of_shipment = $_POST['type_of_shipment'];
				$product = $_POST['product'];
				$shipment_mode = $_POST['shipment_mode'];
				$qty = $_POST['qty'];
				$weight = $_POST['weight'];
				$payment_mode = $_POST['payment_mode'];
				$total_freight = $_POST['total_freight'];
				$departure_date = $_POST['departure_date'];
				$departure_time = $departure_date . " " . $_POST['departure_time'];
				$pick_up_date = $_POST['delivery_date'];
				$pick_up_time = $_POST['delivery_time'];
				$expected_delivery_date = $pick_up_date . " " . $pick_up_time;

	    	// print_r($shipper_id);die(); 
			  $query    = "UPDATE `shipment` SET `shipper_id`= '".$shipper_id."',`reciever_name`= '".$reciever_name."',`reciever_address`= '".$reciever_address."',`reciever_phone`= '".$reciever_phone."',`origin`= '".$origin."',`package`= '".$package."',`status`= '".$status."',`destination`= '".$destination."',`type_of_shipment`= '".$type_of_shipment."',`weight`= '".$weight."',`shipment_mode`= '".$shipment_mode."',`product`= '".$product."',`qty`= '".$qty."',`payment_mode`= '".$payment_mode."',`total_freight`= '".$total_freight."',`expected_delivery_date`= '".$expected_delivery_date."',`departure_time`= '".$departure_time."',`pick_up_date`= '".$pick_up_date."',`pick_up_time`= '".$pick_up_time."' WHERE `id` = '".$shipment_id."'";

	    	// print_r($query);die(); 
	        $result   = mysqli_query($con, $query);
	        if ($result) {
						// Display the alert box 
						echo '<script>
						alert("Shipment Updated Successfully.")
						window.location = "all-shipments.php";
						</script>';
	        } else {  
						// Display the alert box 
						echo '<script>alert("An Error occured. Check your details or contact the Webmaster for a solution.")</script>';
	        }
	    } else{

	include "includes/header.php";
	include "includes/sidebar.php";

	$shipment_query = "SELECT * FROM `shipment` WHERE id = '".$shipment_id."'";
			$shipment_result = mysqli_query($con, $shipment_query) or die(mysql_error());

			while ($shipment = mysqli_fetch_array($shipment_result)) {
	?>

	?>
		<!-- main content -->
		<main class="main">
			<div class="container-fluid">
				<div class="row">
					<!-- main title -->
					<div class="col-12">
						<div class="main__title">
							<h2><i class="icon ion-ios-airplane"></i>&nbsp;Edit Shipment</h2>
						</div>
					</div>
					<!-- end main title -->

					<!-- form -->
					<div class="col-12">
						<form action="#" class="form" method="post" enctype="multipart/form-data">
							<div class="row row--form">

								<div class="col-12 col-md-12">
									<div class="row row--form">

										<div class="col-md-12 col-lg-6">
											<label for="" class="text-white">Shipper</label>
											<select class="form__input" name="shipper" required id="oap_select">
												<option value="">-- Choose Shipper --</option>
												<?php
													$shipper_query = "SELECT * FROM `shipper` ORDER BY id";
						        					$shipper_result = mysqli_query($con, $shipper_query) or die(mysql_error());

						        					while ($row = mysqli_fetch_array($shipper_result)) {
						        						?>

															<option value="<?= $row['shipper_name'] ?>" <?php if ($row['id'] == $shipment_id) {echo "selected";} ?>><?= $row['shipper_name'] ?></option>
													    <?php
													}
												?>
											</select>
										</div>

										<div class="col-6">
											<label for="" class="text-white">Reciever's Name</label>
											<input type="text" class="form__input" placeholder="Receiver's Name" name="reciever_name" required value="<?= $shipment['reciever_name']; ?>">
										</div>

										<div class="col-12 col-lg-6">
											<label for="" class="text-white">Reciever Address</label>
											<input type="text" class="form__input" placeholder="Reciever Address" name="reciever_address" required value="<?= $shipment['reciever_address']; ?>">
										</div>


										<div class="col-12 col-lg-6">
											<label for="" class="text-white">Reciever Phone</label>
											<input type="text" class="form__input" placeholder="Reciever Phone" name="reciever_phone" required value="<?= $shipment['reciever_phone']; ?>">
										</div>

										<div class="col-12 col-lg-3">
											<label for="" class="text-white">Country of Origin</label>
											<input type="text" class="form__input" placeholder="Origin" name="origin" required value="<?= $shipment['origin']; ?>">
										</div>


										<div class="col-12 col-lg-3">
											<label for="" class="text-white">Package Type</label>
											<input type="text" class="form__input" placeholder="Package" name="package" required value="<?= $shipment['package']; ?>">
										</div>


										<div class="col-12 col-lg-6">
											<label for="" class="text-white">Status</label>
											<select class="form__input" name="status" required>
												<option value="">-- Choose Status --</option>
												<option value="On Hold"<?php if ($shipment['status'] == "On Hold") {echo "selected";} ?>>On Hold</option>
												<option value="In Transit"<?php if ($shipment['status'] == "In Transit") {echo "selected";} ?>>In Transit</option>
												<option value="Out For Delivery"<?php if ($shipment['status'] == "Out For Delivery") {echo "selected";} ?>>Out For Delivery</option>
												<option value="Delivered"<?php if ($shipment['status'] == "Delivered") {echo "selected";} ?>>Delivered</option>
												<option value="Returned"<?php if ($shipment['status'] == "Returned") {echo "selected";} ?>>Returned</option>
												<option value="Checking"<?php if ($shipment['status'] == "Checking") {echo "selected";} ?>>Checking</option>
											</select>
										</div>


										<div class="col-12 col-lg-6">
											<label for="" class="text-white">Destination</label>
											<input type="text" class="form__input" placeholder="Destination" name="destination" required value="<?= $shipment['destination']; ?>">
										</div>


										<div class="col-12 col-lg-6">
											<label for="" class="text-white">Type of Shipment</label>
											<input type="text" class="form__input" placeholder="Type of Shipment" name="type_of_shipment" required value="<?= $shipment['type_of_shipment']; ?>">
										</div>

										<div class="col-12 col-lg-6">
											<label for="" class="text-white">Product</label>
											<input type="text" class="form__input" placeholder="Product" name="product" required value="<?= $shipment['product']; ?>">
										</div>

										<div class="col-12 col-lg-6">
											<label for="" class="text-white">Shipment Mode</label>
											<input type="text" class="form__input" placeholder="Shipment Mode" name="shipment_mode" required value="<?= $shipment['shipment_mode']; ?>">
										</div>



										<div class="col-12 col-lg-3">
											<label for="" class="text-white">Qty</label>
											<input type="text" class="form__input" placeholder="Qty" name="qty" required value="<?= $shipment['qty']; ?>">
										</div>


										<div class="col-12 col-lg-3">
											<label for="" class="text-white">Weight</label>
											<input type="text" class="form__input" placeholder="Weight" name="weight" required value="<?= $shipment['weight']; ?>">
										</div>


										<div class="col-12 col-lg-6">
											<label for="" class="text-white">Payment Mode</label>
											<input type="text" class="form__input" placeholder="Payment Mode" name="payment_mode" required value="<?= $shipment['payment_mode']; ?>">
										</div>


										<div class="col-12 col-lg-6">
											<label for="" class="text-white">Total Freight</label>
											<input type="text" class="form__input" placeholder="Total Freight" name="total_freight" required value="<?= $shipment['total_freight']; ?>">
										</div>
										<?php

										$shipment_departure_time = date_create($shipment['departure_time']);
										$departure_date = date_format($shipment_departure_time, "Y-m-d");
										$departure_time = date_format($shipment_departure_time, "h:i A");
										$shipment_delivery_time = date_create($shipment['expected_delivery_date']);
										$delivery_date = date_format($shipment_delivery_time, "Y-m-d");
										$delivery_time = date_format($shipment_delivery_time, "h:i A");
										// var_dump($departure_date); die();



										?>
										<div class="col-3">
											<label for="" class="text-white">Departure Date</label>
											<input type="date" class="form__input" placeholder="Departure Date" name="departure_date" required value="<?= $departure_date; ?>">
										</div>

										<div class="col-12 col-lg-3">
											<label for="" class="text-white">Departure Time</label>
											<div class="widget-wrap">
												<div id="hash"></div>
												<input type="text" id="demoA" class="form__input" placeholder="Choose Departure Time" name="departure_time" value="<?= $departure_time; ?>"/>
											</div>
										</div>

										<div class="col-12 col-lg-6">
											<label for="" class="text-white">Delivery Date</label>
											<input type="date" class="form__input" placeholder="Delivery Date" name="delivery_date" required value="<?= $delivery_date; ?>">
										</div>

										<div class="col-12 col-lg-6">
											<label for="" class="text-white">Departure Time</label>
											<div class="widget-wrap">
												<div id="hash"></div>
												<input type="text" id="demoB" class="form__input" placeholder="Choose Delivery Time" name="delivery_time"  value="<?= $delivery_time; ?>"/>
											</div>
										</div>

										<div class="col-12">
											<button type="submit" name="add_shipment" class="form__btn float_right">Update Shipment</button>
										</div>


									</div>
								</div>

							</div>
						</form>
					</div>
					<!-- end form -->
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
		<script>
			$("#oap_select").on('input', function() {
				var inputString = $("#oap_select").val();
	            $('#oap_show_name').val(
	              inputString);
	        });
		</script>
	</body>
	</html>
	<?php 

			}
	}

} else {
	// Display the alert box 
	echo '<script>
	alert("Shipment ID Error.")
	window.location = "all-shipments.php";
	</script>';
}
?>