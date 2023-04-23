<?php 

if (isset($_GET['show_id'])) {
	$show_id = $_GET['show_id'];
	//include auth_session.php file on all user panel pages
	include("includes/auth_session.php");
	require('includes/db.php');

	$show_num_query    = "SELECT * FROM `shows` WHERE id='$show_id'";
	$show_num_result = mysqli_query($con, $show_num_query) or die(mysql_error());
	$show = mysqli_fetch_array($show_num_result, MYSQLI_ASSOC);
	// var_dump($show);die();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- CSS -->
	<link rel="stylesheet" href="css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/ionicons.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/plyr.css">
	<link rel="stylesheet" href="css/photoswipe.css">
	<link rel="stylesheet" href="css/default-skin.css">
	<link rel="stylesheet" href="css/main.css">
	<!-- <link rel="stylesheet" href="css/admin.css"> -->

	<!-- Favicons -->
	<link rel="icon" type="image/png" href="icon/favicon-32x32.png" sizes="32x32">
	<link rel="apple-touch-icon" href="icon/favicon-32x32.png">

	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Dmitry Volkov">
	<title><?= $show["title"]; ?> - GPD Admin</title>
</head>

<body class="body">
	<!-- header -->
	<header class="header">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="header__content">
						<!-- header logo -->
						<a href="index-2.html" class="header__logo">
							<img src="img/logo.png" alt="">
						</a>
						<!-- end header logo -->

						<!-- header nav -->
			<ul class="header__nav">
				<li class="header__nav-item">
					<a href="index.php" class="header__nav-link "><span>Dashboard</span></a>
				</li>

				<li class="header__nav-item">
					<a href="catalog.php" class="header__nav-link "><span>All Shows</span></a>
				</li>

				<!-- collapse -->
				<li class="header__nav-item">
					<a class="dropdown-toggle header__nav-link" href="#" role="button" id="dropdownMenuHome" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span>Edit</span> <i class="icon ion-ios-arrow-down"></i></a>

					<ul class="dropdown-menu header__dropdown-menu" aria-labelledby="dropdownMenuHome">
						<li><a class="" href="add-item.php">Add show</a></li>
						<li><a class="" href="edit-user.php">Edit user</a></li>
						<li><a class="" href="signup.php">Add User</a></li>
					</ul>
				</li>
				<!-- end collapse -->

				<li class="header__nav-item">
					<a href="users.php" class="header__nav-link "><span>Users</span></a>
				</li>
			</ul>
						<!-- end header nav -->

						<!-- header menu btn -->
						<button class="header__btn" type="button">
							<span></span>
							<span></span>
							<span></span>
						</button>
						<!-- end header menu btn -->
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- end header -->

	<!-- details -->
	<section class="section section--details section--bg" data-bg="img/section/details.jpg">
		<!-- details content -->
		<div class="container">
			<div class="row">
				<!-- title -->
				<div class="col-12">
					<h1 class="section__title section__title--mb"><?= $show["title"]; ?></h1>
				</div>
				<!-- end title -->

				<!-- content -->
				<div class="col-12 col-xl-6">
					<div class="card card--details">
						<div class="row">
							<!-- card cover -->
							<div class="col-12 col-sm-5 col-md-4 col-lg-3 col-xl-5">
								<div class="card__cover avatar_img">
									<?php 
									base64_to_jpeg($show["img"], 'tmp.jpg');
									?>
									<img src="tmp.jpg" alt="">
									<span class="card__rate card__rate--green"><?= $show["rating"]; ?></span>
								</div>
								<a href="<?= $show['trailer_url']; ?>" class="card__trailer"><i class="icon ion-ios-play-circle"></i> Trailer Sample</a>
							</div>
							<!-- end card cover -->

							<!-- card content -->
							<div class="col-12 col-md-8 col-lg-9 col-xl-7">
								<div class="card__content">
									<ul class="card__meta">
										<li><span><?= $show["type"]; ?>:</span> <?= $show["oap_show_name"]; ?></li>
										<?php
										$days = flatten(unserialize($show["day"]));
										// print_r($days);die();
										$day = implode(', ', array_values($days));
										?>
										<li><span>Day(s):</span> <?= $day; ?></a> </li>
										<li><span>Time:</span> <?= $show["start_time"]; ?> - <?= $show["end_time"]; ?></li>
										<?php
											$dateTimeObject1 = date_create($show["start_time"]); 
											$dateTimeObject2 = date_create($show["end_time"]);
  
											$difference = date_diff($dateTimeObject1, $dateTimeObject2); 
											$minutes = $difference->days * 24 * 60;
											$minutes += $difference->h * 60;
											$minutes += $difference->i;


										?>
										<li><span>Running time:</span><?= $minutes; ?> mins</li>
										<?php
										$genres = flatten(unserialize($show["genre"]));
										// print_r($genres);die();
										$genre = implode(', ', array_values($genres));
										?>
										<li><span>Genre:</span> <?= $genre; ?></li>
										<?php
										$languages = flatten(unserialize($show["language"]));
										// print_r($languages);die();
										$language = implode(', ', array_values($languages));
										?>
										<li><span>Languages:</span> <?= $language; ?></li>
										<a href="edit-show.php?show_id=<?= $show["id"]; ?>" class="card__trailer"><i class="icon ion-ios-create text-lblue"></i> Edit</a>
									</ul>
									<div class="card__description">
									<?= $show["description"]; ?>
									</div>
								</div>
							</div>
							<!-- end card content -->
						</div>
					</div>
				</div>
				<!-- end content -->

				<!-- player -->
				<div class="col-12 col-xl-6">
					<video controls crossorigin playsinline poster="video/station_bumper.png" id="player">
						<!-- Video files -->
						<!-- <source src="video/station_bumper.mp4" type="video/mp4" size="576"> -->
						<source src="video/station_bumper.mp4" type="video/mp4" size="720">
						<source src="video/station_bumper_hd.mp4" type="video/mp4" size="1080">

						<!-- Caption files -->
						<track kind="captions" label="English" srclang="en" src="video/english.srt"
						    default>
						<track kind="captions" label="Français" srclang="fr" src="#">

						<!-- Fallback for browsers that don't support the <video> element -->
						<a href="video/station_bumper.mp4" download>Download</a>
					</video>
				</div>
				<!-- end player -->
			</div>
		</div>
		<!-- end details content -->
	</section>
	<!-- end details -->

	<!-- footer -->
	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="footer__content">
						<a href="index-2.html" class="footer__logo">
							<img src="img/logo.png" alt="">
						</a>

						<span class="footer__copyright">© GPD Admin, 2022. <br> Created by <a href="#" target="_blank">Psyche</a></span>

						<nav class="footer__nav">
							<a href="about.html">About Us</a>
							<a href="contacts.html">Contacts</a>
							<a href="privacy.html">Privacy policy</a>
						</nav>

						<button class="footer__back" type="button">
							<i class="icon ion-ios-arrow-round-up"></i>
						</button>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- end footer -->

	<!-- Root element of PhotoSwipe. Must have class pswp. -->
	<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

		<!-- Background of PhotoSwipe. 
		It's a separate element, as animating opacity is faster than rgba(). -->
		<div class="pswp__bg"></div>

		<!-- Slides wrapper with overflow:hidden. -->
		<div class="pswp__scroll-wrap">

			<!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
			<!-- don't modify these 3 pswp__item elements, data is added later on. -->
			<div class="pswp__container">
				<div class="pswp__item"></div>
				<div class="pswp__item"></div>
				<div class="pswp__item"></div>
			</div>

			<!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
			<div class="pswp__ui pswp__ui--hidden">

				<div class="pswp__top-bar">

					<!--  Controls are self-explanatory. Order can be changed. -->

					<div class="pswp__counter"></div>

					<button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

					<button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

					<!-- Preloader -->
					<div class="pswp__preloader">
						<div class="pswp__preloader__icn">
							<div class="pswp__preloader__cut">
								<div class="pswp__preloader__donut"></div>
							</div>
						</div>
					</div>
				</div>

				<button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>

				<button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>

				<div class="pswp__caption">
					<div class="pswp__caption__center"></div>
				</div>
			</div>
		</div>
	</div>

	<!-- JS -->
	<script src="js/jquery-3.5.1.min.js"></script>
	<script src="css/custom-details.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<!-- <script src="js/jquery.magnific-popup.min.js"></script> -->
	<script src="js/jquery.mousewheel.min.js"></script>
	<script src="js/jquery.mCustomScrollbar.min.js"></script>
	<script src="js/wNumb.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/plyr.min.js"></script>
	<script src="js/photoswipe.min.js"></script>
	<script src="js/photoswipe-ui-default.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
<?php
} else {
	header("Location: catalog.php");
}
?>