<?php
   session_start();
   require_once '../../database/db-con.php';
   ?>
<?php
   if (isset($_SESSION['admin_session_var'])) {
       $user_id = $_SESSION['admin_session_var'];
   
       $user_query = "SELECT * FROM `users` WHERE `id` = $user_id";
       $run_fetch = mysqli_query($con, $user_query);
       $user_data = mysqli_fetch_assoc($run_fetch);
   
    if($user_data['email_verification'] == 0){
   echo "<script>window.location='../utility/email-not-verified.php';</script>";
   }
   }else {
       ?>
<script>
   window.location='../../auth/login.php';
</script>
<?php
   }
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
      <title>Tesla INU | Superadmin - Dashboard</title>
      <!-- FAVICONS ICON -->
      <link rel="shortcut icon" type="image/png" href="../../assets/images/favicon.png" />
      <link href="../../assets/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
      <link rel="stylesheet" href="../../assets/vendor/dotted-map/css/contrib/jquery.smallipop-0.3.0.min.css" type="text/css" media="all" />
      <!-- Style css -->
      <link href="../../assets/css/style.css" rel="stylesheet">
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
      <?php require('../elements/header.php');?>
      <!--**********************************
         Sidebar start
         ***********************************-->
      <?php require('../elements/sidebar.php');?>
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
                     <li class="breadcrumb-item"><a href="index.php">Superadmin</a></li>
                     <li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
                  </ol>
               </div>
            </div>
            <?php
               //getting sccam details 
               
               $total_scams = 0;
               $active_mining = 0;
               $pending_approval = 0;
               
               //gettinng total sccams
               $query1 = "SELECT `id` FROM `scams` WHERE  `mining_result`  = 1";
               $run_fetch1 = mysqli_query($con, $query1);
               $no_of_row1  = mysqli_num_rows($run_fetch1);
               $total_scams =  $no_of_row1;
               
               //getting active miningg
               $query1 = "SELECT `id` FROM `scams` WHERE  `is_active`  = 1";
               $run_fetch1 = mysqli_query($con, $query1);
               $no_of_row1  = mysqli_num_rows($run_fetch1);
               $active_mining =  $no_of_row1;
               
               //getting pendin Scams
               
               $query1 = "SELECT `id` FROM `scams` WHERE  `superadmin_approval`  = 0 AND `superadmin_rejected` = 0";
               $run_fetch1 = mysqli_query($con, $query1);
               $no_of_row1  = mysqli_num_rows($run_fetch1);
               $pending_approval =  $no_of_row1;
               
               
               
               			?>
            <h3>Scam Details</h3>
            <hr>
            <div class="row">
               <div class="col-xl-4 col-sm-12">
                  <div class="card">
                     <div class="card-body d-flex align-items-center justify-content-between">
                        <div class="card-data me-2">
                           <h5>Total Scams</h5>
                           <h2 class="fs-40 font-w600"><?php echo $total_scams; ?></h2>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-4 col-sm-12">
                  <div class="card">
                     <div class="card-body d-flex align-items-center justify-content-between">
                        <div class="card-data me-2">
                           <h5>Active Mining</h5>
                           <h2 class="fs-40 font-w600"><?php echo $active_mining; ?></h2>
                        </div>
                        <div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-4 col-sm-12">
                  <div class="card">
                     <div class="card-body d-flex align-items-center justify-content-between">
                        <div class="card-data me-2">
                           <h5>Pending Approval</h5>
                           <h2 class="fs-40 font-w600"><?php echo $pending_approval; ?></h2>
                        </div>
                        <div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-xl-9 col-xxl-12">
                  <div class="row">
                     <div class="col-xl-4 col-xxl-4">
                        <div class="card">
                           <div class="card-header border-0">
                              <h4 class="fs-20">Approved Scams</h4>
                           </div>
                           <div class="card-body pt-0 text-center">
                              <div id="pieChart2" class="d-inline-block pieChart1"></div>
                              <div class="chart-items">
                                 <div class=" col-xl-12 col-sm-12">
                                    <div class="row text-black text-start mt-4 chart-link">
                                       <!-- <span class="mb-2 col-6">
                                          <svg class="me-2" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          	<rect width="19" height="19" rx="9.5" fill="#1EAAE7"/>
                                          </svg>
                                          Sale Properties
                                          </span>
                                          <span class="mb-2 col-6">
                                          <svg class="me-1" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          	<rect width="19" height="19" rx="9.5" fill="#FF7A30"/>
                                          </svg>
                                          Rented Properties
                                          </span>
                                          <span class="mb-2 col-6">
                                          <svg class="me-2" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          	<rect width="19" height="19" rx="9.5" fill="#6418C3"/>
                                          </svg>
                                          
                                          Purple Card
                                          </span> -->
                                       <span class="mb-2 col-6">
                                          <svg class="me-2" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                             <rect width="19" height="19" rx="9.5" fill="#FF0000"/>
                                          </svg>
                                          Pending Approval
                                       </span>
                                       <span class="mb-2 col-6">
                                          <svg class="me-2" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                             <rect width="19" height="19" rx="9.5" fill="#0000FF"/>
                                          </svg>
                                          Active Mining
                                       </span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xd-4 col-xxl-8">
                        <div class="col-xl-12 col-lg-6">
                           <div class="card">
                              <div class="card-header">
                                 <h4 class="card-title">Users</h4>
                                 <scam class="card-title-desc">Here you can see all the users on the TSIT portal</scam>
                              </div>
                              <div class="card-body">
                                 <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px;">
                                       <thead>
                                          <tr>
                                             <th>#</th>
                                             <th>Scam ID</th>
                                             <th>Reported By</th>
                                             <th>Scam Description</th>
                                             <th class="text-center">View </th>
                                             <th class="text-center"> Approve</th>
                                             <th class="text-center"> Reject</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <?php
                                             $query1 = "SELECT * FROM `scams` WHERE `superadmin_approval` = 0 AND `superadmin_rejected` = 0 LIMIT 5";                                             
                                             $runquery1 = mysqli_query($con, $query1);                                             
                                             $rows1 = mysqli_num_rows($runquery1);
                                             $indexing1 = 1;
                                             if ($rows1 >
                                                   0 && $runquery1 == TRUE) { while ($data1 = mysqli_fetch_assoc($runquery1)) { ?>
                                          <tr>
                                             <td><?php echo $indexing1; ?></td>
                                             <td><?php echo $data1['id']; ?></td>
                                             <td><?php 
                                                echo '#'.$data1['reported_by']; 
                                                echo '<br>';
                                                $reported_by = $data1['reported_by'];
                                                $query2 = "SELECT * FROM `users` WHERE `id` = $reported_by";                                             
                                                $runquery2 = mysqli_query($con, $query2);                                             
                                                $rows2 = mysqli_num_rows($runquery2);
                                                $indexing2 = 2;
                                                if ($rows2 > 0 && $runquery2 == TRUE) { 
                                                    while ($data2 = mysqli_fetch_assoc($runquery2)) {
                                                        echo $data2['email'];
                                                      }
                                                    }
                                                ?></td>
                                             <td><?php echo $data1['other_information']; ?></td>
                                             <td class="text-center">
                                                <a href="../scam/view-scam.php?id=<?php echo $data1['id']; ?>">
                                                <i class="far fa-eye"  style="color: #943eff !important; cursor:pointer;" class="text-info"></i>
                                                </a>
                                             </td>
                                             <td class="text-center">
                                                <?php 
                                                   if($data1['superadmin_approval']  == NULL || $data1['superadmin_approval'] == "" || $data1['superadmin_approval'] == 0){
                                                    ?>
                                                <a href="edit/scam-approve.php?id=<?php echo $data1['id']; ?>"  title="Approve Scam">
                                                <i class="far fa-thumbs-up"  style="color: #68e365 !important; cursor:pointer;"></i>
                                                </a>
                                                <?php
                                                   }
                                                       ?>
                                             </td>
                                             <td class="text-center">
                                                <?php 
                                                   if($data1['superadmin_approval']  == NULL || $data1['superadmin_approval'] == "" || $data1['superadmin_approval'] == 0){
                                                    ?>
                                                <a href="edit/scam-reject.php?id=<?php echo $data1['id']; ?>" title="Reject Scam">
                                                <i class="far fa-thumbs-down"  style="color: #f72b50 !important; cursor:pointer;"></i>
                                                </a>
                                                <?php
                                                   }
                                                       ?>
                                             </td>
                                          </tr>
                                          <?php
                                             $indexing1++;
                                             }}
                                             ?>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <!-- <div class="col-xl-6">
                        <div class="card">
                        	<div class="card-body pb-3">
                        		<p class="mb-2 d-flex  fs-16 text-black font-w500">Product Viewed
                        			<span class="ms-auto text-dark fs-14 font-w400">561/days</span>
                        		</p>
                        		<div class="progress mb-4" style="height:18px">
                        			<div class="progress-bar bg-primary progress-animated" style="width:60%; height:18px;" role="progressbar">
                        				<span class="sr-only">60% Complete</span>
                        			</div>
                        		</div>
                        		<p class="mb-2 d-flex  fs-16 text-black font-w500">Product Listed
                        			<span class="ms-auto text-dark fs-14 font-w400">3,456 Unit</span>
                        		</p>
                        		<div class="progress mb-3" style="height:18px">
                        			<div class="progress-bar bg-primary progress-animated" style="width:90%; height:18px;" role="progressbar">
                        				<span class="sr-only">90% Complete</span>
                        			</div>
                        		</div>
                        		<p class="mb-2 d-flex  fs-16 text-black font-w500">Reviews
                        			<span class="ms-auto text-dark fs-14 font-w400">456 Comment</span>
                        		</p>
                        		<div class="progress mb-3" style="height:18px">
                        			<div class="progress-bar bg-primary progress-animated" style="width:50%; height:18px;" role="progressbar">
                        				<span class="sr-only">50% Complete</span>
                        			</div>
                        		</div>
                        	</div>
                        </div>
                        </div>
                        </div> -->
                  </div>
               </div>
            </div>
            <?php 
               $total_transactions =  0;
               $total_withdraw = 0;
               $total_rewards = 0;
               
               //total transactions
               $query1 = "SELECT `id` FROM `transactions`";
               $run_fetch1 = mysqli_query($con, $query1);
               $no_of_row1  = mysqli_num_rows($run_fetch1);
               $total_transactions =  $no_of_row1;
               
               
               //total withdraw 
               $query1 = "SELECT SUM(`amount`) AS `total_withdraw` FROM `transactions` WHERE `transaction_type` = 2  AND `transaction_status` = 1";
               $run_fetch1 = mysqli_query($con, $query1);
               $no_of_row1  = mysqli_num_rows($run_fetch1);
               $data1 = mysqli_fetch_assoc($run_fetch1);
               $total_withdraw = $data1['total_withdraw'];
               if($total_withdraw == ""){
               	$total_withdraw = 0;
               }
               
               
               //total Rewards
               $query2 = "SELECT SUM(`amount`) AS `total_rewards` FROM `transactions` WHERE `transaction_type` IN (3,4,5)  AND `transaction_status` = 1";
               $run_fetch2 = mysqli_query($con, $query2);
               $no_of_row2  = mysqli_num_rows($run_fetch2);
               $data2 = mysqli_fetch_assoc($run_fetch2);
               $total_rewards = $data2['total_rewards'];
               if($total_rewards == ""){
               	$total_rewards = 0;
               }
               
               
               
               ?>
            <h3>Transaction Details</h3>
            <hr>
            <div class="row">
               <div class="col-xl-4 col-sm-12">
                  <div class="card">
                     <div class="card-body d-flex align-items-center justify-content-between">
                        <div class="card-data me-2">
                           <h5>Total Transactions</h5>
                           <h2 class="fs-40 font-w600"><?php echo $total_transactions; ?></h2>
                        </div>
                        <div>
                           <span class="donut1" data-peity='{ "fill": ["#ff0000", "rgba(242, 246, 252)"]}'></span>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-4 col-sm-12">
                  <div class="card">
                     <div class="card-body d-flex align-items-center justify-content-between">
                        <div class="card-data me-2">
                           <h5>Total Withdraw</h5>
                           <h2 class="fs-40 font-w600"><?php echo $total_withdraw; ?></h2>
                        </div>
                        <div><span class="donut1" data-peity='{ "fill": ["#0000ff", "rgba(242, 246, 252)"]}'><?php echo $total_withdraw; ?>/<?php echo $total_rewards; ?></span>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-4 col-sm-12">
                  <div class="card">
                     <div class="card-body d-flex align-items-center justify-content-between">
                        <div class="card-data me-2">
                           <h5>Total Rewards Distributed</h5>
                           <h2 class="fs-40 font-w600"><?php echo $total_rewards;; ?></h2>
                        </div>
                        <div>
                           <span class="donut1" data-peity='{ "fill": ["#0000ff", "rgba(242, 246, 252)"]}'><?php echo $total_rewards; ?>/<?php echo $total_withdraw; ?></span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <?php
               //getting stats of registration 
               
               $current_time = time();
               $seconds_in_day = 86400;
               
               
               $total_registration = 0;
               $daily_registration = 0;
               $weekly_registration = 0;
               $monthly_registration = 0;
               
               
               
               //getting all registration 
               $query1 = "SELECT * FROM `users`";
               $run_fetch1 = mysqli_query($con, $query1);
               $no_of_row1  = mysqli_num_rows($run_fetch1);
               $total_registration = $no_of_row1;
               
               
               
               
               //daily registration 
               
               $daily_registration_query_timestamp = $current_time - $seconds_in_day;
               $query2 = "SELECT * FROM `users` WHERE `timestamp` > $daily_registration_query_timestamp";
               $run_fetch2 = mysqli_query($con, $query2);
               $no_of_row2  = mysqli_num_rows($run_fetch2);
               $daily_registration = $no_of_row2;
               
               
               //weekly registration 
               
               $weekly_registration_query_timestamp = $current_time - ($seconds_in_day*7);
               $query2 = "SELECT * FROM `users` WHERE `timestamp` > $weekly_registration_query_timestamp";
               $run_fetch2 = mysqli_query($con, $query2);
               $no_of_row2  = mysqli_num_rows($run_fetch2);
               $weekly_registration = $no_of_row2;
               
               
               
               
               //monthly registration 
               
               $monthly_registration_query_timestamp = $current_time - ($seconds_in_day*30);
               $query2 = "SELECT * FROM `users` WHERE `timestamp` > $monthly_registration_query_timestamp";
               $run_fetch2 = mysqli_query($con, $query2);
               $no_of_row2  = mysqli_num_rows($run_fetch2);
               $monthly_registration = $no_of_row2;
               
               
               ?>
            <h3>Registration Details</h3>
            <hr>
            <div class="row">
               <div class="col-xl-3 col-sm-6">
                  <div class="card">
                     <div class="card-body d-flex align-items-center justify-content-between">
                        <div class="card-data me-2">
                           <h5>Total Users</h5>
                           <h2 class="fs-40 font-w600"><?php echo $total_registration; ?></h2>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-sm-6">
                  <div class="card">
                     <div class="card-body d-flex align-items-center justify-content-between">
                        <div class="card-data me-2">
                           <h5>Todays </h5>
                           <h2 class="fs-40 font-w600"><?php echo $daily_registration; ?></h2>
                        </div>
                        <div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-sm-6">
                  <div class="card">
                     <div class="card-body d-flex align-items-center justify-content-between">
                        <div class="card-data me-2">
                           <h5>This Week </h5>
                           <h2 class="fs-40 font-w600"><?php echo $weekly_registration; ?></h2>
                        </div>
                        <div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-sm-6">
                  <div class="card">
                     <div class="card-body d-flex align-items-center justify-content-between">
                        <div class="card-data me-2">
                           <h5>This Month </h5>
                           <h2 class="fs-40 font-w600"><?php echo $monthly_registration; ?></h2>
                        </div>
                        <div>
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
         <?php require('../elements/footer.php');?>
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
      <script src="../../assets/vendor/global/global.min.js"></script>
      <script src="../../assets/vendor/chart.js/Chart.bundle.min.js"></script>
      <script src="../../assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
      <!-- Apex Chart -->
      <script src="../../assets/vendor/apexchart/apexchart.js"></script>
      <!-- Chart piety plugin files -->
      <script src="../../assets/vendor/peity/jquery.peity.min.js"></script>
      <!-- Dashboard 1 -->
      <!-- <script src="../../assets/js/dashboard/dashboard-1.js"></script> -->
      <!-- JS for dotted map -->
      <script src="../../assets/vendor/dotted-map/js/contrib/jquery.smallipop-0.3.0.min.js"></script>
      <script src="../../assets/vendor/dotted-map/js/contrib/suntimes.js"></script>
      <script src="../../assets/vendor/dotted-map/js/contrib/color-0.4.1.js"></script>
      <script src="../../assets/vendor/dotted-map/js/world.js"></script>
      <script src="../../assets/vendor/dotted-map/js/smallimap.js"></script>
      <script src="../../assets/js/dashboard/dotted-map-init.js"></script>
      <script src="../../assets/js/custom.min.js"></script>
      <script src="../../assets/js/deznav-init.js"></script>
      <script src="../../assets/js/demo.js"></script>
      <!-- <script src="../../assets/js/styleSwitcher.js"></script> -->
      <script>
         (function($) {
             /* "use strict" */
         	
          var dzChartlist = function(){
         	
         	var screenWidth = $(window).width();	
         	var donutChart1 = function(){
         		$("span.donut1").peity("donut", {
         			width: "5.75rem",
         			height: "5.75rem"
         		});
         		$(window).resize(function(){
         			$("span.donut1").peity("donut", {
         				width: "5.75rem",
         				height: "5.75rem"
         			});
         		})
         	}
         	var chartTimeline = function(){
         		
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
         			series: [
         				 {
         					name: "New Clients",
         					data: [300, 450, 600, 600, 400, 450, 410, 470, 480, 700, 600, 800, 400, 600, 350, 250, 500, 550, 300, 400, 200]
         				}
         			],
         			
         			plotOptions: {
         				bar: {
         					columnWidth: "28%",
         					endingShape: "rounded",
         					startingShape: "rounded",
         					borderRadius: 7,
         					
         					colors: {
         						backgroundBarColors: ['#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9'],
         						backgroundBarOpacity: 1,
         						backgroundBarRadius: 5,
         					},
         
         				},
         				distributed: true
         			},
         			
         			colors:['#216FED'],
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
         			stroke:{
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
         			axisTicks:{
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
         				 formatter: function (y) {
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
         					series: [
         						 {
         							name: "New Clients",
         							data: [300, 250, 600, 600, 400, 450],
         						}
         					],
         					
         				}
         			 },
         			 {
         				breakpoint: 575,
         				options: {
         					chart: {
         						height: 250,
         					},
         					series: [
         						 {
         							name: "New Clients",
         							data: [300, 250, 600, 600, 400, 450, 310, 470, 480],
         						}
         					],
         					xaxis: {
         					categories: ['06', '07', '08', '09', '10', '11', '12', '13', '14'],
         					}
         				}
         			 }
         			 
         			 ]
         		};
         		var chartTimelineRender =  new ApexCharts(document.querySelector("#chartTimeline"), optionsTimeline);
         		 chartTimelineRender.render();
         	}
         	var chartTimeline1 = function(){
         		
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
         			series: [
         				 {
         					name: "New Clients",
         					data: [300, 450, 200, 600, 400, 350, 410, 470, 480, 700, 500, 400, 400, 600, 250, 250, 500, 450, 300, 400, 200]
         				}
         			],
         			
         			plotOptions: {
         				bar: {
         					columnWidth: "28%",
         					endingShape: "rounded",
         					startingShape: "rounded",
         					borderRadius: 3,
         					
         					colors: {
         						backgroundBarColors: ['#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9'],
         						backgroundBarOpacity: 1,
         						backgroundBarRadius: 5,
         					},
         
         				},
         				distributed: true
         			},
         			
         			colors:['#216FED'],
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
         			stroke:{
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
         			axisTicks:{
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
         				 formatter: function (y) {
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
         					series: [
         						 {
         							name: "New Clients",
         							data: [300, 250, 600, 600, 400, 450, 310, 470, 480]
         						}
         					],
         					xaxis: {
         					categories: ['06', '07', '08', '09', '10', '11', '12', '13', '14'],
         					}
         				}
         			 }]
         		};
         		var chartTimelineRender =  new ApexCharts(document.querySelector("#chartTimeline1"), optionsTimeline);
         		 chartTimelineRender.render();
         	}
         	var chartTimeline2 = function(){
         		
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
         			series: [
         				 {
         					name: "New Clients",
         					data: [300, 250, 600, 600, 400, 450, 310, 470, 480, 700, 600, 800, 200, 600, 350, 250, 500, 350, 300, 200, 200]
         				}
         			],
         			
         			plotOptions: {
         				bar: {
         					columnWidth: "28%",
         					borderRadius: 6,
         					
         					colors: {
         						backgroundBarColors: ['#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9'],
         						backgroundBarOpacity: 1,
         						backgroundBarRadius: 5,
         					},
         
         				},
         				distributed: true
         			},
         			
         			colors:['#216FED'],
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
         			stroke:{
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
         			axisTicks:{
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
         				 formatter: function (y) {
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
         					series: [
         						 {
         							name: "New Clients",
         							data: [300, 250, 600, 600, 400, 450, 310, 470, 480]
         						}
         					],
         					xaxis: {
         					categories: ['06', '07', '08', '09', '10', '11', '12', '13', '14'],
         					}
         				}
         			 }]
         		};
         		var chartTimelineRender =  new ApexCharts(document.querySelector("#chartTimeline2"), optionsTimeline);
         		 chartTimelineRender.render();
         	}
         	var marketChart = function(){
         		 var options = {
                   series: [{
                   name: 'series1',
                   data: [200, 300, 200, 300, 200, 300, 200,300]
                 }, {
                   name: 'series2',
                   data: [600, 700, 600, 500, 600, 900, 500, 900]
                 }],
                   chart: {
                   height: 350,
                   type: 'line',
         		  toolbar:{
         			  show:false
         		  }
                 },
         		colors:["#37D159","#216FED"],
                 dataLabels: {
                   enabled: false
                 },
                 stroke: {
                   curve: 'smooth',
         		   width: 10,
                 },
         		legend:{
         			show:false
         		},
         		grid:{
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
         			formatter: function (value) {
         			  return value + "k";
         			}
         		  },
         		},
                 xaxis: {
                   categories: ["April","May","June","July","August","September","October","November"],
         		  labels:{
         			  style: {
         				colors: '#787878',
         				fontSize: '13px',
         				fontFamily: 'Poppins',
         				fontWeight: 400
         				
         			},
         		  },
         		  axisBorder:{
         			show:false,  
         		  },
         		  axisTicks:{
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
         	var pieChart2 = function(){
         		 var options = {
                   series: [<?php echo $active_mining; ?>, <?php echo $pending_approval; ?>],
                   chart: {
                   type: 'donut',
         		  height:250
                 },
         		dataLabels:{
         			enabled: false
         		},
         		stroke: {
                   width: 0,
                 },
         		colors:['#0000FF', '#ff0000'],
         		labels: [
                 'Active  Mining',
                 'Pending Approval',
             ],
         		legend: {
                       position: 'bottom',
         			  show:false
                     },
                 responsive: [{
                   breakpoint: 768,
                   options: {
                    chart: {
         			  height:200
         			},
         			
                   }
                 }]
                 };
         
                 var chart = new ApexCharts(document.querySelector("#pieChart2"), options);
                 chart.render();
             
         	}
         	
         	
         	
         	/* Function ============ */
         		return {
         			init:function(){
         			},
         			
         			
         			load:function(){
         				donutChart1();	
         				chartTimeline();
         				chartTimeline1();
         				chartTimeline2();
         				marketChart();
         				pieChart2();
         				
         			},
         			
         			resize:function(){
         			}
         		}
         	
         	}();
         
         	
         		
         	jQuery(window).on('load',function(){
         		setTimeout(function(){
         			dzChartlist.load();
         		}, 2000); 
         		
         	});
         
              
         
         })(jQuery);
         	
      </script>
   </body>
</html>