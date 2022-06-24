-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 24-Jun-2022 às 18:13
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portal_agro`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `animal`
--

CREATE TABLE `animal` (
  `id` int(11) NOT NULL,
  `racao` double NOT NULL,
  `peso` double NOT NULL,
  `data_nascimento` date NOT NULL,
  `situacao` int(11) NOT NULL,
  `rebanho_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `animal`
--

INSERT INTO `animal` (`id`, `racao`, `peso`, `data_nascimento`, `situacao`, `rebanho_id`) VALUES
(6, 5, 100, '2022-06-14', 1, 18),
(7, 10, 120, '2022-06-01', 1, 20),
(8, 10, 120, '2022-06-01', 1, 20),
(12, 10, 253, '2020-05-30', 1, 21),
(13, 10, 250, '2022-05-01', 1, 22),
(14, 10, 120, '2022-06-01', 1, 22),
(15, 10, 250, '2022-06-08', 1, 22),
(16, 10, 122, '2022-04-01', 2, 16),
(17, 60, 150, '2004-08-12', 2, 25),
(18, 70, 200, '2009-02-19', 1, 25),
(19, 100, 1000, '2015-09-15', 1, 30);

-- --------------------------------------------------------

--
-- Estrutura da tabela `rebanho`
--

CREATE TABLE `rebanho` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `tipo` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `rebanho`
--

INSERT INTO `rebanho` (`id`, `descricao`, `tipo`, `usuario_id`) VALUES
(14, 'Meus cavalos', 5, 7),
(16, 'burros', 6, 10),
(18, 'meu gado', 2, 11),
(19, 'cavalos', 5, 12),
(20, 'porcos caipira', 8, 12),
(21, 'Meu gado', 2, 1),
(22, 'Meu gado de leite', 2, 6),
(23, 'nÃ£o sei', 1, 1),
(24, 'Meu gado', 2, 10),
(25, 'VACAS ', 2, 12),
(30, 'BUFALOS', 3, 12),
(33, 'a', 2, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `sobrenome` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `senha` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `sobrenome`, `email`, `senha`) VALUES
(1, 'a1', 'a1', 'a@a', '$2y$10$Z4F37.ajRtz.UzNsKRxVHelbO3mxa9qo7J0/Utys28MwCRhe87Ak.'),
(2, 'a1', 'a1', 'a@a', '$2y$10$FAXFEkU.l0uB/RDZu8cEZelNDs4YMUBpnUc6HvNNQAnJsp1CRN8DG'),
(3, 'a1', 'a1', 'a@a', '$2y$10$njKYOF1kSu9Dyhx0JsBh8eMmw/aw55q4LJ7KEN/xPqJC2bIBjq48a'),
(4, 'Murilo', 'nascimento', 'murilo@gmail.com', '$2y$10$Ky5zTy8Jdr40QSYVnTPksedAqXLYyTYCQPuMJmbbwlGGl3QkjvLk6'),
(5, '11', '11', '11@11', '$2y$10$DrEaiyTwOsM57rLiKo5AiuWolpHpeSGyPyLqphl8sPmZTMwO2V4m2'),
(6, 'teste', 'teste', 'teste@teste', '$2y$10$gx0FyjYV3urx2bVtLgpQ6eQDQJFjv.L2xOMD0JuWt2dlE2QWyjZbq'),
(7, 'admin', 'admin', 'admin@admin', '$2y$10$XQaDBh1RcWd0ExyKuKGklOcJ/74uyq.b8nVhXrhgAmBatrYE5GAgy'),
(10, 'cad', 'cad', 'cad@cad', '$2y$10$lcZnz808Je5hFIHCUqq01.fW06vJYrMm66Ud/b7Vn/L3WU8XVytcG'),
(11, 'murilo', 'n', 'm@m', '$2y$10$kIdBGtxc3aaIBhHLah6Ir.UYtlwo/J2Yx8/QGnzK17IvtS0S7y1Ta'),
(12, 'gabriela', 'matos', 'gabriela@m', '$2y$10$xKHXRZ4I9LSs0Mzq/gqoZO0fltr6V8WQEarcxg/9rStxl/qDN8q1K');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_rebanho` (`rebanho_id`);

--
-- Indexes for table `rebanho`
--
ALTER TABLE `rebanho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_usuario` (`usuario_id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animal`
--
ALTER TABLE `animal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `rebanho`
--
ALTER TABLE `rebanho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `fk_id_rebanho` FOREIGN KEY (`rebanho_id`) REFERENCES `rebanho` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `rebanho`
--
ALTER TABLE `rebanho`
  ADD CONSTRAINT `fk_id_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
