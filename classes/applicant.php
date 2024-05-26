<?php
/**
 * The Applicant class represents all applicants.
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
 * Applicant
 *
 * @category Applicant
 * @package  Applicant
 * @author   Tien Han <han.tien@student.greenriver.edu>
 * @license  No applicable license
 * @link     https://tienthan.greenriverdev.com/328/application/
 */
class Applicant
{
    private string $_fname;
    private string $_lname;
    private string $_email;
    private string $_state;
    private string $_phone;
    private ?string $_github;
    private string $_experience;
    private string $_relocate;
    private ?string $_bio;

    /**
     * Constructor creates an Applicant object
     *
     * @param string $fname the first name of the applicant
     * @param string $lname the last name of the applicant
     * @param string $email string the email of the applicant
     * @param string $state string the state of the applicant
     * @param string $phone string the phone number of the applicant
     */
    public function __construct(string $fname, string $lname,
        string $email, string $state, string $phone
    ) {
        $this->_fname = $fname;
        $this->_lname = $lname;
        $this->_email = $email;
        $this->_state = $state;
        $this->_phone = $phone;
    }

    /**
     * Get the first name of the applicant
     *
     * @return string the first name of the applicant
     */
    public function getFname(): string
    {
        return $this->_fname;
    }

    /**
     * Set the first name of the applicant
     *
     * @param string $fname the first name of the applicant
     *
     * @return void
     */
    public function setFname(string $fname): void
    {
        $this->_fname = $fname;
    }

    /**
     * Get the last name of the applicant
     *
     * @return string the last name of the applicant
     */
    public function getLname(): string
    {
        return $this->_lname;
    }

    /**
     * Set the last name of the applicant
     *
     * @param string $lname the last name of the applicant
     *
     * @return void
     */
    public function setLname(string $lname): void
    {
        $this->_lname = $lname;
    }

    /**
     * Get the email of the applicant
     *
     * @return string the email of the applicant
     */
    public function getEmail(): string
    {
        return $this->_email;
    }

    /**
     * Set the email of the applicant
     *
     * @param string $email the email of the applicant
     *
     * @return void
     */
    public function setEmail(string $email): void
    {
        $this->_email = $email;
    }

    /**
     * Get the state of the applicant
     *
     * @return string the applicant's state
     */
    public function getState(): string
    {
        return $this->_state;
    }

    /**
     * Set the state of the applicant
     *
     * @param string $state the state of the applicant
     *
     * @return void
     */
    public function setState(string $state): void
    {
        $this->_state = $state;
    }

    /**
     * Get the phone number of the applicant
     *
     * @return string the applicant's phone number
     */
    public function getPhone(): string
    {
        return $this->_phone;
    }

    /**
     * Set the phone number of the applicant
     *
     * @param string $phone the phone number of the applicant
     *
     * @return void
     */
    public function setPhone(string $phone): void
    {
        $this->_phone = $phone;
    }

    /**
     * Get the applicant's GitHub link
     *
     * @return string|null the applicant's GitHub link, if it's provided
     */
    public function getGithub(): ?string
    {
        if (isset($this->_github)) {
            return $this->_github;
        }

        return null;
    }

    /**
     * Set the applicant's GitHub link
     *
     * @param string|null $github the given GitHub link, or null
     *
     * @return void
     */
    public function setGithub(?string $github): void
    {
        $this->_github = $github;
    }

    /**
     * Get the applicant's years of experience
     *
     * @return string|null the applicant's experience
     */
    public function getExperience(): ?string
    {
        if (isset($this->_experience)) {
            return $this->_experience;
        }

        return null;
    }

    /**
     * Set the applicant's years of experience
     *
     * @param string|null $experience the applicant's years of experience
     *
     * @return void
     */
    public function setExperience(?string $experience): void
    {
        $this->_experience = $experience;
    }

    /**
     * Get the applicant's willingness to relocate
     *
     * @return string|null the applicant's willingness to relocate
     */
    public function getRelocate(): ?string
    {
        if (isset($this->_relocate)) {
            return $this->_relocate;
        }
        return null;
    }

    /**
     * Set the applicant's willingness to relocate
     *
     * @param string|null $relocate the applicant's willingness to relocate
     *
     * @return void
     */
    public function setRelocate(?string $relocate): void
    {
        $this->_relocate = $relocate;
    }

    /**
     * Get the applicant's biography
     *
     * @return string|null the applicant's biography
     */
    public function getBio(): ?string
    {
        if (isset($this->_bio)) {
            return $this->_bio;
        }

        return null;
    }

    /**
     * Set the applicant's biography
     *
     * @param string|null $bio the applicant's biography, if given
     *
     * @return void
     */
    public function setBio(?string $bio): void
    {
        $this->_bio = $bio;
    }
}