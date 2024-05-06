<?php
    /*
     * 328/application/model/validate.php
     * @author Tien Han
     * @date 5/5/2024
     * @description Validation for form responses.
     */

    //Turn on error reporting
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    //------------------------ Form Validation Methods ------------------------//

    //Check to see that a string is all alphabetic (no numbers)
    function validName($string): bool {
        return ctype_alpha($string);
    }

    //Check to see that an email address is valid
    function validEmail($email): bool {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    //Check to see that the submitted state is valid (in our states array)
    function validState($selectedState): bool {
        $states = getStates();
        foreach ($states as $state) {
            if (ucwords($state) == ucwords($selectedState)) {
                return true;
            }
        }
        return false;
    }

    //Check to see that a phone number is valid
    function validPhone($phoneNumber): bool {
        //Regex to only pull out numbers
        $regex = '/[^0-9]+/';

        //Get numerical values only out of the phone number
        $numbers = preg_replace($regex, "", $phoneNumber);

        if (strlen($numbers) == 10) {
            return true;
        }
        return false;
    }

    //TODO: Use Regex to make sure GitHub is in the URL
    //Check to see that a string is a valid url.
    function validGitHub($url): bool {
        return filter_var($url, FILTER_VALIDATE_URL);
    }

    //Check to see that the selected experience is a valid "value" property
    function validExperience($experience): bool {
        $yearsExperience = getYearsExperience();
        return in_array($experience, $yearsExperience);
    }

    //Check to see that the selected relocation is a valid "value" property
    function validRelocation($selectedRelocation): bool {
        $relocationOptions = getRelocation();
        return in_array($selectedRelocation, $relocationOptions);
    }
?>