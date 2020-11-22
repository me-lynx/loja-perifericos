<?php require_once("../controller/ControllerListar.php"); ?>

<head>
    <style>
        a.btn {
            width: 100px;
            margin-bottom: 5px;
        }
        button.btn {
            width: 100px;
            margin-bottom: 5px;
        }
    </style>
</head>

<div id="table" class="container">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Qtd. Disponivel</th>
                <th>Preço</th>
                <th>Data de Inclusão</th>
                <th>Status</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
            <?php new listarController();  ?>
        </tbody>
    </table>
</div>

<script>
$("a.btn").click(function() {
    $.ajax({
        url: $(this).data("url"),
        method: 'get',
        success: function(data) {
            $("#exibeConteudo").html(data);
        }
    })
});
</script>