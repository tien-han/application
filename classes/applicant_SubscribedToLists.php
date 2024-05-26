<?php
    /**
     * @description The Applicant_SubscribedToLists class represents all applicants
     *              that would like to subscribe to a mailing list.
     * @author Tien Han
     * @date 5/26/2024
     */

    class Applicant_SubscribedToLists extends Applicant {
        private array $_selectionsJobs;
        private array $_selectionVerticals;

        function __construct($fname, $lname, $email, $state, $phone, $jobs=[null], $verticals=[null])
        {
            parent::__construct($fname, $lname, $email, $state, $phone);

            $this->_selectionJobs = $jobs;
            $this->_selectionVerticals = $verticals;
        }

        public function getSelectionsJobs(): array
        {
            return $this->_selectionsJobs;
        }

        public function setSelectionsJobs(array $selectionsJobs): void
        {
            $this->_selectionsJobs = $selectionsJobs;
        }

        public function getSelectionVerticals(): array
        {
            return $this->_selectionVerticals;
        }

        public function setSelectionVerticals(array $selectionVerticals): void
        {
            $this->_selectionVerticals = $selectionVerticals;
        }
    }