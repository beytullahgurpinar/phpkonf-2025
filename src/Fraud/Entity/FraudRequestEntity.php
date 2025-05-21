<?php

namespace Fraud\Entity;

class FraudRequestEntity
{
    private string $orderId = '';
    private string $customerId = '';
    private string $transactionId = '';
    private array $details = [];
    private string $paymentMethod = '';
    private string $status = '';
    private string $cardNumber = '';
    private string $cardExpiryDate = '';
    private string $cardCVC = '';
    private string $cardHolderName = '';
    private string $cardType = '';

    public function getOrderId(): string
    {
        return $this->orderId;
    }

    public function setOrderId(string $orderId): FraudRequestEntity
    {
        $this->orderId = $orderId;
        return $this;
    }

    public function getCustomerId(): string
    {
        return $this->customerId;
    }

    public function setCustomerId(string $customerId): FraudRequestEntity
    {
        $this->customerId = $customerId;
        return $this;
    }

    public function getTransactionId(): string
    {
        return $this->transactionId;
    }

    public function setTransactionId(string $transactionId): FraudRequestEntity
    {
        $this->transactionId = $transactionId;
        return $this;
    }

    public function getDetails(): array
    {
        return $this->details;
    }

    public function setDetails(array $details): FraudRequestEntity
    {
        $this->details = $details;
        return $this;
    }

    public function getPaymentMethod(): string
    {
        return $this->paymentMethod;
    }

    public function setPaymentMethod(string $paymentMethod): FraudRequestEntity
    {
        $this->paymentMethod = $paymentMethod;
        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): FraudRequestEntity
    {
        $this->status = $status;
        return $this;
    }

    public function getCardNumber(): string
    {
        return $this->cardNumber;
    }

    public function setCardNumber(string $cardNumber): FraudRequestEntity
    {
        $this->cardNumber = $cardNumber;
        return $this;
    }

    public function getCardExpiryDate(): string
    {
        return $this->cardExpiryDate;
    }

    public function setCardExpiryDate(string $cardExpiryDate): FraudRequestEntity
    {
        $this->cardExpiryDate = $cardExpiryDate;
        return $this;
    }

    public function getCardCVC(): string
    {
        return $this->cardCVC;
    }

    public function setCardCVC(string $cardCVC): FraudRequestEntity
    {
        $this->cardCVC = $cardCVC;
        return $this;
    }

    public function getCardHolderName(): string
    {
        return $this->cardHolderName;
    }

    public function setCardHolderName(string $cardHolderName): FraudRequestEntity
    {
        $this->cardHolderName = $cardHolderName;
        return $this;
    }

    public function getCardType(): string
    {
        return $this->cardType;
    }

    public function setCardType(string $cardType): FraudRequestEntity
    {
        $this->cardType = $cardType;
        return $this;
    }



    public function toArray(): array
    {
        return [
            'orderId' => $this->orderId,
            'customerId' => $this->customerId,
            'transactionId' => $this->transactionId,
            'details' => $this->details,
            'paymentMethod' => $this->paymentMethod,
            'status' => $this->status,
            'cardNumber' => $this->cardNumber,
        ];

    }

}