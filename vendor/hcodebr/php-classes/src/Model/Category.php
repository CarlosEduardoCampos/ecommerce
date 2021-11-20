<?php 
    namespace Hcode\Model;
    use \Hcode\DB\Sql;
    use \Hcode\Model;
    use \Hcode\Model\Products;
    //
    class Category
    {
        //Atributos
        private $idcategory;
        private $descategory;
        //
        public function get()
        {
            try{
                $sql = new Sql();
                return($sql->select("SELECT * FROM tb_categories WHERE idcategory = :id",
                [
                    ':id' => $this->getIdcategory()
                ])[0]);//fim return
            }
            
            catch (Exception $e)
            {
                return json_encode(Msg::arrayErros($e));
            }
            
        }
        //
        public function setDataForm($post)
        {
            $this->setdescategory($post["descategory"]);
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
                array(
                    ':idcategory'  => $this->getidcategory(),
                    ':descategory' => $this->getdescategory()
                ))//fim array,select
            );//fim return
            Category::updateFile();
        }
        //
        public function delete()
        {
            $sql = new Sql();
            $sql->query("DELETE FROM tb_categories WHERE idcategory = :id",
                array(
                    ':id' => $this->getIdcategory()
                )
            );
            Category::updateFile();
        }
        //->Cria uma lista com links para as categorias
        public static function updateFile()
        {
            $categories= Category::listAll();
            $html = [];

            foreach($categories as $row)
            {
                array_push($html, '<li><a href="/category/'.$row['idcategory'].'">'.$row['descategory'].'</a></li>');
            }

            file_put_contents($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR ."views". DIRECTORY_SEPARATOR ."categories-menu.html", implode('',$html));
        }

        //Busca os produtos relaionados com determinada categoria
        public function getProducts($related = true)
        {
            try{
                $sql = new Sql();

                if($related)
                {
                    return($sql->select("Select * from tb_products Where idproduct in(Select a.idproduct from tb_products as a inner join tb_productscategories as b on a.idproduct = b.idproduct Where b.idcategory = :id)",
                    //
                    [//array
                        ':id' => $this->getIdcategory()
                    ]));//fim return, select, array
                }
                else{
                    return($sql->select("Select * from tb_products Where idproduct not in(Select a.idproduct from tb_products as a inner join tb_productscategories as b on a.idproduct = b.idproduct Where b.idcategory = :id)",
                    [//array
                        ':id' => $this->getIdcategory()
                    ]));//fim return, select, array
                }
                
            }
            
            catch (Exeption $e)
            {
                return json_encode(Msg::arrayErros($e));
            }
        }

        public function addProduct($product)
        {
            $sql = new Sql();
            $sql->query("INSERT INTO tb_productscategories(idcategory, idproduct) Values(:idcategory, :idproduct)",
            [
                ':idcategory' => $this->getIdcategory(),
                ':idproduct' => $product
            ]);
        }

        public function removeProduct($product)
        {
            $sql = new Sql();
            $sql->query("DELETE FROM tb_productscategories where idcategory = :idcategory AND idproduct = :idproduct",
            [
                ':idcategory' => $this->getIdcategory(),
                ':idproduct' => $product
            ]);
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