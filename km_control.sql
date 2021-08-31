-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Set-2020 às 17:14
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `km_control`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadcarros`
--

CREATE TABLE `cadcarros` (
  `ID_Cadcarros` int(11) NOT NULL,
  `Modelo` varchar(100) NOT NULL,
  `Placa` varchar(10) NOT NULL,
  `Odometro` decimal(10,0) NOT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cadcarros`
--

INSERT INTO `cadcarros` (`ID_Cadcarros`, `Modelo`, `Placa`, `Odometro`, `status`) VALUES
(2, 'Sandero', 'CBA-4321', '34400', 1),
(11, 'Fiorino', 'ABC-1621', '25000', 1),
(12, 'Variante', 'ABC-5689', '5000', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `entregas`
--

CREATE TABLE `entregas` (
  `ID_entrega` int(11) NOT NULL,
  `DATA_INICIAL` date NOT NULL,
  `HR_INICIAL` time NOT NULL,
  `KM_INICIAL` decimal(6,0) NOT NULL,
  `DATA_FINAL` date NOT NULL,
  `HR_FINAL` time NOT NULL,
  `KM_FINAL` decimal(6,0) NOT NULL,
  `FK_IN_Cadcarros` int(11) NOT NULL,
  `FK_ID_usuario` int(11) NOT NULL,
  `condutor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `entregas`
--

INSERT INTO `entregas` (`ID_entrega`, `DATA_INICIAL`, `HR_INICIAL`, `KM_INICIAL`, `DATA_FINAL`, `HR_FINAL`, `KM_FINAL`, `FK_IN_Cadcarros`, `FK_ID_usuario`, `condutor`) VALUES
(82, '2020-09-06', '18:02:00', '55000', '2020-09-06', '18:03:00', '56000', 2, 4, 'Adriano'),
(83, '2020-09-06', '18:08:00', '55666', '2020-09-06', '18:08:00', '56222', 11, 4, 'Adriano'),
(84, '2020-09-06', '19:01:00', '66000', '2020-09-06', '19:02:00', '66580', 11, 5, 'max');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_usuario` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`ID_usuario`, `nome`, `email`, `senha`) VALUES
(2, 'Wilsaum', 'wilsaum@w.com', '123456'),
(3, 'Juliano', 'juliano@capataz.com', '123456'),
(4, 'Adriano', 'adriansmith@adriansmith.com', 'e10adc3949ba59abbe56e057f20f883e'),
(5, 'max', 'max@chocochoy.com', 'e10adc3949ba59abbe56e057f20f883e'),
(6, 'admin', 'admin@admin.com', '7c96517c4f91ecd441371abfd21da11c'),
(7, 'Maria', 'maria@maria.com', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cadcarros`
--
ALTER TABLE `cadcarros`
  ADD PRIMARY KEY (`ID_Cadcarros`);

--
-- Índices para tabela `entregas`
--
ALTER TABLE `entregas`
  ADD PRIMARY KEY (`ID_entrega`),
  ADD KEY `FK_IN_Cadcarros` (`FK_IN_Cadcarros`),
  ADD KEY `FK_ID_usuario` (`FK_ID_usuario`) USING BTREE;

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadcarros`
--
ALTER TABLE `cadcarros`
  MODIFY `ID_Cadcarros` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `entregas`
--
ALTER TABLE `entregas`
  MODIFY `ID_entrega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `entregas`
--
ALTER TABLE `entregas`
  ADD CONSTRAINT `entregas_ibfk_1` FOREIGN KEY (`FK_IN_Cadcarros`) REFERENCES `cadcarros` (`ID_Cadcarros`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
