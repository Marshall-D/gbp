<?php
$act = " sidebar__nav-link--active";
?>

	<?php

		if (isset($_GET["iframe"]) && isset($_GET["iframe"]) == "1") {
			
		} else{

	?>
	<!-- sidebar -->
	<div class="sidebar">
		<!-- sidebar logo -->
		<a href="index.php" class="sidebar__logo">
			<img src="img/logo.png" alt="">
		</a>
		<!-- end sidebar logo -->
		
		<!-- sidebar user -->
		<div class="sidebar__user">
			<div class="sidebar__user-img">
				<img src="img/user.svg" alt="">
			</div>

			<div class="sidebar__user-title">
				<!-- <span><?= $_SESSION['position']; ?></span> -->
				<!-- <p><?php echo ucfirst($_SESSION['oap_name']); ?></p> -->
			</div>
			<a href="includes/logout.php" class="logout_btn">
				<button class="sidebar__user-btn" type="button">
					<i class="icon ion-ios-log-out"></i>
				</button>
			</a>
				
		</div>
		<!-- end sidebar user -->

		<!-- sidebar nav -->
		<div class="sidebar__nav-wrap">
			<ul class="sidebar__nav">
				<li class="sidebar__nav-item">
					<a href="index.php" class="sidebar__nav-link <?php if ($active == 'dashboard') { echo $act; } ?>"><i class="icon ion-ios-keypad"></i> <span>Dashboard</span></a>
				</li>


				<!-- collapse -->
				<li class="sidebar__nav-item">
					<a class="sidebar__nav-link <?php if ($active == 'add_user' || $active == 'edit_user') { echo $act; } ?>" data-toggle="collapse" href="#collapseMenu" role="button" aria-expanded="false" aria-controls="collapseMenu"><i class="icon ion-ios-paper-plane"></i> <span>Shipper</span> <i class="icon ion-md-arrow-dropdown"></i></a>

					<ul class="collapse sidebar__menu" id="collapseMenu">
						<li><a href="add-shipper.php" class="<?php if ($active == 'add_shipper') { echo "active"; } ?>"><i class="icon ion-ios-person-add"></i> <span>Add Shipper</span></a></li>
						<li><a href="all-shippers.php" class="<?php if ($active == 'all_shippers') { echo "active"; } ?>"><i class="icon ion-ios-person"></i> <span>All Shippers</span></a></li>
					</ul>
				</li>
				<!-- end collapse -->

				<li class="sidebar__nav-item">
					<a href="add-shipment.php" class="sidebar__nav-link <?php if ($active == 'add_shipment') { echo $act; } ?>"><i class="icon ion-ios-add-circle-outline"></i> <span>Add Shipment</span></a>
				</li>

				<li class="sidebar__nav-item">
					<a href="all-shipments.php" class="sidebar__nav-link <?php if ($active == 'all_shipments') { echo $act; } ?>"><i class="icon ion-ios-airplane"></i> <span>All Shipments</span></a>
				</li>

				<li class="sidebar__nav-item">
					<a href="edit-user.php" class="sidebar__nav-link <?php if ($active == 'edit_user') { echo $act; } ?>"><i class="icon ion-ios-ribbon"></i> <span>Edit User</span></a>
				</li>
			</ul>
		</div>
		<!-- end sidebar nav -->
		
		<!-- sidebar copyright -->
		<div class="sidebar__copyright">© GPD Admin, 2022. <br>Created by <a href="https://themeforest.net/user/dmitryvolkov/portfolio" target="_blank">Psyche</a></div>
		<!-- end sidebar copyright -->
	</div>
	<!-- end sidebar -->
	<?php } ?>