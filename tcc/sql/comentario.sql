-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18/10/2023 às 19:40
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
-- Estrutura para tabela `comentario`
--

CREATE TABLE `comentario` (
  `cod` int(11) NOT NULL,
  `mensagem` varchar(6000) NOT NULL,
  `usuario_id` int(6) NOT NULL,
  `livro_id` int(6) NOT NULL,
  `data_publicacao` datetime DEFAULT NULL,
  `avaliacao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `comentario`
--

INSERT INTO `comentario` (`cod`, `mensagem`, `usuario_id`, `livro_id`, `data_publicacao`, `avaliacao`) VALUES
(1, 'amei', 19, 8, '2023-10-18 17:33:35', 3),
(2, 'amei', 19, 8, '2023-10-18 17:33:35', 3),
(3, 'gostei muito do livro', 19, 8, '2023-10-18 17:34:10', 5),
(4, 'gostei muito do livro', 19, 8, '2023-10-18 17:34:10', 5),
(5, 'gostei muito do livro', 19, 8, '2023-10-18 17:34:10', 5),
(6, 'm', 19, 8, '2023-10-18 17:38:46', 2),
(7, 'm', 19, 8, '2023-10-18 17:38:46', 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `comentario_ibfk_1` (`livro_id`),
  ADD KEY `comentario_ibfk_2` (`usuario_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `comentario`
--
ALTER TABLE `comentario`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`livro_id`) REFERENCES `files` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `logi` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
