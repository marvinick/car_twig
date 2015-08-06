<?php
    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../src/Car.php';

    session_start();
    if (empty($_SESSION['list_of_cars'])) {
        $_SESSION['list_of_cars'] = array();
    }


    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
      'twig.path' => __DIR__.'/../views'
    ));

    $app->get('/', function() use ($app) {
        return $app['twig']->render('cars.html.twig', array('cars' => Car::getAll()));

    });

    $app->post("/add_car", function() use ($app) {
        $car = new Car($_POST['make_model'], $_POST['make_price'], $_POST['make_miles']);
        $car->save();
        return $app['twig']->render('add_car.html.twig', array('new_car' => $car));
    });

    $app->post("/delete_cars", function() use ($app) {
        Car::deleteAll();
        return $app['twig']->render('delete_cars.html.twig');
    });
    return $app;
    
    //
    // $app->get('/carresults', function(){
    //
    //     $porsche = new Car('2014 Porsche 911', 114991, 7861, 'images/porsche.jpg');
    //     $ford = new Car('2011 Ford F450', 55995, 14241, 'images/ford.jpg');
    //     $lexus = new Car('2013 Lexus RX 350', 44700, 20000, 'images/lexus.jpg');
    //     $mercedes = new Car('Mercedes Benz CLS550', 39900, 37979, 'images/mercedes.jpg');
    //
    //
    //     $cars = array($porsche, $ford, $lexus, $mercedes);
    //
    //     $cars_matching_search = array();
    //
    //
    //     foreach ($cars as $car) {
    //         if (($car->getPrice() < $_GET['price']) && ($car->getMiles() < $_GET['miles']))
    //         {
    //             array_push($cars_matching_search, $car);
    //         }
    //     }
    //     $output = "
    //     <html>
    //     <head>
    //         <title>Your Car Dealership's Homepage</title>
    //         <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
    //     </head>
    //     <body>
    //         <div class='container'>
    //             <h1>Your Car Dealership</h1>";
    //     if (empty($cars_matching_search)) {
    //         $output = $output . "<p>Sorry, there are no cars available.</p>";
    //     }
    //     else {
    //         foreach ($cars_matching_search as $car) {
    //             $output = $output .
    //              "<p>" . $car->getMake() . "</p><p>"
    //              . $car->getPrice() . "</p><p>"
    //              . $car->getMiles() . "</p>";
    //         }
    //
    //         return $output;
    //     }
    // });
    //
    // return $app;
?>
