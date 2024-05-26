<?php
    /**
     * @description: This is the Controller class that defines a method for each route.
     * @author: Tien Han
     * @date: 5/26/2024
     */

    class Controller
    {
        private $_f3; //Fat-Free Router

        function __construct($f3)
        {
            $this->_f3 = $f3;
        }

        function home(): void
        {
            //Render a view page
            $view = new Template();
            echo $view->render('views/home.html');
        }

        function personalInfoForm(): void
        {
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
                    if (!Validate::validName($firstName)) {
                        $allValid = false;
                        $firstNameError = 'Please enter in an alphabetic first name!';
                    }
                } else {
                    //First name is required
                    $allValid = false;
                    $firstNameError = 'Please enter your first name.';
                }
                $this->_f3->set('SESSION.firstName', $firstName);
                $this->_f3->set('SESSION.firstNameError', $firstNameError);

                //Perform validation on the submitted last name
                $lastNameError = '';
                if (!empty($lastName)) {
                    if (!Validate::validName($lastName)) {
                        $allValid = false;
                        $lastNameError = 'Please enter in an alphabetic last name!';
                    }
                } else {
                    //Last name is required
                    $allValid = false;
                    $lastNameError = 'Please enter your last name.';
                }
                $this->_f3->set('SESSION.lastName', $lastName);
                $this->_f3->set('SESSION.lastNameError', $lastNameError);

                //Perform validation on the submitted email
                $emailError = '';
                if (!empty($email)) {
                    if (!Validate::validEmail($email)) {
                        $allValid = false;
                        $emailError = 'Please enter in a valid email!';
                    }
                } else {
                    //Email is required
                    $allValid = false;
                    $emailError = 'Please enter an email.';
                }
                $this->_f3->set('SESSION.email', $email);
                $this->_f3->set('SESSION.emailError', $emailError);

                //Perform validation on the submitted state
                $stateError = '';
                if (!empty($state)) {
                    if (!Validate::validState($state)) {
                        $allValid = false;
                        $stateError = 'Please select a valid state or no state!';
                    }
                }
                $this->_f3->set('SESSION.state', $state);
                $this->_f3->set('SESSION.stateError', $stateError);

                //Perform validation on the submitted phone number
                $phoneError = '';
                if (!empty($phone)) {
                    if (!Validate::validPhone($phone)) {
                        $allValid = false;
                        $phoneError = 'Please enter in a valid phone number!';
                    }
                } else {
                    //Phone number is required
                    $allValid = false;
                    $phoneError = 'Please enter a phone number.';
                }
                $this->_f3->set('SESSION.phone', $phone);
                $this->_f3->set('SESSION.phoneError', $phoneError);

                //Record whether the applicant wants to sign up for mailing lists or not
                if (isset($_POST['optInML'])) {
                    $this->_f3->set('SESSION.optInML', true);
                } else {
                    $this->_f3->set('SESSION.optInML', false);
                }

                //Redirect to the experience form page
                if ($allValid) {
                    $this->_f3->reroute("application-form/experience");
                }
            }

            //Get all the states to populate the job application
            $this->_f3->set('states', getStates());

            //Render a view page
            $view = new Template();
            echo $view->render('views/form-personal-information.html');
        }

        function experienceForm(): void
        {
            //If the user has submitted a post request (i.e. filled out the form)
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                //Get submitted form data
                $biography = $_POST['biography'];
                $github = $_POST['github'];
                $experience = $_POST['years_experience'];
                $relocate = $_POST['relocate'];

                $allValid = true;

                //Save any text entered for biography
                if (!empty($biography)) {
                    $this->_f3->set('SESSION.biography', $biography);
                }

                //Perform validation on the submitted GitHub Link if any was submitted
                $githubError = '';
                if (!empty($github)) {
                    if (!Validate::validGitHub($github)) {
                        $allValid = false;
                        $githubError = 'Please enter in a valid URL!';
                    }
                    $this->_f3->set('SESSION.github', $github);
                    $this->_f3->set('SESSION.githubError', $githubError);
                }

                //Perform validation on the submitted Years of Experience
                $yearsExperienceError = '';
                if (!empty($experience)) {
                    if (!Validate::validExperience($experience)) {
                        $allValid = false;
                        $yearsExperienceError = 'Please select one of the years of experience!';
                    }
                } else {
                    //Years of experience is required
                    $allValid = false;
                    $yearsExperienceError = 'Please select your years of experience.';
                }
                $this->_f3->set('SESSION.experience', $experience);
                $this->_f3->set('SESSION.experienceError', $yearsExperienceError);

                //Perform validation on the submitted relocation selection if any was submitted
                $relocationError = '';
                if (!empty($relocate)) {
                    if (!Validate::validRelocation($relocate)) {
                        $allValid = false;
                        $relocationError = 'Please select one of the options for Willing to Relocate!';
                    }
                    $this->_f3->set('SESSION.relocate', $relocate);
                    $this->_f3->set('SESSION.relocationError', $relocationError);
                }

                if ($allValid) {
                    //Check to see if the user would like to see mailing lists
                    if ($this->_f3->get('SESSION.optInML')) {
                        //Redirect to the mailing list
                        $this->_f3->reroute("application-form/mailing-list");
                    }

                    //If the user isn't interested in any mailing lists
                    //Redirect to the summary page
                    $this->_f3->reroute("application-form/summary");
                }
            }

            //Get all the years of experience to populate the job application
            $this->_f3->set('yearsExperience', getYearsExperience());

            //Get all the options for willing to relocate to populate the job application
            $this->_f3->set('willingToRelocate', getRelocation());

            //Render a view page
            $view = new Template();
            echo $view->render('views/form-experience.html');
        }

        function mailingListForm(): void
        {
            //If the user has submitted a post request (i.e. filled out the form)
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

                //TODO: Validate that the selected items in the checkboxes is valid (in our list)

                //Save any values that have been entered
                $this->_f3->set('SESSION.mailing', $mailing);

                //Redirect to the summary page
                $this->_f3->reroute("application-form/summary");
            }

            //Get all mailing list items
            $this->_f3->set('mailingList', getMailingLists());

            //Render a view page
            $view = new Template();
            echo $view->render('views/mailing-list.html');
        }

        function summary(): void
        {
            //Render a view page
            $view = new Template();
            echo $view->render('views/summary-page.html');
        }
    }