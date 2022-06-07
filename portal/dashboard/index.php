<?php
session_start();
require_once '../database/db-con.php';
?>
<?php
if (isset($_SESSION['user_session_var'])) {
	$user_id = $_SESSION['user_session_var'];

	$user_query = "SELECT * FROM `users` WHERE `id` = $user_id";
	$run_fetch = mysqli_query($con, $user_query);
	$user_data = mysqli_fetch_assoc($run_fetch);

	if ($user_data['email_verification'] == 0) {
		echo "<script>window.location='../utility/email-not-verified.php';</script>";
	}
} else {
?>
	<script>
		window.location = '../auth/login.php';
	</script>
<?php
}
?>

<?php

$current_date = date("Y-m-d");
									$available_tsit_supply = 0;
									if ($current_date <= "2022-04-23") {
										// echo "Phase – 1 - 7th April – 23rd April 2022";
										$total_supply = 500000000000;
										//create timestamp of 7th april
										$tsit_supply_start_date = strtotime("2022-04-07");
									} else if ($current_date <= "2022-05-10") {
										// echo "Phase – 2 - 24th April – 10th May 2022";
										$total_supply = 1000000000000;
										//create timestamp of 24th april
										$tsit_supply_start_date = strtotime("2022-04-24");
									} else if ($current_date <= "2022-05-27") {
										// echo "Phase – 3 - 11th May – 27th May 2022";
										$total_supply = 2000000000000;
										//create timestamp of 11th may
										$tsit_supply_start_date = strtotime("2022-05-11");
									} else if ($current_date <= "2022-06-13") {
										// echo "Phase – 4 - 28th May – 13th June 2022";
										$total_supply = 4000000000000;
										//create timestamp of 28th may
										$tsit_supply_start_date = strtotime("2022-05-28");
									} else{
										// echo "Phase – 5 - 14th June – 30th June 2022";
										$total_supply = 4000000000000;
										//create timestamp of 14th june
										$tsit_supply_start_date = strtotime("2022-05-28");
									}


//get sum of amount from transactions table where transation_id is 6

$sql1 = "SELECT SUM(amount) FROM transactions WHERE transaction_type = 6 AND `timestamp` > $tsit_supply_start_date";
$result = $con->query($sql1);
$row = $result->fetch_assoc();
$total_tsit_sold = $row['SUM(amount)'];


// echo $total_tsit_sold;

if($total_tsit_sold == NULL){
	$total_tsit_sold = 0;
}



//find available tsit amount
// $total_supply = 500000000000;
$available_tsit_supply_amount = $total_supply - $total_tsit_sold;

?>

