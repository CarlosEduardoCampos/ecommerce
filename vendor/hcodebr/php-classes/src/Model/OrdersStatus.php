<?php 
    class OrdersStatus implements ClassInterface
    {
        //attributes
        private $idstatus;
        private $desstatus;
        private $dtregister;

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

        /**
         * Get the value of desstatus
         */ 
        public function getDesstatus()
        {
            return $this->desstatus;
        }

        /**
         * Set the value of desstatus
         *
         * @return  self
         */ 
        public function setDesstatus($desstatus)
        {
            $this->desstatus = $desstatus;

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
    }
?>