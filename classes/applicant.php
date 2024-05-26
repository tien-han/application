<?php
    /**
     * @description The Applicant class represents all applicants.
     * @author Tien Han
     * @date 5/26/2024
    */

    class Applicant
    {
        private string $_fname;
        private string $_lname;
        private string $_email;
        private string $_state;
        private string $_phone;
        private string $_github;
        private string $_experience;
        private string $_relocate;
        private string $_bio;

        public function __construct($fname, $lname, $email, $state, $phone)
        {
            $this->_fname = $fname;
            $this->_lname = $lname;
            $this->_email = $email;
            $this->_state = $state;
            $this->_phone = $phone;
        }

        public function getFname(): string
        {
            return $this->_fname;
        }

        public function setFname(string $fname): void
        {
            $this->_fname = $fname;
        }

        public function getLname(): string
        {
            return $this->_lname;
        }

        public function setLname(string $lname): void
        {
            $this->_lname = $lname;
        }

        public function getEmail(): string
        {
            return $this->_email;
        }

        public function setEmail(string $email): void
        {
            $this->_email = $email;
        }

        public function getState(): string
        {
            return $this->_state;
        }

        public function setState(string $state): void
        {
            $this->_state = $state;
        }

        public function getPhone(): string
        {
            return $this->_phone;
        }

        public function setPhone(string $phone): void
        {
            $this->_phone = $phone;
        }

        public function getGithub(): string
        {
            return $this->_github;
        }

        public function setGithub(string $github): void
        {
            $this->_github = $github;
        }

        public function getExperience(): string
        {
            return $this->_experience;
        }

        public function setExperience(string $experience): void
        {
            $this->_experience = $experience;
        }

        public function getRelocate(): string
        {
            return $this->_relocate;
        }

        public function setRelocate(string $relocate): void
        {
            $this->_relocate = $relocate;
        }

        public function getBio(): string
        {
            return $this->_bio;
        }

        public function setBio(string $bio): void
        {
            $this->_bio = $bio;
        }
    }