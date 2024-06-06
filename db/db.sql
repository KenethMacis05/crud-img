create database crud_image;
use crud_image;

create table usuarios (
id INT PRIMARY KEY AUTO_INCREMENT,
nombre varchar(45),
imagen longblob
);

insert into usuarios (nombre) values ('Keneth'), ('Alvaro'), ('Dayana');