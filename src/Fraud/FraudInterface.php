<?php

namespace Fraud;

use Fraud\Entity\FraudRequestEntity;
use Fraud\Entity\FraudResponseEntity;

interface FraudInterface
{
    public function checkFraud(FraudRequestEntity $fraudRequestEntity): FraudResponseEntity;

}