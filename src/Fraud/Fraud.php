<?php

namespace Fraud;

use Fraud\Entity\FraudRequestEntity;
use Fraud\Entity\FraudResponseEntity;

class Fraud
{
    public function checkFraud(FraudRequestEntity $fraudRequestEntity, $provider = 'inhouse'): FraudResponseEntity
    {
        return FraudFactory::createFraudProvider($provider)->checkFraud($fraudRequestEntity);
    }

}