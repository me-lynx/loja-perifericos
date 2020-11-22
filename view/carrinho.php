<?php 
require_once("../controller/ControllerCarrinho.php");

    if (!isset($_COOKIE[$cookie_name])) {
        echo "
            <div class='container'>
                <h3>Seu carrinho está vazio!</h3>
            </div>
        ";
    } else {
        echo '
        
        <div id="table" class="container">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Qtd. Disponivel</th>
                    <th>Preço</th>
                    <th>Data de Inclusão</th>
                </tr>
            </thead>
            <tbody>
                 
        ';
        new listarCarrinho();
        echo '
        </tbody>
        </table>
    </div>';
}

?>




