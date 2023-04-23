<?php 
$active = "edit_whatsapp";
//include auth_session.php file on all user panel pages
include("includes/auth_session.php");
require('includes/db.php');

    if (isset($_POST['edit_whatsapp'])) { 
    	// print_r($_POST); print_r($_FILES);die(); 
    	$number = $_POST['number'];
		// print_r($_POST);die();
     //    $update_no_shows_query    = "UPDATE `users` SET `no_of_shows`='".$new_no."' WHERE id='".$user_id."'";
    	// // print_r($query);die(); 
     //    $update_no_shows_result   = mysqli_query($con, $update_no_shows_query);
        $query    = "UPDATE `whatsapp` SET `number`= '$number' WHERE id=1";
    	// print_r($query);die(); 
        $result   = mysqli_query($con, $query);
        if ($result) {
			// Display the alert box 
			echo '<script>
			alert("Whatsapp Number Changed.")
			window.location = "edit-whatsapp.php";
			</script>';
        } else {  
			// Display the alert box 
			echo '<script>alert("An Error occured. Check your details or contact the Webmaster for a solution.")</script>';
        }
    } else{

include "includes/header.php";
include "includes/sidebar.php";
    $query    = "SELECT * FROM `whatsapp` WHERE id=1";
    $result = mysqli_query($con, $query) or die(mysql_error());
    $whatsapp = mysqli_fetch_array($result, MYSQLI_ASSOC);
    	// print_r($whatsapp);die(); 

?>

?>
	<!-- main content -->
	<main class="main">
		<div class="container-fluid">
			<div class="row">
				<!-- main title -->
				<div class="col-12">
					<div class="main__title">
						<h2>Edit Stream Info</h2>
					</div>
				</div>
				<!-- end main title -->

				<!-- form -->
				<div class="col-12">
					<form action="#" class="form" method="post" enctype="multipart/form-data">
						<div class="row row--form">
							<div class="col-12 col-lg-10">
								<input type="text" class="form__input" placeholder="Whatsapp Number" name="number" required value="<?= $whatsapp['number']; ?>">
							</div>
							<div class="col-12 col-lg-2">
								<button type="submit" name="edit_whatsapp" class="form__btn float_right">Update</button>
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