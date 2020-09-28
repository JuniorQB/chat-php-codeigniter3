## Chat em PHP com CodeIgniter 3

- Requisitos: 
  - PHP 5.6+
  - PHP Socket extension enabled
  - MySql 

- Colocar a pasta chat no diretório www do apache
- Utilizar o modelo do banco de dados disponível na pasta docs ou o script abaixo:

#####
CREATE SCHEMA IF NOT EXISTS `chat` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `chat` ;

-- -----------------------------------------------------
-- Table `chat`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chat`.`users` (
  `iduser` INT NOT NULL AUTO_INCREMENT,
  `nickname` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`iduser`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `chat`.`mensagens`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chat`.`mensagens` (
  `idmensagem` INT NOT NULL AUTO_INCREMENT,
  `iduser_from` INT NOT NULL,
  `mensagem` TEXT NOT NULL,
  `iduser_to` INT NOT NULL,
  PRIMARY KEY (`idmensagem`),
  INDEX `fk_mensagens_users_idx` (`iduser_from` ASC),
  INDEX `fk_mensagens_users1_idx` (`iduser_to` ASC),
  CONSTRAINT `fk_mensagens_users`
    FOREIGN KEY (`iduser_from`)
    REFERENCES `chat`.`users` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_mensagens_users1`
    FOREIGN KEY (`iduser_to`)
    REFERENCES `chat`.`users` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `ci_sessions` (
        `id` varchar(128) NOT NULL,
        `ip_address` varchar(45) NOT NULL,
        `timestamp` int(10) unsigned DEFAULT 0 NOT NULL,
        `data` blob NOT NULL,
        KEY `ci_sessions_timestamp` (`timestamp`)
);

####
 - Configurar as informações referentes ao Banco de Dados no Arquivo: 
    - application/config/database.php

 - Configurar o IP do Server no arquivo meuip.php na raiz do projeto
 
 - No terminal, na raiz do projeto executar o seguinte comando: 
    - php index.php RunServer index
 
 - Acessar no navegador: http://SEUIP/chat 
    - Primeira tela: Escolher o Nickname - Se já estiver cadastrado, irá carregar as mensagens anteriormente enviada para outros usuários conforme a conversa selecionada.
    - Segunda tela: Selecionar outro usuário com quem deseja conversar.
    - Na última tela abrirá o chat com as conversas anteriormente enviadas
    - A opção excluir está disponível nas convesas carregadas do banco de dados para as mensagens enviadas.

  #### Possíveis Melhorias / Não implementado ainda ####

  - Disponibilizar a opção de editar as mensagens enviadas
  - Estilização - CSS 
  - Envio de arquivos
  - Paginação das mensagens 
  - Melhorar documentação
  - Entre outras
 