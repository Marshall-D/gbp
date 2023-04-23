<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- CSS -->
	<link rel="stylesheet" href="css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" href="css/select2.min.css">
	<link rel="stylesheet" href="css/ionicons.min.css">
	<link rel="stylesheet" href="css/admin.css">

	<!-- Favicons -->
	<link rel="icon" type="image/png" href="icon/favicon-32x32.png" sizes="32x32">
	<link rel="apple-touch-icon" href="icon/favicon-32x32.png">

	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Psyche">
	<title>GPD Admin</title>

</head>
<body>
	<!-- header -->
	<header class="header">
		<div class="header__content">
			<!-- header logo -->
			<a href="index.php" class="header__logo">
				<img src="img/logo.png" alt="">
			</a>
			<!-- end header logo -->

			<!-- header menu btn -->
			<button class="header__btn" type="button">
				<span></span>
				<span></span>
				<span></span>
			</button>
			<!-- end header menu btn -->
		</div>
	</header>
	<!-- end header -->

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
				<span>Admin</span>
				<p>John Doe</p>
			</div>

			<button class="sidebar__user-btn" type="button">
				<i class="icon ion-ios-log-out"></i>
			</button>
		</div>
		<!-- end sidebar user -->

		<!-- sidebar nav -->
		<div class="sidebar__nav-wrap">
			<ul class="sidebar__nav">
				<li class="sidebar__nav-item">
					<a href="index.php" class="sidebar__nav-link"><i class="icon ion-ios-keypad"></i> <span>Dashboard</span></a>
				</li>

				<li class="sidebar__nav-item">
					<a href="catalog.php" class="sidebar__nav-link"><i class="icon ion-ios-film"></i> <span>Catalog</span></a>
				</li>

				<!-- collapse -->
				<li class="sidebar__nav-item">
					<a class="sidebar__nav-link" data-toggle="collapse" href="#collapseMenu" role="button" aria-expanded="false" aria-controls="collapseMenu"><i class="icon ion-ios-copy"></i> <span>Pages</span> <i class="icon ion-md-arrow-dropdown"></i></a>

					<ul class="collapse sidebar__menu" id="collapseMenu">
						<li><a href="add-item.php">Add item</a></li>
						<li><a href="edit-user.php">Edit user</a></li>
						<li><a href="signin.php">Sign in</a></li>
						<li><a href="signup.php">Sign up</a></li>
						<li><a href="forgot.php">Forgot password</a></li>
						<li><a href="404.php">404 page</a></li>
					</ul>
				</li>
				<!-- end collapse -->

				<li class="sidebar__nav-item">
					<a href="users.php" class="sidebar__nav-link"><i class="icon ion-ios-contacts"></i> <span>Users</span></a>
				</li>

				<li class="sidebar__nav-item">
					<a href="comments.php" class="sidebar__nav-link"><i class="icon ion-ios-chatbubbles"></i> <span>Comments</span></a>
				</li>

				<li class="sidebar__nav-item">
					<a href="reviews.php" class="sidebar__nav-link sidebar__nav-link--active"><i class="icon ion-ios-star-half"></i> <span>Reviews</span></a>
				</li>

				<li class="sidebar__nav-item">
					<a href="https://dmitryvolkov.me/demo/GPD Admin2.1/main/index.php" class="sidebar__nav-link"><i class="icon ion-ios-arrow-round-back"></i> <span>Back to GPD Admin</span></a>
				</li>
			</ul>
		</div>
		<!-- end sidebar nav -->
		
		<!-- sidebar copyright -->
		<div class="sidebar__copyright">© GPD Admin, 2019—2021. <br>Create by <a href="https://themeforest.net/user/dmitryvolkov/portfolio" target="_blank">Psyche</a></div>
		<!-- end sidebar copyright -->
	</div>
	<!-- end sidebar -->

	<!-- main content -->
	<main class="main">
		<div class="container-fluid">
			<div class="row">
				<!-- main title -->
				<div class="col-12">
					<div class="main__title">
						<h2>Reviews</h2>

						<span class="main__title-stat">9,071 Total</span>

						<div class="main__title-wrap">
							<!-- filter sort -->
							<div class="filter" id="filter__sort">
								<span class="filter__item-label">Sort by:</span>

								<div class="filter__item-btn dropdown-toggle" role="navigation" id="filter-sort" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<input type="button" value="Date created">
									<span></span>
								</div>

								<ul class="filter__item-menu dropdown-menu scrollbar-dropdown" aria-labelledby="filter-sort">
									<li>Date created</li>
									<li>Rating</li>
								</ul>
							</div>
							<!-- end filter sort -->

							<!-- search -->
							<form action="#" class="main__title-form">
								<input type="text" placeholder="Key word..">
								<button type="button">
									<i class="icon ion-ios-search"></i>
								</button>
							</form>
							<!-- end search -->
						</div>
					</div>
				</div>
				<!-- end main title -->

				<!-- reviews -->
				<div class="col-12">
					<div class="main__table-wrap">
						<table class="main__table">
							<thead>
								<tr>
									<th>ID</th>
									<th>ITEM</th>
									<th>AUTHOR</th>
									<th>TEXT</th>
									<th>RATING</th>
									<th>LIKE / DISLIKE</th>
									<th>CRAETED DATE</th>
									<th>ACTIONS</th>
								</tr>
							</thead>

							<tbody>
								<tr>
									<td>
										<div class="main__table-text">23</div>
									</td>
									<td>
										<div class="main__table-text"><a href="#">I Dream in Another Language</a></div>
									</td>
									<td>
										<div class="main__table-text">Brian Cranston</div>
									</td>
									<td>
										<div class="main__table-text">Lorem Ipsum is simply dummy text...</div>
									</td>
									<td>
										<div class="main__table-text main__table-text--rate"><i class="icon ion-ios-star"></i> 7.9</div>
									</td>
									<td>
										<div class="main__table-text">12 / 7</div>
									</td>
									<td>
										<div class="main__table-text">24 Oct 2021</div>
									</td>
									<td>
										<div class="main__table-btns">
											<a href="#modal-view" class="main__table-btn main__table-btn--view open-modal">
												<i class="icon ion-ios-eye"></i>
											</a>
											<a href="#modal-delete" class="main__table-btn main__table-btn--delete open-modal">
												<i class="icon ion-ios-trash"></i>
											</a>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="main__table-text">24</div>
									</td>
									<td>
										<div class="main__table-text"><a href="#">Benched</a></div>
									</td>
									<td>
										<div class="main__table-text">John Doe</div>
									</td>
									<td>
										<div class="main__table-text">Lorem Ipsum is simply dummy text...</div>
									</td>
									<td>
										<div class="main__table-text main__table-text--rate"><i class="icon ion-ios-star"></i> 8.6</div>
									</td>
									<td>
										<div class="main__table-text">67 / 22</div>
									</td>
									<td>
										<div class="main__table-text">24 Oct 2021</div>
									</td>
									<td>
										<div class="main__table-btns">
											<a href="#modal-view" class="main__table-btn main__table-btn--view open-modal">
												<i class="icon ion-ios-eye"></i>
											</a>
											<a href="#modal-delete" class="main__table-btn main__table-btn--delete open-modal">
												<i class="icon ion-ios-trash"></i>
											</a>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="main__table-text">25</div>
									</td>
									<td>
										<div class="main__table-text"><a href="#">Whitney</a></div>
									</td>
									<td>
										<div class="main__table-text">Jesse Plemons</div>
									</td>
									<td>
										<div class="main__table-text">Lorem Ipsum is simply dummy text...</div>
									</td>
									<td>
										<div class="main__table-text main__table-text--rate"><i class="icon ion-ios-star"></i> 6.0</div>
									</td>
									<td>
										<div class="main__table-text">44 / 5</div>
									</td>
									<td>
										<div class="main__table-text">24 Oct 2021</div>
									</td>
									<td>
										<div class="main__table-btns">
											<a href="#modal-view" class="main__table-btn main__table-btn--view open-modal">
												<i class="icon ion-ios-eye"></i>
											</a>
											<a href="#modal-delete" class="main__table-btn main__table-btn--delete open-modal">
												<i class="icon ion-ios-trash"></i>
											</a>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="main__table-text">26</div>
									</td>
									<td>
										<div class="main__table-text"><a href="#">Blindspotting</a></div>
									</td>
									<td>
										<div class="main__table-text">Matt Jones</div>
									</td>
									<td>
										<div class="main__table-text">Lorem Ipsum is simply dummy text...</div>
									</td>
									<td>
										<div class="main__table-text main__table-text--rate"><i class="icon ion-ios-star"></i> 9.1</div>
									</td>
									<td>
										<div class="main__table-text">20 / 6</div>
									</td>
									<td>
										<div class="main__table-text">24 Oct 2021</div>
									</td>
									<td>
										<div class="main__table-btns">
											<a href="#modal-view" class="main__table-btn main__table-btn--view open-modal">
												<i class="icon ion-ios-eye"></i>
											</a>
											<a href="#modal-delete" class="main__table-btn main__table-btn--delete open-modal">
												<i class="icon ion-ios-trash"></i>
											</a>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="main__table-text">27</div>
									</td>
									<td>
										<div class="main__table-text"><a href="#">I Dream in Another Language</a></div>
									</td>
									<td>
										<div class="main__table-text">Tess Harper</div>
									</td>
									<td>
										<div class="main__table-text">Lorem Ipsum is simply dummy text...</div>
									</td>
									<td>
										<div class="main__table-text main__table-text--rate"><i class="icon ion-ios-star"></i> 5.5</div>
									</td>
									<td>
										<div class="main__table-text">8 / 132</div>
									</td>
									<td>
										<div class="main__table-text">24 Oct 2021</div>
									</td>
									<td>
										<div class="main__table-btns">
											<a href="#modal-view" class="main__table-btn main__table-btn--view open-modal">
												<i class="icon ion-ios-eye"></i>
											</a>
											<a href="#modal-delete" class="main__table-btn main__table-btn--delete open-modal">
												<i class="icon ion-ios-trash"></i>
											</a>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="main__table-text">28</div>
									</td>
									<td>
										<div class="main__table-text"><a href="#">Benched</a></div>
									</td>
									<td>
										<div class="main__table-text">John Doe</div>
									</td>
									<td>
										<div class="main__table-text">Lorem Ipsum is simply dummy text...</div>
									</td>
									<td>
										<div class="main__table-text main__table-text--rate"><i class="icon ion-ios-star"></i> 7.0</div>
									</td>
									<td>
										<div class="main__table-text">6 / 1</div>
									</td>
									<td>
										<div class="main__table-text">24 Oct 2021</div>
									</td>
									<td>
										<div class="main__table-btns">
											<a href="#modal-view" class="main__table-btn main__table-btn--view open-modal">
												<i class="icon ion-ios-eye"></i>
											</a>
											<a href="#modal-delete" class="main__table-btn main__table-btn--delete open-modal">
												<i class="icon ion-ios-trash"></i>
											</a>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="main__table-text">29</div>
									</td>
									<td>
										<div class="main__table-text"><a href="#">Whitney</a></div>
									</td>
									<td>
										<div class="main__table-text">Jesse Plemons</div>
									</td>
									<td>
										<div class="main__table-text">Lorem Ipsum is simply dummy text...</div>
									</td>
									<td>
										<div class="main__table-text main__table-text--rate"><i class="icon ion-ios-star"></i> 9.0</div>
									</td>
									<td>
										<div class="main__table-text">10 / 0</div>
									</td>
									<td>
										<div class="main__table-text">24 Oct 2021</div>
									</td>
									<td>
										<div class="main__table-btns">
											<a href="#modal-view" class="main__table-btn main__table-btn--view open-modal">
												<i class="icon ion-ios-eye"></i>
											</a>
											<a href="#modal-delete" class="main__table-btn main__table-btn--delete open-modal">
												<i class="icon ion-ios-trash"></i>
											</a>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="main__table-text">30</div>
									</td>
									<td>
										<div class="main__table-text"><a href="#">Blindspotting</a></div>
									</td>
									<td>
										<div class="main__table-text">Jonathan Banks</div>
									</td>
									<td>
										<div class="main__table-text">Lorem Ipsum is simply dummy text...</div>
									</td>
									<td>
										<div class="main__table-text main__table-text--rate"><i class="icon ion-ios-star"></i> 6.2</div>
									</td>
									<td>
										<div class="main__table-text">13 / 14</div>
									</td>
									<td>
										<div class="main__table-text">24 Oct 2021</div>
									</td>
									<td>
										<div class="main__table-btns">
											<a href="#modal-view" class="main__table-btn main__table-btn--view open-modal">
												<i class="icon ion-ios-eye"></i>
											</a>
											<a href="#modal-delete" class="main__table-btn main__table-btn--delete open-modal">
												<i class="icon ion-ios-trash"></i>
											</a>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="main__table-text">31</div>
									</td>
									<td>
										<div class="main__table-text"><a href="#">I Dream in Another Language</a></div>
									</td>
									<td>
										<div class="main__table-text">John Doe</div>
									</td>
									<td>
										<div class="main__table-text">Lorem Ipsum is simply dummy text...</div>
									</td>
									<td>
										<div class="main__table-text main__table-text--rate"><i class="icon ion-ios-star"></i> 7.9</div>
									</td>
									<td>
										<div class="main__table-text">12 / 7</div>
									</td>
									<td>
										<div class="main__table-text">24 Oct 2021</div>
									</td>
									<td>
										<div class="main__table-btns">
											<a href="#modal-view" class="main__table-btn main__table-btn--view open-modal">
												<i class="icon ion-ios-eye"></i>
											</a>
											<a href="#modal-delete" class="main__table-btn main__table-btn--delete open-modal">
												<i class="icon ion-ios-trash"></i>
											</a>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="main__table-text">32</div>
									</td>
									<td>
										<div class="main__table-text"><a href="#">Benched</a></div>
									</td>
									<td>
										<div class="main__table-text">Brian Cranston</div>
									</td>
									<td>
										<div class="main__table-text">Lorem Ipsum is simply dummy text...</div>
									</td>
									<td>
										<div class="main__table-text main__table-text--rate"><i class="icon ion-ios-star"></i> 8.6</div>
									</td>
									<td>
										<div class="main__table-text">67 / 22</div>
									</td>
									<td>
										<div class="main__table-text">24 Oct 2021</div>
									</td>
									<td>
										<div class="main__table-btns">
											<a href="#modal-view" class="main__table-btn main__table-btn--view open-modal">
												<i class="icon ion-ios-eye"></i>
											</a>
											<a href="#modal-delete" class="main__table-btn main__table-btn--delete open-modal">
												<i class="icon ion-ios-trash"></i>
											</a>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<!-- end reviews -->

				<!-- paginator -->
				<div class="col-12">
					<div class="paginator-wrap">
						<span>10 from 9 071</span>

						<ul class="paginator">
							<li class="paginator__item paginator__item--prev">
								<a href="#"><i class="icon ion-ios-arrow-back"></i></a>
							</li>
							<li class="paginator__item"><a href="#">1</a></li>
							<li class="paginator__item paginator__item--active"><a href="#">2</a></li>
							<li class="paginator__item"><a href="#">3</a></li>
							<li class="paginator__item"><a href="#">4</a></li>
							<li class="paginator__item paginator__item--next">
								<a href="#"><i class="icon ion-ios-arrow-forward"></i></a>
							</li>
						</ul>
					</div>
				</div>
				<!-- end paginator -->
			</div>
		</div>
	</main>
	<!-- end main content -->

	<!-- modal view -->
	<div id="modal-view" class="zoom-anim-dialog mfp-hide modal modal--view">
		<div class="reviews__autor">
			<img class="reviews__avatar" src="img/user.svg" alt="">
			<span class="reviews__name">Best Marvel movie in my opinion</span>
			<span class="reviews__time">24.08.2018, 17:53 by John Doe</span>

			<span class="reviews__rating"><i class="icon ion-ios-star"></i>8.4</span>
		</div>
		<p class="reviews__text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
	</div>
	<!-- end modal view -->

	<!-- modal delete -->
	<div id="modal-delete" class="zoom-anim-dialog mfp-hide modal">
		<h6 class="modal__title">Review delete</h6>

		<p class="modal__text">Are you sure to permanently delete this review?</p>

		<div class="modal__btns">
			<button class="modal__btn modal__btn--apply" type="button">Delete</button>
			<button class="modal__btn modal__btn--dismiss" type="button">Dismiss</button>
		</div>
	</div>
	<!-- end modal delete -->

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