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
if ($user_data['email_verification'] == 0) {
   echo "<script>window.location='../utility/email-not-verified.php';</script>";
}

//get data to modal
if (isset($_POST['reject_reason_btn'])) {

   $reject_reason_user_id = $_POST['reject_reason_user_id'];
   $reject_reason = $_POST['reject_reason'];

?>

   <script>
      window.location = 'edit/kyc-reject.php?id=<?php echo $reject_reason_user_id; ?>&reject_reason=<?php echo $reject_reason; ?>';
   </script>

<?php
}

?>
<?php

//add topup request

if (isset($_POST['add_topup_submit_btn'])) {

   $amount_of_tsit_purchased = $_POST['topup_amount_tsit'];
   $topup_user_id = $_POST['topup_user_id'];
   $currency = $_POST['currency'];
   $sending_wallet_address = $_POST['sending_wallet_address'];
   $amount_in_currency = $_POST['amount_in_currency'];
   $amount_in_dollar_on_submit = $_POST['amount_in_dollar_on_submit'];
   $transaction_id = $_POST['transaction_id'];

   $current_date = date("Y-m-d");
   $available_tsit_supply = 0;

   if ($current_date <= "2022-04-23") {
      // echo "Phase – 1 - 7th April – 23rd April 2022";
      $tsit_coin_current_price = 0.000001;
   } else if ($current_date <= "2022-05-10") {
      // echo "Phase – 2 - 24th April – 10th May 2022";
      $tsit_coin_current_price = 0.000002;
   } else if ($current_date <= "2022-05-27") {
      // echo "Phase – 3 - 11th May – 27th May 2022";
      $tsit_coin_current_price = 0.000003;
   } else if ($current_date <= "2022-06-13") {
      // echo "Phase – 4 - 28th May – 13th June 2022";
      $tsit_coin_current_price = 0.000004;
   } else {
      //   echo "Phase – 5 - 14th June – 30th June 2022";
      $tsit_coin_current_price = 0.000004;
   }

   $payment_screenshot_file_name = "";
   $timestamp = time();


   $auto_buy_query = "INSERT INTO `buy_requests`(`id`,`user_id`, `tsit_coin_price`, `amount_of_tsit_purchased`, 
`currency`, `amount_in_currency`, `amount_in_dollar_on_submit`,`transaction_id`, 
`sending_wallet_address`, `payment_screenshot`, `is_tsit_transfered`,`request_timestamp`,`is_fake`,`is_topup`) VALUES (
NULL,$topup_user_id,$tsit_coin_current_price,$amount_of_tsit_purchased, '$currency', $amount_in_currency, $amount_in_dollar_on_submit,
'$transaction_id','$sending_wallet_address','$payment_screenshot_file_name',1, $timestamp,0,1)";

   print_r($auto_buy_query);

   $run_auto_buy_query = mysqli_query($con, $auto_buy_query);
   
   //get last id
   $last_id = mysqli_insert_id($con);


   $buy_request_amount_of_tsit_purchased = $amount_of_tsit_purchased;

   $add_buy_transaction_query = "INSERT INTO `transactions`(`user_id`, `transaction_type`, `hash`, 
