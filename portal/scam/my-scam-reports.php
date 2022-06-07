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

if($user_data['email_verification'] == 0){
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
        <title>My Scam Reports - Tesla INU</title>
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
                        <h2 class="mb-3 me-auto">My Scam Reports</h2>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">My Reports</h4>
                                    <scam class="card-title-desc">Here you can find all scams you have submitted.</scam>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="display" style="min-width: 845px;">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Scam ID</th>
                                                    <th>Scammer Name</th>
                                                    <th>Scammer Email</th>
                                                    <th>Scammer Phone</th>
                                                    <th>Scammer Telegram Id</th>
                                                    <th>Scammer Telegram Bio</th>
                                                    <th>Crypto currency demanded</th>
                                                    <th>Wallet Address</th>
                                                    <th>Website</th>
                                                    <th>Other Info</th>
                                                    <th>Admin Approval</th>
                                                    <th>Active Mining</th>
                                                    <th>Mining Result</th>
                                                    <th>Report Date</th>

                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                          $query1 = "SELECT * FROM `scams` WHERE `reported_by` = $user_id ORDER BY `id` DESC";                                             
                                          $runquery1 = mysqli_query($con, $query1);                                             
                                          $rows1 = mysqli_num_rows($runquery1);
                                          $indexing1 = 1;
                                          if ($rows1 >
                                                0 && $runquery1 == TRUE) { while ($data1 = mysqli_fetch_assoc($runquery1)) { ?>
                                                <tr>
                                                    <td><?php echo $indexing1; ?></td>
                                                    <td><?php echo $data1['id']; ?></td>
                                                    <td><?php echo $data1['name']; ?></td>
                                                    <td><?php echo $data1['email']; ?></td>
                                                    <td><?php echo $data1['phone']; ?></td>
                                                    <td><?php echo $data1['telegram_id']; ?></td>
                                                    <td><?php echo $data1['telegram_bio']; ?></td>
                                                    <td><?php echo $data1['crypto_currency_demanded']; ?></td>
                                                    <td><?php echo $data1['wallet_address']; ?></td>
                                                    <td><?php echo $data1['website']; ?></td>
                                                    <td><?php echo $data1['other_information']; ?></td>
                                                    <td>
                                                        <?php if($data1['superadmin_approval'] == 1){
                                                        ?>
                                                        <span class="badge badge-success light">Approved</span>
                                                        <?php
                                                    }else{
                                                        ?>
                                                        <span class="badge badge-danger light">No Approved</span>
                                                        <?php
                                                            }
                                                    ?>
                                                    </td>
                                                    <td>
                                                        <?php if($data1['is_active'] == 1){
                                                        ?>
                                                        <span class="badge badge-success light">Active</span>
                                                        <?php
                                                    }else{
                                                        ?>
                                                        <span class="badge badge-danger light">Not Active</span>
                                                        <?php
                                                            }
                                                    ?>
                                                    </td>
                                                    <td>
                                                        <?php if($data1['mining_result'] == 1){
                                                        ?>
                                                        <span class="badge badge-success light">Verified</span>
                                                        <?php
                                                    }else{
                                                        ?>
                                                        <span class="badge badge-danger light">Not Verified</span>
                                                        <?php
                                                            }
                                                    ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                   $mydate=getdate($data1['timestamp']);
                                                   echo "$mydate[mday]/$mydate[mon]/$mydate[year] ";
                                                   echo " "."$mydate[hours]:$mydate[minutes]";
                                                ?>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="view-scam.php?id=<?php echo $data1['id']; ?>" class="btn btn-success shadow btn-xs sharp me-1"><i class="fas fa-eye"></i></a>
                                                            <!-- <a href="edit/edit-scam.php?id=<?php echo $data1['id']; ?>" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pen"></i></a>
                                                            <a href="delete/delete-scam.php?id=<?php echo $data1['id']; ?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a> -->
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
                                                $indexing1++;
                                             }}
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php require('../elements/footer.php');?>
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
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
