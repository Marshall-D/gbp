<?php 
$active = "add_shipper";
//include auth_session.php file on all user panel pages
include("includes/auth_session.php");
require('includes/db.php');

    if (isset($_POST['add_shipper'])) { 
    	// print_r($_POST); print_r($_FILES);die(); 
    	$title = mysqli_real_escape_string($con, $_POST['title']);

		  $query    = "INSERT INTO `shipper`(`shipper_name`) VALUES ('".$title."')";

    	// print_r($query);die(); 
        $result   = mysqli_query($con, $query);
        if ($result) {
					// Display the alert box 
					echo '<script>
					alert("Shipper Added Successfully.")
					window.location = "add-shipper.php";
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
						<h2>Add a shipper</h2>
					</div>
				</div>
				<!-- end main title -->

				<!-- form -->
				<div class="col-12">
					<form action="#" class="form" method="post" enctype="multipart/form-data">
						<div class="row row--form">

							<div class="col-12 col-md-12">
								<div class="row row--form">
									<div class="col-12">
										<input type="text" class="form__input" placeholder="Shipper Full Name" name="title" required>
									</div>

									<div class="col-12">
										<button type="submit" name="add_shipper" class="form__btn float_right">Add Shipper</button>
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
</body>
</html>
<?php } ?>