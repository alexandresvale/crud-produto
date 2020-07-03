-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Jul-2020 às 05:01
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
-- Banco de dados: `db_produto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `preco` float DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `imagem` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `preco`, `descricao`, `imagem`) VALUES
(1, 'Bicicleta', 750.63, 'Mussum Ipsum, cacilds vidis litro abertis. Per aumento de cachacis, eu reclamis. Interagi no mé, cursus quis, vehicula ac nisi. In elementis mé pra quem é amistosis quis leo. Detraxit consequat et quo num tendi nada. ', '1593744637.jpg'),
(2, 'Carro', 23483.6, 'Mussum Ipsum, cacilds vidis litro abertis. Delegadis gente finis, bibendum egestas augue arcu ut est. Tá deprimidis, eu conheço uma cachacis que pode alegrar sua vidis. Não sou faixa preta cumpadi, sou preto inteiris, inteiris. Casamentiss faiz malandris se pirulitá. ', '1593744689.jpg'),
(3, 'Bermuda Surf', 35.98, 'Mussum Ipsum, cacilds vidis litro abertis. Atirei o pau no gatis, per gatis num morreus. Quem manda na minha terra sou euzis! Paisis, filhis, espiritis santis. Posuere libero varius. Nullam a nisl ut ante blandit hendrerit. Aenean sit amet nisi. ', '1593744723.jpg'),
(4, 'Camisa Social', 150.63, 'Mussum Ipsum, cacilds vidis litro abertis. Atirei o pau no gatis, per gatis num morreus. Quem manda na minha terra sou euzis! Paisis, filhis, espiritis santis. Posuere libero varius. Nullam a nisl ut ante blandit hendrerit. Aenean sit amet nisi. ', '1593744847._AC_SX522_.jpg'),
(5, 'Livro PHP e MYSQL', 78.63, 'Mussum Ipsum, cacilds vidis litro abertis. Atirei o pau no gatis, per gatis num morreus. Quem manda na minha terra sou euzis! Paisis, filhis, espiritis santis. Posuere libero varius. Nullam a nisl ut ante blandit hendrerit. Aenean sit amet nisi. ', '1593744872.jpg'),
(6, 'Livro PHP', 53.96, 'Mussum Ipsum, cacilds vidis litro abertis. Atirei o pau no gatis, per gatis num morreus. Quem manda na minha terra sou euzis! Paisis, filhis, espiritis santis. Posuere libero varius. Nullam a nisl ut ante blandit hendrerit. Aenean sit amet nisi. ', '1593744901.jpg'),
(7, 'Camisa de Time', 250.36, 'Mussum Ipsum, cacilds vidis litro abertis. Atirei o pau no gatis, per gatis num morreus. Quem manda na minha terra sou euzis! Paisis, filhis, espiritis santis. Posuere libero varius. Nullam a nisl ut ante blandit hendrerit. Aenean sit amet nisi. ', '1593744926.jpg'),
(8, 'Bermunda Jeans', 74.96, 'Mussum Ipsum, cacilds vidis litro abertis. Atirei o pau no gatis, per gatis num morreus. Quem manda na minha terra sou euzis! Paisis, filhis, espiritis santis. Posuere libero varius. Nullam a nisl ut ante blandit hendrerit. Aenean sit amet nisi. ', '1593744959.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
