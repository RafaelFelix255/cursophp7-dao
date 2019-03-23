<?php

class Usuario{
    
    private $idusuario;
    private $login;
    private $senha;
    private $dtcadastro;

    public function getIdusuario(){
        return $this->idusuario;
    }

    public function setIdusuario($idusuario){
        $this->idusuario = $idusuario;
    }

    public function getLogin(){
        return $this->login;
    }

    public function setLogin($login){
        $this->login = $login;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function setSenha($senha){
        $this->senha = $senha;
    }

    public function getDtcadastro(){
        return $this->dtcadastro;
    }

    public function setDtcadastro($dtcadastro){
        $this->dtcadastro = $dtcadastro;
    }

    public function loadById($idusuario){
        $sql = new Sql();

        $results = $sql->select("select * from tb_usuarios u where u.idusuario = :idusuario;",
                                array(":idusuario"=>$idusuario));
        
        if (count($results) > 0) {
            $row = $results[0];

            $this->setIdusuario($row['idusuario']);
            $this->setLogin($row['login']);
            $this->setSenha($row['senha']);
            $this->setDtcadastro(new DateTime($row['dtcadastro']));

        }

    }

    public function __toString(){
        return json_encode(array(
            "idusuario"=>$this->getIdusuario(),
            "login"=>$this->getLogin(),
            "senha"=>$this->getSenha(),
            "dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")
        ));
    }

    public static function getList(){
        
        $sql = new Sql();

        return $sql->select("select * from tb_usuarios u order by u.idusuario;");
    }

    public static function search($login){
        
        $sql = new Sql();
        
        return $sql->select("select * from tb_usuarios u where u.login like :login order by u.login",
                            array(':login'=>"%".$login."%"));

    }

    public function login($login, $password ){
        $sql = new Sql();

        $results = $sql->select("select * from tb_usuarios u where u.login = :login and u.senha = :senha;",
        array(":login"=>$login, ":senha"=>$password));

        if (count($results) > 0) {
            $row = $results[0];

            $this->setIdusuario($row['idusuario']);
            $this->setLogin($row['login']);
            $this->setSenha($row['senha']);
            $this->setDtcadastro(new DateTime($row['dtcadastro']));

        } else {
            throw new Exception("Login ou senha inválidos!");
            
        }
    }

}

?>