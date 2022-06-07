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
      <title>All Transactions - Tesla INU</title>
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
                  <h2 class="mb-3 me-auto">All Transactions</h2>
               </div>
               <div class="row">
                  <div class="col-xl-12 col-lg-6">
                     <div class="card">
                        <div class="card-header">
                           <h4 class="card-title">All Transactions</h4>
                           <scam class="card-title-desc">Here you can see all the transactions on the TSIT portal</scam>
                        </div>
                        <div class="card-body">
                           <div class="table-responsive">
                              <table id="example" class="display">
                                 <thead>
                                    <tr>
                                       <th>#</th>
                                       <th>User ID</th>
                                       <th>Transaction Type</th>
                                       <th>Amount</th>
                                       <th>Amount In Dollar</th>
                                       <th>Date</th>
                                       <th>Hash</th>
                                       <th>Note</th>
                                       <th>To Address</th>
                                       <th>From Address</th>
                                       <th>Transaction Status</th>
                                       <!-- <th>Action</th> -->
                                    </tr>
                                 </thead>
                                 <tbody >
                                    <?php
                                       $query1 = "SELECT * FROM `transactions`";                                             
                                       $runquery1 = mysqli_query($con, $query1);                                             
                                       $rows1 = mysqli_num_rows($runquery1);
                                       $indexing1 = 1;
                                         
                                             if ($rows1 > 0 && $runquery1 == TRUE) {
                                              while ($data1 = mysqli_fetch_assoc($runquery1)) {
                                                  ?>
                                    <tr >
                                       <td class="text-center"> <?php echo $data1['id']; ?> </td>
                                       <td class="text-center"> <?php echo "#".$data1['user_id']; ?> </td>
                                       <td > <?php 
                                          $transaction_type = $data1['transaction_type']; 
                                          $query2 = "SELECT * FROM `transaction_type` WHERE `id` = $transaction_type";
                                          $runquery2 = mysqli_query($con, $query2);                                             
                                          $rows2 = mysqli_num_rows($runquery2);
                                          $indexing2 = 1;
                                            
                                                if ($rows2 > 0 && $runquery2 == TRUE) {
                                                 while ($data2 = mysqli_fetch_assoc($runquery2)) {
                                          echo $data2['name'];
                                                 }}else{
                                                     echo 'Not Applied';
                                                 }
                                          
                                          
                                          ?> </td>
                                       <td> <?php echo $data1['amount']." TSIT"; ?> </td>
                                       <td>
                                                            <?php

                                                            $timestamp = $data1['timestamp'];

                                                            if ($timestamp <= "2022-04-23") {
                                                                // echo "Phase – 1 - 7th April – 23rd April 2022";
                                                                $tsit_coin_current_price = 0.000001;
                                                            } else if ($timestamp <= "2022-05-10") {
                                                                // echo "Phase – 2 - 24th April – 10th May 2022";
                                                                $tsit_coin_current_price = 0.000002;
                                                            } else if ($timestamp <= "2022-05-27") {
                                                                // echo "Phase – 3 - 11th May – 27th May 2022";
                                                                $tsit_coin_current_price = 0.000003;
                                                            } else if ($timestamp <= "2022-06-13") {
                                                                // echo "Phase – 4 - 28th May – 13th June 2022";
                                                                $tsit_coin_current_price = 0.000004;
                                                            }
                                                            
                                                            
                                                            $amount_in_dollar = $data1['amount'] * $tsit_coin_current_price;
                                                            echo $amount_in_dollar . ' $';

                                                            ?>
                                                        </td>
                                       <td>
                                          <?php
                                             $mydate=getdate($data1['timestamp']);
                                             echo "$mydate[mday]/$mydate[mon]/$mydate[year] ";
                                             echo " "."$mydate[hours]:$mydate[minutes]";
                                             ?>
                                       </td>
                                       <td> <?php echo $data1['hash']; ?> </td>
                                       <td> <?php echo $data1['note']; ?> </td>
                                       <td> <?php echo $data1['to_address']; ?> </td>
                                       <td> <?php 
                                       
                                       // echo $data1['from_address']; 

                                       echo 'TSkcFMZtFzRbADShm9bDrRwugipKy1QjAs';
                                       
                                       ?> </td>
                                       <td> 
                                          <?php 
                                             if($data1['transaction_status'] == 1 ){
                                                ?>
                                          <span class="badge badge-success light">Completed</span>
                                          <?php
                                             }else if($data1['transaction_status'] == 2){
                                                ?>
                                          <span class="badge badge-danger light">Rejected</span>
                                          <?php
                                             }else if($data1['transaction_status'] == 3){
                                                ?>
                                          <span class="badge badge-warning light">Pending</span>
                                          <?php
                                             }
                                             
                                             ?>
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
            <?php require('../elements/footer.php');?>
         </div>
      </div>
      <!-- Plugins JS Ends-->
      <!-- Theme js-->
      <script src="../../assets/js/script.js"></script>
      <!-- login js-->
      <!-- Plugin used -->  
      <script>
         $(function () {
         $('[data-toggle="tooltip"]').tooltip()
         })
      </script> 
      <script src="../../assets/js/theme-customizer/customizer.js"></script>
      <script src="../../assets/plugins/qrcode/qrcode.js"></script>
      <script type="text/javascript">
         var qrcode = new QRCode(document.getElementById("to_address_qrcode"), {
         	width : 150,
         	height : 150
         });
         
         
         
         
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