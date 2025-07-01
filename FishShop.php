<?php


class FishTypes
{
    public function __construct(public array $types) {}
}

class FishShop
{
    public function buyFish(array $fishTypes, PaymentProcess $payment, float $money)
    {
        $payment->PaymentProcess($money);
        echo ($fishTypes["Price"] <= $money) ? "The purchase of {$fishTypes["Name"]} was completed successfully." : "There is not enough money to buy fish.!";
    }
}

interface PaymentProcess
{
    public function PaymentProcess(float $money);
}

interface LoginPassword
{
    public function __construct(string $password);
}

class Visa implements PaymentProcess, LoginPassword
{
    public function __construct(public string $password) {}
    public function PaymentProcess(float $money) {}
}

class PayPal implements PaymentProcess, LoginPassword
{
    public function __construct(public string $password) {}
    public function PaymentProcess(float $money) {}
}

class MasterCard implements PaymentProcess, LoginPassword
{
    public function __construct(public string $password) {}
    public function PaymentProcess(float $money) {}
}




$fishTypes = new FishTypes([
    [
        "Name" => "Selemon",
        "Imported From" => "Jaban",
        "Price" => "100"
    ],
    [
        "Name" => "Sengari",
        "Imported From" => "Saudi Arabi",
        "Price" => "70"
    ],
    [
        "Name" => "Bore",
        "Imported From" => "Egypt",
        "Price" => "50"
    ],
    [
        "Name" => "Kaboria",
        "Imported From" => "America",
        "Price" => "20"
    ]
]);

$fishShop = new FishShop();
$fishShop->buyFish($fishTypes->types[3], new Visa("123456789"), 50);
