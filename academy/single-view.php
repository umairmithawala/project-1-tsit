<?php
session_start();
require_once 'admin/database/db-con.php';
?>
<?php

if ($_GET['blog_unique_link']) {

	$blog_unique_link = $_GET['blog_unique_link'];

	//get all the blog post
	$query = "SELECT * FROM blog WHERE `unique_link` = '$blog_unique_link'";
	$run_query = mysqli_query($con, $query);
	if ($run_query == true) {
		$row = mysqli_fetch_array($run_query);
		$blog_id = $row['id'];
		$thumbnail_img = $row['thumbnail_img'];
		$blog_title = $row['blog_title'];
		$blog_body = $row['blog_body'];
		$keywords = $row['keywords'];
		$description = $row['description'];
	}
} else {
?>
	<script>
		window.location = 'index.php';
	</script>
<?php
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<meta name="description" content="TSIT - World's No 1 Crypto Scam Database" />
	<meta name="keywords" content="TSIT, Crypto Scam" />
	<meta name="author" content="Anzarkhan.com" />
	<title>Tesla Academy</title>
	<link rel="icon" type="image/png" href="assets/img/favicon.png" />
	<link rel="stylesheet" type="text/css" href="assets/css/plugins.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/theme-styles.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/blocks.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/widgets.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css" />
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700i,900," rel="stylesheet" />
</head>

<body class="crumina-grid">
	<!-- Google Tag Manager (noscript) -->
	<!-- <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TKGD7NP" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript> -->
	<!-- End Google Tag Manager (noscript) -->

	<!-- Preloader -->

	<!-- ... end Preloader -->

	<!-- Header -->

	<?php
	require_once('elements/landing-header.php');
	?>

	<!-- ... end Header -->


	<div class="main-content-wrapper">

		<section class="medium-padding120">
			<div class="container">
				<div class="row pb60">

					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

						<article class="hentry post post-standard has-post-thumbnail video">
							<div class="post-thumb">
								<img src="admin/uploads/thumbnail-img/<?php echo $thumbnail_img; ?>" alt="post">
								<div class="overlay overlay-blog"></div>
							</div>
						</article>
					</div>

					<!-- Blog posts-->
					<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
						<article class="hentry post post-standard has-post-thumbnail video post-standard-details">
							<div class="post-additional-info">
								<div class="btn btn--round btn--share-in-down btn--share-js">
									<svg class="woox-icon icon-share">
										<use xlink:href="#icon-share"></use>
									</svg>
									<div class="shared-wrap">
										<ul class="socials">
											<li class="social-item">
												<a data-sharer="facebook" data-hashtag="hashtag" data-url="https://ellisonleao.github.io/sharer.js/">
													<svg viewBox="0 0 112.2 112.2" class="woox-icon">
														<circle cx="56.1" cy="56.1" r="56.1" fill="#3b5998" />
														<path fill="#fff" d="M70.2 58.3h-10v36.67H45.01V58.29h-7.2V45.41h7.2v-8.34c0-5.97 2.84-15.3 15.3-15.3l11.24.04v12.51H63.4c-1.34 0-3.22.67-3.22 3.51v7.59h11.34L70.2 58.29z" />
													</svg>
												</a>
											</li>
											<li class="social-item">
												<a data-sharer="buffer" data-via="ellisonleao" data-picture="https://ellisonleao.github.io/sharer.js/assets/img/socialbg.png" data-title="Sharer.js is the ultimate sharer js lib" data-url="https://ellisonleao.github.io/sharer.js/">
													<svg viewBox="0 0 112.2 112.2" class="woox-icon">
														<circle cx="56.1" cy="56.1" r="56.1" fill="#55acee" />
														<path fill="#f1f2f2" d="M90.46 40.32a26.75 26.75 0 0 1-7.7 2.1 13.45 13.45 0 0 0 5.9-7.41 26.84 26.84 0 0 1-8.52 3.25A13.41 13.41 0 0 0 57.3 50.5a38.06 38.06 0 0 1-27.64-14 13.4 13.4 0 0 0 4.15 17.9c-2.2-.08-4.26-.68-6.07-1.69v.17c0 6.5 4.62 11.92 10.75 13.15a13.36 13.36 0 0 1-6.05.23c1.7 5.33 6.66 9.2 12.52 9.32a26.9 26.9 0 0 1-19.85 5.55 37.93 37.93 0 0 0 20.56 6.02C70.32 87.14 83.8 66.71 83.8 49c0-.58-.02-1.16-.04-1.73a27.2 27.2 0 0 0 6.7-6.94z" />
													</svg>
												</a>
											</li>
											<li class="social-item">
												<a data-sharer="pinterest" data-url="https://ellisonleao.github.io/sharer.js/">
													<svg viewBox="0 0 473.9 473.9" class="woox-icon">
														<circle cx="237" cy="237" r="237" fill="#d42028" />
														<path fill="#fff" d="M173.4 123.1c-35.6 14.1-59.8 41.3-66.6 77.9-4.2 22.5-2.6 47 7.4 68 2.2 4.7 4.9 9.2 8 13.3 1.5 2 3.2 4 5 5.8 3.2-1.1 6.2-2.5 9.1-4.2 12-6.8 20.9-17.3 31.2-26.1-34.5-39.9 2.1-89.4 47.7-100.4 42.5-10.3 100.2 7.4 113.1 51.2 5.3 18.1 1.8 38.2-12.9 51.3-7.7 6.9-17.5 11.4-27.9 13.3a66.8 66.8 0 0 1-18.4.6c-3.4-.3-6.8-.9-10.1-1.7-5.7-1.3-10.7-1.1-10.7-7.2v-71.8c0-4.9.5-4-3.6-4.5-3.2-.4-6.4-.7-9.6-1-11.3-.9-23.1-1.5-34.3.4-4.2.7-4.5 0-4.5 4.6v37.8c0 26.7 2 53.8.9 80.4-.3 8-.5 27-9.4 31-10.3 4.6-19.4-5.1-28.9-7.1 1.3 13.4-7.1 39.9 8.5 46.7 14.3 6.2 30.8 8.5 45.9 3.4 31.6-10.7 41.8-45.9 37.8-74.8 48.8 14.6 101.5-9.8 122.4-53.9 14.9-31.4 8.6-70.4-13.8-97.1-41.9-49.8-127-59.4-186.3-35.9z" />
													</svg>
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>


							<div class="post__content">

								<header class="crumina-module crumina-heading heading--h4 heading--with-decoration">
									<!-- End Google Tag Manager -->
									<h4 class="heading-title"><?php echo $row['blog_title']; ?></h4>
									<div class="heading-text"><?php echo $description; ?></div>
								</header>
								<div>
									<?php echo $blog_body;  ?>
								</div>
							</div>
						</article>

						<div class="widget w--tags">

							<h6 class="title">Tags:</h6>
							<ul class="tags-list">
								<li>
									<?php
									$tags = explode(',', $keywords);
									foreach ($tags as $tag_result) {
									?>
										<?php echo $tag_result; ?> ,&nbsp;
									<?php
									}
									?>
								</li>
							</ul>
						</div>

						<!-- comment section -->
						<!-- CODE IS IN EXTRA FILE -->
						<!-- comment section end -->

					</div>
					<!-- End Blog posts-->

					<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">

						<aside aria-label="sidebar" class="sidebar sidebar-left">
							<aside class="widget w-search">
								<form method="get" class="form--search">
									<div class="input-with-icon">
										<input class="input--dark input--squared" name="name" placeholder="What are you looking for?" type="text">
										<i class="woox-icon fas fa-search"></i>
									</div>
								</form>
							</aside>


							<aside class="widget w-latest-news">
								<img class="primary-dots" src="assets/img/dots-5.png" alt="dots">
								<h5 class="widget-title">Latest News</h5>
								<ul class="latest-news-list">
									<?php
									//leatest post
									$latest_post = "SELECT * FROM blog ORDER BY id DESC LIMIT 3";
									$run_latest_post = mysqli_query($con, $latest_post);

									while ($latest_post_row = mysqli_fetch_assoc($run_latest_post)) {
										$blog_id = $latest_post_row['id'];
										$blog_title = $latest_post_row['blog_title'];
										$unique_link = $latest_post_row['unique_link'];
										$publish_day = $latest_post_row['publish_date'];
										$publish_day = date('d', strtotime($publish_day));
										$publish_date = $latest_post_row['publish_date'];
										$publish_date = date('F Y', strtotime($publish_date));


									?>
										<article itemscope="" itemtype="http://schema.org/NewsArticle" class="latest-news-item">

											<div class="post__date">
												<time class="published" datetime="2018-03-08 12:00:00">
													<span class="number"><?php echo $publish_day; ?></span> <?php  echo $publish_date;?>
												</time>
											</div>

											<a href="single-view.php?blog_unique_link=<?php echo $latest_post_row['unique_link']; ?>" class="h6 post__title entry-title"><?php echo $latest_post_row['blog_title']; ?></a>

										</article>
									<?php
									}
									?>
									<li>



								</ul>

								<a href="009_news.html" class="btn btn--large btn--secondary btn--transparent btn--with-icon btn--icon-right">
									Read All News
									<svg class="woox-icon icon-arrow-right">
										<use xlink:href="#icon-arrow-right"></use>
									</svg>
								</a>

							</aside>

							<aside class="widget w-subscribe">
								<form method="post" action="">

									<h3 class="title">Subscribe to <span class="weight-bold">newsletter.</span></h3>

									<input class="input--squared" type="email" value="" placeholder="Your E-mail Address">

									<button class="btn btn--large btn--dark full-width">Subscribe Now!</button>

								</form>
							</aside>

							<!-- <aside class="widget w-upcoming-events">

								<img class="primary-dots" src="assets/img/dots-5.png" alt="dots">
								<h5 class="widget-title">Upcoming Events</h5>

								<div class="crumina-module crumina-module-slider pagination-bottom-center">
									<div class="swiper-container">

										<div class="swiper-wrapper">

											<div class="swiper-slide">
												<div class="crumina-module crumina-event-item">
													<div class="event-content">
														<div class="event-date">
															<svg class="woox-icon icon-school-calendar">
																<use xlink:href="#icon-school-calendar"></use>
															</svg>
															March 16, 2018
														</div>
														<h4 class="event-title">What is Bitcoin? A Step-By-Step Guide For Beginners</h4>

														<div class="author-block">
															<div class="avatar avatar60">
																<img src="assets/img/author2.jpg" alt="avatar">
															</div>
															<div class="author-content">
																<a href="#" class="author-name">Philip Demarco</a>
																<div class="author-prof">speaker</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="swiper-slide">
												<div class="crumina-module crumina-event-item">
													<div class="event-content">
														<div class="event-date">
															<svg class="woox-icon icon-school-calendar">
																<use xlink:href="#icon-school-calendar"></use>
															</svg>
															March 16, 2018
														</div>
														<h4 class="event-title">What is Bitcoin? A Step-By-Step Guide For Beginners</h4>

														<div class="author-block">
															<div class="avatar avatar60">
																<img src="assets/img/author2.jpg" alt="avatar">
															</div>
															<div class="author-content">
																<a href="#" class="author-name">Philip Demarco</a>
																<div class="author-prof">speaker</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="swiper-slide">
												<div class="crumina-module crumina-event-item">
													<div class="event-content">
														<div class="event-date">
															<svg class="woox-icon icon-school-calendar">
																<use xlink:href="#icon-school-calendar"></use>
															</svg>
															March 16, 2018
														</div>
														<h4 class="event-title">What is Bitcoin? A Step-By-Step Guide For Beginners</h4>

														<div class="author-block">
															<div class="avatar avatar60">
																<img src="assets/img/author2.jpg" alt="avatar">
															</div>
															<div class="author-content">
																<a href="#" class="author-name">Philip Demarco</a>
																<div class="author-prof">speaker</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									
									<div class="swiper-pagination swiper-pagination--small"></div>
								</div>
							</aside> -->
						</aside>
					</div>

				</div>
			</div>
		</section>

	</div>
	<!-- Footer -->

	<?php
	require_once('elements/landing-footer.php');
	?>

	<!-- ... end Footer -->


	<script src="assets/js/method-assign.js"></script>

	<!-- jQuery first, then Other JS. -->

	<script src="assets/js/jquery-3.3.1.js"></script>

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDDpqPQbjKiY7zSvLyPRIWWOfG1XiuhhYg" async defer></script>

	<script src="assets/js/js-plugins/leaflet.js"></script>
	<script src="assets/js/js-plugins/MarkerClusterGroup.js"></script>
	<script src="assets/js/js-plugins/crum-mega-menu.js"></script>
	<script src="assets/js/js-plugins/waypoints.js"></script>
	<script src="assets/js/js-plugins/jquery-circle-progress.js"></script>
	<script src="assets/js/js-plugins/segment.js"></script>
	<script src="assets/js/js-plugins/bootstrap.js"></script>
	<script src="assets/js/js-plugins/imagesLoaded.js"></script>
	<script src="assets/js/js-plugins/jquery.matchHeight.js"></script>
	<script src="assets/js/js-plugins/jquery-countTo.js"></script>
	<script src="assets/js/js-plugins/Headroom.js"></script>
	<script src="assets/js/js-plugins/jquery.magnific-popup.js"></script>
	<script src="assets/js/js-plugins/popper.min.js"></script>
	<script src="assets/js/js-plugins/particles.js"></script>
	<script src="assets/js/js-plugins/perfect-scrollbar.js"></script>
	<script src="assets/js/js-plugins/jquery.datetimepicker.full.js"></script>
	<script src="assets/js/js-plugins/svgxuse.js"></script>
	<script src="assets/js/js-plugins/select2.js"></script>
	<script src="assets/js/js-plugins/smooth-scroll.js"></script>
	<script src="assets/js/js-plugins/sharer.js"></script>
	<script src="assets/js/js-plugins/isotope.pkgd.min.js"></script>
	<script src="assets/js/js-plugins/ajax-pagination.js"></script>
	<script src="assets/js/js-plugins/swiper.min.js"></script>
	<script src="assets/js/js-plugins/material.min.js"></script>
	<script src="assets/js/js-plugins/orbitlist.js"></script>
	<script src="assets/js/js-plugins/highstock.js"></script>
	<script src="assets/js/js-plugins/bootstrap-datepicker.js"></script>
	<script src="assets/js/js-plugins/TimeCircles.js"></script>
	<script src="assets/js/js-plugins/ion.rangeSlider.js"></script>

	<!-- FontAwesome 5.x.x JS -->

	<script defer src="fonts/fontawesome-all.js"></script>

	<script src="assets/js/main.js"></script>

	<!-- SVG icons loader -->
	<script src="assets/js/svg-loader.js"></script>
	<!-- /SVG icons loader -->

</body>

</html>