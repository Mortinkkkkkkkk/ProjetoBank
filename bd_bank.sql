-- Adminer 4.8.1 MySQL 5.5.5-10.5.20-MariaDB-1:10.5.20+maria~ubu2004 dump

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
  `tb_usuario_id_usuario` int(11) NOT NULL,
  `tb_moeda_id_moeda` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  KEY `tb_moeda_id_moeda` (`tb_moeda_id_moeda`),
  KEY `tb_usuario_id_usuario` (`tb_usuario_id_usuario`),
  CONSTRAINT `tb_carteira_ibfk_2` FOREIGN KEY (`tb_moeda_id_moeda`) REFERENCES `tb_moeda` (`id_moeda`),
  CONSTRAINT `tb_carteira_ibfk_3` FOREIGN KEY (`tb_usuario_id_usuario`) REFERENCES `tb_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tb_carteira` (`id_carteira`, `tb_usuario_id_usuario`, `tb_moeda_id_moeda`, `quantidade`) VALUES
(1,	1,	1,	10),
(2,	1,	2,	50),
(3,	1,	3,	10),
(4,	2,	3,	4);

DROP TABLE IF EXISTS `tb_historico_v_moeda`;
CREATE TABLE `tb_historico_v_moeda` (
  `id_valor` int(11) NOT NULL AUTO_INCREMENT,
  `id_moeda` int(11) NOT NULL,
  `valor_moeda` float NOT NULL,
  `hora_atual` time NOT NULL,
  `data_atual` date NOT NULL,
  PRIMARY KEY (`id_valor`),
  KEY `id_moeda` (`id_moeda`),
  CONSTRAINT `tb_historico_v_moeda_ibfk_1` FOREIGN KEY (`id_moeda`) REFERENCES `tb_moeda` (`id_moeda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `tb_moeda`;
CREATE TABLE `tb_moeda` (
  `id_moeda` int(11) NOT NULL AUTO_INCREMENT,
  `nome_moeda` varchar(100) NOT NULL,
  `sigla_moeda` varchar(100) NOT NULL,
  `valor_moeda_fixo` float NOT NULL,
  `moeda_em_destaque` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_moeda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tb_moeda` (`id_moeda`, `nome_moeda`, `sigla_moeda`, `valor_moeda_fixo`, `moeda_em_destaque`) VALUES
(1,	'Bitcoin',	'BTC',	140000,	1),
(2,	'SetinhaCoin',	'STC',	100,	1),
(3,	'MonaCoin',	'MNC',	130,	0),
(4,	'Ethereum',	'ETH',	8400,	1),
(5,	'Ripple',	'XRP',	2.6,	0),
(6,	'PobreCoin',	'PBC',	0,	0),
(7,	'LiteCoin',	'LTC',	336.37,	0),
(8,	'Santos FC Fan Token',	'SANTOS',	15,	0);

DROP TABLE IF EXISTS `tb_usuario`;
CREATE TABLE `tb_usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(100) NOT NULL,
  `senha_usuario` varchar(100) NOT NULL,
  `cpf_usuario` varchar(50) NOT NULL,
  `email_usuario` varchar(200) NOT NULL,
  `tipo_usuario` varchar(200) NOT NULL DEFAULT 'cliente',
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tb_usuario` (`id_usuario`, `nome_usuario`, `senha_usuario`, `cpf_usuario`, `email_usuario`, `tipo_usuario`) VALUES
(1,	'fulano',	'123',	'789456325656',	'fulano@gmail.com',	''),
(2,	'teste',	'456',	'123456789',	'teste@gmail.com',	''),
(3,	'gugu',	'789',	'64656454658',	'gugu@gugu.com',	''),
(4,	'adfha',	'we3rol',	'865465463',	'asjfhdk@gmail.com',	'');

-- 2023-10-16 16:27:44
