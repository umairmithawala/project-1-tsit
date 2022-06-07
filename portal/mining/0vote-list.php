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
	<title>Tesla INU | User - Scam List</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="../assets/images/favicon.png" />
	<link href="../assets/../assets/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
	<link rel="stylesheet" href="../assets/../assets/vendor/dotted-map/css/contrib/jquery.smallipop-0.3.0.min.css" type="text/css" media="all" />
	<!-- Style css -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <!-- Datatable -->
    <link href="../assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
	
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
					<h2 class="mb-3 me-auto">Scam List</h2>
					<div>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.php">User</a></li>
							<li class="breadcrumb-item"><a href="javascript:void(0)">Scam List</a></li>
						</ol>
					</div>
				</div>	
				<div class="row">
					<div class="col-xl-12 col-sm-6">
						<div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Scam List</h4>
                                <scam class="card-title-desc">Here you can see Scams</scam>
                            </div>
                            <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display">
                                 <thead>
                                    <tr>
                                       <th>ID</th>
                                       <th>Title</th>
                                       <th>description</th>
                                       <th>Document</th>
                                       <th>Upload date</th>
                                       <th>Status</th>
                                       <th>Actions</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                     <?php
                                    $query = "SELECT * FROM `votes` WHERE `voter_id` = $user_id";
                                    $run_fetch = mysqli_query($con, $query);
                                    $noofrow = mysqli_num_rows($run_fetch);
                                    if ($noofrow > 0 && $run_fetch == TRUE) {
                                        while ($data = mysqli_fetch_assoc($run_fetch)) {?>
                                    <tr>
                                         <td><?php echo $data['id']; ?></td>
                                         <td><?php echo $data['title']; ?></td>
                                         <td><?php echo $data['description']; ?></td>
                                         <td><a href="../uploads/scam-documents/<?php echo $data['document'];?>" download><i class="fas fa-download"></i>   Download</a></td>
                                         <td>
                                            <?php
                                                $mydate=getdate($data['timestamp']);
                                                echo "$mydate[mday]/$mydate[mon]/$mydate[year]";
                                            ?>
                                        </td>
                                        <td>

                                            <?php
                                            $report_status = $data['status'];
                                                if ($report_status == 1) {
                                                    echo "Active";
                                                }else {
                                                    echo "Deactive";
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $scam_id = $data['id'];
                                            $query2 = "SELECT * FROM `votes` WHERE `report_id` = $scam_id AND `voter_id` = $user_id";
                                            $run_fetch2 = mysqli_query($con, $query2);
                                            $noofrow2 = mysqli_num_rows($run_fetch2);
                                            if ($noofrow2 > 0) {
                                                $data2 = mysqli_fetch_assoc($run_fetch2);
                                                $vote = $data2['vote'];
                                                if ($vote == 1) {
                                                    ?>
                                                        <span class="text-mute mx-2">You've Voted True!</span>

                                                    <?php
                                                }elseif ($vote == 2) {
                                                    ?>
                                                        <span class="text-mute mx-2">You've Voted False!</span>
                                                    <?php
                                                }
                                            }else {
                                                ?>
                                                    <a href="add-vote.php?id=<?php echo $data['id'];?>" class="mx-2" title="Submit Vote"><i class="fas fa-vote-yea"></i></a>
                                                <?php
                                            }
                                            ?>
                                                    <a href="../scam-detail.php?id<?php echo $data['id']?>" class="mx-2" title="View Details"><i class="fas fa-eye"></i></a>
                                        </td>
                                     </tr>
                                     <?php 
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

    <!-- Datatable -->
    <script src="../assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/plugins-init/datatables.init.js"></script>
</body>

</html>