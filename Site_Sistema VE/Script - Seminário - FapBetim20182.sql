/* IV SIMPOSIO 2018/2 
   ------------------
   Database: fapbetim20182
   Autor: CMN®.
   Data: 11/Nov/2018 - Início: 14:00 
   Data: 19/Nov/2018 - Início: 10:08 / 
*/

-- Create Database
CREATE DATABASE FAPBETIM20182;

-- Use FAPBETIM20181
USE FAPBETIM20182;



-- Table Eleitor
CREATE TABLE ELEITOR
( IDEL INT AUTO_INCREMENT,
  MATRICULA VARCHAR(20),
  NOME VARCHAR(150),
  CPF VARCHAR(11) UNIQUE,
  SENHA VARCHAR(06),
  TIPOELEITOR VARCHAR(12),
  VOTOSTATUS INT DEFAULT 0,
  PRIMARY KEY(IDEL));
  
-- Select Eleitor
SELECT * FROM ELEITOR;

-- Insert Eleitor Teste
INSERT INTO ELEITOR (MATRICULA, NOME, CPF, SENHA, TIPOELEITOR) 
	 VALUES ('02000021', 'ALUNO CRISTIANO', '00011122233', '000111', 'ALUNO'),
            (NULL, 'PROFESSOR CRISTIANO', '12345678900', '123456', 'PROFESSOR');
            
-- Insert Eleitor Alunos
INSERT INTO ELEITOR (MATRICULA, NOME, CPF, SENHA, TIPOELEITOR)
	 SELECT NULL, UPPER(NOME), CPF, SUBSTRING(CPF,1,6), 'ALUNO'
	   FROM PROFESSORESSFAP WHERE CPF NOT IN ('30432716882');            

SELECT COUNT(*) FROM PROFESSORESFAP;


INSERT INTO ELEITOR (MATRICULA, NOME, CPF, SENHA, TIPOELEITOR)
	 SELECT NULL, UPPER(NOME), CPF, SUBSTRING(CPF,1,6), 'PROFESSOR'
	   	   FROM PROFESSORESFAP WHERE CPF NOT IN ('30432716882');            

-- Table Projeto
CREATE TABLE PROJETO
( IDPJ INT AUTO_INCREMENT,
  NOME VARCHAR(150) NOT NULL,
  CODCURSO INT,  
  CURSO VARCHAR(150) NOT NULL,
  AREA VARCHAR(150) NOT NULL,
  PRIMARY KEY(IDPJ));

-- Insert Projeto x ProjetosFapAlunos
INSERT INTO PROJETO (NOME, CURSO, AREA, CODCURSO)
	 SELECT UPPER(PROJETO), UPPER(CURSO), UPPER(CURSO), CODCURSO
	   FROM PROJETOSFAP
   ORDER BY CURSO, PROJETO;           

-- ***************************************************  
-- Alter Projeto 18/05/18
ALTER TABLE PROJETO
ADD COLUMN CODCURSO INT;  

-- Select
SELECT * FROM PROJETO ORDER BY CURSO;

-- Update
UPDATE PROJETO
   SET CODCURSO = '1'
WHERE CURSO = 'Arquitetura'
AND IDPJ BETWEEN 15 AND 36;

UPDATE PROJETO
   SET CODCURSO = '2'
WHERE CURSO = 'Ciência da Computação'
AND IDPJ BETWEEN 58 AND 60;

UPDATE PROJETO
   SET CODCURSO = '3'
WHERE CURSO = 'Engenharia Civil'
AND IDPJ BETWEEN 37 AND 48;

UPDATE PROJETO
   SET CODCURSO = '4'
WHERE CURSO = 'Engenharia de Controle e Automação'
AND IDPJ BETWEEN 54 AND 57;

UPDATE PROJETO
   SET CODCURSO = '5'
WHERE CURSO = 'Engenharia de Produção'
AND IDPJ BETWEEN 49 AND 53;

UPDATE PROJETO
   SET CODCURSO = '6'
WHERE CURSO = 'Engenharia Mecânica'
AND IDPJ BETWEEN 67 AND 78;

UPDATE PROJETO
   SET CODCURSO = '7'
WHERE CURSO = 'Engenharia Química'
AND IDPJ BETWEEN 61 AND 66;

SELECT COUNT(*) FROM PROJETO;
SELECT * FROM PROJETO;

