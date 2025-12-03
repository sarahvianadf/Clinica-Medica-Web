-- Estrutura do Banco de Dados para Clínica Médica
-- Baseado no modelo da Concessionária, adaptado para as novas entidades.

-- Tabela Paciente (equivalente a Cliente)
CREATE TABLE IF NOT EXISTS `paciente` (
  `id_paciente` INT NOT NULL AUTO_INCREMENT,
  `nome_paciente` VARCHAR(100) NOT NULL,
  `cpf_paciente` CHAR(11) NULL,
  `email_paciente` VARCHAR(100) NULL,
  `telefone_paciente` VARCHAR(20) NULL,
  `endereco_paciente` VARCHAR(100) NULL,
  `dt_nasc_paciente` DATE NULL,
  PRIMARY KEY (`id_paciente`))
ENGINE = InnoDB;

-- Tabela Medico (equivalente a Funcionario)
CREATE TABLE IF NOT EXISTS `medico` (
  `id_medico` INT NOT NULL AUTO_INCREMENT,
  `nome_medico` VARCHAR(100) NOT NULL,
  `crm_medico` VARCHAR(20) NULL,
  `email_medico` VARCHAR(100) NULL,
  `telefone_medico` VARCHAR(20) NULL,
  PRIMARY KEY (`id_medico`))
ENGINE = InnoDB;

-- Tabela Especialidade (equivalente a Marca)
CREATE TABLE IF NOT EXISTS `especialidade` (
  `id_especialidade` INT NOT NULL AUTO_INCREMENT,
  `nome_especialidade` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_especialidade`))
ENGINE = InnoDB;

-- Tabela Consulta (equivalente a Venda)
CREATE TABLE IF NOT EXISTS `consulta` (
  `id_consulta` INT NOT NULL AUTO_INCREMENT,
  `data_consulta` DATE NULL,
  `hora_consulta` TIME NULL,
  `valor_consulta` DECIMAL(10,2) NULL,
  `paciente_id_paciente` INT NOT NULL,
  `medico_id_medico` INT NOT NULL,
  `especialidade_id_especialidade` INT NOT NULL,
  PRIMARY KEY (`id_consulta`),
  INDEX `fk_consulta_paciente_idx` (`paciente_id_paciente` ASC),
  INDEX `fk_consulta_medico_idx` (`medico_id_medico` ASC),
  INDEX `fk_consulta_especialidade_idx` (`especialidade_id_especialidade` ASC),
  CONSTRAINT `fk_consulta_paciente`
    FOREIGN KEY (`paciente_id_paciente`)
    REFERENCES `paciente` (`id_paciente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_consulta_medico`
    FOREIGN KEY (`medico_id_medico`)
    REFERENCES `medico` (`id_medico`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_consulta_especialidade`
    FOREIGN KEY (`especialidade_id_especialidade`)
    REFERENCES `especialidade` (`id_especialidade`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
