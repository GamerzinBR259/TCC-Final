<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/estilo-creat.css">
    <link rel="icon" type="image/x-icon" href="img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="login inicial ">
    <meta name="keywords" content="user, senha, login">
    <meta name="author" content="Felipe S. Silva">
    <title>Community book pleiades</title>
</head>
<body>

   <form  method="post">
        <div class="main-login">
            <div class="left-login">
                <h1>Bem-vindo à Biblioteca Digital,<br>Community book pleiades!</h1>
                <p>Seja parte da nossa comunidade de leitores e tenha acesso a uma vasta coleção de livros, revistas e recursos educacionais de alta qualidade. O registro é simples e gratuito. Aproveite todos os benefícios que a nossa Biblioteca Digital tem a oferecer.</p><br><br><br>
                <img src="http://localhost:8012/tcc/img/f-creat.png" alt="e-book" srcset="">
            </div>

            <div class="right-login">
                <div class="card-login">
                <h2>Criar Conta</h2>
            <img src="img/logo.png" alt="Logo" class="logo">
            <div class="textfield">
                <label for="usuario" class="form-label">Usuário</label>
                <input id="usuario" class="form-control" name="usuario" placeholder="Nome de usuário " required>
            </div>

            
            <div class="textfield">
                <label for="email" class="form-label">Email</label>
                <input id="email" class="form-control" name="email" placeholder="Email" type="email" required>
                <div id="emailError" class="error-message"></div>
            </div>

            <div class="textfield">
                <label for="senha" class="form-label">Senha</label>
                <input id="senha" class="form-control" name="senha" placeholder="Senha" type="password" required>
                <div id="icon" onclick="ShowHide()"></div>
                </div>
                <br>
            <button type="submit">Criar</button>
            <a href="login.php" class="li-page">Já tem uma conta? Faça login aqui</a><br>


                </div>
            </div>
        </div>
   </form>


    <?php
   include('funcoesphp/register.php')
    ?>
<script src="jv/creat.js"></script>
</body>
</html>