INSERT INTO PROJETO (NOME, CURSO, AREA, CODCURSO) 
	 VALUES ('MOTOR V8','Engenharia Mecânica','Engenharia Mecânica',6);

INSERT INTO PROJETO (NOME, CURSO, AREA, CODCURSO)
	 VALUES ('TECNOLOGIAS SUSTENTÁVEIS APLICADAS A ENGENHARIA CIVIL: REUSO DE ÁGUAS CINZA',
			  'Engenharia Civil','Engenharia Civil',3);

-- ***************************************************  

-- Insert Projeto
INSERT INTO PROJETO (NOME, CURSO, AREA) VALUES ('CASA INTELIGENTE C/ARDUINO','CIÊNCIA DA COMPUTAÇÃO','COMPUTAÇÃO'),
											   ('ESTRUTURA BÁSICA DE CONCRETO','ENGENHARIA CIVIL','ENGENHARIA'),       
											   ('PRODUÇÃO DE CERVEJA','ENGENHARIA QUIMICA','ENGENHARIA'),
                                               ('ARQUITETURA CLASSIA DA PAMPULHA','ARQUITETURA','ARQUITETURA'),
											   ('PA','CIÊNCIA DA COMPUTAÇÃO','COMPUTAÇÃO'),
											   ('PB','CIÊNCIA DA COMPUTAÇÃO','COMPUTAÇÃO'),
                                               ('PCC','ENGENHARIA CIVIL','ENGENHARIA'),       
                                               ('PXX','ENGENHARIA CIVIL','ENGENHARIA'),       
											   ('PC1','ENGENHARIA QUIMICA','ENGENHARIA'),
                                               ('PC2','ENGENHARIA QUIMICA','ENGENHARIA'),
                                               ('PC3','ENGENHARIA QUIMICA','ENGENHARIA'),
                                               ('ARQUITETURA 3','ARQUITETURA','ARQUITETURA'),
                                               ('ARQUITETURA 1','ARQUITETURA','ARQUITETURA'),
                                               ('ARQUITETURA 2','ARQUITETURA','ARQUITETURA');
                                               
-- 14/5 Arquitetura - 22
INSERT INTO PROJETO (NOME, CURSO, AREA) VALUES 
('CASA CAMILA','Arquitetura','Arquitetura'),
('CENTRO CULTURAL DR. GRAVATÁ - FUNARBE','Arquitetura','Arquitetura'),
('CENTRO CULTURAL JOSÉ MARIA GOMES DUARTE (PÉ DE ALFACE)' ,'Arquitetura','Arquitetura'),
('CENTRO CULTURAL JOSÉ RODRIGUES BETIM - FUNARBE','Arquitetura','Arquitetura'),
('CENTRO CULTURAL MERCEDES BAPTISTA - FUNARBE','Arquitetura','Arquitetura'),
('CENTRO CULTURAL RONDON PACHECO','Arquitetura','Arquitetura'),
('CENTRO MULTICULTURAL RONALDO LARA','Arquitetura','Arquitetura'),
('COMERCIAL E RESIDENCIAL HOPE','Arquitetura','Arquitetura'),
('COMPLEXO MOTUS','Arquitetura', 'Arquitetura'),
('CONDOMINIO LIBERDADE','Arquitetura','Arquitetura'),
('CONJUNTO HABITACIONAL - CONDOMÍNIO FRANÇA','Arquitetura','Arquitetura'),
('CONJUNTO RESIDENCIAL MOTION E PARQUE GASTRONÔMICO STREET FOOD','Arquitetura','Arquitetura'),
('EDIFÍCIO BRANS' ,'Arquitetura','Arquitetura'),
('EDIFÍCIO HARMONY' ,'Arquitetura','Arquitetura'),
('EDIFÍCIO VAPERSI','Arquitetura','Arquitetura'),
('ESPAÇO CULTURAL GR -  JOSÉ RODRIGUES BETIM','Arquitetura','Arquitetura'),
('FUNARBE - PAULO ARCHIAS MENDES DA ROCHA','Arquitetura','Arquitetura'),
('GARDEN OF LIFE','Arquitetura','Arquitetura'),
('PROJETO ALFA','Arquitetura','Arquitetura'),
('PROJETO MILLENIUM' ,'Arquitetura','Arquitetura'),
('RESIDÊNCIA JANAINA','Arquitetura','Arquitetura'),
('RESIDENCIAL CAMILA','Arquitetura','Arquitetura');


