<?php
require_once '../database/db-con.php';
$current_time = time();

?>

<?php

//get active and undeclared results fetch results


$query1     = "SELECT * FROM `scams` WHERE `is_active` = 1 AND `superadmin_approval` = 1";
$run_query1 = mysqli_query($con, $query1);
$rows1      = mysqli_num_rows($run_query1);
$indexing1  = 1;
if ($rows1 > 0 && $run_query1 == TRUE) {
    while ($data1 = mysqli_fetch_assoc($run_query1)) {
        
        $scam_id = $data1['id'];
        $reported_by = $data1['reported_by'];
        
        echo "<span style='color:green'>Fetching scams scam id is -> " . $scam_id . "</span><br>";
        $superadmin_approval_timestamp = $data1['superadmin_approval_timestamp'];
        
        $time_passed = $current_time - $superadmin_approval_timestamp;
        
        echo "<span style='color:blue'>Time passed is -> " . $time_passed . "</span><br>";
        
        //check for time more then 24 hour
        if ($time_passed > 86400) {
            echo "<span style='color:green'>  scam id  -> " . $scam_id . " 24 hours completed</span><br>";
            
            //count up and down votes 
            
            $up_votes   = 0;
            $down_votes = 0;
            
            
            $query2     = "SELECT `vote` FROM `votes` WHERE `scam_id` = $scam_id";
            $run_query2 = mysqli_query($con, $query2);
            $rows2      = mysqli_num_rows($run_query2);
            $indexing2  = 2;
            if ($rows2 > 0 && $run_query2 == TRUE) {
                while ($data2 = mysqli_fetch_assoc($run_query2)) {
                    if ($data2['vote'] == 1) {
                        $up_votes++;
                    } else if ($data2['vote'] == 0) {
                        $down_votes++;
                    }
                }
            }
            
            echo "<span style='color:blue'>  Total Up Votes   -> " . $up_votes . " </span><br>";
            echo "<span style='color:blue'>  Total Down Votes   -> " . $down_votes . " </span><br>";
            
            //if up and down votes are equal skip 
            if ($up_votes != $down_votes) {
                echo "<span style='color:green'>  we are going to announce results for scam id  -> " . $scam_id . " </span><br>";
                
                //else declare results 
                $mining_result = 0;
                if($up_votes > $down_votes){
                    //win
                    $mining_result = 1;
                echo "<span style='color:green'>  we won for scam id  -> " . $scam_id . " </span><br>";

                }else{
                    //lose 
                    $mining_result = 0;
                echo "<span style='color:red'>  we lose for scam id  -> " . $scam_id . " </span><br>";

                }

  
                $query3  = "UPDATE `scams` SET `mining_result` = $mining_result , `is_active` = 0 WHERE `id` = $scam_id";

        
                if ($con->query($query3) === TRUE) {
                       

                }  

                    
 //reward the reporter -> according to report 
                if($mining_result == 1){
                    $reward_to_reporter_amount = 2500;


                    $query4  = "INSERT INTO `transactions`(`id`, `user_id`, `transaction_type`, 
                    `hash`, `note`, `to_address`, `from_address`, `is_addition`, `transaction_status`,
                     `amount`, `timestamp`) VALUES (NULL, $reported_by, 3,'Not Applied','Reward for reporting scam','Not Applied', 'Not Applied',
                     1,1,$reward_to_reporter_amount,$current_time)";
    
                    
                    if ($con->query($query4) === TRUE) {
                    echo "<span style='color:blue'>  Scam reporting fees  -> " . $reward_to_reporter_amount . " given to user id -> ". $reported_by."</span><br>";
                        
                }

                   
                }

                //give mining fees to all miners 

                $mining_fees_amount = 1000;


            $query5     = "SELECT `voter_id` FROM `votes` WHERE `scam_id` = $scam_id";
            $run_query5 = mysqli_query($con, $query5);
            $rows5      = mysqli_num_rows($run_query5);
            $indexing5  = 5;
            if ($rows5 > 0 && $run_query5 == TRUE) {
                while ($data5 = mysqli_fetch_assoc($run_query5)) {
                  
                    $voter_id = $data5['voter_id'];
                    $query6  = "INSERT INTO `transactions`(`id`, `user_id`, `transaction_type`, 
                    `hash`, `note`, `to_address`, `from_address`, `is_addition`, `transaction_status`,
                     `amount`, `timestamp`) VALUES (NULL, $voter_id, 4,'Not Applied','Reward for reporting scam','Not Applied', 'Not Applied',
                     1,1,$mining_fees_amount,$current_time)";
    
                    
                    if ($con->query($query6) === TRUE) {
                    echo "<span style='color:blue'>  Scam mining fees  -> " . $mining_fees_amount . " given to user id -> ". $voter_id."</span><br>";
                        
                }


                }
            }


                
                
                
                
                
                
                
               
                
                
                
            } else {
                echo "<span style='color:red'>  scam id  -> " . $scam_id . " is skipped due to similar up and down votes</span><br>";
            }
            
            
            
            
            
            
        }
        
    }
}





?>