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
   ?>
 
 <?php
if (isset($_GET['id']) && isset($_GET['vote'])) {
    $scam_id = $_GET['id'];
    $vote = $_GET['vote'];

    $query    = "SELECT * FROM `votes` WHERE `voter_id` = '$user_id' AND `scam_id` = '$scam_id'";
    $run_fetch = mysqli_query($con, $query);
    $no_of_row  = mysqli_num_rows($run_fetch);
    if ($no_of_row >0 && $run_fetch == TRUE){
            while ($data1 = mysqli_fetch_assoc($run_fetch)) {
                $vote= $data1['vote'];
                $vote_description = $data1['vote_description'];
            }
        }
    else{
        ?>
    <script>
        window.history.back();
    </script>
        <?php
    }
}else{
    ?>
<script>
    window.history.back();
</script>
    <?php
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
        <title>Already Voted - Tesla INU</title>
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
                                    <div class="row">
                                        <div class="col-12">
                                            <i onclick="voteIconChange(1);" id="thumb_up_color" class="fas fa-clipboard-check" style="font-size: 150px; color: #68e365 !important; cursor: pointer;"></i>
                                            
                                        </div>
                                        <div class="col-12">
                                            

                                            <br>

                                        </div>
                                    </div>
                                    <h4 class="my-4">You have already voted this scam</h4>

                                    <h6>You verified this scam as 
                                    <?php 
                                    

                                    if($vote == 1){
                                        echo 'true';
                                    }else{
                                        echo 'false';
                                    }
                                    ?>
                                    true.</h6>
                                    <p><?php echo $vote_description; ?></p>

                                    <a  href="../mining/scam-mining.php" class="btn my-2 btn-primary btn-lg px-4"><i class="fa fa-usd"></i> Mine New Scams</a>
                               
                                   
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

    </body>
</html>