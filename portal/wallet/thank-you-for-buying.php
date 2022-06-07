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



require_once 'url-shortner.php';

$id = $_GET['id'];

$buy_requests_id = UrlShortener::shortToInt("$id");
$buy_requests_id = $buy_requests_id;

?>
<?php
//fetching data from buy requests table second



$query1 = "SELECT * FROM `buy_requests` WHERE `id` = $buy_requests_id";
$run_query_1 = mysqli_query($con, $query1);
$rows1 = mysqli_num_rows($run_query_1);
$indexing = 1;
if ($rows1 > 0 && $run_query_1 == TRUE) {
    while ($data1 = mysqli_fetch_assoc($run_query_1)) {
        $request_timestamp = $data1['request_timestamp'];

        $amount_of_tsit_purchased = $data1['amount_of_tsit_purchased'];
        $currency = $data1['currency'];
        $amount_in_currency = $data1['amount_in_currency'];
        $sending_wallet_address = $data1['sending_wallet_address'];


        $request_timestamp = $data1['request_timestamp'];
        $is_tsit_transfered = $data1['is_tsit_transfered'];
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

                <div class="row">
                    <div class="col-xl-3"></div>
                    <div class="col-xl-6">
                        <!-- send section -->
                        <div class="card">

                            <div class="card-body">
                                <div class="container">
                                    <div class="theme-title  text-center">
                                        <h2><span>Thank you for buying</span></h2>
                                    </div>
                                    <div class="container">
                                        <div class="row my-2">

                                            <div class="col-md-6 col-sm-6 col-xs-6 col-6 text-left">
                                                <div class="text">
                                                    <p style="font-size:15px; font-weight:400;"> Purchased Id</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-6 text-right">
                                                <div class="text">
                                                    <p style="font-size:15px; font-weight:600;"> <?php echo "#" . $buy_requests_id;  ?></p>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row my-2">

                                            <div class="col-md-6 col-sm-6 col-xs-6 col-6 text-left">
                                                <div class="text">
                                                    <p style="font-size:15px; font-weight:400;"> Purchased Date</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-6 text-right">
                                                <div class="text">
                                                    <p style="font-size:15px; font-weight:600;"> <?php
                                                                                                    $mydate = getdate($request_timestamp);
                                                                                                    $mydate2 = "$mydate[mday]/$mydate[mon]/$mydate[year] ";
                                                                                                    $mydate2 .= " " . "$mydate[hours]:$mydate[minutes]";


                                                                                                    echo $mydate2;
                                                                                                    ?></p>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row my-2">

                                            <div class="col-md-6 col-sm-6 col-xs-6 col-6 text-left">
                                                <div class="text">
                                                    <p style="font-size:15px; font-weight:400;"> Purchased Amount</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-6 text-right">
                                                <div class="text">
                                                    <p style="font-size:15px; font-weight:600;"> <?php echo $amount_of_tsit_purchased . " tsit"; ?></p>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row my-2">

                                            <div class="col-md-6 col-sm-6 col-xs-6 col-6 text-left">
                                                <div class="text">
                                                    <p style="font-size:15px; font-weight:400;"> Currency</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-6 text-right">
                                                <div class="text">
                                                    <p style="font-size:15px; font-weight:600;"> <?php echo strtoupper($currency); ?></p>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row my-2">

                                            <div class="col-md-6 col-sm-6 col-xs-6 col-6 text-left">
                                                <div class="text">
                                                    <p style="font-size:15px; font-weight:400;"> Amount Paid</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-6 text-right">
                                                <div class="text">
                                                    <p style="font-size:15px; font-weight:600;"> <?php echo $amount_in_currency . " " . strtoupper($currency); ?></p>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row my-2">

                                            <div class="col-md-6 col-sm-6 col-xs-6 col-6 text-left">
                                                <div class="text">
                                                    <p style="font-size:15px; font-weight:400;">Sending Wallet Address</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-6 text-right">
                                                <div class="text">
                                                    <p style="font-size:15px; font-weight:600;"> <?php echo $sending_wallet_address; ?></p>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row my-2">

                                            <div class="col-md-6 col-sm-6 col-xs-6 col-6 text-left">
                                                <div class="text">
                                                    <p style="font-size:15px; font-weight:400;"> TSIT Transferred</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-6 text-right">
                                                <div class="text">
                                                    <p style="font-size:15px; font-weight:600;"> <?php
                                                                                                    if ($is_tsit_transfered == 1) {
                                                                                                        echo "Transferred";
                                                                                                    } else {
                                                                                                        echo "Not Transferred";
                                                                                                    }
                                                                                                    ?></p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
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

</body>

</html>