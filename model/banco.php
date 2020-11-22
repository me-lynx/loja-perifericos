<?php

require_once("../init.php");
class Banco{

    protected $mysqli;

    public function __construct(){
        try {
            $this->conexao();
        } catch (Exception $e) {
            Echo "Erro:".$e->getMessage();
        }
        
    }

    private function conexao(){
        $this->mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO , BD_SENHA, BD_BANCO);
    }

    public function login($email,$senha){
        $stmt = $this->mysqli->prepare("SELECT 'email', 'admin' FROM usuario WHERE email=? AND senha=?");
        $stmt->bind_param("ss",$email,$senha);
        $stmt->execute();
        $stmt->store_result();
        $rows = $stmt->num_rows;
        if ($rows>0) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }

    public function validaAdmin($email) {
        $stmt = $this->mysqli->prepare("SELECT 'admin' FROM usuario WHERE email=? LIMIT 1");
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $stmt->store_result();
        $rows = $stmt->get_result();
    }

    

    public function setUsuario($nome,$sobrenome,$login,$senha,$admin){
        $stmt = $this->mysqli->prepare("INSERT INTO usuario (`nome`, `sobrenome`, `email`, `senha`, `admin`) VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssss",$nome,$sobrenome,$login,$senha,$admin);
         if( $stmt->execute() == TRUE){
            return true;
        }else{
            return false;
        }
    }

    public function setProduto($nome,$descricao,$quantidade,$preco,$data,$flag){
        $stmt = $this->mysqli->prepare("INSERT INTO produto (`nome`, `descricao`, `quantidade`, `preco`, `data`, `flag`) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("ssssss",$nome,$descricao,$quantidade,$preco,$data,$flag);
         if( $stmt->execute() == TRUE){
            return true;
        }else{
            return false;
        }
    }

    public function getProduto(){
        $array = array();
        $result = $this->mysqli->query("SELECT * FROM produto");
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            $array[] = $row;
        }
        return $array;
    }

    public function getCarrinho($ids) {
        $inQuery = str_replace("a", ",", $ids);
        $array = array();
        $result = $this->mysqli->query("SELECT * FROM produto WHERE idProduto in (". $inQuery .")");
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            $array[] = $row;
        }
        return $array;
    }

    public function deleteProduto($id){
        if($this->mysqli->query("DELETE FROM `produto` WHERE `idProduto` = '".$id."';")== TRUE){
            return true;
        }else{
            return false;
        }
    }

    public function pesquisaProduto($id){
        $result = $this->mysqli->query("SELECT * FROM produto WHERE `idProduto` = '$id'");
        return $result->fetch_array(MYSQLI_ASSOC);
    }

    public function updateProduto($nome,$descricao,$quantidade,$preco,$flag,$data,$id){
        $stmt = $this->mysqli->prepare("UPDATE `produto` SET `nome` = ?, `descricao`=?, `quantidade`=?, `preco`=?, `flag`=?,`data` = ? WHERE `idProduto` = ?");
        $stmt->bind_param("sssssss",$nome,$descricao,$quantidade,$preco,$flag,$data,$id);
        if($stmt->execute()==TRUE){
            return true;
        }else{
            return false;
        }
    }
}
?>
