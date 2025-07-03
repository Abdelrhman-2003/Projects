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
    }

    public function buyItems() {}
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


//show the All categories in Amazon Shop
$amazon->showCategories();

//select one category to show inside items
$amazon->selectCategory($clothesCategory);

// add the items to cart to buy them
$amazon->addToCart([
    $clothesCategory->items['Men'][0],
    $clothesCategory->items['Men'][2],
    $clothesCategory->items['Women'][0],
    $clothesCategory->items['Women'][1]
]);
