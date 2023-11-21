<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     <link rel="stylesheet" href="./css/estlo-info-livro.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/x-icon" href="img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community book pleiades</title>
</head>
<body>
<header>
        <nav class="nav">
            <a class="logo" href="menu.php">
                <img src="img/logo.png" alt="Logo" id="logo-image" width="auto"  height="40px" style="border-radius: 20px;">
            </a>
            <div class="mobile-menu" id="mobile-menu">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
            <ul class="nav-list">
                <li><a href="alta.php">Em alta</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">Gêneros</a>
                    <ul class="dropdown-menu">
    <li><a href="filtro.php?genre=Fantasia">Fantasia</a></li>
    <li><a href="filtro.php?genre=Terror">Terror</a></li>
    <li><a href="filtro.php?genre=Romance">Romance</a></li>
    <li><a href="filtro.php?genre=Ficção científica">Ficção científica</a></li>
    <li><a href="filtro.php?genre=Ação e aventura">Ação e aventura</a></li>
    <li><a href="filtro.php?genre=Distopia">Distopia</a></li>
    <li><a href="filtro.php?genre=Ficção Policial">Ficção Policial</a></li>
    <li><a href="filtro.php?genre=Thriller e Suspense">Thriller e Suspense</a></li>
    <li><a href="filtro.php?genre=Ficção histórica">Ficção histórica</a></li>
</ul>
<li><a href="upar.php">Publicar</a></li>
                </li>
            </ul>
        </nav>
    </header>
    <form method="POST" action="pesquisar.php">
    <div class="search-box">
        <input type="text" name="search" class="search-txt" placeholder="pesquisar">
        <button type="submit" class="search-btn">
            <img src="img/loupe.svg" alt="lupa" height="20" width="20">
        </button>
    </div>
</form>



<?php
   include('funcoesphp/detalhe.php')
    ?>


<?php include('funcoesphp/conexao.php'); ?>

<?php
include('funcoesphp/conexao.php');

// Função para adicionar um comentário
function adicionarComentario($conn, $livro_id, $usuario_id, $comentario, $data_publicacao, $avaliacao) {
    $sql = "INSERT INTO comentario (usuario_id, livro_id, mensagem, data_publicacao, avaliacao) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "iissi", $usuario_id, $livro_id, $comentario, $data_publicacao, $avaliacao);
        if (mysqli_stmt_execute($stmt)) {
            return true; // Inserção bem-sucedida
        } else {
            return false; // Erro na inserção
        }
    } else {
        return false; // Erro na preparação da consulta
    }
}

// Verificar se o ID do livro está presente na URL
if (!isset($_GET['id'])) {
    header("Location: alguma_pagina_de_erro.php");
    exit();
}

$livro_id = $_GET['id']; // Obtém o ID do livro da URL

$erro = "";

// Lidar com a adição de comentário
if (isset($_POST['comentario'])) {
    $usuario_id = $_SESSION['usuario_id']; // Aqui está usando a variável de sessão
    $comentario = mysqli_real_escape_string($conn, $_POST['comentario']);
    $data_publicacao = $_POST['data_publicacao']; // Recupere a data do campo oculto

    // Verificar se uma avaliação válida foi selecionada
    if (isset($_POST['estrela']) && in_array($_POST['estrela'], ['1', '2', '3', '4', '5'])) {
        $avaliacao = $_POST['estrela'];

        if (adicionarComentario($conn, $livro_id, $usuario_id, $comentario, $data_publicacao, $avaliacao)) {
            // Inserção bem-sucedida
            header("Location: det.php?id=$livro_id&success=1"); // Redireciona com parâmetro de sucesso
            exit();
        } else {
            // Erro na inserção
            $erro = "Erro ao adicionar o comentário. Tente novamente mais tarde.";
        }
    } else {
        // Avaliação inválida
        $erro = "Selecione uma avaliação válida de 1 a 5 estrelas.";
    }
}


// Função para exibir os comentários
function getComentarios($conn, $livro_id) {
    $sql = "SELECT * FROM comentario WHERE livro_id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $livro_id);
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            return $result;
        } else {
            return false; // Erro na consulta
        }
    } else {
        return false; // Erro na preparação da consulta
    }
}

