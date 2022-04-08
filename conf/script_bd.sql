CREATE TABLE `escola`.`estado` (
  `id_estado` INT NOT NULL AUTO_INCREMENT,
  `nome_est` VARCHAR(45) NULL,
  `sigla` VARCHAR(45) NULL,
  PRIMARY KEY (`id_estado`));

CREATE TABLE `escola`.`cidade` (
  `id_cidade` INT NOT NULL,
  `nome_cid` VARCHAR(45) NULL,
  `id_estado` INT NULL,
  PRIMARY KEY (`id_cidade`),
  CONSTRAINT `id_estado`
    FOREIGN KEY (`id_estado`)
    REFERENCES `escola`.`estado` (`id_estado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

INSERT INTO `escola`.`estado` (`id_estado`, `nome_est`, `sigla`) VALUES ('1', 'Santa Catarina', 'SC');
INSERT INTO `escola`.`estado` (`id_estado`, `nome_est`, `sigla`) VALUES ('2', 'Rio Grande do Sul', 'RS');
INSERT INTO `escola`.`estado` (`id_estado`, `nome_est`, `sigla`) VALUES ('3', 'Paraná ', 'PR');
INSERT INTO `escola`.`estado` (`id_estado`, `nome_est`, `sigla`) VALUES ('4', 'São Paulo', 'SP');
INSERT INTO `escola`.`estado` (`id_estado`, `nome_est`, `sigla`) VALUES ('5', 'Rio de Janeiro', 'RJ');

INSERT INTO `escola`.`cidade` (`id_cidade`, `nome_cid`, `id_estado`) VALUES ('1', 'Rio de Janeiro', '5');
INSERT INTO `escola`.`cidade` (`id_cidade`, `nome_cid`, `id_estado`) VALUES ('2', 'São Paulo', '4');
INSERT INTO `escola`.`cidade` (`id_cidade`, `nome_cid`, `id_estado`) VALUES ('3', 'Curitiba', '3');
INSERT INTO `escola`.`cidade` (`id_cidade`, `nome_cid`, `id_estado`) VALUES ('4', 'Porto Alegre', '2');
INSERT INTO `escola`.`cidade` (`id_cidade`, `nome_cid`, `id_estado`) VALUES ('5', 'Florianópolis', '1');
