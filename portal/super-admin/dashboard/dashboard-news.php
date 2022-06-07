<?php
session_start();
require_once '../../database/db-con.php';
?>
<?php
if (isset($_SESSION['admin_session_var'])) {
    $user_id = $_SESSION['admin_session_var'];
} else {
    header('location:../../auth/login.php');
}
$user_query = "SELECT * FROM `users` WHERE `id` = $user_id";
$run_fetch = mysqli_query($con, $user_query);
$user_data = mysqli_fetch_assoc($run_fetch);
if ($user_data['email_verification'] == 0) {
    echo "<script>window.location='../utility/email-not-verified.php';</script>";
}
?>
<?php

if(isset($_POST['add_news'])){
    // INSERT INTO `dashboard_news`(`id`, `title`, `added_by`, `is_deleted`, `timestamp`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]')
    //get the news title
    $news_title = $_POST['news_title'];
    $added_by = $user_id;
    $is_deleted = 0;
    $timestamp = time();

    $insert_news_query = "INSERT INTO `dashboard_news`(`title`, `added_by`, `is_deleted`, `timestamp`) VALUES ('$news_title','$added_by','$is_deleted','$timestamp')";
    $run_insert_news = mysqli_query($con, $insert_news_query);
    if($run_insert_news){
        echo "<script>alert('News Added Successfully');</script>";
    }else{
        echo "<script>alert('News Not Added');</script>";
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
    <title>Dashboard News - Tesla INU</title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="../../assets/images/favicon.png" />
    <link href="../../assets/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet" />
    <link rel="stylesheet" href="../../assets/vendor/dotted-map/css/contrib/jquery.smallipop-0.3.0.min.css" type="text/css" media="all" />
    <!-- Style css -->
    <link href="../../assets/css/style.css" rel="stylesheet" />

    <!-- Datatable -->
    <link href="../../assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet" />
    <!-- Custom Stylesheet -->
    <link href="../../assets/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet" />
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
                    <h2 class="mb-3 me-auto">Users List</h2>
                </div>
                <div class="row">
                    <div class="col-xl-8 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">News</h4>
                                <scam class="card-title-desc">Here you can see all updates and news for dashboard</scam>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Date</th>
                                              
                                                <th>Action</th>
                                               




                                                <!-- <th>Action</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query1 = "SELECT * FROM `dashboard_news` WHERE `is_deleted` = 0";
                                            $runquery1 = mysqli_query($con, $query1);
                                            $rows1 = mysqli_num_rows($runquery1);
                                            $indexing1 = 1;
                                            if ($rows1 > 0 && $runquery1 == TRUE) {
                                                while ($data1 = mysqli_fetch_assoc($runquery1)) {
                                            ?>
                                                    <tr>
                                                        <td><?php echo $indexing1; ?></td>
                                                        
                                                        <td><?php echo $data1['title']; ?></td>
                                                        <td><?php 
                                                        
                                                        $date = $data1['timestamp']; 
                                                        //convert date to readable format
                                                        $date = date('d-m-Y', $date);
                                                        echo $date;
                                                        
                                                        ?></td>
                                                        <td>
                                                            <a href="delete/delete-dashboard-news.php?id=<?php echo $data1['id']; ?>"><span class="fas fa-trash text-danger"></span></a>
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
                    <div class="col-xl-4">
                         <!-- send section -->
                  <div class="card">
                     <div class="card-header">
                        <h4 class="card-title">Add News</h4>
                     </div>
                     <div class="card-body">
                        <div class="basic-form">
                           <form action="" method="POST">
                              <input type="hidden" name="transaction_fees">
                              <div class="mb-3">
                                 <label for="" class="text-white">Title</label>
                                 <input type="text" name="news_title" class="form-control input-default" placeholder="Please enter dashboard news title" required />
                                 
                              </div>
                             
                              <div class="mb-3 mt-3 pt-3">
                                 <button type="submit" name="add_news" class="btn btn-primary btn-block">Add News</button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
                    </div>
                </div>
            </div>
            <?php require('../elements/footer.php'); ?>
        </div>
    </div>
    <script src="../../assets/vendor/global/global.min.js"></script>
    <script src="../../assets/vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="../../assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
    <!-- Apex Chart -->
    <script src="../../assets/vendor/apexchart/apexchart.js"></script>
    <!-- Chart piety plugin files -->

    <script src="../../assets/vendor/peity/jquery.peity.min.js"></script>
    <!-- Dashboard 1 -->
    <script src="../../assets/js/dashboard/dashboard-1.js"></script>
    <!-- JS for dotted map -->
    <script src="../../assets/vendor/dotted-map/js/contrib/jquery.smallipop-0.3.0.min.js"></script>
    <script src="../../assets/vendor/dotted-map/js/contrib/suntimes.js"></script>
    <script src="../../assets/vendor/dotted-map/js/contrib/color-0.4.1.js"></script>
    <script src="../../assets/vendor/dotted-map/js/world.js"></script>
    <script src="../../assets/vendor/dotted-map/js/smallimap.js"></script>
    <script src="../../assets/js/dashboard/dotted-map-init.js"></script>
    <script src="../../assets/js/custom.min.js"></script>
    <script src="../../assets/js/deznav-init.js"></script>
    <script src="../../assets/js/demo.js"></script>
    <!-- <script src="../../assets/js/styleSwitcher.js"></script> -->

    <!-- Datatable -->
    <script src="../../assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../../assets/js/plugins-init/datatables.init.js"></script>
    <script src="../../assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
</body>

</html>
<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>