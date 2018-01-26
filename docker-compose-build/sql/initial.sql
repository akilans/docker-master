CREATE DATABASE if not exists employee;

USE employee;

CREATE TABLE if not exists employee ( id int not null auto_increment, name varchar(255),role varchar(255), primary key (id));