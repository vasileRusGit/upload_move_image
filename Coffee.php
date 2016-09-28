<?php

require 'vendor/autoload.php';

use Acme\Controller\CoffeeController;



$coffeeController = new CoffeeController();

if (isset($_POST['types'])) {
    //Fill page with coffees of the selected type
    $coffeeTables = $coffeeController->createCoffeeTables($_POST['types']);
}
else
{
    //Page is loaded for the first time, no type selected -> Fetch all types
    $coffeeTables = $coffeeController->createCoffeeTables('%');
}

////Output page data
$title = 'Coffee overview';
$content = $coffeeController->createCoffeeDropdownList() . $coffeeTables;

include 'Template.php';




