<?php  
    namespace Hcode;

    class Model
    {
        private $values = [];

        public function __call($name, $arqs)
        {
            $mothod = substr($name, 0, 3);
            $fielsName = substr($name, 3, strlen($name));

            var_dump($method, $fieldName);
            exit;
        }
    }
?>