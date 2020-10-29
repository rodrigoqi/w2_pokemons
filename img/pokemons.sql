-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Out-2020 às 16:08
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dbpokemons`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pokemons`
--

CREATE TABLE `pokemons` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` text NOT NULL,
  `ataque` int(11) NOT NULL,
  `defesa` int(11) NOT NULL,
  `elemento` varchar(20) DEFAULT NULL,
  `foto` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pokemons`
--

INSERT INTO `pokemons` (`codigo`, `nome`, `descricao`, `ataque`, `defesa`, `elemento`, `foto`) VALUES
(16, 'Arceus', 'Simplesmente o criador de tudo, Arceus é como um Deus no universo de Pokémon. Assim que ele nasceu, Arceus criou tudo a sua volta, como tempo e espaço, e deixou o “Trio da Criação” encarregado de cuidar disso. Curiosamente havia uma forma de capturar Arceus planejada para Pokémon Diamond & Pearl, porém a Nintendo nunca a lançou por achá-la complicada demais e apenas o distribuiu em raras ocasiões em eventos especiais.\r\n', 2500, 3500, 'Normal', 'arceus.jpg'),
(17, 'Celebi', 'Inicialmente considerado como “O Mew da geração Gold & Silver” pois só podia ser obtido em eventos, Celebi provou-se um tipo diferente de pokémon lendário, um pouco mais simples em objetivo porém ainda poderoso. Ele é um guardião de florestas que procura sempre protegê-las e para isso pode até mesmo viajar no tempo, o que parece um pouco exagerado.', 150, 120, 'Ar', 'celebi.jpg'),
(18, 'Heatran', 'Ao considerar a importância de Heatran, é estranho imaginar o quanto ele fica em segundo plano em Pokémon Diamond & Pearl. Ele representa o núcleo do planeta Terra e é tão velho quanto o “Trio da Criação”, porém simplesmente não ganhou muito destaque nem nos jogos nem na série animada. Ele possui uma particularidade no entanto, já que é o único pokémon lendário que pode ser encontrado em diferentes gêneros, macho ou fêmea.', 200, 80, 'Fogo', 'heatran.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `pokemons`
--
ALTER TABLE `pokemons`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pokemons`
--
ALTER TABLE `pokemons`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
