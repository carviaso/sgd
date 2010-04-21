-- phpMyAdmin SQL Dump
-- version 2.11.9.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Abr 18, 2010 as 12:08 PM
-- Versão do Servidor: 5.0.45
-- Versão do PHP: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Banco de Dados: `docente`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `afastamento`
--

CREATE TABLE IF NOT EXISTS `afastamento` (
  `id_afastamento` int(11) NOT NULL auto_increment,
  `id_professor` int(11) NOT NULL,
  `id_instituicao` int(11) NOT NULL,
  `id_tipo_afastamento` int(11) NOT NULL,
  `id_tipo_titulacao` int(11) default NULL,
  `data_inicio` date NOT NULL,
  `data_previsao_termino` date NOT NULL,
  `meses_duracao` int(11) NOT NULL,
  `processo` varchar(45) NOT NULL,
  `flag_prorrogacao` tinyint(1) NOT NULL,
  `observacao` blob,
  PRIMARY KEY  (`id_afastamento`),
  KEY `fk_afastamento_professor` (`id_professor`),
  KEY `fk_afastamento_instituicao` (`id_instituicao`),
  KEY `fk_afastamento_tipo_titulacao` (`id_tipo_titulacao`),
  KEY `fk_afastamento_tipo_afastamento` (`id_tipo_afastamento`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Cadastro dos afastamentos.' AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `afastamento`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `cargo`
--

CREATE TABLE IF NOT EXISTS `cargo` (
  `id_cargo` int(11) NOT NULL auto_increment,
  `descricao_cargo` varchar(47) default NULL,
  PRIMARY KEY  (`id_cargo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `cargo`
--

INSERT INTO `cargo` (`id_cargo`, `descricao_cargo`) VALUES
(1, 'Professor Ensino Superior'),
(2, 'Professor Ensino Básico Técnico e Tecnológico'),
(3, 'Servidor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargocomissionado`
--

CREATE TABLE IF NOT EXISTS `cargocomissionado` (
  `id_cargocomissionado` int(11) NOT NULL auto_increment,
  `descricao_cargocom` varchar(30) default NULL,
  PRIMARY KEY  (`id_cargocomissionado`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `cargocomissionado`
--

INSERT INTO `cargocomissionado` (`id_cargocomissionado`, `descricao_cargocom`) VALUES
(1, 'Diretor do Centro'),
(2, 'Vice-Diretor do Centro'),
(3, 'Chefe do Departamento'),
(4, 'Sub-Chefe do Departartamento'),
(5, 'Secretário do Centro'),
(6, 'Chefe de Expediente '),
(7, 'Secretária do Centro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria_funcional`
--

CREATE TABLE IF NOT EXISTS `categoria_funcional` (
  `id_categoria_funcional` int(11) NOT NULL auto_increment,
  `descricao` varchar(45) NOT NULL,
  PRIMARY KEY  (`id_categoria_funcional`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Cadastro das categorias funcionais.' AUTO_INCREMENT=58 ;

--
-- Extraindo dados da tabela `categoria_funcional`
--

INSERT INTO `categoria_funcional` (`id_categoria_funcional`, `descricao`) VALUES
(12, 'Adjunto - Nível 4'),
(11, 'Adjunto - Nível 3'),
(10, 'Adjunto - Nível 2'),
(9, 'Adjunto - Nível 1'),
(8, 'Assistente - Nível 4'),
(7, 'Assistente - Nível 3'),
(6, 'Assistente - Nível 2'),
(5, 'Assistente - Nível 1'),
(4, 'Auxiliar - Nível 4'),
(3, 'Auxiliar - Nível 3'),
(2, 'Auxiliar - Nível 2'),
(1, 'Auxiliar - Nível 1'),
(13, 'Associado 1'),
(14, 'Associado 2'),
(15, 'Associado 3'),
(16, 'Associado 4'),
(17, 'Titular'),
(18, 'Classe D I - Nível 1'),
(19, ' Classe D I - Nível 2'),
(20, ' Classe D I - Nível 3'),
(21, ' Classe D I- Nível 4'),
(22, ' Classe D II - Nível 1'),
(23, ' Classe D II - Nível 2'),
(24, ' Classe D II - Nível 3'),
(25, ' Classe D II - Nível 4'),
(26, ' Classe D III - Nível 1'),
(27, ' Classe D III - Nível 2'),
(28, ' Classe D III - Nível 3'),
(29, ' Classe D III - Nível 4'),
(30, ' Classe D IV - Nível S'),
(31, ' Classe D V - Nível 1'),
(32, ' Classe D V - Nível 2'),
(33, ' Classe D V - Nível 3'),
(34, ' Titular - Nível U'),
(35, 'Colaborador'),
(36, 'Classe A - Nível I'),
(37, 'Classe A - Nível II'),
(38, 'Classe A - Nível III'),
(39, 'Classe A - Nível IV'),
(40, 'Classe B - Nível I'),
(41, 'Classe B - Nível II'),
(42, 'Classe B - Nível III'),
(43, 'Classe B - Nível IV'),
(44, 'Classe C - Nível I'),
(45, 'Classe C - Nível II'),
(46, 'Classe C - Nível III'),
(47, 'Classe C - Nível IV'),
(48, 'Classe D - Nível I'),
(49, 'Classe D - Nível II'),
(50, 'Classe D - Nível III'),
(51, 'Classe D - Nível IV'),
(52, 'Classe E - Nível I'),
(53, 'Classe E - Nível II'),
(54, 'Classe E - Nível III'),
(55, 'Classe E - Nível IV'),
(56, 'Classe Especial'),
(57, 'Auxiliar de Ensino');

-- --------------------------------------------------------

--
-- Estrutura da tabela `centro`
--

CREATE TABLE IF NOT EXISTS `centro` (
  `id_centro` int(11) NOT NULL auto_increment,
  `id_instituicao` int(11) default NULL,
  `nome` varchar(100) NOT NULL,
  `sigla` varchar(3) NOT NULL,
  PRIMARY KEY  (`id_centro`),
  KEY `fk_centro_instituicao` (`id_instituicao`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Cadastro dos centros de ensino.' AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `centro`
--

INSERT INTO `centro` (`id_centro`, `id_instituicao`, `nome`, `sigla`) VALUES
(1, 1, 'CENTRO TECNOLÓGICO', 'CTC'),
(2, 1, 'CENTRO DE CIÊNCIAS AGRÁRIAS ', 'CCA'),
(3, 1, 'CENTRO DE CIÊNCIAS BIOLÓGICAS ', 'CCB'),
(4, 1, 'CENTRO DE COMUNICAÇÃO E EXPRESSÃO ', 'CCE'),
(5, 1, 'CENTRO DE CIÊNCIAS JURÍDICAS', 'CCJ'),
(6, 1, 'CENTRO DE CIÊNCIAS DA SAÚDE', 'CCS'),
(7, 1, 'CENTRO DE DESPORTOS', 'CDS'),
(8, 1, 'CENTRO DE CIÊNCIAS DA EDUCAÇÃO', 'CED'),
(9, 1, 'CENTRO DE FILOSOFIA E CIÊNCIAS HUMANAS', 'CFH'),
(10, 1, 'CENTRO DE CIÊNCIAS FÍSICAS E MATEMÁTICAS', 'CFM'),
(11, 1, 'CENTRO SÓCIO ECONÔMICO', 'CSE');

-- --------------------------------------------------------

--
-- Estrutura da tabela `centrocargocomissionado`
--

CREATE TABLE IF NOT EXISTS `centrocargocomissionado` (
  `id_cargocomissionado` int(11) NOT NULL,
  `id_professor` int(11) NOT NULL,
  `id_centro` int(11) NOT NULL,
  PRIMARY KEY  (`id_cargocomissionado`,`id_professor`,`id_centro`),
  KEY `fk_centrocargocomissionado_cargocomissionado` (`id_cargocomissionado`),
  KEY `fk_centrocargocomissionado_centro` (`id_centro`),
  KEY `fk_centrocargocomissionado_professor` (`id_professor`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `centrocargocomissionado`
--

INSERT INTO `centrocargocomissionado` (`id_cargocomissionado`, `id_professor`, `id_centro`) VALUES
(1, 4, 1),
(1, 67, 10),
(1, 69, 4),
(2, 68, 1),
(2, 70, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `departamento`
--

CREATE TABLE IF NOT EXISTS `departamento` (
  `id_departamento` int(11) NOT NULL auto_increment,
  `id_centro` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sigla` varchar(3) NOT NULL,
  PRIMARY KEY  (`id_departamento`),
  KEY `fk_departamento_centro` (`id_centro`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Cadastro dos departamentos de ensino.' AUTO_INCREMENT=60 ;

--
-- Extraindo dados da tabela `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `id_centro`, `nome`, `sigla`) VALUES
(1, 1, 'Departamento de Informática e Estatística', 'INE'),
(2, 1, 'Departamento de Arquitetura e Urbanismo', 'ARQ'),
(3, 1, 'Departamento de Automação e Sistemas', 'DAS'),
(4, 1, 'Departamento de Engenharia de Produção e Sistemas', 'EPS'),
(5, 1, 'Departamento de Engenharia Sanitária e Ambiental', 'ENS'),
(6, 1, 'Departamento de Engenharia Quimica e Engenharia de Alimentos', 'EQA'),
(7, 1, 'Departamento de Engenharia Civil', 'ECV'),
(8, 1, 'Departamento de Engenharia Elétrica', 'EEL'),
(9, 1, 'Departamento de Engenharia Mecânica ', 'EMC'),
(10, 2, 'Departamento de Ciência e Tecnologia de Alimentos', 'CAL'),
(11, 2, 'Departamento de Aquicultura', 'AQI'),
(12, 2, 'Departamento de Engenharia Ruaral', 'ENR'),
(13, 2, 'Departamento de Fitotecnia', 'FIT'),
(14, 2, 'Departamento de Zootecnia e Desenvolvimento Rural', 'ZOT'),
(15, 3, 'Departamento de Botânica', 'BOT'),
(16, 3, 'Departamento de Ecologia e Zoologia', 'ECZ'),
(17, 3, 'Departamento de Microbiologia e Parasitologia', 'MIP'),
(18, 3, 'Departamento de Biologia Celular Embriologia e Genética', 'BEG'),
(19, 3, 'Departamento de Farmacologia', 'FMC'),
(20, 3, 'Departamento de Bioquímica', 'BQA'),
(21, 3, 'Departamento de Ciências Fisiológicas', 'CFS'),
(22, 3, 'Departamento de Ciências Morfológicas', 'MOR'),
(23, 4, 'Departamento de Jornalismo', 'JOR'),
(24, 4, 'Departamento de Expressão Gráfica', 'EGR'),
(25, 4, 'Departamento de Língua e Literatura Estrangeiras', 'LLE'),
(26, 4, 'Departamento de Língua e Literatura Vernáculas', 'LLV'),
(27, 5, 'Departamento de Direito', 'DIR'),
(28, 6, 'Departamento de Análises Clínicas', 'ACL'),
(29, 6, 'Departamento de Nutrição', 'NTR'),
(30, 6, 'Departamento de Ciências Farmaceuticas', 'CIF'),
(31, 6, 'Departamento de Patologia', 'PTL'),
(32, 6, 'Departamento de Clínica Cirurgia', 'CLC'),
(33, 6, 'Departamento de Pediatria', 'DPT'),
(34, 6, 'Departamento de Clínica Médica', 'CLM'),
(35, 6, 'Departamento de Saúde Pública', 'SPB'),
(36, 6, 'Departamento de Enfermagem', 'NFR'),
(37, 6, 'Departamento de Ginecologia e Obstetrícia', 'DTO'),
(38, 6, 'Departamento de Odontologia', 'ODT'),
(39, 7, 'Departamento de Educação Física', 'DEF'),
(40, 8, 'Departamento de Metodologia de Ensino', 'MEN'),
(41, 8, 'Departamento de Estudos Especializados em Educação', 'EED'),
(42, 8, 'Departamento de Ciência da Informação', 'CIN'),
(43, 9, 'Departamento de Antropologia', 'ANT'),
(44, 9, 'Departamento de Filosofia', 'FIL'),
(45, 9, 'Departamento de Geociências', 'GCN'),
(46, 9, 'Departamento de História', 'HST'),
(47, 9, 'Departamento de Sociologia e Ciência Política', 'SPO'),
(48, 10, 'Departamento de Química', 'QMC'),
(49, 10, 'Departamento de Física', 'FSC'),
(50, 10, 'Departamento de Matemática', 'MTM'),
(51, 11, 'Departamento de Administração', 'CAD'),
(52, 11, 'Departamento de Serviço Social', 'DSS'),
(53, 11, 'Departamento de Ciências Contábeis', 'CCN'),
(54, 11, 'Departamento de Ciências Econômicas', 'CNM'),
(55, 1, 'Departamento de Engenharia do Conhecimento', 'EGC'),
(56, 4, 'Coordenadoria Especial de Artes', 'CEA'),
(57, 9, 'Departamento de Psicologia', 'PSI'),
(58, 8, 'Colégio de Aplicação', 'CA'),
(59, 8, 'Núcleo de Desenvolvimento Infantil', 'NDI');

-- --------------------------------------------------------

--
-- Estrutura da tabela `deptocargocomissionado`
--

CREATE TABLE IF NOT EXISTS `deptocargocomissionado` (
  `id_professor` int(11) NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `id_cargocomissionado` int(11) NOT NULL,
  PRIMARY KEY  (`id_professor`,`id_departamento`,`id_cargocomissionado`),
  KEY `fk_deptocargocomissionado_professor` (`id_professor`),
  KEY `fk_deptocargocomissionado_departamento` (`id_departamento`),
  KEY `fk_deptocargocomissionado_cargocomissionado` (`id_cargocomissionado`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `deptocargocomissionado`
--

INSERT INTO `deptocargocomissionado` (`id_professor`, `id_departamento`, `id_cargocomissionado`) VALUES
(2, 1, 3),
(3, 1, 4),
(71, 24, 3),
(72, 23, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estagio_probatorio`
--

CREATE TABLE IF NOT EXISTS `estagio_probatorio` (
  `id_estagio_probatorio` int(20) unsigned NOT NULL,
  `id_professor` int(20) unsigned NOT NULL,
  `primeiro_relatorio` date NOT NULL,
  `segundo_relatorio` date NOT NULL,
  `terceiro_relatorio` date NOT NULL,
  `quarto_relatorio` date NOT NULL,
  `final` date NOT NULL,
  PRIMARY KEY  (`id_estagio_probatorio`),
  KEY `fk_id_professor` (`id_professor`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `estagio_probatorio`
--

INSERT INTO `estagio_probatorio` (`id_estagio_probatorio`, `id_professor`, `primeiro_relatorio`, `segundo_relatorio`, `terceiro_relatorio`, `quarto_relatorio`, `final`) VALUES
(1, 58, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(2, 28, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `instituicao`
--

CREATE TABLE IF NOT EXISTS `instituicao` (
  `id_instituicao` int(11) NOT NULL auto_increment,
  `id_municipio` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sigla` varchar(10) default NULL,
  PRIMARY KEY  (`id_instituicao`),
  KEY `fk_instituicao_municipio` (`id_municipio`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Cadastro das instituições de ensino.' AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `instituicao`
--

INSERT INTO `instituicao` (`id_instituicao`, `id_municipio`, `nome`, `sigla`) VALUES
(1, 1, 'Universidade Federal de Santa Catarina', 'UFSC');

-- --------------------------------------------------------

--
-- Estrutura da tabela `municipio`
--

CREATE TABLE IF NOT EXISTS `municipio` (
  `id_municipio` int(11) NOT NULL auto_increment,
  `id_uf` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY  (`id_municipio`),
  KEY `fk_municipio_uf` (`id_uf`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Cadastro dos municípios.' AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `municipio`
--

INSERT INTO `municipio` (`id_municipio`, `id_uf`, `nome`) VALUES
(1, 1, 'Florianópolis');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pais`
--

CREATE TABLE IF NOT EXISTS `pais` (
  `id_pais` int(11) NOT NULL auto_increment,
  `nome` varchar(100) NOT NULL,
  `sigla` varchar(10) default NULL,
  PRIMARY KEY  (`id_pais`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Cadastro dos paí­ses.' AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `pais`
--

INSERT INTO `pais` (`id_pais`, `nome`, `sigla`) VALUES
(1, 'Brasil', 'BRL');

-- --------------------------------------------------------

--
-- Estrutura da tabela `portaria`
--

CREATE TABLE IF NOT EXISTS `portaria` (
  `id_portaria` int(11) NOT NULL auto_increment,
  `matricula_professor` int(11) NOT NULL,
  `portaria` varchar(45) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  PRIMARY KEY  (`id_portaria`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Cadastro de portarias.' AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `portaria`
--

INSERT INTO `portaria` (`id_portaria`, `matricula_professor`, `portaria`, `descricao`) VALUES
(1, 6138025, '01/02/06', 'teste de portaria');

-- --------------------------------------------------------

--
-- Estrutura da tabela `processo`
--

CREATE TABLE IF NOT EXISTS `processo` (
  `id_processo` int(11) NOT NULL auto_increment,
  `processo` varchar(45) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  PRIMARY KEY  (`id_processo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Cadastro de processos.' AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `processo`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE IF NOT EXISTS `professor` (
  `id_professor` int(11) NOT NULL auto_increment,
  `nome` varchar(100) NOT NULL,
  `sobrenome` varchar(100) NOT NULL,
  `matricula` int(11) NOT NULL,
  `siape` int(11) NOT NULL,
  `data_admissao` date NOT NULL,
  `data_admissao_ufsc` date NOT NULL,
  `data_nascimento` date NOT NULL,
  `aposentado` char(5) character set latin1 collate latin1_bin default NULL,
  `data_previsao_aposentadoria` date default NULL,
  `data_aposentadoria` date default NULL,
  `id_departamento` int(11) NOT NULL,
  `id_categoria_funcional_inicial` int(11) NOT NULL,
  `id_categoria_funcional_atual` int(11) NOT NULL,
  `id_tipo_titulacao` int(11) NOT NULL,
  `id_categoria_funcional_referencia` int(11) NOT NULL,
  `id_cargo` int(11) NOT NULL,
  `id_situacao` int(11) NOT NULL,
  PRIMARY KEY  (`id_professor`),
  KEY `fk_professor_departamento` (`id_departamento`),
  KEY `fk_professor_categoria_funcional` (`id_categoria_funcional_atual`),
  KEY `fk_professor_categoria_funcional1` (`id_categoria_funcional_inicial`),
  KEY `fk_professor_tipo_titulacao` (`id_tipo_titulacao`),
  KEY `fk_professor_categoria_funcional2` (`id_categoria_funcional_referencia`),
  KEY `fk_professor_cargo` (`id_cargo`),
  KEY `fk_professor_situacao` (`id_situacao`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Cadastro dos professores.' AUTO_INCREMENT=4006 ;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`id_professor`, `nome`, `sobrenome`, `matricula`, `siape`, `data_admissao`, `data_admissao_ufsc`, `data_nascimento`, `aposentado`, `data_previsao_aposentadoria`, `data_aposentadoria`, `id_departamento`, `id_categoria_funcional_inicial`, `id_categoria_funcional_atual`, `id_tipo_titulacao`, `id_categoria_funcional_referencia`, `id_cargo`, `id_situacao`) VALUES
(1, 'Fernando Augusto da Silva', 'Cruz', 98790, 11414, '1989-02-02', '1989-02-02', '0000-00-00', '0', '2018-08-07', '0000-00-00', 1, 5, 13, 4, 14, 1, 1),
(2, 'Lúcia Helena Martins', 'Pacheco', 98870, 0, '0000-00-00', '0000-00-00', '1961-02-01', '0', '2018-08-17', NULL, 1, 5, 13, 4, 14, 1, 1),
(3, '', '', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '', '0000-00-00', NULL, 0, 0, 0, 0, 0, 0, 0),
(4, '', '', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0', NULL, NULL, 9, 0, 0, 0, 0, 0, 0),
(5, '', '', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0', NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
(6, 'Adriano Ferreti', 'Borgatto', 135318, 0, '0000-00-00', '0000-00-00', '1975-05-02', '0', NULL, NULL, 1, 0, 0, 0, 0, 1, 1),
(7, 'Aldo Von', 'Wangenheim', 120078, 0, '0000-00-00', '0000-00-00', '1965-03-16', '0', '2032-02-17', NULL, 1, 0, 0, 0, 0, 1, 1),
(8, 'Antonio Augusto Medeiros', 'Frohlich', 116941, 0, '0000-00-00', '0000-00-00', '1970-11-10', '0', '2030-11-10', NULL, 1, 0, 0, 0, 0, 1, 1),
(9, 'Antonio Carlos ', 'Mariani', 89510, 0, '0000-00-00', '0000-00-00', '1962-04-22', '0', '2022-04-22', NULL, 1, 0, 0, 0, 0, 1, 1),
(10, 'Arthur Ronald de Vallauris', 'Buchsbaum', 119410, 0, '0000-00-00', '0000-00-00', '1955-10-10', '0', '2026-11-22', NULL, 1, 0, 0, 0, 0, 1, 1),
(11, 'Bernanrdo Gonçalves', 'Riso', 32268, 0, '0000-00-00', '0000-00-00', '1947-07-29', '0', '2009-11-03', NULL, 1, 0, 0, 0, 0, 1, 1),
(12, 'Carlos Becker ', 'Westphall', 106334, 1159822, '1993-08-11', '1993-08-11', '1961-09-16', '0', '2018-09-16', NULL, 1, 17, 17, 4, 17, 1, 0),
(13, 'Dalton Francisco de ', 'Andrade', 125401, 1299854, '2000-01-28', '2002-05-03', '1951-02-17', NULL, NULL, NULL, 1, 17, 17, 4, 17, 1, 0),
(14, 'Daniel Santana de ', 'Freitas', 120663, 1225759, '1997-06-10', '1997-06-10', '1965-04-21', NULL, NULL, NULL, 1, 9, 13, 4, 13, 1, 0),
(15, 'Fabio Teixeira de', 'Campos', 41615, 1156730, '1979-03-01', '1979-03-01', '1956-02-23', NULL, NULL, NULL, 1, 35, 12, 3, 12, 1, 0),
(16, 'Frank Augusto', 'Ciqueira', 125355, 0, '0000-00-00', '0000-00-00', '1971-10-08', '0', '2037-05-18', NULL, 1, 0, 0, 0, 0, 1, 1),
(17, 'Isaias Camilo ', 'Boratti', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0', NULL, NULL, 1, 0, 0, 0, 0, 1, 1),
(18, 'João Bosco Mangueira', 'Sobral', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0', NULL, NULL, 1, 0, 0, 0, 0, 1, 1),
(19, 'João Cândido Lima', 'Dovicch', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0', NULL, NULL, 1, 0, 0, 0, 0, 1, 1),
(20, 'José Eduardo De', 'Lucca', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0', NULL, NULL, 1, 0, 0, 0, 0, 1, 1),
(21, 'José Francisco D. de G C', 'Fletes', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0', NULL, NULL, 1, 0, 0, 0, 0, 1, 1),
(22, 'José Luís Almada', 'Güntzel', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0', NULL, NULL, 1, 0, 0, 0, 0, 1, 1),
(23, 'José Mazzucco', 'Júnior', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0', NULL, NULL, 1, 0, 0, 0, 0, 1, 1),
(24, 'Jovelino', 'Falqueto', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '1', NULL, NULL, 1, 0, 0, 0, 0, 1, 1),
(25, 'Júlio Felipe', 'Szeremeta', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0', NULL, NULL, 1, 0, 0, 0, 0, 1, 1),
(26, 'Lau Cheuk', 'Lung', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0', NULL, NULL, 1, 0, 0, 0, 0, 1, 1),
(27, 'Leandro José', 'Komosinski', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0', NULL, NULL, 1, 0, 0, 0, 0, 1, 1),
(28, 'Luciana De Oliveira', 'Rech', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0', NULL, NULL, 1, 0, 0, 0, 0, 1, 1),
(29, 'Luis Fernando', 'Friedrich', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0', NULL, NULL, 1, 0, 0, 0, 0, 1, 1),
(30, 'Luiz Cláudio Villar dos', 'Santos', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0', NULL, NULL, 1, 0, 0, 0, 0, 1, 1),
(31, 'Luiz Fernando Bier', 'Melgarejo', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0', NULL, NULL, 1, 0, 0, 0, 0, 1, 1),
(32, 'Manuel Rosa de Oliveira', 'Lino', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0', NULL, NULL, 1, 0, 0, 0, 0, 1, 1),
(33, 'Maria Marta', 'Leite', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0', NULL, NULL, 1, 0, 0, 0, 0, 1, 1),
(34, 'Mário Antônio Ribeiro', 'Dantas', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0', NULL, NULL, 1, 0, 0, 0, 0, 1, 1),
(35, 'Masanao', 'Ohira', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0', NULL, NULL, 1, 0, 0, 0, 0, 1, 1),
(36, 'Mauro', 'Roisenberg', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0', NULL, NULL, 1, 0, 0, 0, 0, 1, 1),
(37, 'Olinto José Varela', 'Furtado', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0', NULL, NULL, 1, 0, 0, 0, 0, 1, 1),
(38, 'Patricia Della Mea', 'Plentz', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0', NULL, NULL, 1, 0, 0, 0, 0, 1, 1),
(39, 'Patricia', 'Vilain', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0', NULL, NULL, 1, 0, 0, 0, 0, 1, 1),
(40, 'Paulo José de Freitas', 'Filho', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0', NULL, NULL, 1, 0, 0, 0, 0, 1, 1),
(41, 'Paulo José', 'Ogliari', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0', NULL, NULL, 1, 0, 0, 0, 0, 1, 1),
(42, 'Paulo Sérgio da Silva', 'Borges', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0', NULL, NULL, 1, 0, 0, 0, 0, 1, 1),
(43, 'Pedro Alberto', 'Barbetta', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0', NULL, NULL, 1, 0, 0, 0, 0, 1, 1),
(44, 'Raul Sidnei', 'Wazlawick', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0', NULL, NULL, 1, 0, 0, 0, 0, 1, 1),
(45, 'Renato', 'Cislaghi', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0', NULL, NULL, 1, 0, 0, 0, 0, 1, 1),
(46, 'Renato', 'Fileto', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0', NULL, NULL, 1, 0, 0, 0, 0, 1, 1),
(47, 'Ricardo Azambuja', 'Silveira', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0', NULL, NULL, 1, 0, 0, 0, 0, 1, 1),
(48, 'Ricardo Felipe', 'Custódio', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0', NULL, NULL, 1, 0, 0, 0, 0, 1, 1),
(49, 'Ricardo Pereira e', 'Silva', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0', NULL, NULL, 1, 0, 0, 0, 0, 1, 1),
(50, 'Roberto', 'Willrich', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0', NULL, NULL, 1, 0, 0, 0, 0, 1, 1),
(51, 'Ronaldo dos Santos', 'Mello', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0', NULL, NULL, 1, 0, 0, 0, 0, 1, 1),
(52, 'Carla Merkle', 'Westphall', 138864, 1572804, '2007-05-24', '2007-05-24', '1971-02-18', NULL, NULL, NULL, 1, 9, 10, 4, 10, 1, 0),
(53, 'Rosvelter João Coelho da', 'Costa', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0', NULL, NULL, 1, 0, 0, 0, 0, 1, 1),
(54, 'Sérgio', 'Peters', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0', NULL, NULL, 1, 0, 0, 0, 0, 1, 1),
(55, 'Sílvia Modesto', 'Nassar', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0', NULL, NULL, 1, 0, 0, 0, 0, 1, 1),
(56, 'Vania', 'Bogorny', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0', NULL, NULL, 1, 0, 0, 0, 0, 1, 1),
(57, 'Vitório Bruno', 'Mazzola', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0', NULL, NULL, 1, 0, 0, 0, 0, 1, 1),
(58, 'Carina Friedrich', 'Dorneles', 0, 0, '2009-07-15', '2009-07-15', '1974-07-23', '0', NULL, NULL, 1, 0, 0, 0, 0, 1, 1),
(59, 'Christiane A. G. Von', 'Wangenheim', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0', NULL, NULL, 1, 0, 0, 0, 0, 1, 1),
(60, 'Ana Claudia de', 'Souza', 138279, 1564929, '2007-03-02', '2007-03-02', '0000-00-00', '0', '2037-02-21', NULL, 40, 9, 10, 4, 11, 1, 1),
(61, 'Roselane Fátima', 'Campos', 138244, 1564916, '2007-03-02', '2007-03-02', '0000-00-00', '0', '2037-02-21', NULL, 40, 9, 10, 4, 11, 1, 1),
(67, 'Tarciso Antônio', 'Grandi', 41763, 1156741, '1980-05-01', '1980-05-01', '0000-00-00', '0', '2008-01-04', NULL, 49, 0, 14, 4, 15, 1, 1),
(65, 'Sidney dos santos', 'Avancini', 105621, 1159777, '1993-02-18', '1993-02-18', '0000-00-00', '0', '2028-02-09', NULL, 49, 9, 14, 4, 15, 1, 1),
(66, 'Lia Silva de', 'Oliveira', 54890, 1157467, '1980-08-01', '1980-08-01', '0000-00-00', '0', '2007-02-25', NULL, 49, 0, 14, 4, 15, 1, 1),
(64, 'Joaquim Nestor Braga de', 'Moraes', 41747, 1156739, '1979-03-01', '1979-03-01', '0000-00-00', '0', '2007-10-25', NULL, 49, 0, 14, 4, 15, 1, 1),
(63, 'Maria Luisa', 'Sartorelli', 122267, 1284262, '1998-07-07', '1998-07-07', '0000-00-00', '0', '2028-06-28', NULL, 49, 9, 14, 4, 15, 1, 1),
(62, 'Andrea Brandão', 'Lapa', 138260, 2466951, '2007-03-02', '2007-03-02', '0000-00-00', '0', '2037-02-21', NULL, 8, 9, 10, 4, 11, 1, 1),
(68, 'Sebastião Roberto', 'Soares', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, 5, 0, 0, 0, 0, 1, 1),
(69, 'Felício Wessling', 'Margotti', 49691, 1169609, '1980-03-13', '1980-03-13', '1953-07-10', NULL, NULL, NULL, 26, 0, 0, 0, 0, 0, 1),
(70, 'Antônio Carlos de', 'Souza', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 1),
(71, 'Milton', 'Horn', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 1),
(72, 'Tattiana Gonçalves', 'Teixiera', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 1),
(73, 'Beatriz Maykot Kuerten', 'Gil', 109562, 115279, '1994-02-23', '1994-02-23', '0000-00-00', NULL, NULL, NULL, 37, 1, 4, 2, 4, 1, 1),
(74, 'Edison Natal', 'Fedrizzi', 103637, 1159668, '1992-02-07', '1992-02-07', '0000-00-00', NULL, NULL, NULL, 37, 1, 8, 3, 8, 1, 1),
(75, 'Jorge Abi-Saab', 'Neto', 32730, 1156334, '1977-03-01', '1977-03-01', '0000-00-00', NULL, NULL, NULL, 37, 35, 12, 3, 12, 1, 1),
(76, 'Luiz Fernando', 'Somacal', 109708, 1160075, '1994-02-25', '1994-02-25', '0000-00-00', NULL, NULL, NULL, 37, 1, 8, 2, 8, 1, 1),
(77, 'Paulo Fernando Brum', 'Rojas', 117085, 2160575, '1995-08-28', '1995-08-28', '0000-00-00', NULL, NULL, NULL, 37, 1, 8, 3, 8, 1, 1),
(78, 'Ricardo', 'Nascimento', 100697, 1559525, '1990-01-29', '1990-01-29', '0000-00-00', NULL, NULL, NULL, 37, 1, 10, 2, 10, 1, 1),
(79, 'Sérgio Murilo', 'Steffens', 138660, 3160487, '2007-03-19', '2007-03-19', '0000-00-00', NULL, NULL, NULL, 37, 5, 9, 4, 9, 1, 1),
(80, 'Ubiratan Cunha', 'Barbosa', 103459, 1159656, '1992-02-03', '1992-02-03', '0000-00-00', NULL, NULL, NULL, 37, 1, 4, 2, 4, 1, 1),
(81, 'Alberto Julian de Santiago', 'Insaurralde', 39866, 1156643, '1978-05-02', '1978-05-02', '0000-00-00', NULL, NULL, NULL, 2, 35, 13, 4, 13, 1, 1),
(82, 'Alcimir José de', 'Paris', 63198, 1157857, '1982-08-04', '1982-08-04', '1956-08-16', NULL, NULL, NULL, 2, 1, 14, 4, 14, 1, 1),
(83, 'Alina Gonçalves', 'Santiago', 69587, 1158162, '1983-03-21', '1983-03-21', '0000-00-00', NULL, NULL, NULL, 2, 1, 14, 4, 14, 1, 1),
(84, 'Almir Francisco', 'Reis', 111117, 1160152, '1994-09-19', '1994-09-19', '0000-00-00', NULL, NULL, NULL, 2, 5, 11, 4, 11, 1, 1),
(85, 'Américo', 'Ishida', 59859, 1157711, '1982-03-01', '1982-03-01', '1949-10-10', NULL, NULL, NULL, 2, 1, 7, 3, 7, 1, 1),
(86, 'Ana Maria Gadelha Albano', 'Amora', 120027, 2169776, '1997-01-29', '1997-01-29', '0000-00-00', NULL, NULL, NULL, 2, 1, 9, 4, 9, 1, 1),
(87, 'Anderson', 'Claro', 43464, 1156830, '1979-03-13', '1979-03-13', '0000-00-00', NULL, NULL, NULL, 2, 35, 14, 4, 14, 1, 1),
(88, 'Ayrton Portilho', 'Bueno', 85450, 1158909, '1986-02-14', '1986-02-14', '0000-00-00', NULL, NULL, NULL, 2, 1, 9, 4, 9, 1, 1),
(89, 'Cesar Floriano dos', 'Santos', 43537, 1156834, '1979-03-19', '1979-03-19', '0000-00-00', NULL, NULL, NULL, 2, 35, 13, 4, 13, 1, 1),
(90, 'Dalmo Vieira', 'Filho', 22567, 223067, '1985-05-30', '1985-05-30', '0000-00-00', NULL, NULL, NULL, 2, 1, 8, 2, 8, 1, 1),
(91, 'Elvira Barros Viveiros da', 'Silva', 102207, 1159590, '1991-05-03', '1991-05-03', '0000-00-00', NULL, NULL, NULL, 2, 5, 14, 4, 14, 1, 1),
(92, 'Fernando', 'Barth', 98463, 1159403, '1988-10-06', '1988-10-06', '0000-00-00', NULL, NULL, NULL, 2, 1, 14, 4, 14, 1, 1),
(93, 'Fernando Oscar Ruttkay', 'Ferreira', 60954, 1157768, '1982-03-01', '1982-03-01', '0000-00-00', NULL, NULL, NULL, 2, 1, 17, 4, 17, 1, 1),
(94, 'Francisco Antônio Carneiro', 'Ferreira', 105702, 1159783, '1993-02-18', '1993-02-18', '0000-00-00', NULL, NULL, NULL, 2, 5, 8, 3, 8, 1, 1),
(95, 'Gilberto Sarkis', 'Yunes', 136918, 421025, '2006-03-14', '2006-03-14', '0000-00-00', NULL, NULL, NULL, 2, 9, 10, 4, 10, 1, 1),
(96, 'Gilcéia Pesce do Amaral e', 'Silva', 99664, 1159456, '1989-09-19', '1989-09-19', '0000-00-00', NULL, NULL, NULL, 2, 1, 13, 4, 13, 1, 1),
(97, 'João Carlos', 'Souza', 116577, 1160626, '1995-07-14', '1995-07-14', '1957-01-09', NULL, NULL, NULL, 2, 5, 14, 4, 14, 1, 1),
(98, 'João Eduardo di', 'Pietro', 59883, 1157714, '1982-03-01', '1982-03-01', '1940-08-30', NULL, NULL, NULL, 2, 1, 14, 4, 14, 1, 1),
(99, 'João Antônio Zapatel Pereira de', 'Araújo', 111400, 1160173, '1994-10-24', '1994-10-24', '1960-08-22', NULL, NULL, NULL, 2, 5, 14, 4, 14, 1, 1),
(100, 'Lino Fernando Bragança', 'Peres', 40376, 1156670, '1978-08-01', '1978-08-01', '1951-12-27', NULL, NULL, NULL, 2, 35, 13, 4, 13, 1, 1),
(101, 'Luiz Eduardo Fontoura', 'Teixeira', 59735, 1157701, '1982-03-01', '1982-03-01', '1951-01-25', NULL, NULL, NULL, 2, 1, 9, 3, 9, 1, 1),
(102, 'Luis Roberto Marques da', 'Silveira', 113659, 1160379, '1995-01-24', '1995-01-24', '1961-03-11', NULL, NULL, NULL, 2, 5, 8, 3, 8, 1, 1),
(103, 'Marta', 'Dischinger', 85752, 1158926, '1986-02-20', '1986-02-20', '1956-08-23', NULL, NULL, NULL, 2, 1, 13, 4, 13, 1, 1),
(104, 'Margareth de Castro Afeche', 'Pimenta', 54814, 1157459, '1980-08-01', '1980-08-01', '1951-12-09', NULL, NULL, NULL, 2, 35, 14, 4, 14, 1, 1),
(105, 'Maria Inês', 'Sugai', 55608, 1157512, '1980-08-01', '1980-08-01', '1954-01-21', NULL, NULL, NULL, 2, 35, 13, 4, 13, 1, 1),
(106, 'Paulo César', 'Gobbi', 54830, 1157461, '1980-08-01', '1980-08-01', '1954-07-03', NULL, NULL, NULL, 2, 35, 12, 1, 12, 1, 1),
(107, 'Sônia', 'Afonso', 54768, 1157454, '1980-08-01', '1980-08-01', '1954-12-06', NULL, NULL, NULL, 2, 35, 14, 4, 14, 1, 1),
(108, 'Sérgio Castelo Branco', 'Nappi', 54717, 1157451, '1980-08-01', '1980-08-01', '1954-04-03', NULL, NULL, NULL, 2, 35, 14, 4, 14, 1, 1),
(109, 'Themis da Cruz', 'Fagundes', 136853, 1527225, '2006-03-14', '2006-03-14', '1957-02-15', NULL, NULL, NULL, 2, 9, 10, 4, 10, 1, 1),
(110, 'Vera Helena Moro Bins', 'Ely', 63210, 1157858, '1982-08-02', '1982-08-02', '1955-09-05', NULL, NULL, NULL, 2, 5, 14, 4, 14, 1, 1),
(111, 'Wilson Jesus da Cunha', 'Silveira', 52390, 1157313, '1980-04-01', '1980-04-01', '1940-12-16', NULL, NULL, NULL, 2, 5, 14, 4, 14, 1, 1),
(112, 'Amir Mattar', 'Valente', 83253, 1158778, '1985-11-04', '1985-11-04', '1956-10-13', NULL, NULL, NULL, 7, 5, 14, 4, 14, 1, 0),
(113, 'Ana Maria Bencciveni', 'Franzoni', 63139, 1157853, '1982-08-04', '1982-08-04', '1953-12-26', NULL, NULL, NULL, 7, 1, 13, 4, 13, 1, 0),
(114, 'Ângela do', 'Vale', 118357, 1191141, '1996-03-06', '1996-03-06', '1964-05-25', NULL, NULL, NULL, 7, 5, 10, 5, 10, 1, 0),
(115, 'Antônio Edésio', 'Jungles', 31695, 1156284, '1977-01-01', '1977-01-01', '1951-01-13', NULL, NULL, NULL, 7, 35, 14, 4, 14, 1, 0),
(116, 'Antônio Fortunato', 'Marcom', 58089, 1157641, '1981-08-01', '1981-08-01', '1947-05-02', NULL, NULL, NULL, 7, 5, 13, 5, 13, 1, 0),
(117, 'Carlos Alberto', 'Szcus', 46773, 1156997, '1976-07-12', '1976-07-12', '1952-09-13', NULL, NULL, NULL, 7, 35, 17, 4, 17, 1, 0),
(118, 'Carlos', 'Loch', 63244, 1157861, '1982-08-02', '1982-08-02', '1956-08-22', NULL, NULL, NULL, 7, 1, 17, 4, 17, 1, 0),
(119, 'Cláudio César', 'Zimmermann', 121449, 2156336, '1997-12-23', '1997-12-23', '1958-07-04', NULL, NULL, NULL, 7, 5, 8, 3, 8, 1, 0),
(120, 'Daniel Domingues', 'Loriggio', 69480, 1158153, '1983-03-30', '1983-03-30', '1958-02-19', NULL, NULL, NULL, 7, 1, 17, 4, 17, 1, 0),
(121, 'Denise Antunes da', 'Silva', 119746, 1212718, '1996-11-04', '1996-11-04', '1967-12-03', NULL, NULL, NULL, 7, 5, 10, 4, 10, 1, 0),
(122, 'Dora Maria', 'Orth', 103661, 1159671, '1992-02-26', '1992-02-26', '1954-11-23', NULL, NULL, NULL, 7, 9, 14, 4, 14, 1, 0),
(123, 'Glicério', 'Trichês', 76427, 1158425, '1986-01-01', '1986-01-01', '1958-09-20', NULL, NULL, NULL, 7, 1, 14, 4, 14, 1, 0),
(124, 'Henriette Lebre la', 'Rovere', 109724, 311276, '1991-11-26', '1994-03-01', '1955-08-19', NULL, NULL, NULL, 7, 9, 14, 4, 14, 1, 0),
(125, 'Henrique Magnani de', 'Oliveira', 120035, 1217843, '1996-12-16', '1996-12-16', '1965-08-02', NULL, NULL, NULL, 7, 5, 9, 4, 9, 1, 0),
(126, 'Humberto Ramos', 'Roman', 103696, 1159674, '1992-02-01', '1992-02-01', '1955-05-02', NULL, NULL, NULL, 7, 9, 14, 4, 14, 1, 0),
(127, 'Ismael Ulysséa', 'Neto', 31741, 1156287, '1977-01-01', '1977-01-01', '1952-08-19', NULL, NULL, NULL, 7, 35, 17, 4, 17, 1, 0),
(128, 'Ivo José', 'Padaratz', 31075, 1156249, '1976-08-01', '1976-08-01', '1951-07-31', NULL, NULL, NULL, 7, 7, 14, 4, 14, 1, 0),
(129, 'Janaíde Cavalcante', 'Rocha', 121333, 1254044, '1997-12-03', '1997-12-03', '1964-08-16', NULL, NULL, NULL, 7, 5, 14, 4, 14, 1, 0),
(130, 'Jucelei', 'Cordini', 31768, 1156289, '1977-01-01', '1977-01-01', '1952-09-12', NULL, NULL, NULL, 7, 35, 14, 4, 14, 1, 0),
(131, 'Júrgen Wilhelm', 'Philips', 120892, 1174608, '1997-07-02', '1997-07-02', '1947-09-26', NULL, NULL, NULL, 7, 9, 10, 4, 10, 1, 0),
(132, 'Lenise Grando', 'Goldner', 90632, 1159124, '1987-05-07', '1987-05-07', '1957-06-13', NULL, NULL, NULL, 7, 9, 14, 5, 14, 1, 0),
(133, 'Luiz Alberto', 'Gomes', 118812, 2175158, '1996-06-04', '1996-06-04', '1959-10-26', NULL, NULL, NULL, 7, 5, 13, 5, 13, 1, 0),
(134, 'Leto', 'Momm', 44754, 1156890, '1979-04-01', '1979-04-01', '1949-09-04', NULL, NULL, NULL, 7, 35, 14, 4, 14, 1, 0),
(135, 'Lia Caetano', 'Bastos', 72910, 1158307, '1983-08-16', '1983-08-16', '1958-03-29', NULL, NULL, NULL, 7, 1, 14, 4, 14, 1, 0),
(136, 'Luiz Roberto Prudêncio', 'Júnior', 63236, 1157860, '1982-08-02', '1982-08-02', '1959-04-20', NULL, NULL, NULL, 7, 1, 17, 4, 17, 1, 0),
(137, 'Marciano', 'Maccarini', 25997, 1156000, '1975-08-25', '1975-08-25', '1948-01-22', NULL, NULL, NULL, 7, 57, 17, 4, 17, 1, 0),
(138, 'Moacir Henrique de Andrade', 'Carqueja', 35909, 1156468, '1977-03-21', '1977-03-21', '1949-11-01', NULL, NULL, NULL, 7, 35, 12, 3, 12, 1, 0),
(139, 'Narbal Ataliba', 'Marcelino', 59875, 1157713, '1982-03-01', '1982-03-01', '1954-02-28', NULL, NULL, NULL, 7, 1, 14, 4, 14, 1, 0),
(140, 'Nora Maria de Patta', 'Pillar', 33175, 1156354, '1977-03-01', '1977-03-01', '1953-05-18', NULL, NULL, NULL, 7, 35, 12, 1, 12, 1, 0),
(141, 'Norberto', 'Hochheim', 72430, 1158292, '1983-08-01', '1983-08-01', '1958-08-18', NULL, NULL, NULL, 7, 1, 17, 4, 17, 1, 0),
(142, 'Orlando Martini de ', 'Oliveira', 137094, 1530596, '2006-05-10', '2006-05-10', '1964-03-30', NULL, NULL, NULL, 7, 9, 10, 4, 10, 1, 0),
(143, 'Philippe Jean Paul', 'Gleize', 120671, 2202533, '1996-03-20', '1996-03-20', '1965-01-28', NULL, NULL, NULL, 7, 9, 14, 4, 14, 1, 0),
(144, 'Poliana Dias de', 'Moraes', 120582, 1224544, '1997-05-27', '1997-05-27', '1965-05-23', NULL, NULL, NULL, 7, 5, 10, 4, 10, 1, 0),
(145, 'Ricardo', 'Ruther', 123875, 2309185, '2000-02-01', '2000-02-01', '1964-03-04', NULL, NULL, NULL, 7, 9, 13, 4, 13, 1, 0),
(146, 'Roberto Caldas de Andrade', 'Pinto', 123808, 1310909, '2000-01-26', '2000-01-26', '1963-06-19', NULL, NULL, NULL, 7, 9, 13, 4, 13, 1, 0),
(147, 'Roberto', 'Lamberts', 100174, 1159484, '1989-12-28', '1989-12-28', '1957-10-05', NULL, NULL, NULL, 7, 5, 17, 4, 17, 1, 0),
(148, 'Wellington Longuini', 'Repette', 125320, 1351036, '2002-05-27', '2002-05-27', '1964-10-21', NULL, NULL, NULL, 7, 9, 11, 4, 11, 1, 0),
(149, 'Wilson', 'Spernau', 56175, 1157544, '1980-10-01', '1980-10-01', '1950-11-23', NULL, NULL, NULL, 7, 35, 12, 1, 12, 1, 0),
(150, 'Adroaldo', 'Raizer', 103513, 1159659, '1992-02-03', '1992-02-03', '1963-08-11', NULL, NULL, NULL, 8, 9, 17, 4, 17, 1, 0),
(151, 'Aguinaldo Silveira e ', 'Silva', 54806, 1157458, '1980-08-01', '1980-08-01', '1954-02-14', NULL, NULL, NULL, 8, 5, 17, 4, 17, 1, 0),
(152, 'Antônio José Alves Simões', 'Costa', 24680, 1155946, '1975-03-24', '1975-03-24', '1950-10-01', NULL, NULL, NULL, 8, 57, 17, 4, 17, 1, 0),
(153, 'Bartolomeu Ferreira Uchôa', 'Filho', 123840, 1310998, '2000-02-01', '2000-02-01', '1965-10-29', NULL, NULL, NULL, 8, 9, 13, 4, 13, 1, 0),
(154, 'Carlo Requião da ', 'Cunha', 138210, 1564666, '2007-03-02', '2007-03-02', '1977-03-26', NULL, NULL, NULL, 8, 9, 10, 4, 10, 1, 0),
(155, 'Carlos Alberto', 'Livramento', 31059, 1156248, '1976-08-01', '1976-08-01', '1952-07-13', NULL, NULL, NULL, 8, 57, 12, 3, 12, 1, 0),
(156, 'Carlos Aurélio Faria da', 'Rocha', 70615, 1158221, '1983-03-30', '1983-03-30', '1956-07-29', NULL, NULL, NULL, 8, 1, 14, 4, 14, 1, 0),
(157, 'Carlos Galup', 'Montoro', 100212, 1159487, '1990-01-11', '1990-01-11', '1953-02-20', NULL, NULL, NULL, 8, 5, 17, 4, 17, 1, 0),
(158, 'Cornélio Celso de Brasil', 'Camargo', 45041, 1156905, '1979-08-01', '1979-08-01', '1941-12-13', NULL, NULL, NULL, 8, 35, 14, 4, 14, 1, 0),
(159, 'Denizar Cruz', 'Martins', 46790, 1156999, '1979-10-01', '1979-10-01', '1955-04-24', NULL, NULL, NULL, 8, 35, 17, 4, 17, 1, 0),
(160, 'Edson Luiz da', 'Silva', 109376, 277779, '1994-02-01', '1994-02-01', '1958-03-19', NULL, NULL, NULL, 8, 5, 14, 4, 14, 1, 0),
(161, 'Enio Valmor', 'Kassick', 69595, 1158163, '1983-03-21', '1983-03-21', '1956-11-11', NULL, NULL, NULL, 8, 1, 17, 4, 17, 1, 0),
(162, 'Erlon Cristian', 'Finard', 137108, 1530010, '2006-04-19', '2006-04-19', '1974-12-06', NULL, NULL, NULL, 8, 9, 10, 4, 10, 1, 0),
(163, 'Fernando Mendes de', 'Azevedo', 39130, 1156606, '1978-03-31', '1978-03-31', '1954-11-26', NULL, NULL, NULL, 8, 35, 14, 4, 14, 1, 0),
(164, 'Hans Helmuth ', 'Zurn', 6550, 1155188, '1967-03-16', '1967-03-16', '1942-04-30', NULL, NULL, NULL, 8, 57, 17, 4, 17, 1, 0),
(165, 'Hamilton Medeiros ', 'Silveira', 14545, 1155503, '1970-03-01', '1970-03-01', '1946-04-05', NULL, NULL, NULL, 8, 35, 14, 4, 14, 1, 0),
(166, 'Hanilson', 'Savi', 38746, 1156583, '1978-03-31', '1978-03-31', '1951-02-17', NULL, NULL, NULL, 8, 35, 12, 3, 12, 1, 0),
(167, 'Helena Flávia Naspolini', 'Coelho', 31040, 1156247, '1976-07-20', '1976-07-20', '1953-08-24', NULL, NULL, NULL, 8, 57, 12, 3, 12, 1, 0),
(168, 'Ildemar Cassana', 'Decker', 82249, 1158734, '1980-03-03', '1985-09-01', '1956-05-13', NULL, NULL, NULL, 8, 8, 14, 4, 14, 1, 0),
(169, 'Ivo', 'Barbi', 22572, 1155866, '1974-04-17', '1974-04-17', '1948-01-28', NULL, NULL, NULL, 8, 57, 17, 4, 17, 1, 0),
(170, 'Jacqueline Gisele', 'Rolim', 118685, 1198276, '1996-04-23', '1996-04-23', '1961-08-25', NULL, NULL, NULL, 8, 5, 14, 4, 14, 1, 0),
(171, 'João Carlos dos Santos', 'Fagundes', 64569, 1157921, '1982-09-15', '1982-09-15', '1954-08-30', NULL, NULL, NULL, 8, 1, 14, 4, 14, 1, 0),
(172, 'João Pedro Assumpção', 'Bastos', 98269, 1159396, '1988-09-29', '1988-09-29', '1952-02-29', NULL, NULL, NULL, 8, 9, 17, 4, 17, 1, 0),
(173, 'Joceli', 'Mayer', 105907, 1159793, '1993-05-07', '1993-05-07', '1965-09-22', NULL, NULL, NULL, 8, 5, 13, 4, 13, 1, 0),
(174, 'Jorge', 'Coelho', 39092, 1156605, '1978-03-31', '1978-03-31', '1955-02-07', NULL, NULL, NULL, 8, 35, 17, 4, 17, 1, 0),
(175, 'Jorge Mario', 'Campagnolo', 64585, 1157923, '1982-09-15', '1982-09-15', '1958-02-15', NULL, NULL, NULL, 8, 1, 14, 4, 14, 1, 0),
(176, 'Jefferson Luiz Brum', 'Marques', 120167, 1219781, '1997-03-13', '1997-03-13', '1963-01-20', NULL, NULL, NULL, 8, 9, 13, 4, 13, 1, 0),
(177, 'José Carlos Moreira', 'Bermudez', 98781, 1159413, '1989-02-16', '1989-02-16', '1956-03-06', NULL, NULL, NULL, 8, 9, 17, 4, 17, 1, 0),
(178, 'Kátia Campos de', 'Almeida', 122470, 2218917, '1998-08-06', '1998-08-06', '1961-04-23', NULL, NULL, NULL, 8, 9, 13, 4, 13, 1, 0),
(179, 'Leonardo Silva', 'Rezende', 118804, 1200733, '1996-05-24', '1996-05-24', '1963-11-24', NULL, NULL, NULL, 8, 5, 14, 4, 14, 1, 0),
(180, 'Marcelo Menezes', 'Reis', 116208, 1160596, '1995-06-28', '1995-06-28', '1968-12-23', NULL, NULL, NULL, 8, 5, 12, 4, 12, 1, 0),
(181, 'Márcio Holsbach', 'Costa', 134451, 1459058, '2004-07-12', '2004-07-12', '1970-03-28', NULL, NULL, NULL, 8, 9, 11, 4, 11, 1, 0),
(182, 'Márcio Cheren ', 'Schneider', 31032, 1156246, '1976-07-20', '1976-07-20', '1952-10-31', NULL, NULL, NULL, 8, 57, 17, 4, 17, 1, 0),
(183, 'Maurício Valência Ferreira da', 'Luz', 136055, 1517228, '2005-12-28', '2005-12-28', '1973-06-14', NULL, NULL, NULL, 8, 9, 10, 4, 10, 1, 0),
(184, 'Nelson Jhoe ', 'Batistela', 125185, 1222097, '2002-04-26', '2002-04-26', '1964-11-28', NULL, NULL, NULL, 8, 9, 12, 4, 12, 1, 0),
(185, 'Nelson', 'Sadowiski', 84004, 1158813, '1985-11-05', '1985-11-05', '1959-03-27', NULL, NULL, NULL, 8, 5, 17, 4, 17, 1, 0),
(186, 'Patrick Kuo', 'Peng', 122437, 2204226, '1998-07-28', '1998-07-28', '1966-04-18', NULL, NULL, NULL, 8, 9, 14, 4, 14, 1, 0),
(187, 'Raimes', 'Moraes', 120094, 1206569, '1997-03-04', '1997-03-04', '1964-08-28', NULL, NULL, NULL, 8, 9, 14, 4, 14, 1, 0),
(188, 'Renato Garcia', 'Ojeda', 104846, 1159741, '1992-08-25', '1992-08-25', '1955-08-08', NULL, NULL, NULL, 8, 5, 14, 4, 14, 1, 0),
(189, 'Renato Lucas', 'Pacheco', 52714, 1157332, '1980-04-15', '1980-04-15', '1955-09-21', NULL, NULL, NULL, 8, 35, 14, 4, 14, 1, 0),
(190, 'Roberto de Souza', 'Salgado', 40368, 1156669, '1978-08-01', '1978-08-01', '1953-07-20', NULL, NULL, NULL, 8, 35, 14, 4, 14, 1, 0),
(191, 'Rui', 'Seara', 26543, 1156030, '1975-10-29', '1975-10-29', '1951-08-31', NULL, NULL, NULL, 8, 57, 17, 4, 17, 1, 0),
(192, 'Samir Ahmad', 'Mussa', 135881, 1515060, '2005-11-16', '2005-11-16', '1964-10-31', NULL, NULL, NULL, 8, 9, 10, 4, 10, 1, 0),
(193, 'Sidnei Noceti', 'Filho', 27663, 1156098, '1976-04-20', '1976-04-20', '1952-12-17', NULL, NULL, NULL, 8, 57, 17, 4, 17, 1, 0),
(194, 'Walter Pereira Carpes', 'Júnior', 108264, 342906, '1993-12-23', '1993-12-23', '1964-08-06', NULL, NULL, NULL, 8, 5, 13, 4, 13, 1, 0),
(195, 'Alcilene Rodrigues Monteiro', 'Fritz', 126602, 1365450, '2002-12-02', '2002-12-02', '1967-06-15', NULL, NULL, NULL, 6, 9, 12, 4, 12, 1, 0),
(196, 'Adelamar Ferreira', 'Novais', 98854, 1159420, '1989-02-22', '1989-02-22', '1959-03-02', NULL, NULL, NULL, 6, 1, 8, 3, 8, 1, 0),
(197, 'Agenor Furigo', 'Júnior', 74092, 1158347, '1984-03-12', '1984-03-12', '1958-07-07', NULL, NULL, NULL, 6, 1, 14, 4, 14, 1, 0),
(198, 'Antônio Augusto Ulson de', 'Souza', 85698, 1158922, '1986-01-21', '1986-01-21', '1958-08-03', NULL, NULL, NULL, 6, 1, 14, 4, 14, 1, 0),
(199, 'Ariovaldo', 'Bolzan', 63252, 1157862, '1982-08-02', '1982-08-02', '1958-01-01', NULL, NULL, NULL, 6, 1, 14, 4, 14, 1, 0),
(200, 'Ayres Ferreira', 'Morgado', 60962, 1157769, '1982-03-08', '1982-03-08', '1947-10-08', NULL, NULL, NULL, 6, 1, 13, 4, 13, 1, 0),
(201, 'Cláudia ', 'Sayer', 134532, 1460725, '2004-07-21', '2004-07-21', '1969-05-11', NULL, NULL, NULL, 6, 9, 11, 4, 11, 1, 0),
(202, 'Carlos Alberto França', 'Dantas', 21347, 1155803, '1973-08-10', '1973-08-10', '1946-08-24', NULL, NULL, NULL, 6, 57, 12, 3, 12, 1, 0),
(203, 'Dachamir', 'Hotza', 121120, 2219094, '1997-10-14', '1997-10-14', '1966-08-08', NULL, NULL, NULL, 6, 9, 14, 4, 14, 1, 0),
(204, 'Gláucia Maria Falcão de ', 'Aragão', 100166, 1159483, '1989-12-29', '1989-12-29', '1961-04-23', NULL, NULL, NULL, 6, 5, 14, 4, 14, 1, 0),
(205, 'Haiko', 'Hense', 73940, 1158340, '1984-04-10', '1984-04-10', '1956-09-17', NULL, NULL, NULL, 6, 1, 14, 4, 14, 1, 0),
(206, 'Humberto Gracher', 'Riella', 117263, 2160703, '1995-09-14', '1995-09-14', '1953-03-18', NULL, NULL, NULL, 6, 9, 14, 4, 14, 1, 0),
(207, 'Nelson Popini', 'Vaz', 36140, 1156482, '1977-08-16', '1977-08-16', '1940-04-20', NULL, NULL, NULL, 2, 57, 14, 4, 14, 1, 0),
(208, 'Carolina Palermo', 'Szcus', 50614, 1157210, '1980-03-01', '1980-03-01', '0000-00-00', NULL, NULL, NULL, 2, 35, 17, 4, 17, 1, 0),
(209, 'Hugo Moreira', 'Soares', 120728, 1226311, '1997-06-23', '1997-06-23', '1957-01-10', NULL, NULL, NULL, 6, 9, 14, 4, 14, 1, 0),
(210, 'Humberto Jorge', 'José', 50240, 1157191, '1980-03-01', '1980-03-01', '1952-08-07', NULL, NULL, NULL, 6, 35, 14, 4, 14, 1, 0),
(211, 'João Borges', 'Laurindo', 85671, 1158920, '1986-01-21', '1986-01-21', '1961-12-04', NULL, NULL, NULL, 6, 1, 14, 4, 14, 1, 0),
(212, 'José Antônio Ribeiro de', 'Souza', 74017, 1158343, '1984-03-08', '1984-03-08', '1954-01-08', NULL, NULL, NULL, 6, 5, 14, 4, 14, 1, 0),
(213, 'José Antônio', 'Mossmann', 102460, 1159606, '1991-07-22', '1991-07-22', '1956-11-07', NULL, NULL, NULL, 6, 5, 8, 3, 8, 1, 0),
(214, 'José Carlos Cunha', 'Petrus', 73991, 1158341, '1984-03-19', '1984-03-19', '1957-05-11', NULL, NULL, NULL, 6, 1, 13, 4, 13, 1, 0),
(215, 'José Miguel', 'Müller', 135385, 1490932, '2005-04-06', '2005-04-06', '1962-12-01', NULL, NULL, NULL, 6, 9, 10, 4, 10, 1, 0),
(216, 'Julian', 'Martinez', 136780, 1522405, '2006-02-08', '2006-02-08', '1976-03-05', NULL, NULL, NULL, 6, 9, 10, 4, 10, 1, 0),
(217, 'Luismar Marques', 'Porto', 64437, 1157916, '1982-08-16', '1982-08-16', '1958-05-13', NULL, NULL, NULL, 6, 1, 13, 4, 13, 1, 0),
(218, 'Mara Gabriela Novy ', 'Quadri', 111397, 1160172, '1994-10-24', '1994-10-24', '1955-12-06', NULL, NULL, NULL, 6, 9, 14, 4, 14, 1, 0),
(219, 'Marintho Bastos', 'Quadri', 74009, 1158342, '1984-02-21', '1984-02-21', '1959-05-10', NULL, NULL, NULL, 6, 1, 14, 4, 14, 1, 0),
(220, 'Pedro Henrique Hermes de', 'Araújo', 131223, 1412747, '2003-06-02', '2003-06-02', '1969-07-08', NULL, NULL, NULL, 6, 9, 11, 4, 11, 1, 0),
(221, 'Regina de Fátima Peralta Muniz', 'Moreira', 68629, 1158119, '1983-03-09', '1983-03-09', '1960-11-11', NULL, NULL, NULL, 6, 1, 14, 4, 14, 1, 0),
(222, 'Sandra Regina Salvador', 'Ferreira', 120833, 2205311, '1997-07-01', '1997-07-01', '1965-03-27', NULL, NULL, NULL, 6, 9, 14, 4, 14, 1, 0),
(223, 'Selene MAria de Arruda Guelli Ulson de', 'Souza', 85680, 1158921, '1986-01-21', '1986-01-21', '1960-05-05', NULL, NULL, NULL, 6, 1, 14, 4, 14, 1, 0),
(224, 'Leonel Teixeira', 'Pinto', 59751, 1157703, '1982-02-01', '1982-02-01', '1945-10-19', NULL, NULL, NULL, 6, 1, 13, 4, 13, 1, 0),
(225, 'Nivaldo Cabral', 'Kuhnen', 102193, 1159589, '1991-04-01', '1991-04-01', '1948-01-28', NULL, NULL, NULL, 6, 9, 17, 4, 17, 1, 0),
(226, 'Ricardo Antônio Francisco', 'Machado', 119835, 1214944, '1996-12-06', '1996-12-06', '1967-07-13', NULL, NULL, NULL, 6, 5, 13, 4, 13, 1, 0),
(227, 'Jorge Luiz', 'Ninow', 41119, 1156700, '1978-08-11', '1978-08-11', '1952-05-18', NULL, NULL, NULL, 6, 35, 17, 4, 17, 1, 0),
(228, 'Antônio Carlos Ribeiro', 'Nogueira', 61616, 1157799, '1982-04-01', '1982-04-01', '1949-12-02', NULL, NULL, NULL, 9, 5, 14, 4, 14, 1, 0),
(229, 'Altamir', 'Dias', 59743, 1157702, '1982-02-01', '1982-02-01', '1954-08-06', NULL, NULL, NULL, 9, 5, 14, 4, 14, 1, 0),
(230, 'Abelardo Alves de', 'Queiroz', 97980, 1159381, '1974-03-08', '1974-03-08', '1945-07-23', NULL, NULL, NULL, 9, 57, 17, 4, 17, 1, 0),
(231, 'Alcides', 'Dias', 74025, 1158344, '1984-03-12', '1984-03-12', '1952-01-17', NULL, NULL, NULL, 9, 5, 14, 4, 14, 1, 0),
(232, 'Alexandre', 'Lago', 100476, 1159507, '1990-01-08', '1990-01-08', '1954-01-13', NULL, NULL, NULL, 9, 9, 13, 4, 13, 1, 0),
(233, 'Álvaro Toubes', 'Prata', 40953, 1156697, '1978-08-01', '1978-08-01', '1955-09-24', NULL, NULL, NULL, 9, 35, 17, 4, 17, 1, 0),
(234, 'Amir Antônio Martins de Oliveira', 'Júnior', 123883, 1311947, '2000-02-02', '2000-02-02', '1968-06-05', NULL, NULL, NULL, 9, 9, 10, 4, 10, 1, 0),
(235, 'André', 'Ogliari', 116801, 1160645, '1995-08-01', '1995-08-01', '1962-11-20', NULL, NULL, NULL, 9, 5, 13, 4, 13, 1, 0),
(236, 'Antônio Fábio Carvalho da', 'Silva', 58100, 1157643, '1981-01-08', '1981-01-08', '1954-04-14', NULL, NULL, NULL, 9, 5, 14, 4, 14, 1, 0),
(237, 'Antônio Pedro Novaes de', 'Oliveira', 136268, 2158795, '2006-01-23', '2006-01-23', '1960-11-04', NULL, NULL, NULL, 9, 9, 10, 4, 10, 1, 0),
(238, 'Arcanjo ', 'Lenzi', 31989, 1156299, '1977-02-15', '1977-02-15', '1954-09-05', NULL, NULL, NULL, 9, 57, 17, 4, 17, 1, 0),
(239, 'Armando Albertazzi Gonçalves', 'Júnior', 91400, 1159139, '1987-06-04', '1987-06-04', '1959-06-16', NULL, NULL, NULL, 9, 5, 14, 4, 14, 1, 0),
(240, 'Augusto José de Almeida', 'Buschinelli', 46757, 1156996, '1980-02-01', '1980-02-01', '1945-10-10', NULL, NULL, NULL, 9, 35, 17, 4, 17, 1, 0),
(241, 'Carlos Alberto', 'Flesch', 63260, 1157863, '1982-08-02', '1982-08-02', '1956-10-22', NULL, NULL, NULL, 9, 1, 14, 4, 14, 1, 0),
(242, 'Carlos Alberto', 'Martin', 103327, 1159651, '1991-12-12', '1991-12-12', '1952-08-15', NULL, NULL, NULL, 9, 9, 12, 4, 12, 1, 0),
(243, 'Carlos Alberto', 'Schneider', 31539, 1156278, '1976-07-21', '1976-07-21', '1949-06-09', NULL, NULL, NULL, 9, 57, 17, 4, 17, 1, 0),
(244, 'Carlos Augusto Silva de', 'Oliveira', 118995, 1202730, '1996-07-02', '1996-07-02', '1956-04-06', NULL, NULL, NULL, 9, 5, 14, 4, 14, 1, 0),
(245, 'Carlos Enrique Nino', 'Bohorquez', 114213, 1160433, '1995-02-01', '1995-02-01', '1957-05-15', NULL, NULL, NULL, 9, 5, 9, 4, 9, 1, 0),
(246, 'Carlos Henrique', 'Ahrens', 117107, 1176149, '1995-09-01', '1995-09-01', '1958-06-14', NULL, NULL, NULL, 9, 9, 14, 4, 14, 1, 0),
(247, 'César José', 'Deschamps', 111044, 1160147, '1994-09-09', '1994-09-09', '1961-11-11', NULL, NULL, NULL, 9, 5, 14, 4, 14, 1, 0),
(248, 'Cláudio', 'Melo', 45866, 1156952, '1979-08-01', '1979-08-01', '1955-05-08', NULL, NULL, NULL, 9, 35, 17, 4, 17, 1, 0),
(249, 'Clóvis Raimundo', 'Maliska', 19024, 1155679, '1974-04-27', '1974-04-27', '1950-05-03', NULL, NULL, NULL, 9, 57, 17, 4, 17, 1, 0),
(250, 'Daniel', 'Martins', 140117, 2171783, '1995-09-25', '2008-02-07', '1969-04-06', NULL, NULL, NULL, 9, 10, 12, 4, 12, 1, 0),
(251, 'Dylton do Vale Pereira', 'Filho', 40988, 1169580, '1978-08-01', '1978-08-01', '1954-01-25', NULL, NULL, NULL, 9, 35, 12, 3, 12, 1, 0),
(252, 'Edison da', 'Rosa', 27124, 1156057, '1976-03-23', '1976-03-23', '1950-04-28', NULL, NULL, NULL, 9, 57, 17, 4, 17, 1, 0),
(253, 'Edson', 'Bazzo', 29496, 1156178, '1976-07-15', '1976-07-15', '1952-05-18', NULL, NULL, NULL, 9, 57, 14, 4, 14, 1, 0),
(254, 'Eduardo Alberto', 'Fancello', 111834, 1160209, '1994-09-21', '1994-09-21', '1964-03-08', NULL, NULL, NULL, 9, 5, 13, 4, 13, 1, 0),
(255, 'Fernando', 'Kabral', 19679, 1155706, '1976-06-01', '1976-06-01', '1950-09-07', NULL, NULL, NULL, 9, 57, 17, 4, 17, 1, 0),
(256, 'Gean Vitor', 'Salmoria', 129890, 1363373, '2002-10-11', '2002-10-11', '1970-02-27', NULL, NULL, NULL, 9, 9, 11, 4, 11, 1, 0),
(257, 'Irlan Von', 'Linsingem', 26799, 1156039, '1975-11-12', '1975-11-12', '1949-05-04', NULL, NULL, NULL, 9, 57, 13, 4, 13, 1, 0),
(258, 'Jader Riso Barbosa', 'Júnior', 134575, 1461054, '2004-08-04', '2004-08-04', '1973-08-16', NULL, NULL, NULL, 9, 9, 11, 4, 11, 1, 0),
(259, 'Jair Carlos', 'Dutra', 21916, 1155828, '1974-03-04', '1974-03-04', '1949-08-31', NULL, NULL, NULL, 9, 57, 17, 4, 17, 1, 0),
(260, 'João Carlos Espindola', 'Ferreira', 107080, 1159885, '1993-09-10', '1993-09-10', '1962-12-30', NULL, NULL, NULL, 9, 5, 14, 4, 14, 1, 0),
(261, 'Jonny Carlos da', 'Silva', 107861, 1159943, '1993-11-03', '1993-11-03', '1965-07-04', NULL, NULL, NULL, 9, 5, 14, 4, 14, 1, 0),
(262, 'José Antônio Bellini da Cunha', 'Neto', 59760, 1157704, '1982-03-01', '1982-03-01', '1953-07-02', NULL, NULL, NULL, 9, 5, 13, 4, 13, 1, 0),
(263, 'José Carlos', 'Pereira', 122445, 1286762, '1998-08-03', '1998-08-03', '1963-04-26', NULL, NULL, NULL, 9, 9, 14, 4, 14, 1, 0),
(264, 'Lauro César', 'Nicolazzi', 40333, 1156668, '1978-08-01', '1978-08-01', '1954-01-18', NULL, NULL, NULL, 9, 35, 14, 4, 14, 1, 0),
(265, 'Lourival', 'Boehs', 29453, 1156177, '1976-07-15', '1976-07-15', '1949-08-20', NULL, NULL, NULL, 9, 57, 17, 4, 17, 1, 0),
(266, 'Luiz Teixeira do Vale', 'Pereira', 31679, 1156283, '1976-12-27', '1976-12-27', '1953-02-25', NULL, NULL, NULL, 9, 35, 12, 3, 12, 1, 0),
(267, 'Marcelo Krajnc', 'Alves', 111516, 667462, '1994-11-03', '1994-11-03', '1958-09-26', NULL, NULL, NULL, 9, 9, 13, 4, 13, 1, 0),
(268, 'Márcia Barbosa Henriques', 'Matelli', 123123, 664649, '1999-04-20', '1999-04-20', '1959-12-24', NULL, NULL, NULL, 9, 9, 13, 4, 13, 1, 0),
(269, 'Marco Antônio Martins', 'Cavaco', 120280, 1221170, '1997-04-03', '1997-04-03', '1961-05-29', NULL, NULL, NULL, 9, 9, 14, 4, 14, 1, 0),
(270, 'Narciso Angel Ramos', 'Arroyo', 36050, 1156475, '1977-08-01', '1977-08-01', '1945-10-31', NULL, NULL, NULL, 9, 57, 12, 4, 12, 1, 0),
(271, 'Paulo de Tarso Rocha de ', 'Mendonça', 73932, 1158339, '1984-03-27', '1984-03-27', '1958-05-04', NULL, NULL, NULL, 9, 5, 13, 4, 13, 1, 0),
(272, 'Paulo Antônio Pereira', 'Wendhausen', 122364, 1284594, '1998-07-10', '1998-07-10', '1963-07-07', NULL, NULL, NULL, 9, 9, 13, 4, 13, 1, 0),
(273, 'Paulo César', 'Philippi', 24796, 1155953, '1975-04-02', '1975-04-02', '1951-01-11', NULL, NULL, NULL, 9, 57, 17, 4, 17, 1, 0),
(274, 'Pedro Amedeo Nanneti', 'Bernardini', 106717, 1159853, '1993-09-01', '1993-09-01', '1959-01-29', NULL, NULL, NULL, 9, 9, 10, 4, 10, 1, 0),
(275, 'Roberto', 'Jordan', 54792, 1157457, '1980-08-01', '1980-08-01', '1955-04-03', NULL, NULL, NULL, 9, 35, 14, 4, 14, 1, 0),
(276, 'Roberto Muller ', 'Heidrich', 24788, 1155952, '1975-04-02', '1975-04-02', '1951-03-30', NULL, NULL, NULL, 9, 57, 12, 3, 12, 1, 0),
(277, 'Rolf Bertrand', 'Schroeter', 121171, 1249510, '1997-10-31', '1997-10-31', '1961-09-03', NULL, NULL, NULL, 9, 9, 14, 4, 14, 1, 0),
(278, 'Samir Nagi Yousri', 'Gerges', 41330, 1156712, '1978-11-13', '1978-11-13', '1941-04-10', NULL, NULL, NULL, 9, 17, 17, 4, 17, 1, 0),
(279, 'Sérgio', 'Colle', 22190, 1155849, '1974-03-08', '1974-03-08', '1946-02-04', NULL, NULL, NULL, 9, 57, 17, 4, 17, 1, 0),
(280, 'Sérgio Luiz', 'Gargioni', 19717, 671252, '1972-03-01', '1972-03-01', '1948-10-31', NULL, NULL, NULL, 9, 57, 12, 3, 12, 1, 0),
(281, 'Vicente de Paulo', 'Nicolau', 50550, 1157206, '1980-03-01', '1980-03-01', '1954-09-25', NULL, NULL, NULL, 9, 35, 14, 4, 14, 1, 0),
(282, 'Victor Juliano de', 'Negri', 116224, 1160598, '1995-06-27', '1995-06-27', '1960-09-15', NULL, NULL, NULL, 9, 5, 14, 4, 14, 1, 0),
(283, 'Walter Antônio', 'Bazzo', 37871, 1156539, '1978-01-02', '1978-01-02', '1953-01-02', NULL, NULL, NULL, 9, 35, 14, 4, 14, 1, 0),
(284, 'Walter Lindolfo', 'Weingaertner', 31806, 1156291, '1977-01-03', '1977-01-03', '1951-05-09', NULL, NULL, NULL, 9, 35, 17, 4, 17, 1, 0),
(285, 'Antônio Augusto Rodrigues', 'Coelho', 108159, 326657, '1980-02-01', '1993-12-01', '1957-01-04', NULL, NULL, NULL, 3, 13, 14, 4, 14, 1, 0),
(286, 'Alexandre Trofino', 'Neto', 85663, 1158919, '1985-12-30', '1985-12-30', '1958-12-04', NULL, NULL, NULL, 3, 5, 17, 4, 17, 1, 0),
(287, 'Augusto Humberto', 'Bruciapaglia', 81935, 1158714, '1985-08-08', '1985-08-08', '1949-11-09', NULL, NULL, NULL, 3, 9, 17, 4, 17, 1, 0),
(288, 'Carlos Barros', 'Montez', 126300, 1365090, '2002-11-27', '2002-11-27', '1962-08-26', NULL, NULL, NULL, 3, 9, 12, 4, 12, 1, 0),
(289, 'Daniel Juan', 'Pagano', 105338, 1159764, '1993-01-07', '1993-01-07', '1961-05-13', NULL, NULL, NULL, 3, 5, 13, 4, 13, 1, 0),
(290, 'Edson Roberto di', 'Pieri', 104781, 1159736, '1992-08-24', '1992-08-24', '1960-05-30', NULL, NULL, NULL, 3, 9, 14, 4, 14, 1, 0),
(291, 'Eduardo', 'Camponogara', 125363, 1351113, '2002-06-03', '2002-06-03', '1970-09-10', NULL, NULL, NULL, 3, 9, 12, 4, 12, 1, 0),
(292, 'Eugenio de Bona Castelan', 'Neto', 105087, 1159752, '1992-11-23', '1992-11-23', '1959-10-14', NULL, NULL, NULL, 3, 5, 14, 4, 14, 1, 0),
(293, 'Joni da Silva ', 'Fraga', 32250, 1156315, '1977-04-01', '1977-04-01', '1950-11-26', NULL, NULL, NULL, 3, 35, 17, 5, 17, 1, 0),
(294, 'José Eduardo Ribeiro', 'Cury', 100255, 1159490, '1990-01-16', '1990-01-16', '1952-06-21', NULL, NULL, NULL, 3, 5, 17, 5, 17, 1, 0),
(295, 'Júlio Elias Normey', 'Rico', 103521, 1159660, '1992-01-15', '1992-01-15', '1962-10-04', NULL, NULL, NULL, 3, 5, 14, 4, 14, 1, 0),
(296, 'Leandro Buss', 'Becker', 134427, 1459450, '2004-07-14', '2004-07-14', '1976-03-20', NULL, NULL, NULL, 3, 9, 11, 4, 11, 1, 0),
(297, 'Marcelo Ricardo', 'Stemmer', 104773, 1159735, '1992-08-28', '1992-08-28', '1960-04-03', NULL, NULL, NULL, 3, 9, 14, 5, 14, 1, 0),
(298, 'Max Hering de', 'Queiroz', 136330, 1450198, '2006-01-26', '2006-01-26', '1975-06-06', NULL, NULL, NULL, 3, 9, 10, 4, 10, 1, 0),
(299, 'Nestor ', 'Roqueiro', 120981, 366041, '1990-12-10', '1997-08-11', '1960-12-24', NULL, NULL, NULL, 3, 11, 14, 5, 14, 1, 0),
(300, 'Ricardo José', 'Rabelo', 123832, 1310971, '2000-01-26', '2000-01-26', '1963-09-14', NULL, NULL, NULL, 3, 9, 13, 4, 13, 1, 0),
(301, 'Rômulo Silva de', 'Oliveira', 123816, 353135, '2000-01-21', '2000-01-21', '1962-08-05', NULL, NULL, NULL, 3, 9, 13, 4, 13, 1, 0),
(302, 'Ubirajara Franco', 'Moreno', 134176, 1457450, '2004-06-25', '2004-06-25', '1971-02-07', NULL, NULL, NULL, 3, 9, 11, 4, 11, 1, 0),
(303, 'Werner Kraus', 'Júnior', 123786, 2292049, '2000-01-17', '2000-01-17', '1964-12-31', NULL, NULL, NULL, 3, 9, 13, 5, 13, 1, 0),
(304, 'Aline França de', 'Abreu', 76060, 1158413, '1984-10-16', '1984-10-16', '1960-03-21', NULL, NULL, NULL, 4, 1, 13, 4, 13, 1, 0),
(305, 'Alvaro Guilhermo Rojas', 'Lezana', 69617, 1158165, '1983-03-24', '1983-03-24', '1954-12-08', NULL, NULL, NULL, 4, 5, 14, 4, 14, 1, 0),
(306, 'Antônio César', 'Bornia', 103866, 1159687, '1992-03-26', '1992-03-26', '1964-03-05', NULL, NULL, NULL, 4, 5, 14, 4, 14, 1, 0),
(307, 'Antônio Sérgio ', 'Coelho', 72421, 1158291, '1983-08-16', '1983-08-16', '1957-03-11', NULL, NULL, NULL, 4, 5, 14, 4, 14, 1, 0),
(308, 'Carlos Manoel Taboada', 'Rodriguez', 123182, 1299318, '1999-05-03', '1999-05-03', '1947-04-19', NULL, NULL, NULL, 4, 9, 12, 4, 12, 1, 0),
(309, 'Dálvio Ferrari', 'Tubino', 50509, 1157204, '1980-03-07', '1980-03-07', '1954-09-03', NULL, NULL, NULL, 4, 35, 14, 4, 14, 1, 0),
(310, 'Edson Pacheco', 'Paladini', 61632, 1157801, '1977-03-01', '1977-03-01', '1954-03-10', NULL, NULL, NULL, 4, 35, 17, 4, 17, 1, 0),
(311, 'Emílio Araújo', 'Menezes', 31229, 1156262, '1976-08-02', '1976-08-02', '1949-08-03', NULL, NULL, NULL, 4, 57, 14, 5, 14, 1, 0),
(312, 'Jaime', 'Bau', 34660, 1156420, '1977-03-01', '1977-03-01', '1950-09-14', NULL, NULL, NULL, 4, 57, 12, 4, 12, 1, 0),
(313, 'João Neiva de', 'Figueiredo', 125193, 1350147, '2002-04-26', '2002-04-26', '1953-06-09', NULL, NULL, NULL, 4, 9, 11, 4, 11, 1, 0),
(314, 'João Ernesto Escosteguy', 'Castro', 39424, 1156619, '1978-03-01', '1978-03-01', '1952-10-20', NULL, NULL, NULL, 4, 35, 12, 3, 12, 1, 0),
(315, 'Leila Amaral', 'Gontijo', 107950, 1159950, '1993-11-16', '1993-11-16', '1953-11-10', NULL, NULL, NULL, 4, 9, 13, 5, 13, 1, 0),
(316, 'Leonardo', 'Ensslin', 107721, 1159934, '1993-10-27', '1993-10-27', '1943-05-31', NULL, NULL, NULL, 4, 17, 17, 5, 17, 1, 0),
(317, 'Luiz Fernando Mohmann', 'Heineck', 98900, 1159423, '1989-03-03', '1989-03-03', '1954-02-02', NULL, NULL, NULL, 4, 17, 17, 4, 17, 1, 0),
(318, 'Marcos Ottoni de', 'Almeida', 50606, 1157209, '1980-03-01', '1980-03-01', '1948-01-20', NULL, NULL, NULL, 4, 35, 12, 3, 12, 1, 0),
(319, 'Mirna de', 'Borba', 45050, 1156906, '1979-08-01', '1979-08-01', '1954-09-09', NULL, NULL, NULL, 4, 35, 12, 3, 12, 1, 0),
(320, 'Myriam Eugênia Ramalho Prata', 'Barbejat', 139437, 311162, '1991-09-12', '2003-01-01', '1958-09-27', NULL, NULL, NULL, 4, 1, 12, 4, 12, 1, 0),
(321, 'Mônica Maria Mendes', 'Luna', 137515, 145269, '2004-04-27', '2006-06-06', '1968-05-08', NULL, NULL, NULL, 4, 9, 11, 4, 11, 1, 0),
(322, 'Nelson Casarotto', 'Filho', 40996, 1156698, '1978-08-11', '1978-08-11', '1953-02-12', NULL, NULL, NULL, 4, 35, 14, 4, 14, 1, 0),
(323, 'Olga Regina', 'Cardoso', 82680, 1158754, '1985-09-02', '1985-09-02', '1954-07-22', NULL, NULL, NULL, 4, 1, 13, 4, 13, 1, 0),
(324, 'Osmar', 'Possamai', 76303, 1158418, '1984-12-07', '1984-12-07', '1960-06-20', NULL, NULL, NULL, 4, 1, 14, 4, 14, 1, 0),
(325, 'Paulo Renécio', 'Nascimento', 41356, 1156713, '1978-10-01', '1978-10-01', '1944-01-27', NULL, NULL, NULL, 4, 35, 12, 3, 12, 1, 0),
(326, 'Ricardo Miranda', 'Barcia', 31644, 1156281, '1977-01-01', '1977-01-01', '1952-09-19', NULL, NULL, NULL, 4, 35, 17, 4, 17, 1, 0),
(327, 'Robert Wayne', 'Samohyl', 76648, 1158435, '1978-12-01', '1978-12-01', '1947-12-05', NULL, NULL, NULL, 4, 35, 17, 5, 17, 1, 0),
(328, 'Sérgio Fernando', 'Mayerle', 54318, 1157429, '1980-06-16', '1980-06-16', '1957-04-13', NULL, NULL, NULL, 4, 35, 13, 4, 13, 1, 0),
(329, 'Vera Lúcia Duarte do Valle', 'Pereira', 26454, 1156026, '1975-09-17', '1975-09-17', '1943-03-17', NULL, NULL, NULL, 4, 57, 14, 4, 14, 1, 0),
(330, 'Armando Borges de Castilhos', 'Júnior', 104170, 1159703, '1992-04-29', '1992-04-29', '1957-06-26', NULL, NULL, NULL, 5, 9, 14, 5, 14, 1, 0),
(331, 'César Augusto', 'Pompêo', 87160, 1158998, '1986-06-10', '1986-06-10', '1954-07-01', NULL, NULL, NULL, 5, 1, 14, 4, 14, 1, 0),
(332, 'Daniel José da', 'Silva', 43952, 1156856, '1979-04-02', '1979-04-02', '1950-08-17', NULL, NULL, NULL, 5, 35, 12, 4, 12, 1, 0),
(333, 'Davide', 'Franco', 134800, 2305752, '2004-08-23', '2004-08-23', '1960-08-20', NULL, NULL, NULL, 5, 9, 11, 4, 11, 1, 0),
(334, 'Eloi Melo', 'Filho', 114736, 1124224, '1993-01-21', '1995-06-20', '1953-02-10', NULL, NULL, NULL, 5, 9, 13, 5, 13, 1, 0),
(335, 'Fernando Soares Pinto', 'Sant''ana', 63279, 1157864, '1982-07-19', '1982-07-19', '1955-05-15', NULL, NULL, NULL, 5, 5, 14, 4, 14, 1, 0),
(336, 'Flávio Rubens', 'Lapolli', 54342, 1157430, '1980-03-21', '1980-03-21', '1952-12-02', NULL, NULL, NULL, 5, 35, 14, 4, 14, 1, 0),
(337, 'Guilherme Farias', 'Cunha', 35518, 1156451, '1977-06-01', '1977-06-01', '1950-05-25', NULL, NULL, NULL, 5, 57, 12, 2, 12, 1, 0),
(338, 'Henrique de Melo', 'Lisboa', 60318, 1157739, '1982-03-01', '1982-03-01', '1958-10-09', NULL, NULL, NULL, 5, 1, 14, 4, 14, 1, 0),
(339, 'Henry Xavier', 'Courseuil', 77750, 1158498, '1985-04-09', '1985-04-09', '1957-09-27', NULL, NULL, NULL, 5, 1, 14, 4, 14, 1, 0),
(340, 'Luiz Sérgio', 'Philippi', 31652, 1156282, '1977-01-01', '1977-01-01', '1951-10-15', NULL, NULL, NULL, 5, 35, 17, 4, 17, 1, 0),
(341, 'Masato', 'Kobiyana', 125169, 1206004, '1996-08-13', '1996-08-13', '1962-03-02', NULL, NULL, NULL, 5, 5, 14, 4, 14, 1, 0),
(342, 'Maurício Luiz', 'Senz', 74971, 1158376, '1984-05-07', '1984-05-07', '1957-03-28', NULL, NULL, NULL, 5, 1, 17, 5, 17, 1, 0),
(343, 'Paulo Belli', 'Filho', 84241, 1158826, '1985-12-30', '1985-12-30', '1957-10-22', NULL, NULL, NULL, 5, 1, 14, 5, 14, 1, 0),
(344, 'Pericles Alves', 'Medeiros', 119606, 1210112, '1996-10-01', '1996-10-01', '1951-07-28', NULL, NULL, NULL, 5, 5, 14, 4, 14, 1, 0),
(345, 'Peter Batista', 'Cheung', 138686, 1507975, '2007-03-16', '2007-03-16', '1975-12-29', NULL, NULL, NULL, 5, 9, 10, 4, 10, 1, 0),
(346, 'Ramon Lucas', 'Dalsasso', 1338805, 3169875, '2007-05-02', '2007-05-02', '1962-10-18', NULL, NULL, NULL, 5, 9, 10, 4, 10, 1, 0),
(347, 'Rejane Helena Ribeiro da', 'Costa', 50533, 1157205, '1980-03-01', '1980-03-01', '1953-02-25', NULL, NULL, NULL, 5, 35, 17, 5, 17, 1, 0),
(348, 'William Gerson', 'Matias', 125690, 2297585, '2002-07-30', '2002-07-30', '1959-09-13', NULL, NULL, NULL, 5, 9, 12, 5, 12, 1, 0),
(349, 'Arício', 'Treitinger', 38371, 1156563, '1978-03-01', '1978-03-01', '1954-02-14', NULL, NULL, NULL, 28, 35, 17, 4, 17, 1, 0),
(350, 'Berenice Pagani', 'Nappi', 111206, 1160158, '1994-10-05', '1994-10-05', '1958-06-09', NULL, NULL, NULL, 28, 1, 5, 3, 5, 1, 0),
(351, 'Celso', 'Spada', 104811, 576583, '1992-08-31', '1992-08-31', '1964-09-29', NULL, NULL, NULL, 28, 5, 14, 4, 14, 1, 0),
(352, 'Cidônia de Lourdes', 'Vituri', 104790, 1159737, '1992-08-24', '1992-08-24', '1955-07-11', NULL, NULL, NULL, 28, 5, 13, 4, 13, 1, 0),
(353, 'Cirena Lesniowski', 'Delgoro', 116992, 1169738, '1995-08-17', '1995-08-17', '1964-09-05', NULL, NULL, NULL, 28, 5, 11, 4, 11, 1, 0),
(354, 'Edson Luiz da', 'Silva', 120949, 1228516, '1997-08-05', '1997-08-05', '1964-02-27', NULL, NULL, NULL, 28, 9, 14, 5, 14, 1, 0),
(355, 'Flávia', 'Martinello', 138449, 2331977, '2007-03-12', '2007-03-12', '0000-00-00', NULL, NULL, NULL, 28, 9, 10, 4, 10, 1, 0),
(356, 'Geny Aparecida', 'Cantos', 108280, 393181, '1993-12-22', '1993-12-22', '1956-07-17', NULL, NULL, NULL, 28, 5, 14, 5, 14, 1, 0),
(357, 'Helena Cristina Ferreira Franz de', 'Vasconcellos', 118596, 1193885, '1996-04-03', '1996-04-03', '1964-10-25', NULL, NULL, NULL, 28, 5, 12, 4, 12, 1, 0),
(358, 'Jairo Ivo dos', 'Santos', 105664, 464812, '1993-03-04', '1993-03-04', '1958-09-10', NULL, NULL, NULL, 28, 5, 13, 4, 13, 1, 0),
(359, 'José Tadeu', 'Pinheiro', 56140, 1157543, '1980-11-10', '1980-11-10', '1945-08-22', NULL, NULL, NULL, 28, 35, 12, 1, 12, 1, 0),
(360, 'Lenilza Mattos', 'Lima', 45025, 1156903, '1979-08-01', '1979-08-01', '1954-01-13', NULL, NULL, NULL, 28, 35, 17, 3, 17, 1, 0),
(361, 'Liliete Canes', 'Souza', 120973, 1231556, '1997-08-25', '1997-08-25', '1965-11-21', NULL, NULL, NULL, 28, 9, 14, 5, 14, 1, 0),
(362, 'Lucy Maria Bez Birolo', 'Parucker', 122003, 2160669, '1998-04-13', '1998-04-13', '1951-11-04', NULL, NULL, NULL, 28, 5, 11, 4, 11, 1, 0),
(363, 'Luiz Alberto Peregrino', 'Ferreira', 83237, 1158777, '1985-11-01', '1985-11-01', '1955-07-01', NULL, NULL, NULL, 28, 1, 17, 4, 17, 1, 0),
(364, 'Marcos José', 'Machado', 104110, 1159702, '1992-05-05', '1992-05-05', '1962-02-09', NULL, NULL, NULL, 28, 5, 14, 4, 14, 1, 0),
(365, 'Maria Cláudia Santos da', 'Silva', 118324, 1191297, '1996-02-29', '1996-02-29', '1964-12-11', NULL, NULL, NULL, 28, 1, 12, 5, 12, 1, 0),
(366, 'Maria Luiza', 'Bazzo', 102096, 1159581, '1991-04-08', '1991-04-08', '1961-03-04', NULL, NULL, NULL, 28, 1, 10, 4, 10, 1, 0),
(367, 'Patrícia', 'Hass', 118332, 2160686, '1996-02-29', '1996-02-29', '1971-12-20', NULL, NULL, NULL, 28, 1, 10, 4, 10, 1, 0),
(368, 'Raquel Maria', 'Teixeira', 118391, 1191473, '1996-03-07', '1996-03-07', '1959-01-16', NULL, NULL, NULL, 28, 5, 12, 4, 12, 1, 0),
(369, 'Roberto Ferreira de ', 'Melo', 112059, 1160230, '1994-12-27', '1994-12-27', '1967-03-25', NULL, NULL, NULL, 28, 5, 9, 4, 9, 1, 0),
(370, 'Tânia Silva', 'Frode', 99060, 1159428, '1989-06-02', '1989-06-02', '1960-12-05', NULL, NULL, NULL, 28, 1, 13, 4, 13, 1, 0),
(371, 'Terezinha de Jesus Carvalho', 'Neiva', 104528, 1159725, '1992-08-06', '1992-08-06', '1957-12-05', NULL, NULL, NULL, 28, 5, 14, 4, 14, 1, 0),
(372, 'Ana Lúcia Gomes dos', 'Santos', 122402, 1191180, '1998-07-17', '1998-07-17', '1969-06-17', NULL, NULL, NULL, 30, 5, 10, 4, 10, 1, 0),
(373, 'Ângela Machado de', 'Campos', 122410, 1285110, '1998-07-14', '1998-07-14', '1961-01-12', NULL, NULL, NULL, 30, 5, 11, 4, 11, 1, 0);
INSERT INTO `professor` (`id_professor`, `nome`, `sobrenome`, `matricula`, `siape`, `data_admissao`, `data_admissao_ufsc`, `data_nascimento`, `aposentado`, `data_previsao_aposentadoria`, `data_aposentadoria`, `id_departamento`, `id_categoria_funcional_inicial`, `id_categoria_funcional_atual`, `id_tipo_titulacao`, `id_categoria_funcional_referencia`, `id_cargo`, `id_situacao`) VALUES
(374, 'Célia Maria Teixeira de', 'Campos', 109473, 1160054, '1994-02-11', '1994-02-11', '1964-12-07', NULL, NULL, NULL, 30, 5, 12, 4, 12, 1, 0),
(375, 'Cláudia Maria Oliveira', 'Simões', 87046, 1158989, '1986-06-04', '1986-06-04', '1958-02-13', NULL, NULL, NULL, 30, 1, 17, 4, 17, 1, 0),
(376, 'Diva ', 'Sonaglio', 100077, 1159476, '1989-11-16', '1989-11-16', '1959-05-19', NULL, NULL, NULL, 30, 5, 13, 4, 13, 1, 0),
(377, 'Elenara Maria Teixeira Lemos', 'Senna', 121996, 1279792, '1998-04-13', '1998-04-13', '1965-10-31', NULL, NULL, NULL, 30, 5, 14, 4, 14, 1, 0),
(379, 'Eliana Elisabeth', 'Diehl', 102240, 1159593, '1991-05-10', '1991-05-10', '1963-04-10', NULL, NULL, NULL, 30, 1, 13, 4, 13, 1, 0),
(380, 'Eloir Paulo', 'Schenkel', 124804, 352168, '1980-09-01', '2001-05-30', '1950-11-01', NULL, NULL, NULL, 30, 5, 17, 4, 17, 1, 0),
(381, 'Flávio Henrique', 'Regionato', 138619, 1567513, '2007-03-12', '2007-03-12', '1970-09-09', NULL, NULL, NULL, 30, 9, 10, 4, 10, 1, 0),
(382, 'Luciana Maria', 'Kerger', 111796, 1160205, '1994-12-15', '1994-12-15', '1960-05-14', NULL, NULL, NULL, 30, 5, 6, 3, 6, 1, 0),
(383, 'Marcos Antônio Segatto', 'Silva', 123042, 379563, '1999-04-15', '1999-04-15', '1966-02-08', NULL, NULL, NULL, 30, 9, 14, 4, 14, 1, 0),
(384, 'Mareni Rocha', 'Farias', 103840, 1159685, '1992-03-16', '1992-03-16', '1960-12-22', NULL, NULL, NULL, 30, 5, 13, 4, 13, 1, 0),
(385, 'Miriam Barcellos', 'Falkenberg', 117220, 1176296, '1995-09-15', '1995-09-15', '1961-12-18', NULL, NULL, NULL, 30, 5, 14, 4, 14, 1, 0),
(386, 'Norberto', 'Rech', 83119, 1158773, '1985-10-15', '1985-10-15', '1960-12-18', NULL, NULL, NULL, 30, 1, 8, 3, 8, 1, 0),
(387, 'Rosana Isabel dos', 'Santos', 110927, 356642, '1994-08-26', '1994-08-26', '1959-05-11', NULL, NULL, NULL, 30, 5, 6, 3, 6, 1, 0),
(388, 'Rosane Maria', 'Budal', 84420, 1158832, '1985-12-30', '1985-12-30', '1957-01-24', NULL, NULL, NULL, 30, 1, 13, 4, 13, 1, 0),
(389, 'Simone Gonçalves', 'Cardoso', 138767, 379686, '1991-03-06', '2007-03-13', '1964-12-22', NULL, NULL, NULL, 30, 1, 13, 4, 13, 1, 0),
(390, 'Tânia Beatriz Creczynski', 'Pasa', 117280, 1176223, '1995-10-02', '1995-10-02', '1962-03-11', NULL, NULL, NULL, 30, 5, 14, 4, 14, 1, 0),
(391, 'Valdecir Maria', 'Laura', 123905, 2220265, '2000-02-07', '2000-02-07', '1970-04-06', NULL, NULL, NULL, 30, 5, 6, 3, 6, 1, 0),
(392, 'Ari Digiácomo Ocampo', 'Moré', 73517, 574008, '1984-03-12', '1984-03-12', '1953-07-30', NULL, NULL, NULL, 32, 1, 14, 5, 14, 1, 0),
(393, 'Augusto Adam', 'Netto', 74459, 1158358, '1984-04-02', '1984-04-02', '1953-12-28', NULL, NULL, NULL, 32, 9, 17, 4, 17, 1, 0),
(394, 'Carlos Alberto Justo da', 'Silva', 52820, 574009, '1980-04-15', '1980-04-15', '1954-09-24', NULL, NULL, NULL, 32, 35, 14, 4, 14, 1, 0),
(395, 'Celso Luiz', 'Empinotti', 89332, 1169692, '1986-12-19', '1986-12-19', '1956-04-21', NULL, NULL, NULL, 32, 1, 12, 2, 12, 1, 0),
(396, 'Edevard José de', 'Araújo', 134818, 575927, '2004-09-02', '2004-09-02', '1954-08-25', NULL, NULL, NULL, 32, 9, 11, 4, 11, 1, 0),
(397, 'Edson José', 'Cardoso', 23471, 1155905, '1974-08-14', '1974-08-14', '1945-01-17', NULL, NULL, NULL, 32, 57, 17, 4, 17, 1, 0),
(398, 'Elício', 'Silva', 85809, 574013, '1986-03-01', '1986-03-01', '1953-02-07', NULL, NULL, NULL, 32, 1, 11, 4, 11, 1, 0),
(399, 'Felipe', 'Felício', 24281, 575214, '1974-08-14', '1974-08-14', '1944-04-21', NULL, NULL, NULL, 32, 57, 17, 2, 17, 1, 0),
(400, 'Gilberto do Nascimento', 'Galego', 111460, 1160179, '1994-10-19', '1994-10-19', '1965-01-27', NULL, NULL, NULL, 32, 5, 13, 4, 13, 1, 0),
(401, 'Jauro', 'Collaço', 21436, 1155809, '1973-08-13', '1973-08-13', '1945-10-13', NULL, NULL, NULL, 32, 57, 12, 1, 12, 1, 0),
(402, 'João Carlos Costa de ', 'Oliveira', 119355, 2159566, '1996-05-10', '1996-05-10', '1964-06-28', NULL, NULL, NULL, 32, 1, 9, 3, 9, 1, 0),
(403, 'João José de Deus ', 'Cardoso', 116879, 8574594, '1995-07-19', '1995-07-19', '1955-03-15', NULL, NULL, NULL, 32, 1, 12, 4, 12, 1, 0),
(404, 'Jorge Bins', 'Ely', 99052, 1159427, '1989-06-06', '1989-06-06', '1953-03-05', NULL, NULL, NULL, 32, 5, 14, 4, 14, 1, 0),
(405, 'José Mauro dos', 'Santos', 111478, 1160180, '1994-11-03', '1994-11-03', '1956-08-19', NULL, NULL, NULL, 32, 1, 13, 4, 13, 1, 0),
(406, 'Marcelo Bianchini', 'Teive', 44908, 575340, '1979-06-01', '1979-06-01', '1950-03-25', NULL, NULL, NULL, 32, 35, 12, 3, 12, 1, 0),
(407, 'Marcelo Neves', 'Linhares', 138317, 2368651, '2007-03-02', '2007-03-02', '1969-11-11', NULL, NULL, NULL, 32, 9, 10, 4, 10, 1, 0),
(408, 'Maria Cristina Simões de ', 'Almeida', 120531, 6576533, '1997-05-19', '1997-05-19', '1955-06-30', NULL, NULL, NULL, 32, 1, 13, 4, 13, 1, 0),
(409, 'Newton Macuco ', 'Capella', 85051, 2158138, '1985-12-30', '1985-12-30', '1953-11-23', NULL, NULL, NULL, 32, 1, 14, 4, 14, 1, 0),
(410, 'Nicolau Fernandes', 'Kruel', 116690, 574484, '1995-07-18', '1995-07-18', '1944-04-10', NULL, NULL, NULL, 32, 5, 13, 4, 13, 1, 0),
(411, 'Paulo Arlindo', 'Philippi', 39653, 1156629, '1978-04-19', '1978-04-19', '1942-07-24', NULL, NULL, NULL, 32, 35, 12, 2, 12, 1, 0),
(412, 'Paschoal Bernardino ', 'Felippe', 106393, 311134, '1993-07-30', '1993-07-30', '1959-12-28', NULL, NULL, NULL, 32, 17, 17, 4, 17, 1, 0),
(413, 'Pierre Galvagni', 'Silveira', 111443, 1160177, '1994-10-19', '1994-10-19', '1959-05-13', NULL, NULL, NULL, 32, 5, 14, 4, 14, 1, 0),
(414, 'Raul Chatagnier', 'Filho', 18346, 1155648, '1971-07-01', '1971-07-01', '1942-07-27', NULL, NULL, NULL, 32, 57, 17, 1, 17, 1, 0),
(415, 'Ricardo', 'Baratieri', 41186, 575810, '1978-08-14', '1978-08-14', '1952-01-24', NULL, NULL, NULL, 32, 35, 12, 2, 12, 1, 0),
(416, 'Rodrigo D''eça', 'Neves', 17838, 1155627, '1971-04-07', '1971-04-07', '1942-12-13', NULL, NULL, NULL, 32, 57, 17, 1, 17, 1, 0),
(417, 'Rogério Paulo', 'Moritz', 119169, 2158510, '1996-07-16', '1996-07-16', '1953-01-09', NULL, NULL, NULL, 32, 1, 13, 4, 13, 1, 0),
(418, 'Viriato João Leal da', 'Cunha', 111486, 576335, '1994-11-03', '1994-11-03', '1958-07-21', NULL, NULL, NULL, 32, 5, 8, 3, 8, 1, 0),
(419, 'Waldir Carreirão', 'Filho', 42913, 1156803, '1979-04-01', '1979-04-01', '1951-05-10', NULL, NULL, NULL, 32, 35, 12, 3, 12, 1, 0),
(420, 'Wilmar de Athayde', 'Gerent', 52277, 574208, '1980-04-15', '1980-04-15', '1954-01-24', NULL, NULL, NULL, 32, 35, 12, 2, 12, 1, 0),
(421, 'Zulmar Antônio Accioli de', 'Vasconcelos', 128982, 1359507, '2002-08-08', '2002-08-08', '1967-11-16', NULL, NULL, NULL, 32, 9, 10, 4, 10, 1, 0),
(422, 'Ana Maria Maykot Prates', 'Michels', 121910, 2169913, '1998-03-27', '1998-03-27', '1962-02-23', NULL, NULL, NULL, 34, 1, 2, 1, 2, 1, 0),
(423, 'Ana Maria Nunes de Faria', 'Stamm', 75803, 2157061, '1984-09-14', '1984-09-14', '1951-07-26', NULL, NULL, NULL, 34, 1, 14, 4, 14, 1, 0),
(424, 'Antônio Carlos Ferreira da', 'Cunha', 42964, 1156807, '1979-04-01', '1979-04-01', '1945-01-16', NULL, NULL, NULL, 34, 35, 12, 3, 12, 1, 0),
(425, 'Antônio César', 'Cavallazzi', 41399, 575928, '1978-12-01', '1978-12-01', '1952-05-30', NULL, NULL, NULL, 34, 35, 12, 3, 12, 1, 0),
(426, 'Antônio Fernando Barreto', 'Miranda', 76516, 1158429, '1986-01-01', '1986-01-01', '1956-01-17', NULL, NULL, NULL, 34, 1, 12, 3, 12, 1, 0),
(427, 'Eliana Ternes', 'Pereira', 55713, 1157518, '1980-10-01', '1980-10-01', '1949-01-16', NULL, NULL, NULL, 34, 35, 17, 5, 17, 1, 0),
(428, 'Emílio', 'Pizzichini', 85043, 2158004, '1985-12-30', '1985-12-30', '1956-06-18', NULL, NULL, NULL, 34, 1, 11, 5, 11, 1, 0),
(429, 'Fernando Osni', 'Machado', 108051, 2157806, '1993-11-30', '1993-11-30', '1955-08-23', NULL, NULL, NULL, 34, 1, 12, 4, 12, 1, 0),
(430, 'Joanita Ângela Gonzaga del', 'Moral', 121287, 2160634, '1997-11-21', '1997-11-21', '1965-09-04', NULL, NULL, NULL, 34, 1, 5, 3, 5, 1, 0),
(431, 'Jorge Dias de', 'Matos', 104382, 398603, '1989-12-28', '1989-12-28', '1960-12-30', NULL, NULL, NULL, 34, 1, 4, 2, 4, 1, 0),
(432, 'Jovino dos Santos', 'Ferreira', 54130, 574146, '1980-04-15', '1980-04-15', '1952-10-22', NULL, NULL, NULL, 34, 35, 14, 4, 14, 1, 0),
(433, 'Leila John Marques', 'Steidle', 138872, 4322293, '2007-06-06', '2007-06-06', '0000-00-00', NULL, NULL, NULL, 34, 9, 10, 4, 10, 1, 0),
(434, 'Li Shih', 'Min', 134834, 4160027, '2004-09-07', '2004-09-07', '1957-01-09', NULL, NULL, NULL, 34, 9, 10, 4, 10, 1, 0),
(435, 'Liana Miriam Miranda', 'Heinisch', 101952, 1159574, '1991-01-22', '1991-01-22', '1959-04-20', NULL, NULL, NULL, 34, 1, 11, 4, 11, 1, 0),
(436, 'Luiz Felipe de Souza', 'Nobre', 111648, 1160194, '1994-11-21', '1994-11-21', '1963-02-10', NULL, NULL, NULL, 34, 1, 9, 4, 9, 1, 0),
(437, 'Marcelino Osmar ', 'Vieira', 75986, 2157563, '1984-09-14', '1984-09-14', '1955-12-21', NULL, NULL, NULL, 34, 1, 12, 3, 12, 1, 0),
(438, 'Marcia Margaret Menezes', 'Pizzichini', 67886, 576618, '1983-02-01', '1983-02-01', '1952-03-29', NULL, NULL, NULL, 34, 1, 9, 4, 9, 1, 0),
(439, 'Marisa Helena Cesar', 'Coral', 42956, 1156806, '1979-04-01', '1979-04-01', '1951-10-22', NULL, NULL, NULL, 34, 35, 9, 3, 9, 1, 0),
(440, 'Mário Sérgio Soares de Azevedo', 'Coutinho', 103157, 1159643, '1991-11-20', '1991-11-20', '1955-02-07', NULL, NULL, NULL, 34, 1, 14, 5, 14, 1, 0),
(441, 'Oswaldo Vitorino', 'Oliveira', 18451, 1155654, '1971-07-01', '1971-07-01', '1943-11-20', NULL, NULL, NULL, 34, 57, 9, 3, 9, 1, 0),
(442, 'Paulo César', 'Consoni', 38398, 573796, '1978-03-01', '1978-03-01', '1952-03-26', NULL, NULL, NULL, 34, 35, 9, 2, 9, 1, 0),
(443, 'Raquel Duarte', 'Moritz', 108434, 2158318, '1994-01-03', '1994-01-03', '1955-04-28', NULL, NULL, NULL, 34, 1, 9, 4, 9, 1, 0),
(444, 'Roberto Henrique', 'Heinisch', 109694, 2159126, '1994-02-18', '1994-02-18', '1960-12-03', NULL, NULL, NULL, 34, 1, 9, 4, 9, 1, 0),
(445, 'Vanir', 'Cardoso', 75811, 2157047, '1984-09-14', '1984-09-14', '1951-02-16', NULL, NULL, NULL, 34, 1, 8, 2, 8, 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `progressao_funcional`
--

CREATE TABLE IF NOT EXISTS `progressao_funcional` (
  `id_progressao_funcional` int(11) NOT NULL auto_increment,
  `id_professor` int(11) NOT NULL,
  `id_categoria_funcional` int(11) NOT NULL,
  `processo` varchar(45) default NULL,
  `data_avaliacao` date default NULL,
  `nota_avaliacao` float default NULL,
  `data_inicio` date NOT NULL,
  `portaria` varchar(45) default NULL,
  `observacao` blob,
  PRIMARY KEY  (`id_progressao_funcional`),
  KEY `fk_progressao_funcional_categoria_funcional` (`id_categoria_funcional`),
  KEY `fk_progressao_funcional_professor` (`id_professor`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Cadastro das progressões funcionais.' AUTO_INCREMENT=83 ;

--
-- Extraindo dados da tabela `progressao_funcional`
--

INSERT INTO `progressao_funcional` (`id_progressao_funcional`, `id_professor`, `id_categoria_funcional`, `processo`, `data_avaliacao`, `nota_avaliacao`, `data_inicio`, `portaria`, `observacao`) VALUES
(1, 1, 6, '000244/91-00', '0000-00-00', NULL, '1991-02-02', '52/DP/1991', NULL),
(2, 1, 7, '001484/93-11', NULL, NULL, '1993-02-02', '564/DP/1993', NULL),
(3, 1, 8, '002100/95-86', NULL, 33.59, '1995-02-02', '212/DDRH/1995', NULL),
(4, 1, 9, '006700/97-67', NULL, NULL, '1997-02-02', '1642/DRH/98', 0x486f757665206f7574726f2070726f636573736f207061726120657374612070726f6772657373e36f20283030373031312f39382d3838292c0d0a6120706f72746172696120313634322f4452482f393820736520726566657265206120657374652070726f636573736f2e),
(5, 1, 10, '001083/99-57', '0000-00-00', 35.5, '1999-02-02', '225/DRH/99', NULL),
(6, 1, 11, '006715/00-37', NULL, 40.5, '2001-02-02', '103/DRH/01', NULL),
(7, 1, 12, '027073/04-33', NULL, 30.63, '2003-08-02', NULL, 0x4176616c6961646f20656d2063696e636f2073656d657374726573207061726120616c63616ee76172206120706f6e747561e7e36f206e6563657373e17269612e),
(8, 1, 13, '044808/2006-55', NULL, NULL, '2006-05-01', '716/DDPP/2006', NULL),
(9, 6, 10, '024926/2007-28', NULL, 0, '2007-03-16', '372/DDPP/2007', 0x50726f636573736f203032363634382f323030352d3831204170726f7661206f206573746167696f2050726f6261746f72696f2e),
(10, 6, 11, '009198/2009-96', NULL, 46, '2009-03-16', NULL, NULL),
(11, 7, 10, '001325/98-11', NULL, 0, '1999-02-26', '65/DRH/99', NULL),
(12, 7, 11, '013616/06-05', NULL, 37.5, '2001-02-26', '340/DDPP/06', NULL),
(13, 7, 12, '013833/06-97', NULL, 34, '2003-02-26', '340/DDPP/06', NULL),
(14, 7, 13, '050055/06-17', NULL, NULL, '2006-05-01', '20/DDPP/07', NULL),
(15, 7, 14, '004328/09-02', '0000-00-00', 37.5, '2008-05-01', NULL, NULL),
(16, 8, 6, '001306/97-88', NULL, 0, '1997-08-10', '1269/DRH/97', NULL),
(17, 8, 7, '004092/99-54', NULL, 41.5, '1999-08-10', '858/DRH/99', NULL),
(18, 8, 9, '005689/01-19', NULL, 1, '2001-11-06', '731/DRH/01', 0x2d2041206461746120646520696e6963696f20e920612064617461206461207075626c696361e7e36f20646120706f727461726961206e6f20424f20646120554653432e0d0a2d2050726f636573736f203030353638392f30312d313920636f6e6365646520353025207265662e20446f75746f7261646f2061207061727469722064652032362e30392e323030310d0a286461746120646120636f6e63657373e36f292e20446566656e646575207465736520656d2032362e30372e32303031),
(19, 8, 10, '008299/04-35', NULL, 35, '2003-11-06', '615/DRH/04', NULL),
(20, 8, 11, '007151/06-45', NULL, 34.5, '2005-11-06', '246/DDPP/06', NULL),
(21, 8, 12, '018690/08-71', NULL, 37, '2007-11-06', '321/DDPP/08', NULL),
(22, 8, 13, '032506/09-87', NULL, 44, '2009-11-06', NULL, NULL),
(23, 9, 2, NULL, NULL, NULL, '1988-11-06', '02/DP/89', NULL),
(24, 9, 3, NULL, NULL, NULL, '1990-11-06', '1367/DP/90', NULL),
(25, 9, 4, '002181/93-16', NULL, NULL, '1992-11-06', '27/DDRH/93', NULL),
(26, 9, 5, '007227/95-64', NULL, 2, '1995-09-04', '707/DDRH/95', 0x50726f632e203030373232372f39352d363420636f6e6365646520323525207265662e206d6573747261646f2061207061727469722064652030342e30392e39350d0a286461746120646f20726567697374726f20646f2070726f632e206e6f2070726f746f636f6c6f20676572616c2f55465343292e),
(27, 9, 6, '056224/06-22', NULL, 27, '1997-09-04', '015/DDPP/07', NULL),
(28, 9, 7, '056214/06-97', NULL, 25.5, '1999-09-04', '015/DDPP/07', NULL),
(29, 9, 8, '056202/06-62', NULL, 30.12, '2002-03-04', '015/DDPP/07', 0x55736f7520756d2073656d65737472652061206d6169732028323030312f322920706f722066616c746120646520706f6e747561e7e36f2e0d0a34206f7574726f732073656d6573747265732028323329202b20372c31322028646f2073656d657374726520323030312f32290d0a546f74616c3a2033302c3132),
(30, 10, 6, '015704/94-25', NULL, 0, '1993-12-02', '1015/SRH/94', NULL),
(31, 10, 9, '018007/95-99', NULL, 1, '1995-10-16', '2064/SPD/DRF/95', 0x4f627465766520646f75746f7261646f20656d2031362e31302e3935206e61205055432d524a),
(32, 10, 10, '001380/02-22', NULL, 34.02, '1999-04-16', '343/DDPP/05', 0x55736f75206d61697320332073656d6573747265732070617261206174696e67697220706f6e747561e7e36f2e),
(33, 11, 7, NULL, NULL, 3, '1981-01-01', '416/GR/81', NULL),
(34, 11, 8, NULL, NULL, NULL, '1983-01-01', '111/DP/83', NULL),
(35, 11, 9, NULL, NULL, NULL, '1985-01-01', '002/DP/85', NULL),
(36, 11, 10, NULL, NULL, NULL, '1987-01-01', '009/DP/87', NULL),
(37, 11, 11, NULL, NULL, NULL, '1989-01-01', NULL, NULL),
(38, 11, 12, '000244/91-00', NULL, NULL, '1991-01-01', '38/DP/91', NULL),
(39, 11, 13, '004329/09-49', NULL, 33.5, '2006-05-01', NULL, NULL),
(40, 12, 17, NULL, NULL, NULL, '0000-00-00', NULL, 0x50726f632e203030333632302f39352d323120696e646566657265206f20457374e167696f2050726f626174f372696f2061707265636961646f206e6120435050440d0a656d207265756e69e36f206f7264696ee1726961207265616c697a616461206e6f206469612031332e30362e39350d0a0d0a50726f632e203034353739302f39372d3230206465636c617261206e756c6f206f2061746f2064652065786f6e657261e7e36f20636f6e666f726d650d0a61e7e36f206f7264696ee1726961203935353435302d37206520706f727461726961203032392f4452482f39372e),
(41, 13, 17, NULL, NULL, NULL, '2002-05-03', NULL, 0x50726f632e203032393636352f30322d3238206170726f7661206f20657374e167696f2070726f626174f372696f20636f6e66204174612030362f323030332e),
(42, 14, 10, '001326/98-76', NULL, 0, '1999-06-10', '762/DRH/99', NULL),
(43, 14, 11, '004017/01-88', NULL, 31.5, '2001-06-10', '831/DRH/2001', NULL),
(44, 14, 12, '014327/05-34', NULL, 32.11, '2004-06-10', '343/DDPP/05', 0x55736f75206d61697320322073656d6573747265732070617261206174696e67697220706f6e747561e7e36f2e),
(45, 14, 13, '040301/06-22', NULL, NULL, '2006-12-10', '721/DDPP/06', NULL),
(46, 15, 5, NULL, NULL, 3, '1981-01-01', '416/GR/81', NULL),
(47, 15, 6, NULL, NULL, NULL, '1983-01-01', '111/DP/83', NULL),
(48, 15, 7, NULL, NULL, NULL, '1985-01-01', '014/DP/85', NULL),
(49, 15, 8, '014508/85-00', NULL, 2, '1985-06-17', '010/DP/86', NULL),
(50, 15, 9, '003724/87-47', NULL, NULL, '1987-06-17', '403/DP/87', NULL),
(51, 15, 10, NULL, NULL, NULL, '1989-06-17', '458/DP/89', NULL),
(52, 15, 11, '000244/91-00', NULL, NULL, '1991-06-17', '801/DP/91', NULL),
(53, 15, 12, '003350/95-89', NULL, 30.07, '1993-06-17', '030/DDRH/95', NULL),
(54, 52, 10, '030091/09-15', NULL, 0, '2009-05-24', NULL, NULL),
(55, 81, 5, NULL, NULL, 3, '1981-01-01', '416/GR/81', NULL),
(56, 81, 6, NULL, NULL, NULL, '1983-01-01', '111/DP/1983', NULL),
(57, 81, 7, NULL, NULL, NULL, '1985-01-01', '014/DP/85', NULL),
(58, 81, 8, NULL, NULL, NULL, '1987-01-01', '09/DP/87', NULL),
(59, 81, 9, '023955/88-01', NULL, NULL, '1989-01-01', '444/DP/89', NULL),
(60, 81, 10, '001092/91-91', NULL, NULL, '1991-01-01', '470/DP/91', NULL),
(61, 81, 11, '069300/92-49', NULL, 46, '1993-01-01', '5211/DDRH-BP27/94', NULL),
(62, 81, 12, '006443/94-93', NULL, 31.99, '1995-01-01', '1077/DRH/96', 0x50726f632e203032363533322f39362d333620636f6e6365646520323525207265662e206d6573747261646f2061207061727469720d0a64652031352e30352e39362e),
(63, 81, 13, '044297/06-71', NULL, 36.26, '2006-05-01', '455/DDPP/07', 0x50726f632e203032353939372f30322d333320636f6e6365646520353025207265662e20646f75746f7261646f206120706172746972200d0a64652030342e31302e303220286461746120646120636f6e63657373e36f292e2044656665736120656d2031382e30392e3032),
(64, 82, 2, '003872/82', NULL, 4, '1982-08-04', '442/DP/82', NULL),
(65, 82, 3, NULL, NULL, NULL, '1984-08-04', NULL, NULL),
(66, 82, 4, NULL, NULL, NULL, '1986-08-04', '263/DP/86', NULL),
(67, 82, 5, '017699/88-51', NULL, NULL, '1988-08-04', '791/DP/88', NULL),
(68, 82, 6, NULL, NULL, NULL, '1990-08-04', '928/DP/90', 0x50726f632e203030393634382f39312d363020636f6e63656465203132252061207061727469722064652030312f30392f39312e),
(69, 82, 7, '002578/92-17', NULL, NULL, '1992-08-04', '1326/DP/92', 0x50726f632e203034363635362f39322d373820636f6e63656465203235252061207061727469722064652030372f31302f393220706f72206d6573747261646f2e),
(70, 82, 8, '2083/94-81', NULL, 35.63, '0000-00-00', NULL, NULL),
(71, 82, 9, '27174/96-33', NULL, 150.55, '1996-08-04', '1063/DRH/98', NULL),
(72, 82, 10, '003337/98-63', NULL, 33, '1998-08-04', '1255/DRH/98', 0x50726f632e203030323833382f39382d313320636f6e63656465203530252061207061727469722064652032382f30372f393820706f7220646f75746f7261646f2e),
(73, 82, 11, '002014/00-29', NULL, 31.5, '2000-08-04', '103/DRH/01', NULL),
(74, 82, 12, '0103121/02-54', NULL, 33.5, '2002-08-04', '976/DRH/2002', NULL),
(75, 82, 13, '047112/06-81', NULL, NULL, '2006-05-01', '20/DDPP/07', NULL),
(76, 82, 14, '038209/08-64', NULL, 38, '2008-05-01', '800/DDPP/08', NULL),
(77, 85, 2, NULL, NULL, NULL, '1984-03-01', NULL, NULL),
(78, 85, 3, NULL, NULL, NULL, '1986-03-01', '49/DP/86', NULL),
(79, 85, 4, NULL, NULL, NULL, '1988-03-01', '45/DP/88', NULL),
(80, 85, 5, '004110/90-04', NULL, NULL, '1990-03-01', '1192/DP/90', NULL),
(81, 85, 6, '038828/91-95', NULL, NULL, '1992-03-01', '1457/DP/92', NULL),
(82, 85, 7, '008745/95-12', NULL, 34.5, '1994-03-01', '761/DRH/03', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `regime_trabalho`
--

CREATE TABLE IF NOT EXISTS `regime_trabalho` (
  `id_regime_trabalho` int(11) NOT NULL auto_increment,
  `descricao` varchar(45) NOT NULL,
  `quantidade_horas` int(11) NOT NULL,
  `dedicacao_exclusiva` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id_regime_trabalho`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Cadastro dos regimes de trabalho.' AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `regime_trabalho`
--

INSERT INTO `regime_trabalho` (`id_regime_trabalho`, `descricao`, `quantidade_horas`, `dedicacao_exclusiva`) VALUES
(1, '20 Horas', 20, 0),
(2, '40 Horas - Excepcionalidade', 40, 0),
(3, '40 Horas - Dedicação Exclusiva', 40, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `regime_trabalho_professor`
--

CREATE TABLE IF NOT EXISTS `regime_trabalho_professor` (
  `id_professor` int(11) NOT NULL,
  `id_regime_trabalho` int(11) NOT NULL,
  `processo` varchar(45) default NULL,
  `deliberacao` varchar(45) default NULL,
  `portaria` varchar(45) default NULL,
  `data_inicio` date NOT NULL,
  PRIMARY KEY  (`id_professor`,`id_regime_trabalho`),
  KEY `fk_professor_has_regime_trabalho_professor` (`id_professor`),
  KEY `fk_professor_has_regime_trabalho_regime_trabalho` (`id_regime_trabalho`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Cadastro dos regimes de trabalhos.';

--
-- Extraindo dados da tabela `regime_trabalho_professor`
--

INSERT INTO `regime_trabalho_professor` (`id_professor`, `id_regime_trabalho`, `processo`, `deliberacao`, `portaria`, `data_inicio`) VALUES
(1, 3, '123456', '654321', '918273', '2006-01-01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `situacao`
--

CREATE TABLE IF NOT EXISTS `situacao` (
  `id_situacao` int(11) NOT NULL auto_increment,
  `descricao_situacao` varchar(20) default NULL,
  PRIMARY KEY  (`id_situacao`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `situacao`
--

INSERT INTO `situacao` (`id_situacao`, `descricao_situacao`) VALUES
(1, 'Estatutário/RJU');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_afastamento`
--

CREATE TABLE IF NOT EXISTS `tipo_afastamento` (
  `id_tipo_afastamento` int(11) NOT NULL auto_increment,
  `descricao` varchar(45) NOT NULL,
  PRIMARY KEY  (`id_tipo_afastamento`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Cadastro dos tipos de afastamentos.' AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `tipo_afastamento`
--

INSERT INTO `tipo_afastamento` (`id_tipo_afastamento`, `descricao`) VALUES
(1, 'Licença por motivo de doença em família'),
(2, 'Licença para atividade política'),
(3, 'Licença Prêmio por Assiduidade'),
(4, 'Licença à Gestante ou à Adotante'),
(5, 'Licença para Mandato Classista'),
(6, 'Licença Sabática'),
(7, 'Afastamento para servir em outro órgão ou ins'),
(8, 'Afastamento para exercício de Mandato Eletivo'),
(9, 'Afastamento para estudo ou missão no exterior');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_titulacao`
--

CREATE TABLE IF NOT EXISTS `tipo_titulacao` (
  `id_tipo_titulacao` int(11) NOT NULL auto_increment,
  `descricao` varchar(45) NOT NULL,
  PRIMARY KEY  (`id_tipo_titulacao`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Cadastro dos tipos de titulação.' AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `tipo_titulacao`
--

INSERT INTO `tipo_titulacao` (`id_tipo_titulacao`, `descricao`) VALUES
(1, 'Graduação'),
(2, 'Especialização'),
(3, 'Mestrado'),
(4, 'Doutorado'),
(5, 'Pós-doutorado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `uf`
--

CREATE TABLE IF NOT EXISTS `uf` (
  `id_uf` int(11) NOT NULL auto_increment,
  `id_pais` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sigla` varchar(10) NOT NULL,
  PRIMARY KEY  (`id_uf`),
  KEY `fk_uf_pais` (`id_pais`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Cadastro das unidades da federação (uf).' AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `uf`
--

INSERT INTO `uf` (`id_uf`, `id_pais`, `nome`, `sigla`) VALUES
(1, 1, 'Santa Catarina', 'SC');

-- --------------------------------------------------------

--
-- Estrutura stand-in para visualizar `visao`
--
CREATE TABLE IF NOT EXISTS `visao` (
`id_professor` int(11)
,`nome` varchar(100)
,`sobrenome` varchar(100)
,`matricula` int(11)
,`siape` int(11)
,`data_admissao` date
,`data_admissao_ufsc` date
,`aposentado` char(5)
,`data_previsao_aposentadoria` date
,`data_aposentadoria` date
,`id_departamento` int(11)
,`id_categoria_funcional_inicial` int(11)
,`id_categoria_funcional_atual` int(11)
,`id_tipo_titulacao` int(11)
,`id_categoria_funcional_referencia` int(11)
,`id_cargo` int(11)
,`id_situacao` int(11)
);
-- --------------------------------------------------------

--
-- Estrutura para visualizar `visao`
--
DROP TABLE IF EXISTS `visao`;

CREATE ALGORITHM=TEMPTABLE DEFINER=`cppd`@`localhost` SQL SECURITY DEFINER VIEW `docente`.`visao` AS select `docente`.`professor`.`id_professor` AS `id_professor`,`docente`.`professor`.`nome` AS `nome`,`docente`.`professor`.`sobrenome` AS `sobrenome`,`docente`.`professor`.`matricula` AS `matricula`,`docente`.`professor`.`siape` AS `siape`,`docente`.`professor`.`data_admissao` AS `data_admissao`,`docente`.`professor`.`data_admissao_ufsc` AS `data_admissao_ufsc`,`docente`.`professor`.`aposentado` AS `aposentado`,`docente`.`professor`.`data_previsao_aposentadoria` AS `data_previsao_aposentadoria`,`docente`.`professor`.`data_aposentadoria` AS `data_aposentadoria`,`docente`.`professor`.`id_departamento` AS `id_departamento`,`docente`.`professor`.`id_categoria_funcional_inicial` AS `id_categoria_funcional_inicial`,`docente`.`professor`.`id_categoria_funcional_atual` AS `id_categoria_funcional_atual`,`docente`.`professor`.`id_tipo_titulacao` AS `id_tipo_titulacao`,`docente`.`professor`.`id_categoria_funcional_referencia` AS `id_categoria_funcional_referencia`,`docente`.`professor`.`id_cargo` AS `id_cargo`,`docente`.`professor`.`id_situacao` AS `id_situacao` from `docente`.`professor`;
