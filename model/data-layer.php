<?php
    /*
     * This is the Data Layer.
     */

    //Get US States for the personal information form in the Job Application app
    function getStates(): array {
        return array(
            'washington',
            'alaska',
            'alabama',
            'arkansas',
            'arizona',
            'california',
            'colorado',
            'connecticut',
            'District of Columbia',
            'delaware',
            'florida',
            'georgia',
            'hawaii',
            'iowa',
            'idaho',
            'illinois',
            'indiana',
            'kansas',
            'kentucky',
            'louisiana',
            'massachusetts',
            'maryland',
            'maine',
            'michigan',
            'minnesota',
            'missouri',
            'mississippi',
            'montana',
            'North Carolina',
            'North Dakota',
            'nebraska',
            'New Hampshire',
            'New Jersey',
            'New Mexico',
            'nevada',
            'New York',
            'ohio',
            'oklahoma',
            'oregon',
            'pennsylvania',
            'Puerto Rico',
            'Rhode Island',
            'South Carolina',
            'South Dakota',
            'tennessee',
            'texas',
            'utah',
            'virginia',
            'vermont',
            'wisconsin',
            'West Virginia',
            'wyoming'
        );
    }

    //Get all the options for years of experience
    function getYearsExperience(): array {
        return array(
            '0-2',
            '2-4',
            '4+'
        );
    }

    //Get all the options for willingness to relocate
    function getRelocation(): array {
        return array(
            'Yes',
            'No',
            'Maybe'
        );
    }