<?php
    namespace Hcode\Model;
    use \Hcode\DB\Sql;
    use \Hcode\Model;
    class Products
    {
        //attributes
        private $idproduct;
        private $desproduct;
        private $vlprice;
        private $vlwidth;
        private $vlheight;
        private $vllength;
        private $vlweight;
        private $desurl;
        private $dtregister;

        public function setDataForm($post)
        {
            $this->setDesproduct($post['desproduct']);
            $this->setVlprice  ($post['vlprice']);
            $this->setVlwidth   ($post['vlwidth']);
            $this->setVlheight  ($post['vlheight']);
            $this->setVllength  ($post['vllength']);
            $this->setVlweight  ($post['vlweight']);
        }

        //Cria um array de todos os produtos ordenado pelo desproduct
        public static function listAll()
        {
            try{
                $sql = new Sql();
                return($sql->select("SELECT * FROM tb_products ORDER BY desproduct"));
            }
            
            catch (Exception $e)
            {
                return json_encode(Msg::arrayErros($e));
            }
        }//fim função listAll

        //Faz o cadastro dos dados na tabela 
        public function Save()
        {
            try{
                $sql = new Sql();
                return($sql->select("CALL sp_products_save(:idproduct, :desproduct, :vlprice, :vlwidth, :vlheight, :vllength, :vlweight, :desurl)",
                [//array
                    ':idproduct'  => $this->getIdproduct(),
                    ':desproduct' => $this->getDesproduct(),
                    ':vlprice'    => $this->getVlprice(),
                    ':vlwidth'    => $this->getVlwidth(),
                    ':vlheight'   => $this->getVlheight(),
                    ':vllength'   => $this->getVllength(),
                    ':vlweight'   => $this->getVlweight(),
                    ':desurl'     => $this->getDesurl()
                ]));
            }
            
            catch (Exception $e)
            {
                return json_encode(Msg::arrayErros($e));
            } 
        }//fim função save

        //Busca um cadastro no banco de dados e retorn um array
        public function get()
        {
            try{
                $sql = new Sql();
                return($sql->select("SELECT * FROM tb_products WHERE idproduct = :id",
                [//array
                    ':id' => $this->getIdproduct()
                ])[0]);
            }
            
            catch (Exception $e)
            {
                return json_encode(Msg::arrayErros($e));
            }
        }//fim fução get

        public function delete()
        {
            $sql = new Sql();
            $sql->query("DELETE FROM tb_products WHERE idproduct = :id",
            [//array
                ':id' => $this->getIdProduct()
            ]);
        }

        public function setPhoto($file)
        {
            $filename = $file["file"]["name"];
            move_uploaded_file($file["file"]["tmp_name"],"site/img/products/$filename");
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
         * Get the value of vlprice
         */ 
        public function getVlprice()
        {
            return $this->vlprice;
        }

        /**
         * Set the value of vlprice
         *
         * @return  self
         */ 
        public function setVlprice($vlprice)
        {
            $this->vlprice = $vlprice;

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