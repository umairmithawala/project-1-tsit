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

<?php
   if (!empty($_GET['id'])) {
       $scam_id = $_GET['id'];
   } else {
   ?>
<script>
   window.history.back();
</script>
<?php
   }
   ?>

<?php if (isset($_POST['submit_pos'])) {

        $user_id = $user_id;
        $scam_id = $_POST['scam_id'];

//get files 

//uploading multiple files of chat screenshot 


if ($_FILES['pos_files']['name'] != '') {
    $file_names = '';   

    $total = count($_FILES['pos_files']['name']);
    if($total < 10){
    for ($i = 0; $i < $total; $i++) {
        $filename = $_FILES['pos_files']['name'][$i]; // Get the Uploaded file Name.
        $extension = pathinfo($filename, PATHINFO_EXTENSION); //Get the Extension of uploded file

        $valid_extensions = array("png","jpg","jpeg","gif");

        if (in_array($extension, $valid_extensions)) {
            // check if upload file is a valid image file.
            $timestamp = time();
            $new_name = $timestamp . "proof_of_scam" . rand() . "." . $extension;
            $path = "../uploads/scam/pos/" . $new_name;

            move_uploaded_file($_FILES['pos_files']['tmp_name'][$i], $path);

            $file_names .= $new_name . " , ";
            $pos_files = $file_names;
        } else {
            echo '';
        }
    }
}else{
    echo "<script>alert('We exited maximum file upload limit');</script>";
}
}

      


    $timestamp = time();

    $query10 = "DELETE FROM `pos` WHERE `user_id` = $user_id AND `scam_id` = $scam_id AND `proof_of` = 'scammer other information'";
    if ($con->query($query10) === true) {}

    $query = "INSERT INTO `pos`(`id`, `user_id`, `scam_id`, `proof_of`, 
    `file_name`, `timestamp`) VALUES (NULL,$user_id,$scam_id,'scammer other information','$pos_files',$timestamp);";


    if ($con->query($query) === true) {
        

        ?>
<script>
    window.location = '../scam/pos-submitted.php?id=<?php echo $scam_id; ?>';
</script>

<?php
    } else{
// echo "Error: " . $query . "<br>" . $con->error;
    }
} ?>

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
        <title>POS Scammer Other Information- Tesla INU</title>
        <!-- FAVICONS ICON -->
        <link rel="shortcut icon" type="image/png" href="../assets/images/favicon.png" />
        <link href="../assets/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet" />
        <link rel="stylesheet" href="../assets/vendor/dotted-map/css/contrib/jquery.smallipop-0.3.0.min.css" type="text/css" media="all" />
        <!-- Style css -->
        <link href="../assets/css/style.css" rel="stylesheet" />
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
                        <h2 class="mb-3 me-auto">Scammer Other InformationPOS</h2>
                       
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Upload Scammer Other InformationProof</h4>
                                    <scam class="card-title-desc">Here you can Add Your POS(Proof Of Scam)</scam>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form action="" method="POST" enctype="multipart/form-data">
                                   
<input type="hidden" value="<?php echo $scam_id; ?>" name="scam_id">
                                            <div class="row mt-3">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="" class="text-white">Upload POS</label>
                                                        <div class="form-file">
                                                            <input type="file" name="pos_files[]" class="form-file-input form-control" multiple accept="image/x-png,image/gif,image/jpeg" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3"></div>

                                               
                                            </div>
                                            <br>
                                            <br>
                                            <br>
                                        <h5>Notes</h5>
                                        <br>
                                        <p>You can only upload PNG,JPEG, and GIF files.</p>
                                        <p>Do not upload fake POS else your account will block.</p>
                                        <p>You can only upload maximum of 10 images.</p>
                                            <div class="mb-3 row">
                                                <div class="col-sm-12">
                                                    <button type="submit" name="submit_pos" class="btn btn-primary" style="float: right;">Add</button>
                                                </div>
                                            </div>
                                        </form>


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
    </body>
</html>
<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>

