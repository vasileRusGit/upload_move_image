<?php

namespace Acme\Model;

use Acme\Entities\CoffeeEntity;

//Contains database related code for the Coffee page.
class CoffeeModel
{

    //Get all coffee types from the database and return them in an array.
    public function getCoffeeTypes()
    {
        //Login data for the database. Use this file in all Models
        $host = "localhost";
        $user = "root";
        $pass = "";
        $database = "mytodo";

        //Open connection and Select database.
        $databaseConnection = mysqli_connect($host, $user, $pass, $database) or die(mysqli_error());

        $query = "SELECT DISTINCT type FROM coffee";
        $result = mysqli_query($databaseConnection, $query) or die(mysqli_error());
        $types = array();

        //Get data from database.
        while ($row = mysqli_fetch_array($result)) {
            array_push($types, $row[0]);
        }

        //Close connection and return result.
        mysqli_close($databaseConnection);
        return $types;
    }

    //Get coffeeEntity objects from the database and return them in an array.
    public function getCoffeeByType($type)
    {
        //Login data for the database. Use this file in all Models
        $host = "localhost";
        $user = "root";
        $pass = "";
        $database = "mytodo";

        //Open connection and Select database.
        $databaseConnection = mysqli_connect($host, $user, $pass, $database) or die(mysqli_error());

        $query = "SELECT * FROM coffee WHERE type LIKE '$type'";
        $result = mysqli_query($databaseConnection, $query) or die(mysqli_error($databaseConnection));
        $coffeeArray = array();

        //Get data from database.
        while ($row = mysqli_fetch_array($result)) {
            $id = $row[0];
            $name = $row[1];
            $type = $row[2];
            $price = $row[3];
            $roast = $row[4];
            $country = $row[5];
            $image = $row[6];
            $review = $row[7];

            //Create coffee objects and store them in an array.
            $coffee = new CoffeeEntity($id, $name, $type, $price, $roast, $country, $image, $review);
            array_push($coffeeArray, $coffee);
        }
        //Close connection and return result
        mysqli_close($databaseConnection);
        return $coffeeArray;
    }

    public function getCoffeeById($id)
    {
        //Login data for the database. Use this file in all Models
        $host = "localhost";
        $user = "root";
        $pass = "";
        $database = "mytodo";

        //Open connection and Select database.
        $databaseConnection = mysqli_connect($host, $user, $pass, $database) or die(mysqli_error);

        $query = "SELECT * FROM coffee WHERE id = $id";
        $result = mysqli_query($databaseConnection, $query) or die(mysqli_error($databaseConnection));

        //Get data from database.
        while ($row = mysqli_fetch_array($result)) {
            $name = $row[1];
            $type = $row[2];
            $price = $row[3];
            $roast = $row[4];
            $country = $row[5];
            $image = $row[6];
            $review = $row[7];

            //Create coffee
            $coffee = new CoffeeEntity($id, $name, $type, $price, $roast, $country, $image, $review);
        }
        //Close connection and return result
        mysqli_close($databaseConnection);
        return $coffee;
    }

    public function insertCoffee(CoffeeEntity $coffee)
    {
        //Login data for the database. Use this file in all Models
        $host = "localhost";
        $user = "root";
        $pass = "";
        $database = "mytodo";

        //Open connection and Select database.
        $databaseConnection = mysqli_connect($host, $user, $pass, $database) or die(mysqli_error());

        $query = sprintf("INSERT INTO coffee (name, type, price, roast, country, image, review) VALUES
                                             ('%s', '%s' , '%s'  ,'%s'  , '%s'   ,'%s'  ,'%s')",
            mysqli_real_escape_string($databaseConnection, $coffee->name),
            mysqli_real_escape_string($databaseConnection, $coffee->type),
            mysqli_real_escape_string($databaseConnection, $coffee->price),
            mysqli_real_escape_string($databaseConnection, $coffee->roast),
            mysqli_real_escape_string($databaseConnection, $coffee->country),
            mysqli_real_escape_string($databaseConnection, "Images/Coffee/" . $coffee->image),
            mysqli_real_escape_string($databaseConnection, $coffee->review));

        //execute query and close connection
        $this->performQuery($query);
    }


    public function performQuery($query)
    {
        //Login data for the database. Use this file in all Models
        $host = "localhost";
        $user = "root";
        $pass = "";
        $database = "mytodo";

        //Open connection and Select database.
        $databaseConnection = mysqli_connect($host, $user, $pass, $database) or die(mysqli_error());

        //execute query and close connection
        mysqli_query($databaseConnection, $query) or die(mysqli_error($databaseConnection));
        mysqli_close($databaseConnection);
    }

    public function updateCoffee($id, \CoffeeEntity $coffee)
    {
        //Login data for the database. Use this file in all Models
        $host = "localhost";
        $user = "root";
        $pass = "";
        $database = "mytodo";

        //Open connection and Select database.
        $databaseConnection = mysqli_connect($host, $user, $pass, $database) or die(mysqli_error());

        $query = sprintf("UPDATE coffee SET name='%s', type='%s', price='%s', roast='%s', country='%s', image='%s', review='%s' 
                                        WHERE id=$id",
            mysqli_real_escape_string($databaseConnection, $coffee->name),
            mysqli_real_escape_string($databaseConnection, $coffee->type),
            mysqli_real_escape_string($databaseConnection, $coffee->price),
            mysqli_real_escape_string($databaseConnection, $coffee->roast),
            mysqli_real_escape_string($databaseConnection, $coffee->country),
            mysqli_real_escape_string($databaseConnection, "Images / Coffee / " . $coffee->image),
            mysqli_real_escape_string($databaseConnection, $coffee->review));

        $this->performQuery($query);
    }

    public function deleteCoffee($id)
    {
        $query = "DELETE FROM coffee where id = $id";
        $this->performQuery($query);
    }


}
