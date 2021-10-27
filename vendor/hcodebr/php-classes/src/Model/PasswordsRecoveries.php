<?php

    class PasswordsRecoveries implements ClassInterface
    {
        //attributes
        private $idrecovery;
        private $desip;
        private $dtrecovery;
        private $register;

        //objects
        private $iduser;

        /**
         * Get the value of idrecovery
         */ 
        public function getIdrecovery()
        {
                return $this->idrecovery;
        }

        /**
         * Set the value of idrecovery
         *
         * @return  self
         */ 
        public function setIdrecovery($idrecovery)
        {
                $this->idrecovery = $idrecovery;

                return $this;
        }

        /**
         * Get the value of desip
         */ 
        public function getDesip()
        {
                return $this->desip;
        }

        /**
         * Set the value of desip
         *
         * @return  self
         */ 
        public function setDesip($desip)
        {
                $this->desip = $desip;

                return $this;
        }

        /**
         * Get the value of dtrecovery
         */ 
        public function getDtrecovery()
        {
                return $this->dtrecovery;
        }

        /**
         * Set the value of dtrecovery
         *
         * @return  self
         */ 
        public function setDtrecovery($dtrecovery)
        {
                $this->dtrecovery = $dtrecovery;

                return $this;
        }

        /**
         * Get the value of register
         */ 
        public function getRegister()
        {
                return $this->register;
        }

        /**
         * Set the value of register
         *
         * @return  self
         */ 
        public function setRegister($register)
        {
                $this->register = $register;

                return $this;
        }

        /**
         * Get the value of iduser
         */ 
        public function getIduser()
        {
                return $this->iduser;
        }

        /**
         * Set the value of iduser
         *
         * @return  self
         */ 
        public function setIduser($iduser)
        {
                $this->iduser = $iduser;

                return $this;
        }
    }//fim classe
?>