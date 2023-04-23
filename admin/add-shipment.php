<?php 
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
			$tracking_no = getToken(15);
			$carrier_reference_no = $tracking_no . "-1";
			$carrier = "Global Parcel Delivery";

    	// print_r($shipper_id);die(); 
		  $query    = "INSERT INTO `shipment`(`shipper_id`, `reciever_name`, `reciever_address`, `reciever_phone`, `tracking_no`, `origin`, `package`, `status`, `destination`, `carrier`, `type_of_shipment`, `weight`, `shipment_mode`, `carrier_reference_no`, `product`, `qty`, `payment_mode`, `total_freight`, `expected_delivery_date`, `departure_time`, `pick_up_date`, `pick_up_time`) VALUES ('".$shipper_id."', '".$reciever_name."', '".$reciever_address."', '".$reciever_phone."', '".$tracking_no."', '".$origin."', '".$package."', '".$status."', '".$destination."', '".$carrier."', '".$type_of_shipment."', '".$weight."', '".$shipment_mode."', '".$carrier_reference_no."', '".$product."', '".$qty."', '".$payment_mode."', '".$total_freight."', '".$expected_delivery_date."', '".$departure_time."', '".$pick_up_date."', '".$pick_up_time."')";

    	// print_r($query);die(); 
        $result   = mysqli_query($con, $query);
        if ($result) {
					// Display the alert box 
					echo '<script>
					alert("Shipment Added Successfully.")
					window.location = "all-shipments.php";
					</script>';
        } else {  
					// Display the alert box 
					echo '<script>alert("An Error occured. Check your details or contact the Webmaster for a solution.")</script>';
        }
    } else{

include "includes/header.php";
include "includes/sidebar.php";

?>

?>
	<!-- main content -->
	<main class="main">
		<div class="container-fluid">
			<div class="row">
				<!-- main title -->
				<div class="col-12">
					<div class="main__title">
						<h2><i class="icon ion-ios-airplane"></i>&nbsp;Add Shipment</h2>
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
												$shipper_query = "SELECT shipper_name FROM `shipper` ORDER BY id";
					        					$shipper_result = mysqli_query($con, $shipper_query) or die(mysql_error());

					        					while ($row = mysqli_fetch_array($shipper_result)) {
												    echo "<option value='" . $row['shipper_name'] . "'>" . $row['shipper_name'] . "</option>";
												}
											?>
										</select>
									</div>

									<div class="col-6">
										<label for="" class="text-white">Reciever's Name</label>
										<input type="text" class="form__input" placeholder="Receiver's Name" name="reciever_name" required>
									</div>

									<div class="col-12 col-lg-6">
										<label for="" class="text-white">Reciever Address</label>
										<input type="text" class="form__input" placeholder="Reciever Address" name="reciever_address" required>
									</div>


									<div class="col-12 col-lg-6">
										<label for="" class="text-white">Reciever Phone</label>
										<input type="text" class="form__input" placeholder="Reciever Phone" name="reciever_phone" required>
									</div>

									<div class="col-12 col-lg-3">
										<label for="" class="text-white">Country of Origin</label>
										<input type="text" class="form__input" placeholder="Origin" name="origin" required>
									</div>


									<div class="col-12 col-lg-3">
										<label for="" class="text-white">Package Type</label>
										<input type="text" class="form__input" placeholder="Package" name="package" required>
									</div>


									<div class="col-12 col-lg-6">
										<label for="" class="text-white">Status</label>
										<select class="form__input" name="status" required>
											<option value="">-- Choose Status --</option>
											<option value="On Hold">On Hold</option>
											<option value="In Transit">In Transit</option>
											<option value="Out For Delivery">Out For Delivery</option>
											<option value="Delivered">Delivered</option>
											<option value="Returned">Returned</option>
											<option value="Checking">Checking</option>
										</select>
									</div>


									<div class="col-12 col-lg-6">
										<label for="" class="text-white">Destination</label>
										<input type="text" class="form__input" placeholder="Destination" name="destination" required>
									</div>


									<div class="col-12 col-lg-6">
										<label for="" class="text-white">Type of Shipment</label>
										<input type="text" class="form__input" placeholder="Type of Shipment" name="type_of_shipment" required>
									</div>

									<div class="col-12 col-lg-6">
										<label for="" class="text-white">Product</label>
										<input type="text" class="form__input" placeholder="Product" name="product" required>
									</div>

									<div class="col-12 col-lg-6">
										<label for="" class="text-white">Shipment Mode</label>
										<input type="text" class="form__input" placeholder="Shipment Mode" name="shipment_mode" required>
									</div>



									<div class="col-12 col-lg-3">
										<label for="" class="text-white">Qty</label>
										<input type="text" class="form__input" placeholder="Qty" name="qty" required>
									</div>


									<div class="col-12 col-lg-3">
										<label for="" class="text-white">Weight</label>
										<input type="text" class="form__input" placeholder="Weight" name="weight" required>
									</div>


									<div class="col-12 col-lg-6">
										<label for="" class="text-white">Payment Mode</label>
										<input type="text" class="form__input" placeholder="Payment Mode" name="payment_mode" required>
									</div>


									<div class="col-12 col-lg-6">
										<label for="" class="text-white">Total Freight</label>
										<input type="text" class="form__input" placeholder="Total Freight" name="total_freight" required>
									</div>

									<div class="col-3">
										<label for="" class="text-white">Departure Date</label>
										<input type="date" class="form__input" placeholder="Departure Date" name="departure_date" required>
									</div>

									<div class="col-12 col-lg-3">
										<label for="" class="text-white">Departure Time</label>
										<div class="widget-wrap">
											<div id="hash"></div>
											<input type="text" id="demoA" class="form__input" placeholder="Choose Departure Time" name="departure_time" />
										</div>
									</div>

									<div class="col-12 col-lg-6">
										<label for="" class="text-white">Delivery Date</label>
										<input type="date" class="form__input" placeholder="Delivery Date" name="delivery_date" required>
									</div>

									<div class="col-12 col-lg-6">
										<label for="" class="text-white">Departure Time</label>
										<div class="widget-wrap">
											<div id="hash"></div>
											<input type="text" id="demoB" class="form__input" placeholder="Choose Delivery Time" name="delivery_time" />
										</div>
									</div>

									<div class="col-12">
										<button type="submit" name="add_shipment" class="form__btn float_right">Add Shipment</button>
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
<?php } ?>