<?php 
$active = "tersstar";
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
						<h2>Ters Star Info</h2>

					</div>
				</div>
				<!-- end main title -->
				<!-- stats -->
				<div class="col-12 col-sm-6 col-lg-6">
					<div class="stats">
						<span>Registered Schools</span>
						<?php
						$show_num_query    = "SELECT * FROM `schools`";
						$show_num_result = mysqli_query($conn, $show_num_query) or die(mysql_error());
						$show_num = mysqli_num_rows($show_num_result);
						?>
						<p><?= $show_num; ?></p>
						<i class="icon ion-ios-build"></i>
					</div>
				</div>
				<!-- end stats -->
				<!-- stats -->
				<div class="col-12 col-sm-6 col-lg-3">
					<div class="stats">
						<span>Registered Students</span>
						<?php
						$show_num_query    = "SELECT * FROM `students`";
						$show_num_result = mysqli_query($conn, $show_num_query) or die(mysql_error());
						$show_num = mysqli_num_rows($show_num_result);
						?>
						<p><?= $show_num; ?></p>
						<i class="icon ion-ios-person"></i>
					</div>
				</div>
				<!-- end stats -->

				<!-- stats -->
				<div class="col-12 col-sm-6 col-lg-3">
					<div class="stats">
						<span>Information Ministers</span>
						<?php
						$syn_num_query    = "SELECT * FROM `schools`";
						$syn_num_result = mysqli_query($conn, $syn_num_query) or die(mysql_error());
						$syn_num = mysqli_num_rows($syn_num_result);
						?>
						<p><?= $syn_num; ?></p>
						<i class="icon ion-ios-stats"></i>
					</div>
				</div>
				<!-- end stats -->

				<!-- dashbox -->
				<div class="col-12">
					<div class="dashbox">
						<div class="dashbox__title">
							<h3><i class="icon ion-ios-stats"></i> Registered Schools</h3>

							<div class="dashbox__wrap">
								<a class="dashbox__refresh" href="#"><i class="icon ion-ios-refresh"></i></a>
							</div>
						</div>

						<div class="dashbox__table-wrap">
							<table class="main__table main__table--dash">
								<thead>
								<tr>
									<th>ID</th>
									<th>SCHOOL NAME</th>
									<th>SCHOOL'S LOGO</th>
									<th>SCHOOL'S ADDRESS</th>
									<th>SCHOOL'S EMAIL</th>
									<th>SCHOOL'S PHONE NO</th>
									<th>PROPRIETOR'S NAME</th>
									<th>PROPRIETOR'S EMAIL</th>
									<th>REGISTRATION DATE</th>
									<th>REGISTRATION TIME</th>
								</tr>
								</thead>

							<tbody>
								<?php
		        						$x = 1;
									$user_query = "SELECT * FROM `users` ORDER BY id";
		        					$user_result = mysqli_query($conn, $user_query) or die(mysql_error());

		        					while ($user = mysqli_fetch_array($user_result)) {
		        				?>
								<tr>

									<td>
										<div class="main__table-text"><?= $x; ?></div>
									</td>
									<td>
										<div class="main__table-text"><?= $user["school_name"]; ?></div>
									</td>
									<td>
											<?php 
												$school_query = "SELECT * FROM `schools` WHERE school_id='".$user['id']."'";
					        					$school_result = mysqli_query($conn, $school_query) or die(mysql_error());
												$school_num = mysqli_num_rows($school_result);
					        					if ($school_num > 0) {					        						
						        					while ($school = mysqli_fetch_array($school_result)) {
						        						$logo =  $school["logo"];
						        					}
					        					}
					        				?>
												<?php 
												if (isset($logo)) {												
													base64_to_jpeg($logo, 'tmpsch'.$user["id"].'.jpg');
												?>
											
													<div class="main__table-text"><img id="form__img" src="tmpsch<?= $user['id'] ?>.jpg" alt=" " width="50px"></div>
												<?php
												}
												else {
													?>
											
													<div class="main__table-text">Not Set</div>
												<?php } ?>

									</td>


									<td>
										<div class="main__table-text">
											<?php 
												$school_query = "SELECT * FROM `schools` WHERE school_id='".$user['id']."'";
					        					$school_result = mysqli_query($conn, $school_query) or die(mysql_error());
												$school_num = mysqli_num_rows($school_result);
					        					if ($school_num > 0) {
						        					while ($school = mysqli_fetch_array($school_result)) {
						        						echo $school["address"];
						        					}
					        					} else {
					        						echo 'Not Set';
					        					}
					        				?>
					        			</div>
									</td>

									<td>
										<div class="main__table-text">
											<?= $user["email"]; ?>
					        			</div>
									</td>

									<td>
										<div class="main__table-text">
											<?php 
												$school_query = "SELECT * FROM `schools` WHERE school_id='".$user['id']."'";
					        					$school_result = mysqli_query($conn, $school_query) or die(mysql_error());
												$school_num = mysqli_num_rows($school_result);
					        					if ($school_num > 0) {
						        					while ($school = mysqli_fetch_array($school_result)) {
						        						echo $school["phone"];
						        					}
					        					} else {
					        						echo 'Not Set';
					        					}
					        				?>
					        			</div>
									</td>

									<td>
										<div class="main__table-text">
											<?php 
												$school_query = "SELECT * FROM `schools` WHERE school_id='".$user['id']."'";
					        					$school_result = mysqli_query($conn, $school_query) or die(mysql_error());
												$school_num = mysqli_num_rows($school_result);
					        					if ($school_num > 0) {
						        					while ($school = mysqli_fetch_array($school_result)) {
						        						echo $school["prop_name"];
						        					}
					        					} else {
					        						echo 'Not Set';
					        					}

					        				?>
					        			</div>
									</td>

									<td>
										<div class="main__table-text">
											<?php 
												$school_query = "SELECT * FROM `schools` WHERE school_id='".$user['id']."'";
					        					$school_result = mysqli_query($conn, $school_query) or die(mysql_error());
												$school_num = mysqli_num_rows($school_result);
					        					if ($school_num > 0) {			
						        					while ($school = mysqli_fetch_array($school_result)) {
						        						echo $school["prop_email"];
						        					}
					        					} else {
					        						echo 'Not Set';
					        					}

					        				?>
					        			</div>
									</td>

									<td>
										<div class="main__table-text">
											<?php 
													$date=date_create($user["created_at"]);
					        						echo date_format($date,"d/m/Y");
					        				?>
					        			</div>
									</td>

									<td>
										<div class="main__table-text">

											<?php 
													$date=date_create($user["created_at"]);
					        						echo date_format($date,"H:i:s");
					        				?>
					        			</div>
									</td>
								</tr>
							<?php 
		        					$x++;	} ?>
								
							</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- end dashbox -->

				<!-- dashbox -->
				<div class="col-12">
					<div class="dashbox">
						<div class="dashbox__title">
							<h3><i class="icon ion-ios-person"></i> Registered Students</h3>

							<div class="dashbox__wrap">
								<a class="dashbox__refresh" href="#"><i class="icon ion-ios-refresh"></i></a>
							</div>
						</div>

						<div class="dashbox__table-wrap">
							<table class="main__table main__table--dash">
								<thead>
								<tr>
									<th>ID</th>
									<th>SCHOOL</th>
									<th>PASSPORT</th>
									<th>NAME</th>
									<th>AGE</th>
									<th>ADDRESS</th>
									<th>CLASS</th>
									<th>HOBBIES</th>
									<th>BEST FOOD</th>
									<th>BEST SUBJECT</th>
									<th>FUTURE AMBITION</th>
								</tr>
								</thead>

							<tbody>
								<?php
		        						$x = 1;
									$user_query = "SELECT * FROM `students` ORDER BY school_id";
		        					$user_result = mysqli_query($conn, $user_query) or die(mysql_error());

		        					while ($student = mysqli_fetch_array($user_result)) {
		        				?>
								<tr>

									<td>
										<div class="main__table-text"><?= $x; ?></div>
									</td>
									<td>
										<div class="main__table-text">
											<?php 
												$school_query = "SELECT * FROM `users` WHERE id='".$student['school_id']."'";
					        					$school_result = mysqli_query($conn, $school_query) or die(mysql_error());

					        					while ($user = mysqli_fetch_array($school_result)) {
					        						echo $user["school_name"];
					        					}
					        				?>
					        			</div>
									</td>

									<td>
												<?php 
													base64_to_jpeg($student["passport"], 'tmp'.$student["id"].'.jpg');
												?>
											
										<div class="main__table-text"><img id="form__img" src="tmp<?= $student['id'] ?>.jpg" alt=" " width="50px"></div>
									</td>

									<td>
										<div class="main__table-text"><?= $student["name"]; ?></div>
									</td>

									<td>
										<div class="main__table-text"><?= $student["age"]; ?></div>
									</td>

									<td>
										<div class="main__table-text"><?= $student["address"]; ?></div>
									</td>

									<td>
										<div class="main__table-text"><?= $student["class"]; ?></div>
									</td>

									<td>
										<div class="main__table-text"><?= $student["hobbies"]; ?></div>
									</td>

									<td>
										<div class="main__table-text"><?= $student["best_food"]; ?></div>
									</td>

									<td>
										<div class="main__table-text"><?= $student["best_subject"]; ?></div>
									</td>

									<td>
										<div class="main__table-text"><?= $student["future_ambition"]; ?></div>
									</td>
								</tr>
							<?php 
		        				$x++;		} ?>
								
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
							<h3><i class="icon ion-ios-contacts"></i> Information Ministers</h3>

							<div class="dashbox__wrap">
								<a class="dashbox__refresh" href="#"><i class="icon ion-ios-refresh"></i></a>
							</div>
						</div>

						<div class="dashbox__table-wrap">
							<table class="main__table main__table--dash">
								<thead>
									<tr>
										<th>SCHOOL</th>
										<th>IMG</th>
										<th>NAME</th>
										<th>ROLE</th>
										<th>POSITION</th>
										<th>PHONE</th>
										<th>EMAIL</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$user_query = "SELECT * FROM `ministers` ORDER BY name";
										// var_dump($user_query);
			        					$user_result = mysqli_query($conn, $user_query) or die(mysql_error());

			        					while ($row = mysqli_fetch_array($user_result)) {
			        				?>

									<tr>
									<td>
										<div class="main__table-text">
											<?php 
												$school_query = "SELECT * FROM `users` WHERE id='".$row['school_id']."'";
					        					$school_result = mysqli_query($conn, $school_query) or die(mysql_error());

					        					while ($user = mysqli_fetch_array($school_result)) {
					        						echo $user["school_name"];
					        					}
					        				?>
					        			</div>
									</td>
										<td>
												<?php 
													base64_to_jpeg($row["passport"], 'teacher'.$row["id"].'.jpg');
												?>
											
										<div class="main__table-text"><img id="form__img" src="teacher<?= $row['id'] ?>.jpg" alt=" " width="27px"></div>
										</td>
										<td>
											<div class="main__table-text"><?= $row["name"]; ?></div>
										</td>
										<td>
											<div class="main__table-text"><?= $row["role"]; ?></div>
										</td>
										<td>
											<div class="main__table-text"><?= $row["position"]; ?></div>
										</td>
										<td>
											<div class="main__table-text"><?= $row["phone"]; ?></div>
										</td>
										<td>
											<div class="main__table-text"><?= $row["email"]; ?></div>
										</td>
									</tr>
									<?php
			        						}
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
							<h3><i class="icon ion-ios-trophy"></i> Representatives</h3>

							<div class="dashbox__wrap">
								<a class="dashbox__refresh" href="#"><i class="icon ion-ios-refresh"></i></a>
							</div>
						</div>

						<div class="dashbox__table-wrap">
							<table class="main__table main__table--dash">
								<thead>
									<tr>
										<th>ID</th>
										<th>TITLE</th>
										<th>NAME</th>
										<th>SCHOOL</th>
										<th>AGE</th>
										<th>ADDRESS</th>
										<th>CLASS</th>
										<th>HOBBIES</th>
										<th>BEST FOOD</th>
										<th>BEST SUBJECT</th>
										<th>FUTURE AMBITION</th>
										<th>PASSPORT</th>
									</tr>
								</thead>

							<tbody>
								<?php
		        						$x = 1;
									$user_query = "SELECT * FROM `students` WHERE captain > 0 ORDER BY name";
		        					$user_result = mysqli_query($conn, $user_query) or die(mysql_error());

		        					while ($student = mysqli_fetch_array($user_result)) {
		        				?>
								<tr>

									<td>
										<div class="main__table-text"><?= $x; ?></div>
									</td>

									<td>										
										<div class="main__table-text secondary_color text-bold">Captain</div>
									</td>

									<td>
										<div class="main__table-text"><?= $student["name"]; ?></div>
									</td>
									<td>
										<div class="main__table-text">
											<?php 
												$school_query = "SELECT * FROM `users` WHERE id='".$student['school_id']."'";
					        					$school_result = mysqli_query($conn, $school_query) or die(mysql_error());

					        					while ($user = mysqli_fetch_array($school_result)) {
					        						echo $user["school_name"];
					        					}
					        				?>
					        			</div>
									</td>

									<td>
										<div class="main__table-text"><?= $student["age"]; ?></div>
									</td>

									<td>
										<div class="main__table-text"><?= $student["address"]; ?></div>
									</td>

									<td>
										<div class="main__table-text"><?= $student["class"]; ?></div>
									</td>

									<td>
										<div class="main__table-text"><?= $student["hobbies"]; ?></div>
									</td>

									<td>
										<div class="main__table-text"><?= $student["best_food"]; ?></div>
									</td>

									<td>
										<div class="main__table-text"><?= $student["best_subject"]; ?></div>
									</td>

									<td>
										<div class="main__table-text"><?= $student["future_ambition"]; ?></div>
									</td>

									<td>
												<?php 
													base64_to_jpeg($student["passport"], 'captain'.$student["id"].'.jpg');
												?>
											
										<div class="main__table-text"><img id="form__img" src="captain<?= $student['id'] ?>.jpg" alt=" " width="27px"></div>
									</td>
								</tr>
							<?php 
		        						} ?>
								<?php
									$user_query = "SELECT * FROM `students` WHERE quiz > 0 ORDER BY name";
		        					$user_result = mysqli_query($conn, $user_query) or die(mysql_error());

		        					while ($student = mysqli_fetch_array($user_result)) {
		        						$x++;
		        				?>
								<tr>

									<td>
										<div class="main__table-text"><?= $x; ?></div>
									</td>

									<td>										
										<div class="main__table-text secondary_color text-bold">Quiz Student</div>
									</td>

									<td>
										<div class="main__table-text"><?= $student["name"]; ?></div>
									</td>
									<td>
										<div class="main__table-text">
											<?php 
												$school_query = "SELECT * FROM `users` WHERE id='".$student['school_id']."'";
					        					$school_result = mysqli_query($conn, $school_query) or die(mysql_error());

					        					while ($user = mysqli_fetch_array($school_result)) {
					        						echo $user["school_name"];
					        					}
					        				?>
					        			</div>
									</td>

									<td>
										<div class="main__table-text"><?= $student["age"]; ?></div>
									</td>

									<td>
										<div class="main__table-text"><?= $student["address"]; ?></div>
									</td>

									<td>
										<div class="main__table-text"><?= $student["class"]; ?></div>
									</td>

									<td>
										<div class="main__table-text"><?= $student["hobbies"]; ?></div>
									</td>

									<td>
										<div class="main__table-text"><?= $student["best_food"]; ?></div>
									</td>

									<td>
										<div class="main__table-text"><?= $student["best_subject"]; ?></div>
									</td>

									<td>
										<div class="main__table-text"><?= $student["future_ambition"]; ?></div>
									</td>

									<td>
												<?php 
													base64_to_jpeg($student["passport"], 'quiz'.$student["id"].'.jpg');
												?>
											
										<div class="main__table-text"><img id="form__img" src="quiz<?= $student['id'] ?>.jpg" alt=" " width="27px"></div>
									</td>
								</tr>
							<?php } ?>
								<?php
									$user_query = "SELECT * FROM `students` WHERE debate > 0 ORDER BY name";
		        					$user_result = mysqli_query($conn, $user_query) or die(mysql_error());

		        					while ($student = mysqli_fetch_array($user_result)) {
		        						$x++;
		        				?>
								<tr>

									<td>
										<div class="main__table-text"><?= $x; ?></div>
									</td>

									<td>										
										<div class="main__table-text secondary_color text-bold">Debate Student</div>
									</td>

									<td>
										<div class="main__table-text"><?= $student["name"]; ?></div>
									</td>

									<td>
										<div class="main__table-text">
											<?php 
												$school_query = "SELECT * FROM `users` WHERE id='".$student['school_id']."'";
					        					$school_result = mysqli_query($conn, $school_query) or die(mysql_error());

					        					while ($user = mysqli_fetch_array($school_result)) {
					        						echo $user["school_name"];
					        					}
					        				?>
					        			</div>
									</td>
									<td>
										<div class="main__table-text"><?= $student["age"]; ?></div>
									</td>

									<td>
										<div class="main__table-text"><?= $student["address"]; ?></div>
									</td>

									<td>
										<div class="main__table-text"><?= $student["class"]; ?></div>
									</td>

									<td>
										<div class="main__table-text"><?= $student["hobbies"]; ?></div>
									</td>

									<td>
										<div class="main__table-text"><?= $student["best_food"]; ?></div>
									</td>

									<td>
										<div class="main__table-text"><?= $student["best_subject"]; ?></div>
									</td>

									<td>
										<div class="main__table-text"><?= $student["future_ambition"]; ?></div>
									</td>

									<td>
												<?php 
													base64_to_jpeg($student["passport"], 'debate'.$student["id"].'.jpg');
												?>
											
										<div class="main__table-text"><img id="form__img" src="debate<?= $student['id'] ?>.jpg" alt=" " width="27px"></div>
									</td>
								</tr>
							<?php } ?>
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