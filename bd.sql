--
-- Base de Dados: `forcabruta`
-- Versão completa com estrutura profissional e dados de exemplo detalhados.
--

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `foto_perfil` varchar(255) DEFAULT 'default-avatar.png',
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Inserindo dados de exemplo para `usuarios`
-- Senha para ambos: senha123
--
INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'Ana Silva', 'ana@email.com', '$2y$10$i5fX.V4Ua/N..hYy0XwzDu2N2e3fV.J1gJ8.bX.z3G.X1e2jGk5bC'),
(2, 'Bruno Costa', 'bruno@email.com', '$2y$10$i5fX.V4Ua/N..hYy0XwzDu2N2e3fV.J1gJ8.bX.z3G.X1e2jGk5bC');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados_corporais`
--
CREATE TABLE `dados_corporais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `massa_magra` decimal(5,2) DEFAULT NULL,
  `altura` decimal(5,2) DEFAULT NULL,
  `idade` int(3) DEFAULT NULL,
  `peso` decimal(5,2) DEFAULT NULL,
  `percentual_gordura` decimal(5,2) DEFAULT NULL,
  `objetivo` varchar(50) DEFAULT NULL,
  `data_atualizacao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario_id` (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Inserindo dados de exemplo para `dados_corporais`
--
INSERT INTO `dados_corporais` (`usuario_id`, `massa_magra`, `altura`, `idade`, `peso`, `percentual_gordura`, `objetivo`) VALUES
(1, '55.00', '165.00', 28, '70.00', '21.00', 'perder peso'),
(2, '70.00', '180.00', 32, '85.00', '15.00', 'ganhar massa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `treinos` (MELHORADA)
-- Cada linha agora representa um exercício específico.
--
CREATE TABLE `treinos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `objetivo` varchar(50) NOT NULL,
  `nome_exercicio` varchar(255) NOT NULL,
  `series` varchar(10) NOT NULL,
  `repeticoes` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Inserindo treinos de exemplo para os usuários
--
-- Treino para Ana Silva (ID 1 - Perder Peso)
INSERT INTO `treinos` (`usuario_id`, `objetivo`, `nome_exercicio`, `series`, `repeticoes`) VALUES
(1, 'perder peso', 'Cardio HIIT', '4x', '30s on/15s off'),
(1, 'perder peso', 'Burpees', '3x', '10-15'),
(1, 'perder peso', 'Mountain Climbers', '3x', '20-30'),
(1, 'perder peso', 'Jump Squats', '3x', '15-20');

-- Treino para Bruno Costa (ID 2 - Ganhar Massa)
INSERT INTO `treinos` (`usuario_id`, `objetivo`, `nome_exercicio`, `series`, `repeticoes`) VALUES
(2, 'ganhar massa', 'Supino Reto', '4x', '8-12'),
(2, 'ganhar massa', 'Agachamento', '4x', '8-12'),
(2, 'ganhar massa', 'Puxada Frontal', '4x', '8-12'),
(2, 'ganhar massa', 'Leg Press', '4x', '12-15');

-- --------------------------------------------------------
-- ADICIONANDO AS CHAVES ESTRANGEIRAS E FINALIZANDO
-- --------------------------------------------------------

ALTER TABLE `dados_corporais`
  ADD CONSTRAINT `fk_dados_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `treinos`
  ADD CONSTRAINT `fk_treinos_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

COMMIT;