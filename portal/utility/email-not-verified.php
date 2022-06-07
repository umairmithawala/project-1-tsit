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
   if($user_data['email_verification'] == 1){
    
    echo "<script>window.location='../dashboard/index.php';</script>";
 }
   
   
   ?>




<?php

//geting user email
$user_email = $user_data['email'];

// handlig resend mail


if (isset($_POST['resend_verification_mail']))
{

    // sending verification mail
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);

    $verification_link = 'http://teslainu.com/portal/utility/verify-my-email.php?ch=';
    for ($i = 0;$i < 5;$i++)
    {
        $verification_link .= $characters[rand(0, $charactersLength - 1) ];
    }
    $verification_link .= $user_id;
    for ($i = 0;$i < 8;$i++)
    {
        $verification_link .= $characters[rand(0, $charactersLength - 1) ];
    }

 

   // mail logic
            

            // Multiple recipients
            $to = $user_email; // note the comma
            // Subject
            $subject = 'Please confirm your email [Tesla Inu]';

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
                                            Thank you for Joining Tesla INU. 
                                          </p>
                                          <p>
                                            Please confirm your email address by clicking on the button below or use this link '.$verification_link .' withing 48 hours. 
                                          </p>
                                        <a
                                          href="'.$verification_link.'"
                                          style="
                                            padding: 10px;
                                            background-color: #3452ff;
                                            color: #fff;
                                            display: inline-block;
                                            border-radius: 4px;
                                            margin-bottom: 18px;
                                          "
                                          >Verify Email
                                        </a>
                                        <p>
                                         Once confirmed, this email will be uniquely associated with your Tesla INU account.
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

            if($mailto){

               echo "<script>var email_resend_alert = 1;</script>";
               //      echo "mail sent";

            }

            // mail logic ends
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
        <title>Email Not Verified - Tesla INU Web Portal</title>
        <!-- FAVICONS ICON -->
        <link rel="shortcut icon" type="image/png" href="../assets/images/favicon.png" />
        <link href="../assets/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet" />
        <link rel="stylesheet" href="../assets/vendor/dotted-map/css/contrib/jquery.smallipop-0.3.0.min.css" type="text/css" media="all" />
        <!-- Style css -->
        <link href="../assets/css/style.css" rel="stylesheet" />
    </head>
    <body>
        <!--*******************
         Preloader start
         ********************-->
        <div id="preloader">
            <div class="lds-ripple">
                <div></div>
                <div></div>
            </div>
        </div>
        <!--*******************
         Preloader end
         ********************-->
        <!--**********************************
         Main wrapper start
         ***********************************-->
        <div id="main-wrapper">
            <?php require('../elements/header.php');?>
            <?php require('../elements/sidebar.php');?>
            <div class="content-body">
                <!--**********************************
            Content body start
            ***********************************-->
                <!-- row -->
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body text-center ai-icon text-primary">
                                    
                                <h5>Please verify your email </h5>
                                          <p>You're almost there! We sent an email to <strong><?php echo $user_email; ?></strong></p>
                                          <p>Just click on the link in that email to complete your signup. <br>If you don't see it, you may need to <strong>check your spam</strong> folder. </b></p>
                                          <br><br>
                                          <p>Still can't find the email?</p>
                                    <form action="" method="POST">
                                    <button name="resend_verification_mail" type="submit" class="btn my-2 btn-primary btn-lg px-4"> Resend Email</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </div>
                <!--**********************************
            Content body end
            ***********************************-->
                <?php require('../elements/footer.php');?>
                <!--**********************************
            Support ticket button start
            ***********************************-->
                <!--**********************************
            Support ticket button end
            ***********************************-->
            </div>
        </div>
        <!--**********************************
         Main wrapper end
         ***********************************-->
        <!--**********************************
         Scripts
         ***********************************-->
        <!-- Required vendors -->
        <script src="../assets/vendor/global/global.min.js"></script>
        <script src="../assets/vendor/chart.js/Chart.bundle.min.js"></script>
        <script src="../assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
        <!-- Apex Chart -->
        <script src="../assets/vendor/apexchart/apexchart.js"></script>
        <!-- Chart piety plugin files -->
        <script src="../assets/vendor/peity/jquery.peity.min.js"></script>
        <!-- Dashboard 1 -->
        <!-- <script src="../assets/js/dashboard/dashboard-1.js"></script> -->
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

        <script>
            // Add the following code if you want the name of the file appear on select
            $(".custom-file-input").on("change", function () {
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
        </script>
    </body>
</html>

