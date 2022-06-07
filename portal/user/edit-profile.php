<?php
   session_start();
   require_once '../database/db-con.php';
   ?>

<?php 

if (isset($_SESSION['user_session_var'])) {

   $user_id = $_SESSION['user_session_var'];
   } 
   else {

   header('location:../auth/login.php');
   } 

   $user_query = "SELECT * FROM `users` WHERE `id` = $user_id";
   $run_fetch = mysqli_query($con, $user_query);
   $user_data = mysqli_fetch_assoc($run_fetch);
   
   if($user_data['email_verification'] == 0){
      echo "<script>window.location='../utility/email-not-verified.php';</script>";
   }
   ?>



<?php if (isset($_POST['edit_profile'])) {
   $name = $_POST['name'];
   $query = "UPDATE `users` SET `name`='$name'  WHERE `id` = $user_id";
   if ($con->query($query) === true) {
   } else {
   }
   } ?>
<?php
   //password update backend
   $err_msg = 0;
   if (isset($_POST['change_password'])) {
       $current_password = $_POST['current_password'];
       $new_password = $_POST['new_password'];
       $repeat_password = $_POST['repeat_password'];
       $user_query = "SELECT `password` FROM `users` WHERE `id` = $user_id";
       $run_fetch = mysqli_query($con, $user_query);
       $user_data = mysqli_fetch_assoc($run_fetch);
       if ($user_data['password'] == $current_password) {
           if ($new_password == $repeat_password) {
               $query = "UPDATE `users` SET `password`='$new_password'  WHERE `id` = $user_id";
               if ($con->query($query) === true) {
                   $err_msg = "Password Updated";
               } else {
               }
           } else {
               $err_msg = "Password doesn't match";
           }
       } else {
           $err_msg = "Wront password entered";
       }
   }
   ?>
<?php
   if (isset($_POST['update_profile_image'])) {
      
      if($_FILES['profile_image']['name'] != ''){
   
         $file_name = '';
     
         
     
         
             $filename = $_FILES['profile_image']['name'];// Get the Uploaded file Name.
             $extension = pathinfo($filename,PATHINFO_EXTENSION); //Get the Extension of uploded file
     
             $valid_extensions = array("png","jpg","jpeg","gif");
     
             if(in_array($extension, $valid_extensions)){ // check if upload file is a valid image file.
               $timestamp = time();
               $new_name = $user_id."user_img".$timestamp."akc".rand().".". $extension;
               $path = "../uploads/users/profile-img/" . $new_name;
     
                 move_uploaded_file($_FILES['profile_image']['tmp_name'], $path);
     
                 $file_name = $new_name;
             }
         
       
         
     
             $query4 = "UPDATE `users` SET `user_img`='$file_name' WHERE `id` = $user_id";
             if ($con->query($query4) === TRUE) {
                 // success
             }
             else{
                 // echo "Error: " . $query4 . "<br>" . $con->error;
             }
         
       
     }else{
                 echo "false";
             }
   }
   
   ?>
