DROP TABLE IF EXISTS usuarios;

CREATE TABLE IF NOT EXISTS usuarios (
    id              INTEGER PRIMARY KEY,
    nome            TEXT    NOT NULL,
    dataNascimento  TEXT,
    tipo            INTEGER,
    ativado         INTEGER
);

INSERT INTO usuarios (id, nome, dataNascimento, tipo, ativado) values (1,'teste 1','01-01-2000',1,1);
INSERT INTO usuarios (id, nome, dataNascimento, tipo, ativado) values (2,'teste 2','01-01-2001',1,1);
INSERT INTO usuarios (id, nome, dataNascimento, tipo, ativado) values (3,'teste 3','01-01-2003',1,1);


DROP TABLE IF EXISTS veiculos;

CREATE TABLE IF NOT EXISTS veiculos (
    id              INTEGER PRIMARY KEY,
    placa           TEXT    NOT NULL,
    modelo          TEXT,
    cor             TEXT,
    ano             INTEGER
);

DROP TABLE IF EXISTS logins;

CREATE TABLE IF NOT EXISTS logins (
    id              INTEGER PRIMARY KEY,
    nome           TEXT    NOT NULL,
    email          TEXT,
    senha             TEXT
);