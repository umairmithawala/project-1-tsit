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
   $run_fetch  = mysqli_query($con, $user_query);
   $user_data  = mysqli_fetch_assoc($run_fetch);
   
   if($user_data['email_verification'] == 0){
      echo "<script>window.location='../utility/email-not-verified.php';</script>";
   }
   ?>
<?php
   if (!empty($_GET['id'])) {
       $scam_id = $_GET['id'];
   } else {
   ?>
<script>
   window.history.back();
</script>
<?php
   }
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="keywords" content="" />
      <meta name="author" content="" />
      <meta name="robots" content="" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <meta name="description" content="Griya : Real Estate Admin" />
      <meta property="og:title" content="Griya : Real Estate Admin" />
      <meta property="og:description" content="Griya : Real Estate Admin" />
      <meta property="og:image" content="page-error-404.html" />
      <meta name="format-detection" content="telephone=no" />
      <!-- PAGE TITLE HERE -->
      <title>View Scam - Tesla INU</title>
      <!-- FAVICONS ICON -->
      <link rel="shortcut icon" type="image/png" href="../assets/images/favicon.png" />
      <link href="../assets/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet" />
      <link rel="stylesheet" href="../assets/vendor/dotted-map/css/contrib/jquery.smallipop-0.3.0.min.css" type="text/css" media="all" />
      <!-- Style css -->
      <link href="../assets/css/style.css" rel="stylesheet" />
      <!-- Custom Stylesheet -->
      <link href="../assets/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet" />
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
   </head>
   <body>
      <div id="preloader">
         <div class="lds-ripple">
            <div></div>
            <div></div>
         </div>
      </div>
      <div id="main-wrapper">
         <?php
            require('../elements/header.php');
            ?>
         <?php
            require('../elements/sidebar.php');
            ?>
         <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
               <div class="mb-sm-4 d-flex flex-wrap align-items-center text-head">
                  <h2 class="mb-3 me-auto">View Scam</h2>
               </div>
               <div class="row">
                  <div class="col-xl-12 col-lg-6">
                     <div class="card">
                        <div class="card-header">
                           <h4 class="card-title">View Scam</h4>
                           <scam class="card-title-desc">Details of the scam.</scam>
                        </div>
                        <div class="card-body">
                           <?php
                              $query1    = "SELECT * FROM `scams` WHERE `id` = $scam_id ORDER BY `id` DESC";
                              $runquery1 = mysqli_query($con, $query1);
                              $rows1     = mysqli_num_rows($runquery1);
                              $indexing1 = 1;
                              if ($rows1 > 0 && $runquery1 == TRUE) {
                                  while ($data1 = mysqli_fetch_assoc($runquery1)) {
                                      $scam_id                     = $data1['id'];
                                      $name                     = $data1['name'];
                                      $email                    = $data1['email'];
                                      $phone                    = $data1['phone'];
                                      $telegram_id              = $data1['telegram_id'];
                                      $telegram_bio             = $data1['telegram_bio'];
                                      $crypto_currency_demanded = $data1['crypto_currency_demanded'];
                                      $wallet_address           = $data1['wallet_address'];
                                      $website                  = $data1['website'];
                                      $other_information        = $data1['other_information'];
                                      $profile_image            = $data1['profile_image'];
                                      $screenshot_of_chat            = $data1['screenshot_of_chat'];
                                      $superadmin_approval      = $data1['superadmin_approval'];
                                      $is_active                = $data1['is_active'];
                                      $mining_result      = $data1['mining_result'];
                                      $timestamp                = $data1['timestamp'];
                                  }
                              }
                              ?>
                           <div class="text-center">
                              <div class="profile-photo">
                                 <img src="../uploads/scam/scam-documents/<?php
                                    echo $profile_image;
                                    ?>" style="width: 150px; height: 150px;" class="img-fluid rounded-circle" alt="" />
                                    
                              </div>
                              
                              <h3 class="mt-4 mb-1"><?php
                                 echo $name;
                                 ?></h3>
                              <p class="text-muted"><?php
                                 echo $wallet_address;
                                 ?></p>
                           </div>
                           <div class="row">
                              <div class="col-md-3"></div>
                              <div class="col-md-6">
                                 <div class="table-responsive">
                                    <br />
                                    <table class="table header-border table-responsive-sm">
                                       <tbody>
                                          <tr>
                                             <td>Scammer Name</td>
                                             <td>
                                                <span class="text-muted"><?php
                                                   echo $name;
                                                   ?></span>


                                                   <span>
                                                      <a href="pos-scammer-name.php?id=<?php echo $scam_id; ?>">
                                                   <i data-toggle="tooltip" data-placement="top" title="Upload POS (Proof Of Scam)" class="fas fa-cloud-upload-alt " style="color:#216FED;"></i>
                                                   </a>
                                                   </span>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>Scammer Email</td>
                                             <td>
                                                <span class="text-muted"><?php
                                                   echo $email;
                                                   ?></span>
                                                   <span>
                                                      <a href="pos-scammer-email.php?id=<?php echo $scam_id; ?>">
                                                   <i data-toggle="tooltip" data-placement="top" title="Upload POS (Proof Of Scam)" class="fas fa-cloud-upload-alt " style="color:#216FED;"></i>
                                                   </a>
                                                   </span>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>Scammer Phone</td>
                                             <td>
                                                <span class="text-muted"><?php
                                                   echo $phone;
                                                   ?></span>
                                                   <span>
                                                      <a href="pos-scammer-phone.php?id=<?php echo $scam_id; ?>">
                                                   <i data-toggle="tooltip" data-placement="top" title="Upload POS (Proof Of Scam)" class="fas fa-cloud-upload-alt " style="color:#216FED;"></i>
                                                   </a>
                                                   </span>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>Telegram Id</td>
                                             <td>
                                                <span class="text-muted"><?php
                                                   echo $telegram_id;
                                                   ?></span>
                                                   <span>
                                                      <a href="pos-scammer-telegram-id.php?id=<?php echo $scam_id; ?>">
                                                   <i data-toggle="tooltip" data-placement="top" title="Upload POS (Proof Of Scam)" class="fas fa-cloud-upload-alt " style="color:#216FED;"></i>
                                                   </a>
                                                   </span>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>Telegram Bio</td>
                                             <td>
                                                <span class="text-muted"><?php
                                                   echo $telegram_bio;
                                                   ?></span>
                                                   <span>
                                                      <a href="pos-scammer-telegram-bio.php?id=<?php echo $scam_id; ?>">
                                                   <i data-toggle="tooltip" data-placement="top" title="Upload POS (Proof Of Scam)" class="fas fa-cloud-upload-alt " style="color:#216FED;"></i>
                                                   </a>
                                                   </span>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>Crypto Currency Demanded</td>
                                             <td>
                                                <span class="text-muted"><?php
                                                   echo $crypto_currency_demanded;
                                                   ?></span>
                                                   <span>
                                                      <a href="pos-crypto-currency-demanded.php?id=<?php echo $scam_id; ?>">
                                                   <i data-toggle="tooltip" data-placement="top" title="Upload POS (Proof Of Scam)" class="fas fa-cloud-upload-alt " style="color:#216FED;"></i>
                                                   </a>
                                                   </span>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>Wallet Address</td>
                                             <td>
                                                <span class="text-muted"><?php
                                                   echo $wallet_address;
                                                   ?></span>
                                                   <span>
                                                      <a href="pos-wallet-address.php?id=<?php echo $scam_id; ?>">
                                                   <i data-toggle="tooltip" data-placement="top" title="Upload POS (Proof Of Scam)" class="fas fa-cloud-upload-alt " style="color:#216FED;"></i>
                                                   </a>
                                                   </span>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>Other Information</td>
                                             <td>
                                                <span class="text-muted"><?php
                                                   echo $other_information;
                                                   ?></span>
                                                   <span>
                                                      <a href="pos-other-information.php?id=<?php echo $scam_id; ?>">
                                                   <i data-toggle="tooltip" data-placement="top" title="Upload POS (Proof Of Scam)" class="fas fa-cloud-upload-alt " style="color:#216FED;"></i>
                                                   </a>
                                                   </span>
                                             </td>
                                             
                                          </tr>
                                          <tr>
                                             <td>Admin Approval</td>
                                             <td>
                                                <?php
                                                   if ($superadmin_approval == 1) {
                                                   ?>
                                                <span class="badge badge-success light">Approved</span>
                                                <?php
                                                   } else {
                                                   ?>
                                                <span class="badge badge-danger light">No Approved</span>
                                                <?php
                                                   }
                                                   ?>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>Active Mining</td>
                                             <td>
                                                <?php
                                                   if ($is_active == 1) {
                                                   ?>
                                                <span class="badge badge-success light">Active</span>
                                                <?php
                                                   } else {
                                                   ?>
                                                <span class="badge badge-danger light">Not Active</span>
                                                <?php
                                                   }
                                                   ?>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>Mining Result</td>
                                             <td>
                                                <?php
                                                   if ($mining_result == 1) {
                                                   ?>
                                                <span class="badge badge-success light">Verified</span>
                                                <?php
                                                   } else {
                                                   ?>
                                                <span class="badge badge-danger light">Not Verified</span>
                                                <?php
                                                   }
                                                   ?>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>Report Date </td>
                                             <td>
                                                <?php
                                                   $mydate = getdate($timestamp);
                                                   echo "$mydate[mday]/$mydate[mon]/$mydate[year] ";
                                                   echo " " . "$mydate[hours]:$mydate[minutes]";
                                                   ?>
                                             </td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                              <div class="col-md-3"></div>
                           </div>
                           <div class="row">
                              <div class="col-md-12 text-center">
                                 <a class="btn btn-outline-primary btn-rounded mt-3 px-5" href="../scam/voter-list.php?id=<?php echo $scam_id; ?>"> Voters List</a>
                              </div>
                           </div>
                           <div class="row px-5 pb-3">
                              <div class="col-md-12">
                                 <h5>Chat Screenshot <span>
                                                      <a href="pos-chat-screenshot.php?id=<?php echo $scam_id; ?>">
                                                   <i data-toggle="tooltip" data-placement="top" title="Upload POS (Proof Of Scam)" class="fas fa-cloud-upload-alt " style="color:#216FED;"></i>
                                                   </a>
                                                   </span></h5>
                              </div>
                           </div>
                           <div class="row px-5">
                              <?php 
                                 $screenshot_of_chat_array = explode (",", $screenshot_of_chat);  
                                 $no_of_screenshot_of_chat =  sizeof($screenshot_of_chat_array);
                                 for($i= 0; $i < $no_of_screenshot_of_chat-1; $i++){
                                                                          
                                  $akc_screenshot_of_chat = trim($screenshot_of_chat_array[$i]);
                                 
                                 
                                 ?>
                              <div class="col-md-4 py-2 ">
                                 <img src="../uploads/scam/scam-documents/<?php echo $akc_screenshot_of_chat; ?>" alt="" style="width:100%; max-height:500px; cursor:pointer" data-bs-toggle="modal" data-bs-target="#show_scam_chat_image_modal" onclick="showScamChatImage('<?php echo $akc_screenshot_of_chat; ?>');">
                              </div>
                              <?php
                                 }
                                 ?>
                           </div>
                           <div class="row">
                              <div class="col-md-12 text-center">
                                 <!-- <a class="btn btn-outline-primary btn-rounded mt-3 px-5" href="../mining/scam-mining.php">Explore More</a> -->
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row" id="voting_card">
                  <div class="col-xl-12 col-lg-6">
                     <div class="card">
                        <div class="card-body">
                           <?php
                              //request server for already vote 
                              
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
                                 <a href="../mining/add-vote.php?id=<?php echo $scam_id; ?>&vote=1">
                                 <i class="fas fa-thumbs-up"  style="font-size:30px; color: #68e365 !important; cursor:pointer;"></i>
                                 </a>
                              </div>
                              <div class="col-6 text-center">
                                 <a href="../mining/add-vote.php?id=<?php echo $scam_id; ?>&vote=0">
                                 <i class="far fa-thumbs-down" style="font-size:30px; color: #f72b50 !important; cursor:pointer;"></i>
                                 </a>
                              </div>
                           </div>
                           <?php
                              }else{
                                  ?>
                           <div class="row pt-3">
                              <div class="col-6 text-center">
                                 <a href="../mining/add-vote.php?id=<?php echo $scam_id; ?>&vote=1">
                                 <i class="far fa-thumbs-up"  style="font-size:30px; color: #68e365 !important; cursor:pointer;"></i>
                                 </a>
                              </div>
                              <div class="col-6 text-center">
                                 <a href="../mining/add-vote.php?id=<?php echo $scam_id; ?>&vote=0">
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
                                 <a href="../mining/add-vote.php?id=<?php echo $scam_id; ?>&vote=1">
                                 <i class="far fa-thumbs-up"  style="font-size:30px; color: #68e365 !important; cursor:pointer;"></i>
                                 </a>
                              </div>
                              <div class="col-6 text-center">
                                 <a href="../mining/add-vote.php?id=<?php echo $scam_id; ?>&vote=0">
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
               </div>
               <div class="row" id="timing_card">
                  <div class="col-12">
                     <div class="card">
                        <div class="card-body">
                           <h1 class="text-center">
                              <span id="timing_text"></span> Left
                              <br>
                           </h1>
                           <h6 class="text-primary text-center">Voting will unable after 2 minutes. </h6>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <?php
               require('../elements/footer.php');
               ?>
         </div>
      </div>
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
      <div class="modal fade" id="show_scam_chat_image_modal">
         <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
               <!-- Modal Header -->
               <div class="modal-header">
                  <h5 class="modal-title">Scam Chat Image</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
               </div>
               <form action="" method="POST" enctype="multipart/form-data">
                  <!-- Modal body -->
                  <div class="modal-body">
                     <img src="../uploads/scam/scam-documents/scammer-profile-img.png" id=show_scam_chat_image_modal_image alt="" style="width:100%;">
                  </div>
                  <!-- Modal footer -->
               </form>
            </div>
         </div>
      </div>
      <script>
         function showScamChatImage(img_url){
             console.log(img_url);
         
             var path_url = '../uploads/scam/scam-documents/';
         
             var get_show_scam_chat_image_modal_image = document.getElementById('show_scam_chat_image_modal_image');
             get_show_scam_chat_image_modal_image.src = path_url + img_url;
         }
      </script>
      <script>
         var time_passed = 120;
         var time_minutes = 0;
         var time_seconds = 0;
         
         var get_voting_card = document.getElementById('voting_card');
         var get_timing_card = document.getElementById('timing_card');
         var get_timing_text = document.getElementById('timing_text');
         var timing_text_string = '02:00';
         
         
         function enableVoting(){
         
            if(time_passed < 60){
               time_minutes = 0;
               time_seconds = time_passed;
               
            }else if(time_passed < 120){
               time_minutes = 1;
               time_seconds = time_passed - 60;
            }
         
         
            
            if(time_passed > 0){
               get_voting_card.style.display = 'none';
               get_timing_card.style.display = 'block';
            }else{
               get_voting_card.style.display = 'block';
               get_timing_card.style.display = 'none';
            }
         
            timing_text_string = time_minutes + ':' + time_seconds;
            
            get_timing_text.innerHTML = timing_text_string;
         
            enableVotingPair();
         }
         
         function enableVotingPair(){
         
            setTimeout(function(){ 
               
               time_passed--;
               enableVoting();
               
            }, 1000);
         
            
         }
         enableVoting();
      </script>
      <script>
         //for tool tip
         $(function () {
  $('[data-bs-toggle="tooltip"]').tooltip()
})
      </script>
   </body>
</html>