-- Active: 1711747430868@@127.0.0.1@3306
/*borrar base de datos si existe*/
drop database if exists tienda;

/*borrar tablas si existe*/
drop table if exists carrito;
drop table if exists usuarios;
drop table if exists productos;

create database tienda;
use tienda;

create table productos(
    id int primary key auto_increment,
    nombre varchar(100),
    imagen longblob,
    precio decimal(10,2),
    descripcion_es VARCHAR(1000),
    descripcion_en VARCHAR(1000),
    stock int
);

create table usuarios(
    id int primary key auto_increment,
    nombre varchar(100),
    email varchar(100),
    password varchar(100),
    iban varchar(100),
    telefono varchar(100)
);

create table carrito(
    id int primary key auto_increment,
    id_usuario int,
    id_producto int,
    cantidad int,
    foreign key (id_usuario) references usuarios(id),
    foreign key (id_producto) references productos(id)
);