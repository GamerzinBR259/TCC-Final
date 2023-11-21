<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./css/upar.css">
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
                <li><a href="#">Em alta</a></li>
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
    <br><br><h1 class="opa">Upload de Arquivo</h1><br><br>
<!--action da o caminho para o arquivo de execução upload.php-->
<form  method="post" enctype="multipart/form-data">
    <label for="title" class="venha">Título:</label><br>
    <input type="text" name="title" id="title" class="judeus" required><br>

    <label for="autor" class="venha">Autor:</label><br>
<input type="text" name="autor" class="judeus" required><br>


    <label for="sinopse" class="venha">Sinopse:</label><br>
    <textarea name="sinopse" id="sinopse" rows="4" class="estegossauro"></textarea><br>

    <label for="generos" class="venha">Selecione os Gêneros:</label><br>
    <div class="check" aria-labelledby="navbarScrollingDropdown">
        <input type="checkbox" name="generos[]" value="Fantasia"> Fantasia<br>
        <input type="checkbox" name="generos[]" value="Terror"> Terror<br>
        <input type="checkbox" name="generos[]" value="Romance"> Romance<br>
        <input type="checkbox" name="generos[]" value="Ficção científica"> Ficção científica<br>
        <input type="checkbox" name="generos[]" value="Ação e aventura"> Ação e aventura<br>
        <input type="checkbox" name="generos[]" value="Distopia"> Distopia<br>
        <input type="checkbox" name="generos[]" value="Ficção Policial"> Ficção Policial<br>
        <input type="checkbox" name="generos[]" value="Thriller e Suspense"> Thriller e Suspense<br>
        <input type="checkbox" name="generos[]" value="Ficção histórica"> Ficção histórica<br>
        <!-- Adicione mais checkboxes para outros gêneros -->
    </div><br>

    <h2 class="opa">Enviar Imagem</h2><br><br>
    <input type="file" class="imageFile" name="imageFile" enctype="multipart/form-data"><br><br>

    <h2 class="opa">Enviar PDF</h2><br><br>
    <input type="file" class="fileToUpload" name="fileToUpload" id="fileToUpload" required><br><br>

    <input type="submit" class="butao" value="Enviar" name="submit">
</form>
<main></main>

<?php
   include('funcoesphp/upload.php')
    ?>

<script src="jv/nave.js"></script>

</body>
</html>