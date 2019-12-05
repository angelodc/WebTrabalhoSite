
CREATE TABLE Aluno (
    id_matricula varchar(50) PRIMARY KEY,
    nome varchar(50),
    telefone varchar(11),
    endereco varchar(50)
);

CREATE TABLE Aula (
    id_aula int(10) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    turno varchar(50),
    nome varchar(50),
    dia varchar(50),
    fk_Sala_id_sala int(10)
);

CREATE TABLE Sala (
    id_sala int(10) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    campus varchar(50),
    numero varchar(10)
);

CREATE TABLE Aluno_Aula (
    fk_Aluno_id_matricula varchar(50),
    fk_Aula_id_aula int(10)
);
 
ALTER TABLE Aula ADD CONSTRAINT FK_Aula_2
    FOREIGN KEY (fk_Sala_id_sala)
    REFERENCES Sala (id_sala)
    ON DELETE RESTRICT;
 
ALTER TABLE Aluno_Aula ADD CONSTRAINT FK_Aluno_Aula_1
    FOREIGN KEY (fk_Aluno_id_matricula)
    REFERENCES Aluno (id_matricula)
    ON DELETE RESTRICT;
 
ALTER TABLE Aluno_Aula ADD CONSTRAINT FK_Aluno_Aula_2
    FOREIGN KEY (fk_Aula_id_aula)
    REFERENCES Aula (id_aula)
    ON DELETE RESTRICT;

INSERT INTO `sala` (`id_sala`, `campus`, `numero`) VALUES 
    (NULL, 'fapa', '3201'),
    (NULL, 'fapa', '1202'),
    (NULL, 'fapa', '4203'),
    (NULL, 'fapa', '2102'),
    (NULL, 'zona sul', '408C'),
    (NULL, 'zona sul', '302C'),
    (NULL, 'zona sul', '506A'),
    (NULL, 'zona sul', '202B'),
    (NULL, 'canoas', '408B'),
    (NULL, 'canoas', '302A'),
    (NULL, 'canoas', '106B'),
    (NULL, 'canoas', '202C');

INSERT INTO `aula` (`id_aula`, `turno`, `nome`, `dia`, `fk_Sala_id_sala`) VALUES 
    (NULL, 'manha', 'PESQUISA, ORDENACAO E TECNICAS DE ARMAZENAMENTO ', 'segunda', '1'),
    (NULL, 'manha', 'FUNDAMENTOS PARA COMPUTACAO ', 'terca', '2'),
    (NULL, 'manha', 'MATEMATICA ', 'quarta', '3'),
    (NULL, 'manha', 'ARQUITETURA E ORGANIZACAO DE COMPUTADORES ', 'quinta', '4'),
    (NULL, 'tarde', 'PROGRAMACAO ORIENTADA A OBJETOS  ', 'sexta', '5'),
    (NULL, 'tarde', 'TECNICAS DE PROGRAMACAO  ', 'segunda', '6'),
    (NULL, 'tarde', 'ENGENHARIA DE SOFTWARE I  ', 'terca', '7'),
    (NULL, 'tarde', 'GEOMETRIA ANALITICA E ALGEBRA LINEAR  ', 'quarta', '8'),
    (NULL, 'noite', 'BANCO DE DADOS I  ', 'quinta', '9'),
    (NULL, 'noite', 'BANCO DE DADOS II ', 'sexta', '10'),
    (NULL, 'noite', 'ENGENHARIA DE SOFTWARE II  ', 'segunda', '11'),
    (NULL, 'noite', 'LABORATORIO DE REDES DE COMPUTADORES', 'terca', '12');