-- 14/5 Engenharia Civil - 12
INSERT INTO PROJETO (NOME, CURSO, AREA) VALUES                                                
('ANÁLISE ESCLEROMÉTRICA','Engenharia Civil','Engenharia Civil'),
('APLICAÇÃO DO GRAUTE EM ALVENARIA ESTRUTURAL','Engenharia Civil','Engenharia Civil'),
('ASFALTO','Engenharia Civil','Engenharia Civil'),
('CARACTERÍSTICAS DO MÉTODO CONSTRUTIVO EM ALVENARIA AUTO PORTANTE','Engenharia Civil','Engenharia Civil'),
('CONCRETO PROTENDIDO: A EVOLUÇÃO DO CONCRETO ARMADO NA ENGENHARIA CIVIL','Engenharia Civil','Engenharia Civil'),
('EVOLUÇÃO DOS METODOS CONSTRUTIVOS DAS PONTES','Engenharia Civil','Engenharia Civil'),
('IMPERMEABILIZAÇÃO NA CONSTRUÇÃO CIVIL','Engenharia Civil','Engenharia Civil'),
('LAJES ALVEOLARES PROTENDIDA','Engenharia Civil','Engenharia Civil'),
('PATOLOGIAS EM ESTRUTURAS DE CONCRETO','Engenharia Civil','Engenharia Civil'),
('PAVIMENTAÇÃO DE RODOVIAS: PAVIMENTO DE CONCRETO','Engenharia Civil','Engenharia Civil'),
('PAVIMENTOS PERMEÁVEIS','Engenharia Civil','Engenharia Civil'),
('PROCESSO DE FABRICAÇÃO DO TIJOLO ECOLÓGICO COMPOSTO DE SOLO-CIMENTO E PRINCIPAIS','Engenharia Civil','Engenharia Civil');


-- 14/5 Engenharia de Produção - 5
INSERT INTO PROJETO (NOME, CURSO, AREA) VALUES 
('CARROS AUTONÔMOS : A TECNOLOGIA POR DENTRO E POR FORA','Engenharia de Produção','Engenharia de Produção'),
('FERRAMENTAS E SISTEMAS DA QUALIDADE ANTES E DEPOIS DA TÉCNOLOGIA DIGITAL','Engenharia de Produção','Engenharia de Produção'),
('GAMES CORPORATIVOS PARA CAPACITAÇÃO DE FUNCIONÁRIOS','Engenharia de Produção','Engenharia de Produção'),
('MANUFATURA ADITIVA','Engenharia de Produção','Engenharia de Produção'),
('REALIDADE AUMENTADA – A NOVA VISÃO MERCADOLÓGICA','Engenharia de Produção','Engenharia de Produção');

-- 14/5 Engenharia de Controle e Automação - 4
INSERT INTO PROJETO (NOME, CURSO, AREA) VALUES 
('APLICAÇÃO DA ROBÓTICA NO PROCESSO DE SOLDAGEM MIG/MAG: VANTAGENS E DESVANTAGENS DO PROCESSO AUTOMATIZADO','Engenharia de Controle e Automação','Engenharia de Controle e Automação'),
('BRAÇO ROBÓTICO APLICADO A ESTEIRA TRANSPORTADORA E SEPARADORA DE MATERIAIS','Engenharia de Controle e Automação','Engenharia de Controle e Automação'),
('DOMÓTICA: A UTILIZAÇÃO DE MICROCONTROLADORES PARA CONTROLE DE DISPOSITIVOS RESIDENCIAIS','Engenharia de Controle e Automação','Engenharia de Controle e Automação'),
('SOLDAGEM ROBÓTICA AUTOMOTIVA - APLICADA A CARROCERIA DO AUTOMÓVEL','Engenharia de Controle e Automação','Engenharia de Controle e Automação');


-- 14/5 Ciência da Computação - 3
INSERT INTO PROJETO (NOME, CURSO, AREA) VALUES 
('APP BOLÃO','Ciência da Computação','Ciência da Computação'),
('ARDUINO GIRASSOL','Ciência da Computação','Ciência da Computação'),
('PICK LIST LOGISTICS','Ciência da Computação','Ciência da Computação');


