<?php

namespace Fraud\Entity;

class FraudResponseEntity
{

    private bool $isSafe = false;
    private string $reason;
    private string $transactionId;
    private array $responseData;
    private string $status;
    private string $message;

    public function isSafe(): bool
    {
        return $this->isSafe;
    }

    public function setIsSafe(bool $isSafe): void
    {
        $this->isSafe = $isSafe;
    }

    public function getReason(): string
    {
        return $this->reason;
    }

    public function setReason(string $reason): void
    {
        $this->reason = $reason;
    }

    public function getTransactionId(): string
    {
        return $this->transactionId;
    }

    public function setTransactionId(string $transactionId): void
    {
        $this->transactionId = $transactionId;
    }

    public function getResponseData(): array
    {
        return $this->responseData;
    }

    public function setResponseData(array $responseData): void
    {
        $this->responseData = $responseData;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }





}