<?php

namespace Queue\Entity;

class SendResponseEntity
{
    private string $message;
    private string $queueId;

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): SendResponseEntity
    {
        $this->message = $message;
        return $this;
    }

    public function getQueueId(): string
    {
        return $this->queueId;
    }

    public function setQueueId(string $queueId): SendResponseEntity
    {
        $this->queueId = $queueId;
        return $this;
    }



}