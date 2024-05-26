<?php
/**
 * The Data-Layer holds methods that we can use to fill the
 * Job Application forms with data.
 * php version 7.4.33
 *
 * @category   Data-Layer
 * @package    Data-Layer
 * @subpackage Model
 * @author     Tien Han <han.tien@student.greenriver.edu>
 * @date       5/26/2024
 * @license    No applicable license
 * @version    CVS: $Id$
 * @link       https://tienthan.greenriverdev.com/328/application/
 */

/**
 * Get US States for the personal information form
 *
 * @return string[] an array of all US States
 */
function getStates(): array
{
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

/**
 * Get all the options for years of experience
 *
 * @return string[] an array of all years of experience
 */
function getYearsExperience(): array
{
    return array(
        '0-2',
        '2-4',
        '4+'
    );
}

/**
 * Get all the options for willingness to relocate
 *
 * @return string[] an array of all relocation options
 */
function getRelocation(): array
{
    return array(
        'Yes',
        'No',
        'Maybe'
    );
}

/**
 * Get all the checkboxes for the mailing list
 *
 * @return array[] an array of all mailing lists
 */
function getMailingLists(): array
{
    return array(
        array(
            'JavaScript',
            'PHP',
            'Java',
            'Python'
        ),
        array(
            'HTML',
            'CSS',
            'ReactJS',
            'NodeJs'
        ),
        array(
            'SaaS',
            'Health tech',
            'Ag tech',
            'HR tech'
        ),
        array(
            'Industrial tech',
            'Cybersecurity',
        )
    );
}