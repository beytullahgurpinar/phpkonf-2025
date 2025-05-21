<?php

namespace Fraud\Services\Verifi;

use Fraud\Entity\FraudRequestEntity;
use Fraud\Entity\FraudResponseEntity;
use Fraud\FraudAbstract;
use Fraud\FraudInterface;

class Manager extends FraudAbstract implements FraudInterface
{
    public function checkFraud(FraudRequestEntity $fraudRequestEntity): FraudResponseEntity
    {
        $response = $this->sendRequest('https://api.adyen.com/process', $fraudRequestEntity->toArray());

        if ($response['status'] !== 'SUCCESS') {
            $fraudResponseEntity = new FraudResponseEntity();
            $fraudResponseEntity->setIsSafe(false);
            $fraudResponseEntity->setMessage('Fraud check failed.');
            $fraudResponseEntity->setResponseData($response);
            return $fraudResponseEntity;
        } else {
            $fraudResponseEntity = new FraudResponseEntity();
            $fraudResponseEntity->setIsSafe(true);
            $fraudResponseEntity->setMessage('Fraud check passed.');
            $fraudResponseEntity->setResponseData($response);
        }

        return $fraudResponseEntity;

    }

}