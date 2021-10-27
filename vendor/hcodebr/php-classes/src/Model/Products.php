<?php
    class Products implements ClassInterface
    {
        //attributes
        private $idproduct;
        private $desproduct;
        private $vlprince;
        private $vlwidth;
        private $vlheight;
        private $vllength;
        private $vlweight;
        private $desurl;
        private $dtregister;

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

        /**
         * Get the value of desproduct
         */ 
        public function getDesproduct()
        {
            return $this->desproduct;
        }

        /**
         * Set the value of desproduct
         *
         * @return  self
         */ 
        public function setDesproduct($desproduct)
        {
            $this->desproduct = $desproduct;

            return $this;
        }

        /**
         * Get the value of vlprince
         */ 
        public function getVlprince()
        {
            return $this->vlprince;
        }

        /**
         * Set the value of vlprince
         *
         * @return  self
         */ 
        public function setVlprince($vlprince)
        {
            $this->vlprince = $vlprince;

            return $this;
        }

        /**
         * Get the value of vlwidth
         */ 
        public function getVlwidth()
        {
            return $this->vlwidth;
        }

        /**
         * Set the value of vlwidth
         *
         * @return  self
         */ 
        public function setVlwidth($vlwidth)
        {
            $this->vlwidth = $vlwidth;

            return $this;
        }

        /**
         * Get the value of vlheight
         */ 
        public function getVlheight()
        {
            return $this->vlheight;
        }

        /**
         * Set the value of vlheight
         *
         * @return  self
         */ 
        public function setVlheight($vlheight)
        {
            $this->vlheight = $vlheight;

            return $this;
        }

        /**
         * Get the value of vlheight
         */ 
        public function getVlheight()
        {
            return $this->vlheight;
        }

        /**
         * Set the value of vlheight
         *
         * @return  self
         */ 
        public function setVlheight($vlheight)
        {
            $this->vlheight = $vlheight;

            return $this;
        }

        /**
         * Get the value of vllength
         */ 
        public function getVllength()
        {
            return $this->vllength;
        }

        /**
         * Set the value of vllength
         *
         * @return  self
         */ 
        public function setVllength($vllength)
        {
            $this->vllength = $vllength;

            return $this;
        }

        /**
         * Get the value of vlweight
         */ 
        public function getVlweight()
        {
            return $this->vlweight;
        }

        /**
         * Set the value of vlweight
         *
         * @return  self
         */ 
        public function setVlweight($vlweight)
        {
            $this->vlweight = $vlweight;

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
    }//fim classe
?>