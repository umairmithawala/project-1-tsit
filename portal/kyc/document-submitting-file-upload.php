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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>
    <!--*******************
         Preloader start
         ********************-->
    <!-- <div id="preloader">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div> -->
    <!--*******************
         Preloader end
         ********************-->
    <!--**********************************
         Main wrapper start
         ***********************************-->
    <div id="main-wrapper">
        <?php require('../elements/header.php'); ?>
        <?php require('../elements/sidebar.php'); ?>
        <div class="content-body">
            <!--**********************************
               Content body start
               ***********************************-->
            <!-- row -->
            <div class="container mt-5">
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Upload Document</h3>
                        </div>
                        <div class="card-body">
                            <div class="w3-light-grey">
                                <div id="myBar" class="w3-container w3-green" style="height:24px;width:20%"></div>
                            </div>

                            <p id="demo">20%</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
               Content body end
               ***********************************-->
        <?php require('../elements/footer.php'); ?>
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
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>

    <script>
        submitDoc();

        function submitDoc() {
            var elem = document.getElementById("myBar");
            var width = 20;
            //gerate random number form 10 to 100
            var random = Math.floor(Math.random() * (100 - 10 + 1)) + 10;
            console.log(random);
            var id = setInterval(frame, random);

            function frame() {
                if (width >= 100) {
                    clearInterval(id);
                } else {
                    width++;
                    elem.style.width = width + '%';
                    document.getElementById("demo").innerHTML = width * 1 + '%';
                }
            }


            setTimeout(function() {
                window.location = "document-submitted.php";

            }, random * 100);
        }
    </script>

</body>

</html>