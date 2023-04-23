<?php 
$active = "edit_user";
	//include auth_session.php file on all user panel pages
	include("includes/auth_session.php");
	// var_dump($_SESSION);die();
	require('includes/db.php');

if (isset($_GET['user_id'])) {
	$user_id = $_GET['user_id'];
	// print_r($user_id);die();	
    $query    = "SELECT * FROM `users` WHERE id='$user_id'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
        	$user = mysqli_fetch_array($result, MYSQLI_ASSOC);
        }
	    if (isset($_POST['update']) && $_POST['update'] == "user") {
		// var_dump($_POST);die();
	    	$status = 0;
	        $username = stripslashes($_POST['username']);    // removes backslashes
	        $username = mysqli_real_escape_string($con, $username);
	        $email = $_POST['email'];
	        $first_name = $_POST['firstname'];
	        $oap_name = $_POST['oap_name'];
	        $last_name = $_POST['lastname'];
	        $pos_init = false;
	        $lev_init = false;
	        if (isset($_POST['position'])) {
		        $position = $_POST['position'];
		        $pos_init = true;
	        }
	        if (isset($_POST['level'])) {
		        $level = $_POST['level'];
		        $lev_init = true;
	        }
	        if ($pos_init && $lev_init) {
		        $query = "UPDATE users SET oap_name='".$oap_name."',  email='".$email."', status='".$status."', username='".$username."', first_name='".$first_name."' ,last_name='".$last_name."' ,level='".$level."' ,position='".$position."' WHERE username='".$user['username']."' AND email = '".$user['email']."'";
	        } elseif ($pos_init && $lev_init = false) {
		        $query = "UPDATE users SET oap_name='".$oap_name."',  email='".$email."', status='".$status."', username='".$username."', first_name='".$first_name."' ,last_name='".$last_name."', position='".$position."' WHERE username='".$user['username']."' AND email = '".$user['email']."'";
	        } elseif ($lev_init && $pos_init = false) {
		        $query = "UPDATE users SET oap_name='".$oap_name."',  email='".$email."', status='".$status."', username='".$username."', first_name='".$first_name."' ,last_name='".$last_name."' ,level='".$level."'  WHERE username='".$user['username']."' AND email = '".$user['email']."'";
	        } else {
		        $query = "UPDATE users SET oap_name='".$oap_name."',  email='".$email."', status='".$status."', username='".$username."', first_name='".$first_name."' ,last_name='".$last_name."' WHERE username='".$user['username']."' AND email = '".$user['email']."'";
	        }
	        // var_dump($query); die();
	        $result = mysqli_query($con, $query) or die(mysql_error());
	        if ($result) {
	            $user['username'] = $username;
	                // Retrieve individual field value
	                $user['email'] = $email;
	                $user['oap_name'] = $oap_name;
	                $user['first_name'] = $first_name;
	                $user['last_name'] = $last_name;
	                $user['status'] = $status;

			        if ($pos_init && $lev_init) {	        
			                $user['level'] = $level;
			                $user['position'] = $position;
			        } elseif ($pos_init && $lev_init = false) {
			                $user['position'] = $position;
			        } elseif ($lev_init && $pos_init = false) {
			                $user['level'] = $level;
			        }
	            // Redirect to user dashboard page
	            header("Location: users.php");
	        } else {
	            echo "<div class='form'>
	                  <h3>There was an error.</h3><br/>
	                  <p class='link'>Click here to <a href='edit-user.php'>try</a> again.</p>
	                  </div>";
	        }
	    } else {
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
							<h2>Edit user</h2>
						</div>
					</div>
					<!-- end main title -->

					<!-- profile -->
					<div class="col-12">
						<div class="profile__content">
							<!-- profile user -->
							<div class="profile__user">
								<div class="profile__avatar">
									<img src="img/user.svg" alt="">
								</div>
								<?php 
								$get_status = "";
								if ($user['status'] == 0) {
									$get_status =  "Approved";
								} elseif ($user['status'] > 0) {
									$get_status =  "Blocked";
								}
								?>
								<!-- or red -->
								<div class="profile__meta profile__meta--green">
									<h3><?= $user['first_name']; ?> <?= $user['last_name']; ?><span>&nbsp;&nbsp;&nbsp;(<?= $get_status; ?>)</span></h3>
									<span>GPD Admin ID: 23562</span>
								</div>
							</div>
							<!-- end profile user -->

							<!-- profile tabs nav -->
							<ul class="nav nav-tabs profile__tabs" id="profile__tabs" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Profile</a>
								</li>
							</ul>
							<!-- end profile tabs nav -->

							<!-- profile mobile tabs nav -->
							<div class="profile__mobile-tabs" id="profile__mobile-tabs">
								<div class="profile__mobile-tabs-btn dropdown-toggle" role="navigation" id="mobile-tabs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<input type="button" value="Profile">
									<span></span>
								</div>

								<div class="profile__mobile-tabs-menu dropdown-menu" aria-labelledby="mobile-tabs">
									<ul class="nav nav-tabs" role="tablist">
										<li class="nav-item"><a class="nav-link active" id="1-tab" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Profile</a></li>
									</ul>
								</div>
							</div>
							<!-- end profile mobile tabs nav -->

							<!-- profile btns -->
							<div class="profile__actions">
								<a href="#modal-status3" class="profile__action profile__action--banned open-modal"><i class="icon ion-ios-lock"></i></a>
							</div>
							<!-- end profile btns -->
						</div>
					</div>
					<!-- end profile -->

					<!-- content tabs -->
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
							<div class="col-12">
								<div class="row">
									<!-- details form -->
									<div class="col-12 col-lg-12">
										<form action="#" class="form form--profile" method="post">
											<div class="row row--form">
												<div class="col-12">
													<h4 class="form__title">Profile details</h4>
												</div>

												<div class="col-12 col-md-12 col-lg-12 col-xl-6">
													<div class="form__group">
														<label class="form__label" for="username">Username</label>
														<input id="username" type="text" name="username" class="form__input" placeholder="<?= $user['username']; ?>" value="<?= $user['username']; ?>">
													</div>
												</div>

												<div class="col-12">
													<button class="form__btn" type="submit" name="update" value="user">Update</button>
												</div>
											</div>
										</form>
									</div>
									<!-- end details form -->
								</div>
							</div>	
						</div>
					</div>
					<!-- end content tabs -->
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
    if (isset($_POST['change_password'])) {    	
        $newpass = $_POST['newpass'];
        $confirmpass = $_POST['confirmpass'];
        if ($newpass == $confirmpass) {        	
	        $password = stripslashes($_REQUEST['newpass']);
	        $password = mysqli_real_escape_string($con, $password);
	        $query = "UPDATE users SET password='".$password."'WHERE username='".$_SESSION['username']."'";
	    	// var_dump($query);die();
	        $result = mysqli_query($con, $query) or die(mysql_error());
	        if ($result) {
	            // Redirect to user dashboard page
	            header("Location: includes/logout.php");
	        } else {
	            echo "<div class='form'>
	                  <h3>There was an error.</h3><br/>
	                  <p class='link'>Click here to <a href='edit-user.php'>try</a> again.</p>
	                  </div>";
	        }
        }
    }
    if (isset($_POST['update']) && $_POST['update'] == "user") {
	// var_dump($_POST);die();
	        $username = stripslashes($_POST['username']);    // removes backslashes
	        $username = mysqli_real_escape_string($con, $username);
	    $query = "UPDATE users SET username='".$username."' WHERE username='".$_SESSION['username']."'";
	    // var_dump($query);die();
        $result = mysqli_query($con, $query) or die(mysql_error());
        if ($result) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: index.php");
        } else {
            echo "<div class='form'>
                  <h3>There was an error.</h3><br/>
                  <p class='link'>Click here to <a href='edit-user.php'>try</a> again.</p>
                  </div>";
        }
    } else {
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
						<h2>Edit user</h2>
					</div>
				</div>
				<!-- end main title -->

				<!-- content tabs -->
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
						<div class="col-12">
							<div class="row">
								<!-- details form -->
								<div class="col-12 col-lg-6">
									<form action="#" class="form form--profile" method="post">
										<div class="row row--form">
											<div class="col-12">
												<h4 class="form__title">Profile details</h4>
											</div>

											<div class="col-12 col-md-12 col-lg-12 col-xl-6">
												<div class="form__group">
													<label class="form__label" for="username">Username</label>
													<input id="username" type="text" name="username" class="form__input" placeholder="<?= $_SESSION['username']; ?>" value="<?= $_SESSION['username']; ?>">
												</div>
											</div>

											<div class="col-12">
												<button class="form__btn" type="submit" name="update" value="user">Update</button>
											</div>
										</div>
									</form>
								</div>
								<!-- end details form -->

								<!-- password form -->
								<div class="col-12 col-lg-6">
									<form action="#" class="form form--profile" method="post">
										<div class="row row--form">
											<div class="col-12">
												<h4 class="form__title">Change password</h4>
											</div>

											<div class="col-12 col-md-12 col-lg-12 col-xl-6">
												<div class="form__group">
													<label class="form__label" for="newpass">New Password</label>
													<input id="newpass" type="password" name="newpass" class="form__input">
												</div>
											</div>

											<div class="col-12 col-md-12 col-lg-12 col-xl-6">
												<div class="form__group">
													<label class="form__label" for="confirmpass">Confirm New Password</label>
													<input id="confirmpass" type="password" name="confirmpass" class="form__input" oninput="check(this)" >
												</div>
											</div>

											<div class="col-12">
												<button class="form__btn" type="submit" name="change_password">Change</button>
											</div>
										</div>
									</form>
								</div>
								<!-- end password form -->
							</div>
						</div>	
					</div>
				</div>
				<!-- end content tabs -->
			</div>
		</div>
	</main>
	<!-- end main content -->

	<!-- modal status -->
	<div id="modal-status3" class="zoom-anim-dialog mfp-hide modal">
		<h6 class="modal__title">Status change</h6>

		<p class="modal__text">Are you sure you want to lock this Anchor? <br> This disables the account.</p>

		<div class="modal__btns">
			<button class="modal__btn modal__btn--apply" type="button" href="lock-user.php?user_id=<?= $row["id"]; ?>">Apply</button>
			<button class="modal__btn modal__btn--dismiss" type="button">Dismiss</button>
		</div>
	</div>
	<!-- end modal status -->

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
<?php } } ?>