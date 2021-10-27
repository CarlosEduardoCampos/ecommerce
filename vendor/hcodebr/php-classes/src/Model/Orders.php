<?php 
    class Orders implements ClassInterface
    {
        //attributes
        private $idorder;
        private $vltotal;
        private $dtregister;

        //objects
        private $idcart;
        private $iduser;
        private $idstatus;

        /**
         * Get the value of idorder
         */ 
        public function getIdorder()
        {
            return $this->idorder;
        }

        /**
         * Set the value of idorder
         *
         * @return  self
         */ 
        public function setIdorder($idorder)
        {
            $this->idorder = $idorder;

            return $this;
        }

        /**
         * Get the value of vltotal
         */ 
        public function getVltotal()
        {
            return $this->vltotal;
        }

        /**
         * Set the value of vltotal
         *
         * @return  self
         */ 
        public function setVltotal($vltotal)
        {
            $this->vltotal = $vltotal;

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

        /**
         * Get the value of idstatus
         */ 
        public function getIdstatus()
        {
            return $this->idstatus;
        }

        /**
         * Set the value of idstatus
         *
         * @return  self
         */ 
        public function setIdstatus($idstatus)
        {
            $this->idstatus = $idstatus;

            return $this;
        }
    }//fim classe
?>