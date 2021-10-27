<?php 
    class UsersLogs implements ClassInterface
    {
        //attributs
        private $idlog;
        private $deslog;
        private $desip;
        private $desuseragent;
        private $dessessionid;
        private $desurl;
        private $dtregister;

        //objects
        private $iduser;

        /**
         * Get the value of idlog
         */ 
        public function getIdlog()
        {
                return $this->idlog;
        }

        /**
         * Set the value of idlog
         *
         * @return  self
         */ 
        public function setIdlog($idlog)
        {
                $this->idlog = $idlog;

                return $this;
        }

        /**
         * Get the value of deslog
         */ 
        public function getDeslog()
        {
                return $this->deslog;
        }

        /**
         * Set the value of deslog
         *
         * @return  self
         */ 
        public function setDeslog($deslog)
        {
                $this->deslog = $deslog;

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
         * Get the value of desuseragent
         */ 
        public function getDesuseragent()
        {
                return $this->desuseragent;
        }

        /**
         * Set the value of desuseragent
         *
         * @return  self
         */ 
        public function setDesuseragent($desuseragent)
        {
                $this->desuseragent = $desuseragent;

                return $this;
        }

        /**
         * Get the value of dessessionid
         */ 
        public function getDessessionid()
        {
                return $this->dessessionid;
        }

        /**
         * Set the value of dessessionid
         *
         * @return  self
         */ 
        public function setDessessionid($dessessionid)
        {
                $this->dessessionid = $dessessionid;

                return $this;
        }

        /**
         * Get the value of desurl
         */ 
        public function getDesurl()
        {
                return $this->desurl;
        }

        /**
         * Set the value of desurl
         *
         * @return  self
         */ 
        public function setDesurl($desurl)
        {
                $this->desurl = $desurl;

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
    }
?>