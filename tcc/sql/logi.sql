-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18/10/2023 às 19:41
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `livraria`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `logi`
--

CREATE TABLE `logi` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `logi`
--

INSERT INTO `logi` (`id`, `email`, `senha`, `usuario`) VALUES
(13, '00001092269460sp@al.educacao.sp.gov.br', '$2y$10$p05FCrY415d9oxyD7hyMLeDlOxkdr00nsT3S5siNuVqJ0BTRvZ1TO', 'Felipe'),
(14, 'Felipe@gmail.com', '$2y$10$MkX6ELCqs63EoXc7FaQZhOAjPIAPXFqV.q2Kn5SDQguX0UyPD9T1W', 'felipe'),
(15, 'felipenaruto2006@gmail.com', '$2y$10$YE6jqF9IY6DCuyNIKQ02du941PKhwa//2KtnJay2BY4D5SU4ts2Mu', 'eu'),
(16, 'qwdasadadas@gmail.com', '$2y$10$uB2QjDXJ0CAp74b1yWkowOKUFkGq0vlFBMiFxH5TdYM8gI5/Ch9F.', 'Felipe'),
(17, 'e2iqwhdjklsakdjas@gmail.com', '$2y$10$dAdMRMrNQwRV6GGDwkRFceq6yG5lcGqvT2iK7uotryL4i1PrWhQAe', 'jhjasjzldka'),
(18, 'Ele@gmail.com', '$2y$10$Vy6ruDkRoBA3shSCT0AtDO88dp0bAgUK4h270egaN/ZxbkkaM8qL6', 'fe'),
(19, 'Submundo.44@gmail.com', '$2y$10$FARrfaEej3Dsqp5BQrRyEOMbjxjtIGCfUpqjclTBBfiKldppGSWpG', 'Hades'),
(20, 're@gmail.com', '$2y$10$.sBHJTxoF51MZnD4zBr0qOI8uXuIF/48wIr4QNgvdlOWvW3pX4e9a', 'Regina');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `logi`
--
ALTER TABLE `logi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `logi`
--
ALTER TABLE `logi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
