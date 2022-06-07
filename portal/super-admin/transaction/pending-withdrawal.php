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
?>
<?php
if (isset($_POST['reject_withdraw'])) {

  $transaction_id = $_POST['transaction_id'];
  $note = $_POST['note'];
  $reject_reason = $_POST['reject_reason'];

  $new_note = "<strong>" . $reject_reason . "</strong><br><br>" . $note;

  $query1  = "UPDATE `transactions` SET `note`='$new_note',`transaction_status`=2 WHERE `id` = $transaction_id";


  if ($con->query($query1) === TRUE) {



    //getting user id from transaction table
    $query2 = "SELECT `user_id` FROM `transactions` WHERE `id` = $transaction_id";
    $runquery2 = mysqli_query($con, $query2);
    $rows2 = mysqli_num_rows($runquery2);
    $indexing2 = 1;
    if ($rows2 > 0 && $runquery2 == TRUE) {
      while ($data2 = mysqli_fetch_assoc($runquery2)) {


        $user_id_of_transaction = $data2['user_id'];


        $query3 = "SELECT `email` FROM `users` WHERE `id` = $user_id_of_transaction";
        $runquery3 = mysqli_query($con, $query3);
        $rows3 = mysqli_num_rows($runquery3);
        $indexing3 = 1;
        if ($rows3 > 0 && $runquery3 == TRUE) {
          while ($data3 = mysqli_fetch_assoc($runquery3)) {


            $user_email = $data3['email'];
          }
        }
      }
    }


    // mail logic


    // Multiple recipients
    $to = $user_email; // note the comma
    // Subject
    $subject = 'Oops! Your withdrawal request rejected [Tesla Inu]';

    // Message
    $message = '<!DOCTYPE html>
    <html lang="en">
      <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta
          name="description"
          content="Xolo admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities."
        />
        <meta
          name="keywords"
          content="admin template, Xolo admin template, dashboard template, flat admin template, responsive admin template, web app"
        />
        <meta name="author" content="pixelstrap" />
        <link
          rel="icon"
          href="http://laravel.pixelstrap.com/xolo/assets/images/favicon.png"
          type="image/x-icon"
        />
        <link
          rel="shortcut icon"
          href="http://laravel.pixelstrap.com/xolo/assets/images/favicon.png"
          type="image/x-icon"
        />
        <title>THS Mining</title>
        <link
          href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900"
          rel="stylesheet"
        />
        <link
          href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet"
        />
        <link
          href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet"
        />
        <style type="text/css">
          body {
            width: 650px;
            font-family: work-Sans, sans-serif;
            background-color: #f6f7fb;
            display: block;
          }
          a {
            text-decoration: none;
          }
          span {
            font-size: 14px;
          }
          p {
            font-size: 13px;
            line-height: 1.7;
            letter-spacing: 0.7px;
            margin-top: 0;
          }
          .text-center {
            text-align: center;
          }
        </style>
      </head>
      <body style="margin: 30px auto">
        <table style="width: 100%">
          <tbody>
            <tr>
              <td>
                <table style="background-color: #f6f7fb; width: 100%">
                  <tbody>
                    <tr>
                      <td>
                        <table
                          style="width: 650px; margin: 0 auto; margin-bottom: 30px; margin-top:30px;"
                        >
                          <tbody>
                            <tr>
                              <td>
                                <img
                                  src="http://teslainu.com/portal/assets/images/logo/logo.png"
                                  alt=""
                                />
                              </td>
                              <td style="text-align: right; color: #999">
                                
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <table
                          style="
                            width: 650px;
                            margin: 0 auto;
                            background-color: #fff;
                            border-radius: 8px;
                          "
                        >
                          <tbody>
                            <tr>
                              <td style="padding: 30px">
                                <p>Hi There,</p>
                                <p>
                                   This is to inform that we have rejected your withdrawal request for the following reason.
                                  </p>
                                  <p>"
                                  ' . $reject_reason . '
                              
                                  "</p>
                               
                                <p>
                                 If you find this as a mistake then please report us!
                                </p>
                                <p style="margin-bottom: 0">
                                  Good luck! Hope it works.
                                </p>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <table
                          style="width: 650px; margin: 0 auto; margin-top: 30px"
                        >
                          <tbody>
                            <tr style="text-align: center">
                              <td>
                                <p style="color: #999; margin-bottom: 0">
                                  
                                </p>
                                <p style="color: #999; margin-bottom: 0">
                                  Dont Like These Emails?<a
                                    href="#"
                                    style="color: #3452ff"
                                    > Unsubscribe</a
                                  >
                                </p>
                                
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
          </tbody>
        </table>
      </body>
    </html>
    ';

    // To send HTML mail, the Content-type header must be set
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=iso-8859-1';

    // Additional headers
    $headers[] = 'From: Tesla INU Official <no-reply@teslainu.com>';

    // Mail it
    $mailto = mail($to, $subject, $message, implode("\r\n", $headers));

    if ($mailto) {

      echo "<script>var email_resend_alert = 1;</script>";
      //      echo "mail sent";

    }

    // mail logic ends

  }
}

