<?php
session_start();
require_once '../database/db-con.php';
?>
<?php
if (isset($_SESSION['user_session_var'])) {
    $user_id = $_SESSION['user_session_var'];
} else {
    header('location:../auth/login.php');
}
$user_query = "SELECT * FROM `users` WHERE `id` = $user_id";
$run_fetch = mysqli_query($con, $user_query);
$user_data = mysqli_fetch_assoc($run_fetch);

if($user_data['email_verification'] == 0){
   echo "<script>window.location='../utility/email-not-verified.php';</script>";
}

?>
<?php
   function time_Ago($time) {
     
       // Calculate difference between current
       // time and given timestamp in seconds
       $diff     = time() - $time;
         
       // Time difference in seconds
       $sec     = $diff;
         
       // Convert time difference in minutes
       $min     = round($diff / 60 );
         
       // Convert time difference in hours
       $hrs     = round($diff / 3600);
         
       // Convert time difference in days
       $days     = round($diff / 86400 );
         
       // Convert time difference in weeks
       $weeks     = round($diff / 604800);
         
       // Convert time difference in months
       $mnths     = round($diff / 2600640 );
         
       // Convert time difference in years
       $yrs     = round($diff / 31207680 );
         
       // Check for seconds
       if($sec <= 60) {
           echo "$sec seconds ago";
       }
         
       // Check for minutes
       else if($min <= 60) {
           if($min==1) {
               echo "one minute ago";
           }
           else {
               echo "$min minutes ago";
           }
       }
         
       // Check for hours
       else if($hrs <= 24) {
           if($hrs == 1) { 
               echo "an hour ago";
           }
           else {
               echo "$hrs hours ago";
           }
       }
         
       // Check for days
       else if($days <= 7) {
           if($days == 1) {
               echo "Yesterday";
           }
           else {
               echo "$days days ago";
           }
       }
         
       // Check for weeks
       else if($weeks <= 4.3) {
           if($weeks == 1) {
               echo "a week ago";
           }
           else {
               echo "$weeks weeks ago";
           }
       }
         
       // Check for months
       else if($mnths <= 12) {
           if($mnths == 1) {
               echo "a month ago";
           }
           else {
               echo "$mnths months ago";
           }
       }
         
       // Check for years
       else {
           if($yrs == 1) {
               echo "one year ago";
           }
           else {
               echo "$yrs years ago";
           }
       }
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
      <title>Scam Mining - Tesla INU</title>
      <!-- FAVICONS ICON -->
      <link rel="shortcut icon" type="image/png" href="../assets/images/favicon.png" />
      <link href="../assets/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
      <link rel="stylesheet" href="../assets/vendor/dotted-map/css/contrib/jquery.smallipop-0.3.0.min.css" type="text/css" media="all" />
      <!-- Style css -->
      <link href="../assets/css/style.css" rel="stylesheet">
      <!-- Datatable -->
      <link href="../assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
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
                  <h2 class="mb-3 me-auto">Scam Mining</h2>
                  <div>
                  </div>
               </div>
               <div class="row">
                  <?php
                     $query = "SELECT * FROM `scams` WHERE `superadmin_approval` = 1 AND `is_active` = 1  ORDER BY `id` DESC";
                     $run_fetch = mysqli_query($con, $query);
                     $noofrow = mysqli_num_rows($run_fetch);
                     if ($noofrow > 0 && $run_fetch == TRUE) {
                         while ($data = mysqli_fetch_assoc($run_fetch)) {


                           //request server for already vote 
                           $scam_id = $data['id'];
                           $query2 = "SELECT `vote` FROM `votes` WHERE `voter_id` = $user_id AND `scam_id` = $scam_id";
                           $run_fetch2 = mysqli_query($con, $query2);
                           $no_of_row2  = mysqli_num_rows($run_fetch2);

                           if($no_of_row2 > 0){

                              ?>
  <div class="col-md-4">
                     <div class="card">
                        <?php 
                           $screenshot_of_chat            = $data['screenshot_of_chat'];
                           
                           $screenshot_of_chat_array = explode (",", $screenshot_of_chat);  
                           $no_of_screenshot_of_chat =  sizeof($screenshot_of_chat_array);
                           for($i= 0; $i < 1; $i++){
                                                                   
                           $akc_screenshot_of_chat = trim($screenshot_of_chat_array[$i]);
                           
                           
                           ?>
                        <img class="card-img-top img-fluid" src="../uploads/scam/scam-documents/<?php echo $akc_screenshot_of_chat; ?>" style="max-height: 400px !important;" alt="Scam Chat Image">
                        <?php
                           }
                           ?>
                        <div class="card-body">
                           <div class="post-details">
                              <h3 class="mb-2 text-black"><?php echo $data['name'] ?></h3>
                              <ul class="mb-4 post-meta d-flex flex-wrap">
                                 <li class="post-date me-3"><i class="far fa-calendar-plus me-2"></i>
                                    <?php
                                       time_Ago($data['timestamp']);
                                       ?>
                                 </li>
                              </ul>
                           </div>
                           <div class="row">
                              <div class="col-12">
                                 <p class="card-text"><strong>Wallet: </strong><?php echo $data['wallet_address']; ?></p>
                                 <p class="card-text"><?php echo $data['other_information']?></p>
                                 <a href="../scam/view-scam.php?id=<?php echo $data['id']?>" class="btn btn-outline-primary " style="float:right;">View Details</a>
                              </div>
                           </div>
                           <hr>
                           <?php
                              //request server for already vote 
                              $scam_id = $data['id'];
                              $query1 = "SELECT `vote` FROM `votes` WHERE `voter_id` = $user_id AND `scam_id` = $scam_id";
                              $run_fetch1 = mysqli_query($con, $query1);
                              $no_of_row1  = mysqli_num_rows($run_fetch1);
                              if ($no_of_row1 >0 && $run_fetch1 == TRUE){
                                  while ($data1 = mysqli_fetch_assoc($run_fetch1)) {
                                      $vote = $data1['vote'];
                                      if($vote == 1){
                              ?>
                           <div class="row pt-3">
                              <div class="col-6 text-center">
                                 <a href="add-vote.php?id=<?php echo $data['id']; ?>&vote=1">
                                 <i class="fas fa-thumbs-up"  style="font-size:30px; color: #68e365 !important; cursor:pointer;"></i>
                                 </a>
                              </div>
                              <div class="col-6 text-center">
                                 <a href="add-vote.php?id=<?php echo $data['id']; ?>&vote=0">
                                 <i class="far fa-thumbs-down" style="font-size:30px; color: #f72b50 !important; cursor:pointer;"></i>
                                 </a>
                              </div>
                           </div>
                           <?php
                              }else{
                                  ?>
                           <div class="row pt-3">
                              <div class="col-6 text-center">
                                 <a href="add-vote.php?id=<?php echo $data['id']; ?>&vote=1">
                                 <i class="far fa-thumbs-up"  style="font-size:30px; color: #68e365 !important; cursor:pointer;"></i>
                                 </a>
                              </div>
                              <div class="col-6 text-center">
                                 <a href="add-vote.php?id=<?php echo $data['id']; ?>&vote=0">
                                 <i class="fas fa-thumbs-down" style="font-size:30px; color: #f72b50 !important; cursor:pointer;"></i>
                                 </a>
                              </div>
                           </div>
                           <?php
                              }
                              }
                              }else{
                              ?>
                           <div class="row pt-3">
                              <div class="col-6 text-center">
                                 <a href="add-vote.php?id=<?php echo $data['id']; ?>&vote=1">
                                 <i class="far fa-thumbs-up"  style="font-size:30px; color: #68e365 !important; cursor:pointer;"></i>
                                 </a>
                              </div>
                              <div class="col-6 text-center">
                                 <a href="add-vote.php?id=<?php echo $data['id']; ?>&vote=0">
                                 <i class="far fa-thumbs-down" style="font-size:30px; color: #f72b50 !important; cursor:pointer;"></i>
                                 </a>
                              </div>
                           </div>
                           <?php
                              }
                              
                              
                              ?>
                        </div>
                     </div>
                  </div>
                              <?php

                           }
                           
                        
                     }
                     }
                     ?>
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
      <script src="../assets/vendor/global/global.min.js"></script>
      <script src="../assets/vendor/chart.js/Chart.bundle.min.js"></script>
      <script src="../assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
      <!-- Apex Chart -->
      <script src="../assets/vendor/apexchart/apexchart.js"></script>
      <!-- Chart piety plugin files -->
      <script src="../assets/vendor/peity/jquery.peity.min.js"></script>
      <!-- Dashboard 1 -->
      <script src="../assets/js/dashboard/dashboard-1.js"></script>
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
      <!-- Datatable -->
      <script src="../assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
      <script src="../assets/js/plugins-init/datatables.init.js"></script>
   </body>
</html>