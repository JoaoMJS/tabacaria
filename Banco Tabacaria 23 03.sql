CREATE DATABASE tabacaria_model;
USE tabacaria_model;

CREATE TABLE produtos (
id INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(100),
preco DECIMAL(10,2),
estoque INT
);

INSERT INTO produtos (nome, preco, estoque) VALUES
('Charuto Cubano', 80.00, 10),
('Seda RAW King Size', 12.00, 50),
('Isqueiro Clipper', 15.00, 30);

SELECT * FROM produtos;

USE tabacaria_model;

CREATE TABLE usuario (
id INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(100),
email VARCHAR(100)
);

SHOW TABLES;

SELECT * FROM tabacaria_model.usuario;

ALTER TABLE produtos ADD imagem VARCHAR(255);

SELECT imagem FROM produtos;

UPDATE produtos 
SET imagem = 'sampoerna.jpg'
WHERE id = 17;

SELECT id, nome, imagem FROM produtos;

SELECT imagem FROM produtos;

ALTER TABLE produtos 
ADD descricao TEXT,
ADD conteudo VARCHAR(100),
ADD marca VARCHAR(100),
ADD categoria VARCHAR(100);
