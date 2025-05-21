<?php

namespace Queue;

use Queue\Entity\SendEntity;
use Queue\Entity\SendResponseEntity;

class Queue
{

    public function sendQueue($service, SendEntity $sendEntity): SendResponseEntity
    {
        return (QueueFactory::createService($service))->send($sendEntity);
    }

}