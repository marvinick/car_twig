<?php
    class Car
    {
        private $make_model;
        private $make_price;
        private $make_miles;
        private $make_photo;

        function __construct($car_make, $car_price, $car_miles, $car_photo = "images/ford.jpg")
        {
            $this->make_model = $car_make;
            $this->make_price = $car_price;
            $this->make_miles = $car_miles;
            $this->make_photo = $car_photo;
            //trying to pass empty variable in constructor
            /*if ($car_photo = null)
            {
                $this->make_photo = 'images/ford.jpg';
            }*/

        }
        function setMake($new_make)
        {
            $model = (string) $new_make;
        }

        function getMake()
        {
            return $this->make_model;
        }

        function setPrice($new_price)
        {
            $price = (float) $new_price;
        }

        function getPrice()
        {
            return $this->make_price;
        }

        function setMiles($new_miles)
        {
            $miles = (float) $new_miles;
        }

        function getMiles()
        {
            return $this->make_miles;
        }

        function setPhoto($new_photo)
        {
            $this->make_photo = $new_photo;
        }

        function getPhoto()
        {
            return $this->make_photo;
        }

        function worthBuying($max_price)
        {
            return $this->make_price < ($max_price + 100);
        }

        function save() {
            array_push($_SESSION['list_of_cars'], $this);
        }

        static function getAll()
        {
            return $_SESSION['list_of_cars'];
        }

        static function deleteAll() {
            $_SESSION['list_of_cars'] = array();
        }
    }

/*    $porsche = new Car('2014 Porsche 911', 114991, 7861, 'images/porsche.jpg');
    $ford = new Car('2011 Ford F450', 55995, 14241, 'images/ford.jpg');
    $lexus = new Car('2013 Lexus RX 350', 44700, 20000, 'images/lexus.jpg');
    $mercedes = new Car('Mercedes Benz CLS550', 39900, 37979, 'images/mercedes.jpg');

    $cars = array($porsche, $ford, $lexus, $mercedes);

    $cars_matching_search = array();*/
//    foreach ($cars as $car) {
//            array_push($cars_matching_search, $car);
//        }
//    }
?>

<!--<!DOCTYPE html>
<html>
<head>
    <title>Your Car Dealership's Homepage</title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
</head>
<body>
    <div class='container'>
        <h1>Your Car Dealership</h1>
        <ul>
            <?php
                /*if (empty($cars_matching_search)) {
                    echo 'Sorry, there are no cars available.';
                } else {
                    foreach ($cars_matching_search as $car) {
                        $car_make = $car->getMake();
                        $car_price = $car->getPrice();
                        $car_miles = $car->getMiles();
                        echo '<li><img class='img-rounded' src='$car->make_photo'></li>';
                        echo '<li> $car_make </li>';
                        echo '<ul>';
                            echo '<li> $car_price </li>';
                            echo '<li> Miles: $car_miles </li>';
                        echo'</ul>';

                    }
                }*/
            ?>
        </ul>
     </div>
</body>
</html>-->
