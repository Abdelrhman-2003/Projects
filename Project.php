<?php



class Amazon
{

    public function __construct(public array $categories)
    {
        
    }
    public function showCategories() {
            foreach($this->categories as $categories){
                echo $categories . "\n" ;
            }
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

$amazon->showCategories();