<?php 
   $user_query = "SELECT * FROM `users` WHERE `id` = $user_id";
   $run_fetch = mysqli_query($con, $user_query);
   $user_data = mysqli_fetch_assoc($run_fetch);
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
      <title>Edit Profile - Tesla INU Web Portal</title>
      <!-- FAVICONS ICON -->
      <link rel="shortcut icon" type="image/png" href="../assets/images/favicon.png" />
      <link href="../assets/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet" />
      <link rel="stylesheet" href="../assets/vendor/dotted-map/css/contrib/jquery.smallipop-0.3.0.min.css" type="text/css" media="all" />
      <!-- Style css -->
      <link href="../assets/css/style.css" rel="stylesheet" />
      <style>
         .alerttoggle {
         display: none;
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
         <?php require('../elements/sidebar.php');?>
         <div class="content-body">
            <!--**********************************
               Content body start
               ***********************************-->
            <!-- row -->
            <div class="container mt-5">
               <div class="row">
                  <div class="card">
                     <div class="card-header">
                        <h3 class="card-title">Edit Profile</h3>
                     </div>
                     <div class="card-body">
                        <div style="text-align: center;">
                           <img style="text-align: center; width:100px;  height:100px; border-radius:100px; !important; " class="img-fluid" src="../uploads/users/profile-img/<?php echo $user_data['user_img']; ?>" alt="Tesla INU User Image" />
                           <br />
                           <span class="btn btn-sm btn-white text-primary" data-bs-toggle="modal" data-bs-target="#profile_img_change_modal">Change</span>
                        </div>
                        <form action="" method="post" enctype="multipart/form-data">
                           <br />
                           <br />
                           <div class="row mt-3">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for=""> Name</label>
                                    <input type="text" class="form-control" name="name" value="<?php echo $user_data['name'] ?>" placeholder="Enter your name" required />
                                    <div class="text-muted">
                                       Please enter name as per KYC documents.
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control" value="<?php echo $user_data['email'] ?>" placeholder="Enter your email" disabled />
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <br />
                                 <br />
                                 <div class="form-group" style="float: right !important;">
                                    <button class="btn btn-primary float-right" name="edit_profile">Update</button>
                                 </div>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
               <div class="row pt-5">
                  <div class="card">
                     <div class="card-header">
                        <h3 class="card-title">Password</h3>
                     </div>
                     <div class="card-body">
                        <div class="alert alert-success alert-dismissible fade show alerttoggle" id="password_success_alert">
                           <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                              <polyline points="9 11 12 14 22 4"></polyline>
                              <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                           </svg>
                           <strong>Success!</strong> <span id="password_success_alert_text"></span>
                           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
                        </div>
                        <div class="alert alert-danger alert-dismissible fade show alerttoggle" id="password_failed_alert">
                           <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                              <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                              <line x1="15" y1="9" x2="9" y2="15"></line>
                              <line x1="9" y1="9" x2="15" y2="15"></line>
                           </svg>
                           <strong>Error!</strong><span id="password_failed_alert_text"></span>
                           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
                        </div>
                        <form action="" method="post" enctype="multipart/form-data">
                           <img src="uploads/users/<?php echo $user_data['user_img'] ?>" style="height: 100px;" alt="" class="img-fluid rounded mx-auto" />
                           <br />
                           <br />
                           <div class="row mt-3">
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label for=""> Current Password</label>
                                    <input type="password" class="form-control" name="current_password" placeholder="••••••••••••••••••" required />
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <br />
                                 <div class="form-group">
                                    <label for=""> New Password</label>
                                    <input type="password" class="form-control" name="new_password" placeholder="••••••••••••••••••" required />
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <br />
                                 <div class="form-group">
                                    <label for=""> Repeat Password</label>
                                    <input type="password" class="form-control" name="repeat_password" placeholder="••••••••••••••••••" required />
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <br />
                                 <br />
                                 <div class="form-group" style="float: right !important;">
                                    <button class="btn btn-primary float-right" name="change_password">
                                    Change Password
                                    </button>
                                 </div>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
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
      <div class="modal fade" id="profile_img_change_modal">
         <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
               <!-- Modal Header -->
               <div class="modal-header">
                  <h5 class="modal-title">Change Image</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
               </div>
               <form action="" method="POST" enctype="multipart/form-data">
                  <!-- Modal body -->
                  <div class="modal-body">
                     <label for="">User Image</label>
                     <div class="form-file">
                        <input type="file" class="form-file-input form-control" name="profile_image" id="customFile" required accept="image/x-png,image/gif,image/jpeg" />
                     </div>
                  </div>
                  <!-- Modal footer -->
                  <div class="modal-footer">
                     <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                     <button type="submit" name="update_profile_image" class="btn btn-primary">Save</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <script>
         // Add the following code if you want the name of the file appear on select
         $(".custom-file-input").on("change", function () {
             var fileName = $(this).val().split("\\").pop();
             $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
         });
      </script>
      <script>
         var get_password_success_alert = document.getElementById("password_success_alert");
         var get_password_success_alert_text = document.getElementById("password_success_alert_text");
         var get_password_failed_alert = document.getElementById("password_failed_alert");
         var get_password_failed_alert_text = document.getElementById("password_failed_alert_text");
         
         var err_msg = "<?php echo $err_msg ?>";
         
         if (err_msg != 0) {
             if (err_msg == "Password Updated") {
                 //success
                 get_password_success_alert.style.display = "block";
                 get_password_success_alert_text.innerHTML = err_msg;
             } else {
                 //failed
                 get_password_failed_alert.style.display = "block";
                 get_password_failed_alert_text.innerHTML = err_msg;
             }
         }
      </script>
   </body>
</html>