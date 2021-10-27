<?php
    class Persons implements ClassInterface
    {
        //attributes
        private $idperson;
        private $desperson;
        private $desemail;
        private $nrphone;
        private $dtregister;

        /**
         * Get the value of idperson
         */ 
        public function getIdperson()
        {
            return $this->idperson;
        }

        /**
         * Set the value of idperson
         *
         * @return  self
         */ 
        public function setIdperson($idperson)
        {
            $this->idperson = $idperson;

            return $this;
        }

        /**
         * Get the value of desperson
         */ 
        public function getDesperson()
        {
            return $this->desperson;
        }

        /**
         * Set the value of desperson
         *
         * @return  self
         */ 
        public function setDesperson($desperson)
        {
            $this->desperson = $desperson;

            return $this;
        }

        /**
         * Get the value of desemail
         */ 
        public function getDesemail()
        {
            return $this->desemail;
        }

        /**
         * Set the value of desemail
         *
         * @return  self
         */ 
        public function setDesemail($desemail)
        {
            $this->desemail = $desemail;

            return $this;
        }

        /**
         * Get the value of nrphone
         */ 
        public function getNrphone()
        {
            return $this->nrphone;
        }

        /**
         * Set the value of nrphone
         *
         * @return  self
         */ 
        public function setNrphone($nrphone)
        {
            $this->nrphone = $nrphone;

            return $this;
        }

        /**
         * Get the value of dtregister
         */ 
        public function getDtregister()
        {
            return $this->dtregister;
        }

        /**
         * Set the value of dtregister
         *
         * @return  self
         */ 
        public function setDtregister($dtregister)
        {
            $this->dtregister = $dtregister;

            return $this;
        }
    }//fim class
?>