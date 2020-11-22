-- SCRIPT PARA CRIAR O BANCO DE DADOS

CREATE DATABASE PERIFERICOS DEFAULT CHARACTER SET utf8;
USE PERIFERICOS

CREATE TABLE `produto` (
    `idProduto`     INT(11) NOT NULL AUTO_INCREMENT,
    `nome`          VARCHAR(255) NOT NULL,
    `descricao`     VARCHAR(255) NOT NULL,
    `quantidade`    INT NOT NULL,
    `preco`         VARCHAR(255) NOT NULL,
    `flag`          TINYINT(1) NOT NULL DEFAULT 0,
    `data`          DATE NOT NULL,
PRIMARY KEY (`idProduto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `usuario` (
  `idUsuario` INT(11) NOT NULL AUTO_INCREMENT,
  `nome`      VARCHAR(45) DEFAULT NULL,
  `sobrenome` VARCHAR(255) DEFAULT NULL,
  `email`     VARCHAR(255) DEFAULT NULL,
  `senha`     VARCHAR(30) DEFAULT NULL,
  `admin`     TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- CASO QUEIRA POPULAR COM ALGUNS DADOS

INSERT INTO `produto` (`idProduto`, `nome`, `descricao`, `quantidade`, `preco`, `flag`, `data`) VALUES
(1, 'Sapphire RX 6800 XT', 'Placa de vídeo de ultima geração da AMD arquitetura RDNA2', 5, '5499,27', 1, '2020-11-19'),
(2, 'Mouse G502 Hero', 'Desenvolvido pela Logitech o Mouse G502 Hero conta com um sensor PWR 3375 de alta precisão, 12000dpi e 7 botões.', 90, '349,99', 1, '2020-11-18'),
(3, 'Teclado Strafe RGB MXRed', 'Desenvolvido pela Corsair o Strafe RGB conta com switchs Red para melhorar a sua jogatina.', 30, '82,99', 0, '2020-11-18'),
(4, 'Monitor PF3960 144Hz', 'Desenvolvido pela AOC o monitor PF3960 possui 144hz 1ms para você arrebentar nos jogos.', 70, '1699,97', 1, '2020-11-18'),
(5, 'Kit 3 Fan Corsair SP120mm', 'As SP120MM são RGB acompanham controladora.', 13, '249,69', 0, '2020-11-19'),
(6, 'NVMe KingDian 1TB PCIE3.0', 'Desenvolvido pela KingDian o seu SSD NVMe chega a velocidades de 3GB.', 25, '549,18', 1, '2020-11-19');

INSERT INTO `usuario` (`idUsuario`, `nome`, `sobrenome`, `email`, `senha`, `admin`) VALUES
(1, 'Teste', 'Teste', 'teste@teste.com.br', '123', 0),
(2, 'Maiza', 'Louise', 'maiza@teste.com.br', '123', 1);