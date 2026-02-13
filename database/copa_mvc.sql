-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13/02/2026 às 11:29
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `copa_mvc`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `grupos`
--

CREATE TABLE `grupos` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `grupos`
--

INSERT INTO `grupos` (`id`, `nome`) VALUES
(1, 'A'),
(2, 'C');

-- --------------------------------------------------------

--
-- Estrutura para tabela `jogos`
--

CREATE TABLE `jogos` (
  `id` int(11) NOT NULL,
  `mandante_id` int(11) NOT NULL,
  `visitante_id` int(11) NOT NULL,
  `data_hora` datetime NOT NULL,
  `estadio` varchar(100) NOT NULL,
  `fase` varchar(50) NOT NULL,
  `grupo_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `resultados`
--

CREATE TABLE `resultados` (
  `id` int(11) NOT NULL,
  `jogo_id` int(11) NOT NULL,
  `gols_mandante` int(11) NOT NULL,
  `gols_visitante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `selecoes`
--

CREATE TABLE `selecoes` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `continente` varchar(50) NOT NULL,
  `grupo_id` int(11) DEFAULT NULL,
  `pontos` int(11) DEFAULT 0,
  `vitorias` int(11) DEFAULT 0,
  `empates` int(11) DEFAULT 0,
  `derrotas` int(11) DEFAULT 0,
  `gols_marcados` int(11) DEFAULT 0,
  `gols_sofridos` int(11) DEFAULT 0,
  `saldo_gols` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `idade` int(11) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `selecao_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `jogos`
--
ALTER TABLE `jogos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jogo_mandante` (`mandante_id`),
  ADD KEY `fk_jogo_visitante` (`visitante_id`),
  ADD KEY `fk_jogo_grupo` (`grupo_id`);

--
-- Índices de tabela `resultados`
--
ALTER TABLE `resultados`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jogo_id` (`jogo_id`);

--
-- Índices de tabela `selecoes`
--
ALTER TABLE `selecoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_selecao_grupo` (`grupo_id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuario_selecao` (`selecao_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `jogos`
--
ALTER TABLE `jogos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `resultados`
--
ALTER TABLE `resultados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `selecoes`
--
ALTER TABLE `selecoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `jogos`
--
ALTER TABLE `jogos`
  ADD CONSTRAINT `fk_jogo_grupo` FOREIGN KEY (`grupo_id`) REFERENCES `grupos` (`id`),
  ADD CONSTRAINT `fk_jogo_mandante` FOREIGN KEY (`mandante_id`) REFERENCES `selecoes` (`id`),
  ADD CONSTRAINT `fk_jogo_visitante` FOREIGN KEY (`visitante_id`) REFERENCES `selecoes` (`id`);

--
-- Restrições para tabelas `resultados`
--
ALTER TABLE `resultados`
  ADD CONSTRAINT `fk_resultado_jogo` FOREIGN KEY (`jogo_id`) REFERENCES `jogos` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `selecoes`
--
ALTER TABLE `selecoes`
  ADD CONSTRAINT `fk_selecao_grupo` FOREIGN KEY (`grupo_id`) REFERENCES `grupos` (`id`) ON DELETE SET NULL;

--
-- Restrições para tabelas `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuario_selecao` FOREIGN KEY (`selecao_id`) REFERENCES `selecoes` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
