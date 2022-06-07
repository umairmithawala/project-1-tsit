<?php
   session_start();
   require_once '../../database/db-con.php';
   ?>
<?php
   if (isset($_SESSION['admin_session_var'])) {
       $user_id = $_SESSION['admin_session_var'];
   } else {
       header('location:../../auth/login.php');
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
      <link rel="shortcut icon" type="image/png" href="../../assets/images/favicon.png" />
      <link href="../../assets/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet" />
      <link rel="stylesheet" href="../../assets/vendor/dotted-map/css/contrib/jquery.smallipop-0.3.0.min.css" type="text/css" media="all" />
      <!-- Style css -->
      <link href="../../assets/css/style.css" rel="stylesheet" />
      <!-- Custom Stylesheet -->
      <link href="../../assets/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet" />
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
                                 <img src="../../uploads/scam/scam-documents/<?php
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
                                             <td>Scam ID</td>
                                             <td>
                                                <span class="text-muted"><?php
                                                   echo '#'.$scam_id;
                                                   ?></span>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>Scammer Name</td>
                                             <td>
                                                <span class="text-muted"><?php
                                                   echo $name;
                                                   ?></span>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>Scammer Email</td>
                                             <td>
                                                <span class="text-muted"><?php
                                                   echo $email;
                                                   ?></span>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>Scammer Phone</td>
                                             <td>
                                                <span class="text-muted"><?php
                                                   echo $phone;
                                                   ?></span>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>Telegram Id</td>
                                             <td>
                                                <span class="text-muted"><?php
                                                   echo $telegram_id;
                                                   ?></span>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>Telegram Bio</td>
                                             <td>
                                                <span class="text-muted"><?php
                                                   echo $telegram_bio;
                                                   ?></span>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>Crypto Currency Demanded</td>
                                             <td>
                                                <span class="text-muted"><?php
                                                   echo $crypto_currency_demanded;
                                                   ?></span>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>Wallet Address</td>
                                             <td>
                                                <span class="text-muted"><?php
                                                   echo $wallet_address;
                                                   ?></span>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>Other Information</td>
                                             <td>
                                                <span class="text-muted"><?php
                                                   echo $other_information;
                                                   ?></span>
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
                           <div class="row px-5 pb-3">
                              <div class="col-md-12">
                                 <h5>Chat Screenshot </h5>
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
                                 <img src="../../uploads/scam/scam-documents/<?php echo $akc_screenshot_of_chat; ?>" alt="" style="width:100%; max-height:500px; cursor:pointer" data-bs-toggle="modal" data-bs-target="#show_scam_chat_image_modal" onclick="showScamChatImage('<?php echo $akc_screenshot_of_chat; ?>');">
                              </div>
                              <?php
                                 }
                                 ?>
                           </div>
                           <div class="row">
                              <div class="col-md-12 text-center">
                                 <!-- <a class="btn btn-outline-primary btn-rounded mt-3 px-5" href="../../mining/scam-mining.php">Explore More</a> -->
                              </div>
                           </div>
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
      <script src="../../assets/vendor/global/global.min.js"></script>
      <script src="../../assets/vendor/chart.js/Chart.bundle.min.js"></script>
      <script src="../../assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
      <!-- Apex Chart -->
      <script src="../../assets/vendor/apexchart/apexchart.js"></script>
      <!-- Chart piety plugin files -->
      <script src="../../assets/vendor/peity/jquery.peity.min.js"></script>
      <!-- Dashboard 1 -->
      <script src="../../assets/js/dashboard/dashboard-1.js"></script>
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
                     <img src="../../uploads/scam/scam-documents/scammer-profile-img.png" id=show_scam_chat_image_modal_image alt="" style="width:100%;">
                  </div>
                  <!-- Modal footer -->
               </form>
            </div>
         </div>
      </div>
      <script>
         function showScamChatImage(img_url){
             console.log(img_url);
         
             var path_url = '../../uploads/scam/scam-documents/';
         
             var get_show_scam_chat_image_modal_image = document.getElementById('show_scam_chat_image_modal_image');
             get_show_scam_chat_image_modal_image.src = path_url + img_url;
         }
      </script>
   </body>
</html>