<?php
   session_start();
   require_once '../../../database/db-con.php';
   ?>
<?php
   if(isset($_SESSION['admin_session_var'])){
       $user_id = $_SESSION['admin_session_var'];
   }else {
       header('location:../../../auth/login.php');
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
    $get_id = $_GET['id'];

// $sql = "DELETE FROM enquiry WHERE id=$getid";
$timestamp = time();
$sql = "UPDATE `scams` SET `superadmin_approval` = 0, `is_active` = 0,`superadmin_rejected` = 1,`superadmin_approval_timestamp` = $timestamp WHERE `id` = $get_id";

if ($con->query($sql) === TRUE) {
 
  ?>
<script>
    var a_delete = 1;
</script>
  <?php
  
} else {
  echo "Error deleting record: " . $con->error;
  ?>
  <script>
      window.history.back();
  </script>
  <?php
  header('location:../scam-approval.php');
}

} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Scam Rejected</title> 
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
  <script>
    if(a_delete == 1){
swal({
  title: "Rejected",
  text: "Scam rejected",
  icon: "warning",
  button: "Done",
});
setTimeout(function(){ 
    window.history.back();
    window.location = "../scam-approval.php"; }, 2000);
}
else{
    window.history.back();
  window.location = "../scam-approval.php"; 
}



  </script>
</body>
</html>
