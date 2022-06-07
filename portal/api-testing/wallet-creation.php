<?php
require '../../vendor/autoload.php';
use IEXBase\TronAPI\Tron;

$fullNode = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
$solidityNode = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
$eventServer = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');

try {
    $tron = new \IEXBase\TronAPI\Tron($fullNode, $solidityNode, $eventServer);
    
    $generateAddress = $tron->generateAddress(); // or createAddress()
    $isValid = $tron->isAddress($generateAddress->getAddress());


    echo 'Address hex: '. $generateAddress->getAddress();
    echo 'Address base58: '. $generateAddress->getAddress(true);
    echo 'Private key: '. $generateAddress->getPrivateKey();
    echo 'Public key: '. $generateAddress->getPublicKey();
    echo 'Is Validate: '. $isValid;

    print_r('Raw data: '.$generateAddress->getRawData());

} catch (\IEXBase\TronAPI\Exception\TronException $e) {
    echo $e->getMessage();
}



?>