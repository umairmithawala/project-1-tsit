<?php
session_start();
require_once '../database/db-con.php';
?>
<?php
if (!isset($_SESSION['fp_email']) && !isset($_SESSION['fp_email_true@583'])) {
    ?>
<script>
    window.location = "forgot Password";
</script>
<?php
}else {
    $email = $_SESSION['fp_email'];
    $query = "SELECT * FROM `users` WHERE `email` = '$email'";
    $run_fetch = mysqli_query($con,$query);
    $noofrow = mysqli_num_rows($run_fetch);
    $user_data = mysqli_fetch_assoc($run_fetch);
    $user_id = $user_data['id'];
    
}
?>
<?php
$alert_msg = 0;
if (isset($_POST['enter_new_password'])) {
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];

    if ($password == $c_password) {
        $alert_msg  = "Password Changed";
        $query2 = "UPDATE `users` SET `password`= '$password' WHERE `id` = $user_id";
        if ($con->query($query2) === TRUE) { 
            $_SESSION["user_session_var"] = $user_id;
            ?>
<script>
   
    window.location = "../dashboard/index.php";
</script>
<?php
        }else{
            $alert_msg  = "Passwords update failed";
        }
    }else {
        $alert_msg  = "Passwords do not match";
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <title>Forgot Password - TSIT - World's No 1 Scam Database</title>
        <link rel="icon" type="image/png" href="../../en/assets/img/favicon.png" />
        <link rel="stylesheet" type="text/css" href="../../en/assets/css/plugins.css" />
        <link rel="stylesheet" type="text/css" href="../../en/assets/css/theme-styles.css" />
        <link rel="stylesheet" type="text/css" href="../../en/assets/css/blocks.css" />
        <link rel="stylesheet" type="text/css" href="../../en/assets/css/widgets.css" />
        <link rel="stylesheet" type="text/css" href="../../en/assets/css/font-awesome.css" />
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700i,900," rel="stylesheet" />
        <style>
            .alerttoggle {
                display: none;
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
                    <div class="row pt50">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mb30">
                            <form class="login-form form--dark" method="post" action="#">
                                <header class="crumina-module crumina-heading heading--h2 heading--with-decoration">
                                    <h2 class="heading-title">Set New Password</h2>
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
                                <label for="name3" class="input-label">Password <abbr class="required" title="required">*</abbr></label>
                                <div class="input-with-icon input-icon--right">
                                    <input class="input--dark input--squared" id="name3" name="password" placeholder="••••••••••" type="password" />
                                </div>

                                <label for="name4" class="input-label">Password <abbr class="required" title="required">*</abbr></label>
                                <div class="input-with-icon input-icon--right">
                                    <input class="input--dark input--squared" id="name4" name="c_password" placeholder="••••••••••" type="password" />
                                </div>
                                <br />
                                <br />

                                <button class="btn btn--large btn--primary btn--with-icon btn--icon-right full-width" type="submit" name="enter_new_password">
                                    Update Password
                                    <svg class="woox-icon icon-arrow-right">
                                        <use xlink:href="#icon-arrow-right"></use>
                                    </svg>
                                </button>
                                <br />
                                <br />
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
