<?php

namespace Fraud\Services\Inhouse;

use Fraud\Entity\FraudRequestEntity;
use Fraud\Entity\FraudResponseEntity;
use Fraud\FraudInterface;

class Manager implements FraudInterface
{
    public function checkFraud(FraudRequestEntity $fraudRequestEntity): FraudResponseEntity
    {
        $fraudResponseEntity = new FraudResponseEntity();
        $fraudResponseEntity->setIsSafe(true);
        return $fraudResponseEntity;

    }

}