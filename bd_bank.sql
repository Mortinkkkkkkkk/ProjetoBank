-- Adminer 4.8.1 MySQL 5.5.5-10.5.20-MariaDB-1:10.5.20+maria~ubu2004 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP DATABASE IF EXISTS `bd_bank`;
CREATE DATABASE `bd_bank` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `bd_bank`;

DROP TABLE IF EXISTS `tb_carrinho`;
CREATE TABLE `tb_carrinho` (
  `id_carrinho` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_moeda` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor_total` float NOT NULL,
  PRIMARY KEY (`id_carrinho`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_moeda` (`id_moeda`),
  CONSTRAINT `tb_carrinho_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuario` (`id_usuario`),
  CONSTRAINT `tb_carrinho_ibfk_2` FOREIGN KEY (`id_moeda`) REFERENCES `tb_moeda` (`id_moeda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `tb_carteira`;
CREATE TABLE `tb_carteira` (
  `id_carteira` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_moeda` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  PRIMARY KEY (`id_carteira`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_moeda` (`id_moeda`),
  CONSTRAINT `tb_carteira_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuario` (`id_usuario`),
  CONSTRAINT `tb_carteira_ibfk_2` FOREIGN KEY (`id_moeda`) REFERENCES `tb_moeda` (`id_moeda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tb_carteira` (`id_carteira`, `id_usuario`, `id_moeda`, `quantidade`) VALUES
(7,	1,	2,	0)
ON DUPLICATE KEY UPDATE `id_carteira` = VALUES(`id_carteira`), `id_usuario` = VALUES(`id_usuario`), `id_moeda` = VALUES(`id_moeda`), `quantidade` = VALUES(`quantidade`);

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

INSERT INTO `tb_historico_v_moeda` (`id_valor`, `id_moeda`, `valor_moeda`, `hora_atual`, `data_atual`) VALUES
(457,	1,	150185,	'14:10:24',	'2023-11-17'),
(458,	2,	103.888,	'14:10:24',	'2023-11-17'),
(459,	3,	119.787,	'14:10:24',	'2023-11-17'),
(460,	4,	7815.49,	'14:10:24',	'2023-11-17'),
(461,	5,	2.98294,	'14:10:24',	'2023-11-17'),
(462,	6,	9.77712,	'14:10:24',	'2023-11-17'),
(463,	7,	383.411,	'14:10:24',	'2023-11-17'),
(464,	1,	147181,	'14:10:35',	'2023-11-17'),
(465,	2,	104.729,	'14:10:35',	'2023-11-17'),
(466,	3,	118.996,	'14:10:35',	'2023-11-17'),
(467,	4,	7815.49,	'14:10:35',	'2023-11-17'),
(468,	5,	2.98831,	'14:10:35',	'2023-11-17'),
(469,	6,	9.77712,	'14:10:35',	'2023-11-17'),
(470,	7,	383.411,	'14:10:35',	'2023-11-17'),
(471,	1,	148358,	'14:10:38',	'2023-11-17'),
(472,	2,	104.027,	'14:10:38',	'2023-11-17'),
(473,	3,	118.568,	'14:10:38',	'2023-11-17'),
(474,	4,	7744.37,	'14:10:38',	'2023-11-17'),
(475,	5,	2.98831,	'14:10:38',	'2023-11-17'),
(476,	6,	9.74681,	'14:10:38',	'2023-11-17'),
(477,	7,	389.546,	'14:10:38',	'2023-11-17')
ON DUPLICATE KEY UPDATE `id_valor` = VALUES(`id_valor`), `id_moeda` = VALUES(`id_moeda`), `valor_moeda` = VALUES(`valor_moeda`), `hora_atual` = VALUES(`hora_atual`), `data_atual` = VALUES(`data_atual`);

DROP TABLE IF EXISTS `tb_moeda`;
CREATE TABLE `tb_moeda` (
  `id_moeda` int(11) NOT NULL AUTO_INCREMENT,
  `nome_moeda` varchar(100) NOT NULL,
  `sigla_moeda` varchar(100) NOT NULL,
  `valor_moeda_fixo` float NOT NULL,
  `imagem_moeda` varchar(200) NOT NULL DEFAULT './img/imagem_nula.png',
  `imagem_moeda_fundo` varchar(200) NOT NULL DEFAULT './img/imagem_nula.png',
  `moeda_em_destaque` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_moeda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tb_moeda` (`id_moeda`, `nome_moeda`, `sigla_moeda`, `valor_moeda_fixo`, `imagem_moeda`, `imagem_moeda_fundo`, `moeda_em_destaque`) VALUES
(1,	'Bitcoin',	'BTC',	148358,	'./img/17000812739a3fbcac9470b69971dcb226fa97ee7385.jpg',	'./img/1700081273dd01ba1451d924fc8319978c2b39e335-44.webp',	1),
(2,	'SetinhaCoin',	'STC',	104.027,	'./img/17000812559fdc0c466055d3e2fda956d9c9e730b161.png',	'./img/17000812557dae60e14be2f1d3a1a3c36be15bcee3-86.png',	0),
(3,	'MonaCoin',	'MNC',	118.568,	'./img/17000812873fd457408a671c757fd170f40718589b21.png',	'./img/17000812870e6c8e9e565e31a807dde896656e71f0-20.jpg',	1),
(4,	'Ethereum',	'ETH',	7744.37,	'./img/1700081397f2d723c3a247a03b1a3cb31a179ff88881.jpg',	'./img/1700081397ec0c32a429b4662e58c5119c8eadfd5f-94.jpeg',	1),
(5,	'Ripple',	'XRP',	2.98831,	'./img/17000815484c221c60a8b7149da85eedcb8497489574.jpg',	'./img/17000815482b2ea7e9a2b519371bdd573ba8679f50-31.jpg',	0),
(6,	'PobreCoin',	'PBC',	9.74681,	'./img/1700081443e3237c2541a50d34b2a62c4efc2d4f1f51.png',	'./img/17000814433c291999452fd62d40b1ac3eaca337c1-24.png',	0),
(7,	'LiteCoin',	'LTC',	389.546,	'./img/1700081318cd78d04da0254f364f17d4633b66d592100.png',	'./img/170008131857eec54573746e18b9f697d995b08047-97.jpeg',	1)
ON DUPLICATE KEY UPDATE `id_moeda` = VALUES(`id_moeda`), `nome_moeda` = VALUES(`nome_moeda`), `sigla_moeda` = VALUES(`sigla_moeda`), `valor_moeda_fixo` = VALUES(`valor_moeda_fixo`), `imagem_moeda` = VALUES(`imagem_moeda`), `imagem_moeda_fundo` = VALUES(`imagem_moeda_fundo`), `moeda_em_destaque` = VALUES(`moeda_em_destaque`);

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
(1,	'fulano',	'123',	'789456325656',	'fulano@gmail.com',	'funcionario'),
(6,	'Leticia',	'senha',	'2383035612',	'abobrinha@gmail.com',	'cliente')
ON DUPLICATE KEY UPDATE `id_usuario` = VALUES(`id_usuario`), `nome_usuario` = VALUES(`nome_usuario`), `senha_usuario` = VALUES(`senha_usuario`), `cpf_usuario` = VALUES(`cpf_usuario`), `email_usuario` = VALUES(`email_usuario`), `tipo_usuario` = VALUES(`tipo_usuario`);

-- 2023-11-17 17:10:55