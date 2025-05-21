<?php


namespace Payment\Gateways\Stripe;

use Payment\Entity\PaymentEntity;
use Payment\Entity\PaymentQueryResponseEntity;
use Payment\Entity\PaymentResponseEntity;
use Payment\Entity\RefundEntity;
use Payment\Entity\RefundResponseEntity;
use Payment\PaymentAbstract;
use Payment\PaymentInterface;

class Manager extends PaymentAbstract implements PaymentInterface
{
    function processPayment(PaymentEntity $paymentEntity): PaymentResponseEntity
    {
        $this->sendRequest('https://api.stripe.com/process', $paymentEntity->toArray());

        $paymentResponseEntity = new PaymentResponseEntity();
        $paymentResponseEntity->setStatus('SUCCESS');
        $paymentResponseEntity->setMessage('Payment processed successfully.');
        $paymentResponseEntity->setTransactionId('1234567890');
        $paymentResponseEntity->setResponseData($this->responseData);
        $paymentResponseEntity->setPaymentMethod('stripe');

        return $paymentResponseEntity;
    }


    public function refundPayment(RefundEntity $refundEntity): RefundResponseEntity
    {
        $this->sendRequest('https://api.stripe.com/refund', $refundEntity->toArray());

        $refundResponseEntity = new RefundResponseEntity();
        $refundResponseEntity->setStatus('SUCCESS');
        $refundResponseEntity->setMessage('Refund processed successfully.');
        $refundResponseEntity->setTransactionId('0987654321');

        return $refundResponseEntity;
    }


    public function getPaymentQuery(string $orderId): PaymentQueryResponseEntity
    {
        $paymentQueryResponseEntity = new PaymentQueryResponseEntity();
        $paymentQueryResponseEntity->setStatus('SUCCESS');
        $paymentQueryResponseEntity->setDetails([
            'amount' => 100.00,
            'currency' => 'USD',
            'status' => 'COMPLETED',
        ]);
        $paymentQueryResponseEntity->setTransactionId($orderId);

        return $paymentQueryResponseEntity;
    }
}