<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/menu-nav.css">
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






<section id="produtos">
        <?php

include('funcoesphp/listar.php')
        ?>
    </ul>

    </section>
    

<script src="jv/nave.js"></script>
</body>
</html>