<?php

require_once "vendor/autoload.php";

use \App\Pix\Payload;

$obPayload = (new Payload) -> setPixKey('12345678900')
                           -> setDescription('teste de descrição')
                           -> setMerchantName('João Lucas')
                           -> setMerchantCity('MOGI GUACU')
                           -> setAmount(200.00)
                           -> setTxid('jperegrinos123');


$payloadQrCode = $obPayload->getPayload();

echo "<pre>";
print_r($payloadQrCode);
exit;