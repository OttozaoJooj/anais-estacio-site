-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23/01/2025 às 00:02
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
-- Banco de dados: `anais-estacio`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `anais`
--

CREATE TABLE `anais` (
  `id_anais` int(11) NOT NULL,
  `instituicao` varchar(255) NOT NULL,
  `evento` varchar(255) NOT NULL,
  `tema` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `isbn` varchar(255) NOT NULL,
  `fk_id_docente` int(11) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ano` year(4) NOT NULL,
  `file_path` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `anais`
--

INSERT INTO `anais` (`id_anais`, `instituicao`, `evento`, `tema`, `descricao`, `isbn`, `fk_id_docente`, `create_at`, `ano`, `file_path`) VALUES
(11, 'salada', 'salada3', 'legal', 'kkkkkkkkkkkkkkkkkkkkkkkkkkkk atualizado usuário 2', '12345', 2, '2024-11-26 20:51:27', '2023', 'C:\\xampp\\htdocs\\anais-estacio-site\\src\\adm/uploads/anais/SLIDE_GERAL_-_BANCO_DE_DADOS.pdf'),
(13, 'instituicao test 2', 'evento test 2', 'tema test 2', 'descricao 2 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eu turpis volutpat, euismod ex mollis, elementum tellus. Pellentesque sed porttitor ante. Pellentesque sit amet sapien porta, luctus augue in, interdum mauris. Morbi tincidunt, tortor et interdum tempor, tortor sem venenatis nisl, ut suscipit dui augue blandit leo. Pellentesque id lacus purus. Ut in aliquam felis. Integer a magna id purus mattis egestas. Donec quis egestas purus. Praesent eu arcu facilisis, sceleris', '4321', 2, '2024-11-28 20:18:57', '2022', 'C:\\xampp\\htdocs\\anais-estacio-site\\src\\adm/uploads/anais/Play Framework - Java para web sem servlets e com diversao.pdf'),
(17, 'instituicao test 1', 'evento test 1', 'tema test 1', 'descricao test 1', '5555666', 1, '2024-12-05 20:59:28', '2020', 'C:\\xampp\\htdocs\\anais-estacio-site\\src\\adm/uploads/anais/Livro de MySQL.pdf'),
(18, 'Faculdade Estácio de Sá de Vitória | Faculdade Estácio de Sá de Vila Velha ', 'IX SEMINÁRIO DE PESQUISA, EXTENSÃO E  INTERNACIONALIZAÇÃO', 'ESG - Ações para um novo mundo e uma nova  educação ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec pellentesque ultrices elit, at faucibus lacus maximus sed. Nulla facilisi. Donec scelerisque augue eu rutrum placerat. Donec at lobortis arcu. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vel facilisis risus. Etiam id quam aliquet, aliquam nulla quis, suscipit velit. Curabitur a mollis lectus, in efficitur justo. Sed eu ullamcorper massa, ac finibus nunc.', ' 2764-1775', 1, '2025-01-02 23:28:52', '2024', 'C:\\xampp\\htdocs\\anais-estacio-site\\src\\adm/uploads/anais/Anais+IX+Seminário+2024.1+-+v.1+Ciências+Jurídicas.pdf'),
(19, 'Faculdade Estácio de Sá de Vitória / Faculdade Estácio de Sá de Vila Velha ', 'IX SEMINÁRIO DE PESQUISA, EXTENSÃO E  INTERNACIONALIZAÇÃO', 'A inteligência artificial e o desenvolvimento sustentável na educação', 'ellentesque vitae augue quis sem pulvinar facilisis faucibus vel tortor. Aliquam rhoncus libero a varius blandit. Nam fermentum eleifend velit eu varius. Curabitur nunc sapien, venenatis dignissim semper vitae, ultricies non mi. Curabitur dignissim, urna in accumsan imperdiet, orci purus varius est, a ultrices odio leo vitae purus. Sed a felis et risus lacinia facilisis nec aliquam tortor. Aliquam maximus varius sollicitudin. Praesent at erat ullamcorper urna sollicitudin pulvinar. Curabitur pla', ' 2764-1775', 1, '2025-01-02 23:40:14', '2023', 'C:\\xampp\\htdocs\\anais-estacio-site\\src\\adm/uploads/anais/Anais+Sepesqi+2023.2+-+v.1+Ciências+Jurídicas+p.+1-58.pdf');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cursos`
--

CREATE TABLE `cursos` (
  `id_curso` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cursos`
--

INSERT INTO `cursos` (`id_curso`, `nome`) VALUES
(1, 'análise e desenvolvimento de sistemas');

-- --------------------------------------------------------

--
-- Estrutura para tabela `docentes`
--

CREATE TABLE `docentes` (
  `id_docente` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `cod_docente` varchar(255) NOT NULL,
  `fk_id_curso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `docentes`
--

INSERT INTO `docentes` (`id_docente`, `nome`, `senha`, `cod_docente`, `fk_id_curso`) VALUES
(1, 'otto', '12345', '12345', 1),
(2, 'leo', '6789', '6789', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `anais`
--
ALTER TABLE `anais`
  ADD PRIMARY KEY (`id_anais`),
  ADD KEY `fk_id_docente` (`fk_id_docente`);

--
-- Índices de tabela `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_curso`);

--
-- Índices de tabela `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`id_docente`),
  ADD KEY `fk_id_curso` (`fk_id_curso`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `anais`
--
ALTER TABLE `anais`
  MODIFY `id_anais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `docentes`
--
ALTER TABLE `docentes`
  MODIFY `id_docente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `anais`
--
ALTER TABLE `anais`
  ADD CONSTRAINT `anais_ibfk_1` FOREIGN KEY (`fk_id_docente`) REFERENCES `docentes` (`id_docente`);

--
-- Restrições para tabelas `docentes`
--
ALTER TABLE `docentes`
  ADD CONSTRAINT `docentes_ibfk_1` FOREIGN KEY (`fk_id_curso`) REFERENCES `cursos` (`id_curso`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
