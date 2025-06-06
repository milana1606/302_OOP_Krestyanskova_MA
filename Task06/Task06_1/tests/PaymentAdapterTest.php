<?php

namespace App;

use App\CreditCard;
use App\PayPal;
use App\CreditCardAdapter;
use App\PayPalAdapter;
use App\PaymentAdapterInterface;
use PHPUnit\Framework\TestCase;


class PaymentAdapterTest extends TestCase {
    // Тест для успешного платежа через CreditCardAdapter
    public function testCreditCardPaymentSuccess() {
        $card = new CreditCard(1234567890123456, "12/25");
        $adapter = new CreditCardAdapter($card);
        
        $this->assertTrue(
            $adapter->collectMoney(500),
            "Должен возвращать true при успешной авторизации"
        );
    }

    // Тест для успешного платежа через PayPalAdapter
    public function testPayPalPaymentSuccess() {
        $paypal = new PayPal("valid@email.com", "correct_password");
        $adapter = new PayPalAdapter($paypal);
        
        $this->assertTrue(
            $adapter->collectMoney(300),
            "Должен возвращать true при корректных данных PayPal"
        );
    }

    // Тест для неудачного платежа через PayPalAdapter
    public function testPayPalPaymentFailure() {
        $paypal = new PayPal("invalid@email.com", "wrong_password");
        $adapter = new PayPalAdapter($paypal);
        
        $this->assertFalse(
            $adapter->collectMoney(300),
            "Должен возвращать false при неверных данных PayPal"
        );
    }

    // Тест проверяет формат ответа CreditCard
    public function testCreditCardAuthorizationFormat() {
        $card = new CreditCard(1234567890123456, "12/25");
        $response = $card->transfer(100);
        
        $this->assertStringContainsString(
            "Authorization code:",
            $response,
            "Ответ должен содержать authorization code"
        );
    }

    // Тест проверяет совместимость с клиентским кодом
    public function testClientCodeIntegration() {
        $paypal = new PayPal("client@example.com", "qwerty");
        $cc = new CreditCard(6543210987654321, "06/24");
        
        $this->assertInstanceOf(
            PaymentAdapterInterface::class,
            new PayPalAdapter($paypal),
            "PayPalAdapter должен реализовывать интерфейс"
        );
        
        $this->assertInstanceOf(
            PaymentAdapterInterface::class,
            new CreditCardAdapter($cc),
            "CreditCardAdapter должен реализовывать интерфейс"
        );
    }
}