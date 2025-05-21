# Payment & Fraud Detection PHP Project

This project provides a modular approach for payment processing and fraud detection using PHP and Composer.

## Features

- **Dynamic Payment Processing:**  
  Supports multiple payment adapters such as Stripe, Adyen, Garanti, and PayPal. If one fails, it switches to the next available adapter.

- **Fraud Detection:**  
  Works with both your internal service and third-party (Verifi) fraud detection services.

## Files

- `payment.php`:  
  Processes payments through different adapters and prints the responses.

- `paymentDynamic.php`:  
  Attempts payment with multiple adapters in sequence until one succeeds.

- `fraud.php`:  
  Performs fraud checks first with your internal service, and if safe, proceeds with Verifi.

## Requirements

- PHP 7.4+
- Composer

## Installation

1. Install dependencies:
   ```bash
   composer install
   ```
 

## Sample Files

### payment.php
```php
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
```

### paymentDynamic.php
```php
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
```

### fraud.php
```php
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

// Eğer kendi servimizden güvenli ise, verifi servisini kullanarak tekrar kontrol et!
if ($fraudResponse->isSafe()) {
    $fraudResponse = $fraud->checkFraud($fraudEntity, 'verifi');
}

print_r($fraudResponse);
```

## Notlar

- You can customize the payment and fraud entity details according to your needs.
- Make sure all adapters and services are properly configured in your environment.
```