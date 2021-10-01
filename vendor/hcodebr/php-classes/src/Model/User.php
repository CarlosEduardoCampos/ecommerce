<?php  
    namespace Hcode\Model;
    use \Hcode\DB\Sql;
    use \Hcode\Model;
    use \Hcode\Mailer;

    class User extends Model
    {
        const SESSION = "User";
        const SECRET_KEY = "EcommerceHcode_secret";
        const SECRET_KEY_IV = "New_Key_Secret_I";
        //Funçao que valida a senha e login do usuario no banco
        public static function login($login, $password)
        {
            $sql = new Sql();
            $results = $sql->select("SELECT * FROM tb_users WHERE deslogin = :LOGIN", array(
                ":LOGIN"=>$login
            ));

            if(count($results) === 0)
            {
                throw new \Exception("Usuário inexistente ou semha invalida.");
            }

            $data = $results[0];

            if(password_verify($password,$data["despassword"]) === true)
            {
                $user = new User();
                $user->setData($data);

                $_SESSION[User::SESSION] = $user->getValues();
                return $user;
            }
            else{
                throw new \Exception("Usuário inexistente ou semha invalida.");
            }
        }//fim  função login

        //função que testa se existe uma sessão com dados administrativos
        public static function verifyLogin($inadmin = true)
        {
            //Se não exite uma sessão definida ou
            //Se sessão vazia ou
            //Se id do usuario retornado for maior que zero
            //Se usuario faz parte da administração
            if(
                !isset($_SESSION[User::SESSION])||
                !$_SESSION[User::SESSION] ||
                !(int)$_SESSION[User::SESSION]["iduser"] > 0 ||
                (bool)$_SESSION[User::SESSION]["inadmin"] !== $inadmin
            )
            {
                header("Location: /admin/login");
                exit;
            }
            
        }

        //Esta função desconecta o usuario a pagando os dados da sessão
        public static function logout()
        {
            $_SESSION[User::SESSION] = NULL;
        }

        //Busa os dados de todos os usuarios cadastrados e retorna um array
        public static function listAll()
        {
            $sql = new Sql();
            return $sql->select("SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) ORDER BY b.desperson");
        }

        //Cadastra um novo usuario no banco de dados 
        public function save()
        {
            $sql = new Sql();
            $result = ($sql->select("CALL sp_users_save(:desperson, :deslogin, :despassword, :desemail, :nrphone, :inadmin)",
                array(
                    'desperson'    => $this->getdesperson(),
                    ':deslogin'    => $this->getdeslogin(),
                    ':despassword' => $this->getdespassword(),
                    ':desemail'    => $this->getdesemail(),
                    'nrphone'      => $this->getnrphone(),
                    'inadmin'      => $this->getinadmin()
                ))//fim do select
            );//fim do result

            $this->setData($result[0]);
        }

        //Busca um unico cadastro e retorna um array com seus dados
        public function get($iduser)
        {
            $sql = new Sql();
            $results = ($sql->select("SELECT *FROM tb_users a INNER JOIN tb_persons b USING(idperson) WHERE a.iduser = :id",
                array(':id' => $iduser)
                )//fim do select 
            );//fim do resuts

            $this->setData($results[0]);
        }

        //Atualiza dados cadastrados 
        public function update()
        {
            $sql = new Sql();
            $result = ($sql->select("CALL sp_usersupdate_save(:iduser, :desperson, :deslogin, :despassword, :desemail, :nrphone, :inadmin)",
                array(
                    ':iduser'      => $this->getiduser(),
                    ':desperson'   => $this->getdesperson(),
                    ':deslogin'    => $this->getdeslogin(),
                    ':despassword' => $this->getdespassword(),
                    ':desemail'    => $this->getdesemail(),
                    ':nrphone'     => $this->getnrphone(),
                    ':inadmin'     => $this->getinadmin()
                ))//fim do select
            );//fim do result

            $this->setData($result[0]);
        }

        //Deleta dados de um cadastro no banco
        public function delete()
        {
            $sql = new Sql();
            $sql->query("CALL sp_users_delete(:id)", array(':id' => $this->getiduser()));
        }

        //Verifica se o email existe no banco de dados
        public static function getForgot($email)
        {
            $sql =new Sql();
            $result = $sql->select("SELECT * FROM tb_persons a INNER JOIN tb_users b USING(idperson) WHERE a.desemail = :email",
                array(
                    ":email" => $email
                )//fimm array
            );//fim do select

            if(count($result) === 0)
            {
                throw new \Exception("Não foi possivel recuperar a senha.");
            }
            else{
                $data = $result[0];
                $result1 = $sql ->select("CALL sp_userspasswordsrecoveries_create(:iduser, :desip)",
                    array(
                        ":iduser" => $data["iduser"],
                        ":desip"  => $_SERVER["REMOTE_ADDR"] // pega o ip do usuário
                    )//fim array
                );//fim select

                if(count($result1) === 0)
                {
                    throw new \Exception("Não foi possivel recuperar a senha");
                }
                else{
                    $dataRecovery = $result1[0];
                    $code = base64_encode(openssl_encrypt($dataRecovery["idrecovery"], 'AES-128-CBC', User::SECRET_KEY, 0, User::SECRET_KEY_IV));
                    $link = "http://www.hcodecommerce.com.br/admin/forgot/reset?code=$code";
                    $mailer = new Mailer($data["desemail"], $data["desperson"], "Redefinir Senha Hcode Store", "forgot",
                        array(
                            "name" => $data["desperson"],
                            "link" => $link
                        )
                    );

                    $mailer->send();
                }
            }
        }
    }
?>