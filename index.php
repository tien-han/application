<?php
/**
 * 328/application/index.php
 * @author Tien Han
 * @date 4/21/2024
 * @description Routing for the website is defined here.
 */

    //Turn on error reporting
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    //Require the autoload file (for Composer)
    require_once('vendor/autoload.php');

    //Instantiate the F3 Base class (Fat-Free)
    $f3 = Base::instance();

    //Define a default route
    $f3->route('GET /', function() {
        //Render a view page
        $view = new Template();
        echo $view->render('views/home.html');
    });

    //The form for gathering personal information
    $f3->route('GET|POST /personal-information', function($f3) {
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

            //Redirect to the experience form page
            $f3->reroute("experience");
        }

        //Render a view page
        $view = new Template();
        echo $view->render('views/form-personal-information.html');
    });

    //The form for gathering experience
    $f3-> route('GET|POST /experience', function($f3) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Get submitted form data
            $biography = $_POST['biography'];
            $github = $_POST['github'];
            $experience = $_POST['years_experience'];
            $relocate = $_POST['relocate'];

            //Save any values that have been entered
            if (!empty($biography)) {
                $f3->set('SESSION.biography', $biography);
            }
            if (!empty($github)) {
                $f3->set('SESSION.github', $github);
            }
            if (!empty($experience)) {
                $f3->set('SESSION.experience', $experience);
            }
            if (!empty($relocate)) {
                $f3->set('SESSION.relocate', $relocate);
            }

            //Redirect to the mailing list
            $f3->reroute("mailing-list");
        }
        //Render a view page
        $view = new Template();
        echo $view->render('views/form-experience.html');
    });

    //The mailing list
    $f3-> route('GET|POST /mailing-list', function($f3) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $jobAndMailingLists = '';
            $mailing = '';

            //Get submitted form data
            if ($_POST['job'] != null AND $_POST['vertical'] != null) {
                $jobAndMailingLists = array_merge($_POST['job'], $_POST['vertical']);
            } else if ($_POST['job'] != null) {
                $jobAndMailingLists = $_POST['job'];
            } else if ($_POST['vertical'] != null) {
                $jobAndMailingLists = $_POST['vertical'];
            }

            if (gettype($jobAndMailingLists) == 'array') {
                $mailing = implode(", ", $jobAndMailingLists);
            }

            //Save any values that have been entered
            $f3->set('SESSION.mailing', $mailing);

            //Redirect to the summary page
            $f3->reroute("summary");
        }

        //Render a view page
        $view = new Template();
        echo $view->render('views/mailing-list.html');
    });

    //The Summary Page
    $f3-> route('GET|POST /summary', function($f3) {
        //Render a view page
        $view = new Template();
        echo $view->render('views/summary-page.html');
    });

    //Run Fat-Free
    $f3->run();
?>