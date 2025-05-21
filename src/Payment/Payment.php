<?php

namespace Payment;

use Payment\Entity\PaymentEntity;
use Payment\Entity\PaymentResponseEntity;

class Payment
{
    public function processPayment(PaymentEntity $paymentEntity, $provider = 'stripe'): PaymentResponseEntity
    {
        return PaymentFactory::createPaymentProvider($provider)->processPayment($paymentEntity);
    }
}