<?php
require_once "../model/usuario.php";
session_start();

class Login {
    private $usuario;
    
    public function __construct(){
        $this->usuario = new Usuario();
        $this->usuario->setEmail($_POST['email']);
        $this->usuario->setSenha($_POST['senha']);
        $this->acessar();
    }

    private function acessar(){
        $resultado=$this->usuario->logar();
        $email=$this->usuario->getEmail();
        //$admin=$this->usuario->validaAdministrador();
        if($resultado){
            $_SESSION['email']=$email;
            header("location:../view/index.php");
        } else{
            session_destroy();
            echo "<script>msg('Usuário/Senha incorretos!')</script>";
        }
    }
}
?>