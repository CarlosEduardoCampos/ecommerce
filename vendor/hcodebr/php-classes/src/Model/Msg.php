<?php
    class Msg
    {
        /**
         * Cria array para tratamento de erros apartir das mensagem de erro do sistema
         * */
        public static function arrayErros($e)
        {
            return(array(
                    'mensagem' => $e->getMessage(),//mensagem de erro
                    'linha'    => $e->getLine(),   //linha do erro
                    'file'     => $e->getFile(),   //arquivo do erro
                    'code'     => $e->getCode()    //numero do erro
                )//fim array
            );//fim do return
        }//fim da funcao arrayErros
    }//fim da classe
?>