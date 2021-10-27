<?php 
    class CartsProducts implements ClassInterface
    {
        //attributes
        private $idcartproduct;
        private $dtremoved;
        private $dtregister;

        //objects
        private $idcart;
        private $idproduct;

        /**
         * Get the value of idcartproduct
         */ 
        public function getIdcartproduct()
        {
            return $this->idcartproduct;
        }

        /**
         * Set the value of idcartproduct
         *
         * @return  self
         */ 
        public function setIdcartproduct($idcartproduct)
        {
            $this->idcartproduct = $idcartproduct;

            return $this;
        }

        /**
         * Get the value of dtremoved
         */ 
        public function getDtremoved()
        {
            return $this->dtremoved;
        }

        /**
         * Set the value of dtremoved
         *
         * @return  self
         */ 
        public function setDtremoved($dtremoved)
        {
            $this->dtremoved = $dtremoved;

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

        /**
         * Get the value of idcart
         */ 
        public function getIdcart()
        {
            return $this->idcart;
        }

        /**
         * Set the value of idcart
         *
         * @return  self
         */ 
        public function setIdcart($idcart)
        {
            $this->idcart = $idcart;

            return $this;
        }

        /**
         * Get the value of idproduct
         */ 
        public function getIdproduct()
        {
            return $this->idproduct;
        }

        /**
         * Set the value of idproduct
         *
         * @return  self
         */ 
        public function setIdproduct($idproduct)
        {
            $this->idproduct = $idproduct;

            return $this;
        }
    }//fim classe
?>