<?php

abstract class Category
{

    abstract function __construct(array $items);
    abstract function show();
}

class ClothesCategory extends Category
{

    public function __construct(public array $items) {}

    public function show()
    {
        foreach ($this->items as $category => $items) {
            echo $category . ":\n";
            foreach ($items as $item) {
                echo "-" . $item . "\n";
            }
        }
    }
}



class Amazon
{

    public function __construct(public array $categories) {}
    public function showCategories()
    {
        foreach ($this->categories as $categories) {
            echo $categories . "\n";
        }
    }

    public function selectCategory(Category $category)
    {
        $category->show();
    }

    public function addToCart() {}

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
            "Jacket",
            "T-Shirt",
            "Trousers",
            "Shoes"
        ],

        "Women" => [
            "Dress",
            "skirt",
            "boots",
            "Shoes"
        ]
    ]
);

$amazon->selectCategory($clothesCategory);
