<?php

require 'vendor/autoload.php';

use Acme\Controller\CoffeeController;

$coffeeController = new CoffeeController();

$title = "Add new Coffee";
$content = "<form action='#' class='form-inline' method='post' id='submit-form'>
                <fieldset>
                    <legend>Add a new Coffee</legend>
                    
                    <div class=\"row-fluid \">
                        <div class='span2'> <label for='name'>Name</label></div>
                        <div class='span8'> <input  type='text' class='inputField' id='form-name' name='txtName' /><br /></div>
                    </div>
                    
                    <div class=\"row-fluid\">
                        <div class='span2'> <label for='type'>Type</label></div>
                        <div class='span8'><select  class='col-md-5' name='ddlType'>
                            <option value='%'>All</option>" . $coffeeController->createOptionValues($coffeeController->getCoffeeTypes()) . "
                        </select><br /></div>
                    </div>

                    <div class=\"row-fluid\">
                        <div class='span2'> <label for='price'>Price</label></div>
                        <div class='span8'><input  type='text' class='inputField' name='txtPrice' /><br /></div>
                    </div>
                    
                    <div class=\"row-fluid\">
                        <div class='span2'> <label for='roast'>Roast</label></div>
                        <div class='span8'><input  type='text' class='inputField' name='txtRoast' /><br /></div>
                    </div>

                    <div class=\"row-fluid\">
                        <div class='span2'> <label for='country'>Country</label></div>
                        <div class='span8'><input   type='text' class='inputField' name='txtCountry' /><br /></div>
                    </div>
                    
                    <div class=\"row-fluid\">
                        <div class='span2'> <label for='image'>Image</label></div>
                        <div class='span8'><select class='inputField' id='form-image' name='ddlImage'>" . $coffeeController->getImages() . "</select><br /></div>
                    </div>
                    
                    <div class=\"row-fluid\">
                        <div class='span2'> <label for='review'>Review</label></div>
                        <div class='span8'><textarea style='width: 500px; height: 120px;' cols='100' row='12' name='txtReview' ></textarea><br /></div>
                    </div>
                    
                    <div class=\"row-fluid\">
                        <div class='span2'></div>
                        <div class='span8'><input class='btn btn-primary' style='float: left;' type='submit' value='Submit'></div>
                    </div>

                </fieldset>
            </form>";

if(isset($_POST["txtName"]) ){
    $coffeeController->insertCoffee();
} else {
    include "Template.php";
}