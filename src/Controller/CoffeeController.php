<?php

namespace Acme\Controller;

use Acme\Entities\CoffeeEntity;
use Acme\Model\CoffeeModel;

class CoffeeController
{

    function createCoffeeDropdownList()
    {
        $coffeeModel = new CoffeeModel();
        $result = "<div class='row-fluid''> <form action = ''  method='post'>
                        <div class='span4' style='margin-top: -5px;'><h4>Please select a type: </h4></div>
                        <div class='span4'><select name = 'types' >
                         <option value = '%'  >All</option>
                             " . $this->createOptionValues($coffeeModel->getCoffeeTypes()) .
            "</select></div>
                        <div class='span2'><input type = 'submit' class='btn btn-primary' value = 'Search' /></div>
                    </form></div><br />";

        return $result;
    }

    function createOptionValues(array $valueArray)
    {
        $result = "";

        foreach ($valueArray as $value) {
            $result = $result . "<option value='$value'>$value</option>";
        }

        return $result;
    }

    function createCoffeeTables($types)
    {
        $coffeeModel = new CoffeeModel();
        $coffeeArray = $coffeeModel->getCoffeeByType($types);
        $result = "";

        //Generate a coffeeTable for each coffeeEntity in array
        foreach ($coffeeArray as $key => $coffee) {
            $result = $result .
                "<table class = 'coffeeTable'>
                        <tr>
                            <th rowspan='6' width = '150px' ><img runat = 'server' src = '$coffee->image' /></th>
                            <th width = '75px' >Name: </th>
                            <td>$coffee->name</td>
                        </tr>
                        
                        <tr>
                            <th>Type: </th>
                            <td>$coffee->type</td>
                        </tr>
                        
                        <tr>
                            <th>Price: </th>
                            <td>$coffee->price</td>
                        </tr>
                        
                        <tr>
                            <th>Roast: </th>
                            <td>$coffee->roast</td>
                        </tr>
                        
                        <tr>
                            <th>Origin: </th>
                            <td>$coffee->country</td>
                        </tr>
                        
                        <tr>
                            <td colspan='2' >$coffee->review</td>
                        </tr>
                     </table>";
        }
        return $result;

    }

    public function getImages()
    {
        //select folder to scan
        $handle = opendir("Images/Coffee");

        //read all files and store names in array
        while ($image = readdir($handle)) {
            $images[] = $image;
        }

        closedir($handle);

        //execute all file names where length < 3
        $imageArray = array();
        foreach ($images as $image) {
            if (strlen($image) > 2) {
                array_push($imageArray, $image);
            }
        }

        //create <select><option> values and return result
        $result = $this->createOptionValues($imageArray);
        return $result;
    }

    public function insertCoffee()
    {
        $name    = $_POST["txtName"];
        $type    = $_POST["ddlType"];
        $price   = $_POST["txtPrice"];
        $roast   = $_POST["txtRoast"];
        $country = $_POST["txtCountry"];
        $image   = $_POST["ddlImage"];
        $review  = $_POST["txtReview"];

        $coffee = new CoffeeEntity(-1, $name, $type, $price, $roast, $country, $image, $review);
        $coffeeModel = new CoffeeModel();
        $coffeeModel->insertCoffee($coffee);
    }

    public function updateCoffee($id)
    {

    }

    public function deleteCoffee($id)
    {

    }

    public function getCoffeeById($id)
    {
        $coffeeModel = new CoffeeModel();
        return $coffeeModel->getCoffeeById($id);
    }

    public function getCoffeeByType($type)
    {
        $coffeeModel = new CoffeeModel();
        return $coffeeModel->getCoffeeByType($type);
    }

    public function getCoffeeTypes()
    {
        $coffeeModel = new CoffeeModel();
        return $coffeeModel->getCoffeeTypes();
    }

}

