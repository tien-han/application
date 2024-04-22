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

    //Start F3 session (equivalent to PHP $_SESSION)
    new Session();

    //Define a default route
    $f3->route('GET /', function() {
        //Render a view page
        $view = new Template();
        echo $view->render('views/home.html');
    });

    //The form for gathering personal information
    $f3->route('GET|POST /personal-information', function() {
        //Render a view page
        $view = new Template();
        echo $view->render('views/form-personal-information.html');
    });

    //The form for gathering experience
    $f3-> route('GET|POST /experience', function($f3) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Get submitted form data
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $state = $_POST['state'];
            $phone = $_POST['phone'];

            //Save any values that have been entered
            if (!empty($fname)) {
                $f3->set('SESSION.fname', $fname);
            }
            if (!empty($lname)) {
                $f3->set('SESSION.lname', $lname);
            }
            if (!empty($email)) {
                $f3->set('SESSION.email', $email);
            }
            if (!empty($state)) {
                $f3->set('SESSION.state', $state);
            }
            if (!empty($phone)) {
                $f3->set('SESSION.phone', $phone);
            }

            //Render a view page
            $view = new Template();
            echo $view->render('views/form-experience.html');
        }
    });

    //The mailing list
    $f3-> route('GET|POST /mailing-list', function() {
        //Render a view page
        $view = new Template();
        echo $view->render('views/mailing-list.html');
    });

//The Summary Page
$f3-> route('GET|POST /summary', function() {
    //Render a view page
    $view = new Template();
    echo $view->render('views/summary-page.html');
});

    //Run Fat-Free
    $f3->run();
?>