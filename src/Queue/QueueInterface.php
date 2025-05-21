<?php

namespace Queue;

use Queue\Entity\ReceiveEntity;
use Queue\Entity\SendEntity;
use Queue\Entity\SendResponseEntity;

interface QueueInterface
{
    public function send(SendEntity $sendEntity): SendResponseEntity;
    public function receive(string $topic): ReceiveEntity;
}