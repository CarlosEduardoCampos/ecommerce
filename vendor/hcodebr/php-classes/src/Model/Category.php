<?php 
    namespace Hcode\Model;
    use \Hcode\DB\Sql;
    use \Hcode\Model;
    //
    class Category
    {
        //Atributos
        private $idcategory;
        private $descategory;
        //
        public function get($id)
        {
            $sql = new Sql();
            return($sql->select("SELECT * FROM tb_categories WHERE idcategory = :id",
                array(
                    ':id' => $id
                ))[0]//fim array,select
            );//fim return
        }
        //
        public function setDataForm($post)
        {
            $this->setDescategory($post["descategory"]);
        }
        //
        public static function listAll()
        {
            $sql = new Sql();
            return $sql->select("SELECT * FROM tb_categories ORDER BY descategory");
        }//fim função listAll
        //
        public function save()
        {
            $sql = new Sql();
            return($sql->select("CALL sp_categories_save(:idcategory, :descategory)",
                array
                (
                    ':idcategory'  => $this->getidcategory(),
                    ':descategory' => $this->getdescategory()
                ))//fim array,select
            );//fim return
        }
        //
        public function delete()
        {
            $sql = new Sql();
            $sql->query("DELETE FROM tb_categories WHERE :id",
                array(
                    ':id' => $this->getdcategory()
                )
            );
        }
        /**
         * Get the value of idcategory
         */ 
        public function getIdcategory()
        {
            return $this->idcategory;
        }

        /**
         * Set the value of idcategory
         *
         * @return  self
         */ 
        public function setIdcategory($idcategory)
        {
            $this->idcategory = $idcategory;

            return $this;
        }

        /**
         * Get the value of descategory
         */ 
        public function getDescategory()
        {
            return $this->descategory;
        }

        /**
         * Set the value of descategory
         *
         * @return  self
         */ 
        public function setDescategory($descategory)
        {
            $this->descategory = $descategory;

            return $this;
        }
    }//fim class Category
    
?>