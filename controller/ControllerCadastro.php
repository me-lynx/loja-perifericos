<?php
require_once("../model/produto.php");
class cadastroController{

    private $cadastro;

    public function __construct(){
        $this->cadastro = new Cadastro();
        $this->incluir();
    }

    private function incluir(){
        $this->cadastro->setNome($_POST['nome']);
        $this->cadastro->setDescricao($_POST['descricao']);
        $this->cadastro->setQuantidade($_POST['quantidade']);
        $this->cadastro->setPreco($_POST['preco']);
        $this->cadastro->setData(date('Y-m-d',strtotime($_POST['data'])));
        $this->cadastro->setFlag($_POST['flag']);
        $result = $this->cadastro->incluir();
        if($result >= 1){
            echo "<script>alert('Registro incluído com sucesso!');document.location='../view/index.php'</script>";
        }else{
            echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
        }
    }
}

new cadastroController ();
