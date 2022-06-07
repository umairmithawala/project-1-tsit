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
      <title>Voter List - Tesla INU</title>
      <!-- FAVICONS ICON -->
      <link rel="shortcut icon" type="image/png" href="../assets/images/favicon.png" />
      <link href="../assets/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet" />
      <link rel="stylesheet" href="../assets/vendor/dotted-map/css/contrib/jquery.smallipop-0.3.0.min.css" type="text/css" media="all" />
      <!-- Style css -->
      <link href="../assets/css/style.css" rel="stylesheet" />
      <!-- Custom Stylesheet -->
      <link href="../assets/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet" />
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
                  <h2 class="mb-3 me-auto">Voter List</h2>
               </div>
               <div class="row">
                  <div class="col-xl-12 col-lg-6">
                     <div class="card">
                        <div class="card-header">
                           <h4 class="card-title">Voter List</h4>
                           <scam class="card-title-desc">Here you can see all the voters </scam>
                        </div>
                        <div class="card-body">
                           <div class="row">
                              <div class="col-md-3"></div>
                              <div class="col-md-6">
                                 <div class="table-responsive">
                                    <br />
                                    <table class="table header-border table-responsive-sm">
                                       <tbody>
                                          <?php
                                             $query1    = "SELECT * FROM `votes` WHERE `scam_id` = $scam_id ORDER BY `timestamp` ASC";
                                             $runquery1 = mysqli_query($con, $query1);
                                             $rows1     = mysqli_num_rows($runquery1);
                                             $indexing1 = 1;
                                             if ($rows1 > 0 && $runquery1 == TRUE) {
                                                 while ($data1 = mysqli_fetch_assoc($runquery1)) {
                                                      $voter_id = $data1['voter_id'];
                                             
                                                     $vote    = $data1['vote'];
                                                     $vote_description  = $data1['vote_description'];
                                                     $vote_time   = $data1['timestamp'];
                                                    
                                                     //getting voter details
                                             
                                                     $query2    = "SELECT `id`,`name`,`user_img` FROM `users` WHERE `id` = $voter_id";
                                                     $runquery2 = mysqli_query($con, $query2);
                                                     $rows2     = mysqli_num_rows($runquery2);
                                                     $indexing2 = 2;
                                                     if ($rows2 > 0 && $runquery2 == TRUE) {
                                                         while ($data2 = mysqli_fetch_assoc($runquery2)) {
                                                               $voter_name = $data2['name'];
                                                               $voter_user_img = $data2['user_img'];
                                                               $voter_user_id = $data2['id'];
                                                               ?>
                                          <tr>
                                             <td>
                                                <?php echo  $indexing1; ?>
                                             </td>
                                             <td class="text-center">
                                                <div class="profile-photo">
                                                   <img src="../uploads/users/profile-img/<?php echo $voter_user_img; ?>" style="width: 50px; height: 50px;" class="rounded-circle" alt="" />
                                                   <br>
                                                   <?php echo $voter_name; ?>
                                                </div>
                                             </td>
                                             <td><?php echo $vote_description; ?></td>
                                             <td class="text-center">
                                             <a href="../scam/view-pos.php?uid=<?php echo $voter_user_id; ?>&sid=<?php echo $scam_id; ?>">
                                                   <i class="fas fa-eye" style="font-size:15px; color: #fff !important; cursor:pointer;">
                                                   </i>
                                                   <br>
                                                   <span class="text-muted">
                                                   View POS
                                                   </span>
                                                </a>
                                             </td>
                                             <td class="text-center">
                                                <?php 
                                                   if($vote == 1){
                                                      ?>
                                                <i class="fas fa-thumbs-up"  style="font-size:30px; color: #68e365 !important; cursor:pointer;"></i>
                                                <br>
                                                <br>
                                                <span class="text-muted">
                                                <?php $mydate=getdate($vote_time);
                                                   echo " "."$mydate[hours]:$mydate[minutes], ";
                                                   echo "$mydate[mday]/$mydate[mon]/$mydate[year] ";?>
                                                </span>
                                                <?php
                                                   }else{
                                                      ?>
                                                <i class="fas fa-thumbs-down"  style="font-size:30px; color: #f72b50 !important; cursor:pointer;"></i>
                                                <br>
                                                <br>
                                                <span class="text-muted">
                                                <?php $mydate=getdate($vote_time);
                                                   echo " "."$mydate[hours]:$mydate[minutes], ";
                                                   echo "$mydate[mday]/$mydate[mon]/$mydate[year] ";?>
                                                </span>
                                                <?php
                                                   }
                                                   ?>
                                             </td>
                                          </tr>
                                          <?php
                                             }
                                             }
                                             $indexing1++;
                                             }
                                             
                                             }else{
                                             ?>
                                          <tr>
                                             <td class="text-center">No votes yet</td>
                                          </tr>
                                          <?php
                                             }
                                             ?>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
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
   </body>
</html>