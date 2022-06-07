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


<?php if (isset($_POST['report_scam'])) {

        $reporter_id = $user_id;

        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $telegram_id = $_POST['telegram_id'];
        $telegram_bio = $_POST['telegram_bio'];
        $crypto_currency_demanded = $_POST['crypto_currency_demanded'];
        $wallet_address = $_POST['wallet_address'];
        $website = $_POST['website'];
        $other_information = $_POST['other_information'];
        $profile_image = "scammer-profile-img.png";
        $screenshot_of_chat = "";
        $timestamp = time();

        // checking for scammer profile image upload 
        
      
            if($_FILES['profile_image']['name'] != ''){
      
               $file_name = '';
               $filename = $_FILES['profile_image']['name'];// Get the Uploaded file Name.
                   $extension = pathinfo($filename,PATHINFO_EXTENSION); //Get the Extension of uploded file
           
                   $valid_extensions = array("png","jpg","jpeg","gif");
           
                   if(in_array($extension, $valid_extensions)){ // check if upload file is a valid image file.
                     $timestamp = time();
                     $new_name = $user_id."scammer_image".$timestamp."akc".rand().".". $extension;
                     $path = "../uploads/scam/scam-documents/" . $new_name;
           
                       move_uploaded_file($_FILES['profile_image']['tmp_name'], $path);
           
                       $profile_image = $new_name;
                   }
               
             
           }else{
                       echo "";
                   }
      
        
                   //uploading multiple files of chat screenshot 


                   if ($_FILES['screenshot_of_chat']['name'] != '') {
                    $file_names = '';
                
                    $total = count($_FILES['screenshot_of_chat']['name']);
                    if($total < 20){
                    for ($i = 0; $i < $total; $i++) {
                        $filename = $_FILES['screenshot_of_chat']['name'][$i]; // Get the Uploaded file Name.
                        $extension = pathinfo($filename, PATHINFO_EXTENSION); //Get the Extension of uploded file
                
                        $valid_extensions = array("png","jpg","jpeg","gif");
                
                        if (in_array($extension, $valid_extensions)) {
                            // check if upload file is a valid image file.
                            $timestamp = time();
                            $new_name = $timestamp . "scam_chat_ss" . rand() . "." . $extension;
                            $path = "../uploads/scam/scam-documents/" . $new_name;
                
                            move_uploaded_file($_FILES['screenshot_of_chat']['tmp_name'][$i], $path);
                
                            $file_names .= $new_name . " , ";
                            $screenshot_of_chat = $file_names;
                        } else {
                            echo '';
                        }
                    }
                }else{
                    echo "<script>alert('We exited maximum file upload limit');</script>";
                }
            }


    $query = "INSERT INTO `scams`(`id`, `reported_by`, `name`, `email`, `phone`, `telegram_id`, 
    `telegram_bio`, `crypto_currency_demanded`, `wallet_address`, `website`, `other_information`, 
    `profile_image`, `screenshot_of_chat`, `timestamp`) VALUES (NULL,$reporter_id,'$name','$email','$phone',
    '$telegram_id','$telegram_bio','$crypto_currency_demanded','$wallet_address','$website','$other_information',
    '$profile_image','$screenshot_of_chat',$timestamp)";


    if ($con->query($query) === true) {

        ?>

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
        <title>Report Scam - Tesla INU</title>
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
                        <h2 class="mb-3 me-auto">Report New Scam</h2>
                       
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Report Scam</h4>
                                    <scam class="card-title-desc">Here you can Add Scam</scam>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-sm-6 py-2">
                                                    <label class="col-form-label text-white">Name</label>
                                                    <input type="text" name="name" class="form-control" placeholder="Enter scammer name" />
                                                </div>
                                                <div class="col-sm-6 py-2">
                                                    <label class="col-form-label text-white">Email</label>
                                                    <input type="email" name="email" class="form-control" placeholder="Enter scammer email" />
                                                </div>
                                                <div class="col-sm-6 py-2">
                                                    <label class="col-form-label text-white">Contact Number</label>
                                                    <input type="phone" name="phone" class="form-control" placeholder="Enter scammer contact number" />
                                                </div>
                                                <div class="col-sm-6 py-2">
                                                    <label class="col-form-label text-white">Telegram ID</label>
                                                    <input type="text" name="telegram_id" class="form-control" placeholder="Enter scammer telegram id" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 py-2">
                                                    <label class="col-form-label text-white">Telegram Bio</label>
                                                    <textarea class="form-control" name="telegram_bio" id="comment" spellcheck="false" placeholder="Enter Bio of scammer telegram account"></textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 py-2">
                                                    <label class="col-form-label text-white">Crypto Currency Demanded</label>
                                                    <input type="text" name="crypto_currency_demanded" class="form-control" placeholder="Enter crypto currency demanded" />
                                                </div>
                                                <div class="col-sm-6 py-2">
                                                    <label class="col-form-label text-white">Wallet Address</label>
                                                    <input type="text" name="wallet_address" class="form-control" placeholder="Enter scammer wallet address" />
                                                </div>
                                                <div class="col-sm-12 py-2">
                                                    <label class="col-form-label text-white">Website</label>
                                                    <input type="url" name="website" class="form-control" placeholder="Enter scammers website" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 py-2">
                                                    <label class="col-form-label text-white">Other Information</label>
                                                    <textarea class="form-control" name="other_information" id="comment" spellcheck="false" placeholder="Describe or any other information you have"></textarea>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="" class="text-white">Profile Image of Scammer</label>
                                                        <div class="form-file">
                                                            <input type="file" name="profile_image" class="form-file-input form-control"  accept="image/x-png,image/gif,image/jpeg" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="" class="text-white">Screenshot of Chat</label>
                                                        <div class="form-file">
                                                            <input type="file" name="screenshot_of_chat[]" class="form-file-input form-control"   accept="image/x-png,image/gif,image/jpeg"  multiple required />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="my-3 row">
                                                <div class="col-sm-12">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" />
                                                        <label class="form-check-label"> I agree with the all additional <a href="terms-condition.php"> Terms and Conditions</a> </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <div class="col-sm-12">
                                                    <button type="submit" name="report_scam" class="btn btn-primary" style="float: right;">Report</button>
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

