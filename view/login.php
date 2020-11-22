<?php require_once "../controller/ControllerLogin.php"; ?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
        integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Área Restrita</title>

    <!-- Favicons -->
    <link rel="icon" href="img/ico16.png" sizes="16x16" type="image/png">
    <link rel="icon" href="img/ico32.png" sizes="32x32" type="image/png">

    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
    </style>
    <!-- Custom styles for this template -->
    <link href="css/login.css" rel="stylesheet">
</head>

<body class="text-center">
    <form method="post" class="form-signin">
        <img class="mb-4" src="img/logophe.png" alt="" width="128" height="250">
        <h1 class="h3 mb-3 font-weight-normal">Periféricos High End</h1>
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="Email" required autofocus>
        <label for="inputPassword" class="sr-only">Senha</label>
        <input type="password" id="senha" name="senha" class="form-control" placeholder="Senha" required>
        <div class="checkbox mb-3">
            <a href="registro.php"> Cadastre-se </a>
            <!-- <label>
                <input type="checkbox" value="remember-me"> Lembrar-me
            </label> -->
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" value="Entrar">Entrar</button>
        <div id="msgerro">
            <label><strong>Campos obrigatórios faltando!</strong></label>
        </div>
        <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
    </form>
</body>
</html>

<script>
//Captura retorno enviado pelo PHP
function msg(text) {
    //Altera exibição da div informativa
    document.getElementById("msgerro").style.display = "block";
    //Define o texto enviado pelo PHP
    msgerro.querySelector("label").textContent = text;
}
</script>

<?php
    if(isset($_POST['email']))
        {
            $loga = new Login();
        } 
?>