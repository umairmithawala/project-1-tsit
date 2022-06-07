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
if ($user_data['email_verification'] == 0) {
  echo "<script>window.location='../utility/email-not-verified.php';</script>";
}

?>

<?php



$minimum_tsit_buy_amount = 100000000;

$tsit_coin_current_price = 0.000001;


//if $current_date is smaller then 23rd april 2022 then show the supply
//if $current_date is greater then 10th may 2022 then show the supply
//if $current_date is greater then 27th may 2022 then show the supply
//if $current_date is greater then 13th june 2022 then show the supply
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






//bitcoin price derive
$coingecko_pricing_api = 'https://api.coingecko.com/api/v3/simple/price?ids=bitcoin&vs_currencies=usd';
$content =  file_get_contents("$coingecko_pricing_api");
$result  = json_decode($content, true);
$price_of_bitcoin = $result["bitcoin"]["usd"];



$coingecko_pricing_api = 'https://api.coingecko.com/api/v3/simple/price?ids=ethereum&vs_currencies=usd';
$content =  file_get_contents("$coingecko_pricing_api");
$result  = json_decode($content, true);
$price_of_ethereum = $result["ethereum"]["usd"];



$coingecko_pricing_api = 'https://api.coingecko.com/api/v3/simple/price?ids=tron&vs_currencies=usd';
$content =  file_get_contents("$coingecko_pricing_api");
$result  = json_decode($content, true);
$price_of_tron = $result["tron"]["usd"];


$coingecko_pricing_api = 'https://api.coingecko.com/api/v3/simple/price?ids=binancecoin&vs_currencies=usd';
$content =  file_get_contents("$coingecko_pricing_api");
$result  = json_decode($content, true);
$price_of_bnb = $result["binancecoin"]["usd"];




//   $coingecko_pricing_api = 'https://api.coingecko.com/api/v3/simple/price?ids=the-hash-speed&vs_currencies=usd';
//   $content =  file_get_contents("$coingecko_pricing_api");
//   $result  = json_decode($content, true);
//   $price_of_ths = $result["the-hash-speed"]["usd"];


?>
<?php

require_once 'url-shortner.php';
//submitting the form in the database for the public sale

