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




$sql = "UPDATE `users` SET `two_fa_enabled`= 0 WHERE `id` = $user_id";

if ($con->query($sql) === TRUE) {
  // echo "Record deleted successfully";
  ?>
<script>
    var a_delete = 1;
</script>
  <?php
  
} else {
  // echo "Error deleting record: " . $con->error;
  header('location:setup-google-2fa.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Disable User</title> 
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
  <script>
    if(a_delete == 1){
swal({
  title: "Deactivated",
  text: "Google Authentication Deactivated Successfully",
  icon: "warning",
  button: "Done",
});
setTimeout(function(){ window.location = "setup-google-2fa.php"; }, 2000);
}
else{
  window.location = "setup-google-2fa.php"; 
}



  </script>
</body>
</html>
