<?php 
$active = "add_show";
//include auth_session.php file on all user panel pages
include("includes/auth_session.php");
require('includes/db.php');

    if (isset($_POST['create_show'])) { 
    	// print_r($_POST); print_r($_FILES);die(); 
    	$title = mysqli_real_escape_string($con, $_POST['title']);
    	// print_r($title);die(); 
		$description = mysqli_real_escape_string($con, $_POST['description']);
		$genreArr[] = $_POST['genre'];
		$dayArr[] = $_POST['day'];
		$start_time = $_POST['start_time'];
		$end_time = $_POST['end_time'];
		$rating = $_POST['rating'];
		$oap_show_name = $_POST['oap_show_name'];
		$languageArr[] = $_POST['language'];
		$oap = $_POST['oap'];
		$type = $_POST['type'];

		$genre = serialize($genreArr);
		$day = serialize($dayArr);
		$language = serialize($languageArr);

		if (isset($_FILES['form__img-upload']['name']) && $_FILES['form__img-upload']['name'] != "") {	
			$img_name = $_FILES['form__img-upload']['name'];
			$target_dir = "avatars/";
			$target_file = $target_dir . basename($_FILES["form__img-upload"]["name"]);

			// Select file type
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

			// Valid file extensions
			$extensions_arr = array("jpg","jpeg","png","gif");

			// Check extension
			if( in_array($imageFileType,$extensions_arr) ){
				// Upload file
				if(move_uploaded_file($_FILES['form__img-upload']['tmp_name'],$target_dir.$img_name)){
				   // Convert to base64 
				   $image_base64 = base64_encode(file_get_contents('avatars/'.$img_name) );
				   $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
				   // Insert record
				}

			}
		} else {
			$image = "";
		}
		$no_shows_query = "SELECT * FROM `users` WHERE `oap_name` = '$oap'";		
        $result   = mysqli_query($con, $no_shows_query);
        if ($result) {
        	$user = mysqli_fetch_array($result, MYSQLI_ASSOC);
        	$user_id = $user['id'];
        	$no_shows = $user['no_of_shows'];
        	$new_no = $no_shows+1;
    	}


        $update_no_shows_query    = "UPDATE `users` SET `no_of_shows`='".$new_no."' WHERE id='".$user_id."'";
    	// print_r($query);die(); 
        $update_no_shows_result   = mysqli_query($con, $update_no_shows_query);

				if (empty($description)) {
		        $query    = "INSERT INTO `shows`(`title`, `description`, `genre`, `day`, `start_time`, `end_time`, `rating`, `language`, `oap`, `oap_show_name`, `type`, `img`) VALUES ('".$title."', NULL, '".$genre."', '".$day."', '$start_time', '$end_time', '$rating', '".$language."', '$oap', '$oap_show_name', '$type', '$image')";
				} else {
		        $query    = "INSERT INTO `shows`(`title`, `description`, `genre`, `day`, `start_time`, `end_time`, `rating`, `language`, `oap`, `type`, `img`) VALUES ('".$title."', '$description', '".$genre."', '".$day."', '$start_time', '$end_time', '$rating', '".$language."', '$oap', '$oap_show_name', '$type', '$image')";
				}

    	// print_r($query);die(); 
    	// print_r($query);die(); 
        $result   = mysqli_query($con, $query);
        if ($result) {
			// Display the alert box 
			echo '<script>
			alert("Show Added Successfully.")
			window.location = "add-item.php";
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
						<h2>Add a show</h2>
					</div>
				</div>
				<!-- end main title -->

				<!-- form -->
				<div class="col-12">
					<form action="#" class="form" method="post" enctype="multipart/form-data">
						<div class="row row--form">
							<div class="col-12 col-md-5 form__cover">
								<div class="row row--form">
									<div class="col-12 col-sm-6 col-md-12">
										<div class="form__img">
											<label for="form__img-upload">Upload cover (400 x 400)</label>
											<input id="form__img-upload" name="form__img-upload" type="file" accept=".png, .jpg, .jpeg">
											<img id="form__img" src="#" alt=" ">
										</div>
									</div>
								</div>
							</div>

							<div class="col-12 col-md-7 form__content">
								<div class="row row--form">
									<div class="col-12">
										<input type="text" class="form__input" placeholder="Show Name/Title" name="title" required>
									</div>

									<div class="col-12">
										<textarea id="text" name="description" class="form__textarea" placeholder="Description/Synopsis"></textarea>
									</div>

							<div class="col-12 col-lg-6">
								<div class="widget-wrap">
									<div id="hash"></div>
									<input type="text" id="demoA" class="form__input" placeholder="Choose Start Time" name="start_time" />
								</div>
							</div>

							<div class="col-12 col-lg-6">
								<div class="widget-wrap">
									<div id="hash"></div>
									<input type="text" id="demoB" class="form__input" placeholder="Choose End Time" name="end_time" />
								</div>
							</div>

									<!-- <div class="col-12">
										<div class="form__gallery">
											<label id="gallery1" for="form__gallery-upload">Upload photos</label>
											<input data-name="#gallery1" id="form__gallery-upload" name="gallery" class="form__gallery-upload" type="file" accept=".png, .jpg, .jpeg" multiple>
										</div>
									</div> -->
								</div>
							</div>



									<div class="col-12 col-lg-12">
										<select class="js-example-basic-multiple" id="genre" multiple="multiple" name="genre[]" required>
											<option value="News and Events">News and Events</option>
											<option value="Sports">Sports</option>
											<option value="Inspiration/Faith">Inspiration/Faith</option>
											<option value="Interview">Interview</option>
											<option value="Education/Information">Education/Information</option>
											<option value="Business">Business</option>
											<option value="Entertainment">Entertainment</option>
											<option value="Comedy">Comedy</option>
											<option value="Freeform/Freestyle">Freeform/Freestyle</option>
											<option value="Call In/Request Show">Call In/Request Show</option>
											<option value="Breakfast/Morning Show">Breakfast/Morning Show</option>
											<option value="Music Show">Music Show</option>
											<option value="Talk Show">Talk Show</option>
											<option value="Specialty/Niche Show">Specialty/Niche Show</option>
											<option value="SIPCC Global">SIPCC Global</option>
											<option value="Other">Other</option>
										</select>
									</div>
							<div class="col-md-12 col-lg-12">
								<select class="js-example-basic-multiple" id="day" multiple="multiple" name="day[]" required>
									<option value="Monday">Monday</option>
									<option value="Tuesday">Tuesday</option>
									<option value="Wednesday">Wednesday</option>
									<option value="Thursday">Thursday</option>
									<option value="Friday">Friday</option>
									<option value="Saturday">Saturday</option>
									<option value="Sunday">Sunday</option>
								</select>
							</div>
							<div class="col-md-12">
								<select class="js-example-basic-multiple" id="language" multiple="multiple" name="language[]" required>
									<option value="English">English</option>
									<option value="Yoruba">Yoruba</option>
									<option value="Igbo">Igbo</option>
									<option value="Pidgin">Pidgin</option>
								</select>
							</div>

							<div class="col-md-12 col-lg-4">
								<input type="number" class="form__input" placeholder="Input Show Rating" name="rating" step="0.1">
							</div>

							<div class="col-md-12 col-lg-4">
								<select class="form__input" name="oap" required id="oap_select">
									<option value="">-- Choose Host/Anchor --</option>
									<?php
										$oap_query = "SELECT oap_name FROM `users` ORDER BY oap_name";
			        					$oap_result = mysqli_query($con, $oap_query) or die(mysql_error());

			        					while ($row = mysqli_fetch_array($oap_result)) {
										    echo "<option value='" . $row['oap_name'] . "'>" . $row['oap_name'] . "</option>";
										}
									?>
								</select>
							</div>

							<div class="col-md-12 col-lg-4">
								<input type="text" class="form__input" placeholder="Name used on the show" name="character" id="oap_show_name">
							</div>

							<div class="col-12 float_right">
								<ul class="form__radio">
									<li>
										<span>OAP Character:</span>
									</li>
									<li>
										<input id="host" type="radio" name="type" checked="" value="Anchor">
										<label for="host">Anchor</label>
									</li>
									<li>
										<input id="anchor" type="radio" name="type" value="Host">
										<label for="anchor">Host</label>
									</li>
								</ul>
							</div>

							
							
							<div class="col-12">
								<div class="row row--form">
									<!-- <div class="col-12">
										<div class="form__video">
											<label id="movie1" for="form__video-upload">Upload video</label>
											<input data-name="#movie1" id="form__video-upload" name="movie" class="form__video-upload" type="file" accept="video/mp4,video/x-m4v,video/*">
										</div>
									</div>

									<div class="col-12">
										<input type="text" class="form__input" placeholder="Or add a link">
									</div> -->

									<div class="col-12">
										<button type="submit" name="create_show" class="form__btn float_right">publish</button>
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