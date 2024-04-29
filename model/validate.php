<?php
/*
 * 328/application/model/validate.php
 * @author Tien Han
 * @date 4/28/2024
 * @description Validation for form responses.
 */

    //Turn on error reporting
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    //Check to see that a string is all alphabetic (no numbers)
    //TODO: make sure that people can't just enter in a space
    function validName($string) {
        if (ctype_alpha($string)) {
            echo "Yes, the string is all alphabetic.";
        } else {
            echo "No, the string is not all alphabetic.";
        }
    }

    //Check to see that a string is a valid url.
    function validGithub($url) {
        if (filter_var($url, FILTER_VALIDATE_URL)) {
            echo "Yes, the url is valid.";
        } else {
            echo "No, the url is not valid.";
        }
    }

    //TODO: Check what this means
    //Check to see that a string is a valid "value" property
    function validExperience($string) {
        //???
    }

    //Check to see that a phone number is valid
    function validPhone($phoneNumber) {
        //Get numerical values only out of the phone number
        //Regex to only pull out numbers
        $regex = '[0-9]+';
        $numbers = preg_replace($regex, '', $phoneNumber);

        //TODO: Perform validation on the numbers here
    }

    //Check to see that an email address is valid
    function validEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Email is valid.";
        } else {
            echo "Email is not valid.";
        }
    }

    //------------------ Helper Methods ------------------//

    //Clean up form responses
    function clean_form_responses($data) {
        return trim(stripslashes(htmlspecialchars($data)));
    }
?>