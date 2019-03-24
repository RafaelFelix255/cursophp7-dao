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

            $this->setData($results[0]);

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

            $this->setData($results[0]);

        } else {
            throw new Exception("Login ou senha inválidos!");
            
        }
    }

    public function insert(){
    
        $sql = new Sql();
        
        $results = $sql->select("CALL sp_usuarios_insert(:login, :senha)",
                                array(':login'=>$this->getLogin(),
                                      ':senha'=>$this->getSenha()));

        if (count($results) > 0 ){
            $this->setData($results[0]);
        }
        
    }

    public function setData($data){

        $this->setIdusuario($data['idusuario']);
        $this->setLogin($data['login']);
        $this->setSenha($data['senha']);
        $this->setDtcadastro(new DateTime($data['dtcadastro']));

    }

    public function __construct($login = "", $senha = ""){

        $this->setLogin($login);
        $this->setSenha($senha);

    }

    public function update($login, $senha){
    
        $this->setLogin($login);
        $this->setSenha($senha);

        $sql = new Sql();
        
        $results = $sql->query("update tb_usuarios u set u.login = :login, u.senha = :senha where u.idusuario = :idusuario",
                         array(':login'=>$this->getLogin(),
                               ':senha'=>$this->getSenha(),
                               ':idusuario'=>$this->getIdusuario()));

    }

}

?>