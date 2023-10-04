-- Adminer 4.8.1 MySQL 5.5.5-10.5.22-MariaDB-1:10.5.22+maria~ubu2004 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP DATABASE IF EXISTS `bd_bank`;
CREATE DATABASE `bd_bank` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `bd_bank`;

DROP TABLE IF EXISTS `tb_carteira`;
CREATE TABLE `tb_carteira` (
  `id_carteira` int(11) NOT NULL,
  `tb_cliente_id_cliente` int(11) NOT NULL,
  `tb_moeda_id_moeda` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  KEY `tb_cliente_id_cliente` (`tb_cliente_id_cliente`),
  KEY `tb_moeda_id_moeda` (`tb_moeda_id_moeda`),
  CONSTRAINT `tb_carteira_ibfk_1` FOREIGN KEY (`tb_cliente_id_cliente`) REFERENCES `tb_cliente` (`id_cliente`),
  CONSTRAINT `tb_carteira_ibfk_2` FOREIGN KEY (`tb_moeda_id_moeda`) REFERENCES `tb_moeda` (`id_moeda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tb_carteira` (`id_carteira`, `tb_cliente_id_cliente`, `tb_moeda_id_moeda`, `quantidade`) VALUES
(1,	1,	1,	10),
(2,	1,	2,	50),
(3,	1,	3,	10),
(4,	2,	3,	4);

DROP TABLE IF EXISTS `tb_cliente`;
CREATE TABLE `tb_cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome_cliente` varchar(100) NOT NULL,
  `senha_cliente` varchar(100) NOT NULL,
  `cpf_cliente` varchar(50) NOT NULL,
  `email_cliente` varchar(200) NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tb_cliente` (`id_cliente`, `nome_cliente`, `senha_cliente`, `cpf_cliente`, `email_cliente`) VALUES
(1,	'fulano',	'123',	'789456325656',	'fulano@gmail.com'),
(2,	'teste',	'456',	'123456789',	'teste@gmail.com'),
(3,	'gugu',	'789',	'64656454658',	'gugu@gugu.com');

DROP TABLE IF EXISTS `tb_moeda`;
CREATE TABLE `tb_moeda` (
  `id_moeda` int(11) NOT NULL AUTO_INCREMENT,
  `nome_moeda` varchar(100) NOT NULL,
  `sigla_moeda` varchar(100) NOT NULL,
  `valor_moeda` float NOT NULL,
  PRIMARY KEY (`id_moeda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tb_moeda` (`id_moeda`, `nome_moeda`, `sigla_moeda`, `valor_moeda`) VALUES
(1,	'Bitcoin',	'BTC',	140000),
(2,	'SetinhaCoin',	'STC',	100),
(3,	'MonaCoin',	'MNC',	130),
(4,	'Ethereum',	'ETH',	8400),
(5,	'Ripple',	'XRP',	2.6),
(6,	'PobreCoin',	'PBC',	0),
(7,	'LiteCoin',	'LTC',	336.37),
(8,	'Santos FC Fan Token',	'SANTOS',	15);

-- 2023-10-04 19:16:46
