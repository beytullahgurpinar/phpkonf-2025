<?php

namespace Queue\Entity;

class SendEntity
{
    private string $topic;
    private string $message;
    private string $uniqueId;

    public function getTopic(): string
    {
        return $this->topic;
    }

    public function setTopic(string $topic): SendEntity
    {
        $this->topic = $topic;
        return $this;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): SendEntity
    {
        $this->message = $message;
        return $this;
    }

    public function getUniqueId(): string
    {
        return $this->uniqueId;
    }

    public function setUniqueId(string $uniqueId): SendEntity
    {
        $this->uniqueId = $uniqueId;
        return $this;
    }

}