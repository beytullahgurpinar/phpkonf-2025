<?php

namespace Payment\Entity;

class PaymentResponseEntity
{
    private string $status;
    private string $message;
    private string $transactionId;
    private array $responseData;
    private string $paymentMethod;

    public function __construct()
    {
        $this->status = 'PENDING';
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;
        return $this;
    }

    public function getTransactionId(): string
    {
        return $this->transactionId;
    }

    public function setTransactionId(string $transactionId): self
    {
        $this->transactionId = $transactionId;
        return $this;
    }

    public function getPaymentMethod(): string
    {
        return $this->paymentMethod;
    }

    public function setPaymentMethod(string $paymentMethod): void
    {
        $this->paymentMethod = $paymentMethod;
    }



    public function getResponseData(): array
    {
        return $this->responseData;
    }

    public function setResponseData(array $responseData): self
    {
        $this->responseData = $responseData;
        return $this;
    }

}