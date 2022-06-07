<?php
   session_start();
   require_once '../database/db-con.php';
   ?>

<?php
   if (!empty($_GET['ch'])) {
    //    getting id to verify user
    $get_ch_string = $_GET['ch'];

     preg_match_all('!\d+!',$get_ch_string,$matches);
     $get_ch_string = implode(' ',$matches[0]);
     $email_verification_user_id = preg_replace("/\s+/", "", $get_ch_string);


    //  update is verify in database 


    $query3 = "UPDATE `users` SET `email_verification`= 1 WHERE `id` = $email_verification_user_id";
 
 
     if ($con->query($query3) === TRUE) {
         // set email verify session variable 
       

            
            $_SESSION['user_session_var'] = $email_verification_user_id;
         
         
         ?>
         <script>
         window.location = '../dashboard/index.php';
         </script>

         <?php
     }
     

     
   
   }
     else{
       ?>
<script>
   window.history.back();
   window.location = '../utility/email-not-verified.php';
</script>
<?php
   }
   ?>