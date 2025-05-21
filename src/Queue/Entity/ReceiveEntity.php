<?php

namespace Queue\Entity;

class ReceiveEntity
{
    private string $topic;
    private string $message;
    private string $uniqueId;

    public function getTopic(): string
    {
        return $this->topic;
    }

    public function setTopic(string $topic): ReceiveEntity
    {
        $this->topic = $topic;
        return $this;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): ReceiveEntity
    {
        $this->message = $message;
        return $this;
    }

    public function getUniqueId(): string
    {
        return $this->uniqueId;
    }

    public function setUniqueId(string $uniqueId): ReceiveEntity
    {
        $this->uniqueId = $uniqueId;
        return $this;
    }

}