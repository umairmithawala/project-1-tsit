<?php
require_once '../database/db-con.php';
$current_time = time();
?>
<?php //here we are giving reward to maximum scam miner //derive last scan time from database and
//here we are giving reward to maximum scam miner
//derive last scan time from database and
?>
<?php
$query1 = "SELECT * FROM `twenty_four_hour_scan` WHERE `id` = 1";
$run_query1 = mysqli_query($con, $query1);
$rows1 = mysqli_num_rows($run_query1);
$indexing1 = 1;
if ($rows1 > 0 && $run_query1 == true) {
    while ($data1 = mysqli_fetch_assoc($run_query1)) {
        $time_passed = $current_time - $data1['timestamp']; //if scan time is larger then 24 hours then go ahead and
        if ($time_passed > 86400) { //change condition
           
            echo "<span style='color:blue'> Time is larger then 24 hours and we starting operation  -> " . $current_time . "</span><br>";
            $max_vote = 0;
            $max_vote_voter_id = 0; //insert all uniqe users id in another database from votes table
            $twenty_four_hour_before_timestamp = $current_time - 86400;
            $query2 = "SELECT DISTINCT `voter_id` FROM `votes` WHERE `timestamp` BETWEEN $twenty_four_hour_before_timestamp AND $current_time";
            $run_query2 = mysqli_query($con, $query2);
            $rows2 = mysqli_num_rows($run_query2);
            $indexing2 = 2;
            if ($rows2 > 0 && $run_query2 == true) {
                while ($data2 = mysqli_fetch_assoc($run_query2)) {
                    $voter_id = $data2['voter_id'];
                    echo "<span style='color:blue'> Unique voter id we got is   -> " . $voter_id . "</span><br>";

                    //count maximum votes
                    $query3 = "SELECT * FROM `votes` WHERE `voter_id` = $voter_id AND `timestamp` BETWEEN $twenty_four_hour_before_timestamp AND $current_time";
                    $run_query3 = mysqli_query($con, $query3);
                    $rows3 = mysqli_num_rows($run_query3);
                    $indexing3 = 3;
                    if ($rows3 > 0 && $run_query3 == true) {
                        if ($rows3 > $max_vote) {
                            $max_vote = $rows3;
                            $max_vote_voter_id = $voter_id;
                        }
                    }
                }
            }
            echo "<span style='color:green'> Max vote count we got is   -> " . $max_vote . "</span><br>";
            echo "<span style='color:green'> Max vote count voter id we got is   -> " . $max_vote_voter_id . "</span><br>"; //transaction
            $mining_reward_amount = 2500;
            $query4 = "INSERT INTO `transactions`(`id`, `user_id`, `transaction_type`, 
            `hash`, `note`, `to_address`, `from_address`, `is_addition`, `transaction_status`,
             `amount`, `timestamp`) VALUES (NULL, $max_vote_voter_id, 5,'Not Applied','Reward for reporting scam','Not Applied', 'Not Applied',
             1,1,$mining_reward_amount,$current_time)";
            if ($con->query($query4) === true) {
                echo "<span style='color:blue'>  Scam mining reward  -> " . $mining_reward_amount . " given to user id -> " . $max_vote_voter_id . "</span><br>";
            }

            //add scam time in database
            $query6 = "UPDATE `twenty_four_hour_scan` SET `timestamp`=$current_time WHERE `id` = 1";
            if ($con->query($query6) === true) {
                echo "<span style='color:green'>  Twenty four scan done inserted timestamp  -> " . $current_time . "</span><br>";
            }
        } else {
            echo "<span style='color:blue'> We skipped scroll because time not passed 24 hours </span><br>";
        }
    }
}
 ?>
