<?php
include_once '../../vendor/autoload.php';

$fullNode = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
$solidityNode = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
$eventServer = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');

try {
    $tron = new \IEXBase\TronAPI\Tron($fullNode, $solidityNode, $eventServer);
} catch (\IEXBase\TronAPI\Exception\TronException $e) {
    exit($e->getMessage());
}

$tron->setAddress('TTjHd1Ac2PX7xiCPY9Tr1nGLMRXRUmboQ9');
$tron->setPrivateKey('17732c5e8e4d3b95a8a25703ceb32662a4d55e90a41f233bc4f595f389446d8d');
$contract = $tron->contract('TSkcFMZtFzRbADShm9bDrRwugipKy1QjAs'); 

try {
    // $transfer = $contract->transfer( 'TRWBqiqoFZysoAeyR1J35ibuyc8EvhUAoY', 1);
    // print_r($contract->transfer('TRWBqiqoFZysoAeyR1J35ibuyc8EvhUAoY', 1));  // (1 = 1 Token)
    $transfer = $contract->transfer('TRWBqiqoFZysoAeyR1J35ibuyc8EvhUAoY', 1);
} catch (\IEXBase\TronAPI\Exception\TronException $e) {
    die($e->getMessage());
}

var_dump($transfer);
?>