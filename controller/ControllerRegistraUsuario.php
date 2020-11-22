<?php 
require_once "../model/usuario.php"; 

class Registra{
    private $user;

    public function __construct(){
        $this->user = new Usuario();
        $this->user->setNome($_POST['nome']);
        $this->user->setSobrenome($_POST['sobrenome']);
        $this->user->setEmail($_POST['email']);
        $this->user->setSenha($_POST['senha']);
        $this->user->setAdmin(0);
        $this->registrar();
    }

    private function registrar(){
        $resultado = $this->user->incluir();

        if($resultado >= 1){
            echo "<script>alert('Registro incluído com sucesso!');document.location='../view/login.php'</script>";
        }else{
            echo "<script>msg('Email já cadastrado!')</script>";;
        }
    }
}


?>