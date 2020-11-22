<?php
require_once("../model/banco.php");

class editarController {

    private $editar;
    private $nome;
    private $descricao;
    private $quantidade;
    private $preco;
    private $data;
    private $flag;

    public function __construct($id){
        $this->editar = new Banco();
        $this->criarFormulario($id);
    }

    private function criarFormulario($id){
        $row = $this->editar->pesquisaProduto($id);
        $this->idProduto    =$row['idProduto'];
        $this->nome         =$row['nome'];
        $this->descricao    =$row['descricao'];
        $this->quantidade   =$row['quantidade'];
        $this->preco        =$row['preco'];
        $this->data         =$row['data'];
        $this->flag         =$row['flag'];
    }

    public function editarFormulario($nome,$descricao,$quantidade,$preco,$data,$flag,$id){
        if($this->editar->updateProduto($nome,$descricao,$quantidade,$preco,$flag,$data,$id) == TRUE){
            echo "<script>alert('Registro incluído com sucesso!');window.location='../view/index.php'</script>";
        }else{
            echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
        }
    }

    public function getNome(){
        return $this->nome;
    }
    public function getDescricao(){
        return $this->descricao;
    }
    public function getQuantidade(){
        return $this->quantidade;
    }
    public function getPreco(){
        return $this->preco;
    }
    public function getData(){
        return $this->data;
    }
    public function getFlag(){
        return $this->flag;
    }


}
$id = filter_input(INPUT_GET, 'id');
$editar = new editarController($id);
if(isset($_POST['submit'])){
    $editar->editarFormulario($_POST['nome'],$_POST['descricao'],$_POST['quantidade'],$_POST['preco'],$_POST['data'],$_POST['flag'],$_POST['idProduto']);
}
?>
