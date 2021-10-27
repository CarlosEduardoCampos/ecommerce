<?php
    class Carts implements ClassInterface
    {
        //attributes
        private $idcart;
        private $dessessionid;
        private $vlfreight;
        private $dtregister;

        //objects
        private $iduser;
        private $idaddress;

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
         * Get the value of vlfreight
         */ 
        public function getVlfreight()
        {
            return $this->vlfreight;
        }

        /**
         * Set the value of vlfreight
         *
         * @return  self
         */ 
        public function setVlfreight($vlfreight)
        {
            $this->vlfreight = $vlfreight;

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
         * Recebe um array via $_POST e alimenta as
         * variaveis com os dados correspondentes
         */
        public function setDadosForm($post)
        {
            $this-> setDessssesiond ($post['desssesionid']);
            $this-> setVlfreight    ($post['vlfreight']);
            $this-> setDtregister   ($post['dtregister']);
            $this-> setIduser       ($post['iduser']);
            $this-> setIdaddress    ($post['idaddress']);
        }

        /**
         * Busca um cadastro no banco de dados e retorna um array com os dados
         */
        public function get()
        {
            try{
                $sql = new Sql();
                return($sql->select("SELECT * FROM tb_carts WHERE idcart = id:",
                [//array
                    'id:' => getIdcart()
                ]));//fim array, select, return
            }//fim try
            
            catch (Exception $e)
            {
                return json_encode(Msg::arrayErros($e));
            }//catch
        }//fim função get

        /**
         * Busca todos os dados de uma tabela no banco de dados
         * e retorna um array
         */
        public static function listAll()
        {
            try{
                $sql = new Sql();
                return($sql->select("SELECT * FROM tb_carts"));
            }//fim try

            catch (Exception $e)
            {
                return json_encode(Msg::arrayErros($e));
            }//fim catch
        }//fim função list All

        /**
         * Faz um INSERT no banco de dados
         */
        public function save()
        {
            $sql = new Sql();
            return($sql->select("CALL sp_Carts"))
        }
    }//fim classe
?>