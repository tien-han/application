<?php
    /*
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

    //Require form validation code
    require_once('model/validate.php');

    //Instantiate the F3 Base class (Fat-Free)
    $f3 = Base::instance();

    //Define a default route
    $f3->route('GET /', function() {
        //Render a view page
        $view = new Template();
        echo $view->render('views/home.html');
    });

    //Our route to the form for gathering personal information
    $f3->route('GET|POST /application-form/personal-information', function($f3) {
        //If the user has submitted a post request (i.e. filled out the form)
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Get submitted form data
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $state = $_POST['state'];
            $phone = $_POST['phone'];

            $allValid = true;

            //Perform validation on the submitted first name
            $firstNameError = '';
            if (!empty($firstName)) {
                if (!validName($firstName)) {
                    $allValid = false;
                    $firstNameError = 'Please enter in an alphabetic first name!';
                }
            } else {
                //First name is required
                $allValid = false;
                $firstNameError = 'Please enter your first name.';
            }
            $f3->set('SESSION.firstName', $firstName);
            $f3->set('SESSION.firstNameError', $firstNameError);

            //Perform validation on the submitted last name
            $lastNameError = '';
            if (!empty($lastName)) {
                if (!validName($lastName)) {
                    $allValid = false;
                    $lastNameError = 'Please enter in an alphabetic last name!';
                }
            } else {
                //Last name is required
                $allValid = false;
                $lastNameError = 'Please enter your last name.';
            }
            $f3->set('SESSION.lastName', $lastName);
            $f3->set('SESSION.lastNameError', $lastNameError);

            //Perform validation on the submitted email
            $emailError = '';
            if (!empty($email)) {
                if (!validEmail($email)) {
                    $allValid = false;
                    $emailError = 'Please enter in a valid email!';
                }
            } else {
                //Email is required
                $allValid = false;
                $emailError = 'Please enter an email.';
            }
            $f3->set('SESSION.email', $email);
            $f3->set('SESSION.emailError', $emailError);

            //Perform validation on the submitted state
            $stateError = '';
            if (!empty($state)) {
                if (!validState($state)) {
                    $allValid = false;
                    $stateError = 'Please select a valid state or no state!';
                }
            }
            $f3->set('SESSION.state', $state);
            $f3->set('SESSION.stateError', $stateError);

            //Phone number is required
            if (!empty($phone)) {
                $f3->set('SESSION.phone', $phone);
            } else {
                $allValid = false;
            }

            //Redirect to the experience form page
            if ($allValid) {
                $f3->reroute("experience");
            }
        }

        //Get all the states to populate the job application
        $f3->set('states', getStates());

        //Render a view page
        $view = new Template();
        echo $view->render('views/form-personal-information.html');
    });

    //The form for gathering experience
    $f3->route('GET|POST /application-form/experience', function($f3) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Get submitted form data
            $biography = $_POST['biography'];
            $github = $_POST['github'];
            $experience = $_POST['years_experience'];
            $relocate = $_POST['relocate'];

            $allValid = true;

            //Save any values that have been entered
            if (!empty($biography)) {
                $f3->set('SESSION.biography', $biography);
            }
            if (!empty($github)) {
                $f3->set('SESSION.github', $github);
            }

            //Years of experience is required
            if (empty($experience)) {
                $f3->set('SESSION.experience', $experience);
            } else {
                $allValid = false;
            }

            if (!empty($relocate)) {
                $f3->set('SESSION.relocate', $relocate);
            }

            if ($allValid) {
                //Redirect to the mailing list
                $f3->reroute("mailing-list");
            }
        }
        //Render a view page
        $view = new Template();
        echo $view->render('views/form-experience.html');
    });

    //The mailing list
    $f3->route('GET|POST /application-form/mailing-list', function($f3) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $jobAndMailingLists = '';
            $mailing = '';

            //Get submitted form data
            if ($_POST['job'] != null and $_POST['vertical'] != null) {
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
    $f3->route('GET|POST /application-form/summary', function($f3) {
        //Render a view page
        $view = new Template();
        echo $view->render('views/summary-page.html');
    });

    //Run Fat-Free
    $f3->run();
?>