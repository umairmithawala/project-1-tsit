<?php
require_once '../database/db-con.php';
$current_time = time();
?>
<?php

//get current day 
$current_day = date('l');
//if monday 
if ($current_day == 'Monday') {


    //get all the users from users table
    $sql = "SELECT * FROM `users` WHERE `is_banned` = 0;";
    $result = mysqli_query($con, $sql);
    $rows = mysqli_num_rows($result);
    $indexing = 1;
    if ($rows > 0 && $result == true) {
        while ($data = mysqli_fetch_assoc($result)) {
            $user_id = $data['id'];
            echo $user_id . "" . "<br>";

            // SELECT `id`, `user_id`, `transaction_type`, `hash`, `note`, `to_address`, `from_address`, `is_addition`, `transaction_status`, `amount`, `timestamp` FROM `transactions` WHERE 1
            //get total tsit buy amount from transaction table
            $sql1 = "SELECT SUM(`amount`) AS `total_amount` FROM `transactions` WHERE `user_id` = $user_id AND `transaction_type` = 6 AND `transaction_status` = 1;";
            $result1 = mysqli_query($con, $sql1);
            $rows1 = mysqli_num_rows($result1);
            if ($rows1 > 0 && $result1 == true) {
                while ($data1 = mysqli_fetch_assoc($result1)) {
                    $total_amount = $data1['total_amount'];
                    echo $total_amount . "<br>";
                    if ($total_amount > 0) {
                        //count interest amount (4% of total amount)
                        $interest_amount = $total_amount * 0.04;
                        echo $interest_amount . "<br>";

                        $timestamp = time();
                        //insert into transaction table
                        $sql2 = "INSERT INTO `transactions` (`user_id`, `transaction_type`, `hash`, `note`,`to_address`, `from_address`, `is_addition`, `transaction_status`, `amount`, `timestamp`) VALUES ($user_id, 8, '', 'Interest', '', '', 1, 1, $interest_amount, $timestamp);";
                        $result2 = mysqli_query($con, $sql2);
                        if ($result2 == true) {
                            echo "Interest added successfully";
                        } else {
                            echo "Interest not added";
                        }
                    }
                }
            }
        }
    }
}
?>