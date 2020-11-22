<!-- <!DOCTYPE HTML>
<html>

<head>
    <link rel="stylesheet" href="css/estiloCad.css">
</head>

<body> -->
<div class="container">
    <form method="post" action="../controller/ControllerCadastro.php" id="form" name="form"
        onsubmit="validar(document.form); return false;" class="col-10">
        <div class="form-group">
            <input class="form-control" type="text" id="nome" name="nome" placeholder="Nome do Produto" required
                autofocus>
            <input class="form-control" type="text" id="descricao" name="descricao" placeholder="Descrição do Produto"
                required>
            <input class="form-control" type="number" id="quantidade" name="quantidade"
                placeholder="Quantidade em Estoque" required>
            <input class="form-control" type="text" id="preco" name="preco" placeholder="Preço do Produto"
                onkeypress="formatarMoeda();" required>
            <input class="form-control" type="date" id="data" name="data" placeholder="Data de Inclusão do Produto"
                required>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="flag" name="flag">
                <label class="form-check-label" for="exampleCheck1">Disponivel</label>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success" id="cadastrar">Salvar</button>
            <a href="index.php" class="btn btn-outline-primary cancelar">Cancelar</a>
        </div>
    </form>
</div>
<!-- 
    
</body>

</html> -->
<script>
function formatarMoeda() {
    var elemento = document.getElementById('preco');
    var valor = elemento.value;
  
    valor = valor + '';
    valor = parseInt(valor.replace(/[\D]+/g,''));
    valor = valor + '';
    valor = valor.replace(/([0-9]{2})$/g, ",$1");

    if (valor.length > 6) {
        valor = valor.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
    }
    elemento.value = valor;
}



function validar(formulario) {
    var quantidade = form.quantidade.value;
    var preco = form.preco.value;
    for (i = 0; i <= formulario.length - 2; i++) {
        if ((formulario[i].value == "")) {
            alert("Preencha o campo " + formulario[i].name);
            formulario[i].focus();
            return false;
        }
    }
    if (quantidade <= 0) {
        alert('A quantidade de páginas não pode ser igual ou inferior a 0');
        form.quantidade.focus();
        return false;
    }
    if (preco <= 0) {
        alert('O preço do livro não pode ser igual ou infeiror a 0');
        form.preco.focus();
        return false;
    }

    form.flag.value = (form.flag.value == "on") ? 1 : 0;
    formulario.submit();
}
</script>