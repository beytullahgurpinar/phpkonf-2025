<?php

include_once 'vendor/autoload.php';

$paymentEntity = new \Payment\Entity\PaymentEntity();
$paymentEntity->setAmount(100.00)
    ->setCurrency('USD')
    ->setOrderId('12345');

$payment = new Payment\Payment();
$adapters = ['stripe', 'adyen', 'garanti'];
$paymentResponse = null;

foreach ($adapters as $adapter) {
    try {

        $paymentResponse = $payment->processPayment($paymentEntity, $adapter);

        if ($paymentResponse->getStatus() === 'SUCCESS') {
            break;
        }

    } catch (Exception $e) {
        echo "Error processing payment with adapter $adapter: " . $e->getMessage() . "\n";
        exit('Payment failed.');
    }
}

if ($paymentResponse) {
    echo "Payment Response: \n";
    print_r($paymentResponse);
} else {
    echo "No payment response received.\n";
}



