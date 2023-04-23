<?php 
$active = "edit_show";
	//include auth_session.php file on all show panel pages
	include("includes/auth_session.php");
	// var_dump($_SESSION);die();
	require('includes/db.php');

if (isset($_GET['show_id'])) {
	$show_id = $_GET['show_id'];
	// print_r($show_id);die();	
	    if (isset($_POST['update']) && $_POST['update'] == "show") {

			// if (isset($_FILES['form__img-upload']['name']) && $_FILES['form__img-upload']['name'] != "") {	
			// 	echo 'FILE';var_dump($_FILES['form__img-upload']);die();
			// }
			// var_dump($_POST);die();	
	    	$title = $_POST['title'];
			$description = $_POST['description'];
			$genreArr = $_POST['genre'];
			$dayArr = $_POST['day'];
			$start_time = $_POST['start_time'];
			$end_time = $_POST['end_time'];
			$languageArr = $_POST['language'];
			$oap = $_POST['oap'];
			$rating = $_POST['rating'];
			$trailer_url = $_POST['trailer_url'];
			$type = $_POST['type'];

			$genre = serialize($genreArr);
			$day = serialize($dayArr);
			$language = serialize($languageArr);

		    $query    = "SELECT * FROM `shows` WHERE id='$show_id'";
		        $result = mysqli_query($con, $query) or die(mysql_error());
		        $rows = mysqli_num_rows($result);
		        if ($rows == 1) {
		        	$show = mysqli_fetch_array($result, MYSQLI_ASSOC);
					// var_dump($genres);die();
		        }

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

		        $query    = "UPDATE `shows` SET `title`='".$title."',`description`='".$description."',`genre`='".$genre."',`rating`='".$rating."',`trailer_url`='".$trailer_url."',`day`='".$day."',`start_time`='".$start_time."',`end_time`='".$end_time."',`language`='".$language."',`oap`='".$oap."',`type`='".$type."',`img`='".$image."' WHERE id='".$show['id']."'";
		    	print_r($query);die(); 
		        $result   = mysqli_query($con, $query);
		        if ($result) {
					// Display the alert box 
					echo '<script>
					alert("Show Added Successfully.")
					window.location = "catalog.php";
					</script>';
		        } else {  
					// Display the alert box 
					echo '<script>alert("An Error occured. Check your details or contact the Webmaster for a solution.")</script>';
		        }
			} else {
				$query = "UPDATE `shows` SET `title`='".$title."',`description`='".$description."',`genre`='".$genre."',`rating`='".$rating."',`trailer_url`='".$trailer_url."',`day`='".$day."',`start_time`='".$start_time."',`end_time`='".$end_time."',`language`='".$language."',`oap`='".$oap."',`type`='".$type."'WHERE id='".$show['id']."'";
		    	// print_r($query);die(); 

		        $result   = mysqli_query($con, $query);
		        if ($result) {
					// Display the alert box 
					echo '<script>
					alert("Show Updated Successfully.");
					window.location = "details.php?show_id='.$show["id"].'";
					</script>';
		        } else {  
					// Display the alert box 
					echo '<script>alert("An Error occured. Check your details or contact the Webmaster for a solution.")</script>';
		        }
		    }
	    } else {
		    $query    = "SELECT * FROM `shows` WHERE id='$show_id'";
	        $result = mysqli_query($con, $query) or die(mysql_error());
	        $rows = mysqli_num_rows($result);
	        	$show = mysqli_fetch_array($result, MYSQLI_ASSOC);
				$genres = flatten(unserialize($show["genre"]));
				$languages = flatten(unserialize($show["language"]));
				$days = flatten(unserialize($show["day"]));
				// var_dump($genres);die();
			include "includes/header.php";
			include "includes/sidebar.php";

	?>
		<!-- main content -->
		<main class="main">
			<div class="container-fluid">
				<div class="row">
					<!-- main title -->
					<div class="col-12">
						<div class="main__title">
							<h2>Edit <span class="text-secondary"><?= $show['title']; ?></span></h2>
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
												<?php 
													base64_to_jpeg($show["img"], 'tmp.jpg');
												?>
											<img id="form__img" src="tmp.jpg" alt=" ">
										</div>
									</div>
								</div>
							</div>

							<div class="col-12 col-md-7 form__content">
								<div class="row row--form">
									<div class="col-12">
										<label for="title" class="text-secondary">Show Name</label>
										<input type="text" class="form__input" placeholder="<?= $show['title']; ?>" value="<?= $show['title']; ?>" name="title">
									</div>

									<div class="col-12">
										<label for="description" class="text-secondary">Show Description</label>
										<textarea id="text" name="description" class="form__textarea" placeholder="<?= $show['description']; ?>" value="<?= $show['description']; ?>"></textarea>
									</div>

									<!-- <div class="col-12">
										<div class="form__gallery">
											<label id="gallery1" for="form__gallery-upload">Upload photos</label>
											<input data-name="#gallery1" id="form__gallery-upload" name="gallery" class="form__gallery-upload" type="file" accept=".png, .jpg, .jpeg" multiple>
										</div>
									</div> -->
								</div>
							</div>



									<div class="col-12 col-lg-6">
										<div class="widget-wrap">
											<div id="hash"></div>
											<label for="time1" class="text-secondary">Start Time</label>
											<input type="text" id="demoA" class="form__input" placeholder="<?= $show['start_time']; ?>" value="<?= $show['start_time']; ?>" name="start_time" />
										</div>
									</div>

									<div class="col-12 col-lg-6">
										<div class="widget-wrap">
											<div id="hash"></div>
											<label for="time2" class="text-secondary">End Time</label>
											<input type="text" id="demoB" class="form__input" placeholder="<?= $show['end_time']; ?>" value="<?= $show['end_time']; ?>" name="end_time" />
										</div>
									</div>

									<div class="col-12 col-lg-12">
										<label for="genre" class="text-secondary">Please select all relevant genres</label>
										<select class="js-example-basic-multiple" id="genre" multiple="multiple" name="genre[]">
											<option value="News and Events" <?php if (in_array("News and Events", $genres)){ echo "selected"; } ?>>News and Events</option>
											<option value="Sports" <?php if (in_array("Sports", $genres)){ echo "selected"; } ?>>Sports</option>
											<option value="Inspiration/Faith" <?php if (in_array("Inspiration/Faith", $genres)){ echo "selected"; } ?>>Inspiration/Faith</option>
											<option value="Interview" <?php if (in_array("Interview", $genres)){ echo "selected"; } ?>>Interview</option>
											<option value="Education/Information" <?php if (in_array("Education/Information", $genres)){ echo "selected"; } ?>>Education/Information</option>
											<option value="Business" <?php if (in_array("Business", $genres)){ echo "selected"; } ?>>Business</option>
											<option value="Entertainment" <?php if (in_array("Entertainment", $genres)){ echo "selected"; } ?>>Entertainment</option>
											<option value="Comedy" <?php if (in_array("Comedy", $genres)){ echo "selected"; } ?>>Comedy</option>
											<option value="Freeform/Freestyle" <?php if (in_array("Freeform/Freestyle", $genres)){ echo "selected"; } ?>>Freeform/Freestyle</option>
											<option value="Call In/Request Show" <?php if (in_array("Call In/Request Show", $genres)){ echo "selected"; } ?>>Call In/Request Show</option>
											<option value="Breakfast/Morning Show" <?php if (in_array("Breakfast/Morning Show", $genres)){ echo "selected"; } ?>>Breakfast/Morning Show</option>
											<option value="Music Show" <?php if (in_array("Music Show", $genres)){ echo "selected"; } ?>>Music Show</option>
											<option value="Talk Show" <?php if (in_array("Talk Show", $genres)){ echo "selected"; } ?>>Talk Show</option>
											<option value="Specialty/Niche Show" <?php if (in_array("Specialty/Niche Show", $genres)){ echo "selected"; } ?>>Specialty/Niche Show</option>
											<option value="SIPCC Global" <?php if (in_array("SIPCC Global", $genres)){ echo "selected"; } ?>>SIPCC Global</option>
											<option value="Other" <?php if (in_array("Other", $genres)){ echo "selected"; } ?>>Other</option>
										</select>
									</div>

							<div class="col-md-12 col-lg-12">
								<label for="day" class="text-secondary">Please select all relevant days</label>
								<select class="js-example-basic-multiple" id="day" multiple="multiple" name="day[]">
									<option value="Monday" <?php if (in_array("Monday", $days)){ echo "selected"; } ?>>Monday</option>
									<option value="Tuesday" <?php if (in_array("Tuesday", $days)){ echo "selected"; } ?>>Tuesday</option>
									<option value="Wednesday" <?php if (in_array("Wednesday", $days)){ echo "selected"; } ?>>Wednesday</option>
									<option value="Thursday" <?php if (in_array("Thursday", $days)){ echo "selected"; } ?>>Thursday</option>
									<option value="Friday" <?php if (in_array("Friday", $days)){ echo "selected"; } ?>>Friday</option>
									<option value="Saturday" <?php if (in_array("Saturday", $days)){ echo "selected"; } ?>>Saturday</option>
									<option value="Sunday" <?php if (in_array("Sunday", $days)){ echo "selected"; } ?>>Sunday</option>
								</select>
							</div>
							<div class="col-md-12 col-lg-12 float_right">
								<label for="language" class="text-secondary">Please select all relevant languages</label>
								<select class="js-example-basic-multiple" id="language" multiple="multiple" name="language[]">
									<option value="English" <?php if (in_array("English", $languages)){ echo "selected"; } ?>>English</option>
									<option value="Yoruba" <?php if (in_array("Yoruba", $languages)){ echo "selected"; } ?>>Yoruba</option>
									<option value="Igbo" <?php if (in_array("Igbo", $languages)){ echo "selected"; } ?>>Igbo</option>
									<option value="Pidgin" <?php if (in_array("Pidgin", $languages)){ echo "selected"; } ?>>Pidgin</option>
								</select>
							</div>

							<div class="col-md-12 col-lg-4">
								<label for="day" class="text-secondary">Please select the OAP</label>
								<select class="form__input" name="oap">
									<option value="">-- Choose Host/Anchor --</option>
									<?php
										$oap_query = "SELECT oap_name FROM `users` ORDER BY oap_name";
			        					$oap_result = mysqli_query($con, $oap_query) or die(mysql_error());

			        					while ($row = mysqli_fetch_array($oap_result)) {
			        						if ($show['oap'] == $row['oap_name']) {
			        							echo "<option value='" . $row['oap_name'] . "' selected>" . $row['oap_name'] . "</option>";
			        						} else {
										    	echo "<option value='" . $row['oap_name'] . "'>" . $row['oap_name'] . "</option>";
			        						}
										}
									?>
								</select>
							</div>

							<div class="col-md-12 col-lg-4">
								<input type="text" class="form__input" placeholder="Name used on the show" name="character" id="oap_show_name">
							</div>

							<div class="col-md-12 col-lg-4">
								<label for="rating" class="text-secondary">Show Rating</label>
								<input type="number" class="form__input"  placeholder="<?= $show['rating']; ?>" value="<?= $show['rating']; ?>" name="rating" step="0.1">
							</div>

							<div class="col-md-12 col-lg-4">
								<label for="trailer" class="text-secondary">Trailer Url</label>
								<input type="text" class="form__input" placeholder="<?= $show['trailer_url']; ?>" value="<?= $show['trailer_url']; ?>"  name="trailer_url">
							</div>

							<div class="col-md-12 col-lg-4">
									<label for="rating" class="text-secondary">Choose the OAPs Character</label>
								<ul class="form__radio float_left">
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
										<button type="submit" name="update" value="show" class="form__btn float_right">Update</button>
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
		<script language='javascript' type='text/javascript'>
		    function check(input) {
		        if (input.value != document.getElementById('newpass').value) {
		            input.setCustomValidity('Password Must be Matching.');
		        } else {
		            // input is valid -- reset the error message
		            input.setCustomValidity('');
		        }
		    }
		</script>
	</body>
	</html>
	<?php
	} 
} else{
	header("Location: catalog.php");
} ?>