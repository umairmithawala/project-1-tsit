<?php
require_once '../database/db-con.php';

for ($i = 0; $i <= 3; $i++) {

  

  $current_date = date("Y-m-d");

  //set timestamp to before 30min
  $time_stamp = strtotime("-30 minutes");
  $time_stamp = date("Y-m-d H:i:s", $time_stamp);

  //set timestamp to before 20min 
  $time_stamp_2 = strtotime("-20 minutes");
  $time_stamp_2 = date("Y-m-d H:i:s", $time_stamp_2);

  //set timestamp to before 10min
  $time_stamp_3 = strtotime("-10 minutes");
  $time_stamp_3 = date("Y-m-d H:i:s", $time_stamp_3);

  //set timestamp variable when loop is first run
  if ($i == 1) {
    $timestamp = $time_stamp;
  } else if ($i == 2) {
    $timestamp = $time_stamp_2;
  } elseif ($i == 3) {
    $timestamp = $time_stamp_3;
  }

  $available_tsit_supply = 0;
  if ($current_date <= "2022-04-23") {
    // echo "Phase – 1 - 7th April – 23rd April 2022";
    $tsit_coin_current_price = 0.000001;
  } else if ($current_date <= "2022-05-10") {
    // echo "Phase – 2 - 24th April – 10th May 2022";
    $tsit_coin_current_price = 0.000002;
  } else if ($current_date <= "2022-05-27") {
    // echo "Phase – 3 - 11th May – 27th May 2022";
    $tsit_coin_current_price = 0.000003;
  } else if ($current_date <= "2022-06-13") {
    // echo "Phase – 4 - 28th May – 13th June 2022";
    $tsit_coin_current_price = 0.000004;
  } else {
    // echo "Phase – 5 - 14th June – 30th June 2022";
    $tsit_coin_current_price = 0.000004;
  }


  //create random number from 100,150,200,250,300,350,400,450,500


  $price_array = array(100, 150, 200, 250, 300, 350, 400, 450, 500,550,600,650,700,750,800,850,900,950,1000);
  $random_number = rand(0, 19);
  $price_in_dollar = $price_array[$random_number];
  $amount_in_tsit = $price_in_dollar / $tsit_coin_current_price;
  echo $amount_in_tsit;
  $amount_of_tsit_purchased = $amount_in_tsit;

  $currency = 'USDT';

  $amount_in_currency = $price_in_dollar;

  $amount_in_dollar_on_submit = $price_in_dollar;

  $transaction_id = "Not Applied";

  $sending_wallet_address = "Not Applied";

  $payment_screenshot_file_name = "";

  $timestamp = time();


  $auto_buy_query = "INSERT INTO `buy_requests`(`id`,`user_id`, `tsit_coin_price`, `amount_of_tsit_purchased`, 
`currency`, `amount_in_currency`, `amount_in_dollar_on_submit`, `transaction_id`, 
`sending_wallet_address`, `payment_screenshot`, `is_tsit_transfered`,`request_timestamp`,`is_fake`) VALUES (
NULL,1, $tsit_coin_current_price,$amount_of_tsit_purchased, '$currency', $amount_in_currency, $amount_in_dollar_on_submit,
'$transaction_id', '$sending_wallet_address', '$payment_screenshot_file_name',  1, $timestamp,1)";

  $run_auto_buy_query = mysqli_query($con, $auto_buy_query);
  //get last id
  $last_id = mysqli_insert_id($con);


  $buy_request_amount_of_tsit_purchased = $amount_in_tsit;

  $add_buy_transaction_query = "INSERT INTO `transactions`(`user_id`, `transaction_type`, `hash`, 
`note`, `to_address`, `from_address`, `is_addition`, `transaction_status`, `amount`, `timestamp`,`is_fake`)
 VALUES (1,6,'','','','',1,1,$buy_request_amount_of_tsit_purchased,$timestamp,1)";
  $add_buy_transaction_query_run = mysqli_query($con, $add_buy_transaction_query);
}