?>
<?php
if (isset($_POST['approve_withdraw'])) {

  $transaction_id = $_POST['transaction_id'];
  $hash = $_POST['hash'];




  $query1  = "UPDATE `transactions` SET `hash`='$hash',`transaction_status`= 1 WHERE `id` = $transaction_id";


  if ($con->query($query1) === TRUE) {


    //getting user id from transaction table
    $query2 = "SELECT `to_address`,`amount`,`user_id` FROM `transactions` WHERE `id` = $transaction_id";
    $runquery2 = mysqli_query($con, $query2);
    $rows2 = mysqli_num_rows($runquery2);
    $indexing2 = 1;
    if ($rows2 > 0 && $runquery2 == TRUE) {
      while ($data2 = mysqli_fetch_assoc($runquery2)) {
        $user_id_of_transaction = $data2['user_id'];
        $transaction_amount = $data2['amount'];
        $transaction_to_address = $data2['to_address'];

        $query3 = "SELECT `email`,`name` FROM `users` WHERE `id` = $user_id_of_transaction";
        $runquery3 = mysqli_query($con, $query3);
        $rows3 = mysqli_num_rows($runquery3);
        $indexing3 = 1;
        if ($rows3 > 0 && $runquery3 == TRUE) {
          while ($data3 = mysqli_fetch_assoc($runquery3)) {
            $user_email = $data3['email'];
            $pending_withdraw_user_name = $data3['name'];
          }
        }
      }
    }


    // INSERT INTO `dashboard_news`(`id`, `title`, `added_by`, `is_deleted`, `timestamp`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]')

    //insert this user withdrawal request approved into dashboard_news table
    $timestamp = time();
    $dashboard_news_query = "INSERT INTO `dashboard_news`(`title`, `added_by`, `is_deleted`, `timestamp`) VALUES ('TSIT withdraw request approved of $pending_withdraw_user_name','$user_id_of_transaction','0','$timestamp')";
    $run_dashboard_news_query = mysqli_query($con, $dashboard_news_query);

    // mail logic


    // Multiple recipients
    $to = $user_email; // note the comma
    // Subject
    $subject = 'Hurray! Your withdrawal request approved [Tesla Inu]';

    // Message
    $message = '<!DOCTYPE html>
       <html lang="en">
         <head>
           <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
           <meta http-equiv="X-UA-Compatible" content="IE=edge" />
           <meta name="viewport" content="width=device-width, initial-scale=1.0" />
           <meta
             name="description"
             content="Xolo admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities."
           />
           <meta
             name="keywords"
             content="admin template, Xolo admin template, dashboard template, flat admin template, responsive admin template, web app"
           />
           <meta name="author" content="pixelstrap" />
           <link
             rel="icon"
             href="http://laravel.pixelstrap.com/xolo/assets/images/favicon.png"
             type="image/x-icon"
           />
           <link
             rel="shortcut icon"
             href="http://laravel.pixelstrap.com/xolo/assets/images/favicon.png"
             type="image/x-icon"
           />
           <title>THS Mining</title>
           <link
             href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900"
             rel="stylesheet"
           />
           <link
             href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
             rel="stylesheet"
           />
           <link
             href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
             rel="stylesheet"
           />
           <style type="text/css">
             body {
               width: 650px;
               font-family: work-Sans, sans-serif;
               background-color: #f6f7fb;
               display: block;
             }
             a {
               text-decoration: none;
             }
             span {
               font-size: 14px;
             }
             p {
               font-size: 13px;
               line-height: 1.7;
               letter-spacing: 0.7px;
               margin-top: 0;
             }
             .text-center {
               text-align: center;
             }
           </style>
         </head>
         <body style="margin: 30px auto">
           <table style="width: 100%">
             <tbody>
               <tr>
                 <td>
                   <table style="background-color: #f6f7fb; width: 100%">
                     <tbody>
                       <tr>
                         <td>
                           <table
                             style="width: 650px; margin: 0 auto; margin-bottom: 30px; margin-top:30px;"
                           >
                             <tbody>
                               <tr>
                                 <td>
                                   <img
                                     src="http://teslainu.com/portal/assets/images/logo/logo.png"
                                     alt=""
                                   />
                                 </td>
                                 <td style="text-align: right; color: #999">
                                   
                                 </td>
                               </tr>
                             </tbody>
                           </table>
                           <table
                             style="
                               width: 650px;
                               margin: 0 auto;
                               background-color: #fff;
                               border-radius: 8px;
                             "
                           >
                             <tbody>
                               <tr>
                                 <td style="padding: 30px">
                                   <p>Hi There,</p>
                                   <p>
                                      This is to inform that we have approved your withdrawal request please find details below.
                                     </p>
                                     <p>
                                     To Address : ' . $transaction_to_address . '
                                     <br>
                                     Amount : ' . $transaction_amount . '
                                     <br>
                                     Amount : ' . $hash . '
                                     </p>
                                  
                                   <p>
                                    If you find this as a mistake then please report us!
                                   </p>
                                   <p style="margin-bottom: 0">
                                     Good luck! Hope it works.
                                   </p>
                                 </td>
                               </tr>
                             </tbody>
                           </table>
                           <table
                             style="width: 650px; margin: 0 auto; margin-top: 30px"
                           >
                             <tbody>
                               <tr style="text-align: center">
                                 <td>
                                   <p style="color: #999; margin-bottom: 0">
                                     
                                   </p>
                                   <p style="color: #999; margin-bottom: 0">
                                     Dont Like These Emails?<a
                                       href="#"
                                       style="color: #3452ff"
                                       > Unsubscribe</a
                                     >
                                   </p>
                                   
                                 </td>
                               </tr>
                             </tbody>
                           </table>
                         </td>
                       </tr>
                     </tbody>
                   </table>
                 </td>
               </tr>
             </tbody>
           </table>
         </body>
       </html>
       ';

    // To send HTML mail, the Content-type header must be set
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=iso-8859-1';

    // Additional headers
    $headers[] = 'From: Tesla INU Official <no-reply@teslainu.com>';

    // Mail it
    $mailto = mail($to, $subject, $message, implode("\r\n", $headers));

    if ($mailto) {

      echo "<script>var email_resend_alert = 1;</script>";
      //      echo "mail sent";

    }

    // mail logic ends


  }
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
  <title>Pending Withdrawal - Tesla INU</title>
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
          <h2 class="mb-3 me-auto">Pending Withdrawal</h2>
        </div>
        <div class="row">
          <div class="col-xl-12 col-lg-6">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Pending Withdrawal</h4>
                <scam class="card-title-desc">Here you can see all the Pending Withdrawal on the TSIT portal</scam>
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
                        <th>Hash</th>
                        <th>Note</th>
                        <th>To Address</th>
                        <th>Transaction Status</th>
                        <th>Action</th>
                        <!-- <th>Action</th> -->
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $query1 = "SELECT * FROM `transactions` WHERE `transaction_type` = 2 AND `transaction_status` = 3";
                      $runquery1 = mysqli_query($con, $query1);
                      $rows1 = mysqli_num_rows($runquery1);
                      $indexing1 = 1;

                      if ($rows1 > 0 && $runquery1 == TRUE) {
                        while ($data1 = mysqli_fetch_assoc($runquery1)) {
                      ?>
                          <tr>
                            <td class="text-center"> <?php echo $data1['id']; ?> </td>
                            <td class="text-center"> <?php echo "#" . $data1['user_id']; ?> </td>
                            <td> <?php
                                  $transaction_type = $data1['transaction_type'];
                                  $query2 = "SELECT * FROM `transaction_type` WHERE `id` = $transaction_type";
                                  $runquery2 = mysqli_query($con, $query2);
                                  $rows2 = mysqli_num_rows($runquery2);
                                  $indexing2 = 1;

                                  if ($rows2 > 0 && $runquery2 == TRUE) {
                                    while ($data2 = mysqli_fetch_assoc($runquery2)) {
                                      echo $data2['name'];
                                    }
                                  } else {
                                    echo 'Not Applied';
                                  }


                                  ?> </td>
                            <td> <?php echo $data1['amount']; ?> </td>
                            <td> <?php echo $data1['hash']; ?> </td>
                            <td> <?php echo $data1['note']; ?> </td>
                            <td> <?php echo $data1['to_address']; ?> </td>
                            <td> <span class="badge badge-warning light">Pending</span> </td>
                            <td class="text-center">
                              <span data-bs-toggle="modal" data-bs-target="#approve_withdraw" onclick="approveWithdraw('<?php echo $data1['id'] ?>','<?php echo $data1['to_address'] ?>','<?php echo $data1['amount'] ?>');">
                                <i class="far fa-thumbs-up" style="color: #68e365  !important; cursor:pointer;">
                                </i>
                              </span>
                              &nbsp;&nbsp;
                              <span data-bs-toggle="modal" data-bs-target="#reject_withdraw" onclick="rejectWithdraw('<?php echo $data1['id'] ?>','<?php echo $data1['note'] ?>');">
                                <i class="far fa-thumbs-down" style="color: #f72b50  !important; cursor:pointer;">
                                </i>
                              </span>
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
      <?php require('../elements/footer.php'); ?>
    </div>
  </div>
  <div class="modal fade" id="approve_withdraw">
    <div class="modal-dialog  modal-md modal-dialog-centered">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Approve Transaction
          </h4>
          <span type="button" class="close" data-bs-dismiss="modal">&times;</span>
        </div>
        <form action="" method="POST">
          <input type="hidden" name="transaction_id" id="approve_withdraw_transaction_transaction_id_input_hidden">
          <!-- Modal body -->
          <div class="modal-body">
            <div class="row">
              <div class="col">
                <h5>Amount: <span id="approve_withdraw_transaction_amount_show">0</span> TSIT</h5>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-12">
                <div class="form-group">
                  <label>To Address</label>
                  <input class="form-control" name="to_address" id="approve_withdraw_transaction_to_address_input" placeholder="Enter To Address" type="text" data-original-title="" title="" required>
                </div>
              </div>
              <div class="col-12 ">
                <div id="to_address_qrcode" style="margin-top:20px; margin-bottom:20px;"></div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label>Hash</label>
                  <input class="form-control" name="hash" id="approve_withdraw_transaction_hash_input" placeholder="Enter Hash" type="text" data-original-title="" title="" required>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="approve_withdraw" class="btn btn-primary">Approve</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="modal fade" id="reject_withdraw">
    <div class="modal-dialog  modal-md modal-dialog-centered">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Reject Transaction
          </h4>
          <span type="button" class="close" data-bs-dismiss="modal">&times;</span>
        </div>
        <form action="" method="POST">
          <input type="hidden" name="transaction_id" id="reject_withdraw_transaction_transaction_id_input_hidden">
          <input type="hidden" name="note" id="reject_withdraw_transaction_note_input_hidden">
          <!-- Modal body -->
          <div class="modal-body">
            <div class="row mt-4">
              <div class="col-12">
                <div class="form-group">
                  <label>Reject Reason</label>
                  <textarea class="form-control" name="reject_reason" id="reject_withdraw_transaction_reject_reason_input" required></textarea>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="reject_withdraw" class="btn btn-primary">Reject</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Plugins JS Ends-->
  <!-- Theme js-->
  <script src="../../assets/js/script.js"></script>
  <!-- login js-->
  <!-- Plugin used -->
  <script src="../../assets/js/theme-customizer/customizer.js"></script>
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
  <script src="../../assets/plugins/qrcode/qrcode.js"></script>
  </script>
  <script type="text/javascript">
    var qrcode = new QRCode(document.getElementById("to_address_qrcode"), {
      width: 150,
      height: 150
    });
  </script>
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
  function approveWithdraw(id, to_address, amount) {
    var get_approve_withdraw_transaction_transaction_id_input_hidden = document.getElementById('approve_withdraw_transaction_transaction_id_input_hidden')
    var get_approve_withdraw_transaction_to_address_input = document.getElementById('approve_withdraw_transaction_to_address_input');
    var get_approve_withdraw_transaction_amount_show = document.getElementById('approve_withdraw_transaction_amount_show');

    get_approve_withdraw_transaction_transaction_id_input_hidden.value = id;
    get_approve_withdraw_transaction_to_address_input.value = to_address;
    get_approve_withdraw_transaction_amount_show.innerHTML = amount;

    qrcode.makeCode(to_address);


  }
</script>
<script>
  function rejectWithdraw(id, note) {

    var get_reject_withdraw_transaction_transaction_id_input_hidden = document.getElementById('reject_withdraw_transaction_transaction_id_input_hidden');
    var get_reject_withdraw_transaction_note_input_hidden = document.getElementById('reject_withdraw_transaction_note_input_hidden');

    get_reject_withdraw_transaction_transaction_id_input_hidden.value = id;
    get_reject_withdraw_transaction_note_input_hidden.value = note;

  }
</script>