<?php

include_once 'vendor/autoload.php';


$fraudEntity = new \Fraud\Entity\FraudRequestEntity();

$fraudEntity->setOrderId('12345')
    ->setPaymentMethod('credit_card')
    ->setCardCVC('123')
    ->setCardNumber('4111111111111111')
    ->setCardExpiryDate('12/25')
    ->setDetails([
        'ip_address' => '192.168.1.1',
        'user_agent' => 'Mozilla/5.0',
        'billing_address' => '123 Main St, Anytown, USA',
        'shipping_address' => '456 Elm St, Anytown, USA',
        'email' => '',
        'phone' => '',
        'amount' => 100.00,
        'currency' => 'USD',

    ]);

$fraud = new Fraud\Fraud();
$fraudResponse = $fraud->checkFraud($fraudEntity, 'inhouse');

//Eğer kendi servimizden güvenli ise, verifi servisini kullanarak tekrar kontrol et!
if ($fraudResponse->isSafe()) {
    $fraudResponse = $fraud->checkFraud($fraudEntity, 'verifi');
}

print_r($fraudResponse);

