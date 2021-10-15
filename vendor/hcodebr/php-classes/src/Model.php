<?php  
    namespace Hcode;

    class Model
    {
        private $values = [];//Valores dos Campos de dados dos objetos

        //função ativada sempre que get ou set são usados
        public function __call($name, $arqs)
        {
            $method = substr($name, 0, 3);
            $fieldName = substr($name, 3, strlen($name));

            switch($method)
            {
                case "get":
                    return isset($this->values[$fieldName]) ? $this->value[$fieldName] : NULL;
                break;

                case "set":
                    $this->values[$fieldName] = $arqs[0];
                break;
            }
        }//fim fução call

        public function setData($data = array())
        {
            foreach($data as $key => $value)
            {
                $this->{"set".$key}($value);
            }
        }

        public function getValues()
        {
            return $this->values;
        }
    }//fim classe
?>