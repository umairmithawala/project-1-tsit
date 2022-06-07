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
require "2FA/Authenticator.php";
if ($_SERVER['REQUEST_METHOD'] != "POST") {
    header("location: index.php");
    die();
}
$Authenticator = new Authenticator();




$checkResult = $Authenticator->verifyCode($_SESSION['auth_secret'], $_POST['code'], 2);    // 2 = 2*30sec clock tolerance

if (!$checkResult) {
    ?>
<script>
var is_enabled = 0;
</script>
    <?php
} else{
    

$two_fa_secret = $_SESSION['auth_secret'];
$sql = "UPDATE `users` SET `two_fa_enabled` = 1, `two_fa_secret`= '$two_fa_secret' WHERE id = $user_id";

if ($con->query($sql) === TRUE) {
    ?>
<script>
var is_enabled = 1;
</script>
    <?php 
}
 
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Enable 2FA</title> 
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
  <script>
    if(is_enabled == 0){
swal({
  title: "Failed",
  text: "Google Authentication Activation Failed",
  icon: "warning",
  button: "Done",
});
setTimeout(function(){ window.location = "setup-google-2fa.php"; }, 2000);
}
else{
    swal({
  title: "Success",
  text: "Google Authentication Activated",
  icon: "success",
  button: "Done",
});
setTimeout(function(){ window.location = "setup-google-2fa.php"; }, 2000);
}



  </script>
</body>
</html>
