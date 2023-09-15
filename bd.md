CREATE DATABASE Ecommerce;

USE Ecommerce;

CREATE TABLE Cliente(
	rg VARCHAR(50),
    primeiroNome VARCHAR(50),
    nomeDoMeio VARCHAR(50),
    ultimoNome VARCHAR(50),
    dataDeNascimento DATETIME,
    pontuacao INT
);