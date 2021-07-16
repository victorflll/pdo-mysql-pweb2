CREATE DATABASE avaliacaopweb2;
USE avaliacaopweb2;

CREATE TABLE `user`(
    `iduser` INT AUTO_INCREMENT,
	`name` VARCHAR(200),
    `username` VARCHAR(200),
    `email` VARCHAR(200),
    `password` VARCHAR(32), 
    CONSTRAINT PRIMARY KEY(iduser)
);