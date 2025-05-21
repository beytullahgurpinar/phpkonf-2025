<?php

namespace Fraud;

use Fraud\Services\Inhouse\Manager as InhouseManager;
use Fraud\Services\Verifi\Manager as VerifiManager;

class FraudFactory
{
    private static array $providers = [
        'inhouse' => InhouseManager::class,
        'verifi' => VerifiManager::class,
    ];

    public static function createFraudProvider(string $type): FraudInterface
    {
        if (!isset(self::$providers[$type])) {
            throw new \InvalidArgumentException("Invalid fruud method: $type");
        }

        $providerClass = self::$providers[$type];
        return new $providerClass();
    }
}
