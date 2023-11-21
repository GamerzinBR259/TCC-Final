<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/estilo-alter.css">
    <link rel="icon" type="image/x-icon" href="img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="description" content="projeto de login inicial de um site">
    <meta name="keywords" content="user, senha and log">
    <meta name="author" content="Felipe S. silva">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community book pleiades</title>
</head>
<body>

<form method="post" action="./funcoesphp/alter.php">
<div class="main-login">
    <div class="left-login" >
            <h1> Alterar senha</h1>
            <img src="http://localhost:8012/tcc/img/f-alter.png" class="login-img" alt="Alterara senha">
        </div>

        <div class="right-login" >
            <div class="card-login">
            <h2>Login</h2>
           <img src="img/logo.png" class="logo">
            <div class="textfield" id="login-form">
                <label for="username" class="form-label">Email</label>
                <input id="username" class="form-control" name="x" type="text" placeholder=" Email">
            </div>
            <div class="textfield">
                <label for="password" class="form-label">Senha</label>
                <input id="password" class="form-control" name="w"  type="password" placeholder="Senha">
            </div>
            <br>
            <button type="submit">Alterar Senha</button>
            <div id="icon" onclick="ShowHide()"></div>
        </form>

        </div>
        </div>
    </div>
<script src="jv/senha.js"></script>


</body>
</html>