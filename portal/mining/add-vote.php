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
    ///check for already voted

    $query    = "SELECT * FROM `votes` WHERE `voter_id` = '$user_id' AND `scam_id` = '$scam_id'";
    $run_fetch = mysqli_query($con, $query);
    $no_of_row  = mysqli_num_rows($run_fetch);
    if($no_of_row != 0){
        ?>
        <script>
            window.location = '../mining/already-voted.php?id=<?php echo $scam_id; ?>&vote=<?php echo $vote; ?>';
        </script>
        <?php
    }

}else{
    ?>
<script>
    window.location = '../mining/scam-mining.php';
</script>
    <?php
}

   ?>
   <?php 
   if (isset($_POST['add_vote'])) {

    $voter_id = $user_id;
    $scam_id = $scam_id;
    $vote = $_POST['vote'];
    $vote_description = $_POST['vote_description'];
    $timestamp = time();


//check for limit exeed
$user_query = "SELECT `votes_count` FROM `scams` WHERE `id` = $scam_id";
$run_fetch = mysqli_query($con, $user_query);
$no_of_row  = mysqli_num_rows($run_fetch);
if ($no_of_row >0 && $run_fetch == TRUE){
    while ($data1 = mysqli_fetch_assoc($run_fetch)) {
        $votes_count = $data1['votes_count'];
    }
}

if($votes_count < 101){
    //checking for already voted
    $query    = "SELECT * FROM `votes` WHERE `voter_id` = '$user_id' AND `scam_id` = '$scam_id'";
    $run_fetch = mysqli_query($con, $query);
    $no_of_row  = mysqli_num_rows($run_fetch);
    if($no_of_row == 0){
       
         
    $query = "INSERT INTO `votes`(`id`, `voter_id`, `scam_id`, `vote`,
    `vote_description`, `timestamp`) VALUES (NULL,$voter_id,$scam_id,$vote,'$vote_description',$timestamp)";


   if ($con->query($query) === true) {

    //increase vote count in scam database

   
        $votes_count++;
        $query2 = "UPDATE `scams` SET `votes_count`=$votes_count WHERE `id` = $scam_id";
    
    
       if ($con->query($query2) === true) {

       }




    ?>
<script>
    window.location = '../mining/vote-submitted.php';
</script>
    <?php

    //thank you page for verifying

   }
    }
   


   }else{
    ?>
<script>
    window.location = '../mining/vote-limit-exceed.php'
</script>
    <?php
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
        <title>Add Vote - Tesla INU</title>
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
                                            <i onclick="voteIconChange(1);" id="thumb_up_color" class="fas fa-thumbs-up" style="display:none; font-size: 150px; color: #68e365 !important; cursor: pointer;"></i>
                                            <i onclick="voteIconChange(0);" id="thumb_down_color" class="fas fa-thumbs-down" style="display:none; font-size: 150px; color: #f72b50 !important; cursor: pointer;"></i>
                                            <i onclick="voteIconChange(1);" id="thumb_up_no_color" class="far fa-thumbs-up" style="display:none; font-size: 20px; color: #68e365 !important; cursor: pointer;"></i>
                                            <i onclick="voteIconChange(0);" id="thumb_down_no_color" class="far fa-thumbs-down" style="display:none; font-size: 20px; color: #f72b50 !important; cursor: pointer;"></i>
                                        </div>
                                        <div class="col-12">
                                            <p class="text-muted pt-2">You are verifying this scam as <span id='verifying_scam_true_false_text'></span></p>

                                            <br>

                                           <u> <a class="text-primary" href="../scam/view-scam.php?id=<?php echo $scam_id; ?>">View Details</a></u>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mt-5">
                                            <form action="" method="POST">
                                                <input type="hidden" id="vote_input_hidden" name="vote">
                                                <h4 class="my-4">Describe your vote</h4>
                                                <textarea class="form-control" style="height: 100px;" name="vote_description" id="comment" spellcheck="false" placeholder="Enter Bio of scammer telegram account"></textarea>
                                                <div class="row">
                                        <div class="col-12 mt-4">
                                            <button type="submit" name="add_vote" href="../mining/scam-mining.php" class="btn my-2 btn-primary btn-lg px-4"><i class="fa fa-usd"></i> Submit Vote</button>
                                        </div>
                                    </div>
                                            </form>
                                        </div>
                                    </div>
                                   
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

<script>

var vote = <?php echo $vote; ?>; //pass php variable here

var get_thumb_up_color = document.getElementById('thumb_up_color');
var get_thumb_down_color = document.getElementById('thumb_down_color');
var get_thumb_up_no_color = document.getElementById('thumb_up_no_color');
var get_thumb_down_no_color = document.getElementById('thumb_down_no_color');
var get_verifying_scam_true_false_text = document.getElementById('verifying_scam_true_false_text');
var get_vote_input_hidden = document.getElementById('vote_input_hidden');
function voteIconChange(vote){
if(vote == 1){
    get_thumb_up_color.style.display = 'inline-block';
    get_thumb_down_no_color.style.display = 'inline-block';
    get_thumb_down_color.style.display = 'none';
    get_thumb_up_no_color.style.display = 'none';
    get_verifying_scam_true_false_text.innerHTML = 'true';
    get_vote_input_hidden.value = 1;
}else{
    get_thumb_down_color.style.display = 'inline-block';
    get_thumb_up_no_color.style.display = 'inline-block';
    get_thumb_up_color.style.display = 'none';
    get_thumb_down_no_color.style.display = 'none';
    get_verifying_scam_true_false_text.innerHTML = 'false';
    get_vote_input_hidden.value = 0;

}


}

voteIconChange(vote);
</script>