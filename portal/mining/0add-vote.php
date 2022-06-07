<?php
session_start();
require_once '../database/db-con.php';
?>

<?php
   if (isset($_SESSION['user_session_var'])) {
       $user_id = $_SESSION['user_session_var'];
   
       $user_query = "SELECT * FROM `users` WHERE `id` = $user_id";
       $run_fetch = mysqli_query($con, $user_query);
       $user_data = mysqli_fetch_assoc($run_fetch);

       if($user_data['email_verification'] == 0){
        echo "<script>window.location='../utility/email-not-verified.php';</script>";
    }
   }else {
       ?>
<script>
   alert('Please Login');
   window.location='../login.php';
</script>
<?php
   }
?>
<?php 
if ($_GET['id']) {
   $report_id = $_GET['id'];

   $query2 = "SELECT * FROM `votes` WHERE `report_id` = $report_id AND `voter_id` = $user_id";
   $run_fetch2 = mysqli_query($con, $query2);
   $noofrow2 = mysqli_num_rows($run_fetch2);
   if ($noofrow2 > 0) {
      ?>
         <script>
            alert("You've already voted to this");
            window.history.back();
         </script>
      <?php
   }
}else {
   ?>
      <script>
         window.history.back();
      </script>
   <?php
}
?>
<?php
if (isset($_POST['sumbmit_vote'])) {
    $vote = $_POST['vote'];
    $vote_description = $_POST['description'];

    $date = date_create();
    $timestamp = date_timestamp_get($date);

    $query = "INSERT INTO `votes`(`id`, `voter_id`, `report_id`, `vote`, `vote_description`, `timestamp`) VALUES (NULL,$user_id,$report_id,$vote,'$vote_description',$timestamp)";
    if ($con->query($query) === TRUE) {
          $vote_true = 0;
          $vote_false = 0;

      
       $query3 = "SELECT * FROM `votes` WHERE `report_id` = $report_id";
       $run_fetch3 = mysqli_query($con, $query3);
       $noofrow3 = mysqli_num_rows($run_fetch3);
       
       // Condition $noofrow3 == 100 || $noofrow3 > 100
       if ($noofrow3 == 2 || $noofrow3 > 2) {

         //  $data3 = mysqli_fetch_assoc($run_fetch3);
          
          $query4 = "SELECT * FROM `votes` WHERE `report_id` = $report_id AND `vote` = 1";
          $run_fetch4 = mysqli_query($con, $query4);
          $noofrow4 = mysqli_num_rows($run_fetch4);
          if ($noofrow4 > 0) {
            while($data4 = mysqli_fetch_assoc($run_fetch4)){

               $vote_true++;
            }
          }
          

          
          $query5 = "SELECT * FROM `votes` WHERE `report_id` = $report_id AND `vote` = 0";
          $run_fetch5 = mysqli_query($con, $query5);
          $noofrow5 = mysqli_num_rows($run_fetch5);
          if ($noofrow5 > 0) {
            while($data5 = mysqli_fetch_assoc($run_fetch5)){

               $vote_false++;
            }
          }  
         ?>
         <script>
            alert("True Votes : <?php echo $vote_true ?> False Vote : <?php echo $vote_false ?>")
         </script>
         <?php
         // Condition $vote_true == 50 && $vote_false == 50
          if ($vote_true == 1 && $vote_false == 1) {
             // Condition $vote_true == 51 || $vote_true > 50 || $vote_false == 51 || $vote_false > 50
          }elseif ($vote_true == 2 || $vote_false == 2) {
            
            $query6 = "UPDATE `reports` SET `status`= 0 WHERE `id` = $report_id";
            if ($con->query($query6) === TRUE) {
               // Condition $vote_true == 51 || $vote_true > 50
               if($vote_true == 2){

                  // Generate Token
                  $token = "TESLA_TSIT_TOKEN".rand(11111,99999);
                  $query7 = "INSERT INTO `report_tokens`(`id`, `report_id`, `token`, `timestamp`) VALUES (NULL,$report_id,'$token',$timestamp)";
                  if ($con->query($query7) === TRUE) {
                     
                  }

               }
            }else {
               echo "Error : ".$con->error. "<br> Query : ". $query6;
            }
          }

          
       }

        ?>
            <script>
                alert('Vote Submitted Succesfully');
                window.location='index.php';
            </script>
        <?php
    }else {
        echo "Error : ".$con->error. "<br> Query : ". $query;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Griya : Real Estate Admin" />
	<meta property="og:title" content="Griya : Real Estate Admin" />
	<meta property="og:description" content="Griya : Real Estate Admin" />
	<meta property="og:image" content="page-error-404.html" />
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	<title>Tesla INU | User - Add Vote</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="../assets/images/favicon.png" />
	<link href="../assets/../assets/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
	<link rel="stylesheet" href="../assets/../assets/vendor/dotted-map/css/contrib/jquery.smallipop-0.3.0.min.css" type="text/css" media="all" />
	<!-- Style css -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <style>
.wrapper{
  width: 120px;
  height: 80px;
  background-color: #fff;
  /* border-radius: 4px;
  box-shadow: 0px 0px 5px rgba(0,0,0,.2); */
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.radio_group{
  width: 50px;
  height: 50px;
  position: relative;
  text-align: center;
  line-height: 50px;
  font-size: 40px;
}
.radio_group input[type="radio"]{
  opacity: 0;
  width: 100%;
  height: 100%;
  position: absolute;
  left: 0px;
  top: 0px;
  margin: 0;
  padding: 0;
  z-index: 1;
  cursor: pointer;
}
.radio_group input[type="radio"] + label{
  color: #95a5a6;
  width: 100%;
  height: 100%;
  position: absolute;
  left: 0;
  top: 0;
  transform: scale(.8);
}
.radio_group input[type="radio"]:checked + label{
  color:#3498db;
  transform: scale(1.1);
}
</style>
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

        <!--**********************************
            Sidebar start
        ***********************************-->
        <?php require('../elements/sidebar.php');?>
        <!--**********************************
            Sidebar end
        ***********************************-->
		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="mb-sm-4 d-flex flex-wrap align-items-center text-head">
					<h2 class="mb-3 me-auto">Add Vote</h2>
					<div>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.php">User</a></li>
							<li class="breadcrumb-item active"><a href="javascript:void(0)">Add Scam</a></li>
						</ol>
					</div>
				</div>	
                <div class="row">
                     <div class="col-lg-12">
                        <div class="card">
                           <div class="card-body">
                              <h4 class="card-title">Add Vote</h4>
                              <p class="card-title-desc">Here you can Add your Vote</code>
                              <form action="" method="post">
                                 <div class="row mb-4 mt-5">
                                    <label for="projectname" class="col-form-label col-lg-2">Vote</label>
                                    <div class="col-lg-10 d-flex">
                                        <div class="wrapper">
                                            <div class="radio_group mb-3">
                                                <input type="radio" name="vote" value="1">
                                                <label for="like">
                                                    <i class="fas fa-thumbs-up"></i>
                                                </label>
                                            </div>
                                            <div class="radio_group mb-3">
                                                <input type="radio" name="vote" value="0">
                                                <label for="like">
                                                    <i class="fas fa-thumbs-down"></i>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                 </div>
                                 <div class="row mb-4">
                                    <label for="projectdesc" class="col-form-label col-lg-2">Description</label>
                                    <div class="col-lg-10">
                                       <textarea class="form-control" id="projectdesc" rows="5" name="description" placeholder="Enter Scam Description..." required></textarea>
                                    </div>
                                 </div>
                                 <button type="submit" class="btn btn-primary" name="sumbmit_vote">Submit Vote</button>
                                 <button type="reset" class="btn btn-danger">Clear</button>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
		
		
		
        <!--**********************************
            Footer start
        ***********************************-->
        <?php require('../elements/footer.php');?>
        <!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->
		
        <!--**********************************
           Support ticket button end
        ***********************************-->


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
    <!-- <script>
        .btn:not(.active){
            cursor: pointer;
        }
    </script> -->

</body>
</html>