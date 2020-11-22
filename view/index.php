<?php 
    require_once "../session.php";
    //$admin = $_SESSION['admin'];
    $admin = 1;
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PHE - Periféricos High End</title>

    <!-- BootStrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
        integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- Favicons -->
    <link rel="icon" href="img/ico16.png" sizes="16x16" type="image/png">
    <link rel="icon" href="img/ico32.png" sizes="32x32" type="image/png">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <link rel="stylesheet" href="css/sidebar.css">

</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Perifericos High End</h3>
            </div>

            <ul class="list-unstyled components" id="menu">
                <li class="bmenu active">
                    <a href="#" data-url="index.php"><i class="fa fa-fw fa-home"></i>Home</a>
                </li>
                <li class="bmenu">
                    <a href="#" data-url="produto.php"><i class="fa fa-fw fa-shopping-bag"></i>Produtos</a>
                </li>
                <?php
                    if ($admin == 1) {
                        echo '<li class="bmenu">
                                <a href="#" data-url="cadastro.php"><i class="fa fa-fw fa-shopping-cart"></i>Cadastrar</a>
                             </li>';
                    }
                ?>
                <li class="bmenu">
                    <a href="#" data-url="carrinho.php"><i class="fa fa-fw fa-shopping-cart"></i>Carrinho</a>
                </li>
                <li class="bmenu">
                    <a href="logout.php"><i class="fa fa-fw fa-sign-out"></i>Sair</a>
                </li>
            </ul>
        </nav>
        <!-- Page Content -->
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                </div>
            </nav>
        </div>
    </div>
    <div id="exibeConteudo" class="container">
        <h3>Seja bem vindo a loja da Perifericos High End!</h3>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
            galley of
            type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the
            leap into electronic
            typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
            sheets containing
            Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including
            versions of Lorem Ipsum.</p>
        <figure>
            <img src="img/perifericos_pagina_inicial.png" height="50%" class="img-fluid" alt="Responsive image">
        </figure>
        <p> It is a long established fact that a reader will be distracted by the readable content of a page when
            looking at its layout.
            The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to
            using 'Content here, content here',
            making it look like readable English. Many desktop publishing packages and web page editors now use Lorem
            Ipsum as their default model text,
            and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have
            evolved over the years, sometimes by
            accident, sometimes on purpose (injected humour and the like).</p>
    </div>
</body>

<script>
// Aciona o Highlight no sidebar
var header = document.getElementById("menu");
var btns = header.getElementsByClassName("bmenu");
for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function() {
        var current = document.getElementsByClassName("active");
        current[0].className = current[0].className.replace(" active", "");
        this.className += " active";
    });
}

//Completa a tela sem a necessidade de ficar atualizando a pagina
$("a").click(function() {
    $.ajax({
        url: $(this).data("url"),
        method: 'get',
        success: function(data) {
            $("#exibeConteudo").html(data);
        }
    })
});

//Realiza a compra de um produto
function comprar(id) {
    $.ajax({
        url: "../controller/ControllerCarrinho.php",
        type: "POST",
        data: {
            'id': id
        },
        success: (e) => {
            alert('Compra realizada com sucesso!');
        }
    });
}
</script>