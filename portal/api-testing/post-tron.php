<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>

    <?php 
    // kvstore API url
$url = 'https://api.trongrid.io/wallet/createtransaction/';

// Collection object
$data = [
  'to_address' => '41e9d79cc47518930bc322d9bf7cddd260a0260a8d',
  'owner_address' => '41D1E7A6BC354106CB410E65FF8B181C600FF14292',
  'amount' => '1000'

];

// Initializes a new cURL session
$curl = curl_init($url);

// 1. Set the CURLOPT_RETURNTRANSFER option to true
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// 2. Set the CURLOPT_POST option to true for POST request
curl_setopt($curl, CURLOPT_POST, true);

// 3. Set the request data as JSON using json_encode function
curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($data));

// 4. Set custom headers for RapidAPI Auth and Content-Type header
curl_setopt($curl, CURLOPT_HTTPHEADER, [
  'Content-Type: application/json',
  'TRON-PRO-API-KEY: 91490163-8830-4f15-932c-645ee90a5fd9'
]);


// Execute cURL request with all previous settings
$response = curl_exec($curl);

// Close cURL session
curl_close($curl);


echo $response . PHP_EOL;


    ?>
  </body>
</html>