if (isset($_POST['buy_tsit'])) {

  $err = 0;
  $error_message = "";

  //get is_approved from users table
  $query = "SELECT * FROM `users` WHERE `id` = $user_id";
  $run_fetch = mysqli_query($con, $query);
  $user_data = mysqli_fetch_assoc($run_fetch);
  $kyc_approved = $user_data['kyc_approved'];

  if ($kyc_approved == 1) {




    // echo 'hlo';

    $tsit_coin_current_price  = $tsit_coin_current_price;
    $amount_of_tsit_purchased = $_POST['amount_of_tsit_purchased'];
    $amount_of_tsit_purchased = htmlspecialchars($amount_of_tsit_purchased, ENT_QUOTES, "UTF-8");


    //deciding currency 

    $currency = $_POST['currency'];
    $currency = htmlspecialchars($currency, ENT_QUOTES, "UTF-8");

    $amount_in_currency = $_POST['amount_in_currency'];
    $amount_in_currency = htmlspecialchars($amount_in_currency, ENT_QUOTES, "UTF-8");



    $amount_in_dollar_on_submit = $tsit_coin_current_price * $amount_of_tsit_purchased;



    $transaction_id = $_POST['transaction_id'];
    $transaction_id = htmlspecialchars($transaction_id, ENT_QUOTES, "UTF-8");


    //check transaction_id from tarnsaction table
    $query = "SELECT * FROM `transaction` WHERE `transaction_id` = '$transaction_id'";
    $run_fetch = mysqli_query($con, $query);
    $transaction_data = mysqli_fetch_assoc($run_fetch);
    $transaction_id_from_db = $transaction_data['transaction_id'];

   


    //validate transaction id for 64 chars and hexadecimal format
    // if (!preg_match("/^[a-fA-F0-9]{64}$/", $transaction_id)) {
    //   $err = 1;
    //   $error_message .= "Invalid transaction id<br>";
    // }



    $sending_wallet_address = $_POST['sending_wallet_address'];
    $sending_wallet_address = htmlspecialchars($sending_wallet_address, ENT_QUOTES, "UTF-8");
    //validate wallet address for trc wallet

    // if (!preg_match("/^(T|t)[a-zA-Z0-9]{33}$/", $sending_wallet_address)) {
    //   $err = 1;
    //   $error_message .= "Invalid sending wallet address<br>";
    // }


    // $receiving_wallet_address = $_POST['receiving_wallet_address'];
    // $receiving_wallet_address = htmlspecialchars($receiving_wallet_address, ENT_QUOTES, "UTF-8");
    // //validate wallet address for trc wallet

    // if (!preg_match("/^(T|t)[a-zA-Z0-9]{33}$/", $receiving_wallet_address)) {
    //    $err = 1;
    //    $error_message .= "Invalid receiving wallet address<br>";
    // }

    // $email = $_POST['email'];
    // $email = htmlspecialchars($email, ENT_QUOTES, "UTF-8");
    // //validate email addresses
    // if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //    $err = 1;
    //    $error_message .= "Invalid email address<br>";
    // }

    $timestamp = time();

    if ($err == 0) {
      //check for transaction id already exists

      $query = "SELECT * FROM buy_requests WHERE transaction_id = '$transaction_id'";
      $result = mysqli_query($con, $query);
      $num_rows = mysqli_num_rows($result);

      if ($num_rows == 0) {

        if ($_FILES['payment_screenshot']['name'] != '') {

          $payment_screenshot_file_name = '';





          $payment_screenshot_file_name_new = $_FILES['payment_screenshot']['name']; // Get the Uploaded file Name.



          $payment_screenshot_extension = pathinfo($payment_screenshot_file_name_new, PATHINFO_EXTENSION); //Get the Extension of uploded file


          $valid_extensions = array("png", "jpg", "jpeg", "gif");

          if (in_array($payment_screenshot_extension, $valid_extensions)) { // check if upload file is a valid image file.
            $timestamp = time();

            $new_name_one = $user_id . "buy_request_ss" . $timestamp . "akc" . rand() . "." . $payment_screenshot_extension;


            $path_one = "../uploads/tsit/buy/" . $new_name_one;


            move_uploaded_file($_FILES['payment_screenshot']['tmp_name'], $path_one);

            $payment_screenshot_file_name =  $new_name_one;
          }





          // INSERT INTO `buy_requests`(`id`, `user_id`, `tsit_coin_price`, `amount_of_tsit_purchased`, `currency`, `amount_in_currency`, `amount_in_dollar_on_submit`, `transaction_id`, `sending_wallet_address`, `is_tsit_transfered`, `transfer_timestamp`, `transfer_transaction_id`, `more_then_ten_min_mark`, `is_rejected`, `err_reason_one`, `err_reason_two`, `err_reason_three`, `request_timestamp`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]','[value-10]','[value-11]','[value-12]','[value-13]','[value-14]','[value-15]','[value-16]','[value-17]','[value-18]')


          $query = "INSERT INTO `buy_requests`(`id`,`user_id`, `tsit_coin_price`, `amount_of_tsit_purchased`, 
         `currency`, `amount_in_currency`, `amount_in_dollar_on_submit`, `transaction_id`, 
         `sending_wallet_address`, `payment_screenshot`, `is_tsit_transfered`,`request_timestamp`) VALUES (
         NULL, $user_id, $tsit_coin_current_price,$amount_of_tsit_purchased, '$currency', $amount_in_currency, $amount_in_dollar_on_submit,
         '$transaction_id', '$sending_wallet_address', '$payment_screenshot_file_name',  0, $timestamp)";

          $run_query = mysqli_query($con, $query);
          if ($run_query) {
            $last_id = mysqli_insert_id($con);
            //redirect to thank you page

            $encrypted_last_id =  UrlShortener::intToShort($last_id);

            //encrypt last id 

            $user_email = $user_data['email'];

            //send buy request made email to user 

            // Multiple recipients
            $to = $user_email; // note the comma
            // Subject
            $subject = 'New Buy request has been made [Tesla Inu]';

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
                                              This is to inform that we have received buy request from your account.
                                             </p>
                                             <p>
                                               Amount of tsit purchased : ' . $amount_of_tsit_purchased . '
                                               <br>
                                               Currency : ' . $currency . '
                                               <br>
                                             Amount in currency : ' . $amount_in_currency . '
                                             <br>
                                             Transaction Id : ' . $transaction_id . '
                                             
                                             <br>
                                             Sending Wallet Address : ' . $sending_wallet_address . '
           
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
               </html>';

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



            // Multiple recipients
            $to = 'warrior@teslainu.com,anzarkhan.rain@gmail.com'; //sending email to admin
            // Subject
            $subject = 'TSIT Coin Buy Request';

            // Message
            $message = '


    <!DOCTYPE html>
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
                                      src="https://teslainu.com/en/assets/img/logo/logo.png"
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
                                        Someone has requested to buy TSIT coin website.
                                      </p>
                                      <p>
                                        Please find following details
                                      </p>
    
                                        <p>
                                            Id : <strong>' . $last_id . '</strong>
                                        </p>
                                        <p>
                                        TSIT Coin Current Price : <strong>' . $tsit_coin_current_price . '</strong>
                                        </p>
                                        <p>
                                            Amount Of TSIT Purchased : <strong>' . $amount_of_tsit_purchased . '</strong>
                                        </p>
                                        <p>
                                            Currency : <strong>' . $currency . '</strong>
                                        </p>
                                        <p>
                                            Amount In Currency : <strong>' . $amount_in_currency . '</strong>
                                        </p>
                                        <p>
                                            Amount In Dollar : <strong>' . $amount_in_dollar_on_submit . '</strong>
                                        </p>
                                        <p>
                                            Transaction Id : <strong>' . $transaction_id . '</strong>
                                        </p>
                                        <p>
                                            Sending Wallet Address : <strong>' . $sending_wallet_address . '</strong>
                                        </p>
                                        
                                        
                                        
    
                                      
                                    <!-- <a
                                      href=""
                                      style="
                                        padding: 10px;
                                        background-color: #3452ff;
                                        color: #fff;
                                        display: inline-block;
                                        border-radius: 4px;
                                        margin-bottom: 18px;
                                      "
                                      >Verify Email
                                    </a> -->
                                    <p>
                                     If you don not confirm this it will automatically send TSIT to receiving address.
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
            $headers[] = 'From: TSIT Coin Official <no-reply@teslainu.com>';

            // Mail it
            mail($to, $subject, $message, implode("\r\n", $headers));

            // mail logic ends


?>
            <script>
              window.location = 'document-submitting-file-upload.php?id=<?php echo $encrypted_last_id; ?>';
            </script>
          <?php

          } else {
            //print query and error
            // $error_message = "Error: " . $query . "<br>" . mysqli_error($con);
            echo $error_message;
          }


          //here




        } else {
          ?>
          <script>
            alert('Problem with screenshot upload');
          </script>
        <?php
        }
      } else {

        ?>
        <script>
          alert('Request for this transaction id has already been added');
        </script>
      <?php
      }
    } else {

      ?>
      <script>
        alert('<?php echo $error_message; ?>');
      </script>
    <?php
    }
  } else {
    $err = 1;
    $error_message .= "You need to verify your KYC to buy TSIT";
    ?>
    <script>
      alert('You need to verify your KYC to buy TSIT');
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
  <title>Buy TSIT - Tesla INU</title>
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
    require('../elements/header.php');
    ?>
    <?php
    require('../elements/sidebar.php');
    ?>
    <div class="content-body">
      <!-- row -->
      <div class="container-fluid">
        <div class="mb-sm-4 d-flex flex-wrap align-items-center text-head">
          <h2 class="mb-3 me-auto">BUY TSIT</h2>
        </div>

        <?php
        //check if kyc_approved is 1 in users table for this user id
        $query = "SELECT * FROM users WHERE id = '$user_id'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_array($result);
        $kyc_approved = $row['kyc_approved'];
        if ($kyc_approved == 0 || $kyc_approved == 2) {

        ?>
          <div class="row">
            <div class="col-12">
              <div class="alert alert-warning alert-dismissible fade show">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2" data-darkreader-inline-stroke="" style="--darkreader-inline-stroke:currentColor;">
                  <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
                  <line x1="12" y1="9" x2="12" y2="13"></line>
                  <line x1="12" y1="17" x2="12.01" y2="17"></line>
                </svg>
                <strong>Warning!</strong>Your KYC is not verified yet, kindly submit your KYC now to use all the features ! <a href="../kyc/add-document.php" class="alert-link" style="color:white;">Click here to submit KYC</a>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                </button>
              </div>
            </div>
          </div>
        <?php
        }
        ?>
        <div class="row">
          <div class="col-xl-3"></div>
          <div class="col-xl-6">
            <!-- send section -->
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Buy TSIT</h4>
              </div>
              <div class="card-body">

                <div class="basic-form">
                  <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="currency" id="selected_currency_input">
                    <input type="hidden" name="amount_in_currency" id="amount_in_currency_input">

                    <div class="row">
                      <div class="col-xl-12">
                        <div class="mb-3">
                          <label for="" class="text-white">TSIT Amount</label>
                          <input id="amount_of_tsit" type="number" oninput="changeCurrency();" name="amount_of_tsit_purchased" class="form-control input-default" min="<?php echo $minimum_tsit_buy_amount; ?>" placeholder="Enter amount of TSIT" required />
                          <small id="amount_of_tsit_err">Minimum purchase is <?php echo $minimum_tsit_buy_amount; ?> TSIT</small>
                        </div>
                      </div>
                    </div>
                    <div class="row my-3" style="margin-top:30px;">
                      <div class="col-md-3 mt-2 rt-mb-20">
                        <div class="btn btn-outline-primary btn-block  " id="btc_currency_btn" onclick="changeCurrency('btc')">BTC</div>
                      </div>
                      <div class="col-md-3 mt-2 rt-mb-20" style="display:none;">
                        <div class="btn btn-outline-primary btn-block  " id="eth_currency_btn" onclick="changeCurrency('eth')">ETH</div>
                      </div>
                      <div class="col-md-4 mt-2 rt-mb-20">
                        <div class="btn btn-outline-primary btn-block  " id="usdt_currency_btn" onclick="changeCurrency('usdt')">USDT (TRC20)</div>
                      </div>
                      <div class="col-md-4 mt-2 rt-mb-20" style="display:none;">
                        <div class="btn btn-outline-primary btn-block  " id="trx_currency_btn" onclick="changeCurrency('trx')">TRX</div>
                      </div>
                      <div class="col-md-4 mt-2 rt-mb-20">
                        <div class="btn btn-outline-primary btn-block  " id="bnb_currency_btn" onclick="changeCurrency('bnb')">BNB (BEP20)</div>
                      </div>
                      <div class="col-md-4 mt-2 rt-mb-20">
                        <div class="btn btn-outline-primary btn-block  " id="btc_bep_currency_btn" onclick="changeCurrency('btc_bep')">BTC (BEP20)</div>
                      </div>
                      <div class="col-md-4 mt-2 rt-mb-20">
                        <div class="btn btn-outline-primary btn-block  " id="usdt_bep_currency_btn" onclick="changeCurrency('usdt_bep')">USDT (BEP20)</div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 rt-mb-20 rt-mt-20">
                        <h4>
                          <strong>Amount to be paid: <span id="currency_amount_show"></span> <span id="amount_currency_ticker"></span></strong>
                        </h4>
                      </div>
                      <!-- /.col-12 -->
                      <div class="col-md-12 rt-mb-20 text-center">
                        <label for="cm">Send <span id="send_currency_ticker"></span> here</label>
                      </div>

                      <div class="col-md-12 text-center">
                        <center>
                          <div id="qrcode"></div>
                        </center>
                      </div>

                      <div class="col-md-12 rt-mb-20 mt-5 text-center">
                        <label for="sd"><span id="pay_currency_address"></span> <i onclick="copyCode()" style="cursor: pointer;" class="far fa-copy"></i> </label>
                      </div>
                    </div>

                    <div class="row mt-5">
                      <div class="col-md-12">
                        <label>Sender Wallet Address</label>
                        <input class="form-control input-default" type="text" placeholder="Sending wallet address" name="sending_wallet_address" style="margin-bottom:0px;" required>
                        <small>Enter address you have used to send <span id="address_used_currency_ticker"></span></small>
                      </div>
                      <div class="col-md-12" style="margin-top:30px;">
                        <label>Transaction ID</label>
                        <input class="form-control input-default" type="text" placeholder="Transaction ID" name="transaction_id" required>
                      </div>

                      <div class="col-md-12" style="margin-top:30px;">
                        <label for="">Payment Screenshot</label>
                        <input type="file" class="form-file-input form-control" name="payment_screenshot" required>
                      </div>
                      <!-- <div class="col-md-12" style="margin-top:30px;">
                                    <label>Receiving TSIT Wallet Address</label>
                                    <input class="form-control input-default" type="text" placeholder="Receiving TSIT Wallet Address" name="receiving_wallet_address" required>
                                    <small>Enter BEP20 Address </small>
                                 </div> -->



                    </div>
                    <div class="mb-3 mt-3 pt-3">
                      <button type="submit" name="buy_tsit" class="btn btn-primary btn-block">Request Buy</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3"></div>
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

  <script>
    function copyCode(copyText) {

      console.log(copyText);
      const el = document.createElement('textarea');
      el.value = copyText;
      document.body.appendChild(el);
      el.select();
      document.execCommand('copy');
      document.body.removeChild(el);



    }
  </script>
  <script>

  </script>
  <script>
    //qr code script
    var qrcode = new QRCode(document.getElementById("qrcode"), {
      width: 250,
      height: 250,
    });

    function makeCode(qrText) {
      console.log(qrText);


      qrcode.makeCode(qrText);
    }

    //  makeCode();
  </script>

  <script>
    var minimum_tsit_buy_amount = <?php echo $minimum_tsit_buy_amount; ?>;

    var get_amount_of_tsit = document.getElementById('amount_of_tsit');
    var get_amount_of_tsit_err = document.getElementById('amount_of_tsit_err');

    function minTsitBuy() {
      if (get_amount_of_tsit.value < minimum_tsit_buy_amount) {
        get_amount_of_tsit.value = minimum_tsit_buy_amount;
        get_amount_of_tsit_err.style.color = "red";
      } else {
        get_amount_of_tsit_err.style.color = "grey";
      }
      changeCurrency();
    }



    //currency price decide


    var btc_usdt_price = <?php echo $price_of_bitcoin; ?>;
    var eth_usdt_price = <?php echo $price_of_ethereum; ?>;
    var usdt_usdt_price = 1;
    var trx_usdt_price = <?php echo $price_of_tron; ?>;
    var bnb_usdt_price = <?php echo $price_of_bnb; ?>;
    var tsit_usdt_price = <?php echo $tsit_coin_current_price; ?>;

    //defining all addresses 

    var btc_address = '1EUsXte5nQAnMMysHFu9xbN7VPQeqmzus3';
    var eth_address = '0xd7bebb530d70473b0d1f79144655e5e1a8d8dac5';
    // var usdt_address = 'TFUf8QhwYoBWyZNZepFVUetn2kPgfCkTpd';
    // var trx_address = 'TFUf8QhwYoBWyZNZepFVUetn2kPgfCkTpd';

    var usdt_address = 'TFUf8QhwYoBWyZNZepFVUetn2kPgfCkTpd';
    var trx_address = 'TNuKCgYuaZah8ysxV82wcYhYoeAHta9G6k';
    var bnb_address = '0xd7bebb530d70473b0d1f79144655e5e1a8d8dac5';
    var btc_bep_address = '0xd7bebb530d70473b0d1f79144655e5e1a8d8dac5';
    var usdt_bep_address = '0xd7bebb530d70473b0d1f79144655e5e1a8d8dac5';


    //getting things

    var get_btc_currency_btn = document.getElementById('btc_currency_btn');
    var get_eth_currency_btn = document.getElementById('eth_currency_btn');
    var get_usdt_currency_btn = document.getElementById('usdt_currency_btn');
    var get_trx_currency_btn = document.getElementById('trx_currency_btn');
    var get_bnb_currency_btn = document.getElementById('bnb_currency_btn');
    var get_btc_bep_currency_btn = document.getElementById('btc_bep_currency_btn');
    var get_usdt_bep_currency_btn = document.getElementById('usdt_bep_currency_btn');

    var get_send_currency_ticker = document.getElementById('send_currency_ticker');
    var get_amount_currency_ticker = document.getElementById('amount_currency_ticker');
    var get_address_used_currency_ticker = document.getElementById('address_used_currency_ticker');

    var get_pay_currency_address = document.getElementById('pay_currency_address');

    var get_currency_amount_show = document.getElementById('currency_amount_show');

    var get_selected_currency_input = document.getElementById('selected_currency_input'); //getting hidden input
    var get_amount_in_currency_input = document.getElementById('amount_in_currency_input'); //getting hidden input


    var global_selected_currency = "";

    function changeCurrency(selected_currency) {

      //if currency name is btc then change btc button to active and other to inactive
      if (selected_currency == 'btc') {
        document.getElementById('btc_currency_btn').classList.add('btn-primary');
        document.getElementById('eth_currency_btn').classList.remove('btn-primary');
        document.getElementById('usdt_currency_btn').classList.remove('btn-primary');
        document.getElementById('trx_currency_btn').classList.remove('btn-primary');
        document.getElementById('bnb_currency_btn').classList.remove('btn-primary');
        document.getElementById('btc_bep_currency_btn').classList.remove('btn-primary');
        document.getElementById('usdt_bep_currency_btn').classList.remove('btn-primary');


        document.getElementById('btc_currency_btn').classList.remove('btn-outline-primary');
        document.getElementById('eth_currency_btn').classList.add('btn-outline-primary');
        document.getElementById('usdt_currency_btn').classList.add('btn-outline-primary');
        document.getElementById('trx_currency_btn').classList.add('btn-outline-primary');
        document.getElementById('bnb_currency_btn').classList.add('btn-outline-primary');
        document.getElementById('btc_bep_currency_btn').classList.add('btn-outline-primary');
        document.getElementById('usdt_bep_currency_btn').classList.add('btn-outline-primary');
      } else if (selected_currency == 'eth') {
        document.getElementById('btc_currency_btn').classList.remove('btn-primary');
        document.getElementById('eth_currency_btn').classList.add('btn-primary');
        document.getElementById('usdt_currency_btn').classList.remove('btn-primary');
        document.getElementById('trx_currency_btn').classList.remove('btn-primary');
        document.getElementById('bnb_currency_btn').classList.remove('btn-primary');
        document.getElementById('btc_bep_currency_btn').classList.remove('btn-primary');
        document.getElementById('usdt_bep_currency_btn').classList.remove('btn-primary');

        document.getElementById('btc_currency_btn').classList.add('btn-outline-primary');
        document.getElementById('eth_currency_btn').classList.remove('btn-outline-primary');
        document.getElementById('usdt_currency_btn').classList.add('btn-outline-primary');
        document.getElementById('trx_currency_btn').classList.add('btn-outline-primary');
        document.getElementById('bnb_currency_btn').classList.add('btn-outline-primary');
        document.getElementById('btc_bep_currency_btn').classList.add('btn-outline-primary');
        document.getElementById('usdt_bep_currency_btn').classList.add('btn-outline-primary');

      } else if (selected_currency == 'usdt') {
        document.getElementById('btc_currency_btn').classList.remove('btn-primary');
        document.getElementById('eth_currency_btn').classList.remove('btn-primary');
        document.getElementById('usdt_currency_btn').classList.add('btn-primary');
        document.getElementById('trx_currency_btn').classList.remove('btn-primary');
        document.getElementById('bnb_currency_btn').classList.remove('btn-primary');
        document.getElementById('btc_bep_currency_btn').classList.remove('btn-primary');
        document.getElementById('usdt_bep_currency_btn').classList.remove('btn-primary');
        document.getElementById('btc_bep_currency_btn').classList.add('btn-outline-primary');
        document.getElementById('usdt_bep_currency_btn').classList.add('btn-outline-primary');


        document.getElementById('btc_currency_btn').classList.add('btn-outline-primary');
        document.getElementById('eth_currency_btn').classList.add('btn-outline-primary');
        document.getElementById('usdt_currency_btn').classList.remove('btn-outline-primary');
        document.getElementById('trx_currency_btn').classList.add('btn-outline-primary');
        document.getElementById('bnb_currency_btn').classList.add('btn-outline-primary');
        document.getElementById('btc_bep_currency_btn').classList.add('btn-outline-primary');
        document.getElementById('usdt_bep_currency_btn').classList.add('btn-outline-primary');

      } else if (selected_currency == 'trx') {
        document.getElementById('btc_currency_btn').classList.remove('btn-primary');
        document.getElementById('eth_currency_btn').classList.remove('btn-primary');
        document.getElementById('usdt_currency_btn').classList.remove('btn-primary');
        document.getElementById('trx_currency_btn').classList.add('btn-primary');
        document.getElementById('bnb_currency_btn').classList.remove('btn-primary');
        document.getElementById('btc_bep_currency_btn').classList.remove('btn-primary');
        document.getElementById('usdt_bep_currency_btn').classList.remove('btn-primary');

        document.getElementById('btc_currency_btn').classList.add('btn-outline-primary');
        document.getElementById('eth_currency_btn').classList.add('btn-outline-primary');
        document.getElementById('usdt_currency_btn').classList.add('btn-outline-primary');
        document.getElementById('trx_currency_btn').classList.remove('btn-outline-primary');
        document.getElementById('bnb_currency_btn').classList.add('btn-outline-primary');
        document.getElementById('btc_bep_currency_btn').classList.add('btn-outline-primary');
        document.getElementById('usdt_bep_currency_btn').classList.add('btn-outline-primary');
      } else if (selected_currency == 'bnb') {
        document.getElementById('btc_currency_btn').classList.remove('btn-primary');
        document.getElementById('eth_currency_btn').classList.remove('btn-primary');
        document.getElementById('usdt_currency_btn').classList.remove('btn-primary');
        document.getElementById('trx_currency_btn').classList.remove('btn-primary');
        document.getElementById('bnb_currency_btn').classList.add('btn-primary');
        document.getElementById('btc_bep_currency_btn').classList.remove('btn-primary');
        document.getElementById('usdt_bep_currency_btn').classList.remove('btn-primary');

        document.getElementById('btc_currency_btn').classList.add('btn-outline-primary');
        document.getElementById('eth_currency_btn').classList.add('btn-outline-primary');
        document.getElementById('usdt_currency_btn').classList.add('btn-outline-primary');
        document.getElementById('trx_currency_btn').classList.add('btn-outline-primary');
        document.getElementById('bnb_currency_btn').classList.remove('btn-outline-primary');
        document.getElementById('btc_bep_currency_btn').classList.add('btn-outline-primary');
        document.getElementById('usdt_bep_currency_btn').classList.add('btn-outline-primary');

      } else if (selected_currency == 'btc_bep') {
        document.getElementById('btc_currency_btn').classList.remove('btn-primary');
        document.getElementById('eth_currency_btn').classList.remove('btn-primary');
        document.getElementById('usdt_currency_btn').classList.remove('btn-primary');
        document.getElementById('trx_currency_btn').classList.remove('btn-primary');
        document.getElementById('bnb_currency_btn').classList.remove('btn-primary');
        document.getElementById('btc_bep_currency_btn').classList.add('btn-primary');
        document.getElementById('usdt_bep_currency_btn').classList.remove('btn-primary');

        document.getElementById('btc_currency_btn').classList.add('btn-outline-primary');
        document.getElementById('eth_currency_btn').classList.add('btn-outline-primary');
        document.getElementById('usdt_currency_btn').classList.add('btn-outline-primary');
        document.getElementById('trx_currency_btn').classList.add('btn-outline-primary');
        document.getElementById('bnb_currency_btn').classList.add('btn-outline-primary');
        document.getElementById('btc_bep_currency_btn').classList.remove('btn-outline-primary');
        document.getElementById('usdt_bep_currency_btn').classList.add('btn-outline-primary');
      } else if (selected_currency == 'usdt_bep') {
        document.getElementById('btc_currency_btn').classList.remove('btn-primary');
        document.getElementById('eth_currency_btn').classList.remove('btn-primary');
        document.getElementById('usdt_currency_btn').classList.remove('btn-primary');
        document.getElementById('trx_currency_btn').classList.remove('btn-primary');
        document.getElementById('bnb_currency_btn').classList.remove('btn-primary');
        document.getElementById('btc_bep_currency_btn').classList.remove('btn-primary');
        document.getElementById('usdt_bep_currency_btn').classList.add('btn-primary');

        document.getElementById('btc_currency_btn').classList.add('btn-outline-primary');
        document.getElementById('eth_currency_btn').classList.add('btn-outline-primary');
        document.getElementById('usdt_currency_btn').classList.add('btn-outline-primary');
        document.getElementById('trx_currency_btn').classList.add('btn-outline-primary');
        document.getElementById('bnb_currency_btn').classList.add('btn-outline-primary');
        document.getElementById('btc_bep_currency_btn').classList.add('btn-outline-primary');
        document.getElementById('usdt_bep_currency_btn').classList.remove('btn-outline-primary');
      }

      if (selected_currency != undefined) {
        global_selected_currency = selected_currency;
      }


      //remove "_" from global_selected_currency and make it capital
      var selected_currency_capital = global_selected_currency.replace(/_/g, " ");
      selected_currency_capital = selected_currency_capital.charAt(0).toUpperCase() + selected_currency_capital.slice(1);









      global_selected_currency_set = selected_currency_capital;
      //setting currency type 
      get_selected_currency_input.value = global_selected_currency_set;



      var total_needs_to_pay = (get_amount_of_tsit.value) * tsit_usdt_price;






      if (global_selected_currency == 'btc') {

        get_btc_currency_btn.classList.add('gradient-color-button');
        get_eth_currency_btn.classList.remove('gradient-color-button');
        get_usdt_currency_btn.classList.remove('gradient-color-button');
        get_trx_currency_btn.classList.remove('gradient-color-button');


        get_send_currency_ticker.innerHTML = "BTC";
        get_amount_currency_ticker.innerHTML = "BTC";
        get_address_used_currency_ticker.innerHTML = "BTC";

        get_pay_currency_address.innerHTML = btc_address;

        // copyCode(btc_address);


        var total_needs_to_pay_in_btc = total_needs_to_pay / btc_usdt_price;
        total_needs_to_pay_in_btc = total_needs_to_pay_in_btc.toFixed(8);


        get_currency_amount_show.innerHTML = total_needs_to_pay_in_btc;

        get_amount_in_currency_input.value = total_needs_to_pay_in_btc;

        makeCode(btc_address);






      } else if (global_selected_currency == 'eth') {
        get_btc_currency_btn.classList.remove('gradient-color-button');
        get_eth_currency_btn.classList.add('gradient-color-button');
        get_usdt_currency_btn.classList.remove('gradient-color-button');
        get_trx_currency_btn.classList.remove('gradient-color-button');

        get_send_currency_ticker.innerHTML = "ETH";
        get_amount_currency_ticker.innerHTML = "ETH";
        get_address_used_currency_ticker.innerHTML = "ETH";

        get_pay_currency_address.innerHTML = eth_address;
        // copyCode(eth_address);

        var total_needs_to_pay_in_eth = total_needs_to_pay / eth_usdt_price;
        total_needs_to_pay_in_eth = total_needs_to_pay_in_eth.toFixed(8);

        get_currency_amount_show.innerHTML = total_needs_to_pay_in_eth;

        get_amount_in_currency_input.value = total_needs_to_pay_in_eth;

        makeCode(eth_address);

      } else if (global_selected_currency == 'usdt') {
        get_btc_currency_btn.classList.remove('gradient-color-button');
        get_eth_currency_btn.classList.remove('gradient-color-button');
        get_usdt_currency_btn.classList.add('gradient-color-button');
        get_trx_currency_btn.classList.remove('gradient-color-button');

        get_send_currency_ticker.innerHTML = "USDT (TRC20)";
        get_amount_currency_ticker.innerHTML = "USDT";
        get_address_used_currency_ticker.innerHTML = "USDT";

        get_pay_currency_address.innerHTML = usdt_address;
        // copyCode(usdt_address);

        var total_needs_to_pay_in_usdt = total_needs_to_pay / usdt_usdt_price;
        total_needs_to_pay_in_usdt = total_needs_to_pay_in_usdt.toFixed(2);

        get_currency_amount_show.innerHTML = total_needs_to_pay_in_usdt;

        get_amount_in_currency_input.value = total_needs_to_pay_in_usdt;


        makeCode(usdt_address);

      } else if (global_selected_currency == 'trx') {
        get_btc_currency_btn.classList.remove('gradient-color-button');
        get_eth_currency_btn.classList.remove('gradient-color-button');
        get_usdt_currency_btn.classList.remove('gradient-color-button');
        get_trx_currency_btn.classList.add('gradient-color-button');

        get_send_currency_ticker.innerHTML = "TRX";
        get_amount_currency_ticker.innerHTML = "TRX";
        get_address_used_currency_ticker.innerHTML = "TRX";

        get_pay_currency_address.innerHTML = trx_address;
        // copyCode(trx_address);

        var total_needs_to_pay_in_trx = total_needs_to_pay / trx_usdt_price;
        total_needs_to_pay_in_trx = total_needs_to_pay_in_trx.toFixed(6);

        get_currency_amount_show.innerHTML = total_needs_to_pay_in_trx;

        get_amount_in_currency_input.value = total_needs_to_pay_in_trx;


        makeCode(trx_address);
      } else if (global_selected_currency == 'bnb') {
        get_btc_currency_btn.classList.remove('gradient-color-button');
        get_eth_currency_btn.classList.remove('gradient-color-button');
        get_usdt_currency_btn.classList.remove('gradient-color-button');
        get_trx_currency_btn.classList.remove('gradient-color-button');


        get_send_currency_ticker.innerHTML = "BNB (BEP20)";
        get_amount_currency_ticker.innerHTML = "BNB";
        get_address_used_currency_ticker.innerHTML = "BNB";

        get_pay_currency_address.innerHTML = bnb_address;
        // copyCode(bnb_address);


        var total_needs_to_pay_in_bnb = total_needs_to_pay / bnb_usdt_price;
        total_needs_to_pay_in_bnb = total_needs_to_pay_in_bnb.toFixed(6);

        get_currency_amount_show.innerHTML = total_needs_to_pay_in_bnb;

        get_amount_in_currency_input.value = total_needs_to_pay_in_bnb;

        makeCode(bnb_address);
      } else if (global_selected_currency == 'btc_bep') {
        get_btc_currency_btn.classList.remove('gradient-color-button');
        get_eth_currency_btn.classList.remove('gradient-color-button');
        get_usdt_currency_btn.classList.remove('gradient-color-button');
        get_trx_currency_btn.classList.remove('gradient-color-button');

        get_send_currency_ticker.innerHTML = "BTC (BEP20)";
        get_amount_currency_ticker.innerHTML = "BTC";
        get_address_used_currency_ticker.innerHTML = "BTC";

        get_pay_currency_address.innerHTML = btc_bep_address;
        // copyCode(btc_bep_address);

        var total_needs_to_pay_in_btc = total_needs_to_pay / btc_usdt_price;
        total_needs_to_pay_in_btc = total_needs_to_pay_in_btc.toFixed(8);

        get_currency_amount_show.innerHTML = total_needs_to_pay_in_btc;

        get_amount_in_currency_input.value = total_needs_to_pay_in_btc;

        makeCode(btc_bep_address);
      } else if (global_selected_currency == 'usdt_bep') {
        console.log('hlo');
        get_btc_currency_btn.classList.remove('gradient-color-button');
        get_eth_currency_btn.classList.remove('gradient-color-button');
        get_usdt_currency_btn.classList.remove('gradient-color-button');
        get_trx_currency_btn.classList.remove('gradient-color-button');

        get_send_currency_ticker.innerHTML = "USDT (BEP20)";
        get_amount_currency_ticker.innerHTML = "USDT";
        get_address_used_currency_ticker.innerHTML = "USDT";

        get_pay_currency_address.innerHTML = usdt_bep_address;
        // copyCode(usdt_bep_address);

        var total_needs_to_pay_in_usdt = total_needs_to_pay / usdt_usdt_price;
        total_needs_to_pay_in_usdt = total_needs_to_pay_in_usdt.toFixed(2);

        get_currency_amount_show.innerHTML = total_needs_to_pay_in_usdt;

        get_amount_in_currency_input.value = total_needs_to_pay_in_usdt;

        makeCode(usdt_bep_address);
      }

    }

    changeCurrency('btc');
  </script>
</body>

</html>