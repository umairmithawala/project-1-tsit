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
   $run_fetch = mysqli_query($con, $user_query);
   $user_data = mysqli_fetch_assoc($run_fetch);
   if($user_data['email_verification'] == 0){
      echo "<script>window.location='../utility/email-not-verified.php';</script>";
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
      <title>Top Miners - Tesla INU</title>
      <!-- FAVICONS ICON -->
      <link rel="shortcut icon" type="image/png" href="../../assets/images/favicon.png" />
      <link href="../../assets/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet" />
      <link rel="stylesheet" href="../../assets/vendor/dotted-map/css/contrib/jquery.smallipop-0.3.0.min.css" type="text/css" media="all" />
      <!-- Style css -->
      <link href="../../assets/css/style.css" rel="stylesheet" />
      <!-- Datatable -->
      <link href="../../assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet" />
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
                  <h2 class="mb-3 me-auto">Top Miners</h2>
               </div>
               <div class="row">
                  <div class="col-xl-12 col-lg-6">
                     <div class="card">
                        <div class="card-header">
                           <h4 class="card-title">Miners</h4>
                           <scam class="card-title-desc">Here you can see the list of all top miners</scam>
                        </div>
                        <div class="card-body">
                           <div class="table-responsive">
                              <table id="example" class="display text-center" style="min-width: 845px;">
                                 <thead>
                                    <tr>
                                       <th>#</th>
                                       <th>Profile</th>
                                       <th>Name</th>
                                       <th>Scam Count</th>
                                       <th>Winning Scam Count</th>
                                       <th>Mine Scam View</th>
                                       <th>Winning Scam View</th>
                                       <th>Date</th>
                                       <!-- <th>Action</th> -->
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                       $query1 = "SELECT * FROM `top_miner` ORDER BY `id` DESC";                                             
                                       $runquery1 = mysqli_query($con, $query1);                                             
                                       $rows1 = mysqli_num_rows($runquery1);
                                       $indexing1 = 1;
                                       if ($rows1 > 0 && $runquery1 == TRUE) { 
                                           while ($data1 = mysqli_fetch_assoc($runquery1)) { 
                                               ?>
                                    <tr>
                                       <td><?php echo $indexing1; ?></td>
                                       <?php 
                                          //getting details of miner 
                                          $miner_id = $data1['miner_id'];
                                          
                                          $query2 = "SELECT * FROM `users` WHERE `id` = $miner_id";                                             
                                          $runquery2 = mysqli_query($con, $query2);                                             
                                          $rows2 = mysqli_num_rows($runquery2);
                                          $indexing2 = 2;
                                          if ($rows2 > 0 && $runquery2 == TRUE) { 
                                              while ($data2 = mysqli_fetch_assoc($runquery2)) {
                                                  $miner_name = $data2['name'];
                                                  $miner_img = $data2['user_img'];
                                                }
                                              }
                                          
                                          
                                          
                                          ?>
                                       <td><img src="../../uploads/users/profile-img/<?php echo $miner_img; ?>" alt="Miner Image" style="height:60px; width:60px; border-radius:100%;"></td>
                                       <td><?php echo $miner_name; ?></td>
                                       <td><?php echo $data1['scam_count']; ?></td>
                                       <td><?php echo $data1['winning_scam_count']; ?></td>
                                       <td>
                                          <?php 
                                             $mine_scam_list_array = explode (",", $data1['mine_scam_list']);  
                                             $no_of_mine_scam_list =  sizeof($mine_scam_list_array);
                                             $inner_index_one = 1;
                                             for($i= 0; $i < $no_of_mine_scam_list-1; $i++){
                                                                                      
                                              $akc_mine_scam_list = trim($mine_scam_list_array[$i]);
                                             
                                             
                                             ?>
                                          <a href="../scam/view-scam.php?id=<?php echo $akc_mine_scam_list; ?>">View Scam <?php echo $inner_index_one; ?></a><br>
                                          <?php
                                             $inner_index_one++;
                                             }
                                             ?>
                                       </td>
                                       <td>
                                          <?php 
                                             $winning_scam_list_array = explode (",", $data1['winning_scam_list']);  
                                             $no_of_winning_scam_list =  sizeof($winning_scam_list_array);
                                             $inner_index_one = 1;
                                             for($i= 0; $i < $no_of_winning_scam_list-1; $i++){
                                                                     
                                             $akc_winning_scam_list = trim($winning_scam_list_array[$i]);
                                             
                                             
                                             ?>
                                          <a href="../scam/view-scam.php?id=<?php echo $akc_winning_scam_list; ?>">View Scam <?php echo $inner_index_one; ?></a><br>
                                          <?php
                                             $inner_index_one++;
                                             }
                                             ?>
                                       </td>
                                       <td>
                                          <span class="text-muted">
                                          <?php $mydate=getdate($data1['timestamp']);
                                             echo "$mydate[mday]/$mydate[mon]/$mydate[year] ";?>
                                          </span>
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
            <?php require('../elements/footer.php');?>
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
      <!-- Datatable -->
      <script src="../../assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
      <script src="../../assets/js/plugins-init/datatables.init.js"></script>
      <script src="../../assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
   </body>
</html>
<script>
   // Add the following code if you want the name of the file appear on select
   $(".custom-file-input").on("change", function () {
       var fileName = $(this).val().split("\\").pop();
       $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
   });
</script>