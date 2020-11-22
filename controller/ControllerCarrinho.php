<?php
require_once("../model/banco.php");

$cookie_name = "Carrinho";
$cookie_value = (isset($_POST['id']) ? $_POST['id'] : null);

class listarCarrinho {
    private $carrinho;

    public function __construct(){
        $this->carrinho = new Banco();
        $this->exibirCarrinho();
    }

    private function exibirCarrinho(){
        $ids = $_COOKIE['Carrinho'];
        //$arrayIds = explode("a", $ids);
        $row = $this->carrinho->getCarrinho($ids);
            foreach ($row as $value){
                echo "<tr>";
                //echo "<th>".$value['idProduto'] ."</th>";
                echo "<th>".$value['nome'] ."</th>";
                echo "<td>".$value['descricao'] ."</td>";
                echo "<td>".substr_count( $ids, $value['idProduto']) . " Items" ."</td>";
                echo "<td> R$".$value['preco'] ."</td>";
                echo "<td>".$value['data'] ."</td>";
                //echo "<td>".($value['flag'] == 0 ? "Desativado" : "Ativado")."</td>";
                //echo "<td><button type='button' class='btn btn-success' ".($value['flag'] == 0 ? "disabled" : "")." onclick='comprar(".$value['idProduto'].")'>Comprar</button> <a class='btn btn-warning' href='#' data-url='editar.php?id=".$value['idProduto']."'>Editar</a> <a class='btn btn-danger' href='../controller/ControllerDeletar.php?id=".$value['idProduto']."'>Excluir</a></td>";
                echo "</tr>";
        }
    }
}

if (isset($_COOKIE[$cookie_name])) {
    if (!is_null($cookie_value)) {
        $cookie_value = $_COOKIE[$cookie_name] . "a" . $cookie_value;
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    }
} else {
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
}

?>