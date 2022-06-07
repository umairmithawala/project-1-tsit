<?php
   session_start();
   require_once '../database/db-con.php';
   ?>
<?php
   if(isset($_SESSION['user_session_var'])){
       $user_id = $_SESSION['user_session_var'];
   }else {
       header('location:../auth/login.php');
   }
   
       $user_query = "SELECT * FROM `users` WHERE `id` = $user_id";
       $run_fetch = mysqli_query($con, $user_query);
       $user_data = mysqli_fetch_assoc($run_fetch);

       if($user_data['email_verification'] == 0){
        echo "<script>window.location='../utility/email-not-verified.php';</script>";
    }

    if ($user_data['kyc_approved'] == 0) {
        header('location:../kyc/add-document.php');
     }else if ($user_data['kyc_approved'] == 2) {
        header('location:../kyc/document-submitted.php');
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
        <title>KYC - Tesla INU Web Portal</title>
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
                                    <svg width="100px" height="100px" viewBox="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <!-- Generator: Sketch 50 (54983) - http://www.bohemiancoding.com/sketch -->
                                        
                                        <desc>Created with Sketch.</desc>
                                        <defs></defs>
                                        <g id="44.-Check" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
                                            <g transform="translate(2.000000, 2.000000)" stroke="#10AC84" stroke-width="4">
                                                <path d="M48,96 C74.509668,96 96,74.509668 96,48 C96,21.490332 74.509668,0 48,0 C21.490332,0 0,21.490332 0,48 C0,74.509668 21.490332,96 48,96 Z" id="Layer-1"></path>
                                                <polyline id="Layer-2" points="27.7058857 47.0210276 42.0345786 61.4826208 67.9945661 35.4382535"></polyline>
                                            </g>
                                        </g>
                                    </svg>
                                    <h4 class="my-4">Your account has enabled KYC </h4>
                                    <a href="../wallet/buy-tsit.php" class="btn my-2 btn-primary btn-lg px-4"><i class="fa fa-usd"></i> Buy Tesla Inu Now</a>
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