-- 14/5 Engenharia Química - 6
INSERT INTO PROJETO (NOME, CURSO, AREA) VALUES 
('ANÁLISE QUALITATIVA E QUANTITATIVA DO BIOGÁS PRODUZIDO SOB MANIPULAÇÃO DE VARIÁVEIS','Engenharia Química','Engenharia Química'),
('APLICAÇÃO DO EXTRATO DE BETERRABA COMO ADITIVO EM REVESTIMENTO ORGÂNICO PARA PROTEÇÃO ANTICORROSIVA EM METAIS','Engenharia Química','Engenharia Química'),
('ESTUDO SOBRE O TRATAMENTO E DESTINAÇÃO DE REJEITOS DE POLIURETANO','Engenharia Química','Engenharia Química'),
('FABRICAÇÃO DE AGUARDENTE APARTIR DA CASCA DE MANDIOCA','Engenharia Química','Engenharia Química'),
('FABRICAÇÃO DE CERVEJA ESTILO PILSEN ORGÂNICA','Engenharia Química','Engenharia Química'),
('RECUPERAÇÃO DE CATODO DE BATERIAS DE ÍONS LÍTIO EXAURIDAS PARA APLICAÇÃO CATALÍTICA NA DEGRADAÇÃO DE CORANTE INDUSTRIAL','Engenharia Química','Engenharia Química');

-- 14/5 Engenharia Mecânica - 12
INSERT INTO PROJETO (NOME, CURSO, AREA) VALUES 
('FABRICAÇÃO BRAÇO MECÂNICA ARTICULADO','Engenharia Mecânica','Engenharia Mecânica'),
('FABRICAÇÃO CAMINHÃO CAÇAMBA','Engenharia Mecânica','Engenharia Mecânica'),
('FABRICAÇÃO CAMINHÃO DE BOMBEIRO','Engenharia Mecânica','Engenharia Mecânica'),
('FABRICAÇÃO CAMINHÃO DE LIXO','Engenharia Mecânica','Engenharia Mecânica'),
('FABRICAÇÃO CASCATA DE CHOCOLATE','Engenharia Mecânica','Engenharia Mecânica'),
('FABRICAÇÃO COMPRESSOR DE AR','Engenharia Mecânica','Engenharia Mecânica'),
('FABRICAÇÃO PENEIRA VIBRATORIA','Engenharia Mecânica','Engenharia Mecânica'),
('FABRICAÇÃO PONTE MOVEL','Engenharia Mecânica','Engenharia Mecânica'),
('FABRICAÇÃO TANQUE DE GUERRA','Engenharia Mecânica','Engenharia Mecânica'),
('FABRICAÇÃO TRATOR ARADO','Engenharia Mecânica','Engenharia Mecânica'),
('FABRICAÇÃO TRATOR COM GRUA','Engenharia Mecânica','Engenharia Mecânica'),
('FABRICAÇÃO TRATOR ESCAVADEIRA','Engenharia Mecânica','Engenharia Mecânica');






-- Count(*) Projeto
SELECT COUNT(IDPJ) FROM PROJETO;

SELECT * FROM PROJETO ORDER BY CURSO, NOME;

-- View VotacaoResultado
CREATE VIEW PROJETOCURSO
AS
SELECT CURSO, COUNT(IDPJ) AS TOTALPROJETOS
FROM PROJETO
GROUP BY CURSO
ORDER BY CURSO;
 
-- Select ProjetoCurso
SELECT * FROM PROJETOCURSO;

-- ###################################################################################

-- DELETE FROM PROJETO WHERE IDPJ >= 1;
                                               
-- Select Projeto
SELECT * FROM PROJETO;

-- Table Votação
CREATE TABLE VOTACAO
( IDVT INT AUTO_INCREMENT,
  CPF VARCHAR(11), 
  PROJETO INT,
  DATAHORA DATETIME,
  PRIMARY KEY(IDVT));

-- Relcionamento Eleitor X Projeto X Votacao
ALTER TABLE VOTACAO
ADD FOREIGN KEY (CPF) REFERENCES ELEITOR (CPF);
-- Relcionamento Eleitor X Projeto X Votacao
ALTER TABLE VOTACAO
ADD FOREIGN KEY (PROJETO) REFERENCES PROJETO (IDPJ);

