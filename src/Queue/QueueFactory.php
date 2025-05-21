<?php

namespace Queue;


 use Queue\Services\Kafka\Manager as KafkaManager;
use Queue\Services\Sqs\Manager as SqsManager;

class QueueFactory
{
    private static array $providers = [
        'sqs' => SqsManager::class,
        'kafka' => KafkaManager::class,
    ];

    public static function createService(string $service): QueueInterface
    {
        if (!isset(self::$providers[$service])) {
            throw new \InvalidArgumentException("Invalid queue method: $service");
        }

        $providerClass = self::$providers[$service];
        return new $providerClass();
    }

}
