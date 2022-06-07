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
   if (!empty($_GET['uid']) && !empty($_GET['sid'])) {
       $voter_user_id = $_GET['uid'];
       $scam_id = $_GET['sid'];
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
      <title>View POS - Tesla INU</title>
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
                  <h2 class="mb-3 me-auto">Proof Of Scam</h2>
               </div>
               <div class="row">
                  <div class="col-xl-12 col-lg-6">
                     <div class="card">
                        <div class="card-header">
                           <h4 class="card-title">Proof Of Scam</h4>
                           <scam class="card-title-desc">All the documents that others have been submitted will be viewed here!</scam>
                        </div>
                        <div class="card-body">
                            <?php
                                $query1    = "SELECT * FROM `pos` WHERE `user_id` = $voter_user_id  AND `scam_id` = $scam_id";
                                $run_query1 = mysqli_query($con, $query1);
                                $rows1     = mysqli_num_rows($run_query1);
                                $indexing1 = 1;
                                if ($rows1 > 0 && $run_query1 == TRUE) {
                                    while ($data1 = mysqli_fetch_assoc($run_query1)) {
                                        ?>
                                        <div class="row py-4">
                                            <div class="col-md-12 ">
                                                <h5>
                                                <?php 
                                                    echo ucwords($data1['proof_of']);
                                                ?>
                                                </h5>
                                            </div>
                                            <?php 
                                 $pos_file_array = explode (",", $data1['file_name']);  
                                 $no_of_pos_file =  sizeof($pos_file_array);

                                 if($no_of_pos_file < 0){
                                     ?>
                                    <div class="col-md-4 py-2 text-center ">
                                        No Document
                                    </div>
                                    <?php
                                 }

                                 for($i= 0; $i < $no_of_pos_file-1; $i++){
                                                                          

                                  $akc_pos_file = trim($pos_file_array[$i]);
                                 
                                 
                                 ?>
                              <div class="col-md-4 py-2 ">
                                 <img src="../../uploads/scam/pos/<?php echo $akc_pos_file; ?>" alt="" style="width:100%; max-height:500px; cursor:pointer" data-bs-toggle="modal" data-bs-target="#show_scam_chat_image_modal" onclick="showScamChatImage('<?php echo $akc_pos_file; ?>');">
                              </div>
                              <?php
                                 }
                                 ?>
                                        </div>


                            <?php
                                    }
                                }
                            ?>

                         

                           <div class="row">
                              <div class="col-md-12 text-center">
                                 <a class="btn btn-outline-primary btn-rounded mt-3 px-5" href="../scam/view-scam.php">View Scam</a>
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
      <div class="modal fade" id="show_scam_chat_image_modal">
         <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
               <!-- Modal Header -->
               <div class="modal-header">
                  <h5 class="modal-title">Proof Of Scam</h5>
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
         
             var path_url = '../../uploads/scam/pos/';
         
             var get_show_scam_chat_image_modal_image = document.getElementById('show_scam_chat_image_modal_image');
             get_show_scam_chat_image_modal_image.src = path_url + img_url;
         }
      </script>
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
   </body>
</html>