-- Insert VOTACAO
INSERT INTO VOTACAO (CPF, PROJETO, DATAHORA)
		    VALUES ('1',15,NOW(),('1',16,NOW());
            
                   /*('12300066655',1,NOW()),('12300066655',2,NOW()),
                   ('12300066655',3,NOW()),('12300066655',4,NOW()),
                   ('11122233344',1,NOW()),('11122233344',3,NOW()),
                   ('12300066655',2,NOW()),('12300066655',4,NOW()),
                   ('12300066655',3,NOW()),('12300066655',3,NOW()),
                   ('12300066655',4,NOW()),('12300066655',2,NOW()),
                   ('12300066655',5,NOW()),('12300066655',1,NOW()),
                   ('12300066655',6,NOW()),('12300066655',10,NOW()),
                   ('12300066655',7,NOW()),('12300066655',12,NOW()),
                   ('12300066655',8,NOW()),('12300066655',12,NOW()),
                   ('12300066655',9,NOW()),('12300066655',13,NOW()),
                   ('12300066655',10,NOW()),('12300066655',14,NOW());*/
                   
-- Select VOTACAO                   
SELECT * FROM VOTACAO;

-- DELETE FROM VOTACAO WHERE IDVT >= 1;

-- View VotacaoResultado
CREATE  VIEW VOTACAORESULTADO
AS
SELECT PROJETO.IDPJ AS CODIGO, PROJETO.NOME, PROJETO.CURSO, COUNT(IDVT) AS TOTALVOTO, PROJETO.AREA, PROJETO.CODCURSO
  FROM VOTACAO INNER JOIN PROJETO
			   ON VOTACAO.PROJETO = PROJETO.IDPJ
GROUP BY CODIGO, PROJETO.NOME, PROJETO.CURSO, PROJETO.AREA
ORDER BY TOTALVOTO DESC;

-- Select View
SELECT * FROM VOTACAORESULTADO;


-- View VotoEleitor
CREATE VIEW VOTOELEITOR
AS
SELECT ELEITOR.CPF, ELEITOR.NOME AS ELEITOR, VOTACAO.DATAHORA, PROJETO.CURSO, PROJETO.NOME AS PROJETO
  FROM VOTACAO INNER JOIN ELEITOR 
			   ON VOTACAO.CPF = ELEITOR.CPF
			   INNER JOIN PROJETO
			   ON VOTACAO.PROJETO = PROJETO.IDPJ
ORDER BY ELEITOR.NOME, VOTACAO.DATAHORA, PROJETO.CURSO;


-- View VotoEleitor
CREATE VIEW VOTOELEITORCURSO
AS
SELECT ELEITOR.CPF, ELEITOR.NOME AS ELEITOR, PROJETO.CODCURSO, PROJETO.CURSO
  FROM VOTACAO INNER JOIN ELEITOR 
			   ON VOTACAO.CPF = ELEITOR.CPF
			   INNER JOIN PROJETO
			   ON VOTACAO.PROJETO = PROJETO.IDPJ
GROUP BY ELEITOR.CPF, PROJETO.CODCURSO, PROJETO.CURSO              
ORDER BY ELEITOR.CPF;

SELECT * FROM VOTOELEITORCURSO;


delete from votacao where cpf in ('1','13');

-- View Certificado
CREATE VIEW CERTIFICADO
AS
SELECT * 
  FROM ELEITOR INNER JOIN ALUNOSFAP
			   ON ELEITOR.CPF = ALUNOSFAP.CPF2
 WHERE VOTOSTATUS = 1 
ORDER BY NOME;

-- Select View
SELECT * FROM CERTIFICADO;

-- View Eleitores
CREATE VIEW ELEITORES
AS
SELECT TIPOELEITOR, COUNT(*) AS TOTALELEITOR 
  FROM ELEITOR
GROUP BY TIPOELEITOR;

-- Select View
SELECT * FROM ELEITORES;

-- Select Votacao
SELECT * FROM VOTACAO ORDER BY CPF;

-- -----------------------------------------------------
-- Importação de Alunos FAP
-- -----------------------------------------------------

-- Validação do CPF
SELECT ALUNO, CPF2, COUNT(CPF2) AS QNT 
  FROM ALUNOSFAP
  GROUP BY ALUNO, CPF2
  ORDER BY QNT DESC;

-- Insert Eleitor x AlunosFap
-- INSERT INTO ELEITOR (MATRICULA, NOME, CPF, SENHA, TIPOELEITOR)
            SELECT NULL, ALUNO, CPF2, SUBSTRING(CPF2,1,6),'ALUNO'
              FROM ALUNOSFAP
			 WHERE CPF2 NOT IN ('05662487600','30432716882');
             
-- Select Eleitor x AlunosFap
SELECT *
  FROM ELEITOR, ALUNOSFAP
 WHERE ELEITOR.CPF = ALUNOSFAP.CPF2
ORDER BY NOME;

-- DELETE FROM ELEITOR WHERE IDEL >= 3;

SELECT * FROM ALUNOSFAP, ELEITOR
WHERE ALUNOSFAP.CPF2 = ELEITOR.CPF;

-- -----------------------------------------------------
-- Importação de Professores FAP
-- -----------------------------------------------------

-- Select ProfessoresFap
SELECT * FROM PROFESSORESFAP;

-- Validação de Professores 
SELECT PROFESSOR, COUNT(*) AS QNT 
FROM PROFESSORESFAP
GROUP BY PROFESSOR
ORDER BY QNT DESC;


-- --------------------------------------------



SELECT MAX(IDVT) 
  FROM VOTACAO
 WHERE CPF = '1';

SELECT * FROM votacao;

SELECT * FROM VOTOELEITORCURSO;
SELECT * FROM VOTOELEITOR;
SELECT * FROM VOTACAORESULTADO;
select * from eleitor;


SELECT * FROM projeto WHERE codcurso = 6;

/**************************************************************************************************

IMPORTAÇÃO DE DADOS - 2018-02

***************************************************************************************************/

-- Table AluhnosFap
CREATE TABLE ALUNOSFAP
( IDA INT AUTO_INCREMENT,
  CURSO VARCHAR(180),
  NOME VARCHAR(150),
  CPF VARCHAR(11),
  PRIMARY KEY(IDA));

-- Select AlunosFap
SELECT * FROM ALUNOSFAP;

  CPF VARCHAR(11),
  PRIMARY KEY(IDP));

