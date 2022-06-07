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
    <title>Referral - Tesla INU</title>
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
                    <h2 class="mb-3 me-auto">My Referred List</h2>
                </div>
                <div class="row">
                    <div class="col-xl-8 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Referred By Me </h4>
                                <scam class="card-title-desc">Here you can see all the people referred by you.</scam>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Level</th>
                                                <th>User Email</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query1 = "SELECT * FROM `users` WHERE `referred_by_id` = $user_id ORDER BY `id` DESC";
                                            $runquery1 = mysqli_query($con, $query1);
                                            $rows1 = mysqli_num_rows($runquery1);
                                            $indexing1 = 1;
                                            if ($rows1 > 0 && $runquery1 == TRUE) {
                                                while ($data1 = mysqli_fetch_assoc($runquery1)) { ?>
                                                    <tr>
                                                        <td><?php echo $indexing1; ?></td>
                                                        <td><?php echo 'Level 1' ?></td>
                                                        <td><?php echo $data1['email']; ?></td>


                                                    </tr>

                                                    <?php

                                                    //get the user id of referred user
                                                    $referred_user_id = $data1['id'];
                                                    //get level 2 referred users
                                                    $query2 = "SELECT * FROM `users` WHERE `referred_by_id` = $referred_user_id ORDER BY `id` DESC";
                                                    $runquery2 = mysqli_query($con, $query2);
                                                    $rows2 = mysqli_num_rows($runquery2);
                                                    $indexing2 = 1;
                                                    if ($rows2 > 0 && $runquery2 == TRUE) {
                                                        while ($data2 = mysqli_fetch_assoc($runquery2)) { ?>
                                                            <tr>
                                                                <td><?php echo $indexing1 . '.' . $indexing2; ?></td>
                                                                <td><?php echo 'Level 2' ?></td>
                                                                <td><?php echo $data2['email']; ?></td>
                                                            </tr>

                                                            <?php
                                                            //get the user id of referred user
                                                            $referred_user_id = $data2['id'];
                                                            //get level 3 referred users
                                                            $query3 = "SELECT * FROM `users` WHERE `referred_by_id` = $referred_user_id ORDER BY `id` DESC";
                                                            $runquery3 = mysqli_query($con, $query3);
                                                            $rows3 = mysqli_num_rows($runquery3);
                                                            $indexing3 = 1;
                                                            if ($rows3 > 0 && $runquery3 == TRUE) {
                                                                while ($data3 = mysqli_fetch_assoc($runquery3)) { ?>
                                                                    <tr>
                                                                        <td><?php echo $indexing1 . '.' . $indexing2 . '.' . $indexing3; ?></td>
                                                                        <td><?php echo 'Level 3' ?></td>
                                                                        <td><?php echo $data3['email']; ?></td>
                                                                    </tr>
                                                                    <?php
                                                                    //get the user id of referred user
                                                                    $referred_user_id = $data3['id'];
                                                                    //get level 4 referred users
                                                                    $query4 = "SELECT * FROM `users` WHERE `referred_by_id` = $referred_user_id ORDER BY `id` DESC";
                                                                    $runquery4 = mysqli_query($con, $query4);
                                                                    $rows4 = mysqli_num_rows($runquery4);
                                                                    $indexing4 = 1;
                                                                    if ($rows4 > 0 && $runquery4 == TRUE) {
                                                                        while ($data4 = mysqli_fetch_assoc($runquery4)) { ?>
                                                                            <tr>
                                                                                <td><?php echo $indexing1 . '.' . $indexing2 . '.' . $indexing3 . '.' . $indexing4; ?></td>
                                                                                <td><?php echo 'Level 4' ?></td>
                                                                                <td><?php echo $data4['email']; ?></td>
                                                                            </tr>
                                                                            <?php
                                                                            //get the user id of referred user
                                                                            $referred_user_id = $data4['id'];
                                                                            //get level 5 referred users
                                                                            $query5 = "SELECT * FROM `users` WHERE `referred_by_id` = $referred_user_id ORDER BY `id` DESC";
                                                                            $runquery5 = mysqli_query($con, $query5);
                                                                            $rows5 = mysqli_num_rows($runquery5);
                                                                            $indexing5 = 1;
                                                                            if ($rows5 > 0 && $runquery5 == TRUE) {
                                                                                while ($data5 = mysqli_fetch_assoc($runquery5)) { ?>
                                                                                    <tr>
                                                                                        <td><?php echo $indexing1 . '.' . $indexing2 . '.' . $indexing3 . '.' . $indexing4 . '.' . $indexing5; ?></td>
                                                                                        <td><?php echo 'Level 5' ?></td>
                                                                                        <td><?php echo $data5['email']; ?></td>
                                                                                    </tr>
                                                    <?php
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }

                                                    ?>
                                            <?php
                                                    $indexing1++;
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-sm-6">
                        <div class="card" style="height: auto;">
                            <div class="card-body">
                                <div class="text-center">
                                    <div class="profile-photo">
                                        <img src="../uploads/users/profile-img/<?php echo $user_data['user_img'] ?>" width="100" class="img-fluid rounded-circle" alt="">
                                    </div>
                                    <?php

                                    //get this user my_referral_code from users table
                                    $query = "SELECT * FROM `users` WHERE `id` = $user_id";
                                    $runquery = mysqli_query($con, $query);
                                    $rows = mysqli_num_rows($runquery);
                                    $indexing = 1;
                                    if (
                                        $rows >
                                        0 && $runquery == TRUE
                                    ) {
                                        while ($data = mysqli_fetch_assoc($runquery)) {
                                            $my_referral_code = $data['my_referral_code'];
                                        }
                                    } else {
                                        $my_referral_code = 'Not Available';
                                    }
                                    ?>
                                    <h3 class="mt-4 mb-1"><?php echo $my_referral_code; ?></h3>
                                    <p class="text-muted" onclick="copyItem('https://teslainu.com/portal/auth/register.php?ref=<?php echo $my_referral_code; ?>')"><?php echo "https://teslainu.com/portal/auth/register.php?ref=" . $my_referral_code; ?>&nbsp;<i class="fas fa-copy"></i></p>
                                    <div class="btn btn-outline-primary btn-rounded mt-3 px-5" onclick="copyItem('https://teslainu.com/portal/auth/register.php?ref=<?php echo $my_referral_code; ?>')">Copy Link</div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Referral Transactions </h4>
                                <scam class="card-title-desc">Here you can see referral transactions.</scam>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example1a" class="display" style="min-width: 845px;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Transaction ID</th>
                                                <th>Hash</th>
                                                <th>Note</th>
                                                <th>Transaction Type</th>
                                                <th>To Address</th>
                                                <th>From Address</th>
                                                <th>Amount</th>
                                                <th>Transaction Status</th>




                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query1 = "SELECT * FROM `transactions` WHERE `user_id` = $user_id AND `transaction_type` = 7 ORDER BY `id` DESC";
                                            $runquery1 = mysqli_query($con, $query1);
                                            $rows1 = mysqli_num_rows($runquery1);
                                            $indexing1 = 1;
                                            if (
                                                $rows1 >
                                                0 && $runquery1 == TRUE
                                            ) {
                                                while ($data1 = mysqli_fetch_assoc($runquery1)) { ?>
                                                    <tr>
                                                        <td><?php echo $indexing1; ?></td>
                                                        <td><?php echo $data1['id']; ?></td>
                                                        <td><?php echo $data1['hash']; ?></td>
                                                        <td><?php echo $data1['note']; ?></td>
                                                        <td>
                                                            <?php
                                                            $transaction_type = $data1['transaction_type'];

                                                            $query2 = "SELECT * FROM `transaction_type` WHERE `id` = $transaction_type";
                                                            $runquery2 = mysqli_query($con, $query2);
                                                            $rows2 = mysqli_num_rows($runquery2);
                                                            $indexing2 = 2;
                                                            if ($rows2 > 0 && $runquery2 == TRUE) {
                                                                while ($data2 = mysqli_fetch_assoc($runquery2)) {
                                                                    echo $data2['name'];
                                                                }
                                                            }

                                                            ?>
                                                        </td>
                                                        <td><?php echo $data1['to_address']; ?></td>
                                                        <td><?php

                                                            // echo $data1['from_address']; 
                                                            echo 'TSkcFMZtFzRbADShm9bDrRwugipKy1QjAs';

                                                            ?></td>
                                                        <td><?php echo $data1['amount'] . ' TSIT'; ?></td>
                                                        <td>
                                                            <?php
                                                            $transaction_status = $data1['transaction_status'];

                                                            $query2 = "SELECT * FROM `transaction_status` WHERE `id` = $transaction_status";
                                                            $runquery2 = mysqli_query($con, $query2);
                                                            $rows2 = mysqli_num_rows($runquery2);
                                                            $indexing2 = 2;
                                                            if ($rows2 > 0 && $runquery2 == TRUE) {
                                                                while ($data2 = mysqli_fetch_assoc($runquery2)) {
                                                                    if ($transaction_status == 1) {
                                                            ?>
                                                                        <span class="badge badge-success light">Completed</span>
                                                                    <?php
                                                                    } else if ($transaction_status == 2) {
                                                                    ?>
                                                                        <span class="badge badge-danger light">Rejected</span>
                                                                    <?php
                                                                    } else {
                                                                    ?>
                                                                        <span class="badge badge-warning light">Pending</span>
                                                            <?php
                                                                    }
                                                                }
                                                            }

                                                            ?>
                                                        </td>

                                                        <td>

                                                        </td>
                                                    </tr>
                                            <?php
                                                    $indexing1++;
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
</body>

</html>
<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>


<script>
    function copyItem(copyText) {

        console.log(copyText);
        const el = document.createElement('textarea');
        el.value = copyText;
        document.body.appendChild(el);
        el.select();
        document.execCommand('copy');
        document.body.removeChild(el);
        //alert of text copied
        alert("Copied: " + copyText);

    }
</script>