<?php

include_once 'vendor/autoload.php';

$queueEntity = new \Queue\Entity\SendEntity();
$queueEntity->setTopic('test-topic');
$queueEntity->setMessage(json_encode([
    'name' => 'John Doe',
    'eventType' => 'sendEmail',
    'email' => 'test@test.com'
]));

$queueManager = new \Queue\Queue();
$response = $queueManager->sendQueue('kafka', $queueEntity);
print_r($response);
$response = $queueManager->sendQueue('sqs', $queueEntity);
print_r($response);
