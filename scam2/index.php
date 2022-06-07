<?php 
	require_once 'database/db-con.php';
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from ventic.dexignzone.com/xhtml/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Aug 2021 10:30:56 GMT -->

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Ventic : Ticketing Admin Template" />
	<meta property="og:title" content="Ventic : Ticketing Admin Template" />
	<meta property="og:description" content="Ventic : Ticketing Admin Template" />
	<meta property="og:image" content="" />
	<meta name="format-detection" content="telephone=no">

	<!-- PAGE TITLE HERE -->
	<title>Ventic : Ticketing Admin Template</title>

	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="images/favicon.png" />

	<link rel="stylesheet" href="vendor/chartist/css/chartist.min.css">
	<link href="vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
	<link href="vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
	<!-- Style css -->
	<link href="css/style.css" rel="stylesheet">

</head>

<body>

	<!--*******************
        Preloader start
    ********************-->
	<div id="preloader">
        <div class="loader">
            <div class="loader--dot"></div>
            <div class="loader--dot"></div>
            <div class="loader--dot"></div>
            <div class="loader--dot"></div>
            <div class="loader--dot"></div>
            <div class="loader--dot"></div>
            <div class="loader--text"></div>
        </div>
    </div>  
	<!--*******************
        Preloader end
    ********************-->

	<!--**********************************
        Main wrapper start
    ***********************************-->
	<div id="main-wrapper">

		<!--**********************************
            Nav header start
        ***********************************-->
		<div class="nav-header">
			<a href="index.php" class="brand-logo">
				<svg class="logo-abbr" width="54" height="54" viewBox="0 0 54 54" fill="none">
					<rect class="svg-logo-rect" width="54" height="54" rx="14" fill="#0E8A74" />
					<path class="svg-logo-path" d="M13 17H24.016L31.802 34.544L38.33 17H40.948L31.972 40.8H23.54L13 17Z"
						fill="white" />
				</svg>
				<svg class="brand-title" width="97" height="25" fill="none">
					<path class="svg-logo-text"
						d="M20.88 3.06L13.2 24H8.1L.42 3.06h4.5l5.76 16.65 5.73-16.65h4.47zm17.968 12.27c0 .6-.04 1.14-.12 1.62h-12.15c.1 1.2.52 2.14 1.26 2.82s1.65 1.02 2.73 1.02c1.56 0 2.67-.67 3.33-2.01h4.53c-.48 1.6-1.4 2.92-2.76 3.96-1.36 1.02-3.03 1.53-5.01 1.53-1.6 0-3.04-.35-4.32-1.05-1.26-.72-2.25-1.73-2.97-3.03-.7-1.3-1.05-2.8-1.05-4.5 0-1.72.35-3.23 1.05-4.53s1.68-2.3 2.94-3 2.71-1.05 4.35-1.05c1.58 0 2.99.34 4.23 1.02 1.26.68 2.23 1.65 2.91 2.91.7 1.24 1.05 2.67 1.05 4.29zm-4.35-1.2c-.02-1.08-.41-1.94-1.17-2.58-.76-.66-1.69-.99-2.79-.99-1.04 0-1.92.32-2.64.96-.7.62-1.13 1.49-1.29 2.61h7.89zm16.626-6.99c1.98 0 3.58.63 4.8 1.89 1.22 1.24 1.83 2.98 1.83 5.22V24h-4.2v-9.18c0-1.32-.33-2.33-.99-3.03-.66-.72-1.56-1.08-2.7-1.08-1.16 0-2.08.36-2.76 1.08-.66.7-.99 1.71-.99 3.03V24h-4.2V7.38h4.2v2.07c.56-.72 1.27-1.28 2.13-1.68.88-.42 1.84-.63 2.88-.63zm15.514 3.69v8.04c0 .56.13.97.39 1.23.28.24.74.36 1.38.36h1.95V24h-2.64c-3.54 0-5.31-1.72-5.31-5.16v-8.01h-1.98V7.38h1.98V3.27h4.23v4.11h3.72v3.45h-3.72zm8.871-5.43c-.74 0-1.36-.23-1.86-.69-.48-.48-.72-1.07-.72-1.77s.24-1.28.72-1.74c.5-.48 1.12-.72 1.86-.72s1.35.24 1.83.72c.5.46.75 1.04.75 1.74s-.25 1.29-.75 1.77c-.48.46-1.09.69-1.83.69zm2.07 1.98V24h-4.2V7.38h4.2zm3.07 8.31c0-1.72.35-3.22 1.05-4.5.7-1.3 1.67-2.3 2.91-3 1.24-.72 2.66-1.08 4.26-1.08 2.06 0 3.76.52 5.1 1.56 1.36 1.02 2.27 2.46 2.73 4.32h-4.53c-.24-.72-.65-1.28-1.23-1.68-.56-.42-1.26-.63-2.1-.63-1.2 0-2.15.44-2.85 1.32-.7.86-1.05 2.09-1.05 3.69 0 1.58.35 2.81 1.05 3.69.7.86 1.65 1.29 2.85 1.29 1.7 0 2.81-.76 3.33-2.28h4.53c-.46 1.8-1.37 3.23-2.73 4.29s-3.06 1.59-5.1 1.59c-1.6 0-3.02-.35-4.26-1.05-1.24-.72-2.21-1.72-2.91-3-.7-1.3-1.05-2.81-1.05-4.53z"
						fill="#194039" />
				</svg>
			</a>
		</div>
		<!--**********************************
            Nav header end
        ***********************************-->

		<!--**********************************
            Header start
        ***********************************-->
		<div class="header">
			<div class="header-content">
				<nav class="navbar navbar-expand">
					<div style="width: 100%;">
						<div style="width: 33.33%; float: left;">
							<a href="" class="btn-hover" style="padding: 10px;">Top Scam</a> 
						</div>
						<div style="width: 33.33%; float: left;">
							<a href="#top-miners" class="btn-hover" style="padding: 10px;">Top Miners</a> 
						</div>
						<div style="width: 33.33%; float: left;">
							<a href="" class="btn-hover" style="padding: 10px;">About</a> 
						</div>
					</div>
					<div style="width: 100%;">
						<div style="float: right;">
							<a href="" class="btn-hover" style="padding: 10px;"> Log in</a>
						</div>
					</div>
				</nav>
			</div>
		</div>
		<!--**********************************
            Header end ti-comment-alt
        ***********************************-->


		<!--**********************************
            Content body start
        ***********************************-->
		<div class="content-body">
			<!-- row -->
			<form  action="search-result.php">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-12">
						<div class="row">
							<div class="col-xl-12">
								<div class="card bg-primary">
									<div class="card-body">
										<span class="chart-num-3 font-w200 d-block mb-sm-3 mb-2 text-white">Search
											Here</span>
											<div class="input-group search-area2 d-xl-inline-flex mb-2 me-4">
												<button type="submit" class="input-group-text"><i
															class="flaticon-381-search-2 text-primary"></i></button>
												<input name="search" type="text" class="form-control" placeholder="Search Scams">
											</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			</form>
			<!--**********************************
            Begin:: Main Body of Card
        ***********************************-->
			<div class="container">

				<!--**********************************
            Begin:: Top Scam Card
        ***********************************-->
				<div class="row">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header border-0 pb-0">
								<div class="d-flex align-items-center">
									<h2 class="chart-num font-w600 mb-0">Top Scams</h2>
								</div>
							</div>
							<div class="card-body pt-0">
								<div class="card">
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-responsive-md">
												<thead>
													<tr>
														<th style="width:80px;"><strong>#</strong></th>
														<th><strong>Name</strong></th>
														<th><strong>Total Amount</strong></th>
														<th><strong>Wallet Address</strong></th>
														<th><strong>Description</strong></th>
														<th><strong>Action</strong></th>
														<th></th>
													</tr>
												</thead>
												<tbody>
												<?php
                                                    $query1    = "SELECT * FROM `scams`";
                                                    $runquery1 = mysqli_query($con, $query1);
                                                    $rows1     = mysqli_num_rows($runquery1);

                                                     if ($rows1 > 0 && $runquery1 == TRUE) { 
                                                        while ($data1 = mysqli_fetch_assoc($runquery1)) { 
																$scam_id = $data1['id'];
																$scam_name = $data1['name'];
																$scam_wallet_address = $data1['wallet_address'];
																$scam_other_info = $data1['other_information'];
                                                            ?>
													<tr>
														<td><strong><?php echo $scam_id; ?></strong></td>
														<td> <?php echo $scam_name; ?> </td>
														<td>Not Applyed</td>
														<td><?php echo $scam_wallet_address; ?> </td>
														<td><?php echo $scam_other_info; ?> </td>
														<td>
															<div class="dropdown">
																<button type="button" class="btn btn-success light sharp" data-bs-toggle="dropdown">
																	<svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
																</button>
																<div class="dropdown-menu">
																	<a class="dropdown-item" href="scam_view.php?id=<?php echo $scam_id;?>">View</a>
																</div>
															</div>
														</td>
													</tr>
													<?php
														}
													}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
		<!--**********************************
            End:: Top Scam Card
        ***********************************-->

		<!--**********************************
            Begin:: Top Scam Miner Card
        ***********************************-->
				<div class="row" id="top-miners">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header border-0 pb-0">
								<div class="d-flex align-items-center">
									<h2 class="chart-num font-w600 mb-0">Top Scam Miners</h2>
								</div>
							</div>
							<div class="card-body pt-0">
								<div class="card">
										<div class="row">
											<div class="col-xl-4">
												<div class="card card-xl-stretch mb-5 mb-xl-0">
													<!--begin::Body-->
													<div class="card-body d-flex flex-column pb-10 pb-lg-15">
														<div class="flex-grow-1">
															<!--begin::Info-->
															<div class="d-flex align-items-center pe-2 mb-5">
																<div class="media">
																		<img src="images/profile/5.jpg" class="h-50 align-self-center" alt="" />
																</div>
																<a href="#">
																<span href="#" class="text-light fw-bolder fs-4" style="margin-left: 20px;">User Name</span></a>
															</div>
															<!--end::Info-->
															<!--begin::Link-->
															<span class="text-muted fw-bold fs-5 flex-grow-1">Total Earning</span>
															<!--end::Link-->
															<!--begin::Desc-->
															<p class="py-3"><span class="text-dark fw-bold d-block fs-7" style="margin-top: -5px; margin-bottom: 5px;">10M TSIT</span>
															<br /><span class="text-muted fw-bold text-muted fs-7" style="color: green !important;">+1.25%</span></p>
															<!--end::Desc-->
														</div>
														<!--begin::Team-->
														<div class="d-flex align-items-center">
															<button type="button" class="btn btn-primary ">Verified Scams</button>
														</div>
														<!--end::Team-->
													</div>
													<!--end::Body-->
												</div>
											</div>
											<div class="col-xl-4">
												<div class="card card-xl-stretch mb-5 mb-xl-0">
													<!--begin::Body-->
													<div class="card-body d-flex flex-column pb-10 pb-lg-15">
														<div class="flex-grow-1">
															<!--begin::Info-->
															<div class="d-flex align-items-center pe-2 mb-5">
																<div class="media">
																		<img src="images/profile/5.jpg" class="h-50 align-self-center" alt="" />
																</div>
																<a href="#">
																<span href="#" class="text-light fw-bolder fs-4" style="margin-left: 20px;">User Name</span></a>
															</div>
															<!--end::Info-->
															<!--begin::Link-->
															<span class="text-muted fw-bold fs-5 flex-grow-1">Total Earning</span>
															<!--end::Link-->
															<!--begin::Desc-->
															<p class="py-3"><span class="text-dark fw-bold d-block fs-7" style="margin-top: -5px; margin-bottom: 5px;">10M TSIT</span>
															<br /><span class="text-muted fw-bold text-muted fs-7" style="color: red !important;">+1.25%</span></p>
															<!--end::Desc-->
														</div>
														<!--begin::Team-->
														<div class="d-flex align-items-center">
															<button type="button" class="btn btn-primary ">Verified Scams</button>
														</div>
														<!--end::Team-->
													</div>
													<!--end::Body-->
												</div>
											</div>
											<div class="col-xl-4">
												<div class="card card-xl-stretch mb-5 mb-xl-0">
													<!--begin::Body-->
													<div class="card-body d-flex flex-column pb-10 pb-lg-15">
														<div class="flex-grow-1">
															<!--begin::Info-->
															<div class="d-flex align-items-center pe-2 mb-5">
																<div class="media">
																		<img src="images/profile/5.jpg" class="h-50 align-self-center" alt="" />
																</div>
																<a href="#">
																<span href="#" class="text-light fw-bolder fs-4" style="margin-left: 20px;">User Name</span></a>
															</div>
															<!--end::Info-->
															<!--begin::Link-->
															<span class="text-muted fw-bold fs-5 flex-grow-1">Total Earning</span>
															<!--end::Link-->
															<!--begin::Desc-->
															<p class="py-3"><span class="text-dark fw-bold d-block fs-7" style="margin-top: -5px; margin-bottom: 5px;">10M TSIT</span>
															<br /><span class="text-muted fw-bold text-muted fs-7" style="color: green !important;">+1.25%</span></p>
															<!--end::Desc-->
														</div>
														<!--begin::Team-->
														<div class="d-flex align-items-center">
															<button type="button" class="btn btn-primary ">Verified Scams</button>
														</div>
														<!--end::Team-->
													</div>
													<!--end::Body-->
												</div>
											</div>
										</div>
								</div>
							</div>
						</div>
					</div>
				</div>
		<!--**********************************
            End:: Top Scam Miner Card
        ***********************************-->
			</div>
			
		</div>
		<!--**********************************
            Content body end
        ***********************************-->



		<!--**********************************
            Footer start
        ***********************************-->
		<div class="footer">

			<div class="copyright">
				<!-- <p>Copyright © Designed &amp; Developed by <a href="https://dexignzone.com/" -->
						<!-- target="_blank">DexignZone</a> 2021</p> -->
			</div>
		</div>
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
	<script src="vendor/global/global.min.js"></script>
	<script src="vendor/chart.js/Chart.bundle.min.js"></script>
	<script src="vendor/bootstrap-datetimepicker/js/moment.js"></script>
	<!-- <script src="vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script> -->
	<!-- <script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script> -->

	<!-- Chart piety plugin files -->
	<!-- <script src="vendor/peity/jquery.peity.min.js"></script> -->

	<!-- Apex Chart -->
	<!-- <script src="vendor/apexchart/apexchart.js"></script> -->

	<!-- Dashboard 1 -->
	<!-- <script src="js/dashboard/dashboard-1.js"></script> -->

	<script src="js/custom.min.js"></script>
	<!-- <script src="js/demo.js"></script>	 -->
	<script src="js/deznav-init.js"></script>


</body>

</html>