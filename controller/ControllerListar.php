<?php
require_once("../model/banco.php");
class listarController{
    private $lista;

    public function __construct(){
        $this->lista = new Banco();
        $this->criarTabela();
    }

    private function criarTabela(){
        $row = $this->lista->getProduto();
            foreach ($row as $value){
                echo "<tr>";
                echo "<th>".$value['idProduto'] ."</th>";
                echo "<th>".$value['nome'] ."</th>";
                echo "<td>".$value['descricao'] ."</td>";
                echo "<td>".$value['quantidade'] . " Items" ."</td>";
                echo "<td> R$".$value['preco'] ."</td>";
                echo "<td width='200'>".$value['data'] ."</td>";
                echo "<td>".($value['flag'] == 0 ? "Desativado" : "Ativado")."</td>";
                echo "<td><button type='button' class='btn btn-success' ".($value['flag'] == 0 ? "disabled" : "")." onclick='comprar(".$value['idProduto'].")'>Comprar</button> <a class='btn btn-warning' href='#' data-url='editar.php?id=".$value['idProduto']."'>Editar</a> <a class='btn btn-danger' href='../controller/ControllerDeletar.php?id=".$value['idProduto']."'>Excluir</a></td>";
                echo "</tr>";
        }
    }
}

