<?php
    class Addresses implements ClassInterface
    {
        //attributes
        private $idaddress
        private $desaddress;
        private $descomplement;
        private $descity;
        private $desstate;
        private $descountry;
        private $nrzipcode;

        //objects
        private $idperson;

        /**
         * Get the value of idaddress
         */ 
        public function getIdaddress()
        {
            return $this->idaddress;
        }

        /**
         * Set the value of idaddress
         *
         * @return  self
         */ 
        public function setIdaddress($idaddress)
        {
            $this->idaddress = $idaddress;

            return $this;
        }

        /**
         * Get the value of desaddress
         */ 
        public function getDesaddress()
        {
            return $this->desaddress;
        }

        /**
         * Set the value of desaddress
         *
         * @return  self
         */ 
        public function setDesaddress($desaddress)
        {
            $this->desaddress = $desaddress;

            return $this;
        }

        /**
         * Get the value of descomplement
         */ 
        public function getDescomplement()
        {
            return $this->descomplement;
        }

        /**
         * Set the value of descomplement
         *
         * @return  self
         */ 
        public function setDescomplement($descomplement)
        {
            $this->descomplement = $descomplement;

            return $this;
        }

        /**
         * Get the value of descity
         */ 
        public function getDescity()
        {
            return $this->descity;
        }

        /**
         * Set the value of descity
         *
         * @return  self
         */ 
        public function setDescity($descity)
        {
            $this->descity = $descity;

            return $this;
        }

        /**
         * Get the value of desstate
         */ 
        public function getDesstate()
        {
            return $this->desstate;
        }

        /**
         * Set the value of desstate
         *
         * @return  self
         */ 
        public function setDesstate($desstate)
        {
            $this->desstate = $desstate;

            return $this;
        }

        /**
         * Get the value of descountry
         */ 
        public function getDescountry()
        {
            return $this->descountry;
        }

        /**
         * Set the value of descountry
         *
         * @return  self
         */ 
        public function setDescountry($descountry)
        {
            $this->descountry = $descountry;

            return $this;
        }

        /**
         * Get the value of nrzipcode
         */ 
        public function getNrzipcode()
        {
            return $this->nrzipcode;
        }

        /**
         * Set the value of nrzipcode
         *
         * @return  self
         */ 
        public function setNrzipcode($nrzipcode)
        {
            $this->nrzipcode = $nrzipcode;

            return $this;
        }

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
         * Recebe um array via $_POST e alimenta as
         * variaveis com os dados correspondentes
         */
        public function setDadosForm($post)
        {
            $this-> setDadosForm     ($post['deaddress']);
            $this-> setDescomplement ($post['descomplemente']);
            $this-> setDescity       ($post['descity']);
            $this-> setDesstate      ($post['desstate'];
            $this-> setDescountry    ($post['descoutry']);
            $this-> setNrzipcode     ($post['nrzipcode']);
            $this-> setIdperson      ($post['idperson']);
        }
        
    }//fim classe
?>