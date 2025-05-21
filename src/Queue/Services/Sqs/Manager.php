<?php

namespace Queue\Services\Sqs;

use Queue\Entity\ReceiveEntity;
use Queue\Entity\SendEntity;
use Queue\Entity\SendResponseEntity;
use Queue\QueueInterface;

class Manager implements QueueInterface
{
    public function send(SendEntity $sendEntity): SendResponseEntity
    {
        $response = new SendResponseEntity();
        $response->setMessage($sendEntity->getMessage());
        $response->setQueueId('12345'); // This should be the actual queue ID returned by SQS
        return $response;
    }

    public function receive(string $topic): ReceiveEntity
    {
        $receiveEntity = new ReceiveEntity();
        $receiveEntity->setMessage('Received message');
        return $receiveEntity;
    }
}