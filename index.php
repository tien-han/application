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

//Run Fat-Free
$f3->run();
?>