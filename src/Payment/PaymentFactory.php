<?php

namespace Payment;

use Payment\Gateways\Adyen\Manager as AdyenManager;
use Payment\Gateways\PayPal\Manager as PayPalManager;
use Payment\Gateways\Garanti\Manager as GarantiManager;
use Payment\Gateways\Stripe\Manager as StripeManager;

class PaymentFactory
{
    private static array $providers = [
        'adyen' => AdyenManager::class,
        'garanti' => GarantiManager::class,
        'stripe' => StripeManager::class,
        'paypal' => PayPalManager::class,
    ];

    public static function createPaymentProvider(string $type): PaymentInterface
    {
        if (!isset(self::$providers[$type])) {
            throw new \InvalidArgumentException("Invalid payment method: $type");
        }

        $providerClass = self::$providers[$type];
        return new $providerClass();
    }

    public static function registerPaymentProvider(string $type, string $providerClass): void
    {
        if (!class_exists($providerClass) || !in_array(PaymentInterface::class, class_implements($providerClass))) {
            throw new \InvalidArgumentException("Geçersiz provider sınıfı");
        }

        self::$providers[$type] = $providerClass;
    }
}
