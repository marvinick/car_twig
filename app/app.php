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

    $app->get('/car_results', function() use ($app) {

        $cars_matching_search = array();
        $porsche = new Car('2014 Porsche 911', 114991, 7861, 'images/porsche.jpg');
        $ford = new Car('2011 Ford F450', 55995, 14241, 'images/ford.jpg');
        $lexus = new Car('2013 Lexus RX 350', 44700, 20000, 'images/lexus.jpg');
        $mercedes = new Car('Mercedes Benz CLS550', 39900, 37979, 'images/mercedes.jpg');
        $cars = array($porsche, $ford, $lexus, $mercedes);

        foreach ($cars as $car) {
            if (($car->getPrice() < $_GET['price']) && ($car->getMiles() < $_GET['miles']))
             {
                 array_push($cars_matching_search, $car);
             }
        }
        return $app['twig']->render('car_results.html.twig');
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
    //
    //
    //
    //
    //
    //      {
    //
    //     }
    //     $output = "
    //
    //         return $output;
    //     }
    // });
    //
    // return $app;
?>