<?php
$current_date = time();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Griya : Real Estate Admin" />
	<meta property="og:title" content="Griya : Real Estate Admin" />
	<meta property="og:description" content="Griya : Real Estate Admin" />
	<meta property="og:image" content="page-error-404.html" />
	<meta name="format-detection" content="telephone=no">
	<!-- PAGE TITLE HERE -->
	<title>Dashboard | Tesla INU </title>
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="../assets/images/favicon.png" />
	<link href="../assets/../assets/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
	<link rel="stylesheet" href="../assets/../assets/vendor/dotted-map/css/contrib/jquery.smallipop-0.3.0.min.css" type="text/css" media="all" />
	<!-- Style css -->
	<link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>
	<!--*******************
         Preloader start
         ********************-->
	<div id="preloader">
		<div class="lds-ripple">
			<div></div>
			<div></div>
		</div>
	</div>
	<!--*******************
         Preloader end
         ********************-->
	<!--**********************************
         Main wrapper start
         ***********************************-->
	<div id="main-wrapper">
		<?php require('../elements/header.php'); ?>
		<!--**********************************
            Sidebar start
            ***********************************-->
		<?php require('../elements/sidebar.php'); ?>
		<!--**********************************
            Sidebar end
            ***********************************-->
		<!--**********************************
            Content body start
            ***********************************-->
		<div class="content-body">
			<!-- row -->
			<div class="container-fluid">
				<div class="mb-sm-4 d-flex flex-wrap align-items-center text-head">
					<h2 class="mb-3 me-auto">Dashboard</h2>
					<div>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.php">User</a></li>
							<li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
						</ol>
					</div>
				</div>
				<?php
				$total_scam_reports = 0;
				$active_scams = 0;
				$approved_scams = 0;
				$total_votes = 0;


				//total reported scams 
				$query1 = "SELECT `id` FROM `scams` WHERE  `reported_by`  = $user_id";
				$run_fetch1 = mysqli_query($con, $query1);
				$no_of_row1  = mysqli_num_rows($run_fetch1);
				$total_scam_reports =  $no_of_row1;

				//counnting acrive scams 
				$query1 = "SELECT `id` FROM `scams` WHERE  `reported_by`  = $user_id AND `is_active` = 1";
				$run_fetch1 = mysqli_query($con, $query1);
				$no_of_row1  = mysqli_num_rows($run_fetch1);
				$active_scams =  $no_of_row1;

				//counnting approvved scams 
				$query1 = "SELECT `id` FROM `scams` WHERE  `reported_by`  = $user_id AND `mining_result` = 1";
				$run_fetch1 = mysqli_query($con, $query1);
				$no_of_row1  = mysqli_num_rows($run_fetch1);
				$approved_scams =  $no_of_row1;


				//  counting total votes 
				$query1 = "SELECT `id` FROM `votes` WHERE  `voter_id`  = $user_id";
				$run_fetch1 = mysqli_query($con, $query1);
				$no_of_row1  = mysqli_num_rows($run_fetch1);
				$total_votes =  $no_of_row1;


				?>

				<?php

				//here we are going to count all the numbers 
				//get sum of all the amount from transactions table where transaction_type is in 7 or 8
				$sql1 = "SELECT SUM(amount) FROM transactions WHERE (transaction_type = 7 OR transaction_type = 8)  AND (user_id = $user_id)";
				$result = $con->query($sql1);
				$row = $result->fetch_assoc();
				$total_business_dashboard_sum = $row['SUM(amount)'];

				if ($total_business_dashboard_sum == null) {
					$total_business_dashboard_sum = 0;
				}


				//count total number of users referred by this user by checking referred_by_id in users table
				$sql1 = "SELECT `id` FROM `users` WHERE  `referred_by_id`  = $user_id";
				$result = $con->query($sql1);
				$row = $result->fetch_assoc();
				//get number of rows
				$total_referrals_dashboard_sum = $result->num_rows;


				$last_day_timestamp = strtotime("-1 day");
				//count todays number of referrals by checking timestamp in users table

				$sql1 = "SELECT `id` FROM `users` WHERE  `referred_by_id`  = $user_id AND `timestamp` >  $last_day_timestamp";
				$result = $con->query($sql1);
				$row = $result->fetch_assoc();
				//get number of rows
				$todays_referrals_today_dashboard_sum = $result->num_rows;



				//get sum of all the amount from transactions table where transaction_type is in 7 or 8 by checking todays time
				$sql1 = "SELECT SUM(amount) FROM transactions WHERE (transaction_type = 7 OR transaction_type = 8) AND (user_id = $user_id AND `timestamp` >  $last_day_timestamp)";
				$result = $con->query($sql1);
				$row = $result->fetch_assoc();
				$total_business_today_dashboard_sum = $row['SUM(amount)'];

				//if sum is null then set it to 0
				if ($total_business_today_dashboard_sum == null) {
					$total_business_today_dashboard_sum = 0;
				}

				?>
				<div class="row">
					<div class="col-xl-3 col-sm-6">
						<div class="card">
							<div class="card-body d-flex align-items-center justify-content-between">
								<div class="card-data me-2">
									<h5>Total Business</h5>
									<h2 class="fs-40 font-w600"><?php echo $total_business_dashboard_sum; ?></h2>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6">
						<div class="card">
							<div class="card-body d-flex align-items-center justify-content-between">
								<div class="card-data me-2">
									<h5>Total Referrals</h5>
									<h2 class="fs-40 font-w600"><?php echo $total_referrals_dashboard_sum; ?></h2>
								</div>
								<div><span class="donut1" data-peity='{ "fill": ["rgb(56, 226, 93,1)", "rgba(242, 246, 252)"]}'><?php echo $total_referrals_dashboard_sum; ?>/<?php echo $total_referrals_dashboard_sum; ?></span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6">
						<div class="card">
							<div class="card-body d-flex align-items-center justify-content-between">
								<div class="card-data me-2">
									<h5>Today's Referrals</h5>
									<h2 class="fs-40 font-w600"><?php echo $todays_referrals_today_dashboard_sum; ?></h2>
								</div>
								<div><span class="donut1" data-peity='{ "fill": ["#0000ff", "rgba(242, 246, 252)"]}'><?php echo $todays_referrals_today_dashboard_sum; ?>/<?php echo $total_referrals_dashboard_sum; ?></span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6">
						<div class="card">
							<div class="card-body d-flex align-items-center justify-content-between">
								<div class="card-data me-2">
									<h5>Today's Earning</h5>
									<h2 class="fs-40 font-w600"><?php echo $total_business_today_dashboard_sum; ?></h2>
								</div>
								<div><span class="donut1" data-peity='{ "fill": ["#ff0000", "rgba(242, 246, 252)"]}'><?php echo $total_business_today_dashboard_sum; ?>/<?php echo $total_business_dashboard_sum; ?></span>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4">
						<div class="card">
							<div class="card-header border-0">
								<h4 class="fs-20">Private Sale Supply</h4>

								<p>
									<?php
									//if $current_date is smaller then 23rd april 2022 then show the supply
									//if $current_date is greater then 10th may 2022 then show the supply
									//if $current_date is greater then 27th may 2022 then show the supply
									//if $current_date is greater then 13th june 2022 then show the supply
									$current_date = date("Y-m-d");
									$available_tsit_supply = 0;
									if ($current_date <= "2022-04-23") {
										echo "Phase – 1 - 7th April – 23rd April 2022";
										$available_tsit_supply = 500000000000;
									} else if ($current_date <= "2022-05-10") {
										echo "Phase – 2 - 24th April – 10th May 2022";
										$available_tsit_supply = 1000000000000;
									} else if ($current_date <= "2022-05-27") {
										echo "Phase – 3 - 11th May – 27th May 2022";
										$available_tsit_supply = 2000000000000;
									} else if ($current_date <= "2022-06-13") {
										echo "Phase – 4 - 28th May – 13th June 2022";
										$available_tsit_supply = 4000000000000;
									} else{
										echo "Phase – 4 - 28th May – 13th June 2022";
										$available_tsit_supply = 4000000000000;
									}




									?>

								</p>
								<br>

							</div>
							<div class="card-body pt-0 text-center">
								<p><?php echo "Total Supply " . $available_tsit_supply; ?></p>
								<div id="pieChart2" class="d-inline-block pieChart1"></div>
								<div class="chart-items">
									<div class=" col-xl-12 col-sm-12">
										<div class="row text-black text-start mt-4 chart-link">

											<span class="mb-2 col-6">
												<svg class="me-2" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect width="19" height="19" rx="9.5" fill="#FF0000" />
												</svg>
												Available TSIT
											</span>
											<span class="mb-2 col-6">
												<svg class="me-2" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect width="19" height="19" rx="9.5" fill="#0000FF" />
												</svg>
												TSIT Sold
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-8">

						<div class="card">
							<div class="card-header">
								<h4 class="card-title"> Latest Updates</h4>
								<scam class="card-title-desc">Here you can see all the updates of Tesla Inu Mission</scam>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="example" class="display" style="min-width: 845px;  ">
										<thead>
											<tr>
												<th>#</th>

												<th>News</th>

											</tr>
										</thead>
									
									</table>
									<div  id="dashboard_latest_news_main_show" style="max-height:300px;">

									</div>
									
								</div>

							</div>
						</div>
					</div>
				</div>


			</div>
		</div>
		<!--**********************************
            Content body end
            ***********************************-->
		<!--**********************************
            Footer start
            ***********************************-->
		<?php require('../elements/footer.php'); ?>
		<!--**********************************
            Footer end
            ***********************************-->
		<!--**********************************
            Support ticket button start
            ***********************************-->
		<!--**********************************
            Support ticket button end
            ***********************************-->
	</div>
	<!--**********************************
         Main wrapper end
         ***********************************-->
	<!--**********************************
         Scripts
         ***********************************-->
	<!-- Required vendors -->
	<script src="../assets/vendor/global/global.min.js"></script>
	<script src="../assets/vendor/chart.js/Chart.bundle.min.js"></script>
	<script src="../assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
	<!-- Apex Chart -->
	<script src="../assets/vendor/apexchart/apexchart.js"></script>
	<!-- Chart piety plugin files -->
	<script src="../assets/vendor/peity/jquery.peity.min.js"></script>
	<!-- Dashboard 1 -->
	<!-- <script src="../assets/js/dashboard/dashboard-1.js"></script> -->
	<!-- JS for dotted map -->
	<script src="../assets/vendor/dotted-map/js/contrib/jquery.smallipop-0.3.0.min.js"></script>
	<script src="../assets/vendor/dotted-map/js/contrib/suntimes.js"></script>
	<script src="../assets/vendor/dotted-map/js/contrib/color-0.4.1.js"></script>
	<script src="../assets/vendor/dotted-map/js/world.js"></script>
	<script src="../assets/vendor/dotted-map/js/smallimap.js"></script>
	<script src="../assets/js/dashboard/dotted-map-init.js"></script>
	<script src="../assets/js/custom.min.js"></script>
	<script src="../assets/js/deznav-init.js"></script>
	<script src="../assets/js/demo.js"></script>
	<!-- <script src="../assets/js/styleSwitcher.js"></script> -->

	<!-- controller js -->
	<script src="controllers/get-latest-news.js"></script>

	<!-- call a function getLatestDashboardNews() after page loading -->
	<script>
		getLatestDashboardNews();
	</script>
	<script>
		(function($) {
			/* "use strict" */

			var dzChartlist = function() {

				var screenWidth = $(window).width();
				var donutChart1 = function() {
					$("span.donut1").peity("donut", {
						width: "5.75rem",
						height: "5.75rem"
					});
					$(window).resize(function() {
						$("span.donut1").peity("donut", {
							width: "5.75rem",
							height: "5.75rem"
						});
					})
				}
				var chartTimeline = function() {

					var optionsTimeline = {
						chart: {
							type: "bar",
							height: 200,
							stacked: true,
							toolbar: {
								show: false
							},
							sparkline: {
								//enabled: true
							},
							offsetX: -10,
						},
						series: [{
							name: "New Clients",
							data: [300, 450, 600, 600, 400, 450, 410, 470, 480, 700, 600, 800, 400, 600, 350, 250, 500, 550, 300, 400, 200]
						}],

						plotOptions: {
							bar: {
								columnWidth: "28%",
								endingShape: "rounded",
								startingShape: "rounded",
								borderRadius: 7,

								colors: {
									backgroundBarColors: ['#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9'],
									backgroundBarOpacity: 1,
									backgroundBarRadius: 5,
								},

							},
							distributed: true
						},

						colors: ['#216FED'],
						grid: {
							show: false,
						},
						legend: {
							show: false
						},
						fill: {
							opacity: 1
						},
						dataLabels: {
							enabled: false,
							colors: ['#000'],
							dropShadow: {
								enabled: true,
								top: 1,
								left: 1,
								blur: 1,
								opacity: 1
							}
						},
						stroke: {
							show: true,
							lineCap: 'rounded',
						},
						xaxis: {
							categories: ['06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28'],
							labels: {
								style: {
									colors: '#808080',
									fontSize: '13px',
									fontFamily: 'poppins',
									fontWeight: 100,
									cssClass: 'apexcharts-xaxis-label',
								},
							},
							crosshairs: {
								show: false,
							},
							axisBorder: {
								show: false,
							},
							axisTicks: {
								show: false,
							},

						},
						yaxis: {
							labels: {
								style: {
									colors: '#808080',
									fontSize: '14px',
									fontFamily: 'Poppins',
									fontWeight: 100,

								},
								formatter: function(y) {
									return y.toFixed(0) + "k";
								}
							},
						},
						tooltip: {
							x: {
								show: true
							}
						},
						responsive: [{
								breakpoint: 375,
								options: {
									xaxis: {
										categories: ['06', '07', '08', '09', '10', '11'],
									},
									chart: {
										height: 250,
									},
									series: [{
										name: "New Clients",
										data: [300, 250, 600, 600, 400, 450],
									}],

								}
							},
							{
								breakpoint: 575,
								options: {
									chart: {
										height: 250,
									},
									series: [{
										name: "New Clients",
										data: [300, 250, 600, 600, 400, 450, 310, 470, 480],
									}],
									xaxis: {
										categories: ['06', '07', '08', '09', '10', '11', '12', '13', '14'],
									}
								}
							}

						]
					};
					var chartTimelineRender = new ApexCharts(document.querySelector("#chartTimeline"), optionsTimeline);
					chartTimelineRender.render();
				}
				var chartTimeline1 = function() {

					var optionsTimeline = {
						chart: {
							type: "bar",
							height: 200,
							stacked: true,
							toolbar: {
								show: false
							},
							sparkline: {
								//enabled: true
							},
							offsetX: -10,
						},
						series: [{
							name: "New Clients",
							data: [300, 450, 200, 600, 400, 350, 410, 470, 480, 700, 500, 400, 400, 600, 250, 250, 500, 450, 300, 400, 200]
						}],

						plotOptions: {
							bar: {
								columnWidth: "28%",
								endingShape: "rounded",
								startingShape: "rounded",
								borderRadius: 3,

								colors: {
									backgroundBarColors: ['#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9'],
									backgroundBarOpacity: 1,
									backgroundBarRadius: 5,
								},

							},
							distributed: true
						},

						colors: ['#216FED'],
						grid: {
							show: false,
						},
						legend: {
							show: false
						},
						fill: {
							opacity: 1
						},
						dataLabels: {
							enabled: false,
							colors: ['#000'],
							dropShadow: {
								enabled: true,
								top: 1,
								left: 1,
								blur: 1,
								opacity: 1
							}
						},
						stroke: {
							show: true,
							lineCap: 'rounded',
						},
						xaxis: {
							categories: ['06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28'],
							labels: {
								style: {
									colors: '#808080',
									fontSize: '13px',
									fontFamily: 'poppins',
									fontWeight: 100,
									cssClass: 'apexcharts-xaxis-label',
								},
							},
							crosshairs: {
								show: false,
							},
							axisBorder: {
								show: false,
							},
							axisTicks: {
								show: false,
							},

						},
						yaxis: {
							labels: {
								style: {
									colors: '#808080',
									fontSize: '14px',
									fontFamily: 'Poppins',
									fontWeight: 100,

								},
								formatter: function(y) {
									return y.toFixed(0) + "k";
								}
							},
						},
						tooltip: {
							x: {
								show: true
							}
						},
						responsive: [{
							breakpoint: 575,
							options: {
								chart: {
									height: 250,
								},
								series: [{
									name: "New Clients",
									data: [300, 250, 600, 600, 400, 450, 310, 470, 480]
								}],
								xaxis: {
									categories: ['06', '07', '08', '09', '10', '11', '12', '13', '14'],
								}
							}
						}]
					};
					var chartTimelineRender = new ApexCharts(document.querySelector("#chartTimeline1"), optionsTimeline);
					chartTimelineRender.render();
				}
				var chartTimeline2 = function() {

					var optionsTimeline = {
						chart: {
							type: "bar",
							height: 200,
							stacked: true,
							toolbar: {
								show: false
							},
							sparkline: {
								//enabled: true
							},
							offsetX: -10,
						},
						series: [{
							name: "New Clients",
							data: [300, 250, 600, 600, 400, 450, 310, 470, 480, 700, 600, 800, 200, 600, 350, 250, 500, 350, 300, 200, 200]
						}],

						plotOptions: {
							bar: {
								columnWidth: "28%",
								borderRadius: 6,

								colors: {
									backgroundBarColors: ['#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9'],
									backgroundBarOpacity: 1,
									backgroundBarRadius: 5,
								},

							},
							distributed: true
						},

						colors: ['#216FED'],
						grid: {
							show: false,
						},
						legend: {
							show: false
						},
						fill: {
							opacity: 1
						},
						dataLabels: {
							enabled: false,
							colors: ['#000'],
							dropShadow: {
								enabled: true,
								top: 1,
								left: 1,
								blur: 1,
								opacity: 1
							}
						},
						stroke: {
							show: true,
							lineCap: 'rounded',
						},
						xaxis: {
							categories: ['06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28'],
							labels: {
								style: {
									colors: '#808080',
									fontSize: '13px',
									fontFamily: 'poppins',
									fontWeight: 100,
									cssClass: 'apexcharts-xaxis-label',
								},
							},
							crosshairs: {
								show: false,
							},
							axisBorder: {
								show: false,
							},
							axisTicks: {
								show: false,
							},

						},
						yaxis: {
							labels: {
								style: {
									colors: '#808080',
									fontSize: '14px',
									fontFamily: 'Poppins',
									fontWeight: 100,

								},
								formatter: function(y) {
									return y.toFixed(0) + "k";
								}
							},
						},
						tooltip: {
							x: {
								show: true
							}
						},
						responsive: [{
							breakpoint: 575,
							options: {
								chart: {
									height: 250,
								},
								series: [{
									name: "New Clients",
									data: [300, 250, 600, 600, 400, 450, 310, 470, 480]
								}],
								xaxis: {
									categories: ['06', '07', '08', '09', '10', '11', '12', '13', '14'],
								}
							}
						}]
					};
					var chartTimelineRender = new ApexCharts(document.querySelector("#chartTimeline2"), optionsTimeline);
					chartTimelineRender.render();
				}
				var marketChart = function() {
					var options = {
						series: [{
							name: 'series1',
							data: [200, 300, 200, 300, 200, 300, 200, 300]
						}, {
							name: 'series2',
							data: [600, 700, 600, 500, 600, 900, 500, 900]
						}],
						chart: {
							height: 350,
							type: 'line',
							toolbar: {
								show: false
							}
						},
						colors: ["#37D159", "#216FED"],
						dataLabels: {
							enabled: false
						},
						stroke: {
							curve: 'smooth',
							width: 10,
						},
						legend: {
							show: false
						},
						grid: {
							borderColor: '#AFAFAF',
							strokeDashArray: 10,
						},
						yaxis: {
							labels: {
								style: {
									colors: '#787878',
									fontSize: '13px',
									fontFamily: 'Poppins',
									fontWeight: 400

								},
								formatter: function(value) {
									return value + "k";
								}
							},
						},
						xaxis: {
							categories: ["April", "May", "June", "July", "August", "September", "October", "November"],
							labels: {
								style: {
									colors: '#787878',
									fontSize: '13px',
									fontFamily: 'Poppins',
									fontWeight: 400

								},
							},
							axisBorder: {
								show: false,
							},
							axisTicks: {
								show: false,
							},

						},
						tooltip: {
							x: {
								format: 'dd/MM/yy HH:mm'
							},
						},
					};

					var chart = new ApexCharts(document.querySelector("#marketChart"), options);
					chart.render();
				}
				var pieChart2 = function() {
					var options = {
						series: [<?php echo $total_tsit_sold ?>, <?php echo $available_tsit_supply_amount; ?>],
						chart: {
							type: 'donut',
							height: 250
						},
						dataLabels: {
							enabled: false
						},
						stroke: {
							width: 0,
						},
						colors: ['#0000FF', '#ff0000'],
						labels: [
							'TSIT Sold',
							'Available TSIT',
						],
						legend: {
							position: 'bottom',
							show: false
						},
						responsive: [{
							breakpoint: 768,
							options: {
								chart: {
									height: 200
								},

							}
						}]
					};

					var chart = new ApexCharts(document.querySelector("#pieChart2"), options);
					chart.render();

				}



				/* Function ============ */
				return {
					init: function() {},


					load: function() {
						donutChart1();
						chartTimeline();
						chartTimeline1();
						chartTimeline2();
						marketChart();
						pieChart2();

					},

					resize: function() {}
				}

			}();



			jQuery(window).on('load', function() {
				setTimeout(function() {
					dzChartlist.load();
				}, 2000);

			});



		})(jQuery);
	</script>
</body>

</html>