// Função para obter o nome do usuário a partir da tabela logi
function getNomeUsuario($conn, $usuario_id) {
    $sql = "SELECT usuario FROM logi WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $usuario_id);
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);
            return $row['usuario'];
        } else {
            return false; // Erro na consulta
        }
    } else {
        return false; // Erro na preparação da consulta
    }
}
// Função para calcular a média das avaliações
function calcularMediaAvaliacoes($conn, $livro_id) {
    $sql = "SELECT AVG(avaliacao) AS media FROM comentario WHERE livro_id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $livro_id);
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);
            return $row['media'];
        } else {
            return false; // Erro na consulta
        }
    } else {
        return false; // Erro na preparação da consulta
    }
}

// Calcular a média das avaliações
$mediaAvaliacoes = calcularMediaAvaliacoes($conn, $livro_id);

// Obter os comentários
$result = getComentarios($conn, $livro_id);
?>

<!-- Exibir as estrelas com base na média de avaliações -->
<h2>Avaliação Média do livro:</h2>
<div class="estrelas" id="es">
    <?php
    $mediaAvaliacoesInteira = floor($mediaAvaliacoes); // Parte inteira da média
    for ($i = 1; $i <= 5; $i++) {
        if ($i <= $mediaAvaliacoesInteira) {
            echo '<i class="estrela-preenchida fa-solid fa-star"></i>';
        } else {
            echo '<i class="estrela-vazia fa-solid fa-star"></i>';
        }
    }
    ?>
</div>

<h1>Comentários do Livro</h1>
    
<!-- Formulário para adicionar um comentário -->
<form method="POST" action="" class="alexandre">
    <textarea name="comentario" rows="4" cols="50" placeholder="Adicione um comentário" id="coment"></textarea><br>
    <div class="estrelas" id="div-estrela">

            <!-- Carrega o formulário definindo nenhuma estrela selecionada -->
            <input type="radio" name="estrela" id="vazio" value="" checked>

            <!-- Opção para selecionar 1 estrela -->
            <label for="estrela_um"><i class="opcao fa"></i></label>
            <input type="radio" name="estrela" id="estrela_um" id="vazio" value="1">

            <!-- Opção para selecionar 2 estrela -->
            <label for="estrela_dois"><i class="opcao fa"></i></label>
            <input type="radio" name="estrela" id="estrela_dois" id="vazio" value="2">

            <!-- Opção para selecionar 3 estrela -->
            <label for="estrela_tres"><i class="opcao fa"></i></label>
            <input type="radio" name="estrela" id="estrela_tres" id="vazio" value="3">

            <!-- Opção para selecionar 4 estrela -->
            <label for="estrela_quatro"><i class="opcao fa"></i></label>
            <input type="radio" name="estrela" id="estrela_quatro" id="vazio" value="4">

            <!-- Opção para selecionar 5 estrela -->
            <label for="estrela_cinco"><i class="opcao fa"></i></label>
            <input type="radio" name="estrela" id="estrela_cinco" id="vazio" value="5"><br><br>
            </div>
    <input type="hidden" name="data_publicacao" id="data_publicacao">
    <input type="submit" value="Comentar" class="comentar">
</form>

 <!-- Exibir mensagens de erro ou sucesso -->
 <?php if (isset($erro)): ?>
        <p style="color: red;" id="mensagem"><?php echo $erro; ?></p>
    <?php endif; ?>

    <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
        <p style="color: green;" id="mensagem">Comentário adicionado com sucesso!</p>
    <?php endif; ?>

    <!-- Exibir os comentários -->

    <h2>Comentários:</h2>
<ul>
    <?php if ($result && mysqli_num_rows($result) > 0): ?>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <li class="neymar">
                <?php if (isset($row['usuario_id'])): ?>
                    <strong><?php echo getNomeUsuario($conn, $row['usuario_id']); ?></strong> disse em <?php echo date('d/m/Y H:i', strtotime($row['data_publicacao'])); ?>:<br>
                <?php endif; ?>
                Avaliação: <?php echo $row['avaliacao']; ?> estrela(s)<br>
                <?php echo $row['mensagem']; ?>
                
                <!-- Exibir estrelas com base na avaliação -->
                <div class="estrelas">
                    <?php
                    $avaliacao = $row['avaliacao'];
                    for ($i = 1; $i <= 5; $i++) {
                        if ($i <= $avaliacao) {
                            echo '<i class="estrela-preenchida fa-solid fa-star"></i>';
                        } else {
                            echo '<i class="estrela-vazia fa-solid fa-star"></i>';
                        }
                    }
                    ?>
                </div>
            </li>
        <?php endwhile; ?>
    <?php else: ?>
        <li>Sem comentários.</li>
    <?php endif; ?>
</ul>





<script src="jv/comentariof.js"></script>

</body>
</html>