-- Select ProfessoresFap
SELECT * FROM PROFESSORESFAP WHERE CPF IN (SELECT CPF FROM ELEITOR);

SELECT * FROM ELEITOR WHERE NOME ='PAULA LIMA BOSI';

CREATE VIEW PROF
AS
SELECT COUNT(CPF) AS QNT, NOME, CPF FROM PROFESSORESFAP
GROUP BY NOME
HAVING QNT >= 2
ORDER BY NOME; 

SELECT * FROM PROFESSORESFAP
WHERE CPF IN (SELECT CPF FROM PROF);


CREATE VIEW ELEITORES
AS
SELECT ELEITOR.TIPOELEITOR AS TIPO, COUNT(ELEITOR.CPF) AS TOTALELEITOR
  FROM VOTACAO INNER JOIN ELEITOR
              ON VOTACAO.CPF = ELEITOR.CPF
GROUP BY ELEITOR.TIPOELEITOR
ORDER BY ELEITOR.TIPOELEITOR;



SELECT VOTACAO.CPF, ELEITOR.NOME
  FROM VOTACAO INNER JOIN ELEITOR
               ON VOTACAO.CPF = ELEITOR.CPF
 WHERE VOTACAO.DATAHORA BETWEEN '2018-11-10 08:59:59' AND '2018-11-10 11:30:59'
 GROUP BY VOTACAO.CPF, ELEITOR.NOME
 ORDER BY ELEITOR.NOME;

SELECT PROJETO.IDPJ AS CODIGO, PROJETO.NOME, 
	   PROJETO.CURSO, COUNT(VOTACAO.IDVT) AS TOTALVOTO, PROJETO.AREA 
  FROM VOTACAO INNER JOIN PROJETO
               ON VOTACAO.PROJETO = PROJETO.IDPJ
   AND VOTACAO.DATAHORA BETWEEN '2018-11-10 08:59:59' AND '2018-11-10 11:30:59'               
   GROUP BY PROJETO.IDPJ, PROJETO.NOME, PROJETO.CURSO, PROJETO.AREA
   ORDER BY TOTALVOTO DESC;
	



