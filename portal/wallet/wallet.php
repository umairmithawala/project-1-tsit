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
//get email
$user_email = $user_data['email'];
if ($user_data['email_verification'] == 0) {
   echo "<script>window.location='../utility/email-not-verified.php';</script>";
}

?>
<?php
$tsit_coin_current_price = 0.000001;

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
   // echo "Phase – 5 - 14th June – 30th June 2022";
   $tsit_coin_current_price = 0.000004;
}

?>

<?php
if (isset($_POST['internal_transfer'])) {
   $receiver_email = $_POST['receiver_email'];
   $two_fa_code = $_POST['two_fa_code'];
   $amount = $_POST['amount'];

   $current_time = time();

   //here we are going to decide transfer fees 
   $internal_transfer_fees = 100000;

   //get this user two_fa_secret from users table
   $user_query = "SELECT * FROM `users` WHERE `id` = $user_id";
   $run_fetch = mysqli_query($con, $user_query);
   $user_data = mysqli_fetch_assoc($run_fetch);
   $two_fa_secret = $user_data['two_fa_secret'];


   //verify 2fa for 
   require "../security/2FA/Authenticator.php";
   $Authenticator = new Authenticator();

   $checkResult = $Authenticator->verifyCode($two_fa_secret, $two_fa_code, 4);    // 2 = 2*30sec clock tolerance

   if ($checkResult) {


      //check if $receiver_email exist in users table
      $check_email_query = "SELECT * FROM `users` WHERE `email` = '$receiver_email'";
      $run_check_email = mysqli_query($con, $check_email_query);
      $check_email_count = mysqli_num_rows($run_check_email);

      if ($check_email_count == 1) {
         //get the user_id of the receiver
         $receiver_user_id = 0;
         if ($check_email_count > 0) {
            $receiver_user_id = mysqli_fetch_assoc($run_check_email)['id'];

            //genertare a random number 7 digits in hexadecimal
            $hash = bin2hex(random_bytes(7));

            if ($receiver_user_id != $user_id) {
               //insert data into transactions table (sending money)
               $query4  = "INSERT INTO `transactions`(`id`, `user_id`, `transaction_type`, 
            `hash`, `note`, `to_address`, `from_address`, `is_addition`, `transaction_status`,
             `amount`, `timestamp`) VALUES (NULL, $user_id, 9,'$hash','Internal Transfer','$receiver_email','$user_email',
             0,1,$amount,$current_time)";

               $run_query4 = mysqli_query($con, $query4);

               

               //create the amount for the receiving user 
               $receiver_amount = $amount - $internal_transfer_fees;


               //insert data into transactions table (receiving money)
               $query5  = "INSERT INTO `transactions`(`id`, `user_id`, `transaction_type`,
            `hash`, `note`, `to_address`, `from_address`, `is_addition`, `transaction_status`,
             `amount`, `timestamp`) VALUES (NULL, $receiver_user_id, 10,'Not Applied','Internal Transfer','$receiver_email','$user_email', 
             1,1,$receiver_amount,$current_time)";

               $run_query5 = mysqli_query($con, $query5);
            } else {

?>
               <script>
                  alert("You can't transfer to yourself");
               </script>

         <?php
            }
         }
      } else {
         ?>
         <script>
            alert('Please enter a valid email address');
         </script>
      <?php
      }
   } else {
      ?>
      <script>
         alert('Please enter a valid 2FA code');
      </script>
<?php
   }
}
?>
<?php
if (isset($_POST['withdraw'])) {




   $to_address = $_POST['to_address'];
   $amount = $_POST['amount'];
   $transaction_fees = $_POST['transaction_fees'];
   $kyc_approved = $user_data['kyc_approved'];

   $two_fa_code = $_POST['two_fa_code'];
   $current_time = time();

   //get this user two_fa_secret from users table
   $user_query = "SELECT * FROM `users` WHERE `id` = $user_id";
   $run_fetch = mysqli_query($con, $user_query);
   $user_data = mysqli_fetch_assoc($run_fetch);
   $two_fa_secret = $user_data['two_fa_secret'];


   //verify 2fa for 
   require "../security/2FA/Authenticator.php";
   $Authenticator = new Authenticator();

   $checkResult = $Authenticator->verifyCode($two_fa_secret, $two_fa_code, 2);    // 2 = 2*30sec clock tolerance

   if ($checkResult) {



      if ($amount < 1000000) {



         $query4  = "INSERT INTO `transactions`(`id`, `user_id`, `transaction_type`, 
      `hash`, `note`, `to_address`, `from_address`, `is_addition`, `transaction_status`,
       `amount`, `timestamp`) VALUES (NULL, $user_id, 2,'Not Applied','Withdraw','$to_address', 'Not Applied',
       0,3,$amount,$current_time)";


         if ($con->query($query4) === TRUE) {


            $user_email = $user_data['email'];
            // mail logic


            // Multiple recipients
            $to = $user_email; // note the comma
            // Subject
            $subject = 'New withdraw request has been made [Tesla Inu]';

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
                                   This is to inform that we have received withdrawal request from your account.
                                  </p>
                                  <p>
                                  To Address : ' . $to_address . '
                                  <br>
                                  Amount : ' . $amount . '
                                  </p>
                               
                                <p>
                                 If you did not made this request then report us immediately!
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
         } else {
            //   echo "Error: " . $query4 . "<br>" . $con->error;

         }
      } else {

         if ($kyc_approved == 1) {
            $query4  = "INSERT INTO `transactions`(`id`, `user_id`, `transaction_type`, 
      `hash`, `note`, `to_address`, `from_address`, `is_addition`, `transaction_status`,
       `amount`, `timestamp`) VALUES (NULL, $user_id, 2,'Not Applied','Withdraw','$to_address', 'Not Applied',
       0,3,$amount,$current_time)";


            if ($con->query($query4) === TRUE) {

               $user_email = $user_data['email'];
               // mail logic


               // Multiple recipients
               $to = $user_email; // note the comma
               // Subject
               $subject = 'New withdraw request has been made [Tesla Inu]';

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
                                   This is to inform that we have received withdrawal request from your account.
                                  </p>
                                  <p>
                                  To Address : ' . $to_address . '
                                  <br>
                                  Amount : ' . $amount . '
                                  </p>
                               
                                <p>
                                 If you did not made this request then report us immediately!
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
         } else {
            echo "<script>alert('You need to complete KYC for more then 1M transaction!');</script>";
         }
      }
   } else {
?>

      <script>
         alert('Please enter a valid 2FA code');
      </script>
<?php
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
   <title>Wallet - Tesla INU</title>
   <!-- FAVICONS ICON -->
   <link rel="shortcut icon" type="image/png" href="../assets/images/favicon.png" />
   <link href="../assets/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet" />
   <link rel="stylesheet" href="../assets/vendor/dotted-map/css/contrib/jquery.smallipop-0.3.0.min.css" type="text/css" media="all" />
   <!-- Style css -->
   <link href="../assets/css/style.css" rel="stylesheet" />
   <!-- Datatable -->
   <link href="../assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet" />
   <!-- Custom Stylesheet -->
   <link href="../assets/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet" />
   <style>
      .alerttoggle {
         display: none;
      }
      /* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
   </style>
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
      // require('../elements/header.php');
      ?>
      <?php
      // require('../elements/sidebar.php');
      ?>
      <div class="content-body">
         <!-- row -->
         <div class="container-fluid">
            <div class="mb-sm-4 d-flex flex-wrap align-items-center text-head">
               <h2 class="mb-3 me-auto">Wallet</h2>
            </div>
            <?php
            //getting the current balance from the databases

            $total_balance = 0;
            $total_received = 0;
            $total_sent = 0;

            $query1     = "SELECT SUM(`amount`) AS `total_received` FROM `transactions` WHERE `user_id` = $user_id AND `is_addition` = 1";
            $run_query1 = mysqli_query($con, $query1);
            $rows1      = mysqli_num_rows($run_query1);
            $indexing1  = 1;
            if ($rows1 > 0 && $run_query1 == TRUE) {
               while ($data1 = mysqli_fetch_assoc($run_query1)) {
                  $total_received = $data1['total_received'];
               }
            }


            $query1     = "SELECT SUM(`amount`) AS `total_sent` FROM `transactions` WHERE `user_id` = $user_id AND `is_addition` = 0";
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
            <?php
            //deciding transaction fees


            $transaction_fees = 100000;

            ?>
            <div class="row">
               <div class="col-xl-4 col-lg-6">
                  <div class="card">
                     <div class="card-header border-0 flex-wrap">
                        <h4 class="fs-20">Current Balance</h4>
                     </div>
                     <div class="card-body py-0">
                        <div class="tab-content">
                           <div class="tab-pane fade active show" id="Monthly" style="position: relative;">
                              <div class="flex-wrap mb-sm-4 mb-2 align-items-center">
                                 <div class="d-flex align-items-center">
                                    <span class="revenue text-black font-w600 me-5"><?php echo $total_balance . " TSIT"; ?></span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-4 col-lg-6">
                  <div class="card">
                     <div class="card-header border-0 flex-wrap">
                        <h4 class="fs-20">Total Received</h4>
                     </div>
                     <div class="card-body py-0">
                        <div class="tab-content">
                           <div class="tab-pane fade active show" id="Monthly" style="position: relative;">
                              <div class="flex-wrap mb-sm-4 mb-2 align-items-center">
                                 <div class="d-flex align-items-center">
                                    <span class="revenue text-black font-w600 me-5"><?php echo $total_received . " TSIT" ?></span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-4 col-lg-6">
                  <div class="card">
                     <div class="card-header border-0 flex-wrap">
                        <h4 class="fs-20">Total Sent</h4>
                     </div>
                     <div class="card-body py-0">
                        <div class="tab-content">
                           <div class="tab-pane fade active show" id="Monthly" style="position: relative;">
                              <div class="flex-wrap mb-sm-4 mb-2 align-items-center">
                                 <div class="d-flex align-items-center">
                                    <span class="revenue text-black font-w600 me-5"><?php echo $total_sent . " TSIT"; ?></span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">

               <div class="col-xl-6">
                  <!-- send section -->
                  <div class="card">
                     <div class="card-header">
                        <h4 class="card-title">Send (Withdraw)</h4>
                     </div>
                     <div class="card-body">
                        <div class="basic-form">
                           <form action="" method="POST">
                              <input type="hidden" name="transaction_fees">
                              <div class="mb-3">
                                 <label for="" class="text-white">TSIT Wallet Address</label>
                                 <input type="text" name="to_address" class="form-control input-default" placeholder="Please enter TSIT wallet address" required />
                                 <small>Use TRON blockchain addresses only</small>
                              </div>
                              <div class="mb-3">
                                 <label for="" class="text-white">Amount</label>
                                 <input value="<?php echo $transaction_fees; ?>" oninput="amountChange();" id="wallet_withdraw_amount_input" type="number" class="form-control input-default" min="<?php echo 10 / $tsit_coin_current_price + $transaction_fees;  ?>" max="<?php echo $total_balance - $transaction_fees; ?>" name="amount" placeholder="Enter amount you wants to send" required />
                                 <small>Max: <?php echo $total_balance - $transaction_fees; ?></small>
                                 <small>Min: <?php echo 10 / $tsit_coin_current_price + $transaction_fees; ?></small>
                              </div>
                              <div class="mb-3">
                                 <label for="" class="text-white">2FA</label>
                                 <input type="text" name="two_fa_code" class="form-control input-default" placeholder="Please enter 2fa code" required />
                              </div>
                              <div class="mb-3">
                                 <h6 class="">Network fees: <?php echo $transaction_fees; ?> TSIT</h6>
                              </div>
                              <div class="mb-3">
                                 <h4>You will receive: <span class="text-success"><span id="you_will_receive_show"></span> TSIT</span></h4>
                              </div>
                              <div class="mb-3 mt-3 pt-3">
                                 <button type="submit" name="withdraw" class="btn btn-primary btn-block">Withdraw</button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-6">
                  <!-- send section -->
                  <div class="card">
                     <div class="card-header">
                        <h4 class="card-title">Internal Transfer</h4>
                     </div>
                     <div class="card-body">
                        <div class="basic-form">
                           <form action="" method="POST">
                              <input type="hidden" name="transaction_fees">
                              <div class="mb-3">
                                 <label for="" class="text-white">User Email Address</label>
                                 <input type="email" name="receiver_email" class="form-control input-default" placeholder="Please enter receiver email address" required />
                                 <small>Use registered email address only</small>
                              </div>
                              <div class="mb-3">
                                 <label for="" class="text-white">Amount</label>
                                 <input value="<?php echo $transaction_fees; ?>" oninput="amountChange0();" id="wallet_internal_transfer_amount_input" type="number" class="form-control input-default" min="<?php echo 10 / $tsit_coin_current_price + $transaction_fees;  ?>" max="<?php echo $total_balance - $transaction_fees; ?>" name="amount" placeholder="Enter amount you wants to send" required />
                                 <small>Max: <?php echo $total_balance - $transaction_fees; ?></small>
                                 <small>Min: <?php echo 10 / $tsit_coin_current_price + $transaction_fees; ?></small>
                              </div>
                              <div class="mb-3">
                                 <label for="" class="text-white">2FA</label>
                                 <input type="text" name="two_fa_code" class="form-control input-default" placeholder="Please enter 2fa code" required />
                              </div>

                              <div class="mb-3 mt-3 pt-3">
                                 <button type="submit" name="internal_transfer" class="btn btn-primary btn-block">Send</button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>

               <!-- <div class="col-xl 6">
                  
                  <div class="card">
                     <div class="card-header">
                        <h4 class="card-title">Receive</h4>
                     </div>
                     <div class="card-body">
                        <?php
                        //here we are going to derive wallet address from the data in


                        $user_query = "SELECT * FROM `wallets` WHERE `user_id` = $user_id";
                        $run_fetch = mysqli_query($con, $user_query);
                        $no_of_row  = mysqli_num_rows($run_fetch);
                        if ($no_of_row > 0 && $run_fetch == TRUE) {
                           while ($data1 = mysqli_fetch_assoc($run_fetch)) {
                              $wallet_address_one = $data1['wallet_address_one'];
                           }
                        }

                        ?>
                        <div id="link_copy_alert_success" class="alert alert-success alert-dismissible fade show alerttoggle">
                           <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                              <polyline points="9 11 12 14 22 4"></polyline>
                              <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                           </svg>
                           <strong>Copied!</strong> Wallet address copied successfully.
                           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                           </button>
                        </div>
                        <div class="row">
                           <div class="col-md-12 text-center">
                              <div id="qrcode" style="width:200px; height:200px; margin-top:15px; margin:auto;"></div>
                              <h4 onclick="copyCode('<?php echo $wallet_address_one; ?>')" class="pt-4" style="cursor:pointer;"><span id="text"><?php echo $wallet_address_one; ?></span> <i class="flaticon-022-copy"></i></h4>
                           </div>
                        </div>
                     </div>
                  </div>
               </div> -->
            </div>
            <div class="row">
               <div class="col-xl-12 col-lg-6">
                  <div class="card">
                     <div class="card-header">
                        <h4 class="card-title">Transactions List</h4>
                        <scam class="card-title-desc">Here you can see all the transactions.</scam>
                     </div>
                     <div class="card-body">
                        <div class="table-responsive">
                           <table id="example" class="display" style="min-width: 845px;">
                              <thead>
                                 <tr>
                                    <th>#</th>
                                    <th>Transaction ID</th>
                                    <th>Hash</th>
                                    <th>Note</th>
                                    <th>Transaction Type</th>
                                    <th>To Address</th>
                                    <th>From Address</th>
                                    <th>Transaction Status</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                 $query1 = "SELECT * FROM `transactions` WHERE `user_id` = $user_id ORDER BY `id` DESC";
                                 $runquery1 = mysqli_query($con, $query1);
                                 $rows1 = mysqli_num_rows($runquery1);
                                 $indexing1 = 1;
                                 if (
                                    $rows1 >
                                    0 && $runquery1 == TRUE
                                 ) {
                                    while ($data1 = mysqli_fetch_assoc($runquery1)) { ?>
                                       <tr>
                                          <td><?php echo $indexing1; ?></td>
                                          <td><?php echo $data1['id']; ?></td>
                                          <td><?php echo $data1['hash']; ?></td>
                                          <td><?php echo $data1['note']; ?></td>
                                          <td>
                                             <?php
                                             $transaction_type = $data1['transaction_type'];

                                             $query2 = "SELECT * FROM `transaction_type` WHERE `id` = $transaction_type";
                                             $runquery2 = mysqli_query($con, $query2);
                                             $rows2 = mysqli_num_rows($runquery2);
                                             $indexing2 = 2;
                                             if (
                                                $rows2 >
                                                0 && $runquery2 == TRUE
                                             ) {
                                                while ($data2 = mysqli_fetch_assoc($runquery2)) {
                                                   echo $data2['name'];
                                                }
                                             } ?>
                                          </td>
                                          <td><?php echo $data1['to_address']; ?></td>
                                          <td><?php
                                                // echo $data1['from_address']; 
                                                echo 'TSkcFMZtFzRbADShm9bDrRwugipKy1QjAs';


                                                ?></td>
                                          <td><?php echo $data1['amount']; ?></td>
                                          <td>
                                             <?php
                                             $transaction_status = $data1['transaction_status'];

                                             $query2 = "SELECT * FROM `transaction_status` WHERE `id` = $transaction_status";
                                             $runquery2 = mysqli_query($con, $query2);
                                             $rows2 = mysqli_num_rows($runquery2);
                                             $indexing2 = 2;
                                             if (
                                                $rows2 >
                                                0 && $runquery2 == TRUE
                                             ) {
                                                while ($data2 = mysqli_fetch_assoc($runquery2)) {
                                                   if ($transaction_status == 1) { ?>
                                                      <span class="badge badge-success light">Completed</span>
                                                   <?php
                                                   } else if ($transaction_status == 2) {
                                                   ?>
                                                      <span class="badge badge-danger light">Rejected</span>
                                                   <?php
                                                   } else {
                                                   ?>
                                                      <span class="badge badge-warning light">Pending</span>
                                             <?php
                                                   }
                                                }
                                             }

                                             ?>
                                          </td>
                                          <td></td>
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
   <script src="../assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
   <script src="../assets/vendor/qrcode/qrcode.js"></script>
   <script type="text/javascript">
      var qrcode = new QRCode(document.getElementById("qrcode"), {
         width: 200,
         height: 200
      });

      function makeCode() {
         var elText = document.getElementById("text").innerHTML;


         qrcode.makeCode(elText);
      }

      makeCode();

      $("#text").
      on("blur", function() {
         makeCode();
      }).
      on("keydown", function(e) {
         if (e.keyCode == 13) {
            makeCode();
         }
      });
   </script>
   <script>
      function copyCode(copyText) {

         console.log(copyText);
         const el = document.createElement('textarea');
         el.value = copyText;
         document.body.appendChild(el);
         el.select();
         document.execCommand('copy');
         document.body.removeChild(el);
         document.getElementById('link_copy_alert_success').classList.remove('alerttoggle');


      }
   </script>
</body>

</html>
<script>
   function amountChange() {

      var transaction_fees = <?php echo $transaction_fees; ?>;
      var tsit_coin_current_price = <?php echo $tsit_coin_current_price; ?>

      var get_wallet_withdraw_amount_input = document.getElementById('wallet_withdraw_amount_input');
      var get_you_will_receive_show = document.getElementById('you_will_receive_show');
      var you_will_receive = get_wallet_withdraw_amount_input.value - transaction_fees;


      if (you_will_receive < 0) {
         you_will_receive = 0;
      }

      get_you_will_receive_show.innerHTML = you_will_receive;

   }
   amountChange();
</script>