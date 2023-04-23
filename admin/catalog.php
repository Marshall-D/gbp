<?php 
$active = "all_shows";

//include auth_session.php file on all user panel pages
include("includes/auth_session.php");
require('includes/db.php');
include "includes/header.php";
include "includes/sidebar.php";

$show_num_query    = "SELECT * FROM `shows`";
$show_num_result = mysqli_query($con, $show_num_query) or die(mysql_error());
$show_num_rows = mysqli_num_rows($show_num_result);

?>
	<!-- main content -->
	<main class="main">
		<div class="container-fluid">
			<div class="row">
				<!-- main title -->
				<div class="col-12">
					<div class="main__title">
						<h2>Catalog</h2>

						<span class="main__title-stat"><?= $show_num_rows; ?> Shows Total</span>

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
									<li>Views</li>
								</ul>
							</div>
							<!-- end filter sort -->

							<!-- search -->
							<form action="#" class="main__title-form">
								<input type="text" placeholder="Find Show..">
								<button type="button">
									<i class="icon ion-ios-search"></i>
								</button>
							</form>
							<!-- end search -->
						</div>
					</div>
				</div>
				<!-- end main title -->

				<!-- users -->
				<div class="col-12">
					<div class="main__table-wrap">
						<table class="main__table">
							<thead>
								<tr>
									<th>ID</th>
									<th>TITLE</th>
									<th>RATING</th>
									<th>GENRE(S)</th>
									<th>DAY(S)</th>
									<th>TIME</th>
									<th>LANGUAGE(S)</th>
									<th>ACTIONS</th>
								</tr>
							</thead>

							<tbody>
								<?php
									$user_query = "SELECT * FROM `shows` ORDER BY title";
		        					$user_result = mysqli_query($con, $user_query) or die(mysql_error());

		        					while ($show = mysqli_fetch_array($user_result)) {
		        				?>
								<tr>
									<td>
										<div class="main__table-text"><?= $show["id"]; ?></div>
									</td>
									<td>
										<div class="main__table-text"><a href="details.php?show_id=<?= $show["id"]; ?>"><?= $show["title"]; ?></a></div>
									</td>
									<td>
										<div class="main__table-text main__table-text--rate"><i class="icon ion-ios-star"></i> <?= $show["rating"]; ?></div>
									</td>
									<td>
										<?php
										$genres = flatten(unserialize($show["genre"]));
										// print_r($genres);die();
										$genre = implode(', ', array_values($genres));
										?>
										<div class="main__table-text"><?= $genre; ?></div>
									</td>
									<td>
										<?php
										$days = flatten(unserialize($show["day"]));
										// print_r($days);die();
										$day = implode(', ', array_values($days));
										?>
										<div class="main__table-text"><?= $day; ?></div>
									</td>
									<td>
										<div class="main__table-text"><?= $show["start_time"]; ?>-<?= $show["end_time"]; ?></div>
									</td>
									<td>
										<?php
										$languages = flatten(unserialize($show["language"]));
										// print_r($languages);die();
										$language = implode(', ', array_values($languages));
										?>
										<div class="main__table-text"><?= $language; ?></div>
									</td>
									<td>
										<?php
											if ($_SESSION['level'] <= 200 || $_SESSION['oap_name'] == $show["oap"]) {
										?>
										<div class="main__table-btns">
											<a href="details.php?show_id=<?= $show["id"]; ?>" class="main__table-btn main__table-btn--view">
												<i class="icon ion-ios-eye"></i>
											</a>
											<a href="edit-show.php?show_id=<?= $show["id"]; ?>" class="main__table-btn main__table-btn--edit">
												<i class="icon ion-ios-create"></i>
											</a>
											<a href="#modal-delete" class="main__table-btn main__table-btn--delete open-modal">
												<i class="icon ion-ios-trash"></i>
											</a>
										</div>
										<?php
											} else {
												echo '<div class="main__table-text">None</div>';
											}
										?>
									</td>
								</tr>
							<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
				<!-- end users -->

				<!-- paginator -->
				<div class="col-12">
					<div class="paginator-wrap">
						<span><?= $show_num_rows; ?> out of <?= $show_num_rows; ?></span>

						<ul class="paginator">
							<li class="paginator__item paginator__item--prev">
								<a href="#"><i class="icon ion-ios-arrow-back"></i></a>
							</li>
							<li class="paginator__item paginator__item--active"><a href="#">1</a></li>
							<!-- <li class="paginator__item"><a href="#">2</a></li>
							<li class="paginator__item"><a href="#">3</a></li>
							<li class="paginator__item"><a href="#">4</a></li> -->
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

	<!-- modal delete -->
	<div id="modal-delete" class="zoom-anim-dialog mfp-hide modal">
		<h6 class="modal__title">Item delete</h6>

		<p class="modal__text">Are you sure to permanently delete this item?</p>

		<div class="modal__btns">
			<button class="modal__btn modal__btn--apply" type="button" href="delete-show.php?show_id=<?= $show["id"]; ?>">Delete</button>
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