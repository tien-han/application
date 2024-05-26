<?php
    /**
     * 328/application/index.php
     * @author Tien Han
     * @date 5/5/2024
     * @description Routing for the website is defined here (this is the Controller).
     */

    //Turn on error reporting
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    //Require the autoload file (for Composer)
    require_once('vendor/autoload.php');

    //Require data-layer
    require_once('model/data-layer.php');

    //Instantiate the F3 Base class (Fat-Free)
    $f3 = Base::instance();
    $controller = new Controller($f3);

    //Define a default route
    $f3->route('GET /', function() {
        $GLOBALS['controller']->home();
    });

    //Our route to the form for gathering personal information
    $f3->route('GET|POST /application-form/personal-information', function() {
        $GLOBALS['controller']->personalInfoForm();
    });

    //The form for gathering experience
    $f3->route('GET|POST /application-form/experience', function() {
        $GLOBALS['controller']->experienceForm();
    });

    //The form for the mailing list
    $f3->route('GET|POST /application-form/mailing-list', function() {
        $GLOBALS['controller']->mailingListForm();
    });

    //The Summary Page
    $f3->route('GET|POST /application-form/summary', function($f3) {
        $GLOBALS['controller']->summary();
    });

    //Run Fat-Free
    $f3->run();
?>