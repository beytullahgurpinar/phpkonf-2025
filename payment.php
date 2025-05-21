<?php

include_once 'vendor/autoload.php';

$paymentEntity = new \Payment\Entity\PaymentEntity();
$paymentEntity->setAmount(100.00)
    ->setCurrency('USD')
    ->setOrderId('12345');

$payment = new Payment\Payment();

$paymentResponse = $payment->processPayment($paymentEntity, 'stripe');
print_r($paymentResponse);

$paymentResponse = $payment->processPayment($paymentEntity, 'paypal');
print_r($paymentResponse);

$paymentResponse = $payment->processPayment($paymentEntity, 'adyen');
print_r($paymentResponse);

