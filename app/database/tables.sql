DROP TABLE IF EXISTS logins;

CREATE TABLE IF NOT EXISTS logins (
    id             INTEGER PRIMARY KEY,
    nome           TEXT NOT NULL,
    email          TEXT NOT NULL,
    senha          TEXT NOT NULL
);

DROP TABLE IF EXISTS servidor;

CREATE TABLE IF NOT EXISTS servidor (
    id             INTEGER PRIMARY KEY,
    nome           TEXT NOT NULL,   
    id_jogo        INTEGER NOT NULL,
    FOREIGN KEY (id_jogo) REFERENCES jogos (id)
);
DROP TABLE IF EXISTS jogos;

CREATE TABLE IF NOT EXISTS jogos (
    id             INTEGER PRIMARY KEY,
    nome           TEXT NOT NULL,   
    id_categoria   INTEGER NOT NULL,
    FOREIGN KEY (id_categoria) REFERENCES categoria (id)
);
DROP TABLE IF EXISTS categoria;

CREATE TABLE IF NOT EXISTS categoria (
    id             INTEGER PRIMARY KEY,
    nome           TEXT NOT NULL
);

INSERT INTO categoria (id, nome) VALUES (1, 'Ação');
INSERT INTO categoria (id, nome) VALUES (2, 'Terror');
INSERT INTO categoria (id, nome) VALUES (3, 'Aventura');

DROP TABLE IF EXISTS membros;

CREATE TABLE IF NOT EXISTS membros (
    id             INTEGER PRIMARY KEY,
    id_login       INTEGER NOT NULL,
    id_servidor       INTEGER NOT NULL,
    FOREIGN KEY (id_login) REFERENCES logins (id),
    FOREIGN KEY (id_servidor) REFERENCES servidor (id)
);