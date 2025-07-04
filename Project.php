<?php

abstract class Category
{

    public function __construct(public array $items) {}

    public function show()
    {
        foreach ($this->items as $category => $product) {
            echo $category . ":\n";
            foreach ($product as $item) {

                echo "-" . $item["name"] . " => " . $item["price"]  . "\n";
            }
        }
        echo "-------------------------------------";
    }
}



class ClothesCategory extends Category {}

class Amazon
{

    private $x = 1;
    private $totalPrice = 0;

    public function __construct(public array $categories) {}

    public function showCategories()
    {
        foreach ($this->categories as $categories) {
            echo $categories . "\n";
        }
        echo "------------------------------------- \n";
    }

    public function selectCategory(Category $category)
    {
        $category->show();
    }

    public function addToCart(array $items)
    {
        foreach ($items as $item) {
            echo ($this->x === 1) ? "\nAdded " : false;
            $this->x++;
            echo $item["name"] . ", ";
            $this->totalPrice += $item['price'];
        }
        echo "To Cart. \nThe Total Price = {$this->totalPrice}$";
        echo "\n ------------------------------------- \n";
    }

    public function buyItems(PaymentProcess $paymentProcess,  string $price)
    {
        echo ($price == $this->totalPrice) ?
            "The purchase was completed successfully\n{$paymentProcess->PaymentProcess()}." :
            "Not enough money to buy products\n";
    }
}

interface LoginValidate
{
    public function __construct(User $user);
}

interface PaymentProcess
{
    public function PaymentProcess();
}

class User
{
    public function __construct(public string $username, public string $password) {}
}

class Visa implements LoginValidate, PaymentProcess
{
    public function __construct(User $user) {}
    public function PaymentProcess()
    {
        return "Thanks To Use visa Card";
    }
}

class Paypal implements LoginValidate, PaymentProcess
{
    public function __construct(User $user) {}
    public function PaymentProcess()
    {
        return "Thanks To Use Paypal";
    }
}

class MasterCard implements LoginValidate, PaymentProcess
{
    public function __construct(User $user) {}
    public function PaymentProcess()
    {
        return "Thanks To Use Mastercard";
    }
}

//create object contain the Categories Data
$amazon = new Amazon([
    "Clothes Category",
    "Games Category",
    "Home Appliances Category",
    "Computers Category",
    "Study tools Category"
]);

$clothesCategory = new ClothesCategory(
    [
        "Men" => [
            ["name" => "Jacket", "price" => 120],
            ["name" => "T-Shirt", "price" => 100],
            ["name" => "Trousers", "price" => 150],
            ["name" => "Shoes", "price" => 80]
        ],

        "Women" => [
            ["name" => "Dress", "price" => 2000],
            ["name" => "Coat", "price" => 1400],
            ["name" => "Trousers", "price" => 850],
            ["name" => "Shoes", "price" => 1000]
        ]
    ]
);


$amazon->showCategories();

$amazon->selectCategory($clothesCategory);

$amazon->addToCart([$clothesCategory->items["Men"][0], $clothesCategory->items["Women"][3]]);

$amazon->buyItems(new Paypal(new User("Abdelrhman Khaled", "123456789")), 1120);
