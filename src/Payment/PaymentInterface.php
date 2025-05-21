<?php

namespace Payment;

use  Payment\Entity\PaymentEntity;
use  Payment\Entity\PaymentQueryResponseEntity;
use  Payment\Entity\PaymentResponseEntity;
use  Payment\Entity\RefundEntity;
use  Payment\Entity\RefundResponseEntity;

interface PaymentInterface
{
    public function processPayment(PaymentEntity $paymentEntity): PaymentResponseEntity;

    public function refundPayment(RefundEntity $refundEntity): RefundResponseEntity;

    public function getPaymentQuery(string $orderId): PaymentQueryResponseEntity;
}