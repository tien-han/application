<?php
/**
 * The Controller class defines methods that can be called for routing.
 * php version 7.4.33
 *
 * @category   Controller
 * @package    Controller
 * @subpackage Application/Controller
 * @author     Tien Han <han.tien@student.greenriver.edu>
 * @date       5/26/2024
 * @license    No applicable license
 * @version    CVS: $Id$
 * @link       https://tienthan.greenriverdev.com/328/application/
 */

/**
 * Controller
 *
 * @category Controller
 * @package  Controller
 * @author   Tien Han <han.tien@student.greenriver.edu>
 * @license  No applicable license
 * @link     https://tienthan.greenriverdev.com/328/application/
 */
class Controller
{
    private $_f3; //Fat-Free Router

    /**
     * Constructor creates a Controller object, which instantiates Fat-Free
     *
     * @param Base $f3 Fat-Free
     */
    function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    /**
     * The method for rendering the homepage
     *
     * @return void
     */
    function home(): void
    {
        //Render a view page
        $view = new Template();
        echo $view->render('views/home.html');
    }

    //TODO: Allow an applicant to upload an image of themselves
    //  and display the image on the summary page.
    /**
     * THe method for rendering the form for personal information
     *
     * @return void
     */
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
            $this->_f3->set('SESSION.emailError', $emailError);

            //Perform validation on the submitted state
            $stateError = '';
            if (!empty($state)) {
                if (!Validate::validState($state)) {
                    $allValid = false;
                    $stateError = 'Please select a valid state or no state!';
                }
            }
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
            $this->_f3->set('SESSION.phoneError', $phoneError);

            //Record whether the applicant wants to sign up for mailing lists or not
            if (isset($_POST['optInML'])) {
                //If the applicant would like to subscribe to mailing lists
                $applicant = new Applicant_SubscribedToLists(
                    $firstName, $lastName, $email, $state, $phone
                );
            } else {
                //If the applicant doesn't want to subscribe to mailing lists
                $applicant = new Applicant(
                    $firstName, $lastName, $email, $state, $phone
                );
            }
            $this->_f3->set('SESSION.applicant', $applicant);

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

    /**
     * The method for rendering the form for personal experience
     *
     * @return void
     */
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
                $this->_f3->get('SESSION.applicant')->setBio($biography);
            } else {
                $this->_f3->get('SESSION.applicant')->setBio(null);
            }

            //Perform validation on the submitted GitHub Link if any was submitted
            $githubError = '';
            if (!empty($github)) {
                if (!Validate::validGitHub($github)) {
                    $allValid = false;
                    $githubError = 'Please enter in a valid URL!';
                }
                $this->_f3->get('SESSION.applicant')->setGithub($github);
                $this->_f3->set('SESSION.githubError', $githubError);
            } else {
                $this->_f3->get('SESSION.applicant')->setGithub(null);
            }

            //Perform validation on the submitted Years of Experience
            $yearsExperienceError = '';
            if (!empty($experience)) {
                if (!Validate::validExperience($experience)) {
                    $allValid = false;
                    $yearsExperienceError = 'Please select one of the years!';
                }
                $this->_f3->get('SESSION.applicant')->setExperience($experience);
            } else {
                //Years of experience is required
                $allValid = false;
                $yearsExperienceError = 'Please select your years of experience.';
                $this->_f3->get('SESSION.applicant')->setExperience(null);
            }
            $this->_f3->set('SESSION.experienceError', $yearsExperienceError);

            //Perform validation on relocation if any was submitted
            $relocationError = '';
            if (!empty($relocate)) {
                if (!Validate::validRelocation($relocate)) {
                    $allValid = false;
                    $relocationError = 'Please select one of the options!';
                }
                $this->_f3->get('SESSION.applicant')->setRelocate($relocate);
                $this->_f3->set('SESSION.relocationError', $relocationError);
            } else {
                $this->_f3->get('SESSION.applicant')->setRelocate(null);
            }

            if ($allValid) {
                //Check to see if the user would like to see mailing lists
                $applicantType = $this->_f3->get('SESSION.applicant');
                if (get_Class($applicantType) == 'Applicant_SubscribedToLists') {
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

    /**
     * The method for rendering the form with mailing list checkboxes
     *
     * @return void
     */
    function mailingListForm(): void
    {
        //If the user has submitted a post request (i.e. filled out the form)
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($_POST['job'] != null) {
                $this->_f3->get('SESSION.applicant')
                    ->setSelectionsJobs($_POST['job']);
            } else {
                $this->_f3->get('SESSION.applicant')->setSelectionsJobs([null]);
            }

            if ($_POST['vertical'] != null) {
                $this->_f3->get('SESSION.applicant')
                    ->setSelectionVerticals($_POST['vertical']);
            } else {
                $this->_f3->get('SESSION.applicant')->setSelectionVerticals([null]);
            }

            //TODO: Validate that the selected checkbox items is valid

            //Redirect to the summary page
            $this->_f3->reroute("application-form/summary");
        }

        //Get all mailing list items
        $this->_f3->set('mailingList', getMailingLists());

        //Render a view page
        $view = new Template();
        echo $view->render('views/mailing-list.html');
    }

    /**
     * The method for rendering the summary page
     *
     * @return void
     */
    function summary(): void
    {
        //Render a view page
        $view = new Template();
        echo $view->render('views/summary-page.html');
    }
}