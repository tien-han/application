<?php
/**
 * 328/application/index.php
 * @author Tien Han
 * @date 4/10/2024
 * @description Routing for the website is defined here.
 * @version 1.0
 */

    //Turn on error reporting
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    //Require the autoload file
    require_once('vendor/autoload.php');

    //Instantiate the F3 Base class (Fat-Free)
    $f3 = Base::instance();

    //Define a default route
    $f3-> route('GET /', function() {
        //Render a view page
        $view = new Template();
        echo $view->render('views/home.html');
    });

    //The form for gathering personal information
    $f3-> route('GET /personal-information', function() {
        //Render a view page
        $view = new Template();
        echo $view->render('views/form-personal-information.html');
    });

    //The form for gathering experience
    $f3-> route('GET /experience', function() {
        //Render a view page
        $view = new Template();
        echo $view->render('views/form-experience.html');
    });

    //The mailing list
    $f3-> route('GET /mailing-list', function() {
        //Render a view page
        $view = new Template();
        echo $view->render('views/mailing-list.html');
    });

    //Run Fat-Free
    $f3->run();
?>