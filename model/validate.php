<?php
    /**
     * 328/application/model/validate.php
     * @author Tien Han
     * @date 5/5/2024
     * @description Validation class for form responses.
     */

    class Validate
    {
        /**
         * @param $string string the given string that we're validating
         * @return bool true if the string is all alphabetic (no numbers), false if not
         */
        static function validName($string): bool {
            return ctype_alpha($string);
        }

        /**
         * @param $email string the given email that we're validating
         * @return bool true if the email address is valid, false if not
         */
        static function validEmail($email): bool {
            return filter_var($email, FILTER_VALIDATE_EMAIL);
        }

        /**
         * @param $selectedState string the given state that we're addressing
         * @return bool true if the submitted state is valid (in our states array), false if not
         */
        static function validState($selectedState): bool {
            $states = getStates();
            foreach ($states as $state) {
                if (ucwords($state) == ucwords($selectedState)) {
                    return true;
                }
            }
            return false;
        }

        /**
         * @param $phoneNumber string the given phone number
         * @return bool true if the phone number is valid, false if not
         */
        static function validPhone($phoneNumber): bool {
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
         * @param $url string the given url
         * @return bool true if the string is a valid url, false if not
         */
        static function validGitHub($url): bool {
            return filter_var($url, FILTER_VALIDATE_URL);
        }

        /**
         * @param $experience string the selected range of years of experience
         * @return bool true if the string is valid (in our years of experience array), false if not
         */
        static function validExperience($experience): bool {
            $yearsExperience = getYearsExperience();
            return in_array($experience, $yearsExperience);
        }

        /**
         * @param $selectedRelocation string the selected response to willingness to relocate
         * @return bool true if the string is valid (in our relocation array), false if not
         */
        static function validRelocation($selectedRelocation): bool {
            $relocationOptions = getRelocation();
            return in_array($selectedRelocation, $relocationOptions);
        }
    }