`note`, `to_address`, `from_address`, `is_addition`, `transaction_status`, `amount`, `timestamp`,`is_fake`,`is_topup`)
 VALUES ($topup_user_id,6,'','','','',1,1,$buy_request_amount_of_tsit_purchased,$timestamp,0,1)";
   $add_buy_transaction_query_run = mysqli_query($con, $add_buy_transaction_query);

   
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
   <title>All Wallets - Tesla INU</title>
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
               <h2 class="mb-3 me-auto">Users List</h2>
            </div>
            <div class="row">
               <div class="col-xl-12 col-lg-6">
                  <div class="card">
                     <div class="card-header">
                        <h4 class="card-title">All Wallets</h4>
                        <!-- <small>Here you can see all users wallet details</small> -->
                        <a class="btn btn-primary" href="" data-bs-toggle="modal" data-bs-target="#topup_modal">
                           <h5 class="text-primary">Add TopUp</h5>
                        </a>
                     </div>

                     <div class="card-body">

                        <div class="table-responsive">
                           <table id="example" class="display" style="min-width: 845px;">
                              <thead>
                                 <tr>
                                    <th>#</th>
                                    <th>User ID</th>
                                    <th>Name</th>
                                    <th>Email</th>

                                    <th>Total Balance</th>
                                    <th>Total Sent</th>
                                    <th>Total Received</th>

                                    <!-- <th>Action</th> -->
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                 $query1 = "SELECT * FROM `users`";
                                 $runquery1 = mysqli_query($con, $query1);
                                 $rows1 = mysqli_num_rows($runquery1);
                                 $indexing1 = 1;
                                 if ($rows1 > 0 && $runquery1 == TRUE) {
                                    while ($data1 = mysqli_fetch_assoc($runquery1)) {
                                 ?>
                                       <tr>
                                          <td><?php echo $indexing1; ?></td>
                                          <td><?php echo $data1['id']; ?></td>
                                          <td><?php echo $data1['name']; ?></td>
                                          <td><?php echo $data1['email']; ?></td>

                                          <?php

                                          //get user id 
                                          $wallet_list_user_id = $data1['id'];


                                          //getting the current balance from the databases

                                          $total_balance = 0;
                                          $total_received = 0;
                                          $total_sent = 0;

                                          $query1     = "SELECT SUM(`amount`) AS `total_received` FROM `transactions` WHERE `user_id` = $wallet_list_user_id AND `is_addition` = 1";
                                          $run_query1 = mysqli_query($con, $query1);
                                          $rows1      = mysqli_num_rows($run_query1);
                                          $indexing1  = 1;
                                          if ($rows1 > 0 && $run_query1 == TRUE) {
                                             while ($data1 = mysqli_fetch_assoc($run_query1)) {
                                                $total_received = $data1['total_received'];
                                             }
                                          }


                                          $query1     = "SELECT SUM(`amount`) AS `total_sent` FROM `transactions` WHERE `user_id` = $wallet_list_user_id AND `is_addition` = 0";
                                          $run_query1 = mysqli_query($con, $query1);
                                          $rows1      = mysqli_num_rows($run_query1);
                                          $indexing1  = 1;
                                          if ($rows1 > 0 && $run_query1 == TRUE) {
                                             while ($data1 = mysqli_fetch_assoc($run_query1)) {
                                                $total_sent = $data1['total_sent'];
                                             }
                                          }



                                          $total_balance = $total_received - $total_sent;

                                          if ($total_balance == NULL || $total_balance == "") {
                                             $total_balance = 0;
                                          }
                                          if ($total_received == NULL || $total_received == "") {
                                             $total_received = 0;
                                          }
                                          if ($total_sent == NULL || $total_sent == "") {
                                             $total_sent = 0;
                                          }







                                          ?>
                                          <td>
                                             <?php echo $total_balance . ' TSIT';  ?>
                                          </td>
                                          <td>
                                             <?php echo $total_sent . ' TSIT';  ?>
                                          </td>
                                          <td>
                                             <?php echo $total_received . ' TSIT';  ?>
                                          </td>

                                          <!-- <td>
                                          </td>
                                          -->
                                       </tr>
                                 <?php
                                       $indexing1++;
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
         <?php require('../elements/footer.php'); ?>
      </div>
   </div>
   <div class="modal fade" id="reject_request">
      <div class="modal-dialog  modal-md modal-dialog-centered">
         <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
               <h4 class="modal-title">Reject KYC
               </h4>
               <span type="button" class="close" data-bs-dismiss="modal">&times;</span>
            </div>
            <form action="" method="POST">
               <input type="hidden" name="reject_reason_user_id" id="reject_reason_user_id_input">
               <!-- Modal body -->
               <div class="modal-body">
                  <div class="row mt-4">
                     <div class="col-12">
                        <div class="form-group">
                           <label>Reject Reason</label>
                           <textarea class="form-control" name="reject_reason" id="reject_request_reject_reason_input" required></textarea>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Modal footer -->
               <div class="modal-footer">
                  <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                  <button type="submit" name="reject_reason_btn" class="btn btn-primary">Reject</button>
               </div>
            </form>
         </div>
      </div>
   </div>

   <!-- TopUp modal -->
   <div class="modal fade" id="topup_modal">
      <div class="modal-dialog  modal-md modal-dialog-centered">
         <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
               <h4 class="modal-title">Add TopUp
               </h4>
               <span type="button" class="close" data-bs-dismiss="modal">&times;</span>
            </div>
            <form action="#" method="POST">
               <input type="hidden" name="bulk_reject_user_id" id="bulk_reject_user_id">
               <!-- Modal body -->
               <div class="modal-body">
                  <div class="row mt-4">
                     <div class="col-12">
                        <div class="form-group">
                           <label>Amount</label>
                           <input type="text" class="form-control" name="topup_amount_tsit" id="bulk_reject_request_reject_reason_input" required>
                        </div>
                     </div>
                  </div>
                  <div class="row mt-4">
                     <div class="col-12">
                        <div class="basic-form">
                           <div class="form-group">
                              <label>Select User</label>
                              <select class="form-control" name="topup_user_id" id="" required="">
                                 <option> Choose One </option>
                                 <?php
                                 $query1 = "SELECT * FROM `users`";
                                 $runquery1 = mysqli_query($con, $query1);
                                 $rows1 = mysqli_num_rows($runquery1);
                                 $indexing1 = 1;
                                 if ($rows1 > 0 && $runquery1 == TRUE) {
                                    while ($data1 = mysqli_fetch_assoc($runquery1)) {
                                 ?>
                                       <option value="<?php echo $data1['id']; ?>">
                                          <?php echo $data1['email']; ?>
                                    <?php

                                    }
                                 }
                                    ?>
                              </select>
                           </div>
                        </div>

                     </div>
                  </div>
                  <div class="row mt-4">
                     <div class="col-12">
                        <div class="basic-form">
                           <div class="form-group">
                              <label>Amount They paid in</label>
                              <select class="form-control" name="currency" id="" required="">
                                 <option> Choose One </option>
                                 <option value="btc">BTC</option>
                                 <option value="usdt_trc20">USDT (TRC20)</option>
                                 <option value="bnb_bep20">BNB (BEP20)</option>
                                 <option value="btc_bep20">BTC (BEP20)</option>
                                 <option value="usdt_bep20">USDT (BEP20)</option>
                              </select>
                           </div>
                        </div>

                     </div>
                  </div>
                  <div class="row mt-4">
                     <div class="col-12">
                        <div class="basic-form">
                           <div class="form-group">
                              <label>How much they paid</label>
                              <input type="text" class="form-control" name="amount_in_currency" id="" required="">
                           </div>
                        </div>

                     </div>
                  </div>
                  <div class="row mt-4">
                     <div class="col-12">
                        <div class="basic-form">
                           <div class="form-group">
                              <label>How much they paid in dollar</label>
                              <input type="text" class="form-control" name="amount_in_dollar_on_submit" id="" required="">
                           </div>
                        </div>

                     </div>
                  </div>
                  <div class="row mt-4">
                     <div class="col-12">
                        <div class="basic-form">
                           <div class="form-group">
                              <label>Transaction id</label>
                              <input type="text" class="form-control" name="transaction_id" id="" required="">
                           </div>
                        </div>

                     </div>
                  </div>
                  <div class="row mt-4">
                     <div class="col-12">
                        <div class="basic-form">
                           <div class="form-group">
                              <label>Sender wallet address</label>
                              <input type="text" class="form-control" name="sending_wallet_address" id="" required="">
                           </div>
                        </div>

                     </div>
                  </div>

               </div>
               <!-- Modal footer -->
               <div class="modal-footer">
                  <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                  <button type="submit" name="add_topup_submit_btn" class="btn btn-primary">ADD TOPUP</button>
               </div>
            </form>
         </div>
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
   $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
   });
</script>

<script>
   function rejectRequest(reject_reason_user_id) {

      $('#reject_reason_user_id_input').val(reject_reason_user_id);
      console.log('funcion call');

   }
</script>