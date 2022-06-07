<?php
session_start();
require_once '../../../database/db-con.php';
?>
<?php
if (isset($_SESSION['admin_session_var'])) {
  $user_id = $_SESSION['admin_session_var'];
} else {
  header('location:../../../auth/login.php');
}

$user_query = "SELECT * FROM `users` WHERE `id` = $user_id";
$run_fetch = mysqli_query($con, $user_query);
$user_data = mysqli_fetch_assoc($run_fetch);

if ($user_data['email_verification'] == 0) {
  echo "<script>window.location='../utility/email-not-verified.php';</script>";
}
?>
<?php

if (!empty($_GET['id'])) {
  $get_id = $_GET['id'];

  // $sql = "DELETE FROM enquiry WHERE id=$getid";
  $sql = "UPDATE `users` SET `kyc_approved` = 1 WHERE `id` = $get_id";

  if ($con->query($sql) === TRUE) {




    $user_query = "SELECT `name`,`email` FROM `users` WHERE `id` = $get_id";
    $run_fetch = mysqli_query($con, $user_query);
    $user_data = mysqli_fetch_assoc($run_fetch);

    // INSERT INTO `dashboard_news`(`id`, `title`, `added_by`, `is_deleted`, `timestamp`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]')

    //insert this user kyc approved into dashboard_news table
    $timestamp = time();
    $dashboard_news_query = "INSERT INTO `dashboard_news`(`title`, `added_by`, `is_deleted`, `timestamp`) VALUES ('$user_data[name] KYC approved','$user_id','0',$timestamp)";
    $run_dashboard_news_query = mysqli_query($con, $dashboard_news_query);
    


    $user_email = $user_data['email'];
    // mail logic


    // Multiple recipients
    $to = $user_email; // note the comma
    // Subject
    $subject = 'Congratulations! Your KYC has been approved [Tesla Inu]';

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
                             Thank you for your patience. 
                           </p>
                           <p>
                           We have verified your KYC and we are happy to inform you that your KYC has been successfully approved. Now you can enjoy all the features of Tesla Inu.
                           </p>
                        
                         <p>
                        
                         </p>
                         <p style="margin-bottom: 0">
                           Good luck!
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

?>
    <script>
      var a_delete = 1;
    </script>
  <?php

  } else {
    // echo "Error deleting record: " . $con->error;
  ?>
    <script>
      window.history.back();
    </script>
<?php
    header('location:../user-management.php');
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>KYC Approved</title>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
  <script>
    if (a_delete == 1) {
      swal({
        title: "Approved",
        text: "KYC approved successfully",
        icon: "success",
        button: "Done",
      });
      setTimeout(function() {
        window.history.back();
        window.location = "../user-management.php";
      }, 2000);
    } else {
      window.history.back();
      window.location = "../user-management.php";
    }
  </script>
</body>

</html>