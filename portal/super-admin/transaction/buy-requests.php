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
if (isset($_POST['reject_buy_request_submit_button'])) {
  $buy_request_id = $_POST['buy_request_id'];
  $buy_request_id = htmlspecialchars($buy_request_id, ENT_QUOTES, "UTF-8");

  $reject_reason = $_POST['reject_reason'];
  $reject_reason = htmlspecialchars($reject_reason, ENT_QUOTES, "UTF-8");

  //update buy request table 
  $update_buy_request_query = "UPDATE `buy_requests` SET `is_tsit_transfered` = 0, `is_rejected` = 1,`err_reason_one` = '$reject_reason' WHERE `id` = $buy_request_id";
  $run_update_buy_request_query = mysqli_query($con, $update_buy_request_query);
  if ($run_update_buy_request_query) {
    //get user id from buy_request table
    $get_user_id_query = "SELECT `user_id` FROM `buy_requests` WHERE `id` = $buy_request_id";
    $run_get_user_id_query = mysqli_query($con, $get_user_id_query);
    $user_id_data = mysqli_fetch_assoc($run_get_user_id_query);
    $buy_request_user_id = $user_id_data['user_id'];
    //get email id of user from users table
    $get_email_id_query = "SELECT `email` FROM `users` WHERE `id` = $buy_request_user_id";
    $run_get_email_id_query = mysqli_query($con, $get_email_id_query);
    $email_id_data = mysqli_fetch_assoc($run_get_email_id_query);
    $buy_request_user_email = $email_id_data['email'];
    //send email to user
    // Multiple recipients
    $to = $buy_request_user_email; // note the comma
    // Subject
    $subject = 'Oops! Your TSIT buy request rejected [Tesla Inu]';

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
                                   This is to inform that we have rejected your buy TSIT request for the following reason.
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
  }
}
?>
<?php
if (isset($_POST['approve_buy_request_submit_button'])) {

  $buy_request_id = $_POST['buy_request_id'];
  $buy_request_id = htmlspecialchars($buy_request_id, ENT_QUOTES, "UTF-8");


  //update buy request table
  $update_buy_request_query = "UPDATE `buy_requests` SET `is_tsit_transfered` = 1, `is_rejected` = 0 WHERE `id` = $buy_request_id";
  $update_buy_request_query_run = mysqli_query($con, $update_buy_request_query);
  if ($update_buy_request_query_run) {
    //get required details to add in transaction table
    $get_buy_request_details_query = "SELECT * FROM `buy_requests` WHERE `id` = $buy_request_id";
    $get_buy_request_details_query_run = mysqli_query($con, $get_buy_request_details_query);
    if ($get_buy_request_details_query_run) {
      $get_buy_request_details_assoc = mysqli_fetch_assoc($get_buy_request_details_query_run);
      $buy_request_id = $get_buy_request_details_assoc['id'];
      $buy_request_user_id = $get_buy_request_details_assoc['user_id'];
      $buy_request_amount_of_tsit_purchased = $get_buy_request_details_assoc['amount_of_tsit_purchased'];
    }


    $timestamp = time();


    //check if buy_request_id is already in transaction table
    $check_if_buy_request_id_is_already_in_transaction_table_query = "SELECT * FROM `transactions` WHERE `buy_req_id` = $buy_request_id";
    $check_if_buy_request_id_is_already_in_transaction_table_query_run = mysqli_query($con, $check_if_buy_request_id_is_already_in_transaction_table_query);
    if ($check_if_buy_request_id_is_already_in_transaction_table_query_run) {
      $check_if_buy_request_id_is_already_in_transaction_table_num_rows = mysqli_num_rows($check_if_buy_request_id_is_already_in_transaction_table_query_run);
      if ($check_if_buy_request_id_is_already_in_transaction_table_num_rows == 0) {



        //add buy transaction in transaction table
        // INSERT INTO `transactions`(`id`, `user_id`, `transaction_type`, `hash`, `note`, `to_address`, `from_address`, `is_addition`, `transaction_status`, `amount`, `timestamp`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]','[value-10]','[value-11]')
        $add_buy_transaction_query = "INSERT INTO `transactions`(`user_id`, `transaction_type`, `hash`, 
    `note`, `to_address`, `from_address`, `is_addition`, `transaction_status`, `amount`, `timestamp`,`buy_req_id`)
     VALUES ($buy_request_user_id,6,'','','','',1,1,$buy_request_amount_of_tsit_purchased,$timestamp,$buy_request_id)";
        $add_buy_transaction_query_run = mysqli_query($con, $add_buy_transaction_query);
        if ($add_buy_transaction_query_run) {
          //get last id 
          $last_id = mysqli_insert_id($con);
        }

        //add last transaction id into buy_request table
        $update_buy_request_query = "UPDATE `buy_requests` SET `transaction_table_id` = $last_id WHERE `id` = $buy_request_id";
        $update_buy_request_query_run = mysqli_query($con, $update_buy_request_query);
        if ($update_buy_request_query_run) {

          // echo "mail sent";


          //get email address from user table
          $get_email_query = "SELECT * FROM `users` WHERE `id` = $buy_request_user_id";
          $get_email_query_run = mysqli_query($con, $get_email_query);
          if ($get_email_query_run) {
            $get_email_assoc = mysqli_fetch_assoc($get_email_query_run);
            $buy_request_user_email = $get_email_assoc['email'];
            $buy_request_user_name = $get_email_assoc['name'];
          }


          // INSERT INTO `dashboard_news`(`id`, `title`, `added_by`, `is_deleted`, `timestamp`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]')

          //insert this user buy request approved into dashboard_news table
          $timestamp = time();
          $dashboard_news_query = "INSERT INTO `dashboard_news`(`title`, `added_by`, `is_deleted`, `timestamp`) VALUES ('TSIT buy request approved of $buy_request_user_name','$buy_request_user_id',0,$timestamp)";
          $run_dashboard_news_query = mysqli_query($con, $dashboard_news_query);

          // Multiple recipients
          $to = $buy_request_user_email; // note the comma
          // Subject
          $subject = 'Hurray! Your buy TSIT request approved [Tesla Inu]';

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
                                      This is to inform that we have approved your TSIT buy request please find details below.
                                     </p>
                                     <p>
                                     Amount : ' . $buy_request_amount_of_tsit_purchased . '
                                     <br>
                                     
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

        //add transactions for all referred users
        //create 10% of the amount of tsit purchased
        $lvl_one_buy_request_amount_of_tsit_purchased = $buy_request_amount_of_tsit_purchased * 0.1;
        $lvl_two_buy_request_amount_of_tsit_purchased = $buy_request_amount_of_tsit_purchased * 0.05;
        $lvl_three_buy_request_amount_of_tsit_purchased = $buy_request_amount_of_tsit_purchased * 0.03;
        $lvl_four_buy_request_amount_of_tsit_purchased = $buy_request_amount_of_tsit_purchased * 0.02;
        $lvl_five_buy_request_amount_of_tsit_purchased = $buy_request_amount_of_tsit_purchased * 0.005;

        //get referred_by_id of this user from user table
        $get_referred_by_id_query = "SELECT * FROM users WHERE id = '$buy_request_user_id'";
        $get_referred_by_id_result = mysqli_query($con, $get_referred_by_id_query);
        $get_referred_by_id_row = mysqli_fetch_assoc($get_referred_by_id_result);
        $referred_by_id = $get_referred_by_id_row['referred_by_id'];

        //if referred by id is not zero then add transactions for all referred users



        if ($referred_by_id != 0) {
          //check if 100$ buying activity in transaction table of a referred user
          $check_if_100_transaction_query = "SELECT * FROM transactions WHERE user_id = '$referred_by_id' AND transaction_type = 6";
          $check_if_100_transaction_result = mysqli_query($con, $check_if_100_transaction_query);
          //get the number of row
          $check_if_100_transaction_row_count = mysqli_num_rows($check_if_100_transaction_result);

          if ($check_if_100_transaction_row_count > 0) {

            //add transaction 
            $add_referral_transaction_query = "INSERT INTO `transactions`(`user_id`, `transaction_type`, `hash`, 
      `note`, `to_address`, `from_address`, `is_addition`, `transaction_status`, `amount`, `timestamp`)
       VALUES ($referred_by_id,7,'','','','',1,1,$lvl_one_buy_request_amount_of_tsit_purchased,$timestamp)";
            $add_referral_transaction_query_run = mysqli_query($con, $add_referral_transaction_query);
            if ($add_referral_transaction_query_run) {
              //check for lvl 2 referral
              $get_referred_by_id_query = "SELECT * FROM users WHERE id = '$referred_by_id'";
              $get_referred_by_id_result = mysqli_query($con, $get_referred_by_id_query);
              $get_referred_by_id_row = mysqli_fetch_assoc($get_referred_by_id_result);
              $referred_by_id_2 = $get_referred_by_id_row['referred_by_id'];

              //if referred by id is not zero then add transactions for all referred users
              if ($referred_by_id_2 != 0) {
                //check if 100$ buying activity in transaction table of a referred user
                $check_if_100_transaction_query = "SELECT * FROM transactions WHERE user_id = '$referred_by_id_2' AND transaction_type = 6";
                $check_if_100_transaction_result = mysqli_query($con, $check_if_100_transaction_query);
                //get the number of row
                $check_if_100_transaction_row_count = mysqli_num_rows($check_if_100_transaction_result);
                if ($check_if_100_transaction_row_count > 0) {
                  //add transaction 
                  $add_referral_transaction_query = "INSERT INTO `transactions`(`user_id`, `transaction_type`, `hash`, 
`note`, `to_address`, `from_address`, `is_addition`, `transaction_status`, `amount`, `timestamp`)
 VALUES ($referred_by_id_2,7,'','','','',1,1,$lvl_two_buy_request_amount_of_tsit_purchased,$timestamp)";
                  $add_referral_transaction_query_run = mysqli_query($con, $add_referral_transaction_query);
                  if ($add_referral_transaction_query_run) {
                    //check for lvl 3 referral
                    $get_referred_by_id_query = "SELECT * FROM users WHERE id = '$referred_by_id_2'";
                    $get_referred_by_id_result = mysqli_query($con, $get_referred_by_id_query);
                    $get_referred_by_id_row = mysqli_fetch_assoc($get_referred_by_id_result);
                    $referred_by_id_3 = $get_referred_by_id_row['referred_by_id'];

                    //if referred by id is not zero then add transactions for all referred users
                    if ($referred_by_id_3 != 0) {
                      //check if 100$ buying activity in transaction table of a referred user
                      $check_if_100_transaction_query = "SELECT * FROM transactions WHERE user_id = '$referred_by_id_3' AND transaction_type = 6";
                      $check_if_100_transaction_result = mysqli_query($con, $check_if_100_transaction_query);
                      //get the number of row
                      $check_if_100_transaction_row_count = mysqli_num_rows($check_if_100_transaction_result);
                      if ($check_if_100_transaction_row_count > 0) {
                        //add transaction 
                        $add_referral_transaction_query = "INSERT INTO `transactions`(`user_id`, `transaction_type`, `hash`, 
                  `note`, `to_address`, `from_address`, `is_addition`, `transaction_status`, `amount`, `timestamp`)
                   VALUES ($referred_by_id_3,7,'','','','',1,1,$lvl_three_buy_request_amount_of_tsit_purchased,$timestamp)";
                        $add_referral_transaction_query_run = mysqli_query($con, $add_referral_transaction_query);
                        if ($add_referral_transaction_query_run) {
                          //check for lvl 4 referral
                          $get_referred_by_id_query = "SELECT * FROM users WHERE id = '$referred_by_id_3'";
                          $get_referred_by_id_result = mysqli_query($con, $get_referred_by_id_query);
                          $get_referred_by_id_row = mysqli_fetch_assoc($get_referred_by_id_result);
                          $referred_by_id_4 = $get_referred_by_id_row['referred_by_id'];

                          //if referred by id is not zero then add transactions for all referred users
                          if ($referred_by_id_4 != 0) {
                            //check if 100$ buying activity in transaction table of a referred user
                            $check_if_100_transaction_query = "SELECT * FROM transactions WHERE user_id = '$referred_by_id_4' AND transaction_type = 6";
                            $check_if_100_transaction_result = mysqli_query($con, $check_if_100_transaction_query);
                            //get the number of row
                            $check_if_100_transaction_row_count = mysqli_num_rows($check_if_100_transaction_result);
                            if ($check_if_100_transaction_row_count > 0) {
                              //add transaction 
                              $add_referral_transaction_query = "INSERT INTO `transactions`(`user_id`, `transaction_type`, `hash`, 
                        `note`, `to_address`, `from_address`, `is_addition`, `transaction_status`, `amount`, `timestamp`)
                         VALUES ($referred_by_id_4,7,'','','','',1,1,$lvl_four_buy_request_amount_of_tsit_purchased,$timestamp)";
                              $add_referral_transaction_query_run = mysqli_query($con, $add_referral_transaction_query);
                              if ($add_referral_transaction_query_run) {
                                //check for lvl 5 referral
                                $get_referred_by_id_query = "SELECT * FROM users WHERE id = '$referred_by_id_4'";
                                $get_referred_by_id_result = mysqli_query($con, $get_referred_by_id_query);
                                $get_referred_by_id_row = mysqli_fetch_assoc($get_referred_by_id_result);
                                $referred_by_id_5 = $get_referred_by_id_row['referred_by_id'];

                                //if referred by id is not zero then add transactions for all referred users
                                if ($referred_by_id_5 != 0) {
                                  //check if 100$ buying activity in transaction table of a referred user
                                  $check_if_100_transaction_query = "SELECT * FROM transactions WHERE user_id = '$referred_by_id_5' AND transaction_type = 6";
                                  $check_if_100_transaction_result = mysqli_query($con, $check_if_100_transaction_query);
                                  //get the number of row
                                  $check_if_100_transaction_row_count = mysqli_num_rows($check_if_100_transaction_result);
                                  if ($check_if_100_transaction_row_count > 0) {
                                    //add transaction 
                                    $add_referral_transaction_query = "INSERT INTO `transactions`(`user_id`, `transaction_type`, `hash`, 
                              `note`, `to_address`, `from_address`, `is_addition`, `transaction_status`, `amount`, `timestamp`)
                               VALUES ($referred_by_id_5,7,'','','','',1,1,$lvl_five_buy_request_amount_of_tsit_purchased,$timestamp)";
                                    $add_referral_transaction_query_run = mysqli_query($con, $add_referral_transaction_query);
                                    if ($add_referral_transaction_query_run) {
                                    }
                                  }
                                }
                              }
                            }
                          }
                        }
                      }
                    }
                  }
                }
              }
            }
          }
        }
      } else {

?>
        <script>
          alert("This Request is already Approved");
        </script>
<?php
      }
    }
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
  <title>Buy Requests - Tesla INU</title>
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
          <h2 class="mb-3 me-auto">TSIT Buy Requests</h2>
        </div>
        <div class="row">
          <div class="col-xl-12 col-lg-6">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Buy Requests</h4>
                <scam class="card-title-desc">Here you can see all the Pending buy requests TSIT portal</scam>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="example" class="display">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>User ID</th>
                        <th>Date</th>
                        <th>User Name</th>
                        <th>TSIT Price</th>
                        <th>Amount</th>
                        <th>Currency Used</th>
                        <th>Amount Paid</th>
                        <th>Transaction Id</th>
                        <th>Sending Wallet Address</th>
                        <th>Screen Shot</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $query1 = "SELECT * FROM `buy_requests` WHERE `is_tsit_transfered` = 0 AND `is_rejected` = 0";
                      $runquery1 = mysqli_query($con, $query1);
                      $rows1 = mysqli_num_rows($runquery1);
                      $indexing1 = 1;

                      if ($rows1 > 0 && $runquery1 == TRUE) {
                        while ($data1 = mysqli_fetch_assoc($runquery1)) {
                      ?>
                          <tr>
                            <td class="text-center"> <?php echo $data1['id']; ?> </td>
                            <td class="text-center"> <?php echo "#" . $data1['user_id']; ?> </td>
                            <td><?php
                                $transaction_date = $data1['request_timestamp'];
                                echo date('h:i:s a', $transaction_date);

                                echo '<br>';
                                echo date('d/m/Y', $transaction_date);

                                ?></td>
                            <td class="text-center"><?php
                                                    //get user name and email from user table
                                                    $buy_request_user_id = $data1['user_id'];
                                                    $get_user_name_query = "SELECT * FROM `users` WHERE `id` = $buy_request_user_id";
                                                    $get_user_name_query_run = mysqli_query($con, $get_user_name_query);
                                                    $get_user_name_row = mysqli_fetch_assoc($get_user_name_query_run);
                                                    echo $get_user_name_row['name'];
                                                    echo "<br>";
                                                    echo $get_user_name_row['email'];

                                                    ?></td>
                            <td> <?php echo "$" . $data1['tsit_coin_price']; ?> </td>
                            <td> <?php echo $data1['amount_of_tsit_purchased']; ?> </td>
                            <td> <?php echo strtoupper($data1['currency']); ?> </td>
                            <td> <?php echo $data1['amount_in_currency'] . " " . strtoupper($data1['currency']); ?> </td>
                            <td> <?php echo $data1['transaction_id']; ?> </td>
                            <td> <?php echo $data1['sending_wallet_address']; ?> </td>
                            <td><?php

                                if ($data1['payment_screenshot'] != NULL) {
                                  echo "<a href='../../uploads/tsit/buy/" . $data1['payment_screenshot'] . "' target='_blank'><img src='../../uploads/tsit/buy/" . $data1['payment_screenshot'] . "' width='50px' height='50px'></a>";
                                } else {
                                  echo 'Not Available';
                                }

                                ?></td>

                            <td class="text-center">
                              <span data-bs-toggle="modal" data-bs-target="#approve_request" onclick="approveRequest('<?php echo $data1['id'] ?>','<?php echo $data1['amount_of_tsit_purchased']; ?>','<?php echo $data1['transaction_id']; ?>','<?php echo $data1['sending_wallet_address']; ?>');">
                                <i class="far fa-thumbs-up" style="color: #68e365  !important; cursor:pointer;">
                                </i>
                              </span>
                              &nbsp;&nbsp;
                              <span data-bs-toggle="modal" data-bs-target="#reject_request" onclick="rejectRequest('<?php echo $data1['id'] ?>','<?php echo $data1['amount_of_tsit_purchased']; ?>','<?php echo $data1['transaction_id']; ?>','<?php echo $data1['sending_wallet_address']; ?>');">
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
  <div class="modal fade" id="approve_request">
    <div class="modal-dialog  modal-md modal-dialog-centered">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Approve Request
          </h4>
          <span type="button" class="close" data-bs-dismiss="modal">&times;</span>
        </div>
        <form action="" method="POST">
          <input type="hidden" name="buy_request_id" id="approve_request_buy_request_id_hidden_input">
          <!-- Modal body -->
          <div class="modal-body">
            <div class="row">
              <div class="col-12 text-center">
                <h3> <span id="approve_request_transaction_amount_show">0</span> TSIT</h3>
              </div>
            </div>
            <div class="row text-center">
              <div class="col-12">
                <span><strong>Transaction Id: </strong><span id="approve_request_transaction_id_show"><span></span>
              </div>
              <div class="col-12">
                <span><strong>Sending Wallet Address: </strong><span id="approve_request_sending_wallet_address_show"><span></span>
              </div>
            </div>

          </div>
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="approve_buy_request_submit_button" class="btn btn-primary">Approve</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="modal fade" id="reject_request">
    <div class="modal-dialog  modal-md modal-dialog-centered">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Reject Transaction
          </h4>
          <span type="button" class="close" data-bs-dismiss="modal">&times;</span>
        </div>
        <form action="" method="POST">
          <input type="hidden" name="buy_request_id" id="reject_request_buy_request_id_hidden_input">
          <!-- Modal body -->
          <div class="modal-body">
            <div class="row">
              <div class="col-12 text-center">
                <h3> <span id="reject_request_transaction_amount_show">0</span> TSIT</h3>
              </div>
            </div>
            <div class="row text-center">
              <div class="col-12">
                <span><strong>Transaction Id: </strong><span id="reject_request_transaction_id_show"><span></span>
              </div>
              <div class="col-12">
                <span><strong>Sending Wallet Address: </strong><span id="reject_request_sending_wallet_address_show"><span></span>
              </div>
            </div>
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
            <button type="submit" name="reject_buy_request_submit_button" class="btn btn-primary">Reject</button>
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


</body>

</html>

<script>
  function approveRequest(buy_request_id, amount, transaction_id, sending_wallet_address) {

    $('#approve_request_buy_request_id_hidden_input').val(buy_request_id);
    $('#approve_request_transaction_amount_show').html(amount);
    $('#approve_request_transaction_id_show').html(transaction_id);
    $('#approve_request_sending_wallet_address_show').html(sending_wallet_address);


  }

  function rejectRequest(buy_request_id, amount, transaction_id, sending_wallet_address) {

    $('#reject_request_buy_request_id_hidden_input').val(buy_request_id);
    $('#reject_request_transaction_amount_show').html(amount);
    $('#reject_request_transaction_id_show').html(transaction_id);
    $('#reject_request_sending_wallet_address_show').html(sending_wallet_address);



  }
</script>