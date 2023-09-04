-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Jul-2023 às 00:05
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `evento`
--

--
-- Extraindo dados da tabela `eventos`
--

INSERT INTO `eventos` (`id`, `nome`, `data_hora`, `local`, `descricao`, `criador`) VALUES
(5, 'gui', '0013-03-12 03:03:00', 'exe', '', 2);

--
-- Extraindo dados da tabela `participantes`
--

INSERT INTO `participantes` (`id`, `nome`, `email`, `telefone`, `senha`, `usuario`) VALUES
(2, 'admin', 'admin@admin.com', NULL, 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin'),
(3, 'Vinícius', 'vini@gmail.com', NULL, '7c4a8d09ca3762af61e59520943dc26494f8941b', 'vglienke'),
(4, 'Teste 2', 'teste@hotmail.com', 0, '2e6f9b0d5885b6010f9167787445617f553a735f', 'teste'),
(5, 'Alberto Mendes', 'albertinho@gmail.com', 0, '7c4a8d09ca3762af61e59520943dc26494f8941b', 'albertinho'),
(6, 'Guilherme', 'guilherme@admin.com', 2147483647, 'd6a7af134530254f6dae4886d160be8e6c6891c9', 'gui'),
(7, 'Cristian Da Silva', 'cristiandasilva8@gmail.com', 2147483647, 'd052f85fa58fb0497ad4bb7f2d069dd486c4a9aa', 'cristiandasilva8');

--
-- Extraindo dados da tabela `voucher`
--

INSERT INTO `voucher` (`id`, `id_evento`, `id_participante`) VALUES
(14, 2, 2),
(15, 2, 4),
(16, 3, 3),
(17, 1, 2),
(18, 1, 2),
(19, 1, 2),
(20, 1, 2),
(21, 1, 2),
(22, 1, 2),
(23, 1, 2),
(24, 1, 2),
(25, 1, 2),
(26, 1, 2),
(27, 1, 2),
(28, 1, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
