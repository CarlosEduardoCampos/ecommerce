<?php 
    class ProductsCategories implements ClassInterface
    {
        //objects
        private $idcategories;
        private $idproduct;

        /**
         * Get the value of idcategories
         */ 
        public function getIdcategories()
        {
            return $this->idcategories;
        }

        /**
         * Set the value of idcategories
         *
         * @return  self
         */ 
        public function setIdcategories($idcategories)
        {
            $this->idcategories = $idcategories;

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