CREATE DATABASE teste;
USE teste;

CREATE TABLE funcionario(
    id INT AUTO_INCREMENT,
    nome VARCHAR(60),
    nasc DATE,
    sal DECIMAL(10,2),
    foto VARCHAR(128),

   PRIMARY KEY(id)
);