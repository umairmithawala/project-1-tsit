<?php
session_start();
require_once '../database/db-con.php';
?>
<?php
$alert_msg = 0;
if (isset($_POST['send_otp'])) {

    $email = $_POST['email'];
    $email = htmlspecialchars($email, ENT_QUOTES, "UTF-8");


    $otp = rand(111111,999999);
    


    // $query = "INSERT INTO `forgot_password_otp`(`id`, `email`, `otp`) VALUES (NULL,'$email',$otp)";
    $query = "SELECT * FROM `users` WHERE `email` = '$email'";
    $run_fetch = mysqli_query($con, $query);
    $noofrow = mysqli_num_rows($run_fetch);
    if ($noofrow > 0) {
        $query2 = "INSERT INTO `forgot_password_otp`(`id`, `email`, `otp`) VALUES (NULL,'$email',$otp)";
        if ($con->query($query2) === TRUE) {
            
            $html='<p>Dear Customer,<br>
            Your OTP is '.$otp.'. Do not share it with anyone by any means. This is confidential and to be used by you only.
            <br>
            <br>
            Warm regards,
            Tesla INU</p>';
            $mail = mail($email, "Request OTP", $html); 

            $_SESSION['fp_email'] = $email;
            ?>
                <script>
                    window.location='enter-fp-otp.php';
                </script>
            <?php
        }
    }else {
        $alert_msg = "Please enter valid email";
    }
    
}
?>


<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <title>Forgot Password - TSIT - World's No 1 Scam Database</title>
      <link rel="icon" type="image/png" href="../../en/assets/img/favicon.png" />
      <link rel="stylesheet" type="text/css" href="../../en/assets/css/plugins.css">
      <link rel="stylesheet" type="text/css" href="../../en/assets/css/theme-styles.css">
      <link rel="stylesheet" type="text/css" href="../../en/assets/css/blocks.css">
      <link rel="stylesheet" type="text/css" href="../../en/assets/css/widgets.css">
      <link rel="stylesheet" type="text/css" href="../../en/assets/css/font-awesome.css">
      <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700i,900," rel="stylesheet">
      <style>
         .alerttoggle{
            display:none;
         }
      </style>
   </head>
   <body class="crumina-grid">
      <?php
         require_once ('../elements/landing-header.php');
         ?>
      <div class="main-content-wrapper medium-padding120">
         <section>
            <div class="container">
               <div class="row pt50 " >
                  <div class="col-lg-3"></div>
                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mb30">
                     <form class="login-form form--dark" method="post" action="#">
                        <header class="crumina-module crumina-heading heading--h2 heading--with-decoration">
                           <h2 class="heading-title">Forgot Password</h2>
                           <p>* All fields are required</p>
                        </header>
                        <div class="alert alert--with-bg alert-danger alerttoggle" role="alert" id="alert_one">
                                    <div class="alert-icon">
                                        <svg class="woox-icon icon-del"><use xlink:href="#icon-close-cross"></use></svg>
                                    </div>
                                    <strong></strong> <span id="alert_msg_id"></span>
                                    <a href="#" class="icon-close">
                                        <svg class="woox-icon icon-del"><use xlink:href="#icon-close-cross"></use></svg>
                                    </a>
                                </div>
                        <label for="name3" class="input-label">Username or Email <abbr class="required" title="required">*</abbr></label>
                        <div class="input-with-icon input-icon--right">
                           <input class="input--dark input--squared" id='name3' name="email" placeholder="Username or Email" type="email" >
                           <svg class="woox-icon icon-black-male-user-symbol-2">
                              <use xlink:href="#icon-black-male-user-symbol-2"></use>
                           </svg>
                        </div>
                        <br><br>
                       
                        <button class="btn btn--large btn--primary btn--with-icon btn--icon-right full-width" type="submit" name="send_otp">
                           Send OTP
                           <svg class="woox-icon icon-arrow-right">
                              <use xlink:href="#icon-arrow-right"></use>
                           </svg>
                        </button>
                        <br>
                        <br>
                        <a href="../auth/login.php" >
                           <div class="btn btn--large btn--green-light btn--transparent btn--with-icon btn--icon-right full-width">
                           Login Instead
                              <svg class="woox-icon icon-arrow-right">
                                 <use xlink:href="#icon-arrow-right"></use>
                              </svg>
                           </div>
                        </a>
                     </form>
                  </div>
                  <div class="col-lg-3"></div>
               </div>
            </div>
         </section>
      </div>
      <?php
         require_once ('../elements/landing-footer.php');
         ?>
      <script src="../../en/assets/js/method-assign.js"></script>
      <script src="../../en/assets/js/jquery-3.3.1.js"></script>
      <script src="../../en/assets/js/js-plugins/leaflet.js"></script>
      <script src="../../en/assets/js/js-plugins/MarkerClusterGroup.js"></script>
      <script src="../../en/assets/js/js-plugins/crum-mega-menu.js"></script>
      <script src="../../en/assets/js/js-plugins/waypoints.js"></script>
      <script src="../../en/assets/js/js-plugins/jquery-circle-progress.js"></script>
      <script src="../../en/assets/js/js-plugins/segment.js"></script>
      <script src="../../en/assets/js/js-plugins/bootstrap.js"></script>
      <script src="../../en/assets/js/js-plugins/imagesLoaded.js"></script>
      <script src="../../en/assets/js/js-plugins/jquery.matchHeight.js"></script>
      <script src="../../en/assets/js/js-plugins/jquery-countTo.js"></script>
      <script src="../../en/assets/js/js-plugins/Headroom.js"></script>
      <script src="../../en/assets/js/js-plugins/jquery.magnific-popup.js"></script>
      <script src="../../en/assets/js/js-plugins/popper.min.js"></script>
      <script src="../../en/assets/js/js-plugins/particles.js"></script>
      <script src="../../en/assets/js/js-plugins/perfect-scrollbar.js"></script>
      <script src="../../en/assets/js/js-plugins/jquery.datetimepicker.full.js"></script>
      <script src="../../en/assets/js/js-plugins/svgxuse.js"></script>
      <script src="../../en/assets/js/js-plugins/select2.js"></script>
      <script src="../../en/assets/js/js-plugins/smooth-scroll.js"></script>
      <script src="../../en/assets/js/js-plugins/sharer.js"></script>
      <script src="../../en/assets/js/js-plugins/isotope.pkgd.min.js"></script>
      <script src="../../en/assets/js/js-plugins/ajax-pagination.js"></script>
      <script src="../../en/assets/js/js-plugins/swiper.min.js"></script>
      <script src="../../en/assets/js/js-plugins/material.min.js"></script>
      <script src="../../en/assets/js/js-plugins/orbitlist.js"></script>
      <script src="../../en/assets/js/js-plugins/highstock.js"></script>
      <script src="../../en/assets/js/js-plugins/bootstrap-datepicker.js"></script>
      <script src="../../en/assets/js/js-plugins/TimeCircles.js"></script>
      <script src="../../en/assets/js/js-plugins/ion.rangeSlider.js"></script>
      <script defer src="../../en/assets/fonts/fontawesome-all.js"></script>
      <script src="../../en/assets/js/main.js"></script>
      <script src="../../en/assets/js/svg-loader.js"></script>
   </body>
</html>
<script>
    var alert_msg = "<?php echo $alert_msg; ?>";
    console.log(alert_msg);
    if (alert_msg != 0) {
        document.getElementById("alert_one").style.display = "-webkit-box";
        document.getElementById("alert_msg_id").innerHTML = alert_msg;
    }
</script>