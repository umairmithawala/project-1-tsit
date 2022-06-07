<?php

session_start();
require_once '../../database/db-con.php';
?>
<?php
$alert_msg = 0;
if (isset($_POST['login'])) {
    
    $email = $_POST['email'];
   // $email = htmlspecialchars($email, ENT_QUOTES, "UTF-8");
    
    $password = $_POST['password'];
   // $password = htmlspecialchars($password, ENT_QUOTES, "UTF-8");
    
    
    
    $query    = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'";
    $run_fetch = mysqli_query($con, $query);
    $noofrow  = mysqli_num_rows($run_fetch);
    if ($noofrow > 0 && $run_fetch == TRUE) {
        $data = mysqli_fetch_assoc($run_fetch);
     $role = $data['user_role'];
     if ($role == 2) {
      $alert_msg = "Something went wrong";

         // $_SESSION['user_session_var'] = $data['id'];
      ?>
      <script>
         // window.location = "../dashboard/index.php";
      </script>
      <?php
            } else if ($role == 1) {

                  $_SESSION['admin_session_var'] = $data['id'];
      ?>
      <script>
         window.location = "../../super-admin/dashboard/index.php";
      </script>
      <?php
     } else {
         $alert_msg = "Something went wrong";
     }
        
        
    } else {
        $alert_msg = "Email or password may wrong";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <title>Login - TSIT - World's No 1 Scam Database</title>
      <link rel="icon" type="image/png" href="../../../en/assets/img/favicon.png" />
      <link rel="stylesheet" type="text/css" href="../../../en/assets/css/plugins.css">
      <link rel="stylesheet" type="text/css" href="../../../en/assets/css/theme-styles.css">
      <link rel="stylesheet" type="text/css" href="../../../en/assets/css/blocks.css">
      <link rel="stylesheet" type="text/css" href="../../../en/assets/css/widgets.css">
      <link rel="stylesheet" type="text/css" href="../../../en/assets/css/font-awesome.css">
      <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700i,900," rel="stylesheet">
      <style>
         .alerttoggle{
            display:none;
         }
      </style>
   </head>
   <body class="crumina-grid">
      <?php
         require_once ('../../elements/landing-header.php');
         ?>
      <div class="main-content-wrapper medium-padding120">
         <section>
            <div class="container">
               <div class="row pt50 " >
                  <div class="col-lg-3"></div>
                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mb30">
                     <form class="login-form form--dark" method="post" action="#">
                        <header class="crumina-module crumina-heading heading--h2 heading--with-decoration">
                           <h2 class="heading-title">Login</h2>
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
                        <label for="password3" class="input-label">Password <abbr class="required" title="required">*</abbr></label>
                        <div class="input-with-icon input-icon--right">
                           <input class="input--dark input--squared" id='password3' name="password" placeholder="•••••••••••" type="password" >
                           <svg class="woox-icon icon-padlock">
                              <use xlink:href="#icon-padlock"></use>
                           </svg>
                        </div>
                        <div class="forgot-block">
                           <div class="checkbox checkbox--style5">
                              <label>
                              <input type="checkbox" name="optionsCheckboxes10" checked>
                              Remember me
                              </label>
                           </div>
                           <a class="link-underlined" href="../auth/forgot-password.php">Forgot Password?</a>
                        </div>
                        <button class="btn btn--large btn--primary btn--with-icon btn--icon-right full-width" type="submit" name="login">
                           Login NOW
                           <svg class="woox-icon icon-arrow-right">
                              <use xlink:href="#icon-arrow-right"></use>
                           </svg>
                        </button>
                        <br>
                        <br>
                        <a href="../auth/register.php" >
                           <div class="btn btn--large btn--green-light btn--transparent btn--with-icon btn--icon-right full-width">
                              Create an Account
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
         require_once ('../../elements/superadmin-landing-footer.php');
         ?>
      <script src="../../../en/assets/js/method-assign.js"></script>
      <script src="../../../en/assets/js/jquery-3.3.1.js"></script>
      <script src="../../../en/assets/js/js-plugins/leaflet.js"></script>
      <script src="../../../en/assets/js/js-plugins/MarkerClusterGroup.js"></script>
      <script src="../../../en/assets/js/js-plugins/crum-mega-menu.js"></script>
      <script src="../../../en/assets/js/js-plugins/waypoints.js"></script>
      <script src="../../../en/assets/js/js-plugins/jquery-circle-progress.js"></script>
      <script src="../../../en/assets/js/js-plugins/segment.js"></script>
      <script src="../../../en/assets/js/js-plugins/bootstrap.js"></script>
      <script src="../../../en/assets/js/js-plugins/imagesLoaded.js"></script>
      <script src="../../../en/assets/js/js-plugins/jquery.matchHeight.js"></script>
      <script src="../../../en/assets/js/js-plugins/jquery-countTo.js"></script>
      <script src="../../../en/assets/js/js-plugins/Headroom.js"></script>
      <script src="../../../en/assets/js/js-plugins/jquery.magnific-popup.js"></script>
      <script src="../../../en/assets/js/js-plugins/popper.min.js"></script>
      <script src="../../../en/assets/js/js-plugins/particles.js"></script>
      <script src="../../../en/assets/js/js-plugins/perfect-scrollbar.js"></script>
      <script src="../../../en/assets/js/js-plugins/jquery.datetimepicker.full.js"></script>
      <script src="../../../en/assets/js/js-plugins/svgxuse.js"></script>
      <script src="../../../en/assets/js/js-plugins/select2.js"></script>
      <script src="../../../en/assets/js/js-plugins/smooth-scroll.js"></script>
      <script src="../../../en/assets/js/js-plugins/sharer.js"></script>
      <script src="../../../en/assets/js/js-plugins/isotope.pkgd.min.js"></script>
      <script src="../../../en/assets/js/js-plugins/ajax-pagination.js"></script>
      <script src="../../../en/assets/js/js-plugins/swiper.min.js"></script>
      <script src="../../../en/assets/js/js-plugins/material.min.js"></script>
      <script src="../../../en/assets/js/js-plugins/orbitlist.js"></script>
      <script src="../../../en/assets/js/js-plugins/highstock.js"></script>
      <script src="../../../en/assets/js/js-plugins/bootstrap-datepicker.js"></script>
      <script src="../../../en/assets/js/js-plugins/TimeCircles.js"></script>
      <script src="../../../en/assets/js/js-plugins/ion.rangeSlider.js"></script>
      <script defer src="../../../en/assets/fonts/fontawesome-all.js"></script>
      <script src="../../../en/assets/js/main.js"></script>
      <script src="../../../en/assets/js/svg-loader.js"></script>
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