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
       $id = $_GET['id'];
       $query = "SELECT reports.*,users.* FROM `reports` INNER JOIN users ON reports.reporter_id = users.id WHERE reports.id = $id";
       $run_fetch = mysqli_query($con, $query);
       $noofrow = mysqli_num_rows($run_fetch);
       if ($noofrow > 0 && $run_fetch == TRUE) {
           $data = mysqli_fetch_assoc($run_fetch);
       }else {
           ?>
            <script>
            alert("Something went wrong");
            window.histroy.back();
            </script>
        <?php
        }
   
   }else {
   ?>
        <script>
            window.histroy.back();
        </script>
    <?php
   }
   ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	
	<!-- PAGE TITLE HERE -->
	<title>Tesla INU | User - Scam Detail</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="../assets/images/favicon.png" />
	<link href="../assets/../assets/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
	<link rel="stylesheet" href="../assets/../assets/vendor/dotted-map/css/contrib/jquery.smallipop-0.3.0.min.css" type="text/css" media="all" />
	<!-- Style css -->
    <link href="../assets/css/style.css" rel="stylesheet">
	
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
					<h2 class="mb-3 me-auto">Scam Detail</h2>
					<div>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.php">User</a></li>
							<li class="breadcrumb-item"><a href="javascript:void(0)">Scam Detail</a></li>
						</ol>
					</div>
				</div>	
                <div class="row">
                <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
								<div class="post-details">
									<h3 class="mb-2 text-black"><?php echo $data['title'] ?></h3>
									<ul class="mb-4 post-meta d-flex flex-wrap">
										<li class="post-author me-3">Scam reported By <?php echo $data['first_name'] ?> <?php echo $data['last_name'] ?></li>
										<li class="post-date me-3"><i class="far fa-calendar-plus me-2"></i>
                                            <?php
                                                $mydate=getdate($data['timestamp']);
                                                echo "$mydate[mday]/$mydate[mon]/$mydate[year]";
                                            ?>
                                        </li>
									</ul>
                                    <div class="d-flex justify-content-between">
                                        <img src="../uploads/scam-documents/<?php echo $data['image']?>" alt="" class="img-fluid mb-3 w-50 rounded">
                                        <p class="mx-5"><?php echo $data['description'] ?></p>
                                    </div>
                                    <br>
                                    <h3>Important Details :</h3>
                                    <?php 
                                        if ($data['scammer_detail']!=NULL) {
                                            ?>
                                                <span>Scammer Detail : <?php echo $data['scammer_detail'] ?></span>
                                            <?php
                                        }
                                    ?>
                                    <br>
                                    <br>
                                    <?php
                                        if ($data['scammer_img']!=NULL) {
                                            ?>
                                                <span>Scammer Image :     <img src="../uploads/scam-documents/<?php echo $data['scammer_img'] ?>" clas="img-fluid rounded-circle" style="border-radius: 50%!important;" height="35" alt=""></span>
                                            <?php
                                        }
                                    ?>
                                    <br>
                                    <br>
                                    <?php
                                        if ($data['wallet_address']!=NULL) {
                                            ?>
                                                <span>Wallet Address : <?php echo $data['wallet_address'] ?></span>
                                            <?php
                                        }
                                    ?>
                                    <br>
                                    <br>
                                    <?php
                                        if ($data['scammer_website']!=NULL) {
                                            ?>
                                                <span>Scammer Website : <?php echo $data['scammer_website'] ?></span>
                                            <?php
                                        }
                                    ?>
                                    <br>
                                    <br>
                                    <?php
                                        if ($data['other_detail']!=NULL) {
                                            ?>
                                                <span>Other Detail : <?php echo $data['other_detail'] ?></span>
                                            <?php
                                        }
                                    ?>
									<div class="profile-skills mt-5 mb-5">
										<h4 class="text-primary mb-2">Downloads</h4>
										<a href="../uploads/scam-documents/<?php echo $data['document']?>" download class="btn btn-primary light btn-xs mb-1"> <i class="fas fa-download"></i> Document</a>
									</div>

                                    <div class="d-flex justify-content-end">
                                        <a href="javascript:void(0);" onclick="returnBack()" class="btn btn-link"> <i class="fas fa-undo-alt"></i> Back</a>
                                    </div>
								</div>
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
    <script>
        function returnBack(){
            window.history.back();
        }
    </script>

</body>
</html>