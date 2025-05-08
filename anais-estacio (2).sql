-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 08-Maio-2025 às 16:04
-- Versão do servidor: 8.0.41-0ubuntu0.22.04.1
-- versão do PHP: 8.1.2-1ubuntu2.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `anais-estacio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `anais`
--

CREATE TABLE `anais` (
  `id_anais` int NOT NULL,
  `instituicao` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `evento` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tema` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `descricao` text COLLATE utf8mb4_general_ci NOT NULL,
  `isbn` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `fk_id_docente` int DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ano` year NOT NULL,
  `file_path` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `fk_id_curso` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `anais`
--

INSERT INTO `anais` (`id_anais`, `instituicao`, `evento`, `tema`, `descricao`, `isbn`, `fk_id_docente`, `create_at`, `ano`, `file_path`, `fk_id_curso`) VALUES
(11, 'anais usuário 2', 'anais usuário 2', 'anais usuário 2', 'anais usuário 2 anais usuário 2 anais usuário 2 anais usuário 2', '12345', 2, '2025-05-08 17:20:57', 2023, 'SLIDE_GERAL_-_BANCO_DE_DADOS.pdf', 6),
(13, 'anais usuário 2', 'anais usuário 2', 'anais usuário 2', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eu turpis volutpat, euismod ex mollis, elementum tellus. Pellentesque sed porttitor ante. Pellentesque sit amet sapien porta, luctus augue in, interdum mauris. Morbi tincidunt, tortor et interdum tempor, tortor sem venenatis nisl, ut suscipit dui augue blandit leo. Pellentesque id lacus purus. Ut in aliquam felis. Integer a magna id purus mattis egestas. Donec quis egestas purus. Praesent eu arcu facilisis, sceleris', '4321', 2, '2025-05-08 17:20:35', 2022, 'Play Framework - Java para web sem servlets e com diversao.pdf', 5),
(19, 'Faculdade Estácio de Sá de Vitória / Faculdade Estácio de Sá de Vila Velha ', 'IX SEMINÁRIO DE PESQUISA, EXTENSÃO E  INTERNACIONALIZAÇÃO', 'A inteligência artificial e o desenvolvimento sustentável na educação', '1llentesque vitae augue quis sem pulvinar facilisis faucibus vel tortor. Aliquam rhoncus libero a varius blandit. Nam fermentum eleifend velit eu varius. Curabitur nunc sapien, venenatis dignissim semper vitae, ultricies non mi. Curabitur dignissim, urna in accumsan imperdiet, orci purus varius est, a ultrices odio leo vitae purus. Sed a felis et risus lacinia facilisis nec aliquam tortor. Aliquam maximus varius sollicitudin. Praesent at erat ullamcorper urna sollicitudin pulvinar. Curabitur pla', ' 2764-1775', 1, '2025-05-08 17:19:54', 2023, 'Anais+Sepesqi+2023.2+-+v.1+Ciências+Jurídicas+p.+1-58.pdf', 1),
(26, 'atualizado', 'usuario 1 testusuario 1 testusuario 1 test', 'usuario 1 testusuario 1 test', 'usuario 1 testusuario 1 testusuario 1 test', '111122', 1, '2025-05-08 17:20:30', 2022, 'apostila_php.pdf', 1),
(29, 'samuel file', 'samuel file', 'samuel file', 'samuel filesamuel filesamuel file', '33333', 3, '2025-05-08 17:20:37', 2023, 'Apostila - Curso de Lógica de Programação.pdf', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE `cursos` (
  `id_curso` int NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`id_curso`, `nome`) VALUES
(1, 'análise e desenvolvimento de sistemas'),
(2, 'direito'),
(3, 'psicologia'),
(4, 'fisioterapia'),
(5, 'engenharia civil'),
(6, 'administração');

-- --------------------------------------------------------

--
-- Estrutura da tabela `docentes`
--

CREATE TABLE `docentes` (
  `id_docente` int NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `cod_docente` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `fk_id_curso` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `docentes`
--

INSERT INTO `docentes` (`id_docente`, `nome`, `senha`, `cod_docente`, `fk_id_curso`) VALUES
(1, 'otto', '12345', '12345', 1),
(2, 'leo', '6789', '6789', 1),
(3, 'samuel', '5544', '5544', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `anais`
--
ALTER TABLE `anais`
  ADD PRIMARY KEY (`id_anais`),
  ADD KEY `fk_id_docente` (`fk_id_docente`),
  ADD KEY `fkey_id_curso` (`fk_id_curso`);

--
-- Índices para tabela `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_curso`);

--
-- Índices para tabela `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`id_docente`),
  ADD KEY `fk_id_curso` (`fk_id_curso`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `anais`
--
ALTER TABLE `anais`
  MODIFY `id_anais` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_curso` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `docentes`
--
ALTER TABLE `docentes`
  MODIFY `id_docente` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `anais`
--
ALTER TABLE `anais`
  ADD CONSTRAINT `anais_ibfk_1` FOREIGN KEY (`fk_id_docente`) REFERENCES `docentes` (`id_docente`),
  ADD CONSTRAINT `fkey_id_curso` FOREIGN KEY (`fk_id_curso`) REFERENCES `cursos` (`id_curso`);

--
-- Limitadores para a tabela `docentes`
--
ALTER TABLE `docentes`
  ADD CONSTRAINT `docentes_ibfk_1` FOREIGN KEY (`fk_id_curso`) REFERENCES `cursos` (`id_curso`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
