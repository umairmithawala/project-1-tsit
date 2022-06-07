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
   <title>User Management - Tesla INU</title>
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
                        <h4 class="card-title">Users</h4>
                        <scam class="card-title-desc">Here you can see all the users on the TSIT portal</scam>

                     </div>
                     <div class="card-body">
                        <div class="py-3">
                           <a class="btn btn-primary" href="../users/kyc-approved-users.php">
                              <h5 class="text-primary">KYC Approved</h5>
                           </a>

                           <a class="btn btn-primary" href="../users/kyc-rejected-users.php">
                              <h5 class="text-primary">KYC Rejected</h5>
                           </a>
                           <a  data-bs-toggle="modal" data-bs-target="#reject_request_modal_second" class="btn btn-primary" id="reject_btn" style="float: right; margin-left:10px; display:none;" href="../users/kyc-rejected-users.php">
                              <h5 class="text-primary">Rejected</h5>
                           </a>
                           <a class="btn btn-primary" id="bulk_approve_btn" style="float: right; display:none;" href="../users/kyc-approved-users.php">
                              <h5 class="text-primary">Approved</h5>
                           </a>
                        </div>
                        <div class="table-responsive">
                           <table id="example" class="display" style="min-width: 845px;">
                              <thead>
                                 <tr>
                                    <th class="sorting_desc" tabindex="0" aria-controls="example5" rowspan="1" colspan="1" aria-label=": activate to sort column ascending" style="width: 37.5625px;" aria-sort="descending">
                                       <!-- <div class="form-check custom-checkbox ms-2">
                                          <input type="checkbox" class="form-check-input" id="checkAll" required="" onclick="hideShowBtn()">
                                          <label class="form-check-label" for="checkAll"></label>
                                       </div> -->
                                    </th>
                                    <th>#</th>
                                    <th>User ID</th>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Role</th>
                                    <th>Referral Code</th>
                                    <th>Referred By</th>
                                    <th>KYC Country</th>
                                    <th>KYC User Image</th>
                                    <th>KYC Identity Front</th>
                                    <th>KYC Identity Back</th>
                                    <th>kyc_Fd</th>
                                    <th>KYC Rejected Reason</th>
                                    <th>Wallet Address</th>
                                    <!-- <th>Action</th> -->
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                 $query1 = "SELECT * FROM `users` WHERE `kyc_approved` = 2 ORDER BY `id` DESC";
                                 $runquery1 = mysqli_query($con, $query1);
                                 $rows1 = mysqli_num_rows($runquery1);
                                 $indexing1 = 1;
                                 if ($rows1 > 0 && $runquery1 == TRUE) {
                                    while ($data1 = mysqli_fetch_assoc($runquery1)) {
                                 ?>
                                       <tr>
                                          <td class="sorting_1">
                                             <div class="form-check custom-checkbox ms-2">
                                                <input type="checkbox" class="form-check-input bulk_checkbox_input_class" id="CheckBox_<?php echo $data1['id']; ?>" required="" onclick="hideShowBtn()">
                                                <label class="form-check-label" for="customCheckBox4"></label>
                                             </div>
                                          </td>
                                          <td><?php echo $indexing1; ?></td>
                                          <td><?php echo $data1['id']; ?></td>
                                          <td><?php
                                                $transaction_date = $data1['timestamp'];
                                                echo date('h:i:s a', $transaction_date);

                                                echo '<br>';
                                                echo date('d/m/Y', $transaction_date);

                                                ?></td>
                                          <td><?php echo $data1['name']; ?></td>
                                          <td><?php echo $data1['email']; ?></td>
                                          <td><?php echo $data1['password']; ?></td>
                                          <td>
                                             <?php
                                             $user_role = $data1['user_role'];

                                             $query2 = "SELECT * FROM `user_roles` WHERE `id` = $user_role";
                                             $runquery2 = mysqli_query($con, $query2);
                                             $rows2 = mysqli_num_rows($runquery2);
                                             $indexing2 = 2;
                                             if ($rows2 > 0 && $runquery2 == TRUE) {
                                                while ($data2 = mysqli_fetch_assoc($runquery2)) {
                                                   if ($user_role == 1) {
                                             ?>
                                                      <span class="badge badge-info light">Admin</span>
                                                   <?php
                                                   } else if ($user_role == 2) {
                                                   ?>
                                                      <span class="badge badge-success light">User</span>
                                             <?php
                                                   }
                                                }
                                             }

                                             ?>
                                          </td>
                                          <td class="text-center">
                                             <?php
                                             echo $data1['my_referral_code'];
                                             ?>
                                          </td>
                                          <td>
                                             <?php
                                             $referred_by = $data1['referred_by_id'];
                                             //get the user email from user table with this id
                                             $query3 = "SELECT * FROM `users` WHERE `id` = $referred_by";
                                             $runquery3 = mysqli_query($con, $query3);
                                             $rows3 = mysqli_num_rows($runquery3);
                                             $indexing3 = 3;
                                             if ($rows3 > 0 && $runquery3 == TRUE) {
                                                while ($data3 = mysqli_fetch_assoc($runquery3)) {
                                                   $referred_by_email = $data3['email'];
                                                }
                                             } else {
                                                $referred_by_email = "";
                                             }
                                             if ($referred_by != 0) {
                                                echo "(#" . $referred_by . ")" . " " . $referred_by_email;
                                             } else {
                                                echo "Not Applied";
                                             }
                                             ?>
                                          </td>
                                          <td><?php
                                                if ($data1['kyc_country']  == NULL || $data1['kyc_country'] == "") {
                                                   echo "Not Updated";
                                                } else {
                                                   echo $data1['kyc_country'];
                                                }



                                                ?></td>
                                          <td><?php
                                                if ($data1['kyc_user_image']  == NULL || $data1['kyc_user_image'] == "") {
                                                   echo "Not Updated";
                                                } else {

                                                ?>
                                                <a href="../../uploads/users/kyc/<?php echo trim($data1['kyc_user_image']); ?>" target="_blank">View Document</a>
                                             <?php
                                                }
                                             ?>
                                          </td>
                                          <td><?php
                                                if ($data1['kyc_identity_front']  == NULL || $data1['kyc_identity_front'] == "") {
                                                   echo "Not Updated";
                                                } else {

                                                ?>
                                                <a href="../../uploads/users/kyc/<?php echo $data1['kyc_identity_front']; ?>" target="_blank">View Document</a>
                                             <?php
                                                }
                                             ?>
                                          </td>
                                          <td><?php
                                                if ($data1['kyc_identity_back']  == NULL || $data1['kyc_identity_back'] == "") {
                                                   echo "Not Updated";
                                                } else {

                                                ?>
                                                <a href="../../uploads/users/kyc/<?php echo $data1['kyc_identity_back']; ?>" target="_blank">View Document</a>
                                             <?php
                                                }
                                             ?>
                                          </td>
                                          <td class="text-center">
                                             <a href="edit/kyc-approve.php?id=<?php echo $data1['id']; ?>" title="Approved KYC">
                                                <i class="far fa-thumbs-up" style="color: <?php
                                                                                          if ($data1['kyc_approved'] == 1) {
                                                                                             echo "#68e365";
                                                                                          } else {
                                                                                             echo "#B3B3AB";
                                                                                          }
                                                                                          ?>  !important; cursor:pointer;"></i>
                                             </a>
                                             &nbsp;&nbsp;
                                             <span onclick="rejectRequest('<?php echo $data1['id']; ?>')">
                                                <i data-bs-toggle="modal" data-bs-target="#reject_request" class="far fa-thumbs-down" style="color: <?php
                                                                                                                                                      if ($data1['kyc_approved'] == 0) {
                                                                                                                                                         echo "#f72b50";
                                                                                                                                                      } else {
                                                                                                                                                         echo "#B3B3AB";
                                                                                                                                                      }
                                                                                                                                                      ?>  !important; cursor:pointer;"></i>
                                                </a>
                                          </td>
                                          <td><?php
                                                //if kyc_rejected_resaon is not empty then show the reason
                                                if ($data1['kyc_rejected_reason'] != NULL || $data1['kyc_rejected_reason'] != "") {
                                                   echo $data1['kyc_rejected_reason'];
                                                } else {
                                                   echo "Not Rejected";
                                                }
                                                ?>
                                          </td>
                                          <td>
                                             <?php
                                             $user_list_user_id = $data1['id'];
                                             $query2 = "SELECT * FROM `wallets` WHERE `user_id` = $user_list_user_id";
                                             $runquery2 = mysqli_query($con, $query2);
                                             $rows2 = mysqli_num_rows($runquery2);
                                             $indexing2 = 2;
                                             if ($rows2 > 0 && $runquery2 == TRUE) {
                                                while ($data2 = mysqli_fetch_assoc($runquery2)) {

                                                   echo $data2['wallet_address_one'];
                                                   if ($data2['wallet_address_one'] == NULL || $data2['wallet_address_one'] == "") {
                                                      echo "Not Applied";
                                                   }
                                                }
                                             } else {
                                                echo "Not Applied";
                                             }

                                             ?>
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
   <div class="modal fade" id="reject_request reject_request_modal_second">
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

   <!-- second modal -->
   <div class="modal fade" id="reject_request_modal_second">
      <div class="modal-dialog  modal-md modal-dialog-centered">
         <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
               <h4 class="modal-title">Bulk Rejection KYC Modal
               </h4>
               <span type="button" class="close" data-bs-dismiss="modal">&times;</span>
            </div>
            <form action="edit/bulk-kyc-reject.php" method="POST">
               <input type="hidden" name="bulk_reject_user_id" id="bulk_reject_user_id">
               <!-- Modal body -->
               <div class="modal-body">
                  <div class="row mt-4">
                     <div class="col-12">
                        <div class="form-group">
                           <label>Reject Reason</label>
                           <textarea class="form-control" name="reject_reason" id="bulk_reject_request_reject_reason_input" required></textarea>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col">
                     <div class="form-check custom-checkbox mb-3 pt-3">
											<input name="reject_modal_reason_checkbox_kyc_user_image" type="checkbox" class="form-check-input" id="customCheckBox1" value="1">
											<label class="form-check-label" for="customCheckBox1">KYC User Image</label>
										</div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col">
                     <div class="form-check custom-checkbox mb-3 pt-2">
											<input name="reject_modal_reason_checkbox_kyc_identity_front" type="checkbox" class="form-check-input" id="customCheckBox1" value="2">
											<label class="form-check-label" for="customCheckBox1">KYC Identity Front</label>
										</div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col">
                     <div class="form-check custom-checkbox mb-3 pt-2">
											<input name="reject_modal_reason_checkbox_kyc_identity_back" type="checkbox" class="form-check-input" id="customCheckBox1" value="3">
											<label class="form-check-label" for="customCheckBox1">KYC Identity Back</label>
										</div>
                     </div>
                  </div>
               </div>
               <!-- Modal footer -->
               <div class="modal-footer">
                  <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                  <button type="submit" name="bulk_reject_reason_btn" class="btn btn-primary">Reject</button>
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
<script>
   //hide and show btn in section 

   function hideShowBtn() {

      //display block btn bulk_approve_btn
      $('#bulk_approve_btn').css('display', 'block');
      //display none btn reject_btn
      $('#reject_btn').css('display', 'block');



      //get bulk_checkbox_input_class
      var form_check_input = document.getElementsByClassName('bulk_checkbox_input_class');
      //print
      // console.log(form_check_input);

      var selectedCheckBox = [];

      for (var i = 0; i < form_check_input.length; i++) {
         // console.log(form_check_input[i].checked);
         if (form_check_input[i].checked == true) {

            //get id of bulk_checkbox_input_class
            var id = form_check_input[i].id;
            //remove CheckBox_ from id
            id = id.replace('CheckBox_', '');

            //  console.log(id);

            //push id to array
            selectedCheckBox.push(id);
         }

      }
      //print array
      console.log(selectedCheckBox);

      //convert array to string
      var selectedCheckBoxString = selectedCheckBox.join(',');
      //print string
      console.log(selectedCheckBoxString);

      $('#bulk_approve_btn').attr('href', '../users/edit/bulk-kyc-approve.php?approve_user_id=' + selectedCheckBoxString);

      //get bulk_reject_user_id
      $('#bulk_reject_user_id').val(selectedCheckBoxString);

      //check bulk_checkbox_input_class is checked
      if ($('.bulk_checkbox_input_class').is(':checked')) {



      } else {
         //display none btn bulk_approve_btn
         $('#bulk_approve_btn').css('display', 'none');
         //display none btn reject_btn
         $('#reject_btn').css('display', 'none');
      }


   }
</script>