<?php
require_once("banco.php");

class Usuario extends Banco{
    private $id;
    private $nome;
    private $sobrenome;
    private $email;
    private $senha;
    private $admin;

    //Metodos Set
    public function setNome($string){
        $this->nome = $string;
    }
    public function setSobrenome($string){
        $this->sobrenome = $string;
    }
    public function setEmail($string){
        $this->email = $string;
    }
    public function setSenha($string){
        $this->senha = $string;
    }
    public function setAdmin($string){
        $this->admin = $string;
    }

    //Metodos Get
    public function getNome(){
        return $this->nome;
    }
    public function getSobrenome(){
        return $this->sobrenome;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getSenha(){
        return $this->senha;
    }
    public function getAdmin(){
        return $this->admin;
    }

    public function incluir(){
        return $this->setUsuario($this->getNome(),$this->getSobrenome(),$this->getEmail(),$this->getSenha(),$this->getAdmin());
    }

    public function logar(){
        return $this->login($this->getEmail(),$this->getSenha());
    }

    public function validaAdministrador() {
        return $this->validaAdmin($this->getEmail());
    }
}



?>