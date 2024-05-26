<?php
/**
 * The Validate class holds validation methods for form responses.
 * php version 7.4.33
 *
 * @category   Validate
 * @package    Validate
 * @subpackage Model
 * @author     Tien Han <han.tien@student.greenriver.edu>
 * @date       5/26/2024
 * @license    No applicable license
 * @version    CVS: $Id$
 * @link       https://tienthan.greenriverdev.com/328/application/
 */

/**
 * Validate
 *
 * @category Validate
 * @package  Validate
 * @author   Tien Han <han.tien@student.greenriver.edu>
 * @license  No applicable license
 * @link     https://tienthan.greenriverdev.com/328/application/
 */
class Validate
{
    /**
     * Validates that a name is all alphabetic
     *
     * @param string $string the given string that we're validating
     *
     * @return bool true if the string is all alphabetic (no numbers), false if not
     */
    static function validName($string): bool
    {
        return ctype_alpha($string);
    }

    /**
     * Validates that an email is valid
     *
     * @param string $email the given email that we're validating
     *
     * @return bool true if the email address is valid, false if not
     */
    static function validEmail($email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    /**
     * Validates that a state is from our states array in Data-Layer
     *
     * @param string $selectedState the given state that we're addressing
     *
     * @return bool true if the submitted state is valid, false if not
     */
    static function validState($selectedState): bool
    {
        $states = getStates();
        foreach ($states as $state) {
            if (ucwords($state) == ucwords($selectedState)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Validates that a phone number is valid
     *
     * @param string $phoneNumber the given phone number
     *
     * @return bool true if the phone number is valid, false if not
     */
    static function validPhone($phoneNumber): bool
    {
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
    /**
     * Validates that a URL is valid
     *
     * @param string $url the given url
     *
     * @return bool true if the string is a valid url, false if not
     */
    static function validGitHub($url): bool
    {
        return filter_var($url, FILTER_VALIDATE_URL);
    }

    /**
     * Validates that experience is from our experience array in Data-Layer
     *
     * @param string $experience the selected range of years of experience
     *
     * @return bool true if the string is valid, false if not
     */
    static function validExperience($experience): bool
    {
        $yearsExperience = getYearsExperience();
        return in_array($experience, $yearsExperience);
    }

    /**
     * Validates that relocation is from our relocation array in Data-Layer
     *
     * @param string $selectedRelocation selected response for relocation
     *
     * @return bool true if the string is valid, false if not
     */
    static function validRelocation($selectedRelocation): bool
    {
        $relocationOptions = getRelocation();
        return in_array($selectedRelocation, $relocationOptions);
    }
}