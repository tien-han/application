<?php
/**
 * The Applicant_SubscribedToLists class represents all applicants
 *               that would like to subscribe to a mailing list.
 * php version 7.4.33
 *
 * @category   Applicant
 * @package    Applicant
 * @subpackage Application/Classes
 * @author     Tien Han <han.tien@student.greenriver.edu>
 * @date       5/26/2024
 * @license    No applicable license
 * @version    CVS: $Id$
 * @link       https://tienthan.greenriverdev.com/328/application/
 */

/**
 * Applicant_SubscribedToLists
 *
 * @category Applicant
 * @package  Applicant
 * @author   Tien Han <han.tien@student.greenriver.edu>
 * @license  No applicable license
 * @link     https://tienthan.greenriverdev.com/328/application/
 */
class Applicant_SubscribedToLists extends Applicant
{
    private array $_selectionsJobs;
    private array $_selectionVerticals;

    /**
     * Constructor creates an Applicant_SubscribedToLists object
     *
     * @param string $fname     the first name of the applicant
     * @param string $lname     the last name of the applicant
     * @param string $email     string the email of the applicant
     * @param string $state     string the state of the applicant
     * @param string $phone     string the phone number of the applicant
     * @param array  $jobs      array of the applicant's job mailing lists
     * @param array  $verticals array of the applicant's vertical mailing lists
     */
    function __construct($fname, $lname, $email, $state,
        $phone, $jobs=[null], $verticals=[null]
    ) {
        parent::__construct($fname, $lname, $email, $state, $phone);

        $this->_selectionsJobs = $jobs;
        $this->_selectionVerticals = $verticals;
    }

    /**
     * Get all the job mailing lists the applicant has selected
     *
     * @return array|null[] the list of job mailing lists the applicant has selected
     */
    public function getSelectionsJobs(): array
    {
        return $this->_selectionsJobs;
    }

    /**
     * Set all the applicant's job mailing list selections
     *
     * @param array $selectionsJobs the list of all selected job mailing lists
     *
     * @return void
     */
    public function setSelectionsJobs(array $selectionsJobs): void
    {
        $this->_selectionsJobs = $selectionsJobs;
    }

    /**
     * Get all the vertical mailing lists the applicant has selected
     *
     * @return array|null[] the applicant's list of vertical mailing lists
     */
    public function getSelectionVerticals(): array
    {
        return $this->_selectionVerticals;
    }

    /**
     * Set all the applicant's vertical mailing list selections
     *
     * @param array $selectionVerticals applicant's list of vertical mailing lists
     *
     * @return void
     */
    public function setSelectionVerticals(array $selectionVerticals): void
    {
        $this->_selectionVerticals = $selectionVerticals;